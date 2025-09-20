<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SmsService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function sendOtp(string $mobile, int $otp, array $params = [])
    {
        $url = 'https://control.msg91.com/api/v5/otp';

        $response = Http::withHeaders([
            'content-type' => 'application/json',
            'Content-Type' => 'application/JSON',
        ])->post($url, [
            'mobile' => $mobile,
            'otp' => $otp,
            'authkey' => config('services.msg91.auth_key'),
            'otp_expiry' => 5,
            'template_id' => config('services.msg91.template_id'),
            'realTimeResponse' => 1,
            // dynamic params for template
            'Param1' => $params['Param1'] ?? 'value1',
            'Param2' => $params['Param2'] ?? 'value2',
            'Param3' => $params['Param3'] ?? 'value3',
        ]);

        if ($response->failed()) {
            throw new \Exception('MSG91 OTP send failed: '.$response->body());
        }

        return $response->json();
    }
}
