<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function search(Request $request)
    {
        return view('layout.listings');
    }

    public function profile(Request $request)
    {
        return view('layout.profile');
    }
}
