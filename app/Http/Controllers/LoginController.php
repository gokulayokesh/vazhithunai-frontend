<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordOtpMail;
use App\Models\User;
use App\Rules\RecaptchaRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Google\Client as GoogleClient;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'login' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL) && !preg_match('/^\d{10}$/', $value)) {
                        $fail('The login must be a valid email or 10‑digit mobile number.');
                    }
                },
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&^#()[\]{}<>~+=._-]).+$/',
            ],
        ]);

        $loginInput = $request->input('login');
        $password   = $request->input('password');

        // Determine if login is email or mobile
        $fieldType = filter_var($loginInput, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';

        // Fetch user by email or mobile
        $user = User::where($fieldType, $loginInput)->first();

        if (! $user) {
            return $request->input('from_form')
                ? back()->withErrors(['login' => 'The provided credentials do not match our records.'])->onlyInput('login')
                : response()->json([
                    'success' => false,
                    'message' => 'The provided credentials do not match our records.',
                ], 422);
        }

        // Check email verification only if logging in with email
        if ($fieldType === 'email' && is_null($user->email_verified_at)) {
            return response()->json([
                'success' => false,
                'message' => 'Please verify your email address before logging in.',
            ], 403);
        }

        // Attempt login
        $credentials = [
            $fieldType => $loginInput,
            'password' => $password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if ($request->input('from_form')) {
                return redirect()->route('home');
            }

            return response()->json(['success' => true]);
        }

        return $request->input('from_form')
            ? back()->withErrors(['login' => 'The provided credentials do not match our records.'])->onlyInput('login')
            : response()->json([
                'success' => false,
                'message' => 'The provided credentials do not match our records.',
            ], 422);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        // If AJAX request, return JSON
        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Logged out successfully']);
        }

        // Otherwise redirect
        return redirect('/');
    }

    public function googleCallback(Request $request)
    {
        $credential = $request->input('credential'); // JWT from Google

        $client = new GoogleClient(['client_id' => env('GOOGLE_CLIENT_ID')]);
        $payload = $client->verifyIdToken($credential);
        if ($payload) {
            $password = Str::random(32);
            $user = User::firstOrNew(
                ['email' => $payload['email']]
            );
            
            $user->fill([
                'name'      => $payload['name'] ?? $payload['email'],
                'google_id' => $payload['sub'],
                'avatar'    => $payload['picture'] ?? null,
            ]);
            
            if (! $user->exists) {
                // Only for new users
                $user->password = Hash::make($password);
                $user->show_password = $password;
            }
            
            $user->save();

            Auth::login($user);

            return redirect()->route('home');
        }

        return redirect()->route('login')->withErrors('Google login failed');
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'g-recaptcha-response' => ['required', new RecaptchaRule], // custom rule we built earlier
        ]);

        $user = User::where('email', $request->email)->first();
        if (! $user) {
            return response()->json([
                'success' => false,
                'message' => 'No user found with this email address.',
            ], 404);
        }

        // Generate a 6-digit OTP
        $otp = rand(100000, 999999);
        $user->otp = $otp;
        $user->otp_created_at = now();
        $user->save();

        Mail::to($user->email)->send(new ForgotPasswordOtpMail($otp, $user->name));

        return response()->json(['success' => true, 'message' => 'OTP sent to your email.']);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp'   => 'required|digits:6',
        ]);

        $user = User::where('email', $request->email)->first();
        if (! $user) {
            return response()->json([
                'success' => false,
                'message' => 'No user found with this email address.',
            ], 404);
        }

        if ($user->otp != $request->otp || now()->diffInMinutes($user->otp_created_at) > 5) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired OTP.',
            ], 422);
        }

        $user->password = Hash::make($request->newPassword);
        $user->show_password = $request->newPassword;
        $user->otp = null;
        $user->otp_created_at = null;
        $user->save();

        Auth::login($user);

        return response()->json(['success' => true, 'message' => 'OTP verified successfully.']);
    }

    public function verifyEmail($token)
    {
        $user = User::where('remember_token', $token)->first();

        if (! $user) {
            return redirect('/login')->with('error', 'Invalid or expired verification link.');
        }

        
        $user->email_verified_at = now();
        $user->remember_token = null; // clear token
        $user->save();

        return redirect('/login')->with('success', 'Your email has been verified. You can now log in.');
    }

}
