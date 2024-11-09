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
            -moz-border-image: -moz-linear-gradient(left, #1ebbf0 30%, #39dfaa 100%);
            -webkit-border-image: -webkit-linear-gradient(left, #1ebbf0 30%, #39dfaa 100%);
            border-image: linear-gradient(left, #1ebbf0 30%, #39dfaa 100%);
            border-image-slice: 1;
            height: 2px;
            border-style: solid;
            border-width: 2px;
            border-color: rgba(0, 0, 0, .08);
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
                    <li id="momo-method" class="payment-method" data-method="momo">
                        <span>Momo</span>
                    </li>
                    <li class="payment-method" data-method="zalopay">
                        <span>Zalopay</span>
                    </li>
                </ul>
            </div>
            <div class="outer-container">
                <div class="dd2 d-flex">
                    <div class="product-image me-5" style="text-align: left;">
                        <img data-src="{{Storage::url($sach->anh_bia_sach)}}"
                             style="width: 195px; height: auto; border-radius: 8px;"/>
                    </div>

                    <style>
                        .payment-info p {
                            margin-bottom: 15px;
                            line-height: 1.8;
                        }
                    </style>

                    <div class="payment-info">
                        <h4 style="font-size: 140%;">Thông tin thanh toán</h4>
                        <div class="hr-primary"></div>
                        <p><strong>Sản phẩm:</strong> {{$sach->ten_sach}}</p>
                        <p><strong>Tạm tính:</strong> {{ number_format($sach->gia_goc, 0, ',', '.') }} VNĐ</p>
                        @if(!is_null($sach->gia_khuyen_mai))
                            <p><strong>Giảm
                                    giá:</strong> {{ number_format(((($sach->gia_goc - $sach->gia_khuyen_mai) / $sach->gia_goc) * 100), 1, ',', '.')  }}
                                %</p>
                        @else
                            <p><strong>Giảm giá:</strong> - </p>
                        @endif
                        <p><strong>Hình thức thanh toán:</strong> <span id="payment-method-text"> Momo</span></p>
                        <p><strong>Tổng:</strong> @if(!is_null($sach->gia_khuyen_mai))
                                {{number_format($sach->gia_khuyen_mai, 0, ',', '.') }} VNĐ
                            @else
                                {{number_format($sach->gia_goc, 0, ',', '.') }} VNĐ
                            @endif
                        </p>
                        <button id="pay-button" class="btn btn-primary">Thanh toán</button>
                    </div>

                </div>
            </div>
            <form id="payment-form" method="POST" style="display: none;">
                @csrf
                <input type="hidden" name="sach_id" value="{{ $sach->id }}">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                @if(!is_null($sach->gia_khuyen_mai))
                    <input type="hidden" name="amount" value="{{ $sach->gia_khuyen_mai }}">
                @else
                    <input type="hidden" name="amount" value="{{ $sach->gia_goc }}">
                @endif
                <input type="hidden" name="payment_method" id="payment-method-input">
            </form>
        </div>
    </div>

    <style>
        .outer-container {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background-color: white;
            margin: 20px 0;
        }
    </style>

    <script>
        $(document).ready(function () {
            let selectedMethod = 'momo';
            $('#momo-method').addClass('active')

            $('.payment-method').on('click', function (e) {
                e.preventDefault();
                selectedMethod = $(this).data('method');

                $('#payment-method-text').text(selectedMethod === 'momo' ? 'Momo' : 'Zalopay');
            });

            $('#pay-button').on('click', function () {
                let paymentRoute = `/payment/${selectedMethod || 'momo'}`;

                let myForm = $('#payment-form');
                myForm.attr('action', paymentRoute);
                $('#payment-method-input').val(selectedMethod === 'momo' ? 1 : 2);
                myForm.submit();
            });
        });

    </script>

    </body>

    <script>
        document.querySelectorAll('.payment-options li').forEach(item => {
            item.addEventListener('click', function () {

                document.querySelector('.payment-options .active')?.classList.remove('active');
                this.classList.add('active');
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
