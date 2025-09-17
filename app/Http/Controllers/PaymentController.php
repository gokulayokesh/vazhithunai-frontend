<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function index() {}

    public function initiatePayment(Request $request)
    {
        try {
            $baseUrl = env('PHONEPE_SANDBOX_BASE_URL', 'https://api-preprod.phonepe.com/apis/pg-sandbox');
            $paymentUrl = $baseUrl.'/checkout/v2/pay';

            // 1. Get Access Token (cached for 1 hour)
            $accessToken = $this->getAccessToken();

            $amount = (int) $request->input('amount', 10000);

            // 3. Generate IDs
            $transactionId = 'TXN'.time();
            $orderId = 'ORDER'.time();
            $userId = Auth::id();
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
                        'redirectUrl' => url('/payment-callback'),
                        'callbackUrl' => url('/api/payment-callback'),
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

    // Handles server-to-server callback from PhonePe
    public function handleCallback(Request $request)
    {
        $transactionId = $request->input('transactionId')
        ?? $request->input('transaction_id'); // depends on PhonePe payload

        $payment = Payment::latest('id')->first();

        if (! $payment) {
            return response()->json(['error' => 'Payment not found'], 404);
        }

        // Now you have the user_id from the DB
        $userId = $payment->user_id;

        // Call PhonePe status API to confirm
        $statusResponse = $this->checkPaymentStatus($payment->order_id);

        \Log::info(json_encode($statusResponse));

        $finalStatus = $statusResponse['state'] === 'COMPLETED' ? 'success' : 'failed';

        $payment->update([
            'status' => $finalStatus,
            'gateway_order_response_json' => json_encode($statusResponse),
            'gateway_order_response' => $statusResponse,
        ]);

        // You can now use $userId for any post-payment logic
        return view('payment.success');
    }

    private function checkPaymentStatus($orderId)
    {
        $baseUrl = env('PHONEPE_SANDBOX_BASE_URL', 'https://api-preprod.phonepe.com/apis/pg-sandbox');
        $path = '/checkout/v2/order/'.$orderId.'/status';
        $url = $baseUrl.$path;

        $accessToken = $this->getAccessToken(); // same as before

        $response = Http::withHeaders([
            'Authorization' => 'O-Bearer '.$accessToken,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->get($url);

        if (! $response->ok()) {
            \Log::error('PhonePe status check failed', ['body' => $response->body()]);

            return response()->json(['error' => 'Failed to fetch status'], 500);
        }

        return $response->json();
    }

    private function getAccessToken()
    {
        $authUrl = env('PHONEPE_SANDBOX_BASE_URL', 'https://api-preprod.phonepe.com/apis/pg-sandbox').'/v1/oauth/token';
        $payload = [
            'client_id' => env('PHONEPE_CLIENT_ID', 'TEST-M23NS8XTG75OG_25091'),
            'client_version' => env('PHONEPE_CLIENT_VERSION', '1'),
            'client_secret' => env('PHONEPE_CLIENT_SECRET', 'ZWE2MWI2YjUtNWJjNy00ODQ5LWIwZWEtY2JkZDdkYmNmM2Qz'),
            'grant_type' => 'client_credentials',
        ];

        $response = Http::asForm()->post($authUrl, $payload);

        if (! $response->ok()) {
            throw new \Exception('PhonePe Auth Failed: '.$response->body());
        }

        return $response['access_token'];
    }
}
