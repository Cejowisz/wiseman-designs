<html>
<head>
    <title>Verify Email</title>
</head>
<body>
    <h2>Dear Awesome {{ $user->fullname }}</h2>
    <h4>We are excited to have you onboard!</h4>
    <p>
        Click the following link to verify your email
        {{url('/verifyemail/?emailToken='.$user->verifyUser->token)}}
    </p>
</body>
</html>