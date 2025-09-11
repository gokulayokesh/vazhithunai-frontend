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
            <h2><img src="{{ asset('assets/img/logo.png') }}" style="max-height: 32px;margin-right: 8px;"
                    alt="">Vazhithunai Matrimony</h2>
            <p>வாழ்த்துக்கள்! <br> <br>Welcome to Vazhithunai</p>
        </div>
        <div class="content">
            <p>Dear {{ $userName }},</p>
            <p>Thank you for registering with <strong>Vazhithunai Matrimony</strong>.</p>
            <p>To complete your registration, please use the following One-Time Password (OTP):</p>
            <div class="otp">{{ $otp }}</div>
            <p>This OTP is valid for the next <strong>10 minutes</strong>. Please do not share it with anyone for
                security reasons.</p>

            <hr>
            <p><strong>தமிழில்:</strong></p>
            <p>அன்புள்ள {{ $userName }},</p>
            <p><strong>வழித்துணை மணமுறை</strong> தளத்தில் பதிவு செய்ததற்கு நன்றி.</p>
            <p>உங்கள் பதிவை முடிக்க, கீழே உள்ள ஒருமுறை கடவுச்சொல்லை (OTP) பயன்படுத்தவும்:</p>
            <div class="otp">{{ $otp }}</div>
            <p>இந்த OTP அடுத்த <strong>10 நிமிடங்கள்</strong> மட்டுமே செல்லுபடியாகும். பாதுகாப்பிற்காக இதை யாருடனும்
                பகிர வேண்டாம்.</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Vazhithunai Matrimony. All rights reserved.
        </div>
    </div>
</body>

</html>
