<!DOCTYPE html>
<html lang="vi">

<!-- Mirrored from demo.nqtcomics.site/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Sep 2024 09:29:00 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="dXAycXLI0OugQtFu7cyIcLma4Oe82GOj5qHdorRO">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.png">
    <link rel="preload" as="style" href="https://demo.nqtcomics.site/build/assets/app-B-gB5l2A.css"/>
    <link rel="stylesheet" href="https://demo.nqtcomics.site/build/assets/app-B-gB5l2A.css"/>
    <script src="https://demo.nqtcomics.site/assets/js/jquery.min.js"></script>
    <script src="https://demo.nqtcomics.site/assets/js/main.js"></script>
    <title>NQTComics đọc truyện miễn phí</title>
    <meta name="description" content="NQTComics đọc truyện miễn phí">
    <meta name="keywords" content="nqtcomcis">
    <meta property="article:published_time" content="2024-10-09 17:52:46">
    <link rel="canonical" href="https://demo.nqtcomics.site">
    <meta property="og:title" content="NQTComics đọc truyện miễn phí">
    <meta property="og:description" content="NQTComics đọc truyện miễn phí">
    <meta property="og:type" content="website">
    <meta property="og:image" content="/favicon.png">

    <meta name="twitter:title" content="NQTComics đọc truyện miễn phí">
    <meta name="twitter:description" content="NQTComics đọc truyện miễn phí">
    <script type="application/ld+json">
        {"@context":"https://schema.org","@type":"WebPage","name":"NQTComics đọc truyện miễn phí","description":"NQTComics đọc truyện miễn phí","url":"https://demo.nqtcomics.site"}
    </script>
    <meta name="robots" content="index,follow"/>
    <meta name="revisit-after" content="1 days"/>
    <meta name="ROBOTS" content="index,follow"/>
    <meta name="googlebot" content="index,follow"/>
    <meta name="BingBOT" content="index,follow"/>
    <meta name="yahooBOT" content="index,follow"/>
    <meta name="slurp" content="index,follow"/>
    <meta name="msnbot" content="index,follow"/>
    <link rel="stylesheet" href="https://demo.nqtcomics.site/assets/css/swiper-bundle.min.css"/>
    <script src="https://demo.nqtcomics.site/assets/js/swiper-bundle.min.js"></script>
    @stack('styles')
</head>

<body>
@include('client.components.header')
<!-- end header -->
@include('client.components.sidebar-mobile')
{{--end sidebar mobile--}}

@yield('content')
@include('client.components.footer')
{{--end footer--}}
<script src="{{ asset('assets/client/cdnjs.cloudflare.com/ajax/libs/lozad.js/1.0.8/lozad.min.js') }}"></script>
@stack('scripts')
<script>
    const observer = lozad();
    observer.observe();
</script>
<script>
    $(document).ready(function () {
        $('#toggle-search').click(function () {
            if ($('.search-group-mobile').is(':visible')) {
                $('.search-group-mobile').hide();
            } else {
                $('.search-group-mobile').show();
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#toggle-search').click(function () {
            $('.search-group-mobile').toggleClass('hidden');
        });
        $('#input-keyword').on('input', function () {
            const query = $(this).val();
            if (query.length > 0) {
                $.ajax({
                    url: '/apiSearch',
                    data: {
                        query: query
                    },
                    success: function (data) {
                        $('.search-results').empty();
                        data.forEach(function (comic) {
                            $('.search-results').append('<div class="p-3">' +
                                `<a href="/${comic.slug}"><div class="w-[65px] h-[86px] overflow-hidden float-left mr-[10px]"><img class="w-auto h-full min-w-full" src=${comic.thumbnail} /></div>` +
                                `<div class="flex flex-col justify-center"><h5 class="text-ellipsis line-clamp-2 hover:text-primary">${comic.name}</h5></div></a></div>`);
                        });
                        $('.search-results').append('<a href="/tim-kiem-nang-cao?keyword=' + query + '" class="flex justify-center w-full p-3 bg-primary text-white rounded-xl">Xem thêm</a>')
                        if (data.length > 0) {
                            $('.search-results').show();
                        } else {
                            $('.search-results').hide();
                        }
                    }
                });
            } else {
                $('.search-results').hide();
            }
        });
        $('#search-mobile').on('input', function () {
            const query = $(this).val();
            if (query.length > 0) {
                $.ajax({
                    url: '/apiSearch',
                    data: {
                        query: query
                    },
                    success: function (data) {
                        $('.search-results-mobile').empty();
                        data.forEach(function (comic) {
                            $('.search-results-mobile').append('<div class="flex gap-5 p-5 w-full">' +
                                `<a href="/${comic.slug}"><img src="${comic.thumbnail}" class="w-[50px] h-[70px] rounded-xl" alt="img"></a>` +
                                `<a href="/${comic.slug}" class="flex-1 flex flex-col justify-center gap-5 hover:text-primary w-full">` +
                                `<h5 class="whitespace-nowrap overflow-hidden text-ellipsis">${comic.name}</h5>` +
                                '</a></div>');
                        });
                        $('.search-results-mobile').append('<a href="/tim-kiem-nang-cao?keyword=' + query + '" class="flex justify-center w-full p-3 bg-primary text-white rounded-xl">Xem thêm</a>')
                        if (data.length > 0) {
                            $('.search-results-mobile').show();
                        } else {
                            $('.search-results-mobile').hide();
                        }
                    }
                });
            } else {
                $('.search-results-mobile').hide();
            }
        });
    });
</script>
<script src="{{ asset('assets/client/js/swiper.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const allTabs = document.querySelectorAll('.server-tab');
        const allContents = document.querySelectorAll('.panel-content');

        allTabs.forEach((tab) => {
            tab.addEventListener('click', function () {
                const tabGroup = tab.closest('.rounded-2xl');
                const tabs = tabGroup.querySelectorAll('.server-tab');
                const contents = tabGroup.querySelectorAll('.panel-content');

                tabs.forEach((t, i) => {
                    t.classList.remove('bg-primary', 'text-white');
                    t.classList.add('text-meta-11');
                    contents[i].style.display = 'none';
                });
                tab.classList.add('bg-primary', 'text-white');
                tab.classList.remove('text-meta-11');
                const targetContent = tabGroup.querySelector(`#${tab.getAttribute('data-tab')}`);
                targetContent.style.display = 'block';
            });
        });
    });
</script>
</body>


<!-- Mirrored from demo.nqtcomics.site/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Sep 2024 09:31:15 GMT -->

</html>
