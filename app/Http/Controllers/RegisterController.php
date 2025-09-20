<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationOtpMail;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\UserHoroscopeImages;
use App\Models\UserImages;
use App\Services\SmsService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        // Validate all sections
        $validated = $request->validate([
            // Birth Details
            'name' => 'required|string|max:255',
            'birth_place' => 'required|string|max:255',
            'dob' => 'required|date',
            'birth_time' => 'nullable|string|max:50',

            // Education & Occupation
            'highest_education' => 'required|string|max:255',
            'education_field' => 'required|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'institution' => 'nullable|string|max:255',
            'completion_year' => 'nullable|integer',
            'additional_qualifications' => 'nullable|string|max:255',
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
            'interests' => 'nullable|array|max:255',
            // 'hobbies' => 'nullable|string|max:255',
            // 'favorite_cuisine' => 'nullable|string|max:255',
            // 'favorite_music' => 'nullable|string|max:255',
            // 'sports' => 'nullable|string|max:255',
            'pet_preference' => 'nullable|string|max:255',
            'travel_preference' => 'nullable|string|max:255',
            'diet_preference' => 'nullable|string|max:255',
            'smoking_habits' => 'nullable|string|max:255',
            'drinking_habits' => 'nullable|string|max:255',
            // 'languages_known' => 'nullable|string|max:255',
            'life_motto' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255',
            'mobile' => 'required|string|max:20',
            'facebook_profile_url' => 'nullable|string|max:255',
            'instagram_profile_url' => 'nullable|string|max:255',
            'twitter_profile_url' => 'nullable|string|max:255',

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
            // 'profile_picture1' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            // 'horoscope_picture1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();

        try {
            $plainPassword = Str::random(10);

            $user = new User;
            $user->name = $validated['name'];
            $user->email = $validated['email'];
            $user->mobile = $validated['mobile'];
            $user->show_password = $plainPassword;
            $user->password = Hash::make($plainPassword);
            $user->save();

            // Save all details into UserDetails
            $details = new UserDetails;
            // $details->user_id = auth()->id();
            $details->user_id = $user->id;

            $details->interests = is_array($request->interests) ? implode(',', $request->interests) : null;
            $details->hobbies = is_array($request->hobbies) ? implode(',', $request->hobbies) : null;
            $details->favorite_cuisine = is_array($request->favorite_cuisine) ? implode(',', $request->favorite_cuisine) : null;
            $details->sports = is_array($request->sports) ? implode(',', $request->sports) : null;
            $details->languages_known = is_array($request->languages_known) ? implode(',', $request->languages_known) : null;
            $details->favorite_music = is_array($request->favorite_music) ? implode(',', $request->favorite_music) : null;

            $details->fill($request->except(['interests', 'hobbies', 'favorite_cuisine', 'sports', 'languages_known', 'favorite_music']));
            $details->save();

            // Save Profile Picture
            // if ($request->hasFile('profile_picture')) {
            //     $profilePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            //     UserImages::create([
            //         'user_id' => $user->id,
            //         'image_path' => $profilePath,
            //         'type' => 'profile',
            //     ]);
            // }
            if ($request->hasFile('profile_picture')) {
                foreach ($request->file('profile_picture') as $file) {
                    $path = $file->store('profile_pictures', 'public');

                    UserImages::create([
                        'user_id' => $user->id,
                        'image_path' => $path,
                        'type' => 'profile',
                    ]);
                }
            }

            // Save Horoscope Picture
            // if ($request->hasFile('horoscope_picture')) {
            //     $horoscopePath = $request->file('horoscope_picture')->store('horoscope_pictures', 'public');
            //     UserHoroscopeImages::create([
            //         'user_id' => $user->id,
            //         'image_path' => $horoscopePath,
            //     ]);
            // }

            if ($request->hasFile('horoscope_picture')) {
                foreach ($request->file('horoscope_picture') as $file) {
                    $path = $file->store('horoscope_pictures', 'public');
                    UserHoroscopeImages::create([
                        'user_id' => $user->id,
                        'image_path' => $path,
                        'type' => 'profile',
                    ]);
                }
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

    public function sendOtpMobile($mobile)
    {
        $mobile = '+91'.$mobile;

        try {
            $result = SmsService::sendOtp($mobile, 2221, [
                'Param1' => 'John',
                'Param2' => 'Matrimony',
                'Param3' => 'Profile Verification',
            ]);

            return response()->json(['success' => true, 'data' => $result]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
