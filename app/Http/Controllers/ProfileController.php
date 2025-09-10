<?php

namespace App\Http\Controllers;

use App\Models\UserDetails;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function search(Request $request)
    {
        return view('layout.listings');
    }

    public function profile(Request $request)
    {
        $userId = (int) $request->id;

        $profile = UserDetails::with([
            'user',          // relation to users table
            'userImages',    // relation to profile images
            'userHoroscopeImages',
        ])
            ->where('user_id', $userId)
            ->first();

        // Main profile (with relations to avoid N+1)
        $profiles = UserDetails::with(['user', 'userImages'])
            ->findOrFail($userId);

        // Build a simple "similar profiles" query (tune filters as needed)
        $similarProfiles = UserDetails::with(['user', 'userImages'])
            ->where('id', '!=', $profiles->id)
            ->when($profiles->gender, fn ($q) => $q->where('gender', $profiles->gender)) // or opposite gender if desired
            ->when($profiles->state, fn ($q) => $q->where('state', $profiles->state))
            ->when($profiles->caste, fn ($q) => $q->where('caste', $profiles->caste))
            ->latest()
            ->limit(6)
            ->get();

        return view('layout.profile', compact('profile', 'similarProfiles'));
    }
}
