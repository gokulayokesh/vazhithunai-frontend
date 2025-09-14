<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use PhonePe\Env;
use PhonePe\payments\v2\standardCheckout\StandardCheckoutClient;

class PaymentController extends Controller
{
    public function index()
    {
        $clientId = env('PHONEPE_CLIENT_ID');
        $clientSecret = env('PHONEPE_CLIENT_SECRET');
        $clientVersion = env('PHONEPE_CLIENT_VERSION');

        $env = Env::PRODUCTION;  // Use Env::PRODUCTION for live environment

        $client = StandardCheckoutClient::getInstance(
            $clientId,
            $clientVersion,
            $clientSecret,
            $env
        );
    }

    public function initiatePayment(Request $request)
    {
        $transactionId = 'TXN_'.Str::uuid();
        $amount = 5000; // ₹50.00 in paise
        $message = 'தமிழ் திருமண சேவைக்கான கட்டணம்'; // Tamil + English message

        $payload = [
            'merchantId' => env('PHONEPE_MERCHANT_ID'),
            'transactionId' => $transactionId,
            'amount' => $amount,
            'expiresIn' => 300,
            'message' => $message,
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'X-VERIFY' => hash('sha256', json_encode($payload).'/pg/v1/create'.env('PHONEPE_CLIENT_SECRET')).'###'.env('PHONEPE_SALT_INDEX'),
            'X-CALLBACK-URL' => route('phonepe.callback'),
        ])->post('https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/create', $payload);

        if ($response->successful()) {
            $qrData = $response->json()['data']['instrumentResponse']['qrData'];

            return view('payment.qr', compact('qrData', 'transactionId'));
        }

        return back()->withErrors(['msg' => 'Payment initiation failed']);
    }
}
