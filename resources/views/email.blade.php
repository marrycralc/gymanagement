<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            max-width: 600px;
            margin: 0 auto;
        }
        h1 {
            color: #333;
        }
        p {
            color: #555;
        }
        .cta-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }   
       
    </style>
</head>
<body>
    <div class="container">
        <h1>Thank You for Subscribing!</h1>
        <p>Hello {{$maildat}},</p>
        <p>You're now subscribed to our newsletter! We'll keep you updated with the latest news, offers, and more.</p>
       
        <p>Best regards,<br>gymmanagement.local</p>
    </div>
</body>
</html>
