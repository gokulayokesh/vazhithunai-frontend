<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileSearchController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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

Route::get('/login', function () {
    return view('layout.login');
});

Route::get('/sign-up', function () {
    return view('layout.signup');
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

Route::post('/initiate-payment', [PaymentController::class, 'initiatePayment'])->middleware('auth');
Route::get('/payment-callback', [PaymentController::class, 'handleCallback']);

Route::middleware('auth')->group(function () {
    Route::get('/chats', [ChatController::class, 'index'])->name('chat.index');
    Route::get('/chats/{chatId}', [ChatController::class, 'show'])->name('chat.show');
    Route::get('/chats/start/{user}', [ChatController::class, 'start'])->name('chat.start');
    Route::post('/chats/{chat}/send', [ChatController::class, 'send'])->name('chat.send');
    Route::delete('/chats/{chat}', [ChatController::class, 'destroy'])->name('chat.destroy');
});

Route::post('/auth/google/callback', [LoginController::class, 'googleCallback']);

Route::post('/send-otp', [LoginController::class, 'sendOtp'])->name('send.otp');
Route::post('/verify-otp', [LoginController::class, 'verifyOtp'])->name('verify.otp');
Route::post('/resend-otp', [LoginController::class, 'resendOtp'])->name('resend.otp');  

Route::get('/add-watch-history/{id}', [ProfileController::class, 'decrementView'])->middleware('auth');