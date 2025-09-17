<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileSearchController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('layout.home');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('layout.about');
});

Route::get('/contact', function () {
    return view('layout.contact');
});

Route::get('/register', function () {
    return view('layout.register');
});

Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/terms', function () {
    return view('layout.terms');
});

Route::get('/privacy-policy', function () {
    return view('layout.privacy');
});

Route::get('/listings', [ProfileSearchController::class, 'search'])->name('listings.search');

Route::get('/profile/{identifier}', [ProfileController::class, 'profile'])->name('profile');

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/my-account', [ProfileController::class, 'myaccount'])->name('myaccount');
});
// Backend API

Route::get('/profiles/search', [ProfileSearchController::class, 'search'])
    ->name('profiles.search');

Route::post('/shortlist/{user}', [ProfileController::class, 'toggleShortlist'])
    ->name('shortlist.add');


