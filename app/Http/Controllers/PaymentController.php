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

            // 3. Generate IDs
            $transactionId = 'TXN'.time();
            $orderId = 'ORDER'.time();

            // 4. Save entry BEFORE hitting PhonePe
            $payment = Payment::create([
                'transaction_id' => $transactionId,
                'order_id' => $orderId,
                'user_id' => Auth::id(),
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

    // Handles user redirect after payment
    public function handleSuccess(Request $request)
    {
        $payload = $request->all();
        $transactionId = $request->query('transactionId');
        $status = $request->query('status');
        dd($transactionId);

        // dd($transactionId,$status);
        // You can verify the transaction status here if needed
        return view('payment.success', compact('transactionId', 'status'));
    }

    // Handles server-to-server callback from PhonePe
    public function handleCallback(Request $request)
    {
        // 1. Get transactionId from your DB or query param
        $transactionId = $request->input('transactionId');

        // If PhonePe didn’t send it, fall back to your own DB (e.g. last initiated txn for this user)
        if (! $transactionId) {
            return response()->json(['error' => 'No transactionId received'], 400);
        }

        // 2. Find payment in DB
        $payment = Payment::where('transaction_id', $transactionId)->first();
        if (! $payment) {
            return response()->json(['error' => 'Payment not found'], 404);
        }

        // 3. Call PhonePe Status API
        $baseUrl = 'https://api-preprod.phonepe.com/apis/pg-sandbox';
        $path = '/v1/status/'.env('PHONEPE_MERCHANT_ID').'/'.$transactionId;
        $url = $baseUrl.$path;

        // Generate checksum if required
        $saltKey = env('PHONEPE_SALT_KEY');
        $saltIndex = env('PHONEPE_SALT_INDEX', 1);
        $checksum = hash('sha256', $path.$saltKey).'###'.$saltIndex;

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'X-VERIFY' => $checksum,
        ])->get($url);

        if (! $response->ok()) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch status',
                'details' => $response->json(),
            ], $response->status());
        }

        $statusResponse = $response->json();

        // 4. Update DB
        $finalStatus = $statusResponse['code'] === 'PAYMENT_SUCCESS' ? 'success' : 'failed';
        $payment->update([
            'status' => $finalStatus,
            'gateway_response' => $statusResponse,
        ]);

        // 5. Redirect user to a success/failure page
        return redirect()->route('payment.result', ['status' => $finalStatus]);
    }
}
