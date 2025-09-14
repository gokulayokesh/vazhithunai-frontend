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
            'user:id,name,email,identifier', // Load basic user info
            'userImages:id,user_id,image_path', // Load profile images
        ]);

        // Exclude logged-in user
        $loggedInUserId = Auth::id();
        if ($loggedInUserId) {
            $query->where('user_id', '!=', $loggedInUserId);
        }

        // Age filter (convert to DOB range)
        if ($request->filled('age_from') || $request->filled('age_to')) {
            $today = Carbon::today();

            if ($request->filled('age_from')) {
                $maxDob = $today->copy()->subYears($request->age_from); // youngest allowed
                $query->where('dob', '<=', $maxDob);
            }

            if ($request->filled('age_to')) {
                $minDob = $today->copy()->subYears($request->age_to + 1)->addDay(); // oldest allowed
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

        // Fetch results (you can paginate)
        $profiles = $query->orderBy('created_at', 'desc')->paginate(20);

        // Read the JSON file from storage/app/public/json/cities.json
        $citiesJson = Storage::disk('public')->get('json/cities.json');

        // Decode JSON into an array
        $cities = json_decode($citiesJson, true);

        return view('layout.listings', compact('profiles', 'cities'));
    }
}
