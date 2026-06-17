<!DOCTYPE html>
<html>
<head>
    <title>New Contact Form Submission</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f9fafb; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .header { background: linear-gradient(135deg, #f97316, #ea580c); color: white; padding: 20px; border-radius: 8px 8px 0 0; margin: -30px -30px 25px -30px; }
        .field { margin-bottom: 15px; }
        .field strong { display: inline-block; width: 120px; color: #374151; }
        .message-box { background: #f9fafb; padding: 15px; border-radius: 8px; border-left: 4px solid #f97316; margin-top: 10px; }
        .footer { margin-top: 30px; padding-top: 20px; border-top: 1px solid #e5e7eb; color: #6b7280; font-size: 14px; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2 style="margin: 0;">📬 New Contact Form Submission</h2>
        </div>
        
        <div class="field">
            <strong>Name:</strong> {{ $name }}
        </div>
        <div class="field">
            <strong>Email:</strong> {{ $email }}
        </div>
        <div class="field">
            <strong>Subject:</strong> {{ $subject }}
        </div>
        
        <div class="field">
            <strong>Message:</strong>
            <div class="message-box">
                {{ $message_content }}
            </div>
        </div>
        
        <div class="footer">
            This email was sent from the Vefiri Contact Form.
        </div>
    </div>
</body>
</html>