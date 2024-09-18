<!DOCTYPE html>
<html>
<head>
    <title>Phản Hồi Khách Hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #000000;
            margin-top: 0;
            font-size: 24px;
            font-weight: bold;
        }
        h3 {
            color: #000000;
            margin-top: 20px;
            font-size: 20px;
            font-weight: bold;
        }
        p {
            line-height: 1.6;
            margin-bottom: 16px;
        }
        .footer {
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #e0e0e0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Phản Hồi Khách Hàng</h2>
        <h3>Thân gửi anh/chị {{ $data['ten_khach_hang'] }},</h3>
        <p>Chúng tôi xin cảm ơn anh/chị đã liên hệ với chúng tôi vào ngày {{ $data['created_at'] }}. Dưới đây là phản hồi của chúng tôi về yêu cầu của anh/chị:</p>
        <h3>{{ $data['tieu_de'] }}</h3>
        <p>{!! $data['noi_dung'] !!}</p>
        <p>Nếu anh/chị có bất kỳ câu hỏi hoặc cần thêm thông tin, xin vui lòng phản hồi lại email này. Chúng tôi sẵn sàng hỗ trợ anh/chị bất kỳ lúc nào.</p>
        <p class="footer">Thân ái và quyết thắng,<br>Đội ngũ hỗ trợ khách hàng</p>
    </div>
</body>
</html>
