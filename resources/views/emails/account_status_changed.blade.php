<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Status Changed</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }

        h1 {
            font-size: 24px;
            color: #444;
        }

        p {
            margin: 10px 0;
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }

        .footer a {
            color: #0066cc;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
<div class="container">
    <h1>Thông báo từ {{ config('app.name') }}</h1>
    <p>Xin chào {{ $user->ten_doc_gia }},</p>

    @if ($status === 'khoa')
        <p>Chúng tôi xin thông báo rằng tài khoản của bạn đã bị khóa. Lý do: <strong>{{ $reason }}</strong>.</p>
        <p>Nếu bạn có bất kỳ thắc mắc nào hoặc cần hỗ trợ, vui lòng liên hệ với chúng tôi qua thông tin dưới đây.</p>
    @else
        <p>Chúng tôi rất vui khi thông báo rằng tài khoản của bạn đã được mở khóa. Bạn có thể đăng nhập lại và tiếp tục sử dụng dịch vụ của chúng tôi.</p>
    @endif

    <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!</p>

    <div class="footer">
        <p>Đội ngũ hỗ trợ {{ config('app.name') }}</p>
        <p>Email liên hệ: <a href="mailto:mesach247@gmail.com">mesach247@gmail.com</a></p>
        <p>Hotline: 0988306943</p>
        <p>Truy cập <a href="{{ config('app.url') }}">{{ config('app.url') }}</a> để biết thêm thông tin.</p>
    </div>
</div>
</body>

</html>
