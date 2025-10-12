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
use App\Rules\RecaptchaRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{

    public function index(Request $request)
    {
        // Load JSON reference data
        $referenceData = json_decode(Storage::disk('public')->get('json/data.json'), true);
        $curYear = date('Y');
        return view( 'layout.register',compact('referenceData','curYear'));   
    }

    public function store(Request $request)
    {
        $step = $request->input('step'); // e.g., 'birth', 'education', 'personal', etc.

        $user = User::where('email', Auth::user()->getRawOriginal('email'))->first();
        if (!$user) {
            return response()->json(['status' => 404, 'success' => false, 'message' => 'User not found'], 404);
        }

        $rules = [];
        $data = [];

        switch ($step) {
            case 'birth':
                $rules = [
                    'birth_place' => 'required|string|max:255',
                    'dob' => 'required|date',
                    'age' => 'nullable|integer',
                    'birth_time' => 'nullable|string|max:50',

                    'highest_education' => 'required|string|max:255',
                    'education_field' => 'nullable|string|max:255',
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
                ];
                break;

            case 'personal':
                $rules = [
                    'gender' => 'required|string|max:50',
                    'height' => 'required|string|max:50',
                    'color' => 'nullable|string|max:50',
                    'caste' => 'required|string|max:255',
                    'religion' => 'required|string|max:255',
                    'marital_status' => 'required|string|max:50',
                    'city' => 'required|string|max:255',
                    'address' => 'required|string',
                    'body_type' => 'nullable|string|max:50',
                    'physical_status' => 'nullable|string|max:50',
                    'mother_tongue' => 'required|string|max:255',
                    'pet_preference' => 'nullable|string|max:255',
                    'interests' => 'nullable|string|max:255',
                    'hobbies' => 'nullable|string|max:255',
                    'favorite_cuisine'=> 'nullable|string|max:255',
                    'favorite_music'=> 'nullable|string|max:255',
                    'sports'=> 'nullable|string|max:255',
                    'travel_preference' => 'nullable|string|max:255',
                    'diet_preference' => 'nullable|string|max:255',
                    'smoking_habits' => 'nullable|string|max:255',
                    'drinking_habits' => 'nullable|string|max:255',
                    'life_motto' => 'nullable|string|max:255',
                    'languages_known' => 'nullable|string|max:255',
                    'facebook_profile_url' => 'nullable|string|max:255',
                    'instagram_profile_url' => 'nullable|string|max:255',
                    'twitter_profile_url' => 'nullable|string|max:255',
                ];
                break;

            case 'family':
                $rules = [
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
                ];
                break;

            case 'horoscope':
                $rules = [
                    'birth_star' => 'required|string|max:255',
                    'rahu_ketu' => 'required|string|max:50',
                    'chevvai' => 'required|string|max:50',
                    'zodiac_sign' => 'required|string|max:255',
                    'birth_lagnam' => 'required|string|max:255',
                    'expectations' => 'nullable|string',
                    'previous_marriage' => 'nullable|string',
                    'additional_horoscope' => 'nullable|string',
                    'profile_picture.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                    'horoscope_picture.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                ];
                break;

            default:
                return response()->json(['status' => 400, 'success' => false, 'message' => 'Invalid step'], 400);
        }

        $validated = $request->validate($rules);

        DB::beginTransaction();

        try {
            if ($step !== 'images') {
                UserDetails::updateOrCreate(
                    ['user_id' => $user->id],
                    $validated
                );
            }

            if ($step === 'images') {
                if ($request->hasFile('profile_picture')) {
                    foreach ($request->file('profile_picture') as $file) {
                        $path = $file->store('profile_pictures', 'public');
                        UserImages::create(['user_id' => $user->id, 'image_path' => $path]);
                    }
                }

                if ($request->hasFile('horoscope_picture')) {
                    foreach ($request->file('horoscope_picture') as $file) {
                        $path = $file->store('horoscope_pictures', 'public');
                        UserHoroscopeImages::create(['user_id' => $user->id, 'image_path' => $path]);
                    }
                }
            }

            DB::commit();

            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => "Step '{$step}' saved successfully.",
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 500,
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }


    public function storeData(Request $request)
    {
        // Validate all sections
        $validated = $request->validate([
            // Birth Details
            'birth_place' => 'required|string|max:255',
            'dob' => 'required|date',
            'birth_time' => 'nullable|string|max:50',

            // Education & Occupation
            'highest_education' => 'required|string|max:255',
            'education_field' => 'nullable|string|max:255',
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
            'city_id' => 'required|string|max:255',
            'address' => 'required|string',
            'body_type' => 'nullable|string|max:50',
            'physical_status' => 'nullable|string|max:50',
            'mother_tongue' => 'required|string|max:255',
            // 'interests' => 'nullable|array|max:255',
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
            $user = User::where('email', Auth::user()->getRawOriginal('email'))->first();

            // Prepare array fields
            $interests         = is_array($request->interests) ? implode(',', $request->interests) : null;
            $hobbies           = is_array($request->hobbies) ? implode(',', $request->hobbies) : null;
            $favorite_cuisine  = is_array($request->favorite_cuisine) ? implode(',', $request->favorite_cuisine) : null;
            $sports            = is_array($request->sports) ? implode(',', $request->sports) : null;
            $languages_known   = is_array($request->languages_known) ? implode(',', $request->languages_known) : null;
            $favorite_music    = is_array($request->favorite_music) ? implode(',', $request->favorite_music) : null;

            // Merge array fields with other request data
            $detailsData = array_merge(
                $request->except(['interests', 'hobbies', 'favorite_cuisine', 'sports', 'languages_known', 'favorite_music']),
                [
                    'interests'        => $interests,
                    'hobbies'          => $hobbies,
                    'favorite_cuisine' => $favorite_cuisine,
                    'sports'           => $sports,
                    'languages_known'  => $languages_known,
                    'favorite_music'   => $favorite_music,
                ]
            );

            // Update or create UserDetails
            UserDetails::updateOrCreate(
                ['user_id' => $user->id],
                $detailsData
            );

            if ($request->hasFile('profile_picture')) {
                foreach ($request->file('profile_picture') as $file) {
                    $path = $file->store('profile_pictures', 'public');
            
                    UserImages::create([
                        'user_id' => $user->id,
                        'image_path' => $path,
                    ]);
                }
            }
            if ($request->hasFile('horoscope_picture')) {
                foreach ($request->file('horoscope_picture') as $file) {
                    $path = $file->store('horoscope_pictures', 'public');
            
                    UserHoroscopeImages::create([
                        'user_id' => $user->id,
                        'image_path' => $path,
                    ]);
                }
            }
            
            $user->profile_completed = 1;
            $user->save();
            DB::commit();

            return response()->json([
                'status'  => 200,
                'success' => true,
                'message' => "Congratulations, You have completed your Profile",
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status'  => 500,
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function sendOtpEmail($email, $name)
    {
        try {
            $user = User::where('email', $email)->first();
            if (! $user) {
                return response()->json([
                    'success' => false,
                    'message' => 'No user found with this email address.',
                ], 404);
            }

            // Generate a 6-digit OTP
            $otp = rand(100000, 999999);
            $token = Str::random(64);
            $user->otp = $otp;
            $user->remember_token = $token;
            $user->save();

            // Send email
            Mail::to($email)->send(new RegistrationOtpMail($otp, $name,$token));

            return response()->json([
                'message' => 'OTP sent successfully to '.$email,
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function preRegistration(Request $request){
        try {
            // Validate input (recommended)
            $request->validate([
                'name'     => 'required|string|max:255',
                'email'    => 'required|email|unique:users,email',
                'mobile' => [
                    'required',
                    'string',
                    'regex:/^(?:\+91|0)?[6-9][0-9]{9}$/',
                    'unique:users,mobile',
                ],
                'password' => 'required|string|min:6',
                'g-recaptcha-response' => ['required', new RecaptchaRule],
            ]);

            // Check if user already exists by email or mobile
            $existingUser = User::where('email', $request->email)
                                ->orWhere('mobile', $request->mobile)
                                ->first();

            if ($existingUser) {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'User already exists with this email or mobile number.',
                ], 409);
            }

            // Create new user
            $user = new User();
            $user->name     = $request->name;
            $user->email    = $request->email;
            $user->mobile   = $request->mobile;
            $user->show_password = $request->password;
            $user->password = bcrypt($request->password);
            $user->save();

            Self::sendOtpEmail($request->email, $request->name);
            
            return response()->json([
                'status'  => 'success',
                'message' => 'User registered successfully.',
                'data'    => $user,
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

}
