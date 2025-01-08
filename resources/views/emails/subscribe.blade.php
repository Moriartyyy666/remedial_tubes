<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Email Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .email-container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #444;
        }
        p {
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <header>
            <h1 style="color: #444; font-family: Arial, sans-serif;">{{{ $data['subject'] }}}</h1>
        </header>
        <main>
            <p style="font-size: 14px; color: #555; line-height: 1.6;">{{{ $data['body'] }}}</p>
        </main>
        <footer>
            <p style="font-size: 12px; color: #999;">This is an automated email. Please do not reply.</p>
        </footer>
    </div>
    <!--[if !mso]>
    <p>If you are unable to view this email, please check your email client settings.</p>
    <![endif]-->
</body>
</html>
