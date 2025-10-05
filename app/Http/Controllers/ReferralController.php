<?php
namespace App\Http\Controllers;

use App\Models\Referral;
use App\Models\User;
use Illuminate\Support\Str;

class ReferralController extends Controller
{

    public function dashboard()
    {
        $user = auth()->user();

        return view('referrals.dashboard', [
            'user' => $user->load('referralsGiven'),
        ]);
    }

    // Generate referral code for a user
    public function generate(User $user)
    {
        if (! $user->referralsGiven()->exists()) {
            Referral::create([
                'referrer_id'   => $user->id,
                'referral_code' => strtoupper(Str::random(8)),
            ]);
        }
        return redirect()->back()->with('success', 'Referral code generated!');
    }

    // Handle referral link usage
    public function registerWithReferral($code)
    {
        $referral = Referral::where('referral_code', $code)->firstOrFail();
        session(['referral_code' => $referral->referral_code]);
        return redirect()->route('register');
    }

    // After user registers
    public function attachReferral(User $newUser)
    {
        if (session()->has('referral_code')) {
            $referral = Referral::where('referral_code', session('referral_code'))->first();
            if ($referral) {
                $referral->update([
                    'referred_user_id' => $newUser->id,
                    'status'           => 'registered',
                ]);
            }
        }
    }

    // Reward logic
    public function reward(Referral $referral)
    {
        if ($referral->status === 'registered') {
            $referral->update([
                'status'        => 'rewarded',
                'reward_points' => 50,
                'rewarded_at'   => now(),
            ]);
            // Example: Add points to referrer
            $referral->referrer->increment('wallet_points', 50);
        }
    }
}
