<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
        }
        .email-header h1 {
            color: #333333;
            margin-bottom: 20px;
        }
        .email-body {
            color: #555555;
            font-size: 16px;
            line-height: 1.6;
        }
        .reset-button {
            display: inline-block;
            background-color: #007bff;
            color: #ffffff;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            width: 100%;
            text-align: center;
            font-weight: bold;
        }
        .email-footer {
            text-align: center;
            font-size: 12px;
            color: #aaaaaa;
            margin-top: 30px;
        }
        @media only screen and (max-width: 600px) {
            .reset-button {
                width: 100% !important;
                padding: 14px !important;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Reset Your Password</h1>
        </div>
        <div class="email-body">
            <h4>Hello, {{ $user->name }}</h4>
            <p>You requested to reset your password. Click the button below to reset it.</p>
            <a href="{{ $actionlink }}" target="_blank" class="reset-button">Reset Password</a>
            <p>If you did not request a password reset, please ignore this email or contact support if you have questions.</p>
            <p>Thanks,<br>The Support Team</p>
        </div>
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} Forkful Diaries. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
