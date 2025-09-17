<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/initiate-payment', [PaymentController::class, 'initiatePayment']);
Route::post('/payment-success', [PaymentController::class, 'handleSuccess'])->name('payment.success');
Route::post('/payment-callback', [PaymentController::class, 'handleCallback'])->name('payment.handleCallback');
