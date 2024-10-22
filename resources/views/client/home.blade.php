@extends('client.layouts.app')
@section('content')

    <div class="col-xs-12">
        <div class="slider-cont slider-cont-sliderbanner" id="sliderbanner">
            @foreach ($slider->hinhAnhBanner as $item)
                <div class="sliderbanner-item">
                    <a href="#" target="_blank">
                        <img src="{{ Storage::url($item->hinh_anh) }}" alt="Banner Image" />
                    </a>
                </div>
            @endforeach
        </div>
        <script>
            $(document).ready(function() {
                $('#sliderbanner').slick({
                    centerMode: true, // Trung tâm slide hiện tại
                    centerPadding: '60px', // Khoảng cách padding để hiển thị một phần của slide tiếp theo
                    slidesToShow: 1, // Số slide hiển thị mỗi lần
                    arrows: true, // Hiển thị mũi tên điều hướng
                    dots: false, // Tắt điểm chấm dưới slider nếu không cần
                    responsive: [{
                            breakpoint: 768,
                            settings: {
                                arrows: false,
                                centerMode: true,
                                centerPadding: '40px',
                                slidesToShow: 1
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                arrows: false,
                                centerMode: true,
                                centerPadding: '20px',
                                slidesToShow: 1
                            }
                        }
                    ]
                });
            });
        </script>

        <style type="text/css">
            .sliderbanner-item {
                background-color: #ffffff ;
                /* Giữ nguyên chiều rộng là 100% */
                width: 100%;
                height: 450px;
                /* Tăng chiều cao */
                object-fit: cover;
                /* Đảm bảo ảnh phù hợp với kích thước không bị méo */
                border-radius: 15px;
                /* Tăng bo góc nếu cần */
            }

            .sliderbanner-item img {
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                width: 100%;
                /* Giữ nguyên chiều rộng là 100% */
                height: 450px;
                /* Tăng chiều cao */
                object-fit: cover;
                /* Đảm bảo ảnh phù hợp với kích thước không bị méo */
                border-radius: 15px;
                /* Tăng bo góc nếu cần */
            }


            .slider-cont.slider-cont-sliderbanner .slick-prev.slick-arrow {
                left: 10px;
                /* Điều chỉnh vị trí mũi tên trái */
                z-index: 1;
            }

            .slider-cont.slider-cont-sliderbanner .slick-next.slick-arrow {
                right: 10px;
                /* Điều chỉnh vị trí mũi tên phải */
                z-index: 1;
            }
        </style>



    </div>
    <div class="container">
        <div class="row">
            {{-- <div class="col-xs-12 col-md-3 col-md-push-9" style="position: relative;">
                <div class="position-relative"> <a href="user/dang-truyen/index.html" class="btn-primary btn-dangtruyen"> <i
                            class="fa fa-plus-circle" aria-hidden="true"></i>
                        <span>Đăng truyện</span> </a>
                    <div class="button-writer__arrow"> <img width="30" height="54"
                            src="{{ asset('assets/client/themes/truyenfull/echo/img/arrow2.png') }}"> </div>
                </div>
                <div class="ztop-15">
                    <div class="text-center dangtruyen-title"> Bạn muốn đăng truyện?</div>
                </div>
                <div class="ztop-30"></div>
                <style type="text/css">
                    .btn-dangtruyen {
                        width: 100%;
                        height: 50px;
                        display: inline-block;
                        font-weight: 400;
                        text-align: center;
                        vertical-align: middle;
                        -webkit-user-select: none;
                        -moz-user-select: none;
                        -ms-user-select: none;
                        user-select: none;
                        background-color: transparent;
                        border: 1px solid transparent;
                        padding: 0.375rem 0.75rem;
                        border-radius: 5px;
                        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
                        box-shadow: 0 2px 8px 0.56px rgba(0, 0, 0, 0.2);
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        font-size: 20px;
                    }

                    .btn-dangtruyen i {
                        margin-right: 8px;
                    }

                    .btn-dangtruyen span {
                        font-family: "Roboto Condensed";
                    }

                    .dangtruyen-title {
                        font-size: 18px;
                        font-weight: 500;
                    }

                    .position-relative {
                        position: relative !important;
                    }

                    .button-writer__arrow {
                        position: absolute;
                        top: 30px;
                        right: 20px;
                    }

                    .button-writer__arrow img {
                        width: 30px;
                    }
                </style>
                <div class="tf_pc_absolute">
                    <div id="tf_home" data-domain="truyenhdt.com"></div>
                    <div style="margin-bottom: 10px;"></div>
                    <div class="col-btn-home-icon-parent">
                        <div class="col-btn-home-icon" id="tab_home_1">
                            <div class="btn-home-icon" data-value="tab_home_1"> <i class="fa fa-eye fa-lg"
                                    aria-hidden="true"></i>
                                <div class="number-home-icon" id="number-da-doc"></div>
                            </div>
                            <div class="text-home-icon"> Đã Đọc </div>
                        </div>
                        <div class="col-btn-home-icon" id="tab_home_3">
                            <div class="btn-home-icon" data-value="tab_home_3"> <i class="fa fa-tags"
                                    aria-hidden="true"></i>
                                <div class="number-home-icon" id="number-tu-khoa"></div>
                            </div>
                            <div class="text-home-icon"> Bookmark </div>
                        </div>
                        <div class="col-btn-home-icon" id="tab_home_2">
                            @auth
                                <a href="{{ route('thong-bao-chung', ['id' => auth()->user()->id]) }}">
                                    <div class="btn-home-icon" data-value="tab_home_2">
                                        <i class="fa fa-bell fa-lg" aria-hidden="true"></i>
                                        <div id="show_number_notify"></div>
                                    </div>
                                    <div class="text-home-icon">Thông Báo</div>
                                </a>
                            @endauth
                        </div>
                        <div class="col-btn-home-icon" id="tab_home_4"> <a href="user/profile/index.html#h1">
                                <div class="btn-home-icon" data-value="tab_home_4"> <i class="fa fa-user"
                                        aria-hidden="true"></i> </div>
                                <div class="text-home-icon"> Tài Khoản </div>
                            </a> </div>
                        <div class="col-btn-home-icon" id="tab_home_5"> <a href="q-a/index.html">
                                <div class="btn-home-icon" data-value="tab_home_5"> <i class="fa fa-reply-all"
                                        aria-hidden="true"></i> </div>
                                <div class="text-home-icon"> Hỏi Đáp </div>
                            </a> </div>
                        <div class="col-btn-home-icon" id="tab_home_6"> <a href="amp/index.html">
                                <div class="btn-home-icon-2" data-value="tab_home_6"> <i class="fa fa-home"
                                        aria-hidden="true"></i> </div>
                                <div class="text-home-icon"> Bản Mới </div>
                            </a> </div>
                    </div>
                    <div class="clearfix"></div>
                    <div id="show-layout-home-1"></div>
                </div>
            </div> --}}

            {{-- Đổ ra banner của trang chủ --}}

            {{-- <div class="col-xs-12 col-m-12 col-md-3 col-md-pull-9">
                <div id="news">
                    <div class="row tf-flex">
                        <div class="col-xs-7">
                            <h2 class="heading crop-text">
                                <i class="fa fa-bullhorn" aria-hidden="true"></i>
                                Thông Báo {{ $tong_thong_baos }}
                            </h2>
                        </div>
                        <div class="col-xs-5 l-more">
                            <span class="pull-right">
                                @auth
                                    <a href="{{ route('thong-bao-chung', ['id' => auth()->user()->id]) }}" title="Xem Thêm">
                                        Xem
                                        <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                    </a>
                                @endauth
                            </span>
                        </div>
                    </div>
                    <div class="news-child">
                        @foreach ($thong_baos as $thong_baos)
                            <div class="tf-flex col-line-last">
                                <div class="crop-text"> <i
                                        class="fa fa-circle {{ $thong_baos->trang_thai === 'chua_xem' ? 'text-danger' : 'text-success' }} text-success"
                                        aria-hidden="true"></i>
                                    <a href="{{ route('chi-tiet-thong-bao', $thong_baos->id) }}"
                                        class="{{ $thong_baos->trang_thai === 'chua_xem' ? 'font-weight-bold' : '' }}">
                                        <span class="notify-date">{{ $thong_baos->created_at->format('d/m') }}</span>
                                        {{ $thong_baos->tieu_de }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div> --}}
        </div>
    </div>





    {{-- <div class="container top-layout" id="home-layout-add">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-push-3">
                <h2 class="heading crop-text"><i class="fa fa-copyright" aria-hidden="true"></i> Độc Quyền</h2>
                <div class="row ztop-5">
                    <div class="col-xs-10">
                        <div id="docquyen">
                            <div class="docquyen-item"><img
                                    src="{{ asset('assets/client/uploads/2024/09/au-te-manh-oa-o-tinh-te-lam-doan-sung-1725664021.jpg') }}" />
                            </div>
                            <div class="docquyen-item"><img
                                    src="{{ asset('assets/client/uploads/2024/10/xe-can-cu-cua-toi-trong-mat-the-1728297403.jpg') }}" />
                            </div>
                            <div class="docquyen-item"><img
                                    src="{{ asset('assets/client/uploads/2024/08/11501574.jpg') }}" /></div>
                            <div class="docquyen-item"><img
                                    src="{{ asset('assets/client/uploads/2024/09/11646211.jpg') }}" /></div>
                            <div class="docquyen-item"><img
                                    src="{{ asset('assets/client/uploads/2023/12/xuyen-thanh-thai-tu-phi-bi-luu-day-1702997084.jpg') }}" />
                            </div>
                            <div class="docquyen-item"><img
                                    src="{{ asset('assets/client/uploads/2024/09/11624124.jpg') }}" /></div>
                            <div class="docquyen-item"><img
                                    src="{{ asset('assets/client/uploads/2023/07/9473346.jpg') }}" /></div>
                        </div>
                    </div>
                    <div class="col-xs-6" style=" right: 0px; position: absolute;">
                        <div class="docquyen-content docquyen-content-0 "> <a
                                href="truyen/au-te-manh-oa-o-tinh-te-lam-doan-sung/index.html"> <span
                                    class="docquyen-title crop-text-1">Bé Con Xuyên Tới Tinh Tế Làm Thần Thú</span> </a>
                            <div class="docquyen-excerpt ztop-10">Ở thời đại tinh tế, La Dương xuyên qua trở thành một
                                con ma thú vô cùng đáng yêu, chỉ có thể dựa vào lương thực cứu tế mà …</div>
                            <div class="ztop-15"></div> <a href="truyen/au-te-manh-oa-o-tinh-te-lam-doan-sung/index.html">
                                <span class="btn btn-primary border-radius">Đọc Truyện</span> </a>
                        </div>
                        <div class="docquyen-content docquyen-content-1 hidden"> <a
                                href="truyen/xe-can-cu-cua-toi-trong-mat-the/index.html"> <span
                                    class="docquyen-title crop-text-1">Xe Căn Cứ Của Tôi Trong Mạt Thế</span> </a>
                            <div class="docquyen-excerpt ztop-10">Khi tận thế đang đến gần, Giang Lưu Thạch bất ngờ nhận
                                được một công nghệ đen có thể nâng cấp và cải tiến các phương tiện giao thông. …</div>
                            <div class="ztop-15"></div> <a href="truyen/xe-can-cu-cua-toi-trong-mat-the/index.html">
                                <span class="btn btn-primary border-radius">Đọc Truyện</span> </a>
                        </div>
                        <div class="docquyen-content docquyen-content-2 hidden"> <a
                                href="truyen/chet-roi-cung-khong-tha-cho-em/index.html"> <span
                                    class="docquyen-title crop-text-1">Chết Rồi Cũng Không Tha Cho Em</span> </a>
                            <div class="docquyen-excerpt ztop-10">Năm 18 tuổi, vì thể chất đặc biệt, cậu đã nhận nhầm
                                một hồn ma là ba mình dưới sự thao túng kỳ lạ của ông nội.Ma quái, thật …</div>
                            <div class="ztop-15"></div> <a href="truyen/chet-roi-cung-khong-tha-cho-em/index.html">
                                <span class="btn btn-primary border-radius">Đọc Truyện</span> </a>
                        </div>
                        <div class="docquyen-content docquyen-content-3 hidden"> <a
                                href="truyen/dau-bep-lam-tinh-chinh-phuc-tinh-te/index.html"> <span
                                    class="docquyen-title crop-text-1">Đầu Bếp Lam Tinh, Chinh Phục Tinh Tế</span> </a>
                            <div class="docquyen-excerpt ztop-10">Bếp trưởng nổi danh Lam Tinh, Úc Trục Nhan, sau một
                                tai nạn máy bay bất ngờ xuyên vào một cuốn tiểu thuyết máu chó giữa thế giới tinh …
                            </div>
                            <div class="ztop-15"></div> <a href="truyen/dau-bep-lam-tinh-chinh-phuc-tinh-te/index.html">
                                <span class="btn btn-primary border-radius">Đọc Truyện</span> </a>
                        </div>
                        <div class="docquyen-content docquyen-content-4 hidden"> <a
                                href="truyen/xuyen-thanh-thai-tu-phi-bi-luu-day/index.html"> <span
                                    class="docquyen-title crop-text-1">Xuyên Thành Thái Tử Phi Bị Lưu Đày</span> </a>
                            <div class="docquyen-excerpt ztop-10">Editor: CyndaquilGiới thiệu:Sau khi tỉnh dậy sau một
                                tai nạn, Chu Sơ Ninh xuyên qua thành con vợ lẽ, nam giả nữ thay chị gái con dòng chính
                                đi …</div>
                            <div class="ztop-15"></div> <a href="truyen/xuyen-thanh-thai-tu-phi-bi-luu-day/index.html">
                                <span class="btn btn-primary border-radius">Đọc Truyện</span> </a>
                        </div>
                        <div class="docquyen-content docquyen-content-5 hidden"> <a
                                href="truyen/trong-sinh-mat-the-tro-thanh-be-yeu-cua-dai-lao-tan-ac/index.html"> <span
                                    class="docquyen-title crop-text-1">Trọng Sinh Mạt Thế: Trở Thành Bé Yêu Của Đại Lão
                                    Tàn Ác</span> </a>
                            <div class="docquyen-excerpt ztop-10">Lục Dao thức tỉnh vào một tuần trước khi mạt thế buông
                                xuống, biết được mình là nữ phụ vì đưa không gian tùy thân cho em gái mà …</div>
                            <div class="ztop-15"></div> <a
                                href="truyen/trong-sinh-mat-the-tro-thanh-be-yeu-cua-dai-lao-tan-ac/index.html"> <span
                                    class="btn btn-primary border-radius">Đọc Truyện</span> </a>
                        </div>
                        <div class="docquyen-content docquyen-content-6 hidden"> <a
                                href="truyen/xuyen-sach-lam-de-nhat-nu-nha-dich/index.html"> <span
                                    class="docquyen-title crop-text-1">Xuyên Sách Làm Đệ Nhất Nữ Nha Dịch</span> </a>
                            <div class="docquyen-excerpt ztop-10">Giới thiệu nội dungNàng tình cờ xuyên vào trong sách,
                                phát hiện cha mẹ của nguyên chủ trong sách đều bị giết, cả nhà bị chu di tam tộc. …
                            </div>
                            <div class="ztop-15"></div> <a href="truyen/xuyen-sach-lam-de-nhat-nu-nha-dich/index.html">
                                <span class="btn btn-primary border-radius">Đọc Truyện</span> </a>
                        </div>
                    </div>
                </div>
                <hr class="docquyen-hr">
                <div class="row docquyen-event">
                    <div class="col-xs-4">
                        <div class="d-event-title crop-text"> <a
                                href="truyen/trong-truyen-me-ke-chong-co-kha-nang-nghe-tieng-long/index.html"> Trong
                                Truyện Mẹ Kế, Chồng Có Khả Năng Nghe Tiếng Lòng </a> </div>
                        <div class="d-event-excerpt crop-text-2 ztop-5 font-15"> Ngu Miểu xuyên sách, xuyên vào một cuốn
                            truyện hào môn, trở thành mẹ kế. Trong sách, nguyên chủ không yêu tiền tài chỉ yêu chồng hào
                            môn, vì … </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="d-event-title crop-text"> <a
                                href="truyen/xuyen-sach-roi-ta-bi-bon-dai-lao-duoi-theo-sung/index.html"> Xuyên Sách Rồi
                                Ta Bị Bốn Đại Lão Đuổi Theo Sủng </a> </div>
                        <div class="d-event-excerpt crop-text-2 ztop-5 font-15"> [Nhiều nam chính + Tu la tràng + Cạnh
                            tranh nam + Nhiều ngoại truyện, nhiều kết cục]Quý Thanh Diều xuyên sách rồi, nhiệm vụ là
                            cùng lúc công … </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="d-event-title crop-text"> <a
                                href="truyen/phoi-bay-kiep-truoc-khien-ca-coi-mang-chan-dong/index.html"> Phơi Bày Kiếp
                                Trước Khiến Cả Cõi Mạng Chấn Động </a> </div>
                        <div class="d-event-excerpt crop-text-2 ztop-5 font-15"> Cơ thể của Dạ Vãn Lan bị xuyên qua,
                            người xuyên việt khiến cuộc sống của cô trở nên chướng khí mù mịt rồi vung tay rời đi, cuối
                            … </div>
                    </div>
                </div>
                <style type="text/css">
                    .d-event-title {
                        font-size: 17px;
                        font-weight: bold;
                    }

                    hr.docquyen-hr {
                        margin-top: 7px;
                        margin-bottom: 10px;
                    }

                    #docquyen {
                        left: -75px;
                        margin-top: 15px;
                        min-height: 136px;
                    }

                    @media (min-width:1200px) {
                        #docquyen {
                            left: -90px;
                        }
                    }

                    #docquyen img {
                        width: 100%;
                        border-width: 4px;
                        border-style: solid;
                        border-image: linear-gradient(#1ebbf0, #39dfaa) 30;
                    }

                    .docquyen-title {
                        font-size: 18px;
                        font-weight: 600;
                    }

                    .docquyen-excerpt {
                        height: 102px;
                        font-size: 16px;
                        overflow: hidden;
                        display: -webkit-box;
                        -webkit-box-orient: vertical;
                        -webkit-line-clamp: 4;
                    }

                    #docquyen div[aria-hidden="true"] {
                        transform: translate(-5%, 0) scale(.01);
                    }

                    #docquyen .slick-current+div {
                        transform: translate(-25%, 0) scale(.8);
                        position: relative;
                        z-index: 5;
                    }

                    #docquyen .slick-current+div+div {
                        transform: translate(-80%, 0) scale(.6);
                    }

                    #docquyen .slick-current {
                        transform: translate(0%, 0) scale(1);
                        position: relative;
                        z-index: 10;
                    }

                    #docquyen .slick-index-pre1 {
                        transform: translate(25%, 0) scale(.8);
                    }

                    #docquyen .slick-index-pre2 {
                        transform: translate(80%, 0) scale(.6);
                    }
                </style>
            </div>
            <div class="col-xs-12 col-md-3 col-md-pull-6">
                <h2 class="heading"><i class="fa fa-thumb-tack" aria-hidden="true"></i> BTV Đề Cử</h2>
                <div class="slider-cont slider-premiumItem-img" id="slider-premiumItem-img2">
                    <div class="slider-item">
                        <div class="premiumItem">
                            <div class="img"><a
                                    href="truyen/xuyen-sach-thap-nien-70-mo-khoa-bi-kip-tan-tinh-anh-linh-xue-xoa/index.html"
                                    title="Xuyên Sách Thập Niên 70: Mở Khóa Bí Kíp, Tán Tỉnh Anh Lính Xuề Xòa"><img
                                        src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                        data-src="https://truyenhdt.com/wp-content/uploads/2024/05/11137877.jpg"
                                        alt="Xuyên Sách Thập Niên 70: Mở Khóa Bí Kíp, Tán Tỉnh Anh Lính Xuề Xòa" /><span
                                        class="lb-item">Dịch/Edit</span><span class="overBox"><i class="fa fa-star"></i>
                                        6.71/10</a></div><strong class="title"><a
                                    href="truyen/xuyen-sach-thap-nien-70-mo-khoa-bi-kip-tan-tinh-anh-linh-xue-xoa/index.html"
                                    title="Xuyên Sách Thập Niên 70: Mở Khóa Bí Kíp, Tán Tỉnh Anh Lính Xuề Xòa">Xuyên
                                    Sách Thập Niên 70: Mở Khóa Bí Kíp, Tán Tỉnh Anh Lính Xuề Xòa</a></strong>
                        </div>
                    </div>
                    <div class="slider-item">
                        <div class="premiumItem">
                            <div class="img"><a href="truyen/ket-minh-hon-co-vo-tre-la-ma/index.html"
                                    title="Người Trừ Tà Kết Minh Hôn"><img
                                        src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                        data-src="https://truyenhdt.com/wp-content/uploads/2023/06/ket-minh-hon-co-vo-tre-la-ma-1686835676.jpg"
                                        alt="Người Trừ Tà Kết Minh Hôn" /><span class="lb-item">Dịch/Edit</span><span
                                        class="overBox"><i class="fa fa-star"></i> 8/10</a></div><strong
                                class="title"><a href="truyen/ket-minh-hon-co-vo-tre-la-ma/index.html"
                                    title="Người Trừ Tà Kết Minh Hôn">Người Trừ Tà Kết Minh Hôn</a></strong>
                        </div>
                    </div>
                    <div class="slider-item">
                        <div class="premiumItem">
                            <div class="img"><a
                                    href="truyen/truoc-khi-luu-day-ta-dung-khong-gian-khoang-sach-hoang-cung/index.html"
                                    title="Trước Khi Lưu Đày Ta Dùng Không Gian Khoắng Sạch Hoàng Cung"><img
                                        src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                        data-src="https://truyenhdt.com/wp-content/uploads/2023/09/truoc-khi-luu-day-ta-dung-khong-gian-khoang-sach-hoang-cung.jpg"
                                        alt="Trước Khi Lưu Đày Ta Dùng Không Gian Khoắng Sạch Hoàng Cung" /><span
                                        class="lb-item">Dịch/Edit</span><span class="overBox"><i class="fa fa-star"></i>
                                        7/10</a></div><strong class="title"><a
                                    href="truyen/truoc-khi-luu-day-ta-dung-khong-gian-khoang-sach-hoang-cung/index.html"
                                    title="Trước Khi Lưu Đày Ta Dùng Không Gian Khoắng Sạch Hoàng Cung">Trước Khi Lưu
                                    Đày Ta Dùng Không Gian Khoắng Sạch Hoàng Cung</a></strong>
                        </div>
                    </div>
                    <div class="slider-item">
                        <div class="premiumItem">
                            <div class="img"><a href="truyen/nguoi-yeu-be-nho-cua-chi/index.html"
                                    title="Người Yêu Bé Nhỏ Của Chị"><img
                                        src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                        data-src="https://truyenhdt.com/wp-content/uploads/2024/05/nguoi-yeu-be-nho-cua-chi-1716285112.jpg"
                                        alt="Người Yêu Bé Nhỏ Của Chị" /><span class="lb-item">Sáng Tác</span><span
                                        class="overBox"><i class="fa fa-star"></i> 9.12/10</a></div><strong
                                class="title"><a href="truyen/nguoi-yeu-be-nho-cua-chi/index.html"
                                    title="Người Yêu Bé Nhỏ Của Chị">Người Yêu Bé Nhỏ Của Chị</a></strong>
                        </div>
                    </div>
                    <div class="slider-item">
                        <div class="premiumItem">
                            <div class="img"><a href="truyen/mi-tinh-3/index.html" title="Mị Tình"><img
                                        src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                        data-src="https://truyenhdt.com/wp-content/uploads/2024/08/mi-tinh-3-1722687688.jpg"
                                        alt="Mị Tình" /><span class="lb-item">Dịch/Edit</span><span class="overBox"><i
                                            class="fa fa-star"></i> 9.19/10</a></div><strong class="title"><a
                                    href="truyen/mi-tinh-3/index.html" title="Mị Tình">Mị Tình</a></strong>
                        </div>
                    </div>
                    <div class="slider-item">
                        <div class="premiumItem">
                            <div class="img"><a href="truyen/dua-vao-rut-tham-nam-thang-o-thap-nien-70/index.html"
                                    title="Dựa Vào Rút Thăm Nằm Thắng Ở Thập Niên 70"><img
                                        src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                        data-src="https://truyenhdt.com/wp-content/uploads/2024/09/dua-vao-rut-tham-nam-thang-o-thap-nien-70-1727294231.jpg"
                                        alt="Dựa Vào Rút Thăm Nằm Thắng Ở Thập Niên 70" /><span
                                        class="lb-item">Dịch/Edit</span><span class="overBox"><i class="fa fa-star"></i>
                                        7.33/10</a></div><strong class="title"><a
                                    href="truyen/dua-vao-rut-tham-nam-thang-o-thap-nien-70/index.html"
                                    title="Dựa Vào Rút Thăm Nằm Thắng Ở Thập Niên 70">Dựa Vào Rút Thăm Nằm Thắng Ở Thập
                                    Niên 70</a></strong>
                        </div>
                    </div>
                    <div class="slider-item">
                        <div class="premiumItem">
                            <div class="img"><a
                                    href="truyen/thap-nien-70-xuyen-thanh-co-em-gai-dung-cam-cua-dai-lao/index.html"
                                    title="Thập Niên 70: Xuyên Thành Cô Em Gái Dũng Cảm Của Đại Lão"><img
                                        src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                        data-src="https://truyenhdt.com/wp-content/uploads/2023/05/thap-nien-70-xuyen-thanh-co-em-gai-dung-cam-cua-dai-lao-1684534314.jpg"
                                        alt="Thập Niên 70: Xuyên Thành Cô Em Gái Dũng Cảm Của Đại Lão" /><span
                                        class="lb-item">Dịch/Edit</span><span class="overBox"><i class="fa fa-star"></i>
                                        8.64/10</a></div><strong class="title"><a
                                    href="truyen/thap-nien-70-xuyen-thanh-co-em-gai-dung-cam-cua-dai-lao/index.html"
                                    title="Thập Niên 70: Xuyên Thành Cô Em Gái Dũng Cảm Của Đại Lão">Thập Niên 70: Xuyên
                                    Thành Cô Em Gái Dũng Cảm Của Đại Lão</a></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-3">
                <div id="decu">
                    <div class="row row-heading">
                        <div class="col-xs-7">
                            <h2 class="heading crop-text"><i class="fa fa-fire" aria-hidden="true"></i> Đề Cử Tháng</h2>
                        </div>
                        <div class="col-xs-5">
                            <div class="pull-right">
                                <div class="form-group"> <select id="ajax-topdanhvong" name="newest-category"
                                        class="form-control">
                                        <option value="all">Tất Cả</option>
                                        <option value="bach-hop">Bách Hợp <i class="fa fa-venus-double c-d-d"
                                                aria-hidden="true"></i></option>
                                        <option value="can-dai">Cận Đại</option>
                                        <option value="co-dai">Cổ Đại</option>
                                        <option value="di-gioi">Dị Giới</option>
                                        <option value="di-nang">Dị Năng</option>
                                        <option value="huyen-huyen">Huyền Huyễn <i class="fa fa-magic c-d-d"
                                                aria-hidden="true"></i></option>
                                        <option value="hai-huoc">Hài Hước</option>
                                        <option value="hac-bang">Hắc Bang</option>
                                        <option value="he-thong">Hệ Thống <i class="fa fa-universal-access c-d-d"
                                                aria-hidden="true"></i></option>
                                        <option value="khoa-huyen">Khoa Huyễn <i class="fa fa-space-shuttle c-d-d"
                                                aria-hidden="true"></i></option>
                                        <option value="kiem-hiep">Kiếm Hiệp</option>
                                        <option value="ky-huyen">Kỳ Huyễn</option>
                                        <option value="linh-di">Linh Dị</option>
                                        <option value="mat-the">Mạt Thế</option>
                                        <option value="ngon-tinh">Ngôn Tình <i class="fa fa-heartbeat c-d-d"
                                                aria-hidden="true"></i></option>
                                        <option value="nguoc">Ngược</option>
                                        <option value="nu-cuong">Nữ Cường</option>
                                        <option value="nu-phu">Nữ Phụ</option>
                                        <option value="phuong-tay">Phương Tây</option>
                                        <option value="quan-nhan">Quân Nhân</option>
                                        <option value="showbiz">Showbiz</option>
                                        <option value="sung">Sủng <i class="fa fa-heartbeat c-d-d"
                                                aria-hidden="true"></i></option>
                                        <option value="tien-hiep">Tiên Hiệp</option>
                                        <option value="trinh-tham">Trinh Thám</option>
                                        <option value="teen">Truyện Teen <i class="fa fa-child c-d-d"
                                                aria-hidden="true"></i></option>
                                        <option value="trong-sinh">Trọng Sinh</option>
                                        <option value="tuong-lai">Tương Lai</option>
                                        <option value="tong-tai">Tổng Tài</option>
                                        <option value="vong-du">Võng Du <i class="fa fa-gamepad c-d-d"
                                                aria-hidden="true"></i></option>
                                        <option value="vuon-truong">Vườn Trường</option>
                                        <option value="xuyen-khong">Xuyên Không <i class="fa fa-history c-d-d"
                                                aria-hidden="true"></i></option>
                                        <option value="xuyen-nhanh">Xuyên Nhanh</option>
                                        <option value="dam-my">Đam Mỹ <i class="fa fa-mars-double c-d-d"
                                                aria-hidden="true"></i></option>
                                        <option value="dien-van">Điền Văn</option>
                                        <option value="do-thi">Đô Thị</option>
                                        <option value="dong-nhan">Đồng Nhân <i class="fa fa-bullseye c-d-d"
                                                aria-hidden="true"></i></option>
                                    </select> </div>
                            </div>
                        </div>
                    </div>
                    <div id="ajax-topdanhvong-show" class="ztop-5">
                        <ul class="top-3-vinhdanh">
                            <li>
                                <div class="vinhdanhtop"><a class="img"
                                        href="truyen/nguoi-choi-binh-thuong-x-de-tu-thien-tai/index.html"
                                        title="NPC Đừng Sợ, Tôi Là Người Tốt"><img
                                            src="{{ asset('assets/client/uploads/2024/10/nguoi-choi-binh-thuong-x-de-tu-thien-tai-1728001681.jpg') }}"
                                            alt="NPC Đừng Sợ, Tôi Là Người Tốt"><span class="khung-vien-rank"></span>
                                        <div class="overBox crop-text-2">NPC Đừng Sợ, Tôi Là Người Tốt</div>
                                    </a>
                                    <div class="info text-center"><span class="rank-tag">TOP 1</span></div>
                                </div>
                            </li>
                            <li>
                                <div class="vinhdanhtop"><a class="img"
                                        href="truyen/thien-kim-gia-hong-drama-bi-dam-phao-hoi-nghe-tieng-long/index.html"
                                        title="Thiên Kim Giả Hóng Drama Bị Đám Pháo Hôi Nghe Tiếng Lòng"><img
                                            src="{{ asset('assets/client/uploads/2024/07/thien-kim-gia-hong-drama-bi-dam-phao-hoi-nghe-tieng-long-1720458430.jpg') }}"
                                            alt="Thiên Kim Giả Hóng Drama Bị Đám Pháo Hôi Nghe Tiếng Lòng"><span
                                            class="khung-vien-rank"></span>
                                        <div class="overBox crop-text-2">Thiên Kim Giả Hóng Drama Bị Đám Pháo Hôi Nghe
                                            Tiếng Lòng</div>
                                    </a>
                                    <div class="info text-center"><span class="rank-tag">TOP 2</span></div>
                                </div>
                            </li>
                            <li>
                                <div class="vinhdanhtop"><a class="img"
                                        href="truyen/nghe-len-tieng-long-ai-nu-bi-ghet-bo-duoc-sung-ai/index.html"
                                        title="Nghe Lén Tiếng Lòng Ái Nữ Bị Ghét Bỏ Được Sủng Ái"><img
                                            src="{{ asset('assets/client/uploads/2024/06/nghe-len-tieng-long-ai-nu-bi-ghet-bo-duoc-sung-ai-1719186291.jpg') }}"
                                            alt="Nghe Lén Tiếng Lòng Ái Nữ Bị Ghét Bỏ Được Sủng Ái"><span
                                            class="khung-vien-rank"></span>
                                        <div class="overBox crop-text-2">Nghe Lén Tiếng Lòng Ái Nữ Bị Ghét Bỏ Được Sủng
                                            Ái</div>
                                    </a>
                                    <div class="info text-center"><span class="rank-tag">TOP 3</span></div>
                                </div>
                            </li>
                        </ul>
                        <ul class="star-rank-list">
                            <li>
                                <div class="zxt1"><i class="fa fa-star fa-2x" aria-hidden="true"></i><span
                                        class="zxt2">4</span></div><span class="crop-text-1"><a
                                        href="truyen/sau-khi-bi-nghe-thay-tieng-long-nguoi-qua-duong-giap-bong-phat-nhanh/index.html"
                                        title="Sau Khi Bị Nghe Thấy Tiếng Lòng, Người Qua Đường Giáp Bỗng Phất Nhanh">Sau
                                        Khi Bị Nghe Thấy Tiếng Lòng, Người Qua Đường Giáp Bỗng Phất Nhanh</a></span>
                            </li>
                            <li>
                                <div class="zxt1"><i class="fa fa-star fa-2x" aria-hidden="true"></i><span
                                        class="zxt2">5</span></div><span class="crop-text-1"><a
                                        href="truyen/ban-ngay-bi-huy-hon-ban-dem-bi-chi-huy-vua-dang-yeu-vua-hung-du-doi-om/index.html"
                                        title="Vợ Yêu Bỏ Trốn Của Sĩ Quan Đại Nhân">Vợ Yêu Bỏ Trốn Của Sĩ Quan Đại
                                        Nhân</a></span>
                            </li>
                            <li>
                                <div class="zxt1"><i class="fa fa-star fa-2x" aria-hidden="true"></i><span
                                        class="zxt2">6</span></div><span class="crop-text-1"><a
                                        href="truyen/tiem-an-tu-ky-my-thuc/index.html"
                                        title="Tiệm Ăn Từ Ký [Mỹ Thực]">Tiệm Ăn Từ Ký [Mỹ Thực]</a></span>
                            </li>
                        </ul>
                    </div>
                    <div id="ajax-topdanhvong-show2"> </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container ztop-10">
        <h2 class="mt-2 ms-4" style="font-weight: bold">Sách mới nhất</h2>
        <hr style="margin:0 3px 0 3px">
        <div class="book-container">
            @foreach ($hotBooks as $item)
                <div class="book">
                    <a href="{{ route('chi-tiet') }}">
                        <img src="{{ Storage::url($item->anh_bia_sach) }}" alt="Cover Image">
                        <div class="price-tag">
                            {{ number_format($item->gia_goc, 0, ',', '.') }} ₫
                        </div>

                        <div class="book-info">
                            <h4 class="book-title">{{ $item->ten_sach }}</h4>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>



        <style type="text/css">
            .book-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                padding: 20px;
                margin: auto;
            }

            .book {
                width: calc(100% / 6 - 10px);
                /* Chia tổng số sách trên mỗi hàng và trừ đi khoảng cách giữa các sách */
                margin-bottom: 20px;
                /* Khoảng cách giữa các hàng */
                transition: transform 0.3s ease-in-out;
                align-items: center;
                text-align: center;
                position: relative;
            }

            .book:hover {
                transform: translateY(-5px);
            }



            .price-tag {
                position: absolute;
                top: 0;
                /* Vẫn giữ ở đầu trên cùng */
                right: 0;
                /* Thay đổi từ left sang right */
                background: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
                /* Màu nền hồng nhạt */
                color: white;
                /* Màu chữ trắng */
                padding: 5px 10px;
                /* Đệm cho khối giá */
                border-radius: 0 10px 0 10px;
                /* Bo góc dưới bên trái */
                font-size: 13px;
                /* Kích thước font */
                font-weight: bold;
                /* In đậm chữ */
            }


            .book img {
                display: block;
                width: 100%;
                height: auto;
                /* Điều chỉnh lại các thuộc tính của ảnh */
                border-radius: 10px;

            }

            .book-info {
                padding: 10px;
                text-align: center;
            }

            .book-title {
                font-size: 14px;
                color: #333;
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
                /* Hiển thị dấu "..." nếu tiêu đề quá dài */
            }

            .book-price {
                font-size: 14px;
                color: #666;
            }

            @media (max-width: 768px) {
                .book {
                    width: calc(100% / 3 - 10px);
                    /* Cho màn hình nhỏ hơn, hiển thị 3 sách mỗi hàng */
                }
            }

            @media (max-width: 480px) {
                .book {
                    width: calc(100% / 2 - 10px);
                    /* Cho màn hình rất nhỏ, hiển thị 2 sách mỗi hàng */
                }
            }
        </style>
    </div>







    <div class="container">
        <h2>Hot nhất - truyện tranh</h2>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="panel panel-default comic-card">
                    <div class="panel-body">
                        <!-- Phần slider ảnh -->
                        <div class="col-xs-12 col-md-6" style="border-radius: 10px">
                            <div class="slider-cont slider-premiumItem-img" id="slider-premiumItem-img2">
                                <div class="slider-item">
                                    <div class="premiumItem">
                                        <div class="img"><a
                                                href="truyen/xuyen-sach-thap-nien-70-mo-khoa-bi-kip-tan-tinh-anh-linh-xue-xoa/index.html"
                                                title="Xuyên Sách Thập Niên 70: Mở Khóa Bí Kíp, Tán Tỉnh Anh Lính Xuề Xòa"><img
                                                    src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                    data-src="https://truyenhdt.com/wp-content/uploads/2024/05/11137877.jpg"
                                                    alt="Xuyên Sách Thập Niên 70: Mở Khóa Bí Kíp, Tán Tỉnh Anh Lính Xuề Xòa" /><span
                                                    class="lb-item">Dịch/Edit</span><span class="overBox"><i
                                                        class="fa fa-star"></i>
                                                    6.71/10</a></div><strong class="title"><a
                                                href="truyen/xuyen-sach-thap-nien-70-mo-khoa-bi-kip-tan-tinh-anh-linh-xue-xoa/index.html"
                                                title="Xuyên Sách Thập Niên 70: Mở Khóa Bí Kíp, Tán Tỉnh Anh Lính Xuề Xòa">Xuyên
                                                Sách Thập Niên 70: Mở Khóa Bí Kíp, Tán Tỉnh Anh Lính Xuề Xòa</a></strong>
                                    </div>
                                </div>
                                <div class="slider-item">
                                    <div class="premiumItem">
                                        <div class="img"><a href="truyen/ket-minh-hon-co-vo-tre-la-ma/index.html"
                                                title="Người Trừ Tà Kết Minh Hôn"><img
                                                    src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                    data-src="https://truyenhdt.com/wp-content/uploads/2023/06/ket-minh-hon-co-vo-tre-la-ma-1686835676.jpg"
                                                    alt="Người Trừ Tà Kết Minh Hôn" /><span
                                                    class="lb-item">Dịch/Edit</span><span class="overBox"><i
                                                        class="fa fa-star"></i> 8/10</a></div><strong class="title"><a
                                                href="truyen/ket-minh-hon-co-vo-tre-la-ma/index.html"
                                                title="Người Trừ Tà Kết Minh Hôn">Người Trừ Tà Kết Minh Hôn</a></strong>
                                    </div>
                                </div>
                                <div class="slider-item">
                                    <div class="premiumItem">
                                        <div class="img"><a
                                                href="truyen/truoc-khi-luu-day-ta-dung-khong-gian-khoang-sach-hoang-cung/index.html"
                                                title="Trước Khi Lưu Đày Ta Dùng Không Gian Khoắng Sạch Hoàng Cung"><img
                                                    src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                    data-src="https://truyenhdt.com/wp-content/uploads/2023/09/truoc-khi-luu-day-ta-dung-khong-gian-khoang-sach-hoang-cung.jpg"
                                                    alt="Trước Khi Lưu Đày Ta Dùng Không Gian Khoắng Sạch Hoàng Cung" /><span
                                                    class="lb-item">Dịch/Edit</span><span class="overBox"><i
                                                        class="fa fa-star"></i>
                                                    7/10</a></div><strong class="title"><a
                                                href="truyen/truoc-khi-luu-day-ta-dung-khong-gian-khoang-sach-hoang-cung/index.html"
                                                title="Trước Khi Lưu Đày Ta Dùng Không Gian Khoắng Sạch Hoàng Cung">Trước
                                                Khi Lưu
                                                Đày Ta Dùng Không Gian Khoắng Sạch Hoàng Cung</a></strong>
                                    </div>
                                </div>
                                <div class="slider-item">
                                    <div class="premiumItem">
                                        <div class="img"><a href="truyen/nguoi-yeu-be-nho-cua-chi/index.html"
                                                title="Người Yêu Bé Nhỏ Của Chị"><img
                                                    src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                    data-src="https://truyenhdt.com/wp-content/uploads/2024/05/nguoi-yeu-be-nho-cua-chi-1716285112.jpg"
                                                    alt="Người Yêu Bé Nhỏ Của Chị" /><span class="lb-item">Sáng
                                                    Tác</span><span class="overBox"><i class="fa fa-star"></i> 9.12/10</a>
                                        </div><strong class="title"><a href="truyen/nguoi-yeu-be-nho-cua-chi/index.html"
                                                title="Người Yêu Bé Nhỏ Của Chị">Người Yêu Bé Nhỏ Của Chị</a></strong>
                                    </div>
                                </div>
                                <div class="slider-item">
                                    <div class="premiumItem">
                                        <div class="img"><a href="truyen/mi-tinh-3/index.html" title="Mị Tình"><img
                                                    src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                    data-src="https://truyenhdt.com/wp-content/uploads/2024/08/mi-tinh-3-1722687688.jpg"
                                                    alt="Mị Tình" /><span class="lb-item">Dịch/Edit</span><span
                                                    class="overBox"><i class="fa fa-star"></i> 9.19/10</a></div><strong
                                            class="title"><a href="truyen/mi-tinh-3/index.html" title="Mị Tình">Mị
                                                Tình</a></strong>
                                    </div>
                                </div>
                                <div class="slider-item">
                                    <div class="premiumItem">
                                        <div class="img"><a
                                                href="truyen/dua-vao-rut-tham-nam-thang-o-thap-nien-70/index.html"
                                                title="Dựa Vào Rút Thăm Nằm Thắng Ở Thập Niên 70"><img
                                                    src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                    data-src="https://truyenhdt.com/wp-content/uploads/2024/09/dua-vao-rut-tham-nam-thang-o-thap-nien-70-1727294231.jpg"
                                                    alt="Dựa Vào Rút Thăm Nằm Thắng Ở Thập Niên 70" /><span
                                                    class="lb-item">Dịch/Edit</span><span class="overBox"><i
                                                        class="fa fa-star"></i>
                                                    7.33/10</a></div><strong class="title"><a
                                                href="truyen/dua-vao-rut-tham-nam-thang-o-thap-nien-70/index.html"
                                                title="Dựa Vào Rút Thăm Nằm Thắng Ở Thập Niên 70">Dựa Vào Rút Thăm Nằm
                                                Thắng Ở Thập
                                                Niên 70</a></strong>
                                    </div>
                                </div>
                                <div class="slider-item">
                                    <div class="premiumItem">
                                        <div class="img"><a
                                                href="truyen/thap-nien-70-xuyen-thanh-co-em-gai-dung-cam-cua-dai-lao/index.html"
                                                title="Thập Niên 70: Xuyên Thành Cô Em Gái Dũng Cảm Của Đại Lão"><img
                                                    src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                    data-src="https://truyenhdt.com/wp-content/uploads/2023/05/thap-nien-70-xuyen-thanh-co-em-gai-dung-cam-cua-dai-lao-1684534314.jpg"
                                                    alt="Thập Niên 70: Xuyên Thành Cô Em Gái Dũng Cảm Của Đại Lão" /><span
                                                    class="lb-item">Dịch/Edit</span><span class="overBox"><i
                                                        class="fa fa-star"></i>
                                                    8.64/10</a></div><strong class="title"><a
                                                href="truyen/thap-nien-70-xuyen-thanh-co-em-gai-dung-cam-cua-dai-lao/index.html"
                                                title="Thập Niên 70: Xuyên Thành Cô Em Gái Dũng Cảm Của Đại Lão">Thập Niên
                                                70: Xuyên
                                                Thành Cô Em Gái Dũng Cảm Của Đại Lão</a></strong>
                                    </div>
                                </div>
                                <!-- Thêm các 'slider-item' khác tương tự -->
                            </div>
                        </div>
                        <!-- Phần thông tin truyện -->
                        <div class="col-xs-12 col-md-6">
                            <h3 class="comic-title">Tổng Tài Tại Thượng</h3>
                            <p class="comic-details">Cung Âu, một tiểu thư giàu có mắc bệnh hoang tưởng, và Thời Tiêu Niệm,
                                một tác giả truyện tranh nghèo...</p>
                            <span class="comic-stats">Views: 662.8M | Likes: 21.9M</span>
                        </div>
                    </div>
                </div>
            </div>




            {{-- <div class="col-xs-12 col-md-6">
                <div class="panel panel-default comic-card">
                    <div class="panel-body">
                        <div id="decu">
                            <div class="row row-heading">
                                <div class="col-xs-7">
                                    <h2 class="heading crop-text"><i class="fa fa-fire" aria-hidden="true"></i> Đề Cử
                                        Tháng
                                    </h2>
                                </div>
                                <div class="col-xs-5">
                                    <div class="pull-right">
                                        <div class="form-group"> <select id="ajax-topdanhvong" name="newest-category"
                                                class="form-control">
                                                <option value="all">Tất Cả</option>
                                                <option value="bach-hop">Bách Hợp <i class="fa fa-venus-double c-d-d"
                                                        aria-hidden="true"></i></option>
                                                <option value="can-dai">Cận Đại</option>
                                                <option value="co-dai">Cổ Đại</option>
                                                <option value="di-gioi">Dị Giới</option>
                                                <option value="di-nang">Dị Năng</option>
                                                <option value="huyen-huyen">Huyền Huyễn <i class="fa fa-magic c-d-d"
                                                        aria-hidden="true"></i></option>
                                                <option value="hai-huoc">Hài Hước</option>
                                                <option value="hac-bang">Hắc Bang</option>
                                                <option value="he-thong">Hệ Thống <i class="fa fa-universal-access c-d-d"
                                                        aria-hidden="true"></i></option>
                                                <option value="khoa-huyen">Khoa Huyễn <i class="fa fa-space-shuttle c-d-d"
                                                        aria-hidden="true"></i></option>
                                                <option value="kiem-hiep">Kiếm Hiệp</option>
                                                <option value="ky-huyen">Kỳ Huyễn</option>
                                                <option value="linh-di">Linh Dị</option>
                                                <option value="mat-the">Mạt Thế</option>
                                                <option value="ngon-tinh">Ngôn Tình <i class="fa fa-heartbeat c-d-d"
                                                        aria-hidden="true"></i></option>
                                                <option value="nguoc">Ngược</option>
                                                <option value="nu-cuong">Nữ Cường</option>
                                                <option value="nu-phu">Nữ Phụ</option>
                                                <option value="phuong-tay">Phương Tây</option>
                                                <option value="quan-nhan">Quân Nhân</option>
                                                <option value="showbiz">Showbiz</option>
                                                <option value="sung">Sủng <i class="fa fa-heartbeat c-d-d"
                                                        aria-hidden="true"></i></option>
                                                <option value="tien-hiep">Tiên Hiệp</option>
                                                <option value="trinh-tham">Trinh Thám</option>
                                                <option value="teen">Truyện Teen <i class="fa fa-child c-d-d"
                                                        aria-hidden="true"></i></option>
                                                <option value="trong-sinh">Trọng Sinh</option>
                                                <option value="tuong-lai">Tương Lai</option>
                                                <option value="tong-tai">Tổng Tài</option>
                                                <option value="vong-du">Võng Du <i class="fa fa-gamepad c-d-d"
                                                        aria-hidden="true"></i></option>
                                                <option value="vuon-truong">Vườn Trường</option>
                                                <option value="xuyen-khong">Xuyên Không <i class="fa fa-history c-d-d"
                                                        aria-hidden="true"></i></option>
                                                <option value="xuyen-nhanh">Xuyên Nhanh</option>
                                                <option value="dam-my">Đam Mỹ <i class="fa fa-mars-double c-d-d"
                                                        aria-hidden="true"></i></option>
                                                <option value="dien-van">Điền Văn</option>
                                                <option value="do-thi">Đô Thị</option>
                                                <option value="dong-nhan">Đồng Nhân <i class="fa fa-bullseye c-d-d"
                                                        aria-hidden="true"></i></option>
                                            </select> </div>
                                    </div>
                                </div>
                            </div>
                            <div id="ajax-topdanhvong-show" class="ztop-5">
                                <ul class="top-3-vinhdanh">
                                    <li>
                                        <div class="vinhdanhtop"><a class="img"
                                                href="truyen/nguoi-choi-binh-thuong-x-de-tu-thien-tai/index.html"
                                                title="NPC Đừng Sợ, Tôi Là Người Tốt"><img
                                                    src="{{ asset('assets/client/uploads/2024/10/nguoi-choi-binh-thuong-x-de-tu-thien-tai-1728001681.jpg') }}"
                                                    alt="NPC Đừng Sợ, Tôi Là Người Tốt"><span
                                                    class="khung-vien-rank"></span>
                                                <div class="overBox crop-text-2">NPC Đừng Sợ, Tôi Là Người Tốt</div>
                                            </a>
                                            <div class="info text-center"><span class="rank-tag">TOP 1</span></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="vinhdanhtop"><a class="img"
                                                href="truyen/thien-kim-gia-hong-drama-bi-dam-phao-hoi-nghe-tieng-long/index.html"
                                                title="Thiên Kim Giả Hóng Drama Bị Đám Pháo Hôi Nghe Tiếng Lòng"><img
                                                    src="{{ asset('assets/client/uploads/2024/07/thien-kim-gia-hong-drama-bi-dam-phao-hoi-nghe-tieng-long-1720458430.jpg') }}"
                                                    alt="Thiên Kim Giả Hóng Drama Bị Đám Pháo Hôi Nghe Tiếng Lòng"><span
                                                    class="khung-vien-rank"></span>
                                                <div class="overBox crop-text-2">Thiên Kim Giả Hóng Drama Bị Đám Pháo Hôi
                                                    Nghe
                                                    Tiếng Lòng</div>
                                            </a>
                                            <div class="info text-center"><span class="rank-tag">TOP 2</span></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="vinhdanhtop"><a class="img"
                                                href="truyen/nghe-len-tieng-long-ai-nu-bi-ghet-bo-duoc-sung-ai/index.html"
                                                title="Nghe Lén Tiếng Lòng Ái Nữ Bị Ghét Bỏ Được Sủng Ái"><img
                                                    src="{{ asset('assets/client/uploads/2024/06/nghe-len-tieng-long-ai-nu-bi-ghet-bo-duoc-sung-ai-1719186291.jpg') }}"
                                                    alt="Nghe Lén Tiếng Lòng Ái Nữ Bị Ghét Bỏ Được Sủng Ái"><span
                                                    class="khung-vien-rank"></span>
                                                <div class="overBox crop-text-2">Nghe Lén Tiếng Lòng Ái Nữ Bị Ghét Bỏ Được
                                                    Sủng
                                                    Ái</div>
                                            </a>
                                            <div class="info text-center"><span class="rank-tag">TOP 3</span></div>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="star-rank-list">
                                    <li>
                                        <div class="zxt1"><i class="fa fa-star fa-2x" aria-hidden="true"></i><span
                                                class="zxt2">4</span></div><span class="crop-text-1"><a
                                                href="truyen/sau-khi-bi-nghe-thay-tieng-long-nguoi-qua-duong-giap-bong-phat-nhanh/index.html"
                                                title="Sau Khi Bị Nghe Thấy Tiếng Lòng, Người Qua Đường Giáp Bỗng Phất Nhanh">Sau
                                                Khi Bị Nghe Thấy Tiếng Lòng, Người Qua Đường Giáp Bỗng Phất Nhanh</a></span>
                                    </li>
                                    <li>
                                        <div class="zxt1"><i class="fa fa-star fa-2x" aria-hidden="true"></i><span
                                                class="zxt2">5</span></div><span class="crop-text-1"><a
                                                href="truyen/ban-ngay-bi-huy-hon-ban-dem-bi-chi-huy-vua-dang-yeu-vua-hung-du-doi-om/index.html"
                                                title="Vợ Yêu Bỏ Trốn Của Sĩ Quan Đại Nhân">Vợ Yêu Bỏ Trốn Của Sĩ Quan Đại
                                                Nhân</a></span>
                                    </li>
                                    <li>
                                        <div class="zxt1"><i class="fa fa-star fa-2x" aria-hidden="true"></i><span
                                                class="zxt2">6</span></div><span class="crop-text-1"><a
                                                href="truyen/tiem-an-tu-ky-my-thuc/index.html"
                                                title="Tiệm Ăn Từ Ký [Mỹ Thực]">Tiệm Ăn Từ Ký [Mỹ Thực]</a></span>
                                    </li>
                                </ul>
                            </div>
                            <div id="ajax-topdanhvong-show2"> </div>
                        </div>
                    </div>
                    <h3 class="comic-title">Vạn Tra Triều Hoàng</h3>
                    <p class="comic-details">Ngược trở một lúc thì vui, ngược trở nhiều lúc thì vui nhiều lần! Nữ chính Tô
                        Lục Hà kết nối với hệ thống...</p>
                    <span class="comic-stats">Views: 45.3M | Likes: 3.9M</span>
                </div>
            </div> --}}





            <div class="col-xs-12 col-md-6">
                <div class="panel panel-default comic-card">
                    <div class="panel-body">
                        <div class="row">
                            <!-- Phần dropdown và danh sách đề cử -->
                            <div class="col-xs-6">
                                <div id="decu">


                                    <div id="ajax-topdanhvong-show" class="ztop-5">
                                        <ul class="top-3-vinhdanh">
                                            <li>
                                                <div class="vinhdanhtop"><a class="img"
                                                        href="truyen/nguoi-choi-binh-thuong-x-de-tu-thien-tai/index.html"
                                                        title="NPC Đừng Sợ, Tôi Là Người Tốt"><img
                                                            src="{{ asset('assets/client/uploads/2024/10/nguoi-choi-binh-thuong-x-de-tu-thien-tai-1728001681.jpg') }}"
                                                            alt="NPC Đừng Sợ, Tôi Là Người Tốt"><span
                                                            class="khung-vien-rank"></span>
                                                        <div class="overBox crop-text-2">NPC Đừng Sợ, Tôi Là Người Tốt
                                                        </div>
                                                    </a>
                                                    <div class="info text-center"><span class="rank-tag">TOP 1</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="vinhdanhtop"><a class="img"
                                                        href="truyen/thien-kim-gia-hong-drama-bi-dam-phao-hoi-nghe-tieng-long/index.html"
                                                        title="Thiên Kim Giả Hóng Drama Bị Đám Pháo Hôi Nghe Tiếng Lòng"><img
                                                            src="{{ asset('assets/client/uploads/2024/07/thien-kim-gia-hong-drama-bi-dam-phao-hoi-nghe-tieng-long-1720458430.jpg') }}"
                                                            alt="Thiên Kim Giả Hóng Drama Bị Đám Pháo Hôi Nghe Tiếng Lòng"><span
                                                            class="khung-vien-rank"></span>
                                                        <div class="overBox crop-text-2">Thiên Kim Giả Hóng Drama Bị Đám
                                                            Pháo Hôi
                                                            Nghe
                                                            Tiếng Lòng</div>
                                                    </a>
                                                    <div class="info text-center"><span class="rank-tag">TOP 2</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="vinhdanhtop"><a class="img"
                                                        href="truyen/nghe-len-tieng-long-ai-nu-bi-ghet-bo-duoc-sung-ai/index.html"
                                                        title="Nghe Lén Tiếng Lòng Ái Nữ Bị Ghét Bỏ Được Sủng Ái"><img
                                                            src="{{ asset('assets/client/uploads/2024/06/nghe-len-tieng-long-ai-nu-bi-ghet-bo-duoc-sung-ai-1719186291.jpg') }}"
                                                            alt="Nghe Lén Tiếng Lòng Ái Nữ Bị Ghét Bỏ Được Sủng Ái"><span
                                                            class="khung-vien-rank"></span>
                                                        <div class="overBox crop-text-2">Nghe Lén Tiếng Lòng Ái Nữ Bị Ghét
                                                            Bỏ Được
                                                            Sủng
                                                            Ái</div>
                                                    </a>
                                                    <div class="info text-center"><span class="rank-tag">TOP 3</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="star-rank-list mb-3">
                                            <li>
                                                <div class="zxt1"><i class="fa fa-star fa-2x"
                                                        aria-hidden="true"></i><span class="zxt2">4</span></div><span
                                                    class="crop-text-1"><a
                                                        href="truyen/sau-khi-bi-nghe-thay-tieng-long-nguoi-qua-duong-giap-bong-phat-nhanh/index.html"
                                                        title="Sau Khi Bị Nghe Thấy Tiếng Lòng, Người Qua Đường Giáp Bỗng Phất Nhanh">Sau
                                                        Khi Bị Nghe Thấy Tiếng Lòng, Người Qua Đường Giáp Bỗng Phất
                                                        Nhanh</a></span>
                                            </li>
                                            <li>
                                                <div class="zxt1"><i class="fa fa-star fa-2x"
                                                        aria-hidden="true"></i><span class="zxt2">5</span></div><span
                                                    class="crop-text-1"><a
                                                        href="truyen/ban-ngay-bi-huy-hon-ban-dem-bi-chi-huy-vua-dang-yeu-vua-hung-du-doi-om/index.html"
                                                        title="Vợ Yêu Bỏ Trốn Của Sĩ Quan Đại Nhân">Vợ Yêu Bỏ Trốn Của Sĩ
                                                        Quan Đại
                                                        Nhân</a></span>
                                            </li>
                                            <li>
                                                <div class="zxt1"><i class="fa fa-star fa-2x"
                                                        aria-hidden="true"></i><span class="zxt2">6</span></div><span
                                                    class="crop-text-1"><a href="truyen/tiem-an-tu-ky-my-thuc/index.html"
                                                        title="Tiệm Ăn Từ Ký [Mỹ Thực]">Tiệm Ăn Từ Ký [Mỹ Thực]</a></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Phần tiêu đề truyện, mô tả, và số liệu thống kê -->
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <select id="ajax-topdanhvong" name="newest-category" class="form-control">
                                        <option value="all">Tất Cả</option>
                                        <option value="bach-hop">Bách Hợp <i class="fa fa-venus-double c-d-d"
                                                aria-hidden="true"></i></option>
                                        <option value="can-dai">Cận Đại</option>
                                        <option value="co-dai">Cổ Đại</option>
                                        <option value="di-gioi">Dị Giới</option>
                                        <option value="di-nang">Dị Năng</option>
                                        <option value="huyen-huyen">Huyền Huyễn <i class="fa fa-magic c-d-d"
                                                aria-hidden="true"></i></option>
                                        <option value="hai-huoc">Hài Hước</option>
                                        <option value="hac-bang">Hắc Bang</option>
                                        <option value="he-thong">Hệ Thống <i class="fa fa-universal-access c-d-d"
                                                aria-hidden="true"></i></option>
                                        <option value="khoa-huyen">Khoa Huyễn <i class="fa fa-space-shuttle c-d-d"
                                                aria-hidden="true"></i></option>
                                        <option value="kiem-hiep">Kiếm Hiệp</option>
                                        <option value="ky-huyen">Kỳ Huyễn</option>
                                        <option value="linh-di">Linh Dị</option>
                                        <option value="mat-the">Mạt Thế</option>
                                        <option value="ngon-tinh">Ngôn Tình <i class="fa fa-heartbeat c-d-d"
                                                aria-hidden="true"></i></option>
                                        <option value="nguoc">Ngược</option>
                                        <option value="nu-cuong">Nữ Cường</option>
                                        <option value="nu-phu">Nữ Phụ</option>
                                        <option value="phuong-tay">Phương Tây</option>
                                        <option value="quan-nhan">Quân Nhân</option>
                                        <option value="showbiz">Showbiz</option>
                                        <option value="sung">Sủng <i class="fa fa-heartbeat c-d-d"
                                                aria-hidden="true"></i></option>
                                        <option value="tien-hiep">Tiên Hiệp</option>
                                        <option value="trinh-tham">Trinh Thám</option>
                                        <option value="teen">Truyện Teen <i class="fa fa-child c-d-d"
                                                aria-hidden="true"></i></option>
                                        <option value="trong-sinh">Trọng Sinh</option>
                                        <option value="tuong-lai">Tương Lai</option>
                                        <option value="tong-tai">Tổng Tài</option>
                                        <option value="vong-du">Võng Du <i class="fa fa-gamepad c-d-d"
                                                aria-hidden="true"></i></option>
                                        <option value="vuon-truong">Vườn Trường</option>
                                        <option value="xuyen-khong">Xuyên Không <i class="fa fa-history c-d-d"
                                                aria-hidden="true"></i></option>
                                        <option value="xuyen-nhanh">Xuyên Nhanh</option>
                                        <option value="dam-my">Đam Mỹ <i class="fa fa-mars-double c-d-d"
                                                aria-hidden="true"></i></option>
                                        <option value="dien-van">Điền Văn</option>
                                        <option value="do-thi">Đô Thị</option>
                                        <option value="dong-nhan">Đồng Nhân <i class="fa fa-bullseye c-d-d"
                                                aria-hidden="true"></i></option>
                                    </select>
                                </div>
                                <h3 class="comic-title">Vạn Tra Triều Hoàng</h3>
                                <p class="comic-details">Ngược trở một lúc thì vui, ngược trở nhiều lúc thì vui nhiều lần!
                                    Nữ chính Tô Lục Hà kết nối với hệ thống...</p>
                                <span class="comic-stats">Views: 45.3M | Likes: 3.9M</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    <style>
        .comic-card {
            margin-top: 20px;
        }

        .comic-image {
            width: 100%;
            height: auto;
        }

        .comic-title {
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        .comic-details {
            font-size: 14px;
            color: #666;
        }

        .comic-stats {
            font-size: 12px;
            color: #999;
        }
    </style>




    <div class="container home top-layout">
        <div class="row">
            <div class="col-xs-12 col-md-3">
                <div class="row row-heading">
                    <div class="col-xs-7">
                        <h2 class="heading crop-text"><i class="fa fa-ticket" aria-hidden="true"></i> Mới Được Đẩy</h2>
                    </div>
                    <div class="col-xs-5">
                        <div class="pull-right">
                            <div class="form-group"> <select class="form-control select-bxh select-newhot"
                                    data-id="newhot">
                                    <option value="all">Tất Cả</option>
                                    <option value="bach-hop">Bách Hợp <i class="fa fa-venus-double c-d-d"
                                            aria-hidden="true"></i></option>
                                    <option value="can-dai">Cận Đại</option>
                                    <option value="co-dai">Cổ Đại</option>
                                    <option value="di-gioi">Dị Giới</option>
                                    <option value="di-nang">Dị Năng</option>
                                    <option value="huyen-huyen">Huyền Huyễn <i class="fa fa-magic c-d-d"
                                            aria-hidden="true"></i></option>
                                    <option value="hai-huoc">Hài Hước</option>
                                    <option value="hac-bang">Hắc Bang</option>
                                    <option value="he-thong">Hệ Thống <i class="fa fa-universal-access c-d-d"
                                            aria-hidden="true"></i></option>
                                    <option value="khoa-huyen">Khoa Huyễn <i class="fa fa-space-shuttle c-d-d"
                                            aria-hidden="true"></i></option>
                                    <option value="kiem-hiep">Kiếm Hiệp</option>
                                    <option value="ky-huyen">Kỳ Huyễn</option>
                                    <option value="linh-di">Linh Dị</option>
                                    <option value="mat-the">Mạt Thế</option>
                                    <option value="ngon-tinh">Ngôn Tình <i class="fa fa-heartbeat c-d-d"
                                            aria-hidden="true"></i></option>
                                    <option value="nguoc">Ngược</option>
                                    <option value="nu-cuong">Nữ Cường</option>
                                    <option value="nu-phu">Nữ Phụ</option>
                                    <option value="phuong-tay">Phương Tây</option>
                                    <option value="quan-nhan">Quân Nhân</option>
                                    <option value="showbiz">Showbiz</option>
                                    <option value="sung">Sủng <i class="fa fa-heartbeat c-d-d" aria-hidden="true"></i>
                                    </option>
                                    <option value="tien-hiep">Tiên Hiệp</option>
                                    <option value="trinh-tham">Trinh Thám</option>
                                    <option value="teen">Truyện Teen <i class="fa fa-child c-d-d"
                                            aria-hidden="true"></i></option>
                                    <option value="trong-sinh">Trọng Sinh</option>
                                    <option value="tuong-lai">Tương Lai</option>
                                    <option value="tong-tai">Tổng Tài</option>
                                    <option value="vong-du">Võng Du <i class="fa fa-gamepad c-d-d"
                                            aria-hidden="true"></i></option>
                                    <option value="vuon-truong">Vườn Trường</option>
                                    <option value="xuyen-khong">Xuyên Không <i class="fa fa-history c-d-d"
                                            aria-hidden="true"></i></option>
                                    <option value="xuyen-nhanh">Xuyên Nhanh</option>
                                    <option value="dam-my">Đam Mỹ <i class="fa fa-mars-double c-d-d"
                                            aria-hidden="true"></i></option>
                                    <option value="dien-van">Điền Văn</option>
                                    <option value="do-thi">Đô Thị</option>
                                    <option value="dong-nhan">Đồng Nhân <i class="fa fa-bullseye c-d-d"
                                            aria-hidden="true"></i></option>
                                </select> </div>
                        </div>
                    </div>
                </div>
                <div id="newhot_echo">
                    <ul class="list-ranking">
                        <li class="item">
                            <div class="index index-1"><i class="icon-medal-1"></i></div>
                            <div class="content media">
                                <div class="info"><strong class="crop-text-1"><a
                                            href="truyen/xuyen-thanh-phao-hoi-toi-phong-than-o-mat-the/index.html"
                                            class="d-block">Xuyên Thành Pháo Hôi, Tôi Phong Thần Ở Mạt Thế</a></strong>
                                    <div class="view color-gray"><i class="fa fa-eye" aria-hidden="true"></i> 111K</div>
                                    <div class="crop-text-2 color-gray"></div>
                                </div>
                                <div class="thumb">
                                    <div class="book-cover"><a
                                            href="truyen/xuyen-thanh-phao-hoi-toi-phong-than-o-mat-the/index.html"
                                            title="Xuyên Thành Pháo Hôi, Tôi Phong Thần Ở Mạt Thế"
                                            class="book-cover-link"><img
                                                src="{{ asset('assets/client/uploads/2024/10/11769212.jpg') }}"
                                                alt="Xuyên Thành Pháo Hôi, Tôi Phong Thần Ở Mạt Thế"></a><span
                                            class="book-cover-shadow"></span></div>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="index"><i class="icon-medal-2"></i></div>
                            <div class="content media"><a
                                    href="truyen/tieu-giong-cai-la-van-nhan-me-duong-mot-o-long-xu-xu/index.html"
                                    class="crop-text-1">Tiểu Giống Cái Là Vạn Nhân Mê, Dưỡng Một Ổ Lông Xù Xù</a><span
                                    class="color-gray item-number">100K</span></div>
                        </li>
                        <li class="item">
                            <div class="index"><i class="icon-medal-3"></i></div>
                            <div class="content media"><a href="truyen/phu-quan-ta-ngot-ngao-nhat-the-gian/index.html"
                                    class="crop-text-1">Phu Quân Ta Ngọt Ngào Nhất Thế Gian</a><span
                                    class="color-gray item-number">100K</span></div>
                        </li>
                        <li class="item">
                            <div class="index">4</div>
                            <div class="content media"><a
                                    href="truyen/thap-nien-80-trong-sinh-lat-nguoi-tro-thanh-em-gai-ca-nha-cung-chieu/index.html"
                                    class="crop-text-1">Thập Niên 80: Trọng Sinh Lật Người Trở Thành Em Gái Cả Nhà Cưng
                                    Chiều</a><span class="color-gray item-number">20K</span></div>
                        </li>
                        <li class="item">
                            <div class="index">5</div>
                            <div class="content media"><a href="truyen/meo-con-va-con-bang/index.html"
                                    class="crop-text-1">Mèo Con Và Côn Bằng</a><span
                                    class="color-gray item-number">30K</span></div>
                        </li>
                        <li class="item">
                            <div class="index">6</div>
                            <div class="content media"><a
                                    href="truyen/toi-gia-chet-sau-khi-cuu-roi-nu-chinh-omega/index.html"
                                    class="crop-text-1">Tôi Giả Chết Sau Khi Cứu Rỗi Nữ Chính Omega</a><span
                                    class="color-gray item-number">10K</span></div>
                        </li>
                        <li class="item">
                            <div class="index">7</div>
                            <div class="content media"><a href="truyen/nhung-cach-su-dung-anh-de/index.html"
                                    class="crop-text-1">Những Cách Sử Dụng Ảnh Đế</a><span
                                    class="color-gray item-number">10K</span></div>
                        </li>
                        <li class="item">
                            <div class="index">8</div>
                            <div class="content media"><a
                                    href="truyen/thap-nien-70-mang-theo-khong-gian-ngay-ngay-an-dua/index.html"
                                    class="crop-text-1">Thập Niên 70: Mang Theo Không Gian Ngày Ngày Ăn Dưa</a><span
                                    class="color-gray item-number">30K</span></div>
                        </li>
                        <li class="item">
                            <div class="index">9</div>
                            <div class="content media"><a
                                    href="truyen/ca-lop-deu-co-ket-cuc-the-tham-nghe-tieng-long-toi-de-sua-menh/index.html"
                                    class="crop-text-1">Cả Lớp Đều Có Kết Cục Thê Thảm, Nghe Tiếng Lòng Tôi Để Sửa
                                    Mệnh</a><span class="color-gray item-number">10K</span></div>
                        </li>
                        <li class="item">
                            <div class="index">10</div>
                            <div class="content media"><a
                                    href="truyen/sau-khi-trong-sinh-ta-ga-cho-nguoi-cha-hau-gia-cua-chong-truoc/index.html"
                                    class="crop-text-1">Sau Khi Trọng Sinh Ta Gả Cho Người Cha Hầu Gia Của Chồng
                                    Trước</a><span class="color-gray item-number">100K</span></div>
                        </li>
                    </ul>
                </div>
                <h2 class="heading ztop-15"><i class="fa fa-book"></i> Truyện Full</h2>
                <div id="btv_de_cu" class="ztop-15">
                    <ul class="list-ranking">
                        <li class="item">
                            <div class="content media">
                                <div class="thumb">
                                    <div class="book-cover"><a
                                            href="truyen/sau-khi-tra-cong-tron-hon-toi-ky-hiep-uoc-ket-hon-voi-dai-lao/index.html"
                                            title="Sau Khi Tra Công Trốn Hôn, Tôi Ký Hiệp Ước Kết Hôn Với Đại Lão"
                                            class="book-cover-link"><img
                                                src="{{ asset('assets/client/uploads/2024/07/sau-khi-tra-cong-tron-hon-toi-ky-hiep-uoc-ket-hon-voi-dai-lao-1720616488.jpg') }}"
                                                alt="Sau Khi Tra Công Trốn Hôn, Tôi Ký Hiệp Ước Kết Hôn Với Đại Lão"></a><span
                                            class="book-cover-shadow"></span></div>
                                </div>
                                <div class="info"><strong class="crop-text-1"><a
                                            href="truyen/sau-khi-tra-cong-tron-hon-toi-ky-hiep-uoc-ket-hon-voi-dai-lao/index.html"
                                            class="d-block">Sau Khi Tra Công Trốn Hôn, Tôi Ký Hiệp Ước Kết Hôn Với Đại
                                            Lão</a></strong>
                                    <div class="view color-gray crop-text-2">Toàn bộ giới hào môn ở Nghi Thành đều biết
                                        bên cạnh Chu Nghiêm có một chú chim hoàng yến xinh đẹp tên là Dư Tư Lượng.Chu
                                        Nghiêm đem&nbsp;&hellip;</div>
                                    <div class="color-gray"><i class="fa fa-eye" aria-hidden="true"></i> 23K</div>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="content media"><a href="truyen/mang-theo-cua-cai-di-luu-day/index.html"
                                    class="crop-text-1"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Mang
                                    Theo Của Cải Đi Lưu Đày</a><span class="color-gray item-number">12.3K</span></div>
                        </li>
                        <li class="item">
                            <div class="content media"><a href="truyen/troi-quang/index.html" class="crop-text-1"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Trời Quang</a><span
                                    class="color-gray item-number">22.8K</span></div>
                        </li>
                        <li class="item">
                            <div class="content media"><a
                                    href="truyen/quoc-su-xuyen-thanh-quy-cong-tu-nha-giau/index.html"
                                    class="crop-text-1"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Quốc
                                    Sư Xuyên Thành Quý Công Tử Nhà Giàu</a><span
                                    class="color-gray item-number">25.4K</span></div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="row row-heading">
                    <div class="col-xs-7">
                        <h2 class="heading"><i class="fa fa-spin fa-circle-o-notch"></i> Truyện Mới Cập Nhật</h2>
                    </div>
                    <div class="col-xs-5">
                        <div class="pull-right">
                            <div class="form-group"> <select id="newest-category" name="newest-category"
                                    class="form-control">
                                    <option value="all">Tất Cả</option>
                                    <option value="bach-hop">Bách Hợp <i class="fa fa-venus-double c-d-d"
                                            aria-hidden="true"></i></option>
                                    <option value="can-dai">Cận Đại</option>
                                    <option value="co-dai">Cổ Đại</option>
                                    <option value="di-gioi">Dị Giới</option>
                                    <option value="di-nang">Dị Năng</option>
                                    <option value="huyen-huyen">Huyền Huyễn <i class="fa fa-magic c-d-d"
                                            aria-hidden="true"></i></option>
                                    <option value="hai-huoc">Hài Hước</option>
                                    <option value="hac-bang">Hắc Bang</option>
                                    <option value="he-thong">Hệ Thống <i class="fa fa-universal-access c-d-d"
                                            aria-hidden="true"></i></option>
                                    <option value="khoa-huyen">Khoa Huyễn <i class="fa fa-space-shuttle c-d-d"
                                            aria-hidden="true"></i></option>
                                    <option value="kiem-hiep">Kiếm Hiệp</option>
                                    <option value="ky-huyen">Kỳ Huyễn</option>
                                    <option value="linh-di">Linh Dị</option>
                                    <option value="mat-the">Mạt Thế</option>
                                    <option value="ngon-tinh">Ngôn Tình <i class="fa fa-heartbeat c-d-d"
                                            aria-hidden="true"></i></option>
                                    <option value="nguoc">Ngược</option>
                                    <option value="nu-cuong">Nữ Cường</option>
                                    <option value="nu-phu">Nữ Phụ</option>
                                    <option value="phuong-tay">Phương Tây</option>
                                    <option value="quan-nhan">Quân Nhân</option>
                                    <option value="showbiz">Showbiz</option>
                                    <option value="sung">Sủng <i class="fa fa-heartbeat c-d-d" aria-hidden="true"></i>
                                    </option>
                                    <option value="tien-hiep">Tiên Hiệp</option>
                                    <option value="trinh-tham">Trinh Thám</option>
                                    <option value="teen">Truyện Teen <i class="fa fa-child c-d-d"
                                            aria-hidden="true"></i></option>
                                    <option value="trong-sinh">Trọng Sinh</option>
                                    <option value="tuong-lai">Tương Lai</option>
                                    <option value="tong-tai">Tổng Tài</option>
                                    <option value="vong-du">Võng Du <i class="fa fa-gamepad c-d-d"
                                            aria-hidden="true"></i></option>
                                    <option value="vuon-truong">Vườn Trường</option>
                                    <option value="xuyen-khong">Xuyên Không <i class="fa fa-history c-d-d"
                                            aria-hidden="true"></i></option>
                                    <option value="xuyen-nhanh">Xuyên Nhanh</option>
                                    <option value="dam-my">Đam Mỹ <i class="fa fa-mars-double c-d-d"
                                            aria-hidden="true"></i></option>
                                    <option value="dien-van">Điền Văn</option>
                                    <option value="do-thi">Đô Thị</option>
                                    <option value="dong-nhan">Đồng Nhân <i class="fa fa-bullseye c-d-d"
                                            aria-hidden="true"></i></option>
                                </select> </div>
                        </div>
                    </div>
                </div>
                <div id="newest">
                    <div class="row">
                        <div class="col-xs-9 col-sm-6 col-md-7 col-first">
                            <div class="col-line-first">
                                <div class="crop-text-1"><i class="fa fa-chevron-right color-gray"
                                        aria-hidden="true"></i><a class="color-black"
                                        href="truyen/au-te-manh-oa-o-tinh-te-lam-doan-sung/index.html"
                                        title="Bé Con Xuyên Tới Tinh Tế Làm Thần Thú"> Bé Con Xuyên Tới Tinh Tế Làm Thần
                                        Thú</a><span class="label-title label-full"></span></div>
                            </div>
                        </div>
                        <div class="hidden-xs col-sm-3 col-md-3 color-gray col-line-first">
                            <div class>
                                <div class="crop-text-1"><a href="keyword/dam-my/index.html">Đam Mỹ</a>, <a
                                        href="keyword/xuyen-khong/index.html">Xuyên Không</a></div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-2 color-gray col-last">
                            <div class="col-line-last">
                                <div class="col-line-last-margin crop-text-1">6 giây trước</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-9 col-sm-6 col-md-7 col-first">
                            <div class="col-line-first">
                                <div class="crop-text-1"><i class="fa fa-chevron-right color-gray"
                                        aria-hidden="true"></i><a class="color-black"
                                        href="truyen/ma-vuong-hom-nay-da-dong-thue-chua/index.html"
                                        title="Ma Vương Hôm Nay Đã Đóng Thuế Chưa?"> Ma Vương Hôm Nay Đã Đóng Thuế
                                        Chưa?</a></div>
                            </div>
                        </div>
                        <div class="hidden-xs col-sm-3 col-md-3 color-gray col-line-first">
                            <div class>
                                <div class="crop-text-1"><a href="keyword/ngon-tinh/index.html">Ngôn Tình</a>, <a
                                        href="keyword/linh-di/index.html">Linh Dị</a></div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-2 color-gray col-last">
                            <div class="col-line-last">
                                <div class="col-line-last-margin crop-text-1">16 giây trước</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-9 col-sm-6 col-md-7 col-first">
                            <div class="col-line-first">
                                <div class="crop-text-1"><i class="fa fa-chevron-right color-gray"
                                        aria-hidden="true"></i><a class="color-black"
                                        href="truyen/xe-can-cu-cua-toi-trong-mat-the/index.html"
                                        title="Xe Căn Cứ Của Tôi Trong Mạt Thế"> Xe Căn Cứ Của Tôi Trong Mạt Thế</a>
                                </div>
                            </div>
                        </div>
                        <div class="hidden-xs col-sm-3 col-md-3 color-gray col-line-first">
                            <div class>
                                <div class="crop-text-1"><a href="keyword/ngon-tinh/index.html">Ngôn Tình</a>, <a
                                        href="keyword/khoa-huyen/index.html">Khoa Huyễn</a></div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-2 color-gray col-last">
                            <div class="col-line-last">
                                <div class="col-line-last-margin crop-text-1">16 giây trước</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-9 col-sm-6 col-md-7 col-first">
                            <div class="col-line-first">
                                <div class="crop-text-1"><i class="fa fa-chevron-right color-gray"
                                        aria-hidden="true"></i><a class="color-black"
                                        href="truyen/chet-roi-cung-khong-tha-cho-em/index.html"
                                        title="Chết Rồi Cũng Không Tha Cho Em"> Chết Rồi Cũng Không Tha Cho Em</a></div>
                            </div>
                        </div>
                        <div class="hidden-xs col-sm-3 col-md-3 color-gray col-line-first">
                            <div class>
                                <div class="crop-text-1"><a href="keyword/dam-my/index.html">Đam Mỹ</a>, <a
                                        href="keyword/linh-di/index.html">Linh Dị</a></div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-2 color-gray col-last">
                            <div class="col-line-last">
                                <div class="col-line-last-margin crop-text-1">31 giây trước</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-9 col-sm-6 col-md-7 col-first">
                            <div class="col-line-first">
                                <div class="crop-text-1"><i class="fa fa-chevron-right color-gray"
                                        aria-hidden="true"></i><a class="color-black"
                                        href="truyen/dau-bep-lam-tinh-chinh-phuc-tinh-te/index.html"
                                        title="Đầu Bếp Lam Tinh, Chinh Phục Tinh Tế"> Đầu Bếp Lam Tinh, Chinh Phục Tinh
                                        Tế</a></div>
                            </div>
                        </div>
                        <div class="hidden-xs col-sm-3 col-md-3 color-gray col-line-first">
                            <div class>
                                <div class="crop-text-1"><a href="keyword/dam-my/index.html">Đam Mỹ</a>, <a
                                        href="keyword/sung/index.html">Sủng</a></div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-2 color-gray col-last">
                            <div class="col-line-last">
                                <div class="col-line-last-margin crop-text-1">59 giây trước</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-9 col-sm-6 col-md-7 col-first">
                            <div class="col-line-first">
                                <div class="crop-text-1"><i class="fa fa-chevron-right color-gray"
                                        aria-hidden="true"></i><a class="color-black"
                                        href="truyen/long-da-hiem-doc-my-thuc-quan-quan-an-ngon/index.html"
                                        title="Lòng Dạ Hiểm Độc Mỹ Thực Quán (Quán Ăn Ngon)"> Lòng Dạ Hiểm Độc Mỹ Thực
                                        Quán (Quán Ăn Ngon)</a></div>
                            </div>
                        </div>
                        <div class="hidden-xs col-sm-3 col-md-3 color-gray col-line-first">
                            <div class>
                                <div class="crop-text-1"><a href="keyword/bach-hop/index.html">Bách Hợp</a>, <a
                                        href="keyword/sung/index.html">Sủng</a></div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-2 color-gray col-last">
                            <div class="col-line-last">
                                <div class="col-line-last-margin crop-text-1">1 phút trước</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-9 col-sm-6 col-md-7 col-first">
                            <div class="col-line-first">
                                <div class="crop-text-1"><i class="fa fa-chevron-right color-gray"
                                        aria-hidden="true"></i><a class="color-black"
                                        href="truyen/xuyen-thanh-thai-tu-phi-bi-luu-day/index.html"
                                        title="Xuyên Thành Thái Tử Phi Bị Lưu Đày"> Xuyên Thành Thái Tử Phi Bị Lưu
                                        Đày</a></div>
                            </div>
                        </div>
                        <div class="hidden-xs col-sm-3 col-md-3 color-gray col-line-first">
                            <div class>
                                <div class="crop-text-1"><a href="keyword/dam-my/index.html">Đam Mỹ</a>, <a
                                        href="keyword/co-dai/index.html">Cổ Đại</a></div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-2 color-gray col-last">
                            <div class="col-line-last">
                                <div class="col-line-last-margin crop-text-1">1 phút trước</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-9 col-sm-6 col-md-7 col-first">
                            <div class="col-line-first">
                                <div class="crop-text-1"><i class="fa fa-chevron-right color-gray"
                                        aria-hidden="true"></i><a class="color-black"
                                        href="truyen/trong-sinh-mat-the-tro-thanh-be-yeu-cua-dai-lao-tan-ac/index.html"
                                        title="Trọng Sinh Mạt Thế: Trở Thành Bé Yêu Của Đại Lão Tàn Ác"> Trọng Sinh Mạt
                                        Thế: Trở Thành Bé Yêu Của Đại Lão Tàn Ác</a></div>
                            </div>
                        </div>
                        <div class="hidden-xs col-sm-3 col-md-3 color-gray col-line-first">
                            <div class>
                                <div class="crop-text-1"><a href="keyword/ngon-tinh/index.html">Ngôn Tình</a>, <a
                                        href="keyword/nu-phu/index.html">Nữ Phụ</a></div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-2 color-gray col-last">
                            <div class="col-line-last">
                                <div class="col-line-last-margin crop-text-1">1 phút trước</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-9 col-sm-6 col-md-7 col-first">
                            <div class="col-line-first">
                                <div class="crop-text-1"><i class="fa fa-chevron-right color-gray"
                                        aria-hidden="true"></i><a class="color-black"
                                        href="truyen/mang-theo-vo-dich-he-thong-ta-tro-thanh-huynh-de-tau-hai-cua-thach-hao-om-hon-tat-ca-giai-nhan-the-gioi-hoan-my/index.html"
                                        title="Mang Theo Vô Địch Hệ Thống Ta Trở Thành Huynh Đệ Tấu Hài Của Thạch Hạo Ôm Hôn Tất Cả Giai Nhân Thế Giới Hoàn Mỹ">
                                        Mang Theo Vô Địch Hệ Thống Ta Trở Thành Huynh Đệ Tấu Hài Của Thạch Hạo Ôm Hôn
                                        Tất Cả Giai Nhân Thế Giới Hoàn Mỹ</a><span class="label-title label-new"></span>
                                </div>
                            </div>
                        </div>
                        <div class="hidden-xs col-sm-3 col-md-3 color-gray col-line-first">
                            <div class>
                                <div class="crop-text-1"><a href="keyword/ngon-tinh/index.html">Ngôn Tình</a>, <a
                                        href="keyword/huyen-huyen/index.html">Huyền Huyễn</a></div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-2 color-gray col-last">
                            <div class="col-line-last">
                                <div class="col-line-last-margin crop-text-1">1 phút trước</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-9 col-sm-6 col-md-7 col-first">
                            <div class="col-line-first">
                                <div class="crop-text-1"><i class="fa fa-chevron-right color-gray"
                                        aria-hidden="true"></i><a class="color-black"
                                        href="truyen/son-hai-de-dang/index.html" title="Sơn Hải Đề Đăng"> Sơn Hải Đề
                                        Đăng</a></div>
                            </div>
                        </div>
                        <div class="hidden-xs col-sm-3 col-md-3 color-gray col-line-first">
                            <div class>
                                <div class="crop-text-1"><a href="keyword/huyen-huyen/index.html">Huyền Huyễn</a>, <a
                                        href="#">Tiên Hiệp</a></div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-2 color-gray col-last">
                            <div class="col-line-last">
                                <div class="col-line-last-margin crop-text-1">2 phút trước</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-9 col-sm-6 col-md-7 col-first">
                            <div class="col-line-first">
                                <div class="crop-text-1"><i class="fa fa-chevron-right color-gray"
                                        aria-hidden="true"></i><a class="color-black"
                                        href="truyen/tuyet-sac-giai-nhan-nha-nong/index.html"
                                        title="Tuyệt Sắc Giai Nhân Nhà Nông"> Tuyệt Sắc Giai Nhân Nhà Nông</a></div>
                            </div>
                        </div>
                        <div class="hidden-xs col-sm-3 col-md-3 color-gray col-line-first">
                            <div class>
                                <div class="crop-text-1"><a href="keyword/ngon-tinh/index.html">Ngôn Tình</a>, <a
                                        href="keyword/co-dai/index.html">Cổ Đại</a></div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-2 color-gray col-last">
                            <div class="col-line-last">
                                <div class="col-line-last-margin crop-text-1">2 phút trước</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-9 col-sm-6 col-md-7 col-first">
                            <div class="col-line-first">
                                <div class="crop-text-1"><i class="fa fa-chevron-right color-gray"
                                        aria-hidden="true"></i><a class="color-black"
                                        href="truyen/thap-nien-70-lam-quan-y-gap-bo-doi-dac-chung/index.html"
                                        title="Thập Niên 70: Làm Quân Y Gặp Bộ Đội Đặc Chủng"> Thập Niên 70: Làm Quân Y
                                        Gặp Bộ Đội Đặc Chủng</a></div>
                            </div>
                        </div>
                        <div class="hidden-xs col-sm-3 col-md-3 color-gray col-line-first">
                            <div class>
                                <div class="crop-text-1"><a href="keyword/ngon-tinh/index.html">Ngôn Tình</a>, <a
                                        href="keyword/trong-sinh/index.html">Trọng Sinh</a></div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-2 color-gray col-last">
                            <div class="col-line-last">
                                <div class="col-line-last-margin crop-text-1">2 phút trước</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-9 col-sm-6 col-md-7 col-first">
                            <div class="col-line-first">
                                <div class="crop-text-1"><i class="fa fa-chevron-right color-gray"
                                        aria-hidden="true"></i><a class="color-black"
                                        href="truyen/nguoi-qua-duong-co-qua-muc-cuong-dai/index.html"
                                        title="Người Qua Đường, Cô Quá Mức Cường Đại"> Người Qua Đường, Cô Quá Mức Cường
                                        Đại</a></div>
                            </div>
                        </div>
                        <div class="hidden-xs col-sm-3 col-md-3 color-gray col-line-first">
                            <div class>
                                <div class="crop-text-1"><a href="keyword/ngon-tinh/index.html">Ngôn Tình</a>, <a
                                        href="keyword/he-thong/index.html">Hệ Thống</a></div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-2 color-gray col-last">
                            <div class="col-line-last">
                                <div class="col-line-last-margin crop-text-1">3 phút trước</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-9 col-sm-6 col-md-7 col-first">
                            <div class="col-line-first">
                                <div class="crop-text-1"><i class="fa fa-chevron-right color-gray"
                                        aria-hidden="true"></i><a class="color-black"
                                        href="truyen/xuyen-sach-lam-de-nhat-nu-nha-dich/index.html"
                                        title="Xuyên Sách Làm Đệ Nhất Nữ Nha Dịch"> Xuyên Sách Làm Đệ Nhất Nữ Nha
                                        Dịch</a></div>
                            </div>
                        </div>
                        <div class="hidden-xs col-sm-3 col-md-3 color-gray col-line-first">
                            <div class>
                                <div class="crop-text-1"><a href="keyword/ngon-tinh/index.html">Ngôn Tình</a>, <a
                                        href="keyword/co-dai/index.html">Cổ Đại</a></div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-2 color-gray col-last">
                            <div class="col-line-last">
                                <div class="col-line-last-margin crop-text-1">3 phút trước</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-9 col-sm-6 col-md-7 col-first">
                            <div class="col-line-first">
                                <div class="crop-text-1"><i class="fa fa-chevron-right color-gray"
                                        aria-hidden="true"></i><a class="color-black"
                                        href="truyen/trong-truyen-me-ke-chong-co-kha-nang-nghe-tieng-long/index.html"
                                        title="Trong Truyện Mẹ Kế, Chồng Có Khả Năng Nghe Tiếng Lòng"> Trong Truyện Mẹ
                                        Kế, Chồng Có Khả Năng Nghe Tiếng Lòng</a></div>
                            </div>
                        </div>
                        <div class="hidden-xs col-sm-3 col-md-3 color-gray col-line-first">
                            <div class>
                                <div class="crop-text-1"><a href="keyword/ngon-tinh/index.html">Ngôn Tình</a>, <a
                                        href="keyword/di-nang/index.html">Dị Năng</a></div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-2 color-gray col-last">
                            <div class="col-line-last">
                                <div class="col-line-last-margin crop-text-1">4 phút trước</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-9 col-sm-6 col-md-7 col-first">
                            <div class="col-line-first">
                                <div class="crop-text-1"><i class="fa fa-chevron-right color-gray"
                                        aria-hidden="true"></i><a class="color-black"
                                        href="truyen/xuyen-sach-roi-ta-bi-bon-dai-lao-duoi-theo-sung/index.html"
                                        title="Xuyên Sách Rồi Ta Bị Bốn Đại Lão Đuổi Theo Sủng"> Xuyên Sách Rồi Ta Bị
                                        Bốn Đại Lão Đuổi Theo Sủng</a></div>
                            </div>
                        </div>
                        <div class="hidden-xs col-sm-3 col-md-3 color-gray col-line-first">
                            <div class>
                                <div class="crop-text-1"><a href="keyword/ngon-tinh/index.html">Ngôn Tình</a>, <a
                                        href="keyword/huyen-huyen/index.html">Huyền Huyễn</a></div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-2 color-gray col-last">
                            <div class="col-line-last">
                                <div class="col-line-last-margin crop-text-1">4 phút trước</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-9 col-sm-6 col-md-7 col-first">
                            <div class="col-line-first">
                                <div class="crop-text-1"><i class="fa fa-chevron-right color-gray"
                                        aria-hidden="true"></i><a class="color-black"
                                        href="truyen/sau-khi-doi-nguoc-vai-nuoi-con-trong-chuong-trinh-thuc-te/index.html"
                                        title="Sau Khi Đổi Ngược Vai Nuôi Con Trong Chương Trình Thực Tế"> Sau Khi Đổi
                                        Ngược Vai Nuôi Con Trong Chương Trình Thực Tế</a></div>
                            </div>
                        </div>
                        <div class="hidden-xs col-sm-3 col-md-3 color-gray col-line-first">
                            <div class>
                                <div class="crop-text-1"><a href="keyword/ngon-tinh/index.html">Ngôn Tình</a>, <a
                                        href="keyword/do-thi/index.html">Đô Thị</a></div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-2 color-gray col-last">
                            <div class="col-line-last">
                                <div class="col-line-last-margin crop-text-1">4 phút trước</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-3" id="bxhtuan">
                <div class="row row-heading">
                    <div class="col-xs-7">
                        <h2 class="heading"><i class="fa fa-free-code-camp" aria-hidden="true"></i> BXH Tuần</h2>
                    </div>
                    <div class="col-xs-5">
                        <div class="pull-right">
                            <div class="form-group"> <select class="form-control select-bxh select-topdanhvong"
                                    data-id="topdanhvong">
                                    <option value="all">Tất Cả</option>
                                    <option value="bach-hop">Bách Hợp <i class="fa fa-venus-double c-d-d"
                                            aria-hidden="true"></i></option>
                                    <option value="can-dai">Cận Đại</option>
                                    <option value="co-dai">Cổ Đại</option>
                                    <option value="di-gioi">Dị Giới</option>
                                    <option value="di-nang">Dị Năng</option>
                                    <option value="huyen-huyen">Huyền Huyễn <i class="fa fa-magic c-d-d"
                                            aria-hidden="true"></i></option>
                                    <option value="hai-huoc">Hài Hước</option>
                                    <option value="hac-bang">Hắc Bang</option>
                                    <option value="he-thong">Hệ Thống <i class="fa fa-universal-access c-d-d"
                                            aria-hidden="true"></i></option>
                                    <option value="khoa-huyen">Khoa Huyễn <i class="fa fa-space-shuttle c-d-d"
                                            aria-hidden="true"></i></option>
                                    <option value="kiem-hiep">Kiếm Hiệp</option>
                                    <option value="ky-huyen">Kỳ Huyễn</option>
                                    <option value="linh-di">Linh Dị</option>
                                    <option value="mat-the">Mạt Thế</option>
                                    <option value="ngon-tinh">Ngôn Tình <i class="fa fa-heartbeat c-d-d"
                                            aria-hidden="true"></i></option>
                                    <option value="nguoc">Ngược</option>
                                    <option value="nu-cuong">Nữ Cường</option>
                                    <option value="nu-phu">Nữ Phụ</option>
                                    <option value="phuong-tay">Phương Tây</option>
                                    <option value="quan-nhan">Quân Nhân</option>
                                    <option value="showbiz">Showbiz</option>
                                    <option value="sung">Sủng <i class="fa fa-heartbeat c-d-d" aria-hidden="true"></i>
                                    </option>
                                    <option value="tien-hiep">Tiên Hiệp</option>
                                    <option value="trinh-tham">Trinh Thám</option>
                                    <option value="teen">Truyện Teen <i class="fa fa-child c-d-d"
                                            aria-hidden="true"></i></option>
                                    <option value="trong-sinh">Trọng Sinh</option>
                                    <option value="tuong-lai">Tương Lai</option>
                                    <option value="tong-tai">Tổng Tài</option>
                                    <option value="vong-du">Võng Du <i class="fa fa-gamepad c-d-d"
                                            aria-hidden="true"></i></option>
                                    <option value="vuon-truong">Vườn Trường</option>
                                    <option value="xuyen-khong">Xuyên Không <i class="fa fa-history c-d-d"
                                            aria-hidden="true"></i></option>
                                    <option value="xuyen-nhanh">Xuyên Nhanh</option>
                                    <option value="dam-my">Đam Mỹ <i class="fa fa-mars-double c-d-d"
                                            aria-hidden="true"></i></option>
                                    <option value="dien-van">Điền Văn</option>
                                    <option value="do-thi">Đô Thị</option>
                                    <option value="dong-nhan">Đồng Nhân <i class="fa fa-bullseye c-d-d"
                                            aria-hidden="true"></i></option>
                                </select> </div>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs nav-tabs-css nav-topdanhvong" data-id="topdanhvong">
                    <li role="presentation" class="active" data-date="ticket"><a>Kim Bài</a></li>
                    <li role="presentation" data-date="revenue"><a>Thánh Bảng</a></li>
                    <li role="presentation" data-date="donate"><a>Donate</a></li>
                </ul>
                <div id="topdanhvong_echo">
                    <ul class="list-ranking">
                        <li class="item">
                            <div class="index index-1"><i class="icon-medal-1"></i></div>
                            <div class="content media">
                                <div class="info"><strong class="crop-text-1"><a
                                            href="truyen/nguoi-choi-binh-thuong-x-de-tu-thien-tai/index.html"
                                            class="d-block">NPC Đừng Sợ, Tôi Là Người Tốt</a></strong>
                                    <div class="view color-gray"><i class="fa fa-ticket" aria-hidden="true"></i> 11.5M
                                    </div>
                                    <div class="crop-text-2 color-gray"></div>
                                </div>
                                <div class="thumb">
                                    <div class="book-cover"><a
                                            href="truyen/nguoi-choi-binh-thuong-x-de-tu-thien-tai/index.html"
                                            title="NPC Đừng Sợ, Tôi Là Người Tốt" class="book-cover-link"><img
                                                src="{{ asset('assets/client/uploads/2024/10/nguoi-choi-binh-thuong-x-de-tu-thien-tai-1728001681.jpg') }}"
                                                alt="NPC Đừng Sợ, Tôi Là Người Tốt"></a><span
                                            class="book-cover-shadow"></span></div>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="index"><i class="icon-medal-2"></i></div>
                            <div class="content media"><a href="truyen/tiem-an-tu-ky-my-thuc/index.html"
                                    class="crop-text-1">Tiệm Ăn Từ Ký [Mỹ Thực]</a><span
                                    class="color-gray item-number">4.9M</span></div>
                        </li>
                        <li class="item">
                            <div class="index"><i class="icon-medal-3"></i></div>
                            <div class="content media"><a
                                    href="truyen/bao-hong-trong-show-anh-em-nho-song-thanh-thoi/index.html"
                                    class="crop-text-1">Bạo Hồng Trong Show Anh Em Nhờ Sống Thảnh Thơi</a><span
                                    class="color-gray item-number">4.5M</span></div>
                        </li>
                        <li class="item">
                            <div class="index">4</div>
                            <div class="content media"><a href="truyen/dau-bep-lam-tinh-chinh-phuc-tinh-te/index.html"
                                    class="crop-text-1">Đầu Bếp Lam Tinh, Chinh Phục Tinh Tế</a><span
                                    class="color-gray item-number">4.3M</span></div>
                        </li>
                        <li class="item">
                            <div class="index">5</div>
                            <div class="content media"><a
                                    href="truyen/thap-nien-90-nho-kha-nang-doc-suy-nghi-co-tro-thanh-than-tham/index.html"
                                    class="crop-text-1">Thập Niên 90: Nhờ Khả Năng Đọc Suy Nghĩ, Cô Trở Thành Thần
                                    Thám</a><span class="color-gray item-number">3.8M</span></div>
                        </li>
                        <li class="item">
                            <div class="index">6</div>
                            <div class="content media"><a
                                    href="truyen/van-nguoi-ghet-that-su-la-thien-tai-hay-sao/index.html"
                                    class="crop-text-1">Vạn Người Ghét Thật Sự Là Thiên Tài Hay Sao?</a><span
                                    class="color-gray item-number">3.7M</span></div>
                        </li>
                        <li class="item">
                            <div class="index">7</div>
                            <div class="content media"><a
                                    href="truyen/tieu-de-cua-van-nhan-me-cung-la-van-nhan-me/index.html"
                                    class="crop-text-1">Tiểu Đệ Của Vạn Nhân Mê Cũng Là Vạn Nhân Mê</a><span
                                    class="color-gray item-number">3.6M</span></div>
                        </li>
                        <li class="item">
                            <div class="index">8</div>
                            <div class="content media"><a
                                    href="truyen/quoc-su-xuyen-thanh-quy-cong-tu-nha-giau/index.html"
                                    class="crop-text-1">Quốc Sư Xuyên Thành Quý Công Tử Nhà Giàu</a><span
                                    class="color-gray item-number">3.5M</span></div>
                        </li>
                    </ul>
                </div>
                <style type="text/css">
                    #bxhtuan .nav-tabs>li {
                        width: 33%;
                    }

                    #bxhtuan .nav-tabs>li:last-child {
                        width: 34%;
                    }
                </style>
                <div class="clearfix ztop-5"> <a href="rank/ticket/index.html" class="pull-right"> Xem Thêm <i
                            class="fa fa-arrow-right font-16" aria-hidden="true"></i> </a> </div>
                <div id="about" class="top-layout-child">
                    <div class="dividerHeader"><span>TruyenHD Có Gì Hot?</span></div>
                    <ul class="parent">
                        <li class="crop-text"> Chia sẻ doanh thu lên đến 90%</li>
                        <li class="crop-text"> Miễn phí rút tiền</li>
                        <li class="crop-text"> Quy đổi lượt xem trên mọi đầu truyện</li>
                        <li class="crop-text"> Lên lịch, đặt mật khẩu đăng chương</li>
                        <li class="crop-text"> Thông tin giao dịch minh bạch</li>
                    </ul>
                    <div id="wps-double-btn"> <a class="wps-btn-left" href="about/index.html" target="_self"> <span
                                class="wps-text-wrapper"> <i class="fa fa-hand-o-right" aria-hidden="true"></i> Chi
                                Tiết
                            </span> </a> <span>OR</span> <a class="wps-btn-right crop-text"
                            href="user/dang-truyen/index.html" target="_self"> <span class="wps-text-wrapper"> <i
                                    class="fa fa-cloud-upload" aria-hidden="true"></i> Đăng Truyện </span> </a> </div>
                </div>
            </div>
        </div>
    </div>
    <style type="text/css">
        .heading {
            /* -webkit-border-image: unset; border-bottom: solid 1px #2f2f2f;*/
        }

        .heading .heading-full {
            display: block
        }
    </style>
@endsection
