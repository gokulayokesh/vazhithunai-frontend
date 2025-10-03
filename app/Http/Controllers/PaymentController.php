<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Subscription;
use App\Models\SubscriptionHistory;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function index() {}

    public function initiatePayment(Request $request)
    {
        try {
            $userId = Auth::id();

            // 🔍 1. Check if user already has an active subscription
            $activeSubscription = SubscriptionHistory::where('user_id', $userId)
                ->where('status', 'active')
                ->whereDate('end_date', '>=', now()) // still valid
                ->latest('end_date')
                ->first();

            if ($activeSubscription) {
                return response()->json([
                    'success' => false,
                    'code' => 'ACTIVE_PLAN_EXISTS',
                    'message' => 'You already have an active subscription until '.$activeSubscription->end_date->format('d M Y'),
                ], 400);
            }

            // 2. Proceed with payment initiation
            $baseUrl = env('PHONEPE_PRODUCTION_BASE_URL', 'https://api.phonepe.com/apis/pg');
            $paymentUrl = $baseUrl.'/checkout/v2/pay';

            // 3. Get Access Token
            $accessToken = $this->getAccessToken();

            $planId = (int) $request->input('planId', 1);
            $amount = Subscription::where('id', $planId)->pluck('price')->first();
            $amount = (int) $amount * 100;

            // 3. Generate IDs
            $transactionId = 'TXN'.time();
            $orderId = 'ORDER'.time();

            // 4. Save entry BEFORE hitting PhonePe
            $payment = Payment::create([
                'transaction_id' => $transactionId,
                'order_id' => $orderId,
                'subscription_id' => $planId,
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
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    // Handles server-to-server callback from PhonePe
    public function handleCallback(Request $request)
    {
        $payment = Payment::where('user_id', Auth::id())->latest('id')->first();

        if (! $payment) {
            return response()->json(['error' => 'Payment not found'], 404);
        }

        // Now you have the user_id from the DB
        $userId = $payment->user_id;

        // Call PhonePe status API to confirm
        $statusResponse = $this->checkPaymentStatus($payment->order_id);

        \Log::info(json_encode($statusResponse));

        $finalStatus = $statusResponse['state'] === 'COMPLETED' ? 'success' : 'failed';

        try{
            $payment->update([
                'status' => $finalStatus,
                'gateway_order_response_json' => $statusResponse,
            ]);
    
            if ($finalStatus === 'success') {
                $subscription = Subscription::findOrFail($payment->subscription_id);
                $startDate = now();
                $endDate = $startDate->copy()->addDays($subscription->validity_days);
    
                SubscriptionHistory::create([
                    'user_id' => $userId,
                    'subscription_id' => $subscription->id,
                    'plan_name' => $subscription->name,
                    'plan_code' => $subscription->id,
                    'amount' => $subscription->price,
                    'start_date' => $startDate,
                    'end_date' => $endDate,
                    'status' => 'active',
                ]);
                User::where('id', $userId)->update(['profile_view_count' => $subscription->profile_view_count]);
            }
        }catch(\Exception $e){
            \Log::error($e->getMessage());
        }

        // You can now use $userId for any post-payment logic
        if ($finalStatus == 'success') {
            return view('payment.success');
        } else {
            return view('payment.failure');
        }
    }

    private function checkPaymentStatus($orderId)
    {
        $baseUrl = env('PHONEPE_PRODUCTION_BASE_URL', 'https://api.phonepe.com/apis/pg');
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
        $authUrl = env('PHONEPE_PRODUCTION_AUTH_BASE_URL', 'https://api.phonepe.com/apis/identity-manager').'/v1/oauth/token';
        $payload = [
            'client_id' => env('PHONEPE_PRODUCTION_CLIENT_ID', 'SU2509191550287969506183'),
            'client_version' => env('PHONEPE_PRODUCTION_CLIENT_VERSION', '1'),
            'client_secret' => env('PHONEPE_PRODUCTION_CLIENT_SECRET', 'd46c4a0f-50a6-42ae-bbf0-8a2d63ff77eb'),
            'grant_type' => 'client_credentials',
        ];

        $response = Http::asForm()->post($authUrl, $payload);

        if (! $response->ok()) {
            throw new \Exception('PhonePe Auth Failed: '.$response->body());
        }

        return $response['access_token'];
    }
}
