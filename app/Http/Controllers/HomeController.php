<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Read the JSON file from storage/app/public/json/cities.json
        $citiesJson = Storage::disk('public')->get('json/cities.json');

        // Decode JSON into an array
        $cities = json_decode($citiesJson, true);

        return view('layout.home', compact('cities'));
    }
}
