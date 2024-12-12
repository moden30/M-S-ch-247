<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mật khẩu của bạn đã được thay đổi</title>
</head>

<body>
<h1>Thông báo từ {{ config('app.name') }}</h1>
<p>Chào bạn,</p>
<p>Mã OTP của bạn là: <strong>{{ $otp }}</strong></p>
<p>Mã OTP này sẽ hết hạn sau 5 phút.</p>

</body>

</html>
