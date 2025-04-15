<!DOCTYPE html>
<html>
<head>
    <title>Your Verification Code</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9;">
        <!-- Header with Logo -->
        <div style="text-align: center; padding: 20px; background-color: #ffffff; border-bottom: 1px solid #e5e5e5;">
            <img src="{{ asset('img/logo.png') }}" alt="{{ config('app.name') }} Logo" style="max-width: 150px; height: auto;">
            <h1 style="font-size: 24px; margin: 10px 0;">{{ config('app.name') }}</h1>
        </div>

        <!-- Content -->
        <div style="padding: 20px; background-color: #ffffff; margin-top: 10px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <h2 style="font-size: 20px; color: #333;">Verification Code</h2>
            <p style="font-size: 16px;">Hello, {{ $username ?? 'User' }}</p>
            <p style="font-size: 16px;">Thank you for registering with {{ config('app.name') }}. Please use the following code to verify your account:</p>
            
            <div style="text-align: center; margin: 20px 0;">
                <span style="display: inline-block; font-size: 24px; font-weight: bold; color: #ffffff; background-color: #1a73e8; padding: 10px 20px; border-radius: 5px;">{{ $code ?? '' }}</span>
            </div>

            <p style="font-size: 16px;">This code is valid for the next 5 minutes. If you didn’t request this, please ignore this email.</p>
            
            <!-- CTA Button -->
            <div style="text-align: center; margin: 20px 0;">
                <a href="{{ url('/verify') }}" style="display: inline-block; font-size: 16px; color: #ffffff; background-color: #1a73e8; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Verify Now</a>
            </div>
        </div>

        <!-- Footer -->
        <div style="text-align: center; padding: 20px; font-size: 14px; color: #777;">
            <p>© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            <p>If you have any questions, contact us at <a href="mailto:support@example.com" style="color: #1a73e8; text-decoration: none;">support@example.com</a>.</p>
        </div>
    </div>
</body>
</html>