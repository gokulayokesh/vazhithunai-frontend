<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileSearchController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('layout.about');
});

Route::get('/contact', function () {
    return view('layout.contact');
});

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

Route::get('/profiles/search', [ProfileSearchController::class, 'search'])->name('profiles.search');

Route::post('/shortlist/{user}', [ProfileController::class, 'toggleShortlist'])->name('shortlist.add');

Route::post('/initiate-payment', [PaymentController::class, 'initiatePayment'])->middleware('auth');

Route::get('/payment-callback', [PaymentController::class, 'handleCallback']);

Route::post('/auth/google/callback', [LoginController::class, 'googleCallback']);

Route::post('/send-otp', [LoginController::class, 'sendOtp'])->name('send.otp');

Route::post('/verify-otp', [LoginController::class, 'verifyOtp'])->name('verify.otp');

Route::post('/resend-otp', [LoginController::class, 'resendOtp'])->name('resend.otp');

Route::post('/contact-us', [ContactMessageController::class, 'store'])->name('contact.store');

Route::post('/pre-register', [RegisterController::class, 'preRegistration'])->name('pre.register');

Route::middleware('auth')->group(function () {

    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/my-account', [ProfileController::class, 'myaccount'])->name('myaccount');

    Route::get('/add-watch-history/{id}', [ProfileController::class, 'viewProfile'])->name('add.watch.history');

    Route::get('/chats', [ChatController::class, 'index'])->name('chat.index');

    Route::get('/chats/{chatId}', [ChatController::class, 'show'])->name('chat.show');

    Route::get('/chats/start/{user}', [ChatController::class, 'start'])->name('chat.start');

    Route::post('/chats/{chat}/send', [ChatController::class, 'send'])->name('chat.send');

    Route::delete('/chats/{chat}', [ChatController::class, 'destroy'])->name('chat.destroy');

    // Referral dashboard
    Route::get('/referrals', [ReferralController::class, 'dashboard'])->name('referrals.dashboard');

    // Referral link usage
    Route::get('/referral/{code}', [ReferralController::class, 'registerWithReferral'])->name('referral.link');

    // Generate referral code
    Route::post('/referral/generate/{user}', [ReferralController::class, 'generate'])->name('referral.generate');

    // Reward a referral (admin-only ideally)
    Route::post('/referral/reward/{referral}', [ReferralController::class, 'reward'])->name('referral.reward');
});

Route::get('/verify-email/{token}', [LoginController::class, 'verifyEmail'])->name('verify.email');
