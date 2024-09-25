<footer class="my-6 bg-background pb-6 text-white">
    <figure class="relative flex min-h-[150px] w-full items-center justify-center">
        <img class="h-[40px] w-[130px] fill-white md:h-[50px] md:w-[200px]" src="{{ asset('assets/client/images/logo/logo.png')}}" alt="logo">
    </figure>
    <div class="absolute-center mb-4 w-full space-x-6">
        <button class="transition-all duration-200 hover:text-primary">
            <a href="index.html" target="_blank" rel="noreferrer">
                <svg stroke="currentColor" fill="currentColor" strokeWidth="0" viewBox="0 0 448 512" class="h-8 w-8"
                    height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z">
                    </path>
                </svg>
            </a>
        </button>
        <button class="transition-all duration-200 hover:text-primary">
            <a href="index.html" target="_blank" rel="noreferrer">
                <svg stroke="currentColor" fill="currentColor" strokeWidth="0" viewBox="0 0 640 512" class="h-8 w-8"
                    height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M524.531,69.836a1.5,1.5,0,0,0-.764-.7A485.065,485.065,0,0,0,404.081,32.03a1.816,1.816,0,0,0-1.923.91,337.461,337.461,0,0,0-14.9,30.6,447.848,447.848,0,0,0-134.426,0,309.541,309.541,0,0,0-15.135-30.6,1.89,1.89,0,0,0-1.924-.91A483.689,483.689,0,0,0,116.085,69.137a1.712,1.712,0,0,0-.788.676C39.068,183.651,18.186,294.69,28.43,404.354a2.016,2.016,0,0,0,.765,1.375A487.666,487.666,0,0,0,176.02,479.918a1.9,1.9,0,0,0,2.063-.676A348.2,348.2,0,0,0,208.12,430.4a1.86,1.86,0,0,0-1.019-2.588,321.173,321.173,0,0,1-45.868-21.853,1.885,1.885,0,0,1-.185-3.126c3.082-2.309,6.166-4.711,9.109-7.137a1.819,1.819,0,0,1,1.9-.256c96.229,43.917,200.41,43.917,295.5,0a1.812,1.812,0,0,1,1.924.233c2.944,2.426,6.027,4.851,9.132,7.16a1.884,1.884,0,0,1-.162,3.126,301.407,301.407,0,0,1-45.89,21.83,1.875,1.875,0,0,0-1,2.611,391.055,391.055,0,0,0,30.014,48.815,1.864,1.864,0,0,0,2.063.7A486.048,486.048,0,0,0,610.7,405.729a1.882,1.882,0,0,0,.765-1.352C623.729,277.594,590.933,167.465,524.531,69.836ZM222.491,337.58c-28.972,0-52.844-26.587-52.844-59.239S193.056,219.1,222.491,219.1c29.665,0,53.306,26.82,52.843,59.239C275.334,310.993,251.924,337.58,222.491,337.58Zm195.38,0c-28.971,0-52.843-26.587-52.843-59.239S388.437,219.1,417.871,219.1c29.667,0,53.307,26.82,52.844,59.239C470.715,310.993,447.538,337.58,417.871,337.58Z">
                    </path>
                </svg>
            </a>
        </button>
    </div>
    <div class="mx-auto flex w-[70%] flex-col justify-center space-y-4 text-lg md:text-2xl">
        <h1 class="text-center font-secondary text-2xl font-bold md:text-4xl">NQT Comics là website đọc truyện tranh
            miễn phí</h1>
        <div class="flex flex-col items-center justify-center gap-4 md:flex-row md:space-x-8 md:text-2xl">
            <a class="hover:text-primary" href="dieu-khoan-dich-vu.html">Điều khoản dịch vụ</a>
            <a class="hover:text-primary" href="chinh-sach-bao-mat.html">Chính sách riêng tư</a>
            <a class="hover:text-primary" href="dmca.html">DMCA</a>
            <a class="hover:text-primary" href="lien-he.html">Liên hệ</a>
        </div>
    </div>
    <div class="my-4 mx-auto w-[70%] space-y-4 lg:w-1/2">
        <p class="text-center text-lg text-white/40 md:text-2xl">NQT Comics không lưu trữ bất kì tệp tin nào trên
            máy chủ, chúng tôi chỉ liên kết tới những phương tiện truyền thông được lưu trữ bên dịch vụ thứ 3.</p>
        <p class="text-center text-lg text-white/40 md:text-2xl">NQT Comics does not store any files on our server,
            we only linked to the media which is hosted on 3rd party services.</p>
        <p class="text-center text-lg text-white/40 md:text-2xl">© NQT Comics</p>
    </div>
</footer>

<script src="../cdnjs.cloudflare.com/ajax/libs/lozad.js/1.0.8/lozad.min.js"></script>
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
<script src="{{ asset('assets/client/js/swiper.js')}}"></script>
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
