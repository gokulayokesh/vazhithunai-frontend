<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileSearchController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('layout.home');
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', function () {
    return view('layout.about');
});

Route::get('/contact', function () {
    return view('layout.contact');
});

Route::get('/register', function () {
    return view('layout.register');
});

Route::get('/listings', [ProfileSearchController::class, 'search'])->name('listings.search');

Route::get('/profile/{id}', [ProfileController::class, 'profile'])->name('profile');

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Backend API

Route::get('/profiles/search', [ProfileSearchController::class, 'search'])
    ->name('profiles.search');
