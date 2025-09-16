<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
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
        try {
            $baseUrl = 'https://api-preprod.phonepe.com/apis/pg-sandbox';
            $authUrl = $baseUrl.'/v1/oauth/token';
            $paymentUrl = $baseUrl.'/checkout/v2/pay';

            // 1. Get Access Token (cached for 1 hour)
            $accessToken = Cache::remember('phonepe_access_token', 3500, function () use ($authUrl) {
                $payload = [
                    'client_id' => env('PHONEPE_CLIENT_ID'),
                    'client_version' => env('PHONEPE_CLIENT_VERSION'),
                    'client_secret' => env('PHONEPE_CLIENT_SECRET'),
                    'grant_type' => 'client_credentials',
                ];

                $response = Http::asForm()->post($authUrl, $payload);

                if (! $response->ok()) {
                    throw new \Exception('PhonePe Auth Failed: '.$response->body());
                }

                return $response['access_token'];
            });

            $amount = (int) $request->input('amount', 10000);
            $paymentData = [
                'merchantOrderId' => 'newtxn123456',
                'amount' => $amount,
                'expireAfter' => 1200,
                'metaInfo' => [
                    'udf1' => 'test1',
                    'udf2' => 'new param2',
                    'udf3' => 'test3',
                    'udf4' => 'dummy value 4',
                    'udf5' => 'addition infor ref1',
                ],
                'paymentFlow' => [
                    'type' => 'PG_CHECKOUT',
                    'message' => 'Payment message used for collect requests',
                    'merchantUrls' => [
                        'redirectUrl' => 'https://vazhithunai.com/payment-callback',
                    ],
                ],
            ];

            // 3. Make Payment Request
            $response = Http::withHeaders([
                'Authorization' => 'O-Bearer '.$accessToken,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->post($paymentUrl, $paymentData);

            // 4. Handle Response
            if (! $response->ok()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Payment initiation failed',
                    'details' => $response->json(),
                ], $response->status());
            }

            return response()->json([
                'success' => true,
                'code' => 'PAYMENT_INITIATED',
                'data' => $response->json(),
            ]);
        } catch (\Exception $e) {
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
