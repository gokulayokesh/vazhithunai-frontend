<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        try{
            $baseUrl = 'https://api-preprod.phonepe.com/apis/pg-sandbox';
            $authEndpoint = '/v1/oauth/token';
            $payEndpoint = '/checkout/v2/pay';
        
            // Step 1: Get Access Token
            $authPayload = [
                'client_id' => env('PHONEPE_CLIENT_ID'),
                'client_version' => env('PHONEPE_CLIENT_VERSION'),
                'client_secret' => env('PHONEPE_CLIENT_SECRET'),
                'grant_type'=>'client_credentials'
            ];

            Log::info('PhonePe Auth Payload', [
                'client_id' => env('PHONEPE_CLIENT_ID'),
                'client_version' => env('PHONEPE_CLIENT_VERSION'),
                'client_secret' => env('PHONEPE_CLIENT_SECRET'),
            ]);

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post('https://api-preprod.phonepe.com/apis/pg-sandbox/v1/oauth/token', [
                'client_id' => env('PHONEPE_CLIENT_ID'),
                'client_version' => env('PHONEPE_CLIENT_VERSION'),
                'client_secret' => env('PHONEPE_CLIENT_SECRET'),
            ]);
            return $response->json();
            
        
            $authResponse = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post($baseUrl . $authEndpoint, $authPayload);
            Log::info($authResponse);
            if (!$authResponse->ok()) {
                return ['error' => 'Authorization failed', 'details' => $authResponse->json()];
            }
            
            $accessToken = $authResponse['access_token'];
        
            $paymentData = [
                'merchantId' => 'TEST-M23NS8XTG75OG',
                'transactionId' => 'TXN123456789',
                'amount' => 10000, // in paise
                'merchantOrderId' => 'ORDER123',
                'redirectUrl' => 'https://vazhithunai.com/payment-success',
                'callbackUrl' => 'https://vazhithunai.com/payment-callback',
                'paymentInstrument' => [
                    'type' => 'PAY_PAGE',
                ],
            ];
            // Step 2: Create Payment
            $paymentResponse = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $accessToken,
            ])->post($baseUrl . $payEndpoint, $paymentData);
        
            if (!$paymentResponse->ok()) {
                return ['error' => 'Payment failed', 'details' => $paymentResponse->json()];
            }
        
            dd($paymentResponse->json());
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }

    // Handles user redirect after payment
    public function handleSuccess(Request $request)
    {
        $transactionId = $request->query('transactionId');
        $status = $request->query('status');
        // dd($transactionId,$status);
        // You can verify the transaction status here if needed
        return view('payment.success', compact('transactionId', 'status'));
    }

    // Handles server-to-server callback from PhonePe
    public function handleCallback(Request $request)
    {
        $payload = $request->all();

        // Log callback for debugging
        Log::info('PhonePe Callback Received', $payload);

        // Validate and update transaction status in DB
        if (isset($payload['transactionId']) && isset($payload['status'])) {
            // Example: updateTransactionStatus($payload['transactionId'], $payload['status']);
        }

        return response()->json(['message' => 'Callback processed'], 200);
    }
}
