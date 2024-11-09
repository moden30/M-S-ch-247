@extends('client.layouts.app')
@section('content')

    <body>
        <style>

            .dd {
                display: flex;
                justify-content: center;
                /* Căn giữa nội dung theo chiều ngang */
                align-items: center;
                /* Căn giữa nội dung theo chiều dọc */
                gap: 20px;
                padding: 20px;
            }

            .book-info {
                flex: 0 0 50%;
                /* book-info chiếm 7 phần */
                background: white;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }


            .payment-options {
                flex: 0 0 25%;
                /* payment-options chiếm 3 phần */
                background: white;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            /* Thêm một số chỉnh sửa khác để làm cho phần tử trở nên đẹp hơn */
            .payment-options ul {
                list-style: none;
                padding: 0;
            }

            .payment-options li {
                padding: 15px;
                border: 1px solid #a1a1a1;
                border-radius: 10px;
                background-color: #ffffff;
                margin-bottom: 10px;
                cursor: pointer;
                transition: background-color 0.3s ease;
                position: relative;
            }

            .payment-options li.active,
            .payment-options li:hover {
                background-color: #ffffff;
            }

            .bank-list {
                background-color: #ffffff;
                display: none;
                gap: 10px;
                flex-wrap: wrap;
                margin-top: 10px;
            }

            .bank-list img {
                width: 90px;
                height: 60px;
                border-radius: 8px;
            }

            .payment-summary {
                margin-top: 20px;
                width: 100%;
                background: white;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .payment-summary table {
                width: 100%;
                border-collapse: collapse;
            }

            .payment-summary th,
            .payment-summary td {
                padding: 10px;
                border: 1px solid #ddd;
                text-align: left;
            }

            .pay-button {
                background-color: #4CAF50;
                border: none;
                padding: 12px 24px;
                color: white;
                border-radius: 8px;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s ease;
                width: 100%;
                margin-top: 20px;
            }

            .pay-button:hover {
                background-color: #45a049;
            }




            .banner-container {
                position: relative;
                width: 100%;
                height: 300px;
                /* Chiều cao của banner, bạn có thể điều chỉnh theo ý muốn */
                background-image: url('{{ asset('assets/client/img/thanhtoan.png') }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;

                overflow: hidden;
            }

            .banner-overlay {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;

            }

            .banner-content {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 2;
                text-align: center;
                color: white;
                /* Màu chữ */
            }

            .banner-content h1 {
                font-size: 3rem;
                margin: 0;
            }

            .payment-method {
                transition: transform 0.3s ease, opacity 0.3s ease, box-shadow 0.3s ease;
                cursor: pointer;
                display: inline-block;
                text-align: center;
                padding: 10px;
                border-radius: 8px;
                /* Không áp dụng viền cho payment-method */
            }

            /* Khi phương thức được chọn */
            .payment-method.selected img {
                margin-right: 5px;
                transform: scale(1.2);
                /* Tăng kích thước của ảnh khi chọn */
                opacity: 1;
                border-radius: 7px;
                box-shadow: 0 0 10px 2px rgba(0, 123, 255, 0.5);
                /* Thêm hiệu ứng viền sáng */

                /* Thêm hiệu ứng màu đuổi nhau cho viền */
                border: 3px solid transparent;
                /* Giảm độ dày viền xuống 3px */
                background-image: linear-gradient(45deg, #ffffff, #03ddff, #ffffff, #03ddff);
                /* Các màu sắc của viền */
                background-size: 200% 200%;
                /* Điều chỉnh kích thước nền để phù hợp với viền mỏng */
                animation: color-animation 2s linear infinite;
                /* Áp dụng animation màu */
            }

            /* Keyframes để thay đổi màu của viền */
            @keyframes color-animation {
                0% {
                    background-position: 400% 400%;
                }

                50% {
                    background-position: 0% 0%;
                }

                100% {
                    background-position: 400% 400%;
                }
            }



            /* Khi phương thức không được chọn */
            .payment-method.deselected img {
                opacity: 0.4;
                /* Làm mờ ảnh khi không được chọn */
            }

            .payment-method.deselected span {
                opacity: 0.4;
                /* Làm mờ ảnh khi không được chọn */
            }

            /* Khi người dùng hover vào ảnh */
            .payment-method:hover img {
                box-shadow: 0 0 10px 2px rgba(0, 123, 255, 0.5);
                /* Thêm hiệu ứng viền sáng khi hover */
            }
        </style>
        <div class="banner-container">
            <div class="banner-overlay"></div>

        </div>

        <div class="container">


            <div class="dd outer-container">


                <div class="book-info">
                    <div class="dd2 d-flex">
                        <div class="product-image me-5" style="text-align: left;">
                            <img data-src="{{ Storage::url($sach->anh_bia_sach) }}"
                                style="width: 300px; height: auto; border-radius: 8px;" />
                        </div>

                        <style>
                            .payment-info p {
                                margin-bottom: 15px;
                                line-height: 1.8;
                            }
                        </style>

                        <div class="payment-info">
                            <h2 style="font-weight: bold">Thông tin sản phẩm</h2>
                            <hr>
                            <div class="hr-primary"></div>
                            <p><strong>Sản phẩm:</strong> {{ $sach->ten_sach }}</p>
                            <p><strong>Tác giả:</strong>
                                {{ $sach->user->but_danh ? $sach->user->but_danh : $sach->user->ten_doc_gia }}</p>
                            <p><strong>Tình trạng cập nhật:</strong>
                                <span
                                    class="{{ $sach->tinh_trang_cap_nhat == 'da_full' ? 'text-success' : 'text-warning' }}">
                                    {{ $sach->tinh_trang_cap_nhat == 'da_full' ? 'Hoàn Thành' : 'Đang Cập Nhật' }}
                                </span>
                                <i class="{{ $sach->tinh_trang_cap_nhat == 'da_full' ? 'fa fa-check' : 'fa fa-spin fa-circle-o-notch' }}"
                                    aria-hidden="true"></i>
                            </p>

                            <p><strong>Giá:</strong>
                                @if (!is_null($sach->gia_khuyen_mai))
                                    <span style="color: black; text-decoration: line-through;">
                                        {{ number_format($sach->gia_goc, 0, ',', '.') }} VNĐ
                                    </span>
                                    <span style="color: red; margin-left: 10px;">
                                        {{ number_format($sach->gia_khuyen_mai, 0, ',', '.') }} VNĐ
                                    </span>
                                @else
                                    {{ number_format($sach->gia_goc, 0, ',', '.') }} VNĐ
                                @endif
                            </p>
                            <p><strong>Số chương:</strong> {{ $sach->chuongs->count() }} chương</p>
                            <p><strong>Thể loại:</strong>


                                <span class="keyword">
                                    <a href="{{ route('the-loai', $sach->theLoai->id) }}" rel="tag">
                                        {{ $sach->theLoai->ten_the_loai }}
                                    </a>
                                </span>

                            </p>

                        </div>

                    </div>

                    <form id="payment-form" method="POST" style="display: none;">
                        @csrf
                        <input type="hidden" name="sach_id" value="{{ $sach->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        @if (!is_null($sach->gia_khuyen_mai))
                            <input type="hidden" name="amount" value="{{ $sach->gia_khuyen_mai }}">
                        @else
                            <input type="hidden" name="amount" value="{{ $sach->gia_goc }}">
                        @endif
                        <input type="hidden" name="payment_method" id="payment-method-input">
                    </form>

                </div>

                <div class="payment-options" >
                    <h2 style="font-weight: bold">Thông tin thanh toán</h2>
                    <hr>
                    <div class="hr-primary"></div>
                    <div class="payment-info" >
                        <h4 style="font-size: 140%;"></h4>
                        <div class="hr-primary"></div>
                        <p><strong>Sản phẩm:</strong> {{ $sach->ten_sach }}</p>
                        <p><strong>Tạm tính:</strong> {{ number_format($sach->gia_goc, 0, ',', '.') }} VNĐ</p>
                        @if (!is_null($sach->gia_khuyen_mai))
                            <p><strong>Giảm
                                    giá:</strong>
                                {{ number_format((($sach->gia_goc - $sach->gia_khuyen_mai) / $sach->gia_goc) * 100, 1, ',', '.') }}
                                %</p>
                        @else
                            <p><strong>Giảm giá:</strong> - </p>
                        @endif
                        <p><strong>Hình thức thanh toán:</strong> <span id="payment-method-text"> Momo</span></p>
                        <p><strong>Tổng:</strong>
                            @if (!is_null($sach->gia_khuyen_mai))
                                {{ number_format($sach->gia_khuyen_mai, 0, ',', '.') }} VNĐ
                            @else
                                {{ number_format($sach->gia_goc, 0, ',', '.') }} VNĐ
                            @endif
                        </p>


                        <ul class="mb-5">
                            <div id="momo-method" class="payment-method" data-method="momo">
                                <img src="{{ asset('assets/client/img/logo/momo.png') }}" alt="Momo"
                                    style="width: 30px; height: auto;">
                                <span>Momo</span>
                            </div>

                            <div class="payment-method" data-method="zalopay">
                                <img src="{{ asset('assets/client/img/logo/zalopay.jpg') }}" alt="Zalopay"
                                    style="width: 30px; height: auto;">
                                <span>Zalopay</span>
                            </div>
                        </ul>



                        <button id="pay-button" class="btn btn-primary">Thanh toán</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- <style>
            .outer-container {
                border-radius: 15px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                padding: 20px;
                background-color: white;
                margin: 20px 0;
            }
        </style> --}}

        <script>
            $(document).ready(function() {
                let selectedMethod = 'momo';
                $('#momo-method').addClass('selected'); // Đặt Momo là mặc định khi tải trang

                // Lắng nghe sự kiện click vào các phương thức thanh toán
                $('.payment-method').on('click', function(e) {
                    e.preventDefault();

                    // Gỡ bỏ hiệu ứng đã chọn từ tất cả các phương thức thanh toán
                    $('.payment-method').removeClass('selected deselected').addClass('deselected');

                    // Áp dụng hiệu ứng chọn cho phương thức đang được click
                    $(this).removeClass('deselected').addClass('selected');

                    // Cập nhật phương thức thanh toán được chọn
                    selectedMethod = $(this).data('method');
                    $('#payment-method-text').text(selectedMethod === 'momo' ? 'Momo' : 'Zalopay');
                });

                // Xử lý sự kiện click vào nút thanh toán
                $('#pay-button').on('click', function() {
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
            item.addEventListener('click', function() {

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
