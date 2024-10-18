<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mật khẩu của bạn đã được thay đổi</title>
</head>

<body>
    <h1>Thông báo từ {{ config('app.name') }}</h1>
    <p>Xin chào {{ $user->ten_doc_gia }},</p>
    <p>Mật khẩu mới của bạn là: {{ $newPassword }}</p>
    <p>Lưu ý bảo mật thông tin này.</p>
</body>

</html>
