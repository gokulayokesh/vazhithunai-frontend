<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
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

        $env = Env::PRODUCTION; // Use Env::PRODUCTION for live environment

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
            $baseUrl = env('PHONEPE_SANDBOX_BASE_URL');
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

            // 3. Generate IDs
            $transactionId = 'TXN'.time();
            $orderId = 'ORDER'.time();
            $userId = Auth::id() ?? 0;
            // 4. Save entry BEFORE hitting PhonePe
            $payment = Payment::create([
                'transaction_id' => $transactionId,
                'order_id' => $orderId,
                'user_id' => $userId,
                'amount' => $amount,
                'status' => 'initiated',
            ]);

            $paymentData = [
                'merchantOrderId' => $orderId,
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

            // 7. Update DB with gateway response
            $payment->update([
                'order_id' => $response['orderId'],
                'gateway_response' => $response->json(),
            ]);

            // 4. Handle Response
            if (! $response->ok()) {
                $payment->update(['status' => 'failed']);

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

    // Handles server-to-server callback from PhonePe
    public function handleCallback(Request $request)
    {
        $payment = Payment::where('user_id', '=', Auth::id())->first();

        $order_id = $payment->order_id;

        $baseUrl = env('PHONEPE_SANDBOX_BASE_URL');
        $path = '/checkout/v2/order/'.$order_id.'/status';
        $url = $baseUrl.$path;

        // Make sure you already have a valid access token (from your auth flow)
        $accessToken = Cache::remember('phonepe_access_token', 3500, function () {
            $authUrl = env('PHONEPE_SANDBOX_BASE_URL').'/v1/oauth/token';
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

        $response = Http::withHeaders([
            'Authorization' => 'O-Bearer '.$accessToken,
            'Content-Type' => 'application/json',
        ])->get($url);

        if (! $response->ok()) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch status',
                'details' => $response->json(),
            ], $response->status());
        }

        $statusResponse = $response->json();

        $finalStatus = $statusResponse['code'] === 'PAYMENT_SUCCESS' ? 'success' : 'failed';
        $payment->update([
            'status' => $finalStatus,
            'gateway_response' => $statusResponse,
        ]);

        return response()->json([
            'success' => true,
            'code' => 'PAYMENT_INITIATED',
            'data' => $finalStatus,
        ]);
    }
}
