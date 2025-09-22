<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationOtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Read the JSON file from storage/app/public/json/cities.json
        $citiesJson = Storage::disk('public')->get('json/cities.json');

        // Decode JSON into an array
        $cities = json_decode($citiesJson, true);

        // Step 1: Get subscribed users with custom subscription ordering
        $subscribedUsers = User::has('userDetails')
            ->with('userDetails')
            ->join(DB::raw('(SELECT user_id, MAX(id) as latest_sub_id 
                     FROM subscription_histories 
                     GROUP BY user_id) sh'), 'sh.user_id', '=', 'users.id')
            ->orderByRaw('FIELD(sh.latest_sub_id, 3, 2, 1) DESC')
            ->select('users.*')
            ->take(4)
            ->get();

        // Step 2: If less than 4, fill with unsubscribed users
        if ($subscribedUsers->count() < 4) {
            $remaining = 4 - $subscribedUsers->count();

            $unsubscribedUsers = User::has('userDetails')
                ->doesntHave('subscriptions')
                ->with('userDetails')
                ->latest('id')
                ->take($remaining)
                ->get();

            // Merge results
            $latestUsers = $subscribedUsers->concat($unsubscribedUsers);
        } else {
            $latestUsers = $subscribedUsers;
        }

        // $email = 'gokulayokesh@gmail.com';
        // $name = 'Gokul';
        // // Generate OTP
        // $otp = rand(100000, 999999);

        // // Store OTP in cache for 10 minutes
        // Cache::put('otp_'.$email, $otp, now()->addMinutes(10));

        // // Send email
        // Mail::to($email)->send(new RegistrationOtpMail($otp, $name));

        return view('layout.home', compact('cities', 'latestUsers'));
    }
}
