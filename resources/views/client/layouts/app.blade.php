<!DOCTYPE html>
<html lang="vi" id="html">
{{--prefix="og: https://ogp.me/ns#" thêm vào làm props của head nếu bị lỗi --}}

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

<head itemscope>
    {{--    itemtype="https://schema.org/WebSite" thêm vào làm props của head nếu bị lỗi--}}
    <meta charset="utf-8">
    <title>Mê Sách 247 - Thế giới sách của bạn !</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow"/>
    <!-- header paste here -->

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/client/logo.png') }}">
    <link rel="stylesheet"
          href="{{ asset('assets/client/themes/truyenfull/echo/css/bootstrap/bootstrap.minf384.css?v100063') }}">
    <link rel="stylesheet"
          href="{{ asset('assets/client/themes/truyenfull/echo/css/bootstrap/bootstrap-theme.minf384.css?v100063') }}">
    <link rel="stylesheet"
          href="{{ asset('assets/client/themes/truyenfull/echo/css/font-awesome/css/font-awesome.minf384.css?v100063') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/themes/truyenfull/echo/css/custom.minf384.css?v100063') }}">
    <link href="{{ asset('assets/client/themes/truyenfull/echo/css/custom.minf384.css?v100063') }}">
    <meta name="zalo-platform-site-verification" content="GVRYAQlQRJPSrBqrdy9cDX-ypHdppXP0C3O"/>
    <meta name="facebook-domain-verification" content="su9859dm2ngrd4954ao7xl2lqno1rj"/>
    <meta name="dmca-site-verification" content="Mmt1Z04yUGs4TU5nUTI3NWJZd2dUdz090"/>

    {{--    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9FDLYB1SVX"--}}
    {{--            type="979411ecb373ccbd737fc22f-text/javascript">--}}
    {{--    </script>--}}
    {{--    <script--}}
    {{--        type="979411ecb373ccbd737fc22f-text/javascript">--}}
    {{--        window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-9FDLYB1SVX');--}}
    {{--    </script>--}}
    {{--    <script--}}
    {{--        type="application/ld+json">--}}
    {{--        [{"@context":"http:\/\/schema.org","@type":"Website","name":"TruyenHD","url":"https:\/\/truyenhdt.com","potentialAction":{"@type":"SearchAction","target":{"@type":"EntryPoint","urlTemplate":"https:\/\/truyenhdt.com\/tim-kiem\/?title={search_term_string}"},"query-input":"required name=search_term_string"},"publisher":{"@type":"Organization","name":"TruyenHD","url":"https:\/\/truyenhdt.com","foundingDate":"2019","foundingLocation":"Ha Noi, Viet Nam","areaServed":"Global","logo":"https:\/\/truyenhdt.com\/wp-content\/themes\/truyenfull\/echo\/favicon\/favicon-192x192.png"}},{"@context":"http:\/\/schema.org","@type":"Organization","name":"Truy\u1ec7n HD - Th\u1ebf gi\u1edbi Truy\u1ec7n Hay Nh\u1ea5t, \u0110\u1ecdc Truy\u1ec7n Online, Truy\u1ec7n Full","@id":"https:\/\/truyenhdt.com\/","url":"https:\/\/truyenhdt.com\/","description":"Trang Web \u0111\u1ecdc truy\u1ec7n online, truy\u1ec7n ng\u00f4n t\u00ecnh s\u1eafc, \u0111am m\u1ef9 h v\u0103n, ti\u1ec3u thuy\u1ebft t\u00ecnh y\u00eau, s\u1eafc hi\u1ec7p, xuy\u00ean kh\u00f4ng, c\u1ed5 \u0111\u1ea1i, truy\u1ec7n m\u1edbi, truyenfull... C\u1eadp nh\u1eadt t\u1eebng gi\u1edd, truy\u1ec7n g\u00ec c\u0169ng c\u00f3","address":{"@type":"PostalAddress","streetAddress":"Ng\u00f5 1 Ph\u1ea1m V\u0103n \u0110\u1ed3ng, Qu\u1eadn C\u1ea7u Gi\u1ea5y, H\u00e0 N\u1ed9i","addressLocality":"H\u00e0 N\u1ed9i","postalCode":"100000","addressCountry":"VN"},"sameAs":["https:\/\/www.facebook.com\/TruyenHD.net","index.html\/\/www.youtube.com\/@truyenhd","index.html\/\/t.me\/truyenhd","index.html\/\/medium.com\/@truyenhdhay\/about","index.html\/\/www.linkedin.com\/in\/truy%E1%BB%87n-hd-hay-79b933213\/","https:\/\/www.pinterest.com\/truyenhdhay\/_saved\/"]}]--}}
    {{--    </script>--}}
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Marmelad&amp;family=Oswald&amp;family=Roboto+Condensed&amp;family=Roboto:wght@400;500&amp;display=swap"
        rel="stylesheet">

    <!-- Font -->
    @include('components.font')
    @stack('styles')
    @vite(['resources/js/app.js'])
    @include('client.layouts.app-css')

    <script
        type="979411ecb373ccbd737fc22f-text/javascript">
        if (screen.width < 992) { document.location = "mobile/index.html"; } function init() { var imgDefer = document.getElementsByTagName('img'); for (var i=0; i<imgDefer.length; i++) { if(imgDefer[i].getAttribute('data-src')) { imgDefer[i].setAttribute('src',imgDefer[i].getAttribute('data-src')); } } } window.onload = init;
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
<div class="loader-container">
    <div class="loader">
        <img src="{{ asset('assets/admin/images/book-icon.png') }}" alt="Loading"/>
    </div>
</div>
@include('client.components.notification-modal')
<div style="padding-bottom: 130px;">
    @include('client.components.header')
</div>
<!-- end header -->
{{-- @include('client.components.sidebar-mobile') --}}
{{-- end sidebar mobile --}}

<div class="mt-4">
    @yield('content')
</div>
<a href="#" target="_blank" class="zalo-icon">
    <img src="{{ asset('assets\client\themes\truyenfull\echo\img\zalo.png') }}" alt="Liên hệ Zalo"
         style="width: 50px; height: 50px;">
</a>
@include('client.components.footer')
@include('client.components.lienhe')

<script>
    $(document).ready(function () {
        $('#search-input').on('keyup', function () {
            let query = $(this).val();

            if (query.length > 1) {
                $.ajax({
                    url: "{{ route('search') }}", // URL to the search route
                    type: "GET",
                    data: {
                        'query': query
                    },
                    success: function (data) {
                        $('#suggestions-list').html(''); // Clear previous results
                        if (data.saches.length > 0 || data.users.length > 0 || data.theLoais
                            .length > 0) {
                            // search sách
                            data.saches.forEach(function (item) {
                                let urlSach = '/danh-sach?title=' +
                                    encodeURIComponent(item.ten_sach);
                                $('#suggestions-list').append(
                                    '<li class="suggestion-item"><a href="' +
                                    urlSach + '">Sách : ' + item.ten_sach +
                                    '</a></li>');
                            });
                            // search thể loại
                            data.theLoais.forEach(function (item) {
                                let urlTheLoai = '/the-loai/' + encodeURIComponent(
                                    item.id);
                                $('#suggestions-list').append(
                                    '<li class="suggestion-item"><a href="' +
                                    urlTheLoai + '">Thể loại : ' + item
                                        .ten_the_loai + '</a></li>');
                            });

                            // search tác giả
                            data.users.forEach(function (item) {
                                let urlUserCTV = '/tac-gia/' + encodeURIComponent(
                                    item.id);
                                $('#suggestions-list').append(
                                    '<li class="suggestion-item">' +
                                    '<a href="' + urlUserCTV + '">Tác giả: ' + item.ten_doc_gia + ' (' + item.but_danh + ')</a>' +
                                    '</li>');
                            });
                        } else {
                            $('#suggestions-list').append(
                                '<div class="suggestion-item">Không tìm thấy dữ liệu!</div>'
                            );
                        }
                    },
                    error: function () {
                        $('#suggestions-list').html(
                            '<div class="suggestion-item">Đã có lỗi xảy ra. Vui lòng thử lại.</div>'
                        );
                    }
                });
            } else {
                $('#suggestions-list').html(''); // Clear suggestions when input is empty
            }
        });

        // Handle when a suggestion is clicked
        $(document).on('click', '.suggestion-item', function () {
            $('#search-input').val($(this).text()); // Set the selected value into the input
            $('#suggestions-list').html(''); // Hide suggestions list
        });
    });

    function showLoader() {
        document.querySelector('.loader-container').style.visibility = 'visible';
    }

    function hideLoader() {
        document.querySelector('.loader-container').style.visibility = 'hidden';
    }

    document.addEventListener('DOMContentLoaded', () => {
        showLoader(); // Hiển thị loader ngay khi DOM đã sẵn sàng
    });
    window.addEventListener('load', () => {
        hideLoader()
    });

    let arrForm = document.getElementsByClassName('giap')

    for (let i = 0; i < arrForm.length; i++) {
        arrForm[i].addEventListener('submit', () => {
            showLoader()
            this.submit()
        })
    }
</script>
@stack('scripts')
</body>
</html>
