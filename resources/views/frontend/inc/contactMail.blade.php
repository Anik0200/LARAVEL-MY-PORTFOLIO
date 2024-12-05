<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }

        .email-header {
            background-color: #007BFF;
            color: #ffffff;
            padding: 30px;
            text-align: center;
        }

        .email-header h1 {
            color: #ffffff;
            text-align: center;
            margin-bottom: -5px;
        }

        .email-header h2 {
            color: #ffffff;
            text-align: center;
            font-size: 13px;
        }

        .email-body {
            padding: 20px;
            color: #333333;
            line-height: 1.6;
        }

        .email-body .subject {
            font-weight: bold;
            margin-bottom: -18px;
            color: #007BFF;
            font-size: 20px;
        }

        .email-body .message {
            color: #000000b2;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-header">
            <h1>{{ $data['name'] }}</h1>
            <h2>{{ $data['email'] }}</h2>
        </div>
        <div class="email-body">
            <p class="subject">{{ $data['subject'] }},</p>
            <p class="message">{{ $data['message'] }}</p>
        </div>
    </div>
</body>

</html>
