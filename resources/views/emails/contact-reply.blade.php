<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $replySubject }}</title>
</head>
<body style="font-family: Arial, sans-serif; color: #222; line-height: 1.6;">
    <p>Hi {{ $contact->full_name ?: 'there' }},</p>

    {!! nl2br(e($replyMessage)) !!}

    <hr style="border: 0; border-top: 1px solid #ddd; margin: 24px 0;">

    <p style="font-size: 13px; color: #666;">
        Original message subject: {{ $contact->subject }}
    </p>
</body>
</html>
