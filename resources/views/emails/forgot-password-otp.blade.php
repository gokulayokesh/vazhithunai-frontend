<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification - Vazhithunai Matrimony</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #de5255;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .content {
            padding: 20px;
            color: #333333;
            line-height: 1.6;
        }

        .otp {
            font-size: 24px;
            font-weight: bold;
            color: #de5255;
            text-align: center;
            margin: 20px 0;
        }

        .footer {
            background-color: #f1f1f1;
            padding: 15px;
            text-align: center;
            font-size: 12px;
            color: #777777;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2><img src="{{ asset('assets/img/logo.webp') }}" style="max-height: 32px;margin-right: 8px;"
                    alt="">Vazhithunai Matrimony</h2>
            <h1>OTP Verification</h1>
        </div>
        <div class="content">
            <p>Dear User,</p>
            <p>We received a request to reset your password. Please use the OTP below to proceed with resetting your
                password:</p>
            <div class="otp">{{ $otp }}</div>
            <p>This OTP is valid for the next 10 minutes. If you did not request a password reset, please ignore this
                email.</p>
            <p>Thank you,<br>The Vazhithunai Matrimony Team</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Vazhithunai Matrimony. All rights reserved.
        </div>
    </div>
</body>

</html>
