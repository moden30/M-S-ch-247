@extends('client.layouts.app')
@section('content')
    <div class="clearfix"></div>
    <div class="container">
        <div id="ads-header" class="text-center" style="margin-bottom: 10px"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-3 col-md-push-9" style="position: relative;">
                <div class="position-relative"><a href="user/dang-truyen/index.html" class="btn-primary btn-dangtruyen">
                        <i
                            class="fa fa-plus-circle" aria-hidden="true"></i>
                        <span>Đăng truyện</span> </a>
                    <div class="button-writer__arrow"><img width="30" height="54"
                                                           src="{{ asset('assets/client/themes/truyenfull/echo/img/arrow2.png') }}">
                    </div>
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
                            <div class="btn-home-icon" data-value="tab_home_1"><i class="fa fa-eye fa-lg"
                                                                                  aria-hidden="true"></i>
                                <div class="number-home-icon" id="number-da-doc"></div>
                            </div>
                            <div class="text-home-icon"> Đã Đọc</div>
                        </div>
                        <div class="col-btn-home-icon" id="tab_home_3">
                            <div class="btn-home-icon" data-value="tab_home_3"><i class="fa fa-tags"
                                                                                  aria-hidden="true"></i>
                                <div class="number-home-icon" id="number-tu-khoa"></div>
                            </div>
                            <div class="text-home-icon"> Bookmark</div>
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
                        <div class="col-btn-home-icon" id="tab_home_4"><a href="user/profile/index.html#h1">
                                <div class="btn-home-icon" data-value="tab_home_4"><i class="fa fa-user"
                                                                                      aria-hidden="true"></i></div>
                                <div class="text-home-icon"> Tài Khoản</div>
                            </a></div>
                        <div class="col-btn-home-icon" id="tab_home_5"><a href="q-a/index.html">
                                <div class="btn-home-icon" data-value="tab_home_5"><i class="fa fa-reply-all"
                                                                                      aria-hidden="true"></i></div>
                                <div class="text-home-icon"> Hỏi Đáp</div>
                            </a></div>
                        <div class="col-btn-home-icon" id="tab_home_6"><a href="amp/index.html">
                                <div class="btn-home-icon-2" data-value="tab_home_6"><i class="fa fa-home"
                                                                                        aria-hidden="true"></i></div>
                                <div class="text-home-icon"> Bản Mới</div>
                            </a></div>
                    </div>
                    <div class="clearfix"></div>
                    <div id="show-layout-home-1"></div>
                </div>
            </div>

            {{-- Đổ ra banner của trang chủ --}}
            <div class="col-xs-12 col-md-6">
                <div class="slider-cont slider-cont-sliderbanner" id="sliderbanner">
                    @foreach ($slider->hinhAnhBanner as $item)
                        <div class="sliderbanner-item">
                            <a href="#" target="_blank">
                                <img data-src="{{ $item->hinh_anh }}"/>
                            </a>
                        </div>
                    @endforeach
                </div>
                <style type="text/css">
                    .sliderbanner-item img {
                        -webkit-background-size: cover;
                        -moz-background-size: cover;
                        -o-background-size: cover;
                        background-size: cover;
                        width: 100%;
                        height: 196px;
                        object-fit: cover;
                    }

                    .slider-cont.slider-cont-sliderbanner .slick-prev.slick-arrow {
                        left: 5px;
                    }

                    .slider-cont.slider-cont-sliderbanner .slick-next.slick-arrow {
                        right: 5px;
                    }
                </style>
            </div>
            <div class="col-xs-12 col-m-12 col-md-3 col-md-pull-9">
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
                                    <a href="{{ route('thong-bao-chung', ['id' => auth()->user()->id]) }}"
                                       title="Xem Thêm">
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
                                <div class="crop-text"><i
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
            </div>
        </div>
    </div>
    <div class="container top-layout" id="home-layout-add">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-push-3">
                <h2 class="heading crop-text"><i class="fa fa-copyright" aria-hidden="true"></i> Độc Quyền</h2>
                <div class="row ztop-5">
                    <div class="col-xs-10">
                        <div id="docquyen">
                            <div class="docquyen-item"><img
                                    src="{{ asset('assets/client/uploads/2024/09/au-te-manh-oa-o-tinh-te-lam-doan-sung-1725664021.jpg') }}"/>
                            </div>
                            <div class="docquyen-item"><img
                                    src="{{ asset('assets/client/uploads/2024/10/xe-can-cu-cua-toi-trong-mat-the-1728297403.jpg') }}"/>
                            </div>
                            <div class="docquyen-item"><img
                                    src="{{ asset('assets/client/uploads/2024/08/11501574.jpg') }}"/></div>
                            <div class="docquyen-item"><img
                                    src="{{ asset('assets/client/uploads/2024/09/11646211.jpg') }}"/></div>
                            <div class="docquyen-item"><img
                                    src="{{ asset('assets/client/uploads/2023/12/xuyen-thanh-thai-tu-phi-bi-luu-day-1702997084.jpg') }}"/>
                            </div>
                            <div class="docquyen-item"><img
                                    src="{{ asset('assets/client/uploads/2024/09/11624124.jpg') }}"/></div>
                            <div class="docquyen-item"><img
                                    src="{{ asset('assets/client/uploads/2023/07/9473346.jpg') }}"/></div>
                        </div>
                    </div>
                    <div class="col-xs-6" style=" right: 0px; position: absolute;">
                        <div class="docquyen-content docquyen-content-0 "><a
                                href="truyen/au-te-manh-oa-o-tinh-te-lam-doan-sung/index.html"> <span
                                    class="docquyen-title crop-text-1">Bé Con Xuyên Tới Tinh Tế Làm Thần Thú</span>
                            </a>
                            <div class="docquyen-excerpt ztop-10">Ở thời đại tinh tế, La Dương xuyên qua trở thành một
                                con ma thú vô cùng đáng yêu, chỉ có thể dựa vào lương thực cứu tế mà …
                            </div>
                            <div class="ztop-15"></div>
                            <a href="truyen/au-te-manh-oa-o-tinh-te-lam-doan-sung/index.html">
                                <span class="btn btn-primary border-radius">Đọc Truyện</span> </a>
                        </div>
                        <div class="docquyen-content docquyen-content-1 hidden"><a
                                href="truyen/xe-can-cu-cua-toi-trong-mat-the/index.html"> <span
                                    class="docquyen-title crop-text-1">Xe Căn Cứ Của Tôi Trong Mạt Thế</span> </a>
                            <div class="docquyen-excerpt ztop-10">Khi tận thế đang đến gần, Giang Lưu Thạch bất ngờ nhận
                                được một công nghệ đen có thể nâng cấp và cải tiến các phương tiện giao thông. …
                            </div>
                            <div class="ztop-15"></div>
                            <a href="truyen/xe-can-cu-cua-toi-trong-mat-the/index.html">
                                <span class="btn btn-primary border-radius">Đọc Truyện</span> </a>
                        </div>
                        <div class="docquyen-content docquyen-content-2 hidden"><a
                                href="truyen/chet-roi-cung-khong-tha-cho-em/index.html"> <span
                                    class="docquyen-title crop-text-1">Chết Rồi Cũng Không Tha Cho Em</span> </a>
                            <div class="docquyen-excerpt ztop-10">Năm 18 tuổi, vì thể chất đặc biệt, cậu đã nhận nhầm
                                một hồn ma là ba mình dưới sự thao túng kỳ lạ của ông nội.Ma quái, thật …
                            </div>
                            <div class="ztop-15"></div>
                            <a href="truyen/chet-roi-cung-khong-tha-cho-em/index.html">
                                <span class="btn btn-primary border-radius">Đọc Truyện</span> </a>
                        </div>
                        <div class="docquyen-content docquyen-content-3 hidden"><a
                                href="truyen/dau-bep-lam-tinh-chinh-phuc-tinh-te/index.html"> <span
                                    class="docquyen-title crop-text-1">Đầu Bếp Lam Tinh, Chinh Phục Tinh Tế</span>
                            </a>
                            <div class="docquyen-excerpt ztop-10">Bếp trưởng nổi danh Lam Tinh, Úc Trục Nhan, sau một
                                tai nạn máy bay bất ngờ xuyên vào một cuốn tiểu thuyết máu chó giữa thế giới tinh …
                            </div>
                            <div class="ztop-15"></div>
                            <a href="truyen/dau-bep-lam-tinh-chinh-phuc-tinh-te/index.html">
                                <span class="btn btn-primary border-radius">Đọc Truyện</span> </a>
                        </div>
                        <div class="docquyen-content docquyen-content-4 hidden"><a
                                href="truyen/xuyen-thanh-thai-tu-phi-bi-luu-day/index.html"> <span
                                    class="docquyen-title crop-text-1">Xuyên Thành Thái Tử Phi Bị Lưu Đày</span>
                            </a>
                            <div class="docquyen-excerpt ztop-10">Editor: CyndaquilGiới thiệu:Sau khi tỉnh dậy sau một
                                tai nạn, Chu Sơ Ninh xuyên qua thành con vợ lẽ, nam giả nữ thay chị gái con dòng chính
                                đi …
                            </div>
                            <div class="ztop-15"></div>
                            <a href="truyen/xuyen-thanh-thai-tu-phi-bi-luu-day/index.html">
                                <span class="btn btn-primary border-radius">Đọc Truyện</span> </a>
                        </div>
                        <div class="docquyen-content docquyen-content-5 hidden"><a
                                href="truyen/trong-sinh-mat-the-tro-thanh-be-yeu-cua-dai-lao-tan-ac/index.html"> <span
                                    class="docquyen-title crop-text-1">Trọng Sinh Mạt Thế: Trở Thành Bé Yêu Của Đại Lão
                                    Tàn Ác</span> </a>
                            <div class="docquyen-excerpt ztop-10">Lục Dao thức tỉnh vào một tuần trước khi mạt thế buông
                                xuống, biết được mình là nữ phụ vì đưa không gian tùy thân cho em gái mà …
                            </div>
                            <div class="ztop-15"></div>
                            <a
                                href="truyen/trong-sinh-mat-the-tro-thanh-be-yeu-cua-dai-lao-tan-ac/index.html"> <span
                                    class="btn btn-primary border-radius">Đọc Truyện</span> </a>
                        </div>
                        <div class="docquyen-content docquyen-content-6 hidden"><a
                                href="truyen/xuyen-sach-lam-de-nhat-nu-nha-dich/index.html"> <span
                                    class="docquyen-title crop-text-1">Xuyên Sách Làm Đệ Nhất Nữ Nha Dịch</span>
                            </a>
                            <div class="docquyen-excerpt ztop-10">Giới thiệu nội dungNàng tình cờ xuyên vào trong sách,
                                phát hiện cha mẹ của nguyên chủ trong sách đều bị giết, cả nhà bị chu di tam tộc. …
                            </div>
                            <div class="ztop-15"></div>
                            <a href="truyen/xuyen-sach-lam-de-nhat-nu-nha-dich/index.html">
                                <span class="btn btn-primary border-radius">Đọc Truyện</span> </a>
                        </div>
                    </div>
                </div>
                <hr class="docquyen-hr">
                <div class="row docquyen-event">
                    <div class="col-xs-4">
                        <div class="d-event-title crop-text"><a
                                href="truyen/trong-truyen-me-ke-chong-co-kha-nang-nghe-tieng-long/index.html"> Trong
                                Truyện Mẹ Kế, Chồng Có Khả Năng Nghe Tiếng Lòng </a></div>
                        <div class="d-event-excerpt crop-text-2 ztop-5 font-15"> Ngu Miểu xuyên sách, xuyên vào một cuốn
                            truyện hào môn, trở thành mẹ kế. Trong sách, nguyên chủ không yêu tiền tài chỉ yêu chồng hào
                            môn, vì …
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="d-event-title crop-text"><a
                                href="truyen/xuyen-sach-roi-ta-bi-bon-dai-lao-duoi-theo-sung/index.html"> Xuyên Sách
                                Rồi
                                Ta Bị Bốn Đại Lão Đuổi Theo Sủng </a></div>
                        <div class="d-event-excerpt crop-text-2 ztop-5 font-15"> [Nhiều nam chính + Tu la tràng + Cạnh
                            tranh nam + Nhiều ngoại truyện, nhiều kết cục]Quý Thanh Diều xuyên sách rồi, nhiệm vụ là
                            cùng lúc công …
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="d-event-title crop-text"><a
                                href="truyen/phoi-bay-kiep-truoc-khien-ca-coi-mang-chan-dong/index.html"> Phơi Bày
                                Kiếp
                                Trước Khiến Cả Cõi Mạng Chấn Động </a></div>
                        <div class="d-event-excerpt crop-text-2 ztop-5 font-15"> Cơ thể của Dạ Vãn Lan bị xuyên qua,
                            người xuyên việt khiến cuộc sống của cô trở nên chướng khí mù mịt rồi vung tay rời đi, cuối
                            …
                        </div>
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

                    @media (min-width: 1200px) {
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

                    #docquyen .slick-current + div {
                        transform: translate(-25%, 0) scale(.8);
                        position: relative;
                        z-index: 5;
                    }

                    #docquyen .slick-current + div + div {
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
                                        alt="Xuyên Sách Thập Niên 70: Mở Khóa Bí Kíp, Tán Tỉnh Anh Lính Xuề Xòa"/><span
                                        class="lb-item">Dịch/Edit</span><span class="overBox"><i
                                            class="fa fa-star"></i>
                                        6.71/10</a></div>
                            <strong class="title"><a
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
                                        alt="Người Trừ Tà Kết Minh Hôn"/><span class="lb-item">Dịch/Edit</span><span
                                        class="overBox"><i class="fa fa-star"></i> 8/10</a></div>
                            <strong
                                class="title"><a href="truyen/ket-minh-hon-co-vo-tre-la-ma/index.html"
                                                 title="Người Trừ Tà Kết Minh Hôn">Người Trừ Tà Kết Minh
                                    Hôn</a></strong>
                        </div>
                    </div>
                    <div class="slider-item">
                        <div class="premiumItem">
                            <div class="img"><a
                                    href="truyen/truoc-khi-luu-day-ta-dung-khong-gian-khoang-sach-hoang-cung/index.html"
                                    title="Trước Khi Lưu Đày Ta Dùng Không Gian Khoắng Sạch Hoàng Cung"><img
                                        src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                        data-src="https://truyenhdt.com/wp-content/uploads/2023/09/truoc-khi-luu-day-ta-dung-khong-gian-khoang-sach-hoang-cung.jpg"
                                        alt="Trước Khi Lưu Đày Ta Dùng Không Gian Khoắng Sạch Hoàng Cung"/><span
                                        class="lb-item">Dịch/Edit</span><span class="overBox"><i
                                            class="fa fa-star"></i>
                                        7/10</a></div>
                            <strong class="title"><a
                                    href="truyen/truoc-khi-luu-day-ta-dung-khong-gian-khoang-sach-hoang-cung/index.html"
                                    title="Trước Khi Lưu Đày Ta Dùng Không Gian Khoắng Sạch Hoàng Cung">Trước Khi
                                    Lưu
                                    Đày Ta Dùng Không Gian Khoắng Sạch Hoàng Cung</a></strong>
                        </div>
                    </div>
                    <div class="slider-item">
                        <div class="premiumItem">
                            <div class="img"><a href="truyen/nguoi-yeu-be-nho-cua-chi/index.html"
                                                title="Người Yêu Bé Nhỏ Của Chị"><img
                                        src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                        data-src="https://truyenhdt.com/wp-content/uploads/2024/05/nguoi-yeu-be-nho-cua-chi-1716285112.jpg"
                                        alt="Người Yêu Bé Nhỏ Của Chị"/><span class="lb-item">Sáng Tác</span><span
                                        class="overBox"><i class="fa fa-star"></i> 9.12/10</a></div>
                            <strong
                                class="title"><a href="truyen/nguoi-yeu-be-nho-cua-chi/index.html"
                                                 title="Người Yêu Bé Nhỏ Của Chị">Người Yêu Bé Nhỏ Của
                                    Chị</a></strong>
                        </div>
                    </div>
                    <div class="slider-item">
                        <div class="premiumItem">
                            <div class="img"><a href="truyen/mi-tinh-3/index.html" title="Mị Tình"><img
                                        src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                        data-src="https://truyenhdt.com/wp-content/uploads/2024/08/mi-tinh-3-1722687688.jpg"
                                        alt="Mị Tình"/><span class="lb-item">Dịch/Edit</span><span
                                        class="overBox"><i
                                            class="fa fa-star"></i> 9.19/10</a></div>
                            <strong class="title"><a
                                    href="truyen/mi-tinh-3/index.html" title="Mị Tình">Mị Tình</a></strong>
                        </div>
                    </div>
                    <div class="slider-item">
                        <div class="premiumItem">
                            <div class="img"><a href="truyen/dua-vao-rut-tham-nam-thang-o-thap-nien-70/index.html"
                                                title="Dựa Vào Rút Thăm Nằm Thắng Ở Thập Niên 70"><img
                                        src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                        data-src="https://truyenhdt.com/wp-content/uploads/2024/09/dua-vao-rut-tham-nam-thang-o-thap-nien-70-1727294231.jpg"
                                        alt="Dựa Vào Rút Thăm Nằm Thắng Ở Thập Niên 70"/><span
                                        class="lb-item">Dịch/Edit</span><span class="overBox"><i
                                            class="fa fa-star"></i>
                                        7.33/10</a></div>
                            <strong class="title"><a
                                    href="truyen/dua-vao-rut-tham-nam-thang-o-thap-nien-70/index.html"
                                    title="Dựa Vào Rút Thăm Nằm Thắng Ở Thập Niên 70">Dựa Vào Rút Thăm Nằm Thắng Ở
                                    Thập
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
                                        alt="Thập Niên 70: Xuyên Thành Cô Em Gái Dũng Cảm Của Đại Lão"/><span
                                        class="lb-item">Dịch/Edit</span><span class="overBox"><i
                                            class="fa fa-star"></i>
                                        8.64/10</a></div>
                            <strong class="title"><a
                                    href="truyen/thap-nien-70-xuyen-thanh-co-em-gai-dung-cam-cua-dai-lao/index.html"
                                    title="Thập Niên 70: Xuyên Thành Cô Em Gái Dũng Cảm Của Đại Lão">Thập Niên 70:
                                    Xuyên
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
                                <div class="form-group"><select id="ajax-topdanhvong" name="newest-category"
                                                                class="form-control">
                                        <option value="all">Tất Cả</option>
                                        @foreach($the_loais as $item)
                                            <option value="{{$item->id}}">{{$item->ten_the_loai}}</option>
                                        @endforeach
                                    </select></div>
                            </div>
                        </div>
                    </div>
                    <div id="ajax-topdanhvong-show" class="ztop-5">
                        <ul class="top-3-vinhdanh">

                            @foreach($sach_de_cu_thangs as $item)
                                @if($loop->index < 3)
                                    <li>
                                        <div class="vinhdanhtop"><a class="img"
                                                                    href="truyen/nguoi-choi-binh-thuong-x-de-tu-thien-tai/index.html"
                                                                    title="NPC Đừng Sợ, Tôi Là Người Tốt"><img
                                                    src="{{ asset('assets/client/uploads/2024/10/nguoi-choi-binh-thuong-x-de-tu-thien-tai-1728001681.jpg') }}"
                                                    alt="NPC Đừng Sợ, Tôi Là Người Tốt"><span
                                                    class="khung-vien-rank"></span>
                                                <div class="overBox crop-text-2">{{$item->sach->ten_sach}}</div>
                                            </a>
                                            <div class="info text-center"><span class="rank-tag">TOP 1</span></div>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <ul class="star-rank-list">
                            @foreach($sach_de_cu_thangs as $item)
                                @if($loop->index > 2)
                                    <li>
                                        <div class="zxt1"><i class="fa fa-star fa-2x" aria-hidden="true"></i><span
                                                class="zxt2">4</span></div>
                                        <span class="crop-text-1"><a
                                                href="truyen/sau-khi-bi-nghe-thay-tieng-long-nguoi-qua-duong-giap-bong-phat-nhanh/index.html"
                                                title="Sau Khi Bị Nghe Thấy Tiếng Lòng, Người Qua Đường Giáp Bỗng Phất Nhanh">Sau
                                        Khi Bị Nghe Thấy Tiếng Lòng, Người Qua Đường Giáp Bỗng Phất Nhanh</a></span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div id="ajax-topdanhvong-show2"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container ztop-10">
        <div class="explanationbc">
            <div id="userads">
                @foreach ($hotBooks as $item)
                    <div class="item"><a href="{{ route('chi-tiet-sach', $item->id) }}"><img
                                src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                data-src="{{ $item->anh_bia_sach }}"/>
                            <div class="countdown"><em>{{ $item->created_at->diffForHumans() }}</em></div>
                            <div class="title crop-text-2">{{ $item->ten_sach }}</div>
                        </a></div>
                @endforeach
            </div>
        </div>
        <style type="text/css">
            .explanationbc {
                border: 10px solid #fff;
                border-radius: 16px;
                position: relative;
                margin: 0 0 1rem;
                display: flex;
                margin-top: 25px;
                background: unset;
                padding: 0px 10px;
            }

            .explanationbc::after {
                font-family: FontAwesome, 'Oswald';
                font-weight: normal;
                left: 1rem;
                padding: 0 .5rem;
                position: absolute;
                z-index: 1;
                content: "\f251  Sách HOT";
                /*content: "";*/
                color: #000;
                background: #ffffff;
                top: -30px;
                font-size: 20px;
            }

            .explanationbc::before {
                content: "";
                position: absolute;
                top: -10px;
                left: -10px;
                right: -10px;
                bottom: -10px;
                border: 1px solid #1ebbf0;
                border-radius: 8px;
                pointer-events: none;
            }

            #userads .item {
                width: calc((100% - 2px) / 12);
                float: left;
                margin-bottom: 10px;
                margin-right: 10px;
                position: relative;
                -webkit-transition: all .1s ease-in-out;
                transition: all .1s ease-in-out;
            }

            #userads .item:nth-child(12) {
                margin-right: 0px;
            }

            #userads .item img {
                width: 100%;
                aspect-ratio: 2 / 3;
            }

            #userads .item:hover {
                -webkit-transform: scale(1.2);
                -ms-transform: scale(1.2);
                transform: scale(1.2);
            }

            #userads {
                margin-top: 10px;
            }

            #userads .title {
                position: absolute;
                bottom: 0;
                left: 0;
                color: white;
                background-color: rgba(0, 0, 0, 0.7);
                width: 100%;
                padding: 3px;
                text-align: center;
                font-size: 12px;
                z-index: 3;
                overflow: hidden;
                white-space: normal;
                text-overflow: ellipsis;
                height: 38px;
            }

            #userads .countdown {
                top: 0px;
                font-size: 10px;
                position: absolute;
                overflow: hidden;
                width: 50px;
                height: 50px;
                text-align: center;
                z-index: 1;
                color: #c3a84f;
            }

            #userads .countdown em {
                font-size: 10px;
                line-height: 10px;
                padding: 21px 0px 5px 0px;
                position: absolute;
                right: -20px;
                bottom: 0px;
                left: 0;
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg);
                -webkit-transform-origin: left bottom;
                transform-origin: left bottom;
                color: inherit;
                background-color: currentColor;
                font-style: normal;
            }

            #userads .countdown::after {
                position: absolute;
                top: 2px;
                left: 2px;
                width: 10px;
                height: 9px;
                content: "\f017";
                font: normal normal normal 14px/1 FontAwesome;
                background-size: 100%;
                color: white;
            }

            #userads .countdown > em::first-line {
                color: #fff
            }

            @media only screen and (min-width: 992px) {
                /* #userads .item:nth-child(4), #decu2 .item:nth-child(8), #decu2 .item:nth-child(12) { margin-right: 10px; } #userads .item:nth-child(6), #decu2 .item:nth-child(12) { margin-right: 0px; } */
            }
        </style>
    </div>
    <div class="container home top-layout">
        <div class="row">
            <div class="col-xs-12 col-md-3">
                <div class="row row-heading">
                    <div class="col-xs-7">
                        <h2 class="heading crop-text"><i class="fa fa-ticket" aria-hidden="true"></i> Sách mới</h2>
                    </div>
                    <div class="col-xs-5">
                        <div class="pull-right">
                            <div class="form-group">
                                <select class="form-control select-bxh select-newhot" data-id="newhot">
                                    <option value="all">Tất Cả</option>
                                    @foreach($the_loais as $item)
                                        <option value="{{$item->id}}">{{$item->ten_the_loai}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="newhot_echo">
                    <ul class="list-ranking">
                        @foreach($newBooks as $item)
                            @if($loop->index === 0)
                                <li class="item">
                                    <div class="index index-1"><i class="icon-medal-1"></i></div>
                                    <div class="content media">
                                        <div class="info"><strong class="crop-text-1"><a
                                                    href="{{route('chi-tiet-sach', $item->id)}}"
                                                    class="d-block">{{$item->ten_sach}}</a></strong>
                                            <div class="view color-gray"><i class="fa fa-eye" aria-hidden="true"></i>
                                                {{$item->getFormattedViewsAttribute()}}
                                            </div>
                                            <div class="crop-text-2 color-gray"></div>
                                        </div>
                                        <div class="thumb">
                                            <div class="book-cover"><a
                                                    href="{{route('chi-tiet-sach', $item->id)}}"
                                                    title="Xuyên Thành Pháo Hôi, Tôi Phong Thần Ở Mạt Thế"
                                                    class="book-cover-link"><img
                                                        src="{{ $item->anh_bia_sach }}"
                                                        alt="Xuyên Thành Pháo Hôi, Tôi Phong Thần Ở Mạt Thế"></a><span
                                                    class="book-cover-shadow"></span></div>
                                        </div>
                                    </div>
                                </li>
                            @elseif($loop->index === 1)
                                <li class="item">
                                    <div class="index"><i class="icon-medal-2"></i></div>
                                    <div class="content media"><a
                                            href="{{route('chi-tiet-sach', $item->id)}}"
                                            class="crop-text-1">{{$item->ten_sach}}</a><span
                                            class="color-gray item-number">{{$item->getFormattedViewsAttribute()}}</span>
                                    </div>
                                </li>
                            @elseif($loop->index === 2)
                                <li class="item">
                                    <div class="index"><i class="icon-medal-3"></i></div>
                                    <div class="content media"><a
                                            href="{{route('chi-tiet-sach', $item->id)}}"
                                            class="crop-text-1">{{$item->ten_sach}}</a><span
                                            class="color-gray item-number">{{$item->getFormattedViewsAttribute()}}</span>
                                    </div>
                                </li>
                            @else
                                <li class="item">
                                    <div class="index">{{$loop->index}}</div>
                                    <div class="content media"><a
                                            href="{{route('chi-tiet-sach', $item->id)}}"
                                            class="crop-text-1">{{$item->ten_sach}}</a><span
                                            class="color-gray item-number">{{$item->getFormattedViewsAttribute()}}</span>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <h2 class="heading ztop-15"><i class="fa fa-book"></i> Sách Full Chương</h2>
                <div id="btv_de_cu" class="ztop-15">
                    <ul class="list-ranking">
                        @foreach($fulledBooks as $item)
                            @if($loop->index === 0)
                                <li class="item">
                                    <div class="content media">
                                        <div class="thumb">
                                            <div class="book-cover"><a
                                                    href="{{route('chi-tiet-sach', $item->id)}}"
                                                    title="{{$item->ten_sach}}"
                                                    class="book-cover-link"><img
                                                        src="{{ $item->anh_bia_sach }}"
                                                        alt="{{$item->ten_sach}}"></a><span
                                                    class="book-cover-shadow"></span></div>
                                        </div>
                                        <div class="info"><strong class="crop-text-1"><a
                                                    href="{{route('chi-tiet-sach', $item->id)}}"
                                                    class="d-block">{{$item->ten_sach}}</a></strong>
                                            <div class="view color-gray crop-text-2">{{$item->tom_tat}}
                                            </div>
                                            <div class="color-gray"><i class="fa fa-eye"
                                                                       aria-hidden="true"></i> {{$item->getFormattedViewsAttribute()}}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @else
                                <li class="item">
                                    <div class="content media">
                                        <a href="{{route('chi-tiet-sach', $item->id)}}" class="crop-text-1">
                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                            {{$item->ten_sach}}
                                        </a>
                                        <span
                                            class="color-gray item-number">{{$item->getFormattedViewsAttribute()}}</span>
                                    </div>
                                </li>
                            @endif
                        @endforeach
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
                            <div class="form-group"><select id="newest-category" name="newest-category"
                                                            class="form-control">
                                    <option value="all">Tất Cả</option>
                                    @foreach($the_loais as $item)
                                        <option value="{{$item->id}}">{{$item->ten_the_loai}}</option>
                                    @endforeach
                                </select></div>
                        </div>
                    </div>
                </div>
                <div id="newest">
                    @foreach($sach_moi_cap_nhats as $item)
                        <div class="row">
                            <div class="col-xs-9 col-sm-6 col-md-7 col-first">
                                <div class="col-line-first">
                                    <div class="crop-text-1">
                                        <i class="fa fa-chevron-right color-gray" aria-hidden="true"></i>
                                        <a class="color-black" href="{{route('chi-tiet-sach', $item->id)}}"
                                           title="{{$item->ten_sach}}">
                                            {{$item->ten_sach}}
                                        </a>
                                        @if($item->tinh_trang_cap_nhat === 'da_full')
                                            <span class="label-title label-full"></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="hidden-xs col-sm-3 col-md-3 color-gray col-line-first">
                                <div class>
                                    <div class="crop-text-1">
                                        <a href="keyword/dam-my/index.html">{{$item->theLoai->ten_the_loai}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3 col-sm-3 col-md-2 color-gray col-last">
                                <div class="col-line-last">
                                    <div
                                        class="col-line-last-margin crop-text-1">{{$item->updated_at->diffForHumans()}}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-xs-12 col-md-3" id="bxhtuan">
                <div class="row row-heading">
                    <div class="col-xs-7">
                        <h2 class="heading"><i class="fa fa-free-code-camp" aria-hidden="true"></i> BXH Tuần</h2>
                    </div>
                    <div class="col-xs-5">
                        <div class="pull-right">
                            <div class="form-group">
                                <select class="form-control select-bxh select-topdanhvong"
                                        data-id="topdanhvong">
                                    <option value="all">Tất Cả</option>
                                    @foreach($the_loais as $item)
                                        <option value="{{$item->id}}">{{$item->ten_the_loai}}</option>
                                    @endforeach
                                </select>
                            </div>
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
                                                          class="crop-text-1">Đầu Bếp Lam Tinh, Chinh Phục Tinh
                                    Tế</a><span
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
                    #bxhtuan .nav-tabs > li {
                        width: 33%;
                    }

                    #bxhtuan .nav-tabs > li:last-child {
                        width: 34%;
                    }
                </style>
                <div class="clearfix ztop-5"><a href="rank/ticket/index.html" class="pull-right"> Xem Thêm <i
                            class="fa fa-arrow-right font-16" aria-hidden="true"></i> </a></div>
                <div id="about" class="top-layout-child">
                    <div class="dividerHeader"><span>Mê Sách 247 Có Gì Hot?</span></div>
                    <ul class="parent">
                        <li class="crop-text"> Chia sẻ doanh thu lên đến 70%</li>
                        <li class="crop-text"> Miễn phí rút tiền</li>
                        <li class="crop-text"> Quy đổi lượt xem trên mọi đầu truyện</li>
                        <li class="crop-text"> Thông tin giao dịch minh bạch</li>
                    </ul>
                    <div id="wps-double-btn"><a class="wps-btn-left" href="about/index.html" target="_self"> <span
                                class="wps-text-wrapper"> <i class="fa fa-hand-o-right" aria-hidden="true"></i> Chi
                                Tiết
                            </span> </a> <span>OR</span> <a class="wps-btn-right crop-text"
                                                            href="user/dang-truyen/index.html" target="_self"> <span
                                class="wps-text-wrapper"> <i
                                    class="fa fa-cloud-upload" aria-hidden="true"></i> Đăng Truyện </span> </a></div>
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
