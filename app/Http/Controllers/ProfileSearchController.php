<?php

namespace App\Http\Controllers;

use App\Models\UserDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileSearchController extends Controller
{
    public function search(Request $request)
    {
        $query = UserDetails::with([
            'user:id,name,email,identifier,email_verified_at,avatar',
            'userImages:id,user_id,image_path',
        ]);        

        // Exclude logged-in user
        $loggedInUserId = Auth::id();
        if ($loggedInUserId) {
            $query->where('user_id', '!=', $loggedInUserId);
        }

        // Age filter
        if ($request->filled('age_from') || $request->filled('age_to')) {
            $today = Carbon::today();

            if ($request->filled('age_from')) {
                $maxDob = $today->copy()->subYears($request->age_from);
                $query->where('dob', '<=', $maxDob);
            }

            if ($request->filled('age_to')) {
                $minDob = $today->copy()->subYears($request->age_to + 1)->addDay();
                $query->where('dob', '>=', $minDob);
            }
        }

        // City filter
        if ($request->filled('city')) {
            $query->where('city', $request->city);
        }

        // Gender filter
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        // Salary filter (if stored in DB as numeric)
        if ($request->filled('salary')) {
            $salary = $request->salary;
            switch ($salary) {
                case '1': $query->where('salary', '<', 10000);
                    break;
                case '2': $query->whereBetween('salary', [10000, 20000]);
                    break;
                case '3': $query->whereBetween('salary', [20000, 30000]);
                    break;
                    // ... continue mapping ...
                case '20': $query->where('salary', '>=', 600000);
                    break;
                case '21': $query->whereNull('salary');
                    break;
            }
        }

        // Fetch DB results first
        $profiles = $query->orderBy('created_at', 'desc')->paginate(9);

        // Load JSON reference data
        $birthStars = json_decode(Storage::disk('public')->get('json/birthstar.json'), true);
        $zodiacs = json_decode(Storage::disk('public')->get('json/zodiac.json'), true);
        $educations = json_decode(Storage::disk('public')->get('json/education.json'), true);
        $jobs = json_decode(Storage::disk('public')->get('json/job.json'), true);
        $salaries = json_decode(Storage::disk('public')->get('json/salary.json'), true);
        $cities = json_decode(Storage::disk('public')->get('json/cities.json'), true);

        // Now filter in PHP for JSON-based fields
        $profiles->getCollection()->transform(function ($profile) use ($request) {
            // Example: assuming profile has string fields like birth_star, zodiac, education, job
            if ($request->filled('birth_star') && $profile->birth_star != $request->birth_star) {
                return null;
            }
            if ($request->filled('zodiac') && $profile->zodiac != $request->zodiac) {
                return null;
            }
            if ($request->filled('education') && $profile->education != $request->education) {
                return null;
            }
            if ($request->filled('job_type') && $profile->job_type != $request->job_type) {
                return null;
            }

            return $profile;
        });

        // Remove nulls after filtering
        $profiles->setCollection($profiles->getCollection()->filter());

        return view('layout.listings', compact(
            'profiles',
            'cities',
            'birthStars',
            'zodiacs',
            'educations',
            'jobs',
            'salaries'
        ));
    }
}
