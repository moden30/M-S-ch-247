<!DOCTYPE html>
<html lang="vi">

<!-- Mirrored from demo.nqtcomics.site/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Sep 2024 09:29:00 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="mQaiBZHqOUrovYhqlppj4eiNejoWnH5VkH70NBvZ">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.png">
    <link rel="preload" as="style" href="{{ asset('assets/client/build/assets/app-B-gB5l2A.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/client/build/assets/app-B-gB5l2A.css')}}" />
    <script src="{{ asset('assets/client/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/client/js/main.js')}}"></script>
    <title>NQTComics đọc truyện miễn phí</title>
    <meta name="description" content="NQTComics đọc truyện miễn phí">
    <meta name="keywords" content="nqtcomcis">
    <meta property="article:published_time" content="2024-09-15 16:28:59">
    <link rel="canonical" href="index.html">
    <meta property="og:title" content="NQTComics đọc truyện miễn phí">
    <meta property="og:description" content="NQTComics đọc truyện miễn phí">
    <meta property="og:type" content="website">
    <meta property="og:image" content="/favicon.png">

    <meta name="twitter:title" content="NQTComics đọc truyện miễn phí">
    <meta name="twitter:description" content="NQTComics đọc truyện miễn phí">
    <script
        type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":"NQTComics đọc truyện miễn phí","description":"NQTComics đọc truyện miễn phí","url":"https://demo.nqtcomics.site"}</script>
    <meta name="robots" content="index,follow" />
    <meta name="revisit-after" content="1 days" />
    <meta name="ROBOTS" content="index,follow" />
    <meta name="googlebot" content="index,follow" />
    <meta name="BingBOT" content="index,follow" />
    <meta name="yahooBOT" content="index,follow" />
    <meta name="slurp" content="index,follow" />
    <meta name="msnbot" content="index,follow" />
    <link rel="stylesheet" href="{{ asset('assets/client/css/swiper-bundle.min.css')}}" />
    <script src="{{ asset('assets/client/js/swiper-bundle.min.js')}}"></script>
</head>

<body>

    @yield('conten')
    <script src="../../cdnjs.cloudflare.com/ajax/libs/lozad.js/1.0.8/lozad.min.js"></script>
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
    <script>
        var id_item = '68';
        var chapter_id = '905';
    </script>
    <script type="text/javascript" src="../assets/js/tinymce.min.js"></script>
    <script type="text/javascript" src="../assets/js/comment.min.js"></script>
    <script>
        function showSideright() {
            $('.sideright').toggleClass('translate-x-0');
            $('.sideright').toggleClass('translate-x-full');
        }
        $(document).ready(function () {
            $('.btn-follow').click(function () {
                $.ajax({
                    url: 'https://demo.nqtcomics.site/follow',
                    type: 'POST',
                    data: {
                        _token: 'mQaiBZHqOUrovYhqlppj4eiNejoWnH5VkH70NBvZ',
                        id: '68',
                        type: 'comic'
                    },
                    success: function (response) {
                        alert(response.message);
                        location.reload();
                    },
                    error: function () {
                        alert("Lỗi");
                    }
                });
            });
            $('.btn-change-server').click(function () {
                var id = $(this).data('id');
                $.ajax({
                    url: 'https://demo.nqtcomics.site/changeServer',
                    type: 'POST',
                    data: {
                        _token: 'mQaiBZHqOUrovYhqlppj4eiNejoWnH5VkH70NBvZ',
                        id: id,
                    },
                    success: function (response) {
                        $('.reading-detail').empty();
                        response.images.forEach(function (item) {
                            $('.reading-detail').append(`<div class="page-chapter"><img alt="Truyện tranh online" src="${item.link}"></div>`);
                        });
                    },
                    error: function () {
                        alert("Lỗi");
                    }
                });
            });
            $('#toggle-narrow').click(function () {
                $('#content').toggleClass('collapseActive');
            });
            $('#toggle-expand').click(function () {
                $('#content').toggleClass('collapseActive');
            });
            $('.btn-change-server').click(function () {
                const server = $(this).data('server');
                $.ajax({
                    url: 'https://demo.nqtcomics.site/changeServer',
                    type: 'POST',
                    data: {
                        _token: 'mQaiBZHqOUrovYhqlppj4eiNejoWnH5VkH70NBvZ',
                        id: $(this).data('id')
                    },
                    success: function (data) {
                        $('#btn-server').text(server);
                        const images = data.images;
                        $('#detail').empty();
                        images.forEach(image => {
                            $('#detail').append(`
                        <div class="max-w-[1000px] text-white select-none">
                            <img loading="lazy" src="${image.link}" alt="${image.page}" />
                        </div>`);
                        });
                        $('#box-servers').toggleClass('hidden');
                        $('#box-chapters').toggleClass('h-0');
                    }, error: function () {
                        alert('Có lỗi xảy ra');
                    }
                });
            });
            $('.btn-change-server-header').click(function () {
                $('#menu-server').toggleClass('hidden');
                $('#menu-mobile').addClass('hidden');
            });
            $('#showList').click(function () {
                $('#menu-mobile').toggleClass('hidden');
                const currentChapter = $('#box-episodes-mobile .bg-primary');
                if (currentChapter.length) {
                    $('#box-episodes-mobile').scrollTop(
                        currentChapter.offset().top - $('#box-episodes-mobile').offset().top + $('#box-episodes-mobile').scrollTop()
                    );
                }
                $('#menu-server').addClass('hidden');
            });
            $('#input-mobile').on('input', function () {
                const chapter = $(this).val();
                const currentChapter = $('#box-episodes-mobile .bg-primary');
                const targetChapter = $(`#mobile-${chapter}`);
                if (targetChapter.length) {
                    $('#box-episodes-mobile').scrollTop(
                        targetChapter.offset().top - $('#box-episodes-mobile').offset().top + $('#box-episodes-mobile').scrollTop()
                    );
                }
            });
            $('#input').on('input', function () {
                const chapter = $(this).val();
                const targetChapter = $(`#chapter-${chapter}`);
                if (targetChapter.length) {
                    $('#box-episodes').scrollTop(
                        targetChapter.offset().top - $('#box-episodes').offset().top + $('#box-episodes').scrollTop()
                    );
                }
            });
            $('#btn-server').click(function () {
                $('#box-servers').toggleClass('hidden');
                $('#box-chapters').toggleClass('h-0');
                $('#box-chapters').toggleClass('h-fit');
            });
            $('.btn-report').click(function () {
                alert('Báo lỗi truyện thành công');
            });
            $(window).resize(function () {
                if ($(window).width() < 1024) {
                    $('#content').addClass('collapseActive');
                } else {
                    $('#content').removeClass('collapseActive');
                }
            }).trigger('resize');
            let lastScrollTop = 0;
            const header = document.querySelector('#header');
            window.addEventListener('scroll', () => {
                let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                if (scrollTop > lastScrollTop) {
                    header.style.display = 'none';
                } else {
                    header.style.display = 'flex';
                }
                lastScrollTop = scrollTop;
            });
        });
    </script>
</body>


<!-- Mirrored from demo.nqtcomics.site/vua-can-sa/chuong-1 by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Sep 2024 09:36:48 GMT -->

</html>
</body>
</html>
