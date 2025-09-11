<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationOtpMail;
use App\Models\UserDetails;
use App\Models\UserHoroscopeImages;
use App\Models\UserImages;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        // Validate all sections
        $validated = $request->validate([
            // Birth Details
            'birth_place' => 'required|string|max:255',
            'dob' => 'required|date',
            'birth_time' => 'nullable|string|max:50',

            // Education & Occupation
            'highest_education' => 'required|string|max:255',
            'education_field' => 'required|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'institution' => 'nullable|string|max:255',
            'completion_year' => 'nullable|integer',
            'occupation_category' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'employment_type' => 'nullable|string|max:255',
            'industry' => 'nullable|string|max:255',
            'work_location' => 'required|string|max:255',
            'annual_income' => 'nullable|string|max:255',
            'experience_years' => 'nullable|integer',

            // Personal Details
            'gender' => 'required|string|max:50',
            'height' => 'required|string|max:50',
            'color' => 'nullable|string|max:50',
            'caste' => 'required|string|max:255',
            'marital_status' => 'required|string|max:50',
            'city' => 'required|string|max:255',
            'address' => 'required|string',
            'body_type' => 'nullable|string|max:50',
            'physical_status' => 'nullable|string|max:50',
            'mother_tongue' => 'required|string|max:255',

            // Family Details
            'family_status' => 'required|string|max:255',
            'family_god' => 'nullable|string|max:255',
            'father_alive' => 'required|string|max:50',
            'mother_alive' => 'required|string|max:50',
            'parent_mobile' => 'required|string|max:20',
            'father_work' => 'nullable|string|max:255',
            'mother_work' => 'nullable|string|max:255',
            'brothers_count' => 'nullable|integer',
            'sisters_count' => 'nullable|integer',
            'married_brothers' => 'nullable|integer',
            'married_sisters' => 'nullable|integer',
            'own_house' => 'required|string|max:50',
            'family_notes' => 'nullable|string',

            // Horoscope Details
            'birth_star' => 'required|string|max:255',
            'rahu_ketu' => 'required|string|max:50',
            'chevvai' => 'required|string|max:50',
            'zodiac_sign' => 'required|string|max:255',
            'birth_lagnam' => 'required|string|max:255',
            'expectations' => 'nullable|string',
            'previous_marriage' => 'nullable|string',
            'additional_horoscope' => 'nullable|string',

            // Images
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'horoscope_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();

        try {
            // Save all details into UserDetails
            $details = new UserDetails;
            $details->user_id = auth()->id();
            $details->fill($validated); // Make sure your UserDetails model has $fillable set
            $details->save();

            // Save Profile Picture
            if ($request->hasFile('profile_picture')) {
                $profilePath = $request->file('profile_picture')->store('profile_pictures', 'public');
                UserImages::create([
                    'user_id' => auth()->id(),
                    'image_path' => $profilePath,
                    'type' => 'profile',
                ]);
            }

            // Save Horoscope Picture
            if ($request->hasFile('horoscope_picture')) {
                $horoscopePath = $request->file('horoscope_picture')->store('horoscope_pictures', 'public');
                UserHoroscopeImages::create([
                    'user_id' => auth()->id(),
                    'image_path' => $horoscopePath,
                ]);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Registration details saved successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->withErrors(['error' => 'Failed to save details: '.$e->getMessage()]);
        }
    }

    public function sendOtpEmail($email, $name)
    {
        try {
            // Generate OTP
            $otp = rand(100000, 999999);

            // Store OTP in cache for 10 minutes
            Cache::put('otp_'.$email, $otp, now()->addMinutes(10));

            // Send email
            Mail::to($email)->send(new RegistrationOtpMail($otp, $name));

            return response()->json([
                'message' => 'OTP sent successfully to '.$email,
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
