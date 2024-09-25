@extends('client.layout.master')
@section('main-conten')
<body>
  <main class="overflow-x-hidden ">
    <div class="flex h-fit min-h-screen flex-col">
        {{-- Bắt đầu slide show --}}
        <div class="relative h-fit w-full overflow-hidden " style="padding-top: 100px;">
            <div id="swiper-home" class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="cursor-pointer w-full h-full">
                            <figure
                            style="background-image: url('{{ asset('assets/client/images/banner/cuoc-song-thuong-ngay-cua-nhan-vien-hieu-thuoc-sa-chan-thumb.jpg') }}');"

                                class="deslide-cover h-[250px] md:h-[350px] lg:h-[450px] w-full bg-cover bg-center bg-no-repeat blur">
                            </figure>
                            <div
                                class="aspect-[3/4] 0 absolute-center absolute top-1/2 right-[5%] md:right-[10%] z-10 flex h-[80%] w-[150px] -translate-y-1/2 items-center md:w-[200px] lg:w-[250px]">
                                <div
                                    class="relative slide-img h-full w-[90%] overflow-hidden rounded-2xl magictime vanishIn">
                                    <span
                                        style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: absolute; inset: 0px;">
                                        <img alt="image-preview"
                                            src="{{ asset('assets/client/images/banner/cuoc-song-thuong-ngay-cua-nhan-vien-hieu-thuoc-sa-chan-thumb.jpg') }}"
                                            class="absolute inset-0 object-cover object-center lozad"
                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
                                    </span>
                                </div>
                            </div>
                            <div
                                class="absolute top-12 left-5 z-40 flex h-[70%] w-[50%] flex-col space-x-4 space-y-4 font-secondary text-white md:left-[5%] md:w-[55%] md:py-4 lg:space-y-6">
                                <h3 class="mx-4 mt-6 text-xl md:text-4xl">Chapter 1</h3>
                                <a href="cuoc-song-thuong-ngay-cua-nhan-vien-hieu-thuoc-sa-chan.html">
                                    <h1
                                        class="text-3xl transition-all line-clamp-1 hover:text-primary md:min-h-[30px] md:text-6xl">
                                        Cuộc Sống Thường Ngày Của Nhân Viên Hiệu Thuốc Sa-Chan</h1>
                                </a>
                                <h5 class="text-sm line-clamp-3 md:min-h-[60px] md:text-2xl">
                                    <p>Chuyện tình hài lãng mạng giữa Sa-chan và người bạn thời thơ ấu của mình tại
                                        hiệu thuốc.</p>
                                </h5>
                                <ul class="hidden space-x-4 text-lg md:flex">
                                    <li
                                        class="flex w-fit max-w-[100px] items-center whitespace-nowrap rounded-xl border-[1px] border-white py-2 px-4 line-clamp-1">
                                        <a href="tim-kiem-nang-caoc27a.html?category=action">Action</a>
                                    </li>
                                </ul>
                                <div class="flex space-x-6 text-xl md:text-2xl lg:pt-6">
                                    <a href="cuoc-song-thuong-ngay-cua-nhan-vien-hieu-thuoc-sa-chan/chuong-1.html"
                                        class="absolute-center rounded-xl bg-primary py-3 px-5 transition-all hover:scale-110 md:w-[100px]">Đọc
                                        ngay</a>
                                    <a href="cuoc-song-thuong-ngay-cua-nhan-vien-hieu-thuoc-sa-chan.html">
                                        <button
                                            class="absolute-center rounded-xl bg-white py-3 px-5 text-gray-800 transition-all hover:scale-110 md:w-[100px]">Chi
                                            tiết</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="cursor-pointer w-full h-full">
                            <figure style="background-image: url('{{ asset('assets/client/images/banner/truy-lac-thumb.jpg') }}');"
                                class="deslide-cover h-[250px] md:h-[350px] lg:h-[450px] w-full bg-cover bg-center bg-no-repeat blur">
                            </figure>
                            <div
                                class="aspect-[3/4] 0 absolute-center absolute top-1/2 right-[5%] md:right-[10%] z-10 flex h-[80%] w-[150px] -translate-y-1/2 items-center md:w-[200px] lg:w-[250px]">
                                <div
                                    class="relative slide-img h-full w-[90%] overflow-hidden rounded-2xl magictime vanishIn">
                                    <span
                                        style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: absolute; inset: 0px;">
                                        <img alt="image-preview"
                                             src="{{ asset('assets/client/images/banner/truy-lac-thumb.jpg') }}"
                                            class="absolute inset-0 object-cover object-center lozad"
                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
                                    </span>
                                </div>
                            </div>
                            <div
                                class="absolute top-12 left-5 z-40 flex h-[70%] w-[50%] flex-col space-x-4 space-y-4 font-secondary text-white md:left-[5%] md:w-[55%] md:py-4 lg:space-y-6">
                                <h3 class="mx-4 mt-6 text-xl md:text-4xl">Chapter 1</h3>
                                <a href="truy-lac.html">
                                    <h1
                                        class="text-3xl transition-all line-clamp-1 hover:text-primary md:min-h-[30px] md:text-6xl">
                                        Truỵ Lạc</h1>
                                </a>
                                <h5 class="text-sm line-clamp-3 md:min-h-[60px] md:text-2xl">
                                    <p>Trường trung học Dương Minh ai cũng biết, Châu Vãn trầm lặng và hướng nội,
                                        Lục Tây Kiêu phóng khoáng và khó thuần. Hai người khác nhau như trời với
                                        đất, tưởng chừng không bao giờ có thể ở bên nhau. Không ai ngờ rằng, một
                                        ngày nào đó, hai người này sẽ đứng cạnh nhau.“Luôn có người yêu bạn lúc rực
                                        rỡ nhất, và cũng yêu bạn khi bạn đầy bùn lầy.”Thiếu gia đẹp trai, phóng túng
                                        x Học bá ngoan ngoãn</p>
                                </h5>
                                <ul class="hidden space-x-4 text-lg md:flex">
                                    <li
                                        class="flex w-fit max-w-[100px] items-center whitespace-nowrap rounded-xl border-[1px] border-white py-2 px-4 line-clamp-1">
                                        <a href="tim-kiem-nang-caoc27a.html?category=action">Action</a>
                                    </li>
                                </ul>
                                <div class="flex space-x-6 text-xl md:text-2xl lg:pt-6">
                                    <a href="truy-lac/chuong-1.html"
                                        class="absolute-center rounded-xl bg-primary py-3 px-5 transition-all hover:scale-110 md:w-[100px]">Đọc
                                        ngay</a>
                                    <a href="truy-lac.html">
                                        <button
                                            class="absolute-center rounded-xl bg-white py-3 px-5 text-gray-800 transition-all hover:scale-110 md:w-[100px]">Chi
                                            tiết</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="cursor-pointer w-full h-full">
                            <figure
                                style="background-image: url('{{ asset('assets/client/images/banner/mairimashita-iruma-kun-if-episode-of-mafia-thumb.jpg') }}');"
                                class="deslide-cover h-[250px] md:h-[350px] lg:h-[450px] w-full bg-cover bg-center bg-no-repeat blur">
                            </figure>
                            <div
                                class="aspect-[3/4] 0 absolute-center absolute top-1/2 right-[5%] md:right-[10%] z-10 flex h-[80%] w-[150px] -translate-y-1/2 items-center md:w-[200px] lg:w-[250px]">
                                <div
                                    class="relative slide-img h-full w-[90%] overflow-hidden rounded-2xl magictime vanishIn">
                                    <span
                                        style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: absolute; inset: 0px;">
                                        <img alt="image-preview"
                                             src="{{ asset('assets/client/images/banner/mairimashita-iruma-kun-if-episode-of-mafia-thumb.jpg') }}"
                                            class="absolute inset-0 object-cover object-center lozad"
                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
                                    </span>
                                </div>
                            </div>
                            <div
                                class="absolute top-12 left-5 z-40 flex h-[70%] w-[50%] flex-col space-x-4 space-y-4 font-secondary text-white md:left-[5%] md:w-[55%] md:py-4 lg:space-y-6">
                                <h3 class="mx-4 mt-6 text-xl md:text-4xl">Chapter 1</h3>
                                <a href="mairimashita-iruma-kun-if-episode-of-mafia.html">
                                    <h1
                                        class="text-3xl transition-all line-clamp-1 hover:text-primary md:min-h-[30px] md:text-6xl">
                                        Mairimashita! Iruma-kun: IF Episode of MAFIA</h1>
                                </a>
                                <h5 class="text-sm line-clamp-3 md:min-h-[60px] md:text-2xl">
                                    <p>Spin-Off của tác phẩm"Mairimashita! Iruma-kun" theo hướng What-If, thế giới
                                        của tác phẩm lần này sẽ xoay quanh việc các nhân vật sẽ sống trong thế giới
                                        của các Mafia</p>
                                </h5>
                                <ul class="hidden space-x-4 text-lg md:flex">
                                    <li
                                        class="flex w-fit max-w-[100px] items-center whitespace-nowrap rounded-xl border-[1px] border-white py-2 px-4 line-clamp-1">
                                        <a href="tim-kiem-nang-caoc27a.html?category=action">Action</a>
                                    </li>
                                    <li
                                        class="flex w-fit max-w-[100px] items-center whitespace-nowrap rounded-xl border-[1px] border-white py-2 px-4 line-clamp-1">
                                        <a href="tim-kiem-nang-cao1dc1.html?category=comedy">Comedy</a>
                                    </li>
                                    <li
                                        class="flex w-fit max-w-[100px] items-center whitespace-nowrap rounded-xl border-[1px] border-white py-2 px-4 line-clamp-1">
                                        <a href="tim-kiem-nang-caob503.html?category=manga">Manga</a>
                                    </li>
                                    <li
                                        class="flex w-fit max-w-[100px] items-center whitespace-nowrap rounded-xl border-[1px] border-white py-2 px-4 line-clamp-1">
                                        <a href="tim-kiem-nang-cao3a05.html?category=shounen">Shounen</a>
                                    </li>
                                </ul>
                                <div class="flex space-x-6 text-xl md:text-2xl lg:pt-6">
                                    <a href="mairimashita-iruma-kun-if-episode-of-mafia/chuong-1.html"
                                        class="absolute-center rounded-xl bg-primary py-3 px-5 transition-all hover:scale-110 md:w-[100px]">Đọc
                                        ngay</a>
                                    <a href="mairimashita-iruma-kun-if-episode-of-mafia.html">
                                        <button
                                            class="absolute-center rounded-xl bg-white py-3 px-5 text-gray-800 transition-all hover:scale-110 md:w-[100px]">Chi
                                            tiết</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="cursor-pointer w-full h-full">
                            <figure
                                style="background-image: url('{{ asset('assets/client/images/banner/bua-an-dam-bac-cua-ba-chi-26-doc-than-thumb.jpg') }}');"
                                class="deslide-cover h-[250px] md:h-[350px] lg:h-[450px] w-full bg-cover bg-center bg-no-repeat blur">
                            </figure>
                            <div
                                class="aspect-[3/4] 0 absolute-center absolute top-1/2 right-[5%] md:right-[10%] z-10 flex h-[80%] w-[150px] -translate-y-1/2 items-center md:w-[200px] lg:w-[250px]">
                                <div
                                    class="relative slide-img h-full w-[90%] overflow-hidden rounded-2xl magictime vanishIn">
                                    <span
                                        style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: absolute; inset: 0px;">
                                        <img alt="image-preview"
                                             src="{{ asset('assets/client/images/banner/bua-an-dam-bac-cua-ba-chi-26-doc-than-thumb.jpg') }}"
                                            class="absolute inset-0 object-cover object-center lozad"
                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
                                    </span>
                                </div>
                            </div>
                            <div
                                class="absolute top-12 left-5 z-40 flex h-[70%] w-[50%] flex-col space-x-4 space-y-4 font-secondary text-white md:left-[5%] md:w-[55%] md:py-4 lg:space-y-6">
                                <h3 class="mx-4 mt-6 text-xl md:text-4xl">Chapter 1</h3>
                                <a href="bua-an-dam-bac-cua-ba-chi-26-doc-than.html">
                                    <h1
                                        class="text-3xl transition-all line-clamp-1 hover:text-primary md:min-h-[30px] md:text-6xl">
                                        Bữa ăn đạm bạc của bà chị (26) độc thân</h1>
                                </a>
                                <h5 class="text-sm line-clamp-3 md:min-h-[60px] md:text-2xl">
                                    <p>Cuộc sống hằng ngày&nbsp;cùng những bữa ăn đạm bạc của bà chị độc thân thất
                                        nghiệp chán đời.</p>
                                </h5>
                                <ul class="hidden space-x-4 text-lg md:flex">
                                    <li
                                        class="flex w-fit max-w-[100px] items-center whitespace-nowrap rounded-xl border-[1px] border-white py-2 px-4 line-clamp-1">
                                        <a href="tim-kiem-nang-cao1dc1.html?category=comedy">Comedy</a>
                                    </li>
                                    <li
                                        class="flex w-fit max-w-[100px] items-center whitespace-nowrap rounded-xl border-[1px] border-white py-2 px-4 line-clamp-1">
                                        <a href="tim-kiem-nang-caob503.html?category=manga">Manga</a>
                                    </li>
                                    <li
                                        class="flex w-fit max-w-[100px] items-center whitespace-nowrap rounded-xl border-[1px] border-white py-2 px-4 line-clamp-1">
                                        <a
                                            href="tim-kiem-nang-caoc69b.html?category=psychological">Psychological</a>
                                    </li>
                                    <li
                                        class="flex w-fit max-w-[100px] items-center whitespace-nowrap rounded-xl border-[1px] border-white py-2 px-4 line-clamp-1">
                                        <a href="tim-kiem-nang-cao5469.html?category=slice-of-life">Slice of
                                            Life</a>
                                    </li>
                                </ul>
                                <div class="flex space-x-6 text-xl md:text-2xl lg:pt-6">
                                    <a href="bua-an-dam-bac-cua-ba-chi-26-doc-than/chuong-1.html"
                                        class="absolute-center rounded-xl bg-primary py-3 px-5 transition-all hover:scale-110 md:w-[100px]">Đọc
                                        ngay</a>
                                    <a href="bua-an-dam-bac-cua-ba-chi-26-doc-than.html">
                                        <button
                                            class="absolute-center rounded-xl bg-white py-3 px-5 text-gray-800 transition-all hover:scale-110 md:w-[100px]">Chi
                                            tiết</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div
                    class="hidden md:flex items-center justify-center absolute bottom-1 right-10 z-50 h-fit w-fit flex-col space-y-4 lg:bottom-10">
                    <div class="swiper-button-prev h-[40px]">
                        <button
                            class="transition-all absolute-center relative z-[300] md:h-16 md:w-16 w-14 h-14 rounded-2xl text-white bg-highlight hover:bg-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                class="h-10 w-10">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 19.5 8.25 12l7.5-7.5"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="swiper-button-next h-[40px]">
                        <button
                            class="transition-all absolute-center relative z-[300] md:h-16 md:w-16 w-14 h-14 rounded-2xl text-white bg-highlight hover:bg-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                class="h-10 w-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
{{-- Kết thúc slideshow --}}

        {{-- Bắt đầu slide mới cập nhật --}}
        <section class="w-[90%] mx-auto w-max-[1300px] mt-6 overflow-x-hidden">
            <h2
                class="mt-4 flex select-none items-center font-secondary text-3xl text-white hover:cursor-pointer  md:text-4xl lg:text-5xl">
                <div class="flex items-center transition-all hover:text-primary">
                    <a href="tim-kiem-nang-caoc519.html?sort=0">Mới cập nhật</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true" data-slot="icon" class="h-8 w-8 lg:h-10 lg:w-10">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
                    </svg>
                </div>
            </h2>
            <div class="swiper section-swiper mt-5 swiper-updated">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="aspect-h-4 aspect-w-3 rounded-xl relative group">
                            <div>
                                <a href="chi-tiet-truyen.html" class='z-0 cursor-pointer'>
                                    <img  src="{{ asset('assets/client/images/banner/vua-can-sa-thumb.jpg') }}"
                                        class="lozad fancy-fade-in z-0 absolute top-0 left-0 rounded-xl object-cover object-center w-full h-full"
                                        alt="manga-thumbnail" />
                                </a>
                                <div
                                    class="relative cursor-pointer animate__faster z-[9999] animate__animated animate__fadeIn h-full w-full flex-col space-y-2 overflow-hidden rounded-xl bg-highlight invisible md:visible hidden text-white group-hover:flex">
                                    <a href="chi-tiet-truyen.html">
                                        <h3
                                            class="ml-4 mt-4 min-h-[40px] text-[100%] font-semibold line-clamp-2 hover:text-primary">
                                            Vua Cần Sa
                                        </h3>
                                    </a>
                                    <p class="ml-4 flex flex-nowrap items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                                        </svg>
                                        <span class="ml-2 text-[90%] line-clamp-1">
                                            Chapter 19
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            07/09/2024
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.348 14.652a3.75 3.75 0 0 1 0-5.304m5.304 0a3.75 3.75 0 0 1 0 5.304m-7.425 2.121a6.75 6.75 0 0 1 0-9.546m9.546 0a6.75 6.75 0 0 1 0 9.546M5.106 18.894c-3.808-3.807-3.808-9.98 0-13.788m13.788 0c3.808 3.807 3.808 9.98 0 13.788M12 12h.008v.008H12V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            ongoing
                                        </span>
                                    </p>
                                    <div class="flex h-fit w-full flex-col items-center space-y-4 py-6">
                                        <a href="vua-can-sa/chuong-1.html"
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-primary py-2 px-4 transition-all hover:scale-[110%]">
                                            <span>Đọc ngay</span>
                                        </a>
                                        <button
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-white py-2 px-4 text-gray-700 transition-all hover:scale-[110%]">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                            </svg>
                                            <a href="chi-tiet">
                                                Thông tin
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="chi-tiet-truyen.html">
                            <h2
                                class="my-2 select-none text-xl text-white transition-all line-clamp-1 hover:text-primary md:text-2xl">
                                Vua Cần Sa
                            </h2>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <div class="aspect-h-4 aspect-w-3 rounded-xl relative group">
                            <div>
                                <a href="blood-crawling-princess-of-a-ruined-country.html"
                                    class='z-0 cursor-pointer'>
                                    <img  src="{{ asset('assets/client/images/banner/blood-crawling-princess-of-a-ruined-country-thumb.jpg') }}"
                                        class="lozad fancy-fade-in z-0 absolute top-0 left-0 rounded-xl object-cover object-center w-full h-full"
                                        alt="manga-thumbnail" />
                                </a>
                                <div
                                    class="relative cursor-pointer animate__faster z-[9999] animate__animated animate__fadeIn h-full w-full flex-col space-y-2 overflow-hidden rounded-xl bg-highlight invisible md:visible hidden text-white group-hover:flex">
                                    <a href="blood-crawling-princess-of-a-ruined-country.html">
                                        <h3
                                            class="ml-4 mt-4 min-h-[40px] text-[100%] font-semibold line-clamp-2 hover:text-primary">
                                            Blood-Crawling Princess of a Ruined Country
                                        </h3>
                                    </a>
                                    <p class="ml-4 flex flex-nowrap items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                                        </svg>
                                        <span class="ml-2 text-[90%] line-clamp-1">
                                            Chapter 7
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            07/09/2024
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.348 14.652a3.75 3.75 0 0 1 0-5.304m5.304 0a3.75 3.75 0 0 1 0 5.304m-7.425 2.121a6.75 6.75 0 0 1 0-9.546m9.546 0a6.75 6.75 0 0 1 0 9.546M5.106 18.894c-3.808-3.807-3.808-9.98 0-13.788m13.788 0c3.808 3.807 3.808 9.98 0 13.788M12 12h.008v.008H12V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            ongoing
                                        </span>
                                    </p>
                                    <div class="flex h-fit w-full flex-col items-center space-y-4 py-6">
                                        <a href="blood-crawling-princess-of-a-ruined-country/chuong-1.html"
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-primary py-2 px-4 transition-all hover:scale-[110%]">
                                            <span>Đọc ngay</span>
                                        </a>
                                        <button
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-white py-2 px-4 text-gray-700 transition-all hover:scale-[110%]">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                            </svg>
                                            <a href="blood-crawling-princess-of-a-ruined-country.html">
                                                Thông tin
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="blood-crawling-princess-of-a-ruined-country.html">
                            <h2
                                class="my-2 select-none text-xl text-white transition-all line-clamp-1 hover:text-primary md:text-2xl">
                                Blood-Crawling Princess of a Ruined Country
                            </h2>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <div class="aspect-h-4 aspect-w-3 rounded-xl relative group">
                            <div>
                                <a href="bua-an-dam-bac-cua-ba-chi-26-doc-than.html" class='z-0 cursor-pointer'>
                                    <img  src="{{ asset('assets/client/images/banner/bua-an-dam-bac-cua-ba-chi-26-doc-than-thumb.jpg') }}"
                                        class="lozad fancy-fade-in z-0 absolute top-0 left-0 rounded-xl object-cover object-center w-full h-full"
                                        alt="manga-thumbnail" />
                                </a>
                                <div
                                    class="relative cursor-pointer animate__faster z-[9999] animate__animated animate__fadeIn h-full w-full flex-col space-y-2 overflow-hidden rounded-xl bg-highlight invisible md:visible hidden text-white group-hover:flex">
                                    <a href="bua-an-dam-bac-cua-ba-chi-26-doc-than.html">
                                        <h3
                                            class="ml-4 mt-4 min-h-[40px] text-[100%] font-semibold line-clamp-2 hover:text-primary">
                                            Bữa ăn đạm bạc của bà chị (26) độc thân
                                        </h3>
                                    </a>
                                    <p class="ml-4 flex flex-nowrap items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                                        </svg>
                                        <span class="ml-2 text-[90%] line-clamp-1">
                                            Chapter 14
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            07/09/2024
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.348 14.652a3.75 3.75 0 0 1 0-5.304m5.304 0a3.75 3.75 0 0 1 0 5.304m-7.425 2.121a6.75 6.75 0 0 1 0-9.546m9.546 0a6.75 6.75 0 0 1 0 9.546M5.106 18.894c-3.808-3.807-3.808-9.98 0-13.788m13.788 0c3.808 3.807 3.808 9.98 0 13.788M12 12h.008v.008H12V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            ongoing
                                        </span>
                                    </p>
                                    <div class="flex h-fit w-full flex-col items-center space-y-4 py-6">
                                        <a href="bua-an-dam-bac-cua-ba-chi-26-doc-than/chuong-1.html"
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-primary py-2 px-4 transition-all hover:scale-[110%]">
                                            <span>Đọc ngay</span>
                                        </a>
                                        <button
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-white py-2 px-4 text-gray-700 transition-all hover:scale-[110%]">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                            </svg>
                                            <a href="bua-an-dam-bac-cua-ba-chi-26-doc-than.html">
                                                Thông tin
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="bua-an-dam-bac-cua-ba-chi-26-doc-than.html">
                            <h2
                                class="my-2 select-none text-xl text-white transition-all line-clamp-1 hover:text-primary md:text-2xl">
                                Bữa ăn đạm bạc của bà chị (26) độc thân
                            </h2>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <div class="aspect-h-4 aspect-w-3 rounded-xl relative group">
                            <div>
                                <a href="hai-chi-em-nha-herami-bat-on-thuc-su.html" class='z-0 cursor-pointer'>
                                    <img  src="{{ asset('assets/client/images/banner/hai-chi-em-nha-herami-bat-on-thuc-su-thumb.jpg') }}"
                                        class="lozad fancy-fade-in z-0 absolute top-0 left-0 rounded-xl object-cover object-center w-full h-full"
                                        alt="manga-thumbnail" />
                                </a>
                                <div
                                    class="relative cursor-pointer animate__faster z-[9999] animate__animated animate__fadeIn h-full w-full flex-col space-y-2 overflow-hidden rounded-xl bg-highlight invisible md:visible hidden text-white group-hover:flex">
                                    <a href="hai-chi-em-nha-herami-bat-on-thuc-su.html">
                                        <h3
                                            class="ml-4 mt-4 min-h-[40px] text-[100%] font-semibold line-clamp-2 hover:text-primary">
                                            Hai chị em nhà Herami bất ổn thực sự!
                                        </h3>
                                    </a>
                                    <p class="ml-4 flex flex-nowrap items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                                        </svg>
                                        <span class="ml-2 text-[90%] line-clamp-1">
                                            Chapter 16
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            07/09/2024
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.348 14.652a3.75 3.75 0 0 1 0-5.304m5.304 0a3.75 3.75 0 0 1 0 5.304m-7.425 2.121a6.75 6.75 0 0 1 0-9.546m9.546 0a6.75 6.75 0 0 1 0 9.546M5.106 18.894c-3.808-3.807-3.808-9.98 0-13.788m13.788 0c3.808 3.807 3.808 9.98 0 13.788M12 12h.008v.008H12V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            ongoing
                                        </span>
                                    </p>
                                    <div class="flex h-fit w-full flex-col items-center space-y-4 py-6">
                                        <a href="hai-chi-em-nha-herami-bat-on-thuc-su/chuong-3.html"
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-primary py-2 px-4 transition-all hover:scale-[110%]">
                                            <span>Đọc ngay</span>
                                        </a>
                                        <button
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-white py-2 px-4 text-gray-700 transition-all hover:scale-[110%]">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                            </svg>
                                            <a href="hai-chi-em-nha-herami-bat-on-thuc-su.html">
                                                Thông tin
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="hai-chi-em-nha-herami-bat-on-thuc-su.html">
                            <h2
                                class="my-2 select-none text-xl text-white transition-all line-clamp-1 hover:text-primary md:text-2xl">
                                Hai chị em nhà Herami bất ổn thực sự!
                            </h2>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <div class="aspect-h-4 aspect-w-3 rounded-xl relative group">
                            <div>
                                <a href="heart-gear.html" class='z-0 cursor-pointer'>
                                    <img  src="{{ asset('assets/client/images/banner/heart-gear-thumb.jpg') }}"
                                        class="lozad fancy-fade-in z-0 absolute top-0 left-0 rounded-xl object-cover object-center w-full h-full"
                                        alt="manga-thumbnail" />
                                </a>
                                <div
                                    class="relative cursor-pointer animate__faster z-[9999] animate__animated animate__fadeIn h-full w-full flex-col space-y-2 overflow-hidden rounded-xl bg-highlight invisible md:visible hidden text-white group-hover:flex">
                                    <a href="heart-gear.html">
                                        <h3
                                            class="ml-4 mt-4 min-h-[40px] text-[100%] font-semibold line-clamp-2 hover:text-primary">
                                            Heart Gear
                                        </h3>
                                    </a>
                                    <p class="ml-4 flex flex-nowrap items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                                        </svg>
                                        <span class="ml-2 text-[90%] line-clamp-1">
                                            Chapter 8
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            07/09/2024
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.348 14.652a3.75 3.75 0 0 1 0-5.304m5.304 0a3.75 3.75 0 0 1 0 5.304m-7.425 2.121a6.75 6.75 0 0 1 0-9.546m9.546 0a6.75 6.75 0 0 1 0 9.546M5.106 18.894c-3.808-3.807-3.808-9.98 0-13.788m13.788 0c3.808 3.807 3.808 9.98 0 13.788M12 12h.008v.008H12V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            ongoing
                                        </span>
                                    </p>
                                    <div class="flex h-fit w-full flex-col items-center space-y-4 py-6">
                                        <a href="heart-gear/chuong-1.html"
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-primary py-2 px-4 transition-all hover:scale-[110%]">
                                            <span>Đọc ngay</span>
                                        </a>
                                        <button
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-white py-2 px-4 text-gray-700 transition-all hover:scale-[110%]">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                            </svg>
                                            <a href="heart-gear.html">
                                                Thông tin
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="heart-gear.html">
                            <h2
                                class="my-2 select-none text-xl text-white transition-all line-clamp-1 hover:text-primary md:text-2xl">
                                Heart Gear
                            </h2>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <div class="aspect-h-4 aspect-w-3 rounded-xl relative group">
                            <div>
                                <a href="mairimashita-iruma-kun-if-episode-of-mafia.html"
                                    class='z-0 cursor-pointer'>
                                    <img  src="{{ asset('assets/client/images/banner/mairimashita-iruma-kun-if-episode-of-mafia-thumb.jpg') }}"
                                        class="lozad fancy-fade-in z-0 absolute top-0 left-0 rounded-xl object-cover object-center w-full h-full"
                                        alt="manga-thumbnail" />
                                </a>
                                <div
                                    class="relative cursor-pointer animate__faster z-[9999] animate__animated animate__fadeIn h-full w-full flex-col space-y-2 overflow-hidden rounded-xl bg-highlight invisible md:visible hidden text-white group-hover:flex">
                                    <a href="mairimashita-iruma-kun-if-episode-of-mafia.html">
                                        <h3
                                            class="ml-4 mt-4 min-h-[40px] text-[100%] font-semibold line-clamp-2 hover:text-primary">
                                            Mairimashita! Iruma-kun: IF Episode of MAFIA
                                        </h3>
                                    </a>
                                    <p class="ml-4 flex flex-nowrap items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                                        </svg>
                                        <span class="ml-2 text-[90%] line-clamp-1">
                                            Chapter 11
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            07/09/2024
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.348 14.652a3.75 3.75 0 0 1 0-5.304m5.304 0a3.75 3.75 0 0 1 0 5.304m-7.425 2.121a6.75 6.75 0 0 1 0-9.546m9.546 0a6.75 6.75 0 0 1 0 9.546M5.106 18.894c-3.808-3.807-3.808-9.98 0-13.788m13.788 0c3.808 3.807 3.808 9.98 0 13.788M12 12h.008v.008H12V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            ongoing
                                        </span>
                                    </p>
                                    <div class="flex h-fit w-full flex-col items-center space-y-4 py-6">
                                        <a href="mairimashita-iruma-kun-if-episode-of-mafia/chuong-1.html"
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-primary py-2 px-4 transition-all hover:scale-[110%]">
                                            <span>Đọc ngay</span>
                                        </a>
                                        <button
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-white py-2 px-4 text-gray-700 transition-all hover:scale-[110%]">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                            </svg>
                                            <a href="mairimashita-iruma-kun-if-episode-of-mafia.html">
                                                Thông tin
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="mairimashita-iruma-kun-if-episode-of-mafia.html">
                            <h2
                                class="my-2 select-none text-xl text-white transition-all line-clamp-1 hover:text-primary md:text-2xl">
                                Mairimashita! Iruma-kun: IF Episode of MAFIA
                            </h2>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <div class="aspect-h-4 aspect-w-3 rounded-xl relative group">
                            <div>
                                <a href="nguyen-em-mai-tuoi-cuoi-noi-dong-tuyet.html" class='z-0 cursor-pointer'>
                                    <img  src="{{ asset('assets/client/images/banner/nguyen-em-mai-tuoi-cuoi-noi-dong-tuyet-thumb.jpg') }}"
                                        class="lozad fancy-fade-in z-0 absolute top-0 left-0 rounded-xl object-cover object-center w-full h-full"
                                        alt="manga-thumbnail" />
                                </a>
                                <div
                                    class="relative cursor-pointer animate__faster z-[9999] animate__animated animate__fadeIn h-full w-full flex-col space-y-2 overflow-hidden rounded-xl bg-highlight invisible md:visible hidden text-white group-hover:flex">
                                    <a href="nguyen-em-mai-tuoi-cuoi-noi-dong-tuyet.html">
                                        <h3
                                            class="ml-4 mt-4 min-h-[40px] text-[100%] font-semibold line-clamp-2 hover:text-primary">
                                            Nguyện Em Mãi Tươi Cười Nơi Đồng Tuyết
                                        </h3>
                                    </a>
                                    <p class="ml-4 flex flex-nowrap items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                                        </svg>
                                        <span class="ml-2 text-[90%] line-clamp-1">
                                            Chapter 11
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            07/09/2024
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.348 14.652a3.75 3.75 0 0 1 0-5.304m5.304 0a3.75 3.75 0 0 1 0 5.304m-7.425 2.121a6.75 6.75 0 0 1 0-9.546m9.546 0a6.75 6.75 0 0 1 0 9.546M5.106 18.894c-3.808-3.807-3.808-9.98 0-13.788m13.788 0c3.808 3.807 3.808 9.98 0 13.788M12 12h.008v.008H12V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            ongoing
                                        </span>
                                    </p>
                                    <div class="flex h-fit w-full flex-col items-center space-y-4 py-6">
                                        <a href="nguyen-em-mai-tuoi-cuoi-noi-dong-tuyet/chuong-1.html"
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-primary py-2 px-4 transition-all hover:scale-[110%]">
                                            <span>Đọc ngay</span>
                                        </a>
                                        <button
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-white py-2 px-4 text-gray-700 transition-all hover:scale-[110%]">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                            </svg>
                                            <a href="nguyen-em-mai-tuoi-cuoi-noi-dong-tuyet.html">
                                                Thông tin
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="nguyen-em-mai-tuoi-cuoi-noi-dong-tuyet.html">
                            <h2
                                class="my-2 select-none text-xl text-white transition-all line-clamp-1 hover:text-primary md:text-2xl">
                                Nguyện Em Mãi Tươi Cười Nơi Đồng Tuyết
                            </h2>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <div class="aspect-h-4 aspect-w-3 rounded-xl relative group">
                            <div>
                                <a href="chi-tiet-truyen.html" class='z-0 cursor-pointer'>
                                    <img  src="{{ asset('assets/client/images/banner/vua-can-sa-thumb.jpg') }}"
                                        class="lozad fancy-fade-in z-0 absolute top-0 left-0 rounded-xl object-cover object-center w-full h-full"
                                        alt="manga-thumbnail" />
                                </a>
                                <div
                                    class="relative cursor-pointer animate__faster z-[9999] animate__animated animate__fadeIn h-full w-full flex-col space-y-2 overflow-hidden rounded-xl bg-highlight invisible md:visible hidden text-white group-hover:flex">
                                    <a href="chi-tiet-truyen.html">
                                        <h3
                                            class="ml-4 mt-4 min-h-[40px] text-[100%] font-semibold line-clamp-2 hover:text-primary">
                                            Vua Cần Sa
                                        </h3>
                                    </a>
                                    <p class="ml-4 flex flex-nowrap items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                                        </svg>
                                        <span class="ml-2 text-[90%] line-clamp-1">
                                            Chapter 19
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            07/09/2024
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.348 14.652a3.75 3.75 0 0 1 0-5.304m5.304 0a3.75 3.75 0 0 1 0 5.304m-7.425 2.121a6.75 6.75 0 0 1 0-9.546m9.546 0a6.75 6.75 0 0 1 0 9.546M5.106 18.894c-3.808-3.807-3.808-9.98 0-13.788m13.788 0c3.808 3.807 3.808 9.98 0 13.788M12 12h.008v.008H12V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            ongoing
                                        </span>
                                    </p>
                                    <div class="flex h-fit w-full flex-col items-center space-y-4 py-6">
                                        <a href="vua-can-sa/chuong-1.html"
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-primary py-2 px-4 transition-all hover:scale-[110%]">
                                            <span>Đọc ngay</span>
                                        </a>
                                        <button
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-white py-2 px-4 text-gray-700 transition-all hover:scale-[110%]">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                            </svg>
                                            <a href="chi-tiet-truyen.html">
                                                Thông tin
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="chi-tiet-truyen.html">
                            <h2
                                class="my-2 select-none text-xl text-white transition-all line-clamp-1 hover:text-primary md:text-2xl">
                                Vua Cần Sa
                            </h2>
                        </a>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </section>

{{-- Kết thúc slide mới cập nhật --}}

{{-- Bắt đầu phần đề xuất cho bạn --}}
        <section class="w-[90%] mx-auto w-max-[1300px] mt-6 overflow-x-hidden">
            <h2
                class="mt-4 flex select-none items-center font-secondary text-3xl text-white hover:cursor-pointer  md:text-4xl lg:text-5xl">
                <div class="flex items-center transition-all hover:text-primary">Đề xuất cho bạn</div>
            </h2>
            <div class="my-4 h-[250px] w-full bg-red-500/0 text-white md:h-[300px]">
                <div id="swiper-recommended" class="swiper section-swiper full-size">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide absolute-center pb-4 md:pb-0">
                            <a href="byakuda-no-hanamuko.html" class="h-full w-full">
                                <div class="full-size grid grid-cols-5 overflow-hidden rounded-xl bg-deep-black">
                                    <figure class="relative col-span-1 md:col-span-2 lg:col-span-1">
                                        <img class="lozad absolute inset-0 object-cover object-center h-full w-full"
                                             src="{{ asset('assets/client/images/banner/byakuda-no-hanamuko-thumb.jpg') }}"
                                            alt="comic-img" />
                                    </figure>
                                    <div
                                        class="col-span-4 flex flex-col px-6 py-2 md:col-span-3 md:space-y-4 lg:col-span-4">
                                        <h1
                                            class="font-secondary text-3xl transition-all duration-200 line-clamp-2 hover:text-primary lg:text-4xl">
                                            Byakuda No Hanamuko
                                        </h1>
                                        <div class="text-xl font-light line-clamp-6 md:text-2xl lg:line-clamp-[9]">
                                            <p>Tsubaki là nam sinh có vận xui cao ngất ngủi tới mức ảnh hưởng tới
                                                những người xung quanh. Cậu thích thầm người bạn thưở nhỏ có tên
                                                Sakuya, tuy nhiên, để bảo vệ cho cậu trước số phận đen đủi, cô gái
                                                Sakuya đã ký một giao ước với Bạch Xà - sứ giả của thần linh. Đây là
                                                câu chuyện về Bạch Xà - sứ giả của sự may mắn và chàng trai xui xẻo
                                                được chọn làm chú rể của Bạch Xà.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide absolute-center pb-4 md:pb-0">
                            <a href="tam-giac-bac.html" class="h-full w-full">
                                <div class="full-size grid grid-cols-5 overflow-hidden rounded-xl bg-deep-black">
                                    <figure class="relative col-span-1 md:col-span-2 lg:col-span-1">
                                        <img class="lozad absolute inset-0 object-cover object-center h-full w-full"
                                             src="{{ asset('assets/client/images/banner/tam-giac-bac-thumb.jpg') }}"
                                            alt="comic-img" />
                                    </figure>
                                    <div
                                        class="col-span-4 flex flex-col px-6 py-2 md:col-span-3 md:space-y-4 lg:col-span-4">
                                        <h1
                                            class="font-secondary text-3xl transition-all duration-200 line-clamp-2 hover:text-primary lg:text-4xl">
                                            Tam Giác Bạc
                                        </h1>
                                        <div class="text-xl font-light line-clamp-6 md:text-2xl lg:line-clamp-[9]">
                                            <p>Một câu chuyện khoa học viễn tưởng mang tính sử thi trải dài 30 000
                                                năm qua vô số các hành tinh và số phận đan xen lẫn nhau. Câu chuyện
                                                được kể qua 3 điểm nhìn phi tuyến tính, diễn ra xuyên không gian và
                                                thời gian, và cuối cùng gỡ nút ở một điểm.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide absolute-center pb-4 md:pb-0">
                            <a href="loi-hua-nay-khong-thuoc-ve-em.html" class="h-full w-full">
                                <div class="full-size grid grid-cols-5 overflow-hidden rounded-xl bg-deep-black">
                                    <figure class="relative col-span-1 md:col-span-2 lg:col-span-1">
                                        <img class="lozad absolute inset-0 object-cover object-center h-full w-full"
                                             src="{{ asset('assets/client/images/banner/loi-hua-nay-khong-thuoc-ve-em-thumb.jpg') }}"
                                            alt="comic-img" />
                                    </figure>
                                    <div
                                        class="col-span-4 flex flex-col px-6 py-2 md:col-span-3 md:space-y-4 lg:col-span-4">
                                        <h1
                                            class="font-secondary text-3xl transition-all duration-200 line-clamp-2 hover:text-primary lg:text-4xl">
                                            Lời Hứa Này Không Thuộc Về Em
                                        </h1>
                                        <div class="text-xl font-light line-clamp-6 md:text-2xl lg:line-clamp-[9]">
                                            <p>Đế chế Ranvier được thành lập dựa trên sự kết hợp huyền bí giữa Thánh
                                                Nữ và Rồng. Nơi đây lưu truyền truyền thuyết về hai vị Thánh Nữ song
                                                sinh – Leila và Elena. Elena, trái ngược với người chị gái sở hữu
                                                năng lực phi thường, lại không hề có bất kỳ sức mạnh đặc biệt nào.
                                                Tuy nhiên, số phận trớ trêu đưa đẩy Elena vào cuộc hôn nhân định
                                                mệnh với Hoàng Thái tử Kyle-người được đồn đại là hậu duệ của Rồng
                                                thay cho chị gái mình Leila, khi Leila đột ngột biến mất ngay trước
                                                lễ cưới.Trong lúc lo sợ rằng mình có thể bị phát hiện là giả, Kyle
                                                bất ngờ nói với Elena:“Không phải là cô đã quên lời hứa với ta 8 năm
                                                trước đấy chứ, Leila.”“Như đã hứa, xin cô hãy kết liễu ta đi.”Khi
                                                Kyle yêu cầu giết anh ấy, Elena đã rơi vào tình trạng hỗn loạn…</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide absolute-center pb-4 md:pb-0">
                            <a href="fujimi-lovers.html" class="h-full w-full">
                                <div class="full-size grid grid-cols-5 overflow-hidden rounded-xl bg-deep-black">
                                    <figure class="relative col-span-1 md:col-span-2 lg:col-span-1">
                                        <img class="lozad absolute inset-0 object-cover object-center h-full w-full"
                                             src="{{ asset('assets/client/images/banner/fujimi-lovers-thumb.jpg') }}"
                                            alt="comic-img" />
                                    </figure>
                                    <div
                                        class="col-span-4 flex flex-col px-6 py-2 md:col-span-3 md:space-y-4 lg:col-span-4">
                                        <h1
                                            class="font-secondary text-3xl transition-all duration-200 line-clamp-2 hover:text-primary lg:text-4xl">
                                            Fujimi Lovers
                                        </h1>
                                        <div class="text-xl font-light line-clamp-6 md:text-2xl lg:line-clamp-[9]">
                                            <p>Khi còn nhỏ, Kouno Jun - nam chính của chúng ta - đã phải lòng Hasebe
                                                Rino - cô bạn gái cùng lớp xinh đẹp tài giỏi. Đến một ngày, cậu
                                                quyết định tỏ tình với người trong mộng, và đã sung sướng phát điên
                                                khi được chấp nhận. Nhưng ngay khoảnh khắc Hasabe mỉm cười với cậu,
                                                người con gái ấy đột nhiên biến mất. Biến mất không còn chút vết
                                                tích gì. Kouno cố gắng đi dò hỏi những người xung quanh về cô ấy,
                                                nhưng tất cả đều không hề nhớ gì về cô gái tên Hasebe Rino. Dường
                                                như người con gái ấy đã bị xóa sạch khỏi ký ức của tất cả mọi người,
                                                trừ Kouno</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide absolute-center pb-4 md:pb-0">
                            <a href="hiep-si-song-vi-ngay-hom-nay.html" class="h-full w-full">
                                <div class="full-size grid grid-cols-5 overflow-hidden rounded-xl bg-deep-black">
                                    <figure class="relative col-span-1 md:col-span-2 lg:col-span-1">
                                        <img class="lozad absolute inset-0 object-cover object-center h-full w-full"
                                             src="{{ asset('assets/client/images/banner/hiep-si-song-vi-ngay-hom-nay-thumb.jpg') }}"
                                            alt="comic-img" />
                                    </figure>
                                    <div
                                        class="col-span-4 flex flex-col px-6 py-2 md:col-span-3 md:space-y-4 lg:col-span-4">
                                        <h1
                                            class="font-secondary text-3xl transition-all duration-200 line-clamp-2 hover:text-primary lg:text-4xl">
                                            Hiệp Sĩ Sống Vì Ngày Hôm Nay
                                        </h1>
                                        <div class="text-xl font-light line-clamp-6 md:text-2xl lg:line-clamp-[9]">
                                            <p>Truyện tranh Hiệp Sĩ Sống Vì Ngày Hôm Nay</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide absolute-center pb-4 md:pb-0">
                            <a href="onna-no-kono-mayu-showa-shiki-maid-kankansho.html" class="h-full w-full">
                                <div class="full-size grid grid-cols-5 overflow-hidden rounded-xl bg-deep-black">
                                    <figure class="relative col-span-1 md:col-span-2 lg:col-span-1">
                                        <img class="lozad absolute inset-0 object-cover object-center h-full w-full"
                                             src="{{ asset('assets/client/images/banner/onna-no-kono-mayu-showa-shiki-maid-kankansho-thumb.jpg') }}"
                                            alt="comic-img" />
                                    </figure>
                                    <div
                                        class="col-span-4 flex flex-col px-6 py-2 md:col-span-3 md:space-y-4 lg:col-span-4">
                                        <h1
                                            class="font-secondary text-3xl transition-all duration-200 line-clamp-2 hover:text-primary lg:text-4xl">
                                            Onna no Kono Mayu Showa Shiki Maid Kankansho
                                        </h1>
                                        <div class="text-xl font-light line-clamp-6 md:text-2xl lg:line-clamp-[9]">
                                            <p>Đó là năm 1935. Khi nhận được tin báo về vụ tai nạn của cha mẹ mình,
                                                Yoichiro trở về nhà của cha mẹ mình ở Yokosuka từ Anh, nơi anh đang
                                                du học. Anh được chào đón bởi một cô bé có đôi mắt xanh tự xưng là
                                                Mayu. Mayu là người hầu gái duy nhất còn lại trong dinh thự dành cho
                                                người kế vị người đứng đầu gia tộc Wakui. Cô là người giúp việc độc
                                                quyền của anh. Lúc đầu, Yoichiro miễn cưỡng đểMayu chăm sóc, nhưng
                                                anh đã mở lòng với cô và và không lâu sau, hai người họ</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
{{-- Kết thúc phần đề xuất cho bạn --}}


{{-- Bắt đầu phần random truyện --}}
        <section class="w-[90%] mx-auto w-max-[1300px] mt-6 overflow-x-hidden">
            <div class="flex h-fit w-full flex-col text-white">
                <button id="random-btn"
                    class="absolute-center w-fit space-x-4 rounded-lg bg-highlight p-4 transition-all duration-200 hover:bg-white/20">
                    <span>Random Truyện</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-shuffle inline-block h-8 w-8" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M0 3.5A.5.5 0 0 1 .5 3H1c2.202 0 3.827 1.24 4.874 2.418.49.552.865 1.102 1.126 1.532.26-.43.636-.98 1.126-1.532C9.173 4.24 10.798 3 13 3v1c-1.798 0-3.173 1.01-4.126 2.082A9.6 9.6 0 0 0 7.556 8a9.6 9.6 0 0 0 1.317 1.918C9.828 10.99 11.204 12 13 12v1c-2.202 0-3.827-1.24-4.874-2.418A10.6 10.6 0 0 1 7 9.05c-.26.43-.636.98-1.126 1.532C4.827 11.76 3.202 13 1 13H.5a.5.5 0 0 1 0-1H1c1.798 0 3.173-1.01 4.126-2.082A9.6 9.6 0 0 0 6.444 8a9.6 9.6 0 0 0-1.317-1.918C4.172 5.01 2.796 4 1 4H.5a.5.5 0 0 1-.5-.5">
                        </path>
                        <path
                            d="M13 5.466V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192m0 9v-3.932a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192">
                        </path>
                    </svg>
                </button>
                <div
                    class="my-4 flex h-[230px] items-center overflow-hidden rounded-xl bg-gradient-to-r from-deep-black to-highlight md:h-[300px] lg:h-[350px]">
                    <div id="swiper-random" class="swiper relative h-full w-full">
                        <div class="swiper-wrapper container-random">
                            <div class="swiper-slide flex h-full w-full items-center cursor-pointer">
                                <div class="flex h-full w-full items-center">
                                    <div class="flex h-3/4 w-[60%] flex-col space-y-2 px-4 md:space-y-4 md:py-6">
                                        <h1
                                            class="my-2 min-h-max font-secondary text-3xl line-clamp-1 md:text-4xl lg:text-5xl">
                                            Tensei Akuma no Saikyou Yuusha Ikusei Keikaku
                                        </h1>
                                        <h2 class="text-xl line-clamp-3 md:text-2xl md:line-clamp-4">
                                            <p>Một người Nhật Bản đã tái sinh thành một ác ma hạ cấp trong địa ngục,
                                                Kakyu, sau hai ngàn năm đã trở nên mạnh mẽ không ai sánh bằng. Tuy
                                                nhiên, không ngờ anh ta bị "đuổi" tới một "thế giới khác", thoát
                                                khỏi địa ngục nghiệt ngã. Kakyu, người thưởng thức cuộc sống chậm
                                                rãi mà anh ta mơ ước, nhưng ngôi làng mà anh ta nhờ đến bị tấn công
                                                và bị tiêu diệt mà anh ta không thể quay về kịp.</p>
                                        </h2>
                                        <div class="flex w-full flex-1 items-center space-x-4 text-sm md:text-2xl">
                                            <a href="tensei-akuma-no-saikyou-yuusha-ikusei-keikaku.html">
                                                <button
                                                    class="h-fit rounded-xl bg-white p-4 text-gray-800 transition-all duration-200 hover:scale-110">
                                                    Chi tiết
                                                </button>
                                            </a>
                                            <a href="tensei-akuma-no-saikyou-yuusha-ikusei-keikaku/chuong-1.html"
                                                class="h-fit rounded-xl bg-primary p-4 transition-all duration-200 hover:scale-110">
                                                Đọc ngay
                                            </a>
                                        </div>
                                    </div>
                                    <div
                                        class="flex h-full w-3/4 items-center justify-end overflow-hidden md:w-[60%] md:justify-center lg:w-[40%]">
                                        <figure
                                            class="relative h-[200%] w-[80%] rotate-[15deg] border-4 border-white md:w-[70%] md:rotate-[18deg] lg:w-[60%] lg:rotate-[25deg]">
                                            <img class="lozad absolute inset-0 object-cover object-center w-full h-full"
                                                 src="{{ asset('assets/client/images/banner/tensei-akuma-no-saikyou-yuusha-ikusei-keikaku-thumb.jpg') }}"
                                                alt="comic-img" />
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide flex h-full w-full items-center cursor-pointer">
                                <div class="flex h-full w-full items-center">
                                    <div class="flex h-3/4 w-[60%] flex-col space-y-2 px-4 md:space-y-4 md:py-6">
                                        <h1
                                            class="my-2 min-h-max font-secondary text-3xl line-clamp-1 md:text-4xl lg:text-5xl">
                                            Gokusotsu Kraken
                                        </h1>
                                        <h2 class="text-xl line-clamp-3 md:text-2xl md:line-clamp-4">
                                            <p>Cùng tác giả với Akame ga Kill và Mato Seihei no Slave. Một cậu thanh
                                                niên tên Shimizu Kuuma đang phải lo lắng để tìm kiếm việc làm thì
                                                đột nhiên bị đưa sang một thế giới khác. Sau đó cậu bị đưa vào hải
                                                ngục thành - nhà tù giữa biển cả dành cho nữ giới. Ở đó cậu đã hợp
                                                nhất mới chúa tể biển cả Kraken - một sinh vật đã giao cho cậu nhiệm
                                                vụ phải đi giải cứu công chúa Zeina.</p>
                                        </h2>
                                        <div class="flex w-full flex-1 items-center space-x-4 text-sm md:text-2xl">
                                            <a href="gokusotsu-kraken.html">
                                                <button
                                                    class="h-fit rounded-xl bg-white p-4 text-gray-800 transition-all duration-200 hover:scale-110">
                                                    Chi tiết
                                                </button>
                                            </a>
                                            <a href="gokusotsu-kraken/chuong-1.html"
                                                class="h-fit rounded-xl bg-primary p-4 transition-all duration-200 hover:scale-110">
                                                Đọc ngay
                                            </a>
                                        </div>
                                    </div>
                                    <div
                                        class="flex h-full w-3/4 items-center justify-end overflow-hidden md:w-[60%] md:justify-center lg:w-[40%]">
                                        <figure
                                            class="relative h-[200%] w-[80%] rotate-[15deg] border-4 border-white md:w-[70%] md:rotate-[18deg] lg:w-[60%] lg:rotate-[25deg]">
                                            <img class="lozad absolute inset-0 object-cover object-center w-full h-full"
                                                 src="{{ asset('assets/client/images/banner/gokusotsu-kraken-thumb.jpg') }}"
                                                alt="comic-img" />
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide flex h-full w-full items-center cursor-pointer">
                                <div class="flex h-full w-full items-center">
                                    <div class="flex h-3/4 w-[60%] flex-col space-y-2 px-4 md:space-y-4 md:py-6">
                                        <h1
                                            class="my-2 min-h-max font-secondary text-3xl line-clamp-1 md:text-4xl lg:text-5xl">
                                            Tsuihousareru Tabi ni Skill wo Te ni Ireta Ore ga, 100 no Isekai de
                                            2-shuume Musou
                                        </h1>
                                        <h2 class="text-xl line-clamp-3 md:text-2xl md:line-clamp-4">
                                            <p>Ed đã bị trục xuất khỏi nhóm của mình vì bị coi là vô dụng, nhưng
                                                thay vì buồn bã và khó chịu, anh ta lại thực sự hạnh phúc!!?Hóa ra
                                                không phải vô cớ mà anh ta cảm thấy vui mừng khi bị trục xuất khỏi
                                                nhóm của mình, bởi vì mỗi lần bị đuổi&nbsp;anh ta sẽ nhận được một
                                                kỹ năng khiến anh ta càng trở nên mạnh mẽ hơn.Ed được triệu hồi tới
                                                một thế giới kì lạ, nhiệm vụ của anh là phải bị trục xuất khỏi 100
                                                tổ đội anh hùng ở 100 thế giới khác nhau để có thể quay về thế giới
                                                của mình.Một thực thể thần bí và thần thánh nói rằng anh ta đã đạt
                                                được mọi điều kiện để trở về thế giới ban đầu của mình. Tuy nhiên,
                                                điều kiện cuối cùng là anh ta được yêu cầu "Hãy nhìn vào số phận của
                                                một trong những thế giới này sau khi rời đi." và anh ấy bị sốc bởi
                                                những gì anh ấy nhìn thấy.</p>
                                        </h2>
                                        <div class="flex w-full flex-1 items-center space-x-4 text-sm md:text-2xl">
                                            <a
                                                href="tsuihousareru-tabi-ni-skill-wo-te-ni-ireta-ore-ga-100-no-isekai-de-2-shuume-musou.html">
                                                <button
                                                    class="h-fit rounded-xl bg-white p-4 text-gray-800 transition-all duration-200 hover:scale-110">
                                                    Chi tiết
                                                </button>
                                            </a>
                                            <a href="tsuihousareru-tabi-ni-skill-wo-te-ni-ireta-ore-ga-100-no-isekai-de-2-shuume-musou/chuong-1.html"
                                                class="h-fit rounded-xl bg-primary p-4 transition-all duration-200 hover:scale-110">
                                                Đọc ngay
                                            </a>
                                        </div>
                                    </div>
                                    <div
                                        class="flex h-full w-3/4 items-center justify-end overflow-hidden md:w-[60%] md:justify-center lg:w-[40%]">
                                        <figure
                                            class="relative h-[200%] w-[80%] rotate-[15deg] border-4 border-white md:w-[70%] md:rotate-[18deg] lg:w-[60%] lg:rotate-[25deg]">
                                            <img class="lozad absolute inset-0 object-cover object-center w-full h-full"
                                                 src="{{ asset('assets/client/images/banner/tsuihousareru-tabi-ni-skill-wo-te-ni-ireta-ore-ga-100-no-isekai-de-2-shuume-musou-thumb.jpg') }}"
                                                alt="comic-img" />
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hidden md:flex absolute top-4 left-4 h-fit w-fit space-x-4">
                            <div class="swiper-button-prev z-50">
                                <button
                                    class="transition-all absolute-center z-[300] md:h-16 md:w-16 w-14 h-14 rounded-2xl text-white bg-highlight hover:bg-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                        class="h-10 w-10">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 19.5 8.25 12l7.5-7.5"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="swiper-button-next z-50">
                                <button
                                    class="transition-all absolute-center z-[300] md:h-16 md:w-16 w-14 h-14 rounded-2xl text-white bg-highlight hover:bg-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                        class="h-10 w-10">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </section>
{{-- Kết thúc phần random truyện --}}

{{-- bắt đầu bảng xếp hạng theo ngày tuần tháng  --}}
        <section class="w-[90%] mx-auto min-w-[333px] w-max-[1300px] mt-6 overflow-x-hidden">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
                <div class="w-full rounded-xl bg-deep-black pb-4 lg:my-4">
                    <h2
                        class="my-6 whitespace-nowrap text-center font-secondary text-3xl text-white lg:text-[160%]">
                        Truyện nổi bật nhất
                    </h2>
                    <ul class="w-full space-y-4 overflow-hidden text-white">
                        <li class="flex w-full px-4 py-2 odd:bg-highlight/40">
                            <a href="cuoc-song-thuong-ngay-cua-nhan-vien-hieu-thuoc-sa-chan.html">
                                <figure
                                    class="relative h-[80px] min-h-[80px] w-[60px] min-w-[60px] overflow-hidden rounded-xl">
                                    <img  src="{{ asset('assets/client/images/banner/cuoc-song-thuong-ngay-cua-nhan-vien-hieu-thuoc-sa-chan-thumb.jpg') }}"
                                        class="lozad aspect-w-3 aspect-h-4 absolute object-cover object-center"
                                        alt="img-preview" />
                                </figure>
                            </a>

                            <div class="flex w-full flex-col justify-center space-y-2 pl-4 ">
                                <a href="cuoc-song-thuong-ngay-cua-nhan-vien-hieu-thuoc-sa-chan.html">
                                    <h3
                                        class="font-secondary text-2xl font-semibold transition-all line-clamp-1 hover:cursor-pointer hover:text-primary md:text-3xl">
                                        Cuộc Sống Thường Ngày Của Nhân Viên Hiệu Thuốc Sa-Chan
                                    </h3>
                                </a>

                                <a href="cuoc-song-thuong-ngay-cua-nhan-vien-hieu-thuoc-sa-chan/chuong-18.html"
                                    class="text-lg">
                                    Chapter 18
                                </a>
                                <ul class="items-center text-base line-clamp-1 lg:text-xl">
                                    <li class="inline-block">
                                        <a href="the-loai/action.html" class="capitalize">Action</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="flex w-full px-4 py-2 odd:bg-highlight/40">
                            <a href="truy-lac.html">
                                <figure
                                    class="relative h-[80px] min-h-[80px] w-[60px] min-w-[60px] overflow-hidden rounded-xl">
                                    <img  src="{{ asset('assets/client/images/banner/truy-lac-thumb.jpg') }}"
                                        class="lozad aspect-w-3 aspect-h-4 absolute object-cover object-center"
                                        alt="img-preview" />
                                </figure>
                            </a>

                            <div class="flex w-full flex-col justify-center space-y-2 pl-4 ">
                                <a href="truy-lac.html">
                                    <h3
                                        class="font-secondary text-2xl font-semibold transition-all line-clamp-1 hover:cursor-pointer hover:text-primary md:text-3xl">
                                        Truỵ Lạc
                                    </h3>
                                </a>

                                <a href="truy-lac/chuong-12.html" class="text-lg">
                                    Chapter 12
                                </a>
                                <ul class="items-center text-base line-clamp-1 lg:text-xl">
                                    <li class="inline-block">
                                        <a href="the-loai/action.html" class="capitalize">Action</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="flex w-full px-4 py-2 odd:bg-highlight/40">
                            <a href="mairimashita-iruma-kun-if-episode-of-mafia.html">
                                <figure
                                    class="relative h-[80px] min-h-[80px] w-[60px] min-w-[60px] overflow-hidden rounded-xl">
                                    <img  src="{{ asset('assets/client/images/banner/mairimashita-iruma-kun-if-episode-of-mafia-thumb.jpg') }}"
                                        class="lozad aspect-w-3 aspect-h-4 absolute object-cover object-center"
                                        alt="img-preview" />
                                </figure>
                            </a>

                            <div class="flex w-full flex-col justify-center space-y-2 pl-4 ">
                                <a href="mairimashita-iruma-kun-if-episode-of-mafia.html">
                                    <h3
                                        class="font-secondary text-2xl font-semibold transition-all line-clamp-1 hover:cursor-pointer hover:text-primary md:text-3xl">
                                        Mairimashita! Iruma-kun: IF Episode of MAFIA
                                    </h3>
                                </a>

                                <a href="mairimashita-iruma-kun-if-episode-of-mafia/chuong-11.html" class="text-lg">
                                    Chapter 11
                                </a>
                                <ul class="items-center text-base line-clamp-1 lg:text-xl">
                                    <li class="inline-block">
                                        <a href="the-loai/action.html" class="capitalize">Action</a>
                                        <span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 16 16" class="inline-block" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="inline-block">
                                        <a href="the-loai/comedy.html" class="capitalize">Comedy</a>
                                        <span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 16 16" class="inline-block" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="inline-block">
                                        <a href="the-loai/manga.html" class="capitalize">Manga</a>
                                        <span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 16 16" class="inline-block" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="inline-block">
                                        <a href="the-loai/shounen.html" class="capitalize">Shounen</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="flex w-full px-4 py-2 odd:bg-highlight/40">
                            <a href="bua-an-dam-bac-cua-ba-chi-26-doc-than.html">
                                <figure
                                    class="relative h-[80px] min-h-[80px] w-[60px] min-w-[60px] overflow-hidden rounded-xl">
                                    <img  src="{{ asset('assets/client/images/banner/bua-an-dam-bac-cua-ba-chi-26-doc-than-thumb.jpg') }}"
                                        class="lozad aspect-w-3 aspect-h-4 absolute object-cover object-center"
                                        alt="img-preview" />
                                </figure>
                            </a>

                            <div class="flex w-full flex-col justify-center space-y-2 pl-4 ">
                                <a href="bua-an-dam-bac-cua-ba-chi-26-doc-than.html">
                                    <h3
                                        class="font-secondary text-2xl font-semibold transition-all line-clamp-1 hover:cursor-pointer hover:text-primary md:text-3xl">
                                        Bữa ăn đạm bạc của bà chị (26) độc thân
                                    </h3>
                                </a>

                                <a href="bua-an-dam-bac-cua-ba-chi-26-doc-than/chuong-14.html" class="text-lg">
                                    Chapter 14
                                </a>
                                <ul class="items-center text-base line-clamp-1 lg:text-xl">
                                    <li class="inline-block">
                                        <a href="the-loai/comedy.html" class="capitalize">Comedy</a>
                                        <span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 16 16" class="inline-block" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="inline-block">
                                        <a href="the-loai/manga.html" class="capitalize">Manga</a>
                                        <span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 16 16" class="inline-block" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="inline-block">
                                        <a href="the-loai/psychological.html" class="capitalize">Psychological</a>
                                        <span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 16 16" class="inline-block" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="inline-block">
                                        <a href="the-loai/slice-of-life.html" class="capitalize">Slice of Life</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="flex w-full px-4 py-2 odd:bg-highlight/40">
                            <a href="blame-master-edition.html">
                                <figure
                                    class="relative h-[80px] min-h-[80px] w-[60px] min-w-[60px] overflow-hidden rounded-xl">
                                    <img  src="{{ asset('assets/client/images/banner/blame-master-edition-thumb.jpg') }}"
                                        class="lozad aspect-w-3 aspect-h-4 absolute object-cover object-center"
                                        alt="img-preview" />
                                </figure>
                            </a>

                            <div class="flex w-full flex-col justify-center space-y-2 pl-4 ">
                                <a href="blame-master-edition.html">
                                    <h3
                                        class="font-secondary text-2xl font-semibold transition-all line-clamp-1 hover:cursor-pointer hover:text-primary md:text-3xl">
                                        Blame! Master Edition
                                    </h3>
                                </a>

                                <a href="blame-master-edition/chuong-18.html" class="text-lg">
                                    Chapter 18
                                </a>
                                <ul class="items-center text-base line-clamp-1 lg:text-xl">
                                    <li class="inline-block">
                                        <a href="the-loai/action.html" class="capitalize">Action</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li
                            class="flex w-full items-center justify-center rounded-xl py-4 px-4 transition-all hover:cursor-pointer hover:bg-highlight">
                            <button class="lg:text-3xl">
                                <a href="tim-kiem-nang-caoa1a1.html?sort=2">
                                    Xem thêm
                                </a>
                            </button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-right ml-2 w-8 h-8" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                            </svg>
                        </li>
                    </ul>
                </div>
                <div class="w-full rounded-xl bg-deep-black pb-4 lg:my-4">
                    <h2
                        class="my-6 whitespace-nowrap text-center font-secondary text-3xl text-white lg:text-[160%]">
                        Truyện nổi bật tháng
                    </h2>
                    <ul class="w-full space-y-4 overflow-hidden text-white">
                        <li class="flex w-full px-4 py-2 odd:bg-highlight/40">
                            <a href="cuoc-song-thuong-ngay-cua-nhan-vien-hieu-thuoc-sa-chan.html">
                                <figure
                                    class="relative h-[80px] min-h-[80px] w-[60px] min-w-[60px] overflow-hidden rounded-xl">
                                    <img  src="{{ asset('assets/client/images/banner/cuoc-song-thuong-ngay-cua-nhan-vien-hieu-thuoc-sa-chan-thumb.jpg') }}"
                                        class="lozad aspect-w-3 aspect-h-4 absolute object-cover object-center"
                                        alt="img-preview" />
                                </figure>
                            </a>

                            <div class="flex w-full flex-col justify-center space-y-2 pl-4 ">
                                <a href="cuoc-song-thuong-ngay-cua-nhan-vien-hieu-thuoc-sa-chan.html">
                                    <h3
                                        class="font-secondary text-2xl font-semibold transition-all line-clamp-1 hover:cursor-pointer hover:text-primary md:text-3xl">
                                        Cuộc Sống Thường Ngày Của Nhân Viên Hiệu Thuốc Sa-Chan
                                    </h3>
                                </a>

                                <a href="cuoc-song-thuong-ngay-cua-nhan-vien-hieu-thuoc-sa-chan/chuong-18.html"
                                    class="text-lg">
                                    Chapter 18
                                </a>
                                <ul class="items-center text-base line-clamp-1 lg:text-xl">
                                    <li class="inline-block">
                                        <a href="the-loai/action.html" class="capitalize">Action</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="flex w-full px-4 py-2 odd:bg-highlight/40">
                            <a href="truy-lac.html">
                                <figure
                                    class="relative h-[80px] min-h-[80px] w-[60px] min-w-[60px] overflow-hidden rounded-xl">
                                    <img  src="{{ asset('assets/client/images/banner/truy-lac-thumb.jpg') }}"
                                        class="lozad aspect-w-3 aspect-h-4 absolute object-cover object-center"
                                        alt="img-preview" />
                                </figure>
                            </a>

                            <div class="flex w-full flex-col justify-center space-y-2 pl-4 ">
                                <a href="truy-lac.html">
                                    <h3
                                        class="font-secondary text-2xl font-semibold transition-all line-clamp-1 hover:cursor-pointer hover:text-primary md:text-3xl">
                                        Truỵ Lạc
                                    </h3>
                                </a>

                                <a href="truy-lac/chuong-12.html" class="text-lg">
                                    Chapter 12
                                </a>
                                <ul class="items-center text-base line-clamp-1 lg:text-xl">
                                    <li class="inline-block">
                                        <a href="the-loai/action.html" class="capitalize">Action</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="flex w-full px-4 py-2 odd:bg-highlight/40">
                            <a href="mairimashita-iruma-kun-if-episode-of-mafia.html">
                                <figure
                                    class="relative h-[80px] min-h-[80px] w-[60px] min-w-[60px] overflow-hidden rounded-xl">
                                    <img  src="{{ asset('assets/client/images/banner/mairimashita-iruma-kun-if-episode-of-mafia-thumb.jpg') }}"
                                        class="lozad aspect-w-3 aspect-h-4 absolute object-cover object-center"
                                        alt="img-preview" />
                                </figure>
                            </a>

                            <div class="flex w-full flex-col justify-center space-y-2 pl-4 ">
                                <a href="mairimashita-iruma-kun-if-episode-of-mafia.html">
                                    <h3
                                        class="font-secondary text-2xl font-semibold transition-all line-clamp-1 hover:cursor-pointer hover:text-primary md:text-3xl">
                                        Mairimashita! Iruma-kun: IF Episode of MAFIA
                                    </h3>
                                </a>

                                <a href="mairimashita-iruma-kun-if-episode-of-mafia/chuong-11.html" class="text-lg">
                                    Chapter 11
                                </a>
                                <ul class="items-center text-base line-clamp-1 lg:text-xl">
                                    <li class="inline-block">
                                        <a href="the-loai/action.html" class="capitalize">Action</a>
                                        <span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 16 16" class="inline-block" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="inline-block">
                                        <a href="the-loai/comedy.html" class="capitalize">Comedy</a>
                                        <span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 16 16" class="inline-block" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="inline-block">
                                        <a href="the-loai/manga.html" class="capitalize">Manga</a>
                                        <span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 16 16" class="inline-block" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="inline-block">
                                        <a href="the-loai/shounen.html" class="capitalize">Shounen</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="flex w-full px-4 py-2 odd:bg-highlight/40">
                            <a href="bua-an-dam-bac-cua-ba-chi-26-doc-than.html">
                                <figure
                                    class="relative h-[80px] min-h-[80px] w-[60px] min-w-[60px] overflow-hidden rounded-xl">
                                    <img  src="{{ asset('assets/client/images/banner/bua-an-dam-bac-cua-ba-chi-26-doc-than-thumb.jpg') }}"
                                        class="lozad aspect-w-3 aspect-h-4 absolute object-cover object-center"
                                        alt="img-preview" />
                                </figure>
                            </a>

                            <div class="flex w-full flex-col justify-center space-y-2 pl-4 ">
                                <a href="bua-an-dam-bac-cua-ba-chi-26-doc-than.html">
                                    <h3
                                        class="font-secondary text-2xl font-semibold transition-all line-clamp-1 hover:cursor-pointer hover:text-primary md:text-3xl">
                                        Bữa ăn đạm bạc của bà chị (26) độc thân
                                    </h3>
                                </a>

                                <a href="bua-an-dam-bac-cua-ba-chi-26-doc-than/chuong-14.html" class="text-lg">
                                    Chapter 14
                                </a>
                                <ul class="items-center text-base line-clamp-1 lg:text-xl">
                                    <li class="inline-block">
                                        <a href="the-loai/comedy.html" class="capitalize">Comedy</a>
                                        <span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 16 16" class="inline-block" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="inline-block">
                                        <a href="the-loai/manga.html" class="capitalize">Manga</a>
                                        <span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 16 16" class="inline-block" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="inline-block">
                                        <a href="the-loai/psychological.html" class="capitalize">Psychological</a>
                                        <span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 16 16" class="inline-block" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="inline-block">
                                        <a href="the-loai/slice-of-life.html" class="capitalize">Slice of Life</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="flex w-full px-4 py-2 odd:bg-highlight/40">
                            <a href="blame-master-edition.html">
                                <figure
                                    class="relative h-[80px] min-h-[80px] w-[60px] min-w-[60px] overflow-hidden rounded-xl">
                                    <img  src="{{ asset('assets/client/images/banner/blame-master-edition-thumb.jpg') }}"
                                        class="lozad aspect-w-3 aspect-h-4 absolute object-cover object-center"
                                        alt="img-preview" />
                                </figure>
                            </a>

                            <div class="flex w-full flex-col justify-center space-y-2 pl-4 ">
                                <a href="blame-master-edition.html">
                                    <h3
                                        class="font-secondary text-2xl font-semibold transition-all line-clamp-1 hover:cursor-pointer hover:text-primary md:text-3xl">
                                        Blame! Master Edition
                                    </h3>
                                </a>

                                <a href="blame-master-edition/chuong-18.html" class="text-lg">
                                    Chapter 18
                                </a>
                                <ul class="items-center text-base line-clamp-1 lg:text-xl">
                                    <li class="inline-block">
                                        <a href="the-loai/action.html" class="capitalize">Action</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li
                            class="flex w-full items-center justify-center rounded-xl py-4 px-4 transition-all hover:cursor-pointer hover:bg-highlight">
                            <button class="lg:text-3xl">
                                <a href="tim-kiem-nang-caoa1a1.html?sort=2">
                                    Xem thêm
                                </a>
                            </button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-right ml-2 w-8 h-8" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                            </svg>
                        </li>
                    </ul>
                </div>
                <div class="w-full rounded-xl bg-deep-black pb-4 lg:my-4">
                    <h2
                        class="my-6 whitespace-nowrap text-center font-secondary text-3xl text-white lg:text-[160%]">
                        Truyện nổi bật tuần
                    </h2>
                    <ul class="w-full space-y-4 overflow-hidden text-white">
                        <li class="flex w-full px-4 py-2 odd:bg-highlight/40">
                            <a href="cuoc-song-thuong-ngay-cua-nhan-vien-hieu-thuoc-sa-chan.html">
                                <figure
                                    class="relative h-[80px] min-h-[80px] w-[60px] min-w-[60px] overflow-hidden rounded-xl">
                                    <img  src="{{ asset('assets/client/images/banner/cuoc-song-thuong-ngay-cua-nhan-vien-hieu-thuoc-sa-chan-thumb.jpg') }}"
                                        class="lozad aspect-w-3 aspect-h-4 absolute object-cover object-center"
                                        alt="img-preview" />
                                </figure>
                            </a>

                            <div class="flex w-full flex-col justify-center space-y-2 pl-4 ">
                                <a href="cuoc-song-thuong-ngay-cua-nhan-vien-hieu-thuoc-sa-chan.html">
                                    <h3
                                        class="font-secondary text-2xl font-semibold transition-all line-clamp-1 hover:cursor-pointer hover:text-primary md:text-3xl">
                                        Cuộc Sống Thường Ngày Của Nhân Viên Hiệu Thuốc Sa-Chan
                                    </h3>
                                </a>

                                <a href="cuoc-song-thuong-ngay-cua-nhan-vien-hieu-thuoc-sa-chan/chuong-18.html"
                                    class="text-lg">
                                    Chapter 18
                                </a>
                                <ul class="items-center text-base line-clamp-1 lg:text-xl">
                                    <li class="inline-block">
                                        <a href="the-loai/action.html" class="capitalize">Action</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="flex w-full px-4 py-2 odd:bg-highlight/40">
                            <a href="truy-lac.html">
                                <figure
                                    class="relative h-[80px] min-h-[80px] w-[60px] min-w-[60px] overflow-hidden rounded-xl">
                                    <img  src="{{ asset('assets/client/images/banner/truy-lac-thumb.jpg') }}"
                                        class="lozad aspect-w-3 aspect-h-4 absolute object-cover object-center"
                                        alt="img-preview" />
                                </figure>
                            </a>

                            <div class="flex w-full flex-col justify-center space-y-2 pl-4 ">
                                <a href="truy-lac.html">
                                    <h3
                                        class="font-secondary text-2xl font-semibold transition-all line-clamp-1 hover:cursor-pointer hover:text-primary md:text-3xl">
                                        Truỵ Lạc
                                    </h3>
                                </a>

                                <a href="truy-lac/chuong-12.html" class="text-lg">
                                    Chapter 12
                                </a>
                                <ul class="items-center text-base line-clamp-1 lg:text-xl">
                                    <li class="inline-block">
                                        <a href="the-loai/action.html" class="capitalize">Action</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="flex w-full px-4 py-2 odd:bg-highlight/40">
                            <a href="mairimashita-iruma-kun-if-episode-of-mafia.html">
                                <figure
                                    class="relative h-[80px] min-h-[80px] w-[60px] min-w-[60px] overflow-hidden rounded-xl">
                                    <img  src="{{ asset('assets/client/images/banner/mairimashita-iruma-kun-if-episode-of-mafia-thumb.jpg') }}"
                                        class="lozad aspect-w-3 aspect-h-4 absolute object-cover object-center"
                                        alt="img-preview" />
                                </figure>
                            </a>

                            <div class="flex w-full flex-col justify-center space-y-2 pl-4 ">
                                <a href="mairimashita-iruma-kun-if-episode-of-mafia.html">
                                    <h3
                                        class="font-secondary text-2xl font-semibold transition-all line-clamp-1 hover:cursor-pointer hover:text-primary md:text-3xl">
                                        Mairimashita! Iruma-kun: IF Episode of MAFIA
                                    </h3>
                                </a>

                                <a href="mairimashita-iruma-kun-if-episode-of-mafia/chuong-11.html" class="text-lg">
                                    Chapter 11
                                </a>
                                <ul class="items-center text-base line-clamp-1 lg:text-xl">
                                    <li class="inline-block">
                                        <a href="the-loai/action.html" class="capitalize">Action</a>
                                        <span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 16 16" class="inline-block" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="inline-block">
                                        <a href="the-loai/comedy.html" class="capitalize">Comedy</a>
                                        <span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 16 16" class="inline-block" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="inline-block">
                                        <a href="the-loai/manga.html" class="capitalize">Manga</a>
                                        <span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 16 16" class="inline-block" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="inline-block">
                                        <a href="the-loai/shounen.html" class="capitalize">Shounen</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="flex w-full px-4 py-2 odd:bg-highlight/40">
                            <a href="blame-master-edition.html">
                                <figure
                                    class="relative h-[80px] min-h-[80px] w-[60px] min-w-[60px] overflow-hidden rounded-xl">
                                    <img  src="{{ asset('assets/client/images/banner/blame-master-edition-thumb.jpg') }}"
                                        class="lozad aspect-w-3 aspect-h-4 absolute object-cover object-center"
                                        alt="img-preview" />
                                </figure>
                            </a>

                            <div class="flex w-full flex-col justify-center space-y-2 pl-4 ">
                                <a href="blame-master-edition.html">
                                    <h3
                                        class="font-secondary text-2xl font-semibold transition-all line-clamp-1 hover:cursor-pointer hover:text-primary md:text-3xl">
                                        Blame! Master Edition
                                    </h3>
                                </a>

                                <a href="blame-master-edition/chuong-18.html" class="text-lg">
                                    Chapter 18
                                </a>
                                <ul class="items-center text-base line-clamp-1 lg:text-xl">
                                    <li class="inline-block">
                                        <a href="the-loai/action.html" class="capitalize">Action</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="flex w-full px-4 py-2 odd:bg-highlight/40">
                            <a href="bua-an-dam-bac-cua-ba-chi-26-doc-than.html">
                                <figure
                                    class="relative h-[80px] min-h-[80px] w-[60px] min-w-[60px] overflow-hidden rounded-xl">
                                    <img  src="{{ asset('assets/client/images/banner/bua-an-dam-bac-cua-ba-chi-26-doc-than-thumb.jpg') }}"
                                        class="lozad aspect-w-3 aspect-h-4 absolute object-cover object-center"
                                        alt="img-preview" />
                                </figure>
                            </a>

                            <div class="flex w-full flex-col justify-center space-y-2 pl-4 ">
                                <a href="bua-an-dam-bac-cua-ba-chi-26-doc-than.html">
                                    <h3
                                        class="font-secondary text-2xl font-semibold transition-all line-clamp-1 hover:cursor-pointer hover:text-primary md:text-3xl">
                                        Bữa ăn đạm bạc của bà chị (26) độc thân
                                    </h3>
                                </a>

                                <a href="bua-an-dam-bac-cua-ba-chi-26-doc-than/chuong-14.html" class="text-lg">
                                    Chapter 14
                                </a>
                                <ul class="items-center text-base line-clamp-1 lg:text-xl">
                                    <li class="inline-block">
                                        <a href="the-loai/comedy.html" class="capitalize">Comedy</a>
                                        <span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 16 16" class="inline-block" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="inline-block">
                                        <a href="the-loai/manga.html" class="capitalize">Manga</a>
                                        <span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 16 16" class="inline-block" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="inline-block">
                                        <a href="the-loai/psychological.html" class="capitalize">Psychological</a>
                                        <span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 16 16" class="inline-block" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="inline-block">
                                        <a href="the-loai/slice-of-life.html" class="capitalize">Slice of Life</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li
                            class="flex w-full items-center justify-center rounded-xl py-4 px-4 transition-all hover:cursor-pointer hover:bg-highlight">
                            <button class="lg:text-3xl">
                                <a href="tim-kiem-nang-caoa1a1.html?sort=2">
                                    Xem thêm
                                </a>
                            </button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-right ml-2 w-8 h-8" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                            </svg>
                        </li>
                    </ul>
                </div>
                <div class="w-full rounded-xl bg-deep-black pb-4 lg:my-4">
                    <h2
                        class="my-6 whitespace-nowrap text-center font-secondary text-3xl text-white lg:text-[160%]">
                        Truyện nổi bật ngày
                    </h2>
                    <ul class="w-full space-y-4 overflow-hidden text-white">
                        <li class="flex w-full px-4 py-2 odd:bg-highlight/40">
                            <a href="truy-lac.html">
                                <figure
                                    class="relative h-[80px] min-h-[80px] w-[60px] min-w-[60px] overflow-hidden rounded-xl">
                                    <img  src="{{ asset('assets/client/images/banner/truy-lac-thumb.jpg') }}"
                                        class="lozad aspect-w-3 aspect-h-4 absolute object-cover object-center"
                                        alt="img-preview" />
                                </figure>
                            </a>

                            <div class="flex w-full flex-col justify-center space-y-2 pl-4 ">
                                <a href="truy-lac.html">
                                    <h3
                                        class="font-secondary text-2xl font-semibold transition-all line-clamp-1 hover:cursor-pointer hover:text-primary md:text-3xl">
                                        Truỵ Lạc
                                    </h3>
                                </a>

                                <a href="truy-lac/chuong-12.html" class="text-lg">
                                    Chapter 12
                                </a>
                                <ul class="items-center text-base line-clamp-1 lg:text-xl">
                                    <li class="inline-block">
                                        <a href="the-loai/action.html" class="capitalize">Action</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="flex w-full px-4 py-2 odd:bg-highlight/40">
                            <a href="cuoc-song-thuong-ngay-cua-nhan-vien-hieu-thuoc-sa-chan.html">
                                <figure
                                    class="relative h-[80px] min-h-[80px] w-[60px] min-w-[60px] overflow-hidden rounded-xl">
                                    <img  src="{{ asset('assets/client/images/banner/cuoc-song-thuong-ngay-cua-nhan-vien-hieu-thuoc-sa-chan-thumb.jpg') }}"
                                        class="lozad aspect-w-3 aspect-h-4 absolute object-cover object-center"
                                        alt="img-preview" />
                                </figure>
                            </a>

                            <div class="flex w-full flex-col justify-center space-y-2 pl-4 ">
                                <a href="cuoc-song-thuong-ngay-cua-nhan-vien-hieu-thuoc-sa-chan.html">
                                    <h3
                                        class="font-secondary text-2xl font-semibold transition-all line-clamp-1 hover:cursor-pointer hover:text-primary md:text-3xl">
                                        Cuộc Sống Thường Ngày Của Nhân Viên Hiệu Thuốc Sa-Chan
                                    </h3>
                                </a>

                                <a href="cuoc-song-thuong-ngay-cua-nhan-vien-hieu-thuoc-sa-chan/chuong-18.html"
                                    class="text-lg">
                                    Chapter 18
                                </a>
                                <ul class="items-center text-base line-clamp-1 lg:text-xl">
                                    <li class="inline-block">
                                        <a href="the-loai/action.html" class="capitalize">Action</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="flex w-full px-4 py-2 odd:bg-highlight/40">
                            <a
                                href="akuninzura-shita-b-kyuu-boukensha-shujinkou-to-sono-osananajimi-tachi-no-papa-ni-naru.html">
                                <figure
                                    class="relative h-[80px] min-h-[80px] w-[60px] min-w-[60px] overflow-hidden rounded-xl">
                                    <img  src="{{ asset('assets/client/images/banner/akuninzura-shita-b-kyuu-boukensha-shujinkou-to-sono-osananajimi-tachi-no-papa-ni-naru-thumb.jpg') }}"
                                        class="lozad aspect-w-3 aspect-h-4 absolute object-cover object-center"
                                        alt="img-preview" />
                                </figure>
                            </a>

                            <div class="flex w-full flex-col justify-center space-y-2 pl-4 ">
                                <a
                                    href="akuninzura-shita-b-kyuu-boukensha-shujinkou-to-sono-osananajimi-tachi-no-papa-ni-naru.html">
                                    <h3
                                        class="font-secondary text-2xl font-semibold transition-all line-clamp-1 hover:cursor-pointer hover:text-primary md:text-3xl">
                                        Akuninzura shita B-kyuu Boukensha - Shujinkou to Sono Osananajimi-tachi no
                                        Papa ni naru
                                    </h3>
                                </a>

                                <a href="akuninzura-shita-b-kyuu-boukensha-shujinkou-to-sono-osananajimi-tachi-no-papa-ni-naru/chuong-10.html"
                                    class="text-lg">
                                    Chapter 10.1
                                </a>
                                <ul class="items-center text-base line-clamp-1 lg:text-xl">
                                    <li class="inline-block">
                                        <a href="the-loai/action.html" class="capitalize">Action</a>
                                        <span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 16 16" class="inline-block" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="inline-block">
                                        <a href="the-loai/adventure.html" class="capitalize">Adventure</a>
                                        <span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 16 16" class="inline-block" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="inline-block">
                                        <a href="the-loai/chuyen-sinh.html" class="capitalize">Chuyển Sinh</a>
                                        <span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 16 16" class="inline-block" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="inline-block">
                                        <a href="the-loai/manga.html" class="capitalize">Manga</a>
                                        <span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 16 16" class="inline-block" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="inline-block">
                                        <a href="the-loai/school-life.html" class="capitalize">School Life</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="flex w-full px-4 py-2 odd:bg-highlight/40">
                            <a href="toi-thang-cap-bang-cach-thuong-cho-nhung-de-tu.html">
                                <figure
                                    class="relative h-[80px] min-h-[80px] w-[60px] min-w-[60px] overflow-hidden rounded-xl">
                                    <img  src="{{ asset('assets/client/images/banner/toi-thang-cap-bang-cach-thuong-cho-nhung-de-tu-thumb.jpg') }}"
                                        class="lozad aspect-w-3 aspect-h-4 absolute object-cover object-center"
                                        alt="img-preview" />
                                </figure>
                            </a>

                            <div class="flex w-full flex-col justify-center space-y-2 pl-4 ">
                                <a href="toi-thang-cap-bang-cach-thuong-cho-nhung-de-tu.html">
                                    <h3
                                        class="font-secondary text-2xl font-semibold transition-all line-clamp-1 hover:cursor-pointer hover:text-primary md:text-3xl">
                                        Tôi thăng cấp bằng cách thưởng cho những đệ tử
                                    </h3>
                                </a>

                                <a href="toi-thang-cap-bang-cach-thuong-cho-nhung-de-tu/chuong-20.html"
                                    class="text-lg">
                                    Chapter 20.2
                                </a>
                                <ul class="items-center text-base line-clamp-1 lg:text-xl">
                                    <li class="inline-block">
                                        <a href="the-loai/action.html" class="capitalize">Action</a>
                                        <span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 16 16" class="inline-block" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="inline-block">
                                        <a href="the-loai/comedy.html" class="capitalize">Comedy</a>
                                        <span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 16 16" class="inline-block" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="inline-block">
                                        <a href="the-loai/fantasy.html" class="capitalize">Fantasy</a>
                                        <span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 16 16" class="inline-block" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="inline-block">
                                        <a href="the-loai/manhua.html" class="capitalize">Manhua</a>
                                        <span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 16 16" class="inline-block" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="inline-block">
                                        <a href="the-loai/truyen-mau.html" class="capitalize">Truyện Màu</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="flex w-full px-4 py-2 odd:bg-highlight/40">
                            <a href="chi-tiet-truyen.html">
                                <figure
                                    class="relative h-[80px] min-h-[80px] w-[60px] min-w-[60px] overflow-hidden rounded-xl">
                                    <img  src="{{ asset('assets/client/images/banner/vua-can-sa-thumb.jpg') }}"
                                        class="lozad aspect-w-3 aspect-h-4 absolute object-cover object-center"
                                        alt="img-preview" />
                                </figure>
                            </a>

                            <div class="flex w-full flex-col justify-center space-y-2 pl-4 ">
                                <a href="chi-tiet-truyen.html">
                                    <h3
                                        class="font-secondary text-2xl font-semibold transition-all line-clamp-1 hover:cursor-pointer hover:text-primary md:text-3xl">
                                        Vua Cần Sa
                                    </h3>
                                </a>

                                <a href="vua-can-sa/chuong-19.html" class="text-lg">
                                    Chapter 19
                                </a>
                                <ul class="items-center text-base line-clamp-1 lg:text-xl">
                                    <li class="inline-block">
                                        <a href="the-loai/drama.html" class="capitalize">Drama</a>
                                        <span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 16 16" class="inline-block" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="inline-block">
                                        <a href="the-loai/manga.html" class="capitalize">Manga</a>
                                        <span>
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 16 16" class="inline-block" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="inline-block">
                                        <a href="the-loai/seinen.html" class="capitalize">Seinen</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li
                            class="flex w-full items-center justify-center rounded-xl py-4 px-4 transition-all hover:cursor-pointer hover:bg-highlight">
                            <button class="lg:text-3xl">
                                <a href="tim-kiem-nang-caoa1a1.html?sort=2">
                                    Xem thêm
                                </a>
                            </button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-right ml-2 w-8 h-8" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                            </svg>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
{{-- Kết thúc phần bảng xếp hạng --}}





        <section class="w-[90%] mx-auto w-max-[1300px] mt-6 overflow-x-hidden">
            <h2
                class="mt-4 flex select-none items-center font-secondary text-3xl text-white hover:cursor-pointer  md:text-4xl lg:text-5xl">
                <div class="flex items-center transition-all hover:text-primary">
                    <a href="tim-kiem-nang-caofda1.html?sort=1">Truyện mới</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true" data-slot="icon" class="h-8 w-8 lg:h-10 lg:w-10">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
                    </svg>
                </div>
            </h2>
            <div class="swiper section-swiper mt-5 swiper-updated">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="aspect-h-4 aspect-w-3 rounded-xl relative group">
                            <div>
                                <a href="chi-tiet-truyen.html" class='z-0 cursor-pointer'>
                                    <img  src="{{ asset('assets/client/images/banner/vua-can-sa-thumb.jpg') }}"
                                        class="lozad fancy-fade-in z-0 absolute top-0 left-0 rounded-xl object-cover object-center w-full h-full"
                                        alt="manga-thumbnail" />
                                </a>
                                <div
                                    class="relative cursor-pointer animate__faster z-[9999] animate__animated animate__fadeIn h-full w-full flex-col space-y-2 overflow-hidden rounded-xl bg-highlight invisible md:visible hidden text-white group-hover:flex">
                                    <a href="chi-tiet-truyen.html">
                                        <h3
                                            class="ml-4 mt-4 min-h-[40px] text-[100%] font-semibold line-clamp-2 hover:text-primary">
                                            Vua Cần Sa
                                        </h3>
                                    </a>
                                    <p class="ml-4 flex flex-nowrap items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                                        </svg>
                                        <span class="ml-2 text-[90%] line-clamp-1">
                                            Chapter 19
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            07/09/2024
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.348 14.652a3.75 3.75 0 0 1 0-5.304m5.304 0a3.75 3.75 0 0 1 0 5.304m-7.425 2.121a6.75 6.75 0 0 1 0-9.546m9.546 0a6.75 6.75 0 0 1 0 9.546M5.106 18.894c-3.808-3.807-3.808-9.98 0-13.788m13.788 0c3.808 3.807 3.808 9.98 0 13.788M12 12h.008v.008H12V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            ongoing
                                        </span>
                                    </p>
                                    <div class="flex h-fit w-full flex-col items-center space-y-4 py-6">
                                        <a href="vua-can-sa/chuong-1.html"
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-primary py-2 px-4 transition-all hover:scale-[110%]">
                                            <span>Đọc ngay</span>
                                        </a>
                                        <button
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-white py-2 px-4 text-gray-700 transition-all hover:scale-[110%]">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                            </svg>
                                            <a href="chi-tiet-truyen.html">
                                                Thông tin
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="chi-tiet-truyen.html">
                            <h2
                                class="my-2 select-none text-xl text-white transition-all line-clamp-1 hover:text-primary md:text-2xl">
                                Vua Cần Sa
                            </h2>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <div class="aspect-h-4 aspect-w-3 rounded-xl relative group">
                            <div>
                                <a href="blood-crawling-princess-of-a-ruined-country.html"
                                    class='z-0 cursor-pointer'>
                                    <img  src="{{ asset('assets/client/images/banner/blood-crawling-princess-of-a-ruined-country-thumb.jpg') }}"
                                        class="lozad fancy-fade-in z-0 absolute top-0 left-0 rounded-xl object-cover object-center w-full h-full"
                                        alt="manga-thumbnail" />
                                </a>
                                <div
                                    class="relative cursor-pointer animate__faster z-[9999] animate__animated animate__fadeIn h-full w-full flex-col space-y-2 overflow-hidden rounded-xl bg-highlight invisible md:visible hidden text-white group-hover:flex">
                                    <a href="blood-crawling-princess-of-a-ruined-country.html">
                                        <h3
                                            class="ml-4 mt-4 min-h-[40px] text-[100%] font-semibold line-clamp-2 hover:text-primary">
                                            Blood-Crawling Princess of a Ruined Country
                                        </h3>
                                    </a>
                                    <p class="ml-4 flex flex-nowrap items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                                        </svg>
                                        <span class="ml-2 text-[90%] line-clamp-1">
                                            Chapter 7
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            07/09/2024
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.348 14.652a3.75 3.75 0 0 1 0-5.304m5.304 0a3.75 3.75 0 0 1 0 5.304m-7.425 2.121a6.75 6.75 0 0 1 0-9.546m9.546 0a6.75 6.75 0 0 1 0 9.546M5.106 18.894c-3.808-3.807-3.808-9.98 0-13.788m13.788 0c3.808 3.807 3.808 9.98 0 13.788M12 12h.008v.008H12V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            ongoing
                                        </span>
                                    </p>
                                    <div class="flex h-fit w-full flex-col items-center space-y-4 py-6">
                                        <a href="blood-crawling-princess-of-a-ruined-country/chuong-1.html"
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-primary py-2 px-4 transition-all hover:scale-[110%]">
                                            <span>Đọc ngay</span>
                                        </a>
                                        <button
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-white py-2 px-4 text-gray-700 transition-all hover:scale-[110%]">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                            </svg>
                                            <a href="blood-crawling-princess-of-a-ruined-country.html">
                                                Thông tin
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="blood-crawling-princess-of-a-ruined-country.html">
                            <h2
                                class="my-2 select-none text-xl text-white transition-all line-clamp-1 hover:text-primary md:text-2xl">
                                Blood-Crawling Princess of a Ruined Country
                            </h2>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <div class="aspect-h-4 aspect-w-3 rounded-xl relative group">
                            <div>
                                <a href="bua-an-dam-bac-cua-ba-chi-26-doc-than.html" class='z-0 cursor-pointer'>
                                    <img  src="{{ asset('assets/client/images/banner/bua-an-dam-bac-cua-ba-chi-26-doc-than-thumb.jpg') }}"
                                        class="lozad fancy-fade-in z-0 absolute top-0 left-0 rounded-xl object-cover object-center w-full h-full"
                                        alt="manga-thumbnail" />
                                </a>
                                <div
                                    class="relative cursor-pointer animate__faster z-[9999] animate__animated animate__fadeIn h-full w-full flex-col space-y-2 overflow-hidden rounded-xl bg-highlight invisible md:visible hidden text-white group-hover:flex">
                                    <a href="bua-an-dam-bac-cua-ba-chi-26-doc-than.html">
                                        <h3
                                            class="ml-4 mt-4 min-h-[40px] text-[100%] font-semibold line-clamp-2 hover:text-primary">
                                            Bữa ăn đạm bạc của bà chị (26) độc thân
                                        </h3>
                                    </a>
                                    <p class="ml-4 flex flex-nowrap items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                                        </svg>
                                        <span class="ml-2 text-[90%] line-clamp-1">
                                            Chapter 14
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            07/09/2024
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.348 14.652a3.75 3.75 0 0 1 0-5.304m5.304 0a3.75 3.75 0 0 1 0 5.304m-7.425 2.121a6.75 6.75 0 0 1 0-9.546m9.546 0a6.75 6.75 0 0 1 0 9.546M5.106 18.894c-3.808-3.807-3.808-9.98 0-13.788m13.788 0c3.808 3.807 3.808 9.98 0 13.788M12 12h.008v.008H12V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            ongoing
                                        </span>
                                    </p>
                                    <div class="flex h-fit w-full flex-col items-center space-y-4 py-6">
                                        <a href="bua-an-dam-bac-cua-ba-chi-26-doc-than/chuong-1.html"
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-primary py-2 px-4 transition-all hover:scale-[110%]">
                                            <span>Đọc ngay</span>
                                        </a>
                                        <button
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-white py-2 px-4 text-gray-700 transition-all hover:scale-[110%]">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                            </svg>
                                            <a href="bua-an-dam-bac-cua-ba-chi-26-doc-than.html">
                                                Thông tin
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="bua-an-dam-bac-cua-ba-chi-26-doc-than.html">
                            <h2
                                class="my-2 select-none text-xl text-white transition-all line-clamp-1 hover:text-primary md:text-2xl">
                                Bữa ăn đạm bạc của bà chị (26) độc thân
                            </h2>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <div class="aspect-h-4 aspect-w-3 rounded-xl relative group">
                            <div>
                                <a href="hai-chi-em-nha-herami-bat-on-thuc-su.html" class='z-0 cursor-pointer'>
                                    <img  src="{{ asset('assets/client/images/banner/hai-chi-em-nha-herami-bat-on-thuc-su-thumb.jpg') }}"
                                        class="lozad fancy-fade-in z-0 absolute top-0 left-0 rounded-xl object-cover object-center w-full h-full"
                                        alt="manga-thumbnail" />
                                </a>
                                <div
                                    class="relative cursor-pointer animate__faster z-[9999] animate__animated animate__fadeIn h-full w-full flex-col space-y-2 overflow-hidden rounded-xl bg-highlight invisible md:visible hidden text-white group-hover:flex">
                                    <a href="hai-chi-em-nha-herami-bat-on-thuc-su.html">
                                        <h3
                                            class="ml-4 mt-4 min-h-[40px] text-[100%] font-semibold line-clamp-2 hover:text-primary">
                                            Hai chị em nhà Herami bất ổn thực sự!
                                        </h3>
                                    </a>
                                    <p class="ml-4 flex flex-nowrap items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                                        </svg>
                                        <span class="ml-2 text-[90%] line-clamp-1">
                                            Chapter 16
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            07/09/2024
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.348 14.652a3.75 3.75 0 0 1 0-5.304m5.304 0a3.75 3.75 0 0 1 0 5.304m-7.425 2.121a6.75 6.75 0 0 1 0-9.546m9.546 0a6.75 6.75 0 0 1 0 9.546M5.106 18.894c-3.808-3.807-3.808-9.98 0-13.788m13.788 0c3.808 3.807 3.808 9.98 0 13.788M12 12h.008v.008H12V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            ongoing
                                        </span>
                                    </p>
                                    <div class="flex h-fit w-full flex-col items-center space-y-4 py-6">
                                        <a href="hai-chi-em-nha-herami-bat-on-thuc-su/chuong-3.html"
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-primary py-2 px-4 transition-all hover:scale-[110%]">
                                            <span>Đọc ngay</span>
                                        </a>
                                        <button
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-white py-2 px-4 text-gray-700 transition-all hover:scale-[110%]">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                            </svg>
                                            <a href="hai-chi-em-nha-herami-bat-on-thuc-su.html">
                                                Thông tin
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="hai-chi-em-nha-herami-bat-on-thuc-su.html">
                            <h2
                                class="my-2 select-none text-xl text-white transition-all line-clamp-1 hover:text-primary md:text-2xl">
                                Hai chị em nhà Herami bất ổn thực sự!
                            </h2>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <div class="aspect-h-4 aspect-w-3 rounded-xl relative group">
                            <div>
                                <a href="heart-gear.html" class='z-0 cursor-pointer'>
                                    <img  src="{{ asset('assets/client/images/banner/heart-gear-thumb.jpg') }}"
                                        class="lozad fancy-fade-in z-0 absolute top-0 left-0 rounded-xl object-cover object-center w-full h-full"
                                        alt="manga-thumbnail" />
                                </a>
                                <div
                                    class="relative cursor-pointer animate__faster z-[9999] animate__animated animate__fadeIn h-full w-full flex-col space-y-2 overflow-hidden rounded-xl bg-highlight invisible md:visible hidden text-white group-hover:flex">
                                    <a href="heart-gear.html">
                                        <h3
                                            class="ml-4 mt-4 min-h-[40px] text-[100%] font-semibold line-clamp-2 hover:text-primary">
                                            Heart Gear
                                        </h3>
                                    </a>
                                    <p class="ml-4 flex flex-nowrap items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                                        </svg>
                                        <span class="ml-2 text-[90%] line-clamp-1">
                                            Chapter 8
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            07/09/2024
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.348 14.652a3.75 3.75 0 0 1 0-5.304m5.304 0a3.75 3.75 0 0 1 0 5.304m-7.425 2.121a6.75 6.75 0 0 1 0-9.546m9.546 0a6.75 6.75 0 0 1 0 9.546M5.106 18.894c-3.808-3.807-3.808-9.98 0-13.788m13.788 0c3.808 3.807 3.808 9.98 0 13.788M12 12h.008v.008H12V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            ongoing
                                        </span>
                                    </p>
                                    <div class="flex h-fit w-full flex-col items-center space-y-4 py-6">
                                        <a href="heart-gear/chuong-1.html"
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-primary py-2 px-4 transition-all hover:scale-[110%]">
                                            <span>Đọc ngay</span>
                                        </a>
                                        <button
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-white py-2 px-4 text-gray-700 transition-all hover:scale-[110%]">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                            </svg>
                                            <a href="heart-gear.html">
                                                Thông tin
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="heart-gear.html">
                            <h2
                                class="my-2 select-none text-xl text-white transition-all line-clamp-1 hover:text-primary md:text-2xl">
                                Heart Gear
                            </h2>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <div class="aspect-h-4 aspect-w-3 rounded-xl relative group">
                            <div>
                                <a href="mairimashita-iruma-kun-if-episode-of-mafia.html"
                                    class='z-0 cursor-pointer'>
                                    <img  src="{{ asset('assets/client/images/banner/mairimashita-iruma-kun-if-episode-of-mafia-thumb.jpg') }}"
                                        class="lozad fancy-fade-in z-0 absolute top-0 left-0 rounded-xl object-cover object-center w-full h-full"
                                        alt="manga-thumbnail" />
                                </a>
                                <div
                                    class="relative cursor-pointer animate__faster z-[9999] animate__animated animate__fadeIn h-full w-full flex-col space-y-2 overflow-hidden rounded-xl bg-highlight invisible md:visible hidden text-white group-hover:flex">
                                    <a href="mairimashita-iruma-kun-if-episode-of-mafia.html">
                                        <h3
                                            class="ml-4 mt-4 min-h-[40px] text-[100%] font-semibold line-clamp-2 hover:text-primary">
                                            Mairimashita! Iruma-kun: IF Episode of MAFIA
                                        </h3>
                                    </a>
                                    <p class="ml-4 flex flex-nowrap items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                                        </svg>
                                        <span class="ml-2 text-[90%] line-clamp-1">
                                            Chapter 11
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            07/09/2024
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.348 14.652a3.75 3.75 0 0 1 0-5.304m5.304 0a3.75 3.75 0 0 1 0 5.304m-7.425 2.121a6.75 6.75 0 0 1 0-9.546m9.546 0a6.75 6.75 0 0 1 0 9.546M5.106 18.894c-3.808-3.807-3.808-9.98 0-13.788m13.788 0c3.808 3.807 3.808 9.98 0 13.788M12 12h.008v.008H12V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            ongoing
                                        </span>
                                    </p>
                                    <div class="flex h-fit w-full flex-col items-center space-y-4 py-6">
                                        <a href="mairimashita-iruma-kun-if-episode-of-mafia/chuong-1.html"
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-primary py-2 px-4 transition-all hover:scale-[110%]">
                                            <span>Đọc ngay</span>
                                        </a>
                                        <button
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-white py-2 px-4 text-gray-700 transition-all hover:scale-[110%]">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                            </svg>
                                            <a href="mairimashita-iruma-kun-if-episode-of-mafia.html">
                                                Thông tin
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="mairimashita-iruma-kun-if-episode-of-mafia.html">
                            <h2
                                class="my-2 select-none text-xl text-white transition-all line-clamp-1 hover:text-primary md:text-2xl">
                                Mairimashita! Iruma-kun: IF Episode of MAFIA
                            </h2>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <div class="aspect-h-4 aspect-w-3 rounded-xl relative group">
                            <div>
                                <a href="nguyen-em-mai-tuoi-cuoi-noi-dong-tuyet.html" class='z-0 cursor-pointer'>
                                    <img  src="{{ asset('assets/client/images/banner/nguyen-em-mai-tuoi-cuoi-noi-dong-tuyet-thumb.jpg') }}"
                                        class="lozad fancy-fade-in z-0 absolute top-0 left-0 rounded-xl object-cover object-center w-full h-full"
                                        alt="manga-thumbnail" />
                                </a>
                                <div
                                    class="relative cursor-pointer animate__faster z-[9999] animate__animated animate__fadeIn h-full w-full flex-col space-y-2 overflow-hidden rounded-xl bg-highlight invisible md:visible hidden text-white group-hover:flex">
                                    <a href="nguyen-em-mai-tuoi-cuoi-noi-dong-tuyet.html">
                                        <h3
                                            class="ml-4 mt-4 min-h-[40px] text-[100%] font-semibold line-clamp-2 hover:text-primary">
                                            Nguyện Em Mãi Tươi Cười Nơi Đồng Tuyết
                                        </h3>
                                    </a>
                                    <p class="ml-4 flex flex-nowrap items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                                        </svg>
                                        <span class="ml-2 text-[90%] line-clamp-1">
                                            Chapter 11
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            07/09/2024
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.348 14.652a3.75 3.75 0 0 1 0-5.304m5.304 0a3.75 3.75 0 0 1 0 5.304m-7.425 2.121a6.75 6.75 0 0 1 0-9.546m9.546 0a6.75 6.75 0 0 1 0 9.546M5.106 18.894c-3.808-3.807-3.808-9.98 0-13.788m13.788 0c3.808 3.807 3.808 9.98 0 13.788M12 12h.008v.008H12V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            ongoing
                                        </span>
                                    </p>
                                    <div class="flex h-fit w-full flex-col items-center space-y-4 py-6">
                                        <a href="nguyen-em-mai-tuoi-cuoi-noi-dong-tuyet/chuong-1.html"
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-primary py-2 px-4 transition-all hover:scale-[110%]">
                                            <span>Đọc ngay</span>
                                        </a>
                                        <button
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-white py-2 px-4 text-gray-700 transition-all hover:scale-[110%]">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                            </svg>
                                            <a href="nguyen-em-mai-tuoi-cuoi-noi-dong-tuyet.html">
                                                Thông tin
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="nguyen-em-mai-tuoi-cuoi-noi-dong-tuyet.html">
                            <h2
                                class="my-2 select-none text-xl text-white transition-all line-clamp-1 hover:text-primary md:text-2xl">
                                Nguyện Em Mãi Tươi Cười Nơi Đồng Tuyết
                            </h2>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <div class="aspect-h-4 aspect-w-3 rounded-xl relative group">
                            <div>
                                <a href="chi-tiet-truyen.html" class='z-0 cursor-pointer'>
                                    <img  src="{{ asset('assets/client/images/banner/vua-can-sa-thumb.jpg') }}"
                                        class="lozad fancy-fade-in z-0 absolute top-0 left-0 rounded-xl object-cover object-center w-full h-full"
                                        alt="manga-thumbnail" />
                                </a>
                                <div
                                    class="relative cursor-pointer animate__faster z-[9999] animate__animated animate__fadeIn h-full w-full flex-col space-y-2 overflow-hidden rounded-xl bg-highlight invisible md:visible hidden text-white group-hover:flex">
                                    <a href="chi-tiet-truyen.html">
                                        <h3
                                            class="ml-4 mt-4 min-h-[40px] text-[100%] font-semibold line-clamp-2 hover:text-primary">
                                            Vua Cần Sa
                                        </h3>
                                    </a>
                                    <p class="ml-4 flex flex-nowrap items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                                        </svg>
                                        <span class="ml-2 text-[90%] line-clamp-1">
                                            Chapter 19
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            07/09/2024
                                        </span>
                                    </p>
                                    <p class="ml-4 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.348 14.652a3.75 3.75 0 0 1 0-5.304m5.304 0a3.75 3.75 0 0 1 0 5.304m-7.425 2.121a6.75 6.75 0 0 1 0-9.546m9.546 0a6.75 6.75 0 0 1 0 9.546M5.106 18.894c-3.808-3.807-3.808-9.98 0-13.788m13.788 0c3.808 3.807 3.808 9.98 0 13.788M12 12h.008v.008H12V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <span class="ml-2 text-[90%]">
                                            ongoing
                                        </span>
                                    </p>
                                    <div class="flex h-fit w-full flex-col items-center space-y-4 py-6">
                                        <a href="vua-can-sa/chuong-1.html"
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-primary py-2 px-4 transition-all hover:scale-[110%]">
                                            <span>Đọc ngay</span>
                                        </a>
                                        <button
                                            class="flex w-fit items-center justify-center space-x-4 rounded-xl bg-white py-2 px-4 text-gray-700 transition-all hover:scale-[110%]">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                            </svg>
                                            <a href="chi-tiet-truyen.html">
                                                Thông tin
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="chi-tiet-truyen.html">
                            <h2
                                class="my-2 select-none text-xl text-white transition-all line-clamp-1 hover:text-primary md:text-2xl">
                                Vua Cần Sa
                            </h2>
                        </a>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </section>
    </div>
</main>
  {{-- slide end --}}
</body>
@endsection
