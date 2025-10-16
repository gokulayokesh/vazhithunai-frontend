<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Completed - Vazhithunai Matrimony</title>
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

        .footer {
            background-color: #f1f1f1;
            padding: 15px;
            text-align: center;
            font-size: 12px;
            color: #777777;
        }

        .highlight {
            color: #de5255;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>
                <img src="{{ asset('assets/img/logo.webp') }}" style="max-height: 32px; margin-right: 8px;" alt="">
                Vazhithunai Matrimony
            </h2>
            <p>வாழ்த்துக்கள்! <br><br>Welcome to Vazhithunai</p>
        </div>
        <div class="content">
            <p>Dear {{ $userName }},</p>
            <p>We're excited to let you know that your profile has been <span class="highlight">successfully
                    completed</span> on <strong>Vazhithunai Matrimony</strong>.</p>
            <p>You can now:</p>
            <ul>
                <li>✅ Discover personalized matches</li>
                <li>✅ Connect with verified members</li>
                <li>✅ Receive updates tailored to your preferences</li>
            </ul>
            <p>Visit your dashboard anytime to update your details or explore new features.</p>
            <p>Thank you for joining us – we’re honored to support your journey!</p>

            <hr>
            <p><strong>தமிழில்:</strong></p>
            <p>அன்புள்ள {{ $userName }},</p>
            <p>உங்கள் சுயவிவர பதிவு <strong>வழித்துணை திருமண சேவையில்</strong> <span class="highlight">வெற்றிகரமாக
                    முடிந்தது</span>.</p>
            <p>இப்போது நீங்கள்:</p>
            <ul>
                <li>✅ தனிப்பயன் பொருத்தங்களை காணலாம்</li>
                <li>✅ சரிபார்க்கப்பட்ட உறுப்பினர்களுடன் இணைக்கலாம்</li>
                <li>✅ உங்கள் விருப்பங்களுக்கு ஏற்ப தகவல்களை பெறலாம்</li>
            </ul>
            <p>உங்கள் dashboard-ஐ எப்போது வேண்டுமானாலும் அணுகி விவரங்களை புதுப்பிக்கலாம்.</p>
            <p>உங்களை வரவேற்கிறோம் – உங்கள் வாழ்க்கைப் பயணத்தில் எங்களின் பங்கு பெருமிதம் தருகிறது!</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Vazhithunai Matrimony. All rights reserved.
        </div>
    </div>
</body>

</html>
