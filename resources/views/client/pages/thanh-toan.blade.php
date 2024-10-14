@extends('client.layouts.app')
@section('content')

    <body>
        <style>
            .dd {
                display: flex;
                justify-content: space-between;
                padding: 20px;
            }

            .payment-options,
            .payment-info {
                width: 48%;
            }

            .payment-options ul {
                list-style: none;
                padding: 0;
            }

            .payment-options li {
                padding: 10px;
                border: 1px solid #a1a1a1;
                border-radius: 10px;
                background-color: #ffffff;
                margin-bottom: 10px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            .payment-options li.active,
            .payment-options li:hover {
                background-color: #cecece;
            }

            .bank-list {
                display: none;
                list-style: none;
                padding: 0;
                margin-top: 10px;
            }

            .bank-list li {
                padding: 5px 10px;
                cursor: pointer;
            }

            .payment-info h2,
            .payment-options h2 {

            }

            button {
                background-color: #4CAF50;
                border: none;
                padding: 10px 20px;
                color: white;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            button:hover {
                background-color: #45a049;
            }

            .hr-primary {
		    border-top-width: 5px;
		    margin: 0px 0px 20px 0px;
			border-width: 0;
			border-color: #1ebbf0;
			-moz-border-image: -moz-linear-gradient(left,#1ebbf0 30%,#39dfaa 100%);
			-webkit-border-image: -webkit-linear-gradient(left,#1ebbf0 30%,#39dfaa 100%);
			border-image: linear-gradient(left,#1ebbf0 30%,#39dfaa 100%);
			border-image-slice: 1;
		    height: 2px;
			border-style: solid;
			border-width: 2px;
			border-color: rgba(0,0,0,.08);
			border-left: none;
			border-right: none;
			border-bottom: none;
			line-height: 9px;
		}
        </style>




        <div class="container">
            <div class="outer-container">
                <h1>Trang thanh toán</h1>
            </div>
            <div class="dd outer-container">

                <div class="payment-options outer-container">
                    <h2>Chọn hình thức thanh toán</h2>
                    <div class="hr-primary"></div>
                    <ul>
                        <li class="active"><span>Quét QR CODE</span></li>
                        <li id="atm-banking"><span>Thẻ ATM có Internet Banking</span>
                            <ul class="bank-list">
                                <li>Vietcombank</li>
                                <li>Vietinbank</li>
                                <li>TPBank</li>
                                <li>BIDV</li>
                            </ul>
                        </li>
                        <li><span>Thẻ quốc tế Visa/Master/JBC</span></li>
                        <li><span>Ví điện tử</span></li>
                    </ul>
                </div>
                <div class="outer-container">
                    <div class="dd2 d-flex">
                        <div class="product-image me-5" style="text-align: left;">
                            <img data-src="https://truyenhdt.com/wp-content/uploads/2024/08/phe-thai-tu-an-dua-xem-dien-o-nien-dai-van-1725140098.jpg"
                                 style="width: 195px; height: auto; border-radius: 8px;" />
                        </div>

                        <div class="payment-info">
                            <h2>Thông tin thanh toán</h2>
                            <div class="hr-primary"></div>
                            <p><strong>Sản phẩm:</strong> Đặt ấm - Những điểm ma quái nhất Châu Á</p>
                            <p><strong>Tạm tính:</strong> 79.000 đ</p>
                            <p><strong>Hình thức thanh toán:</strong> Quét QR CODE</p>
                            <p><strong>Giảm giá:</strong> 37.97%</p>
                            <p><strong>Tổng:</strong> 49.000 đ</p>
                            <button class="btn btn-primary">Thanh toán</button>
                        </div>
                    </div>
                </div>
<style>
    .outer-container {
    border-radius: 15px; /* Bo góc của khối chứa ngoài */
    box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Tạo đổ bóng cho khối */
    padding: 20px; /* Thêm khoảng cách bên trong */
    background-color: white; /* Nền màu trắng */
    margin: 20px 0; /* Thêm margin để tách biệt khối này với các phần khác */
}
</style>
            </div>
        </div>
    </body>

    <script>
        document.querySelectorAll('.payment-options li').forEach(item => {
            item.addEventListener('click', function() {
                // Remove active class from any active items
                document.querySelector('.payment-options .active')?.classList.remove('active');
                this.classList.add('active');

                // Show or hide the bank list
                const bankList = document.querySelector('.bank-list');
                if (this.id === 'atm-banking') {
                    bankList.style.display = 'block';
                } else {
                    bankList.style.display = 'none';
                }
            });
        });
    </script>
@endsection
