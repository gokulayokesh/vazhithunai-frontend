<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Google\Client as GoogleClient;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // First, fetch the user by email
        $user = \App\Models\User::where('email', $credentials['email'])->first();

        if (! $user) {
            return response()->json([
                'success' => false,
                'message' => 'The provided credentials do not match our records.',
            ], 422);
        }

        // Check if email is verified
        if (is_null($user->email_verified_at)) {
            return response()->json([
                'success' => false,
                'message' => 'Please verify your email address before logging in.',
            ], 403);
        }

        // Attempt login only if verified
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json(['success' => true]);
        }

        return response()->json([
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
        dd($payload);
        if ($payload) {
            $password = Str::random(32);
            $user = \App\Models\User::updateOrCreate(
                ['email' => $payload['email']],
                [
                    'name'      => $payload['name'] ?? $payload['email'],
                    'google_id' => $payload['sub'],
                    'avatar'    => $payload['picture'] ?? null,
                    'password'  => Hash::make($password),
                    'show_password' => $password,
                ]
            );

            Auth::login($user);

            return redirect()->route('home');
        }

        return redirect()->route('login')->withErrors('Google login failed');
    }
}
