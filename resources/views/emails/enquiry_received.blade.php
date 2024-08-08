<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Enquiry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #4CAF50;
        }
        p {
            margin: 0 0 10px;
        }
        .footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thank You for Your Enquiry</h1>
        <p>Dear {{ $name }},</p>
        <p>Thank you for reaching out to us. We have received your enquiry and will get back to you as soon as possible.</p>
        <p>Here are the details we have received:</p>
        <ul>
            <li><strong>Name:</strong> {{ $name }}</li>
            <li><strong>Email:</strong> {{ $email }}</li>
            <li><strong>Phone:</strong> {{ $telephone }}</li>
            <li><strong>Subject:</strong> {{ $subject }}</li>
        </ul>
        <p>If you have any additional questions, feel free to reply to this email.</p>
        <p>Best regards,</p>
        <p>The [Your Company Name] Team</p>
        <div class="footer">
            <p>[Your Company Name]</p>
            <p>[Company Address]</p>
            <p>[Company Phone]</p>
            <p>[Company Email]</p>
        </div>
    </div>
</body>
</html>
