<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationOtpMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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

        // $email = 'gokulayokesh@gmail.com';
        // $name = 'Gokul';
        // // Generate OTP
        // $otp = rand(100000, 999999);

        // // Store OTP in cache for 10 minutes
        // Cache::put('otp_'.$email, $otp, now()->addMinutes(10));

        // // Send email
        // Mail::to($email)->send(new RegistrationOtpMail($otp, $name));

        return view('layout.home', compact('cities'));
    }
}
