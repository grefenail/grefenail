//<!-- USE FOR FORGOT PASSWORD EMAIL VERIFICATION FEATURE  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <p>Hi,</p>
    <p>You can reset your password by clicking on the following link:</p>
    <a href="{{ route('reset.password', $token) }}">Reset Password</a>
    <p>If you didn't request this, please ignore this email.</p>
    <p>Thanks,</p>
    <p>Your Company Name</p>
</body>
</html>


