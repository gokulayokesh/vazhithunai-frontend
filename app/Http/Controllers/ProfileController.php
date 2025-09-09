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
        ])
            ->where('user_id', $userId)
            ->first();

        return view('layout.profile', compact('profile'));
    }
}
