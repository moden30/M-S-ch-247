<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Arvo'>
</head>

<body>
<style>
    :root {
        --blue: #293b49;
        --pink: #fdabaf;
        --pink-light: #ffe0e6;
        --green: #04cba0;
        --green-dark: #01ac88;
        --white: white;
    }

    html, body {

        font-size: 62.5%;
        font-family: "Lato", sans-serif;
        font-size: 1.5rem;
        color: var(--blue);
    }

    a {
        text-decoration: none;
    }

    .center {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .error {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-content: center;
    }

    .number {
        font-weight: 900;
        font-size: 15rem;
        line-height: 1;
    }

    .illustration {
        position: relative;
        width: 12.2rem;
        margin: 0 2.1rem;
    }

    .circle {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 12.2rem;
        height: 11.4rem;
        border-radius: 50%;
        background-color: var(--blue);
    }

    .clip {
        position: absolute;
        bottom: 0.3rem;
        left: 50%;
        transform: translateX(-50%);
        overflow: hidden;
        width: 12.5rem;
        height: 13rem;
        border-radius: 0 0 50% 50%;
    }

    .paper {
        position: absolute;
        bottom: -0.3rem;
        left: 50%;
        transform: translateX(-50%);
        width: 9.2rem;
        height: 12.4rem;
        border: 0.3rem solid var(--blue);
        background-color: var(--white);
        border-radius: 0.8rem;
    }

    .paper::before {
        content: "";
        position: absolute;
        top: -0.7rem;
        right: -0.7rem;
        width: 1.4rem;
        height: 1rem;
        background-color: var(--white);
        border-bottom: 0.3rem solid var(--blue);
        transform: rotate(45deg);
    }

    .face {
        position: relative;
        margin-top: 2.3rem;
    }

    .eyes {
        position: absolute;
        top: 0;
        left: 2.2rem; /* Điều chỉnh khoảng cách từ cạnh trái để cân bằng giữa mắt và mặt */
        width: 4.6rem;
        height: 0.8rem;
    }

    .eye {
        position: absolute;
        bottom: 0;
        width: 0.8rem;
        height: 0.8rem;
        border-radius: 50%;
        background-color: var(--blue);
        animation: eye-blink 2s infinite ease-in-out; /* Reduced duration for faster blinking */
    }

    .eye-left {
        left: 0;
    }

    .eye-right {
        right: 0;
    }

    @keyframes eye-blink {
        0%, 20%, 100% { height: 0.8rem; } /* Mở mắt trước và sau khi nháy */
        10% { height: 0.1rem; } /* Nháy mắt */
    }
    .rosyCheeks {
        position: absolute;
        top: 1.6rem;
        width: 1rem;
        height: 0.2rem;
        border-radius: 50%;
        background-color: var(--pink);
    }

    .rosyCheeks-left {
        left: 0.9rem; /* Điều chỉnh lại để cân đối */
    }

    .rosyCheeks-right {
        right: 0.9rem; /* Điều chỉnh lại để cân đối */
    }

    .mouth {
        position: absolute;
        top: 3.1rem;
        left: 50%;
        width: 1.6rem;
        height: 0.2rem;
        border-radius: 0.1rem;
        transform: translateX(-50%);
        background-color: var(--blue);
    }

    .text {
        margin-top: 5rem;
        font-weight: 300;
        color: var(--blue);
    }

    .button {
        margin-top: 4rem;
        padding: 0.8rem 2rem; /* Giảm kích thước của padding để làm nhỏ nút lại */
        color: var(--white);
        background-color: var(--green);
        border-radius: 10px; /* Thêm góc bo tròn */
        font-size: 0.9rem; /* Giảm kích thước phông chữ nếu cần */
        text-transform: uppercase; /* Tùy chọn: biến chữ thành chữ hoa */
        transition: background-color 0.3s; /* Hiệu ứng chuyển màu nền mượt mà */
    }

    .button:hover {
        background-color: var(--green-dark);
        text-decoration: none
    }

    .by {
        position: absolute;
        bottom: 0.5rem;
        left: 0.5rem;
        text-transform: uppercase;
        color: var(--blue);
    }

    .byLink {
        color: var(--green);
    }

    p {
        color: var(--blue); /* Màu chữ */
        font-size: 2rem; /* Kích thước chữ */
        text-align: center; /* Căn giữa chữ */
        margin-top: 2rem; /* Khoảng cách từ phần trên */
        padding: 1rem; /* Đệm xung quanh văn bản */


        max-width: 80%; /* Giới hạn chiều rộng tối đa của đoạn văn */
        margin-left: auto; /* Căn giữa theo chiều ngang */
        margin-right: auto; /* Căn giữa theo chiều ngang */
    }
</style>

<div class="center">
    <div class="error">
        <div class="number">4</div>
        <div class="illustration">
            <div class="circle"></div>
            <div class="clip">
                <div class="paper">
                    <div class="face">
                        <div class="eyes">
                            <div class="eye eye-left"></div>
                            <div class="eye eye-right"></div>
                        </div>
                        <div class="rosyCheeks rosyCheeks-left"></div>
                        <div class="rosyCheeks rosyCheeks-right"></div>
                        <div class="mouth"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="number">4</div>
    </div>


    <a class="button" href="#" onclick="window.history.back(); return false;">Quay lại</a>

    <p class="">Trang bạn tìm kiếm không tồn tại</p>

</div>
</body>

</html>
