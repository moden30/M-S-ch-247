@extends('client.layouts.app')
@push('styles')
    <link rel="stylesheet" href="https://truyenhdt.com/wp-content/themes/truyenfull/echo/css/custom.min.css?v100063">
    <link rel="stylesheet" href="https://truyenhdt.com/wp-content/themes/truyenfull/echo/css/chap.css?v100063">
    <link rel="stylesheet"
          href="https://truyenhdt.com/wp-content/themes/truyenfull/echo/css/bootstrap/only-popup.css?v100063">
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=G-9FDLYB1SVX" type="text/javascript"></script>

@endpush
@section('content')
    <div class="clearfix"></div>
    <div class="container">
        <div id="ads-header" class="text-center" style="margin-bottom: 10px"></div>
    </div>
    <div class="container container-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="https://truyenhdt.com"><span class="fa fa-home"></span> Home</a>
            </li>
            <li class="breadcrumb-item"><a href="/keyword/ngon-tinh/">{{ $chuong->sach->theLoai->ten_the_loai }}</a></li>
            <li class="breadcrumb-item"><a href="/keyword/linh-di/">{{ $chuong->sach->ten_sach }}</a></li>
            <li class="breadcrumb-item"><a
                    href="https://truyenhdt.com/truyen/quai-vat-xuc-tu-co-day-chi-muon-song/chap/9841373-chuong-1//">Chương {{ $chuong->so_chuong }} : {{ $chuong->tieu_de }}</a></li>
        </ol>
    </div>
    <div class="container cpt truyen">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="text-center"> Chương {{ $chuong->so_chuong }} : {{ $chuong->tieu_de }} <span
                        class="dropdown dropdown-wrench ms-3 color-gray font-16"> <a class="dropdown-toggle"
                            data-toggle="dropdown" href="#"> <i class="fa fa-wrench" aria-hidden="true"></i>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/user/quan-ly-truyen/edit-chuong/?id=9841429#h2"><i
                                        class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa Chương</a></li>
                        </ul>
                    </span> </h1>
                <div class="text-center color-gray"> <span class="me-3"> <a href="/author/dieudieu"> <i
                                class="fa fa-user" aria-hidden="true"></i> {{ $chuong->sach->tac_gia }} </a> </span> <span
                        class="me-3"> <i class="fa fa-file-word-o" aria-hidden="true"></i> {{ $countText }} chữ </span> <a
                        href="/web/setting-chap?url=https://truyenhdt.com/truyen/quai-vat-xuc-tu-co-day-chi-muon-song/chap/9841373-chuong-1/">
                        <i class="fa fa-cog" aria-hidden="true"></i> Cài Đặt </a> </div>
                <div class="pagination pagination-top mt-5">
                    <div class="next-chap next-chap-1"></div>
                    <div class="fullchap">
                        <div class="full"> <span class="btn btn-secondary2 btn-unborder"><i class="fa fa-list-alt"
                                    aria-hidden="true"></i></span> </div>
                    </div>
                    <div class="next-chap next-chap-2"><a
                            href="https://truyenhdt.com/truyen/quai-vat-xuc-tu-co-day-chi-muon-song/chap/9841373-chuong-2/"
                            class="tag-sm color-white btn-primary" role="button"><span></span>Tiếp »</a></div>
                </div>
                <div id="ads-chap-top" class="text-center"></div>
                <div class="reading" style="color: rgb(51, 51, 51);">
                    {{ $chuong->noi_dung }}
                </div>
                <div class="hidden-xs hidden-sm hidden-md text-center mt-3 color-gray"> Sử dụng mũi tên trái (←) hoặc
                    phải (→) để chuyển chương </div>
                <div id="ads-chap-bottom" class="text-center"></div>
                <div class="pagination pagination-bottom">
                    <div class="next-chap next-chap-1"></div>
                    <div class="fullchap">
                        <div class="full"> <span class="btn btn-secondary2 btn-unborder"><i class="fa fa-list-alt"
                                    aria-hidden="true"></i></span> </div>
                    </div>
                    <div class="next-chap next-chap-2"><a
                            href="https://truyenhdt.com/truyen/quai-vat-xuc-tu-co-day-chi-muon-song/chap/9841373-chuong-2/"
                            class="tag-sm color-white btn-primary" role="button"><span></span>Tiếp »</a></div>
                </div>
                <div id="views" data-title="Quái Vật Xúc Tu Cô Đây Chỉ Muốn Sống" data-id="9841373"
                    data-slug="quai-vat-xuc-tu-co-day-chi-muon-song" data-chap="9841373-chuong-1"
                    data-chapid="9841429" data-gold="0" data-date="2023-09-21 16:38:50" data-status="publish">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modaldsc" tabindex="-1" aria-labelledby="modaldsc" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="w-100">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="modal-title" id="modaldsc">Danh Sách Chương</h3> <button type="button"
                                class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="">Sắp Xếp</div>
                            <div class="">
                                <div id="dsc_asc" class="btn btn-primary"><i class="fa fa-sort-numeric-asc"
                                        aria-hidden="true"></i> Cũ nhất</div>
                                <div id="dsc_desc" class="btn btn-secondary"><i class="fa fa-sort-numeric-desc"
                                        aria-hidden="true"></i> Mới nhất</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="modal-body-dsc"> </div>
                </div>
                <div class="modal-footer"> <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Đóng</button> </div>
            </div>
        </div>
    </div>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="https://truyenhdt.com"><span class="fa fa-home"></span> Home</a>
            </li>
            <li class="breadcrumb-item"><a href="/keyword/ngon-tinh/">{{ $chuong->sach->theLoai->ten_the_loai }}</a></li>
            <li class="breadcrumb-item"><a href="/keyword/linh-di/">{{ $chuong->sach->ten_sach }}</a></li>
            <li class="breadcrumb-item"><a
                    href="https://truyenhdt.com/truyen/quai-vat-xuc-tu-co-day-chi-muon-song/chap/9841373-chuong-1//">Chương {{ $chuong->so_chuong }} : {{ $chuong->tieu_de }}</a></li>
        </ol>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        var ajaxurl = "https://truyenhdt.com/wp-admin/admin-ajax.php";
    </script>
    <script src="https://truyenhdt.com/wp-content/themes/truyenfull/echo/js/echo.js?v100063" type="text/javascript">
    </script>
    <script src="https://truyenhdt.com/wp-content/themes/truyenfull/echo/js/ajax/chuong.js?v100063" type="text/javascript">
    </script>
    <script src="https://truyenhdt.com/wp-content/themes/truyenfull/echo/js/bootstrap/only-popup.js?v100063"
            type="text/javascript"></script>
    <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js" type="text/javascript"></script>
    <div id="ads-check" data-domain="truyenhdt.com"></div>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            var referral = window.location.href;
            var ref = referral.match(/\?ref=([0-9]{1,})/);
            if (ref != null) {
                ref = ref[1];
                Cookies.set('referral', ref, {
                    expires: 30,
                    path: '/',
                    sameSite: 'lax'
                });
            }
            var user_display_name = Cookies.get('user_display_name');
            if (user_display_name != undefined) {
                user_display_name = decodeURIComponent(user_display_name);
                user_display_name = user_display_name.replace(/\+/g, " ");
                $('#user_display_name').html(user_display_name);
                $('#d_u_login').html('<a href="/user/profile#h1"><i class="fa fa-user"></i> Profile</a>');
                $('#d_u').append(
                    '<li><a href="/user/quan-ly-truyen/?q=1#h1"><i class="fa fa-list-alt"></i> Quản Lý Truyện</a></li><li><a href="/user/tin-nhan/#h1"><i class="fa fa-envelope"></i> Tin Nhắn</a></li><li><a href="/user/deposit#h1"><i class="fa fa-money"></i> Nạp Vàng</a></li>'
                )
            }
            var window_width = $(window).width();
            if (window_width < 992) {
                $('#ads-header').html('');
                $('#ads-footer').html('');
                $('#hotest').css({
                    "margin-bottom": "0px"
                });
                $('#hotest').css({
                    "margin-bottom": "0px"
                });
                var html_ads_catfish = '';
                if (html_ads_catfish != '') {
                    $('#mobile-catfish').html(html_ads_catfish);
                    if (window_width >= 640) {
                        $('.sticky-footer-content').css({
                            "display": "table",
                            "text-align": "center",
                            "width": "unset"
                        });
                    }
                }
            } else if (window_width >= 1024) {
                $('#ads-header').html('');
                $('#ads-footer').html('');
                $('#ads-truyen-layout-2 img').css({
                    "width": "100%"
                });
            }
            if (window_width >= 1500) {
                $('#skycraper_right').html('');
                $('#skycraper_left').html('');
            }
            if (window_width < 768) {
                $(".ads-content-1").html('<br>');
                $(".ads-content-2").html('<br>');
                $(".ads-content-3").html('<br>');
            } else if (window_width <= 1024) {
                $(".ads-content-1").html('<br>');
                $(".ads-content-2").html('<br>');
                $(".ads-content-3").html('<br>');
            } else {
                $(".ads-content-1").html('<br>');
                $(".ads-content-2").html('<br>');
                $(".ads-content-3").html('<br>');
            }
            $('html').on('click', '.sticky-x-button', function(event) {
                event.preventDefault();
                $(this).parent().html('');
            });
        });
    </script>
@endpush

