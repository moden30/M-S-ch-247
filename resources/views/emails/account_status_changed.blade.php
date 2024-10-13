<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Status Changed</title>
</head>

<body>
    <h1>Thông báo từ {{ config('app.name') }}</h1>
    <p>Xin chào {{ $user->ten_doc_gia }},</p>
    @if ($status === 'khoa')
        <p>Tài khoản của bạn đã bị khóa. Nếu bạn cần hỗ trợ, vui lòng liên hệ với chúng tôi.</p>
    @else
        <p>Tài khoản của bạn đã được mở khóa và bạn có thể đăng nhập lại.</p>
    @endif
    <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!</p>
</body>

</html>
