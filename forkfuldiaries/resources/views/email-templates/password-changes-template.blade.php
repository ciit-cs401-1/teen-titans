<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Changed Successfully</title>
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
        .email-credentials {
            background-color: #f0f0f0;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .email-credentials p {
            margin: 5px 0;
            font-weight: bold;
        }
        .email-footer {
            text-align: center;
            font-size: 12px;
            color: #aaaaaa;
            margin-top: 30px;
        }
        @media only screen and (max-width: 600px) {
            .email-credentials {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Password Changed Successfully</h1>
        </div>
        <div class="email-body">
            <h4>Hello, {{ $user->name }}</h4>
            <p>Your password has been successfully updated. Please find your updated login credentials below:</p>

            <div class="email-credentials">
                <p>Email/Username: {{ $user->email }}</p>
                <p>New Password: {{ $new_password }}</p>
            </div>

            <p>If you didnt perform this action, please contact our support team immediately.</p>
            <p>Thanks,<br>The Support Team</p>
        </div>
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} Forkful Diaries. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
