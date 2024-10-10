@extends('client.layouts.app')
@section('content')
    <main class="overflow-x-hidden" style="margin-top: 100px;">
        <div class="pt-10">
            <div class="xl:max-w-[1200px] lg:max-w-[940px] md:max-w-[760px] w-full mx-auto">
                <div class="grid grid-cols-3 gap-5 px-[5px] lg:px-0">
                    <div class="col-span-3 lg:col-span-2">
                        <div class="w-full mb-5">
                            <h2 class="font-bold text-4xl text-white text-center">Tìm Kiếm Nâng Cao</h2>
                        </div>
                        <div class="flex justify-center items-center">
                            <a data-status="0" href="https://demo.nqtcomics.site/tim-kiem-nang-cao?sort=0&amp;status=0"
                               class="flex items-center justify-center w-[90px] p-1 border-solid border border-[#ccc] rounded-md text-white font-bold mx-3">Tất
                                Cả</a>
                            <a data-status="1" href="https://demo.nqtcomics.site/tim-kiem-nang-cao?sort=0&amp;status=1"
                               class="flex items-center justify-center w-max p-1 whitespace-nowrap text-white rounded-md border border-solid border-[#ccc] mx-3">Hoàn
                                Thành</a>
                            <a data-status="2" href="https://demo.nqtcomics.site/tim-kiem-nang-cao?sort=0&amp;status=2"
                               class="flex items-center justify-center w-[90px] p-1 text-white rounded-md border border-solid border-[#ccc] mx-3">Đang
                                Ra</a>
                        </div>
                        <div class="grid lg:grid-cols-4 grid-cols-2 gap-3 mt-4 mb-5">
                            <div class="col-span-1 flex items-center justify-center">
                                <span class="text-4xl text-white">Sắp xếp theo:</span>
                            </div>
                            <div class="col-span-3">
                                <div class="flex flex-wrap">
                                    <a data-sort="0" href="https://demo.nqtcomics.site/tim-kiem-nang-cao?sort=0"
                                       class="flex items-center justify-center px-5 mb-3 text-white py-1 rounded-md border border-solid border-[#ccc] mx-1">Ngày
                                        Cập Nhật</a>
                                    <a data-sort="1" href="https://demo.nqtcomics.site/tim-kiem-nang-cao?sort=1"
                                       class="flex items-center justify-center px-5 mb-3 text-white py-1 rounded-md border border-solid border-[#ccc] mx-1">Truyện
                                        Mới</a>
                                    <a data-sort="2" href="https://demo.nqtcomics.site/tim-kiem-nang-cao?sort=2"
                                       class="flex items-center justify-center px-5 mb-3 text-white py-1 rounded-md border border-solid border-[#ccc] mx-1">Top
                                        All</a>
                                    <a data-sort="3" href="https://demo.nqtcomics.site/tim-kiem-nang-cao?sort=3"
                                       class="flex items-center justify-center px-5 mb-3 text-white py-1 rounded-md border border-solid border-[#ccc] mx-1">Từ
                                        A-Z</a>
                                    <a data-sort="4" href="https://demo.nqtcomics.site/tim-kiem-nang-cao?sort=4"
                                       class="flex items-center justify-center px-5 mb-3 text-white py-1 rounded-md border border-solid border-[#ccc] mx-1">Từ
                                        Z-A</a>

                                </div>
                            </div>
                        </div>
                        <div class="grid md:grid-cols-4 grid-cols-2 gap-3">
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/vua-can-sa" title="Vua Cần Sa"
                                       class="relative">
                                        <img data-src="https://img.otruyenapi.com/uploads/comics/vua-can-sa-thumb.jpg"
                                             alt="Vua Cần Sa" class="rounded-lg h-[230px] w-full lozad"
                                             itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    156
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/vua-can-sa"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Vua Cần Sa</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/vua-can-sa/chuong-19"
                                               class="hover:underline text-lg" title="Chapter 19">Chapter 19</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/blood-crawling-princess-of-a-ruined-country"
                                       title="Blood-Crawling Princess of a Ruined Country" class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/blood-crawling-princess-of-a-ruined-country-thumb.jpg"
                                            alt="Blood-Crawling Princess of a Ruined Country"
                                            class="rounded-lg h-[230px] w-full lozad" itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    75
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/blood-crawling-princess-of-a-ruined-country"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Blood-Crawling Princess of a Ruined Country</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/blood-crawling-princess-of-a-ruined-country/chuong-7"
                                               class="hover:underline text-lg" title="Chapter 7">Chapter 7</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/bua-an-dam-bac-cua-ba-chi-26-doc-than"
                                       title="Bữa ăn đạm bạc của bà chị (26) độc thân" class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/bua-an-dam-bac-cua-ba-chi-26-doc-than-thumb.jpg"
                                            alt="Bữa ăn đạm bạc của bà chị (26) độc thân"
                                            class="rounded-lg h-[230px] w-full lozad" itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    97
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/bua-an-dam-bac-cua-ba-chi-26-doc-than"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Bữa ăn đạm bạc của bà chị (26) độc thân</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/bua-an-dam-bac-cua-ba-chi-26-doc-than/chuong-14"
                                               class="hover:underline text-lg" title="Chapter 14">Chapter 14</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/hai-chi-em-nha-herami-bat-on-thuc-su"
                                       title="Hai chị em nhà Herami bất ổn thực sự!" class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/hai-chi-em-nha-herami-bat-on-thuc-su-thumb.jpg"
                                            alt="Hai chị em nhà Herami bất ổn thực sự!"
                                            class="rounded-lg h-[230px] w-full lozad" itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    96
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/hai-chi-em-nha-herami-bat-on-thuc-su"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Hai chị em nhà Herami bất ổn thực sự!</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/hai-chi-em-nha-herami-bat-on-thuc-su/chuong-16"
                                               class="hover:underline text-lg" title="Chapter 16">Chapter 16</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/heart-gear" title="Heart Gear"
                                       class="relative">
                                        <img data-src="https://img.otruyenapi.com/uploads/comics/heart-gear-thumb.jpg"
                                             alt="Heart Gear" class="rounded-lg h-[230px] w-full lozad"
                                             itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    68
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/heart-gear"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Heart Gear</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/heart-gear/chuong-8"
                                               class="hover:underline text-lg" title="Chapter 8">Chapter 8</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/mairimashita-iruma-kun-if-episode-of-mafia"
                                       title="Mairimashita! Iruma-kun: IF Episode of MAFIA" class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/mairimashita-iruma-kun-if-episode-of-mafia-thumb.jpg"
                                            alt="Mairimashita! Iruma-kun: IF Episode of MAFIA"
                                            class="rounded-lg h-[230px] w-full lozad" itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    112
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/mairimashita-iruma-kun-if-episode-of-mafia"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Mairimashita! Iruma-kun: IF Episode of MAFIA</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/mairimashita-iruma-kun-if-episode-of-mafia/chuong-11"
                                               class="hover:underline text-lg" title="Chapter 11">Chapter 11</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/nguyen-em-mai-tuoi-cuoi-noi-dong-tuyet"
                                       title="Nguyện Em Mãi Tươi Cười Nơi Đồng Tuyết" class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/nguyen-em-mai-tuoi-cuoi-noi-dong-tuyet-thumb.jpg"
                                            alt="Nguyện Em Mãi Tươi Cười Nơi Đồng Tuyết"
                                            class="rounded-lg h-[230px] w-full lozad" itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    65
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/nguyen-em-mai-tuoi-cuoi-noi-dong-tuyet"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Nguyện Em Mãi Tươi Cười Nơi Đồng Tuyết</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/nguyen-em-mai-tuoi-cuoi-noi-dong-tuyet/chuong-11"
                                               class="hover:underline text-lg" title="Chapter 11">Chapter 11</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/co-nang-meo-ngu-gat-va-chang-trai-huong-noi"
                                       title="Cô nàng mèo ngủ gật và Chàng trai hướng nội" class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/co-nang-meo-ngu-gat-va-chang-trai-huong-noi-thumb.jpg"
                                            alt="Cô nàng mèo ngủ gật và Chàng trai hướng nội"
                                            class="rounded-lg h-[230px] w-full lozad" itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    140
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/co-nang-meo-ngu-gat-va-chang-trai-huong-noi"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Cô nàng mèo ngủ gật và Chàng trai hướng nội</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/co-nang-meo-ngu-gat-va-chang-trai-huong-noi/chuong-19"
                                               class="hover:underline text-lg" title="Chapter 19">Chapter 19</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/i-tried-confessing-my-love-to-a-serious-girl"
                                       title="I Tried Confessing My Love to A Serious Girl" class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/i-tried-confessing-my-love-to-a-serious-girl-thumb.jpg"
                                            alt="I Tried Confessing My Love to A Serious Girl"
                                            class="rounded-lg h-[230px] w-full lozad" itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    61
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/i-tried-confessing-my-love-to-a-serious-girl"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">I Tried Confessing My Love to A Serious Girl</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/i-tried-confessing-my-love-to-a-serious-girl/chuong-11"
                                               class="hover:underline text-lg" title="Chapter 11">Chapter 11</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/cau-co-the-ket-hon-voi-toi-nhung-van-san-sang-cho-viec-ly-hon-duoc-khong"
                                       title="Cậu Có Thể Kết Hôn Với Tôi Nhưng Vẫn Sẵn Sàng Cho Việc Ly Hôn Được Không?"
                                       class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/cau-co-the-ket-hon-voi-toi-nhung-van-san-sang-cho-viec-ly-hon-duoc-khong-thumb.jpg"
                                            alt="Cậu Có Thể Kết Hôn Với Tôi Nhưng Vẫn Sẵn Sàng Cho Việc Ly Hôn Được Không?"
                                            class="rounded-lg h-[230px] w-full lozad" itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    29
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/cau-co-the-ket-hon-voi-toi-nhung-van-san-sang-cho-viec-ly-hon-duoc-khong"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Cậu Có Thể Kết Hôn Với Tôi Nhưng Vẫn Sẵn Sàng Cho Việc Ly Hôn Được Không?</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/cau-co-the-ket-hon-voi-toi-nhung-van-san-sang-cho-viec-ly-hon-duoc-khong/chuong-4"
                                               class="hover:underline text-lg" title="Chapter 4">Chapter 4</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/jojos-bizarre-adventure-moscow-calling"
                                       title="Jojo&#039;s Bizarre Adventure: Moscow Calling" class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/jojos-bizarre-adventure-moscow-calling-thumb.jpg"
                                            alt="Jojo&#039;s Bizarre Adventure: Moscow Calling"
                                            class="rounded-lg h-[230px] w-full lozad" itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    80
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/jojos-bizarre-adventure-moscow-calling"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Jojo&#039;s Bizarre Adventure: Moscow Calling</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/jojos-bizarre-adventure-moscow-calling/chuong-13"
                                               class="hover:underline text-lg" title="Chapter 13">Chapter 13</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/thinh-thich-moi-som-mai"
                                       title="Thình Thịch Mỗi Sớm Mai" class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/thinh-thich-moi-som-mai-thumb.jpg"
                                            alt="Thình Thịch Mỗi Sớm Mai" class="rounded-lg h-[230px] w-full lozad"
                                            itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    44
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/thinh-thich-moi-som-mai"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Thình Thịch Mỗi Sớm Mai</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/thinh-thich-moi-som-mai/chuong-6"
                                               class="hover:underline text-lg" title="Chapter 6">Chapter 6</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/toi-thang-cap-bang-cach-thuong-cho-nhung-de-tu"
                                       title="Tôi thăng cấp bằng cách thưởng cho những đệ tử" class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/toi-thang-cap-bang-cach-thuong-cho-nhung-de-tu-thumb.jpg"
                                            alt="Tôi thăng cấp bằng cách thưởng cho những đệ tử"
                                            class="rounded-lg h-[230px] w-full lozad" itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    113
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/toi-thang-cap-bang-cach-thuong-cho-nhung-de-tu"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Tôi thăng cấp bằng cách thưởng cho những đệ tử</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/toi-thang-cap-bang-cach-thuong-cho-nhung-de-tu/chuong-20.2"
                                               class="hover:underline text-lg" title="Chapter 20.2">Chapter 20.2</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/linh-khi-khoi-phuc-tu-ca-chep-tien-hoa-thanh-than-long"
                                       title="Linh Khí Khôi Phục: Từ Cá Chép Tiến Hoá Thành Thần Long" class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/linh-khi-khoi-phuc-tu-ca-chep-tien-hoa-thanh-than-long-thumb.jpg"
                                            alt="Linh Khí Khôi Phục: Từ Cá Chép Tiến Hoá Thành Thần Long"
                                            class="rounded-lg h-[230px] w-full lozad" itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    89
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/linh-khi-khoi-phuc-tu-ca-chep-tien-hoa-thanh-than-long"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Linh Khí Khôi Phục: Từ Cá Chép Tiến Hoá Thành Thần Long</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/linh-khi-khoi-phuc-tu-ca-chep-tien-hoa-thanh-than-long/chuong-14"
                                               class="hover:underline text-lg" title="Chapter 14">Chapter 14</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/loi-hua-nay-khong-thuoc-ve-em"
                                       title="Lời Hứa Này Không Thuộc Về Em" class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/loi-hua-nay-khong-thuoc-ve-em-thumb.jpg"
                                            alt="Lời Hứa Này Không Thuộc Về Em"
                                            class="rounded-lg h-[230px] w-full lozad" itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    33
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/loi-hua-nay-khong-thuoc-ve-em"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]"
                                                  itemprop="name">Lời Hứa Này Không Thuộc Về Em</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/loi-hua-nay-khong-thuoc-ve-em/chuong-4"
                                               class="hover:underline text-lg" title="Chapter 4">Chapter 4</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/nhat-luc-pha-chu-thien-van-gioi"
                                       title="Nhất Lực Phá Chư Thiên Vạn Giới" class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/nhat-luc-pha-chu-thien-van-gioi-thumb.jpg"
                                            alt="Nhất Lực Phá Chư Thiên Vạn Giới"
                                            class="rounded-lg h-[230px] w-full lozad" itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    62
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/nhat-luc-pha-chu-thien-van-gioi"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]"
                                                  itemprop="name">Nhất Lực Phá Chư Thiên Vạn Giới</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/nhat-luc-pha-chu-thien-van-gioi/chuong-11"
                                               class="hover:underline text-lg" title="Chapter 11">Chapter 11</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/byakuda-no-hanamuko"
                                       title="Byakuda No Hanamuko" class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/byakuda-no-hanamuko-thumb.jpg"
                                            alt="Byakuda No Hanamuko" class="rounded-lg h-[230px] w-full lozad"
                                            itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    39
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/byakuda-no-hanamuko"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Byakuda No Hanamuko</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/byakuda-no-hanamuko/chuong-6"
                                               class="hover:underline text-lg" title="Chapter 6">Chapter 6</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/onna-no-kono-mayu-showa-shiki-maid-kankansho"
                                       title="Onna no Kono Mayu Showa Shiki Maid Kankansho" class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/onna-no-kono-mayu-showa-shiki-maid-kankansho-thumb.jpg"
                                            alt="Onna no Kono Mayu Showa Shiki Maid Kankansho"
                                            class="rounded-lg h-[230px] w-full lozad" itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    99
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/onna-no-kono-mayu-showa-shiki-maid-kankansho"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Onna no Kono Mayu Showa Shiki Maid Kankansho</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/onna-no-kono-mayu-showa-shiki-maid-kankansho/chuong-12"
                                               class="hover:underline text-lg" title="Chapter 12">Chapter 12</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/exorcist-no-kiyoshi-kun"
                                       title="Exorcist No Kiyoshi-Kun" class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/exorcist-no-kiyoshi-kun-thumb.jpg"
                                            alt="Exorcist No Kiyoshi-Kun" class="rounded-lg h-[230px] w-full lozad"
                                            itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    21
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/exorcist-no-kiyoshi-kun"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Exorcist No Kiyoshi-Kun</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/exorcist-no-kiyoshi-kun/chuong-2"
                                               class="hover:underline text-lg" title="Chapter 2">Chapter 2</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/hiep-si-song-vi-ngay-hom-nay"
                                       title="Hiệp Sĩ Sống Vì Ngày Hôm Nay" class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/hiep-si-song-vi-ngay-hom-nay-thumb.jpg"
                                            alt="Hiệp Sĩ Sống Vì Ngày Hôm Nay" class="rounded-lg h-[230px] w-full lozad"
                                            itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    108
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/hiep-si-song-vi-ngay-hom-nay"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]"
                                                  itemprop="name">Hiệp Sĩ Sống Vì Ngày Hôm Nay</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/hiep-si-song-vi-ngay-hom-nay/chuong-19"
                                               class="hover:underline text-lg" title="Chapter 19">Chapter 19</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/tensei-akuma-no-saikyou-yuusha-ikusei-keikaku"
                                       title="Tensei Akuma no Saikyou Yuusha Ikusei Keikaku" class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/tensei-akuma-no-saikyou-yuusha-ikusei-keikaku-thumb.jpg"
                                            alt="Tensei Akuma no Saikyou Yuusha Ikusei Keikaku"
                                            class="rounded-lg h-[230px] w-full lozad" itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    34
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/tensei-akuma-no-saikyou-yuusha-ikusei-keikaku"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Tensei Akuma no Saikyou Yuusha Ikusei Keikaku</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/tensei-akuma-no-saikyou-yuusha-ikusei-keikaku/chuong-4"
                                               class="hover:underline text-lg" title="Chapter 4">Chapter 4</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/fujimi-lovers" title="Fujimi Lovers"
                                       class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/fujimi-lovers-thumb.jpg"
                                            alt="Fujimi Lovers" class="rounded-lg h-[230px] w-full lozad"
                                            itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    158
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/fujimi-lovers"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Fujimi Lovers</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/fujimi-lovers/chuong-12.3"
                                               class="hover:underline text-lg" title="Chapter 12.3">Chapter 12.3</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/kougekiryoku-zero-kara-hajimeru-kenseitan"
                                       title="Kougekiryoku Zero Kara Hajimeru Kenseitan" class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/kougekiryoku-zero-kara-hajimeru-kenseitan-thumb.jpg"
                                            alt="Kougekiryoku Zero Kara Hajimeru Kenseitan"
                                            class="rounded-lg h-[230px] w-full lozad" itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    52
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/kougekiryoku-zero-kara-hajimeru-kenseitan"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Kougekiryoku Zero Kara Hajimeru Kenseitan</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/kougekiryoku-zero-kara-hajimeru-kenseitan/chuong-7"
                                               class="hover:underline text-lg" title="Chapter 7">Chapter 7</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/aisare-tenshina-kurasumeito-ga-ore-ni-dake-itazura-ni-hohoemu"
                                       title="Aisare Tenshina Kurasumeito Ga, Ore Ni Dake Itazura Ni Hohoemu"
                                       class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/aisare-tenshina-kurasumeito-ga-ore-ni-dake-itazura-ni-hohoemu-thumb.jpg"
                                            alt="Aisare Tenshina Kurasumeito Ga, Ore Ni Dake Itazura Ni Hohoemu"
                                            class="rounded-lg h-[230px] w-full lozad" itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    26
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/aisare-tenshina-kurasumeito-ga-ore-ni-dake-itazura-ni-hohoemu"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Aisare Tenshina Kurasumeito Ga, Ore Ni Dake Itazura Ni Hohoemu</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/aisare-tenshina-kurasumeito-ga-ore-ni-dake-itazura-ni-hohoemu/chuong-3"
                                               class="hover:underline text-lg" title="Chapter 3">Chapter 3</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/akanabe-sensei-chang-biet-xau-ho-la-gi"
                                       title="Akanabe-sensei chẳng biết xấu hổ là gì" class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/akanabe-sensei-chang-biet-xau-ho-la-gi-thumb.jpg"
                                            alt="Akanabe-sensei chẳng biết xấu hổ là gì"
                                            class="rounded-lg h-[230px] w-full lozad" itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    101
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/akanabe-sensei-chang-biet-xau-ho-la-gi"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Akanabe-sensei chẳng biết xấu hổ là gì</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/akanabe-sensei-chang-biet-xau-ho-la-gi/chuong-16"
                                               class="hover:underline text-lg" title="Chapter 16">Chapter 16</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/gigantis" title="Gigantis" class="relative">
                                        <img data-src="https://img.otruyenapi.com/uploads/comics/gigantis-thumb.jpg"
                                             alt="Gigantis" class="rounded-lg h-[230px] w-full lozad" itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    126
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/gigantis"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Gigantis</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/gigantis/chuong-18"
                                               class="hover:underline text-lg" title="Chapter 18">Chapter 18</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/ban-gai-nam-tinh-voi-do-am-cao"
                                       title="Bạn gái nam tính với độ ẩm cao" class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/ban-gai-nam-tinh-voi-do-am-cao-thumb.jpg"
                                            alt="Bạn gái nam tính với độ ẩm cao"
                                            class="rounded-lg h-[230px] w-full lozad" itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    94
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/ban-gai-nam-tinh-voi-do-am-cao"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]"
                                                  itemprop="name">Bạn gái nam tính với độ ẩm cao</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/ban-gai-nam-tinh-voi-do-am-cao/chuong-16"
                                               class="hover:underline text-lg" title="Chapter 16">Chapter 16</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/cach-nhau-3-tuoi" title="Cách nhau 3 tuổi"
                                       class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/cach-nhau-3-tuoi-thumb.jpg"
                                            alt="Cách nhau 3 tuổi" class="rounded-lg h-[230px] w-full lozad"
                                            itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    85
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/cach-nhau-3-tuoi"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Cách nhau 3 tuổi</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/cach-nhau-3-tuoi/chuong-14"
                                               class="hover:underline text-lg" title="Chapter 14">Chapter 14</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/furitsumore-kodoku-na-shi-yo"
                                       title="Furitsumore Kodoku na Shi yo" class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/furitsumore-kodoku-na-shi-yo-thumb.jpg"
                                            alt="Furitsumore Kodoku na Shi yo" class="rounded-lg h-[230px] w-full lozad"
                                            itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    77
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/furitsumore-kodoku-na-shi-yo"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]"
                                                  itemprop="name">Furitsumore Kodoku na Shi yo</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/furitsumore-kodoku-na-shi-yo/chuong-13"
                                               class="hover:underline text-lg" title="Chapter 13">Chapter 13</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/hoa-tra-doi-xuan-no-yeu-thuong"
                                       title="Hoa Trà Đợi Xuân Nở Yêu Thương" class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/hoa-tra-doi-xuan-no-yeu-thuong-thumb.jpg"
                                            alt="Hoa Trà Đợi Xuân Nở Yêu Thương"
                                            class="rounded-lg h-[230px] w-full lozad" itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    76
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/hoa-tra-doi-xuan-no-yeu-thuong"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]"
                                                  itemprop="name">Hoa Trà Đợi Xuân Nở Yêu Thương</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/hoa-tra-doi-xuan-no-yeu-thuong/chuong-12"
                                               class="hover:underline text-lg" title="Chapter 12">Chapter 12</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/misato-co-hoi-lanh-lung-voi-nguoi-sep-cua-co-ay"
                                       title="Misato Có Hơi Lạnh Lùng Với Người Sếp Của Cô Ấy" class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/misato-co-hoi-lanh-lung-voi-nguoi-sep-cua-co-ay-thumb.jpg"
                                            alt="Misato Có Hơi Lạnh Lùng Với Người Sếp Của Cô Ấy"
                                            class="rounded-lg h-[230px] w-full lozad" itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    42
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/misato-co-hoi-lanh-lung-voi-nguoi-sep-cua-co-ay"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Misato Có Hơi Lạnh Lùng Với Người Sếp Của Cô Ấy</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/misato-co-hoi-lanh-lung-voi-nguoi-sep-cua-co-ay/chuong-6"
                                               class="hover:underline text-lg" title="Chapter 6">Chapter 6</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/sau-khi-chuyen-sang-hoc-online-toi-danh-phai-chuyen-sang-song-chung-voi-co-nang-xinh-dep-nhat-lop"
                                       title="Sau Khi Chuyển Sang Học Online, Tôi Đành Phải Chuyển Sang Sống Chung Với Cô Nàng Xinh Đẹp Nhất Lớp"
                                       class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/sau-khi-chuyen-sang-hoc-online-toi-danh-phai-chuyen-sang-song-chung-voi-co-nang-xinh-dep-nhat-lop-thumb.jpg"
                                            alt="Sau Khi Chuyển Sang Học Online, Tôi Đành Phải Chuyển Sang Sống Chung Với Cô Nàng Xinh Đẹp Nhất Lớp"
                                            class="rounded-lg h-[230px] w-full lozad" itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    31
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/sau-khi-chuyen-sang-hoc-online-toi-danh-phai-chuyen-sang-song-chung-voi-co-nang-xinh-dep-nhat-lop"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Sau Khi Chuyển Sang Học Online, Tôi Đành Phải Chuyển Sang Sống Chung Với Cô Nàng Xinh Đẹp Nhất Lớp</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/sau-khi-chuyen-sang-hoc-online-toi-danh-phai-chuyen-sang-song-chung-voi-co-nang-xinh-dep-nhat-lop/chuong-4"
                                               class="hover:underline text-lg" title="Chapter 4">Chapter 4</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/tam-giac-bac" title="Tam Giác Bạc"
                                       class="relative">
                                        <img data-src="https://img.otruyenapi.com/uploads/comics/tam-giac-bac-thumb.jpg"
                                             alt="Tam Giác Bạc" class="rounded-lg h-[230px] w-full lozad"
                                             itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    107
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/tam-giac-bac"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Tam Giác Bạc</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/tam-giac-bac/chuong-19"
                                               class="hover:underline text-lg" title="Chapter 19">Chapter 19</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/truy-lac" title="Truỵ Lạc" class="relative">
                                        <img data-src="https://img.otruyenapi.com/uploads/comics/truy-lac-thumb.jpg"
                                             alt="Truỵ Lạc" class="rounded-lg h-[230px] w-full lozad" itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    80
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/truy-lac"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Truỵ Lạc</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/truy-lac/chuong-12"
                                               class="hover:underline text-lg" title="Chapter 12">Chapter 12</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/valkyria-nainen-kikan"
                                       title="Valkyria Nainen Kikan" class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/valkyria-nainen-kikan-thumb.jpg"
                                            alt="Valkyria Nainen Kikan" class="rounded-lg h-[230px] w-full lozad"
                                            itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    84
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/valkyria-nainen-kikan"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Valkyria Nainen Kikan</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/valkyria-nainen-kikan/chuong-13"
                                               class="hover:underline text-lg" title="Chapter 13">Chapter 13</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div>
                                    <a href="https://demo.nqtcomics.site/bi-mat-cua-co-vo-gyaru"
                                       title="Bí mật của cô vợ Gyaru" class="relative">
                                        <img
                                            data-src="https://img.otruyenapi.com/uploads/comics/bi-mat-cua-co-vo-gyaru-thumb.jpg"
                                            alt="Bí mật của cô vợ Gyaru" class="rounded-lg h-[230px] w-full lozad"
                                            itemprop="image">
                                        <span
                                            class="absolute bottom-0 left-0 bg-primary px-[5px] py-[3px] text-xs text-white rounded-bl-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                    </svg>
                                    125
                                </span>
                                    </a>
                                    <h3 class="line-clamp-3 mb-2 mt-1">
                                        <a href="https://demo.nqtcomics.site/bi-mat-cua-co-vo-gyaru"
                                           class="block text-white hover:text-primary w-full text-base leading-[1.25] font-semibold"
                                           itemprop="url">
                                            <span class="text-[1.5rem]" itemprop="name">Bí mật của cô vợ Gyaru</span>
                                        </a>
                                    </h3>
                                    <ul>
                                        <li class="mb-1 text-[#ccc] flex justify-between items-center">
                                            <a href="https://demo.nqtcomics.site/bi-mat-cua-co-vo-gyaru/chuong-19"
                                               class="hover:underline text-lg" title="Chapter 19">Chapter 19</a>
                                            <i class="text-lg text-[#ccc]">1 tháng trước</i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="mt-10">
                            <nav>
                                <ul class="pagination">

                                    <li class="page-item disabled" aria-disabled="true" aria-label="&laquo; Previous">
                                        <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                    </li>


                                    <li class="page-item active" aria-current="page"><span class="page-link">1</span>
                                    </li>
                                    <li class="page-item"><a class="page-link"
                                                             href="https://demo.nqtcomics.site/tim-kiem-nang-cao?page=2">2</a>
                                    </li>


                                    <li class="page-item">
                                        <a class="page-link" href="https://demo.nqtcomics.site/tim-kiem-nang-cao?page=2"
                                           rel="next" aria-label="Next &raquo;">&rsaquo;</a>
                                    </li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                    <div class="col-span-1 hidden lg:block">
                        <div class="h-max border border-solid border-[#ccc] p-3">
                            <div class="w-full mb-5"><h3 class="font-medium text-3xl text-primary">THỂ LOẠI</h3>
                                <hr>
                            </div>
                            <ul class="flex flex-wrap">
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/comedy"
                                       class="hover:text-primary capitalize">Comedy</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/ecchi"
                                       class="hover:text-primary capitalize">Ecchi</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/manga"
                                       class="hover:text-primary capitalize">Manga</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/action"
                                       class="hover:text-primary capitalize">Action</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/manhwa"
                                       class="hover:text-primary capitalize">Manhwa</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/truyen-mau"
                                       class="hover:text-primary capitalize">Truyện Màu</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/adventure"
                                       class="hover:text-primary capitalize">Adventure</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/fantasy"
                                       class="hover:text-primary capitalize">Fantasy</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/supernatural"
                                       class="hover:text-primary capitalize">Supernatural</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/harem"
                                       class="hover:text-primary capitalize">Harem</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/seinen"
                                       class="hover:text-primary capitalize">Seinen</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/romance"
                                       class="hover:text-primary capitalize">Romance</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/school-life"
                                       class="hover:text-primary capitalize">School Life</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/slice-of-life"
                                       class="hover:text-primary capitalize">Slice of Life</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/drama"
                                       class="hover:text-primary capitalize">Drama</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/sci-fi"
                                       class="hover:text-primary capitalize">Sci-fi</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/chuyen-sinh"
                                       class="hover:text-primary capitalize">Chuyển Sinh</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/mystery"
                                       class="hover:text-primary capitalize">Mystery</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/trinh-tham"
                                       class="hover:text-primary capitalize">Trinh Thám</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/sports"
                                       class="hover:text-primary capitalize">Sports</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/mecha"
                                       class="hover:text-primary capitalize">Mecha</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/shounen"
                                       class="hover:text-primary capitalize">Shounen</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/historical"
                                       class="hover:text-primary capitalize">Historical</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/josei"
                                       class="hover:text-primary capitalize">Josei</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/shoujo"
                                       class="hover:text-primary capitalize">Shoujo</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/horror"
                                       class="hover:text-primary capitalize">Horror</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/manhua"
                                       class="hover:text-primary capitalize">Manhua</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/webtoon"
                                       class="hover:text-primary capitalize">Webtoon</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/ngon-tinh"
                                       class="hover:text-primary capitalize">Ngôn Tình</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/soft-yuri"
                                       class="hover:text-primary capitalize">Soft Yuri</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/psychological"
                                       class="hover:text-primary capitalize">Psychological</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/mature"
                                       class="hover:text-primary capitalize">Mature</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/tragedy"
                                       class="hover:text-primary capitalize">Tragedy</a>
                                </li>
                                <li class="w-[50%] border-b border-solid border-[#ccc] py-[10px] px-[5px] text-white">
                                    <a href="https://demo.nqtcomics.site/the-loai/xuyen-khong"
                                       class="hover:text-primary capitalize">Xuyên Không</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('styles')
    <style>
        .pagination {
            display: flex;
            color: #fff;
            flex-wrap: wrap;
            gap: 10px;
        }

        .page-item {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 35px;
            height: 30px;
            background-color: #333;
            border-radius: 5px;
        }

        .page-item.active {
            background-color: rgb(244 63 94 / 1);
        }
    </style>
@endpush
@push('scripts')
    <script>
        $(document).ready(function () {
            let urlParam = new URLSearchParams(window.location.search);
            if (urlParam.has('status')) {
                const status = urlParam.get('status');
                $('a[data-status="' + status + '"]').addClass('bg-primary');
            }
            if (urlParam.has('sort')) {
                const sort = urlParam.get('sort');
                $('a[data-sort="' + sort + '"]').addClass('bg-primary');
            }
            if (urlParam.has('category')) {
                const category = urlParam.get('category');
                $('a[data-category="' + category + '"]').addClass('text-primary');
            }
        });
    </script>
@endpush



