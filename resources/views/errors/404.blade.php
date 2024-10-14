<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>
    <style>
   body {
    margin: 0;
    padding: 0;
    overflow: hidden; /* Để ẩn thanh cuộn nếu có */
    background: url('{{ asset('assets/error/lopi12.png') }}') no-repeat center center; /* Đường dẫn đến ảnh nền */
    background-size: cover; /* Để ảnh phủ toàn bộ nền */
    color: #343a40;
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    position: relative;
}

        .bubbles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
            z-index: -1; /* Đặt background xuống dưới nội dung */
        }

        .bubble {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 192, 203, 0.7), rgba(169, 169, 169, 0)); /* Màu sắc loang 3D */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Hiệu ứng bóng đổ 3D */
            animation: bubbleMovement 10s infinite, colorChange 5s infinite;
            opacity: 0.7;
        }

        /* Tạo các kích thước khác nhau cho các bong bóng */
        .bubble:nth-child(1) { width: 150px; height: 150px; animation-duration: 8s; }
        .bubble:nth-child(2) { width: 200px; height: 200px; animation-duration: 10s; }
        .bubble:nth-child(3) { width: 250px; height: 250px; animation-duration: 12s; }
        .bubble:nth-child(4) { width: 300px; height: 300px; animation-duration: 14s; }
        .bubble:nth-child(5) { width: 350px; height: 350px; animation-duration: 16s; }
        .bubble:nth-child(6) { width: 400px; height: 400px; animation-duration: 18s; }
        .bubble:nth-child(7) { width: 150px; height: 150px; animation-duration: 10s; }
        .bubble:nth-child(8) { width: 200px; height: 200px; animation-duration: 12s; }
        .bubble:nth-child(9) { width: 250px; height: 250px; animation-duration: 14s; }
        .bubble:nth-child(10) { width: 300px; height: 300px; animation-duration: 16s; }
        .bubble:nth-child(11) { width: 350px; height: 350px; animation-duration: 18s; }
        .bubble:nth-child(12) { width: 400px; height: 400px; animation-duration: 20s; }
        .bubble:nth-child(13) { width: 150px; height: 150px; animation-duration: 12s; }
        .bubble:nth-child(14) { width: 200px; height: 200px; animation-duration: 14s; }
        .bubble:nth-child(15) { width: 250px; height: 250px; animation-duration: 16s; }

        @keyframes bubbleMovement {
            0% {
                transform: translateY(0) scale(1);
                opacity: 0.6;
            }
            50% {
                transform: translateY(-100px) scale(1.5);
                opacity: 0.8;
            }
            100% {
                transform: translateY(0) scale(1);
                opacity: 0.6;
            }
        }

        @keyframes colorChange {
            0% {
                background: radial-gradient(circle, rgba(255, 192, 203, 0.7), rgba(169, 169, 169, 0));
            }
            50% {
                background: radial-gradient(circle, rgba(255, 182, 193, 0.7), rgba(192, 192, 192, 0));
            }
            100% {
                background: radial-gradient(circle, rgba(255, 192, 203, 0.7), rgba(169, 169, 169, 0));
            }
        }

        .container {
            position: relative;
            text-align: center;
            z-index: 1; /* Đặt nội dung lên trên background */
        }
        h1 {
            font-size: 3rem;
        }
        p {
            font-size: 1.5rem;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .video-container {
            position: relative;
            width: 250px;
            height: 250px;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ffffff;
            animation: videoBounce 2s infinite;
            animation-delay: 0.5s;
        }
        .video-container video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .error-code1, .error-code2 {
            font-size: 6rem;
            margin: 0 20px;
            display: flex;
            align-items: center;
        }
        .error-code1 {
            animation: numberBounce 1.5s infinite;
            animation-delay: 0s;
        }
        .error-code2 {
            animation: numberBounce 1.5s infinite;
            animation-delay: 0.75s;
        }
        .flex-container {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        @keyframes numberBounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-40px);
            }
            60% {
                transform: translateY(-20px);
            }
        }
        @keyframes videoBounce {
            0%, 25%, 50%, 75%, 100% {
                transform: translateY(0);
            }
            10% {
                transform: translateY(-20px);
            }
            30% {
                transform: translateY(-10px);
            }
            40% {
                transform: translateY(-30px);
            }
            60% {
                transform: translateY(-10px);
            }
            70% {
                transform: translateY(-20px);
            }
        }

        /* Phong cách cho các hình ảnh */
        .floating-img {
            position: absolute;
            opacity: 0.2;
            animation: floatAndBounce 8s infinite;
        }

        @keyframes floatAndBounce {
            0% {
                transform: translateY(0) rotate(0deg);
            }
            25% {
                transform: translateY(-50px) rotate(15deg);
            }
            50% {
                transform: translateY(0) rotate(-15deg);
            }
            75% {
                transform: translateY(50px) rotate(15deg);
            }
            100% {
                transform: translateY(0) rotate(0deg);
            }
        }

        /* Đặt vị trí và kích cỡ cho các hình ảnh */
        .floating-img:nth-child(1) { top: 12%; left: 55%; width: 250px; }
        .floating-img:nth-child(2) { top: 45%; left: 70%; width: 400px; }
        .floating-img:nth-child(3) { top: 70%; left: 20%; width: 340px; }
        .floating-img:nth-child(4) { top: 30%; left: 80%; width: 260px; }
        .floating-img:nth-child(5) { top: 80%; left: 40%; width: 280px; }
        .floating-img:nth-child(6) { top: 20%; left: 35%; width: 300px; }
        .floating-img:nth-child(7) { top: 60%; left: 60%; width: 320px; }
        .floating-img:nth-child(8) { top: 50%; left: 15%; width: 240px; }
        .floating-img:nth-child(9) { top: 10%; left: 10%; width: 360px; }
        .floating-img:nth-child(10) { top: 75%; left: 80%; width: 280px; }
        .floating-img:nth-child(11) { top: 35%; left: 25%; width: 300px; }
        .floating-img:nth-child(12) { top: 85%; left: 10%; width: 320px; }
        .floating-img:nth-child(13) { top: 25%; left: 65%; width: 340px; }
        .floating-img:nth-child(14) { top: 55%; left: 90%; width: 360px; }
        .floating-img:nth-child(15) { top: 40%; left: 50%; width: 380px; }

    </style>
</head>
<body>
    <div class="bubbles">
        <!-- Tạo các bong bóng -->
        <div class="bubble" style="top: 20%; left: 10%;"></div>
        <div class="bubble" style="top: 30%; left: 25%;"></div>
        <div class="bubble" style="top: 50%; left: 35%;"></div>
        <div class="bubble" style="top: 10%; left: 50%;"></div>
        <div class="bubble" style="top: 40%; left: 60%;"></div>
        <div class="bubble" style="top: 20%; left: 75%;"></div>
        <div class="bubble" style="top: 60%; left: 20%;"></div>
        <div class="bubble" style="top: 70%; left: 40%;"></div>
        <div class="bubble" style="top: 80%; left: 55%;"></div>
        <div class="bubble" style="top: 15%; left: 70%;"></div>
        <div class="bubble" style="top: 25%; left: 85%;"></div>
        <div class="bubble" style="top: 35%; left: 10%;"></div>
        <div class="bubble" style="top: 50%; left: 25%;"></div>
        <div class="bubble" style="top: 65%; left: 45%;"></div>
        <div class="bubble" style="top: 80%; left: 60%;"></div>
    </div>
    <div class="container">
        <h1>404 - Ulatroi không tìm thấy trang rồi!</h1>
        <p>"Ôi không! Có vẻ như bạn đã lạc vào một vũ trụ khác. <br> Trang bạn tìm kiếm không tồn tại. <br> Hãy quay lại trang chính để tiếp tục hành trình của bạn!"</p>
        <div class="flex-container">
            <div class="error-code1" style="font-size: 330px; font-weight: bold; color:rgb(0, 0, 0);">4</div>

            <div class="video-container">
                <video autoplay muted loop>
                    <source src="{{ asset('assets/error/5665309144827.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="error-code2" style="font-size: 330px; font-weight: bold; color:black;">4</div>
        </div>
        <button onclick="window.history.back();" style="padding: 10px 20px; background-color: #e91e63; color: white; border: none; border-radius: 8px; cursor: pointer; font-size: 16px; font-family: Arial, sans-serif;">Quay lại</button>


    </div>

    <!-- Thêm các hình ảnh bay nhảy -->
    <img src="{{asset('assets/error/lopi1.png')}}" class="floating-img">
    <img src="{{asset('assets/error/lopi2.png')}}" class="floating-img">
    <img src="{{asset('assets/error/lopi3.png')}}" class="floating-img">
    <img src="{{asset('assets/error/lopi4.png')}}" class="floating-img">
    <img src="{{asset('assets/error/lopi5.png')}}" class="floating-img">
    <img src="{{asset('assets/error/lopi6.png')}}" class="floating-img">
    <img src="{{asset('assets/error/lopi7.png')}}" class="floating-img">
    <img src="{{asset('assets/error/lopi8.png')}}" class="floating-img">
    <img src="{{asset('assets/error/lopi9.png')}}" class="floating-img">
    <img src="{{asset('assets/error/lopi10.png')}}" class="floating-img">
    <img src="{{asset('assets/error/lopi11.png')}}" class="floating-img">


</body>
</html>
