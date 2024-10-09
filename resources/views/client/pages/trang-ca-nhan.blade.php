@extends('client.layouts.app')
@section('content')
    <main class="overflow-x-hidden" style="margin-top: 100px">
        <div class="pt-5 mx-auto w-full max-w-[1200px]">
            <div class="flex flex-col md:flex-row gap-5">
                <style>
                    .progress-bar {
                        display: block;
                        height: 100%;
                        background: linear-gradient(90deg, #ffd33d, #ea4aaa 17%, #b34bff 34%, #01feff 51%, #ffd33d 68%, #ea4aaa 85%, #b34bff);
                        background-size: 300% 100%;
                        -webkit-animation: progress-animation 2s linear infinite;
                        animation: progress-animation 2s linear infinite;
                        text-align: center;
                        line-height: 15px;
                    }

                    @keyframes progress-animation {
                        0% {
                            background-position: 100%;
                        }
                        100% {
                            background-position: 0;
                        }
                    }

                    .tab-content {
                        display: none;
                    }

                    .tab-content.active {
                        display: block;
                    }
                </style>

                <div class="w-full md:w-1/3 px-3 md:p-0">
                    <div class="bg-[#222] px-5 py-10 rounded-lg shadow-md text-white">
                        <div class="flex items-center gap-5">
                            <img
                                src="https://lh3.googleusercontent.com/a/ACg8ocIUyCnzgFGr4r4Zgu-CWeb2kT1TOu9g8p---59YvHDij-fFvCSh=s96-c"
                                alt="avatar" class="w-16 h-16 rounded-full bg-gray-300">
                            <div class="flex-1 w-full">
                                <h1 class="text-4xl font-semibold">Nguyen Quang Son (FPL HN)</h1>
                                <div>
                                    <div class="flex items-center justify-between text-xl mb-1">
                                        <span>Cấp 1</span>
                                        <span>Cấp 2</span>
                                    </div>
                                    <div class="relative w-full bg-gray-200 rounded text-white h-6">
                                        <div class="absolute left-0 top-0 h-6 rounded progress-bar"
                                             style="width:10%"></div>
                                        <span
                                            class="absolute left-0 top-0 h-6 flex items-center justify-center w-full text-black text-xs">10%</span>
                                    </div>
                                </div>
                                <p class="text-gray-500 mt-2">Thời hạn Premium còn <span class="text-primary">0</span>
                                    ngày</p>
                            </div>
                        </div>
                        <ul class="mt-5 text-[18px]">
                            <li class="py-4 px-3 border-l-[3px] border-[#ee2c74]">
                                <a href="#" class="flex items-center gap-3" onclick="showTab('personalInfo')">
                                    <span>Thông tin cá nhân</span>
                                </a>
                            </li>
                            <li class="py-4 px-3">
                                <a href="#" class="flex items-center gap-3" onclick="showTab('following')">
                                    <span>Theo dõi</span>
                                </a>
                            </li>
                            <li class="py-4 px-3">
                                <a href="#" class="flex items-center gap-3" onclick="showTab('readingHistory')">
                                    <span>Lịch sử đọc</span>
                                </a>
                            </li>
                            <li class="py-4 px-3">
                                <a href="#" class="flex items-center gap-3" onclick="showTab('premium')">
                                    <span>Premium</span>
                                </a>
                            </li>
                            <li class="py-4 px-3">
                                <a href="#" class="flex items-center gap-3" onclick="showTab('changePassword')">
                                    <span>Đổi mật khẩu</span>
                                </a>
                            </li>
                            <li class="py-4 px-3">
                                <a href="{{ route('dang-nhap') }}" class="flex items-center gap-3" onclick="showTab('logout')">
                                    <span>Đăng xuất</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="w-full md:w-2/3 px-3 md:p-0 mb-40">
                    <div id="personalInfo" class="tab-content active">
                        <div class="bg-[#222] text-white px-5 py-10 rounded-lg shadow-md">
                            <h1 class="text-3xl font-semibold">Thông tin cá nhân</h1>
                            <div class="mt-5">
                                <div class="flex flex-col items-center justify-center mb-4">
                                    <img
                                        src="https://lh3.googleusercontent.com/a/ACg8ocIUyCnzgFGr4r4Zgu-CWeb2kT1TOu9g8p---59YvHDij-fFvCSh=s96-c"
                                        alt="avatar" class="w-16 h-16 rounded-full bg-gray-300">
                                    <input id="avatar" accept="image/*" type="file">
                                    <span class="text-red-500">Avatar tục tĩu sẽ bị khóa vĩnh viễn</span>
                                </div>
                                <div class="flex items-center gap-5 mb-4">
                                    <div class="w-1/3"><p class="text-gray-500">Email</p></div>
                                    <div class="w-2/3">
                                        <input
                                            class="bg-transparent py-3 rounded-md focus:outline-none w-full focus:border-blue-300 px-3"
                                            type="email" disabled value="sonnqph33526@fpt.edu.vn">
                                    </div>
                                </div>
                                <div class="flex items-center gap-5 mb-4">
                                    <div class="w-1/3"><p class="text-gray-500">Họ và tên</p></div>
                                    <div class="w-2/3">
                                        <input id="name"
                                               class="bg-transparent border border-solid py-3 border-[#ccc] rounded-md focus:outline-none w-full focus:border-blue-300 px-3"
                                               type="text" value="Nguyen Quang Son (FPL HN)">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button
                                        class="rounded bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 p-button p-component btn-submit">
                                        Cập nhật
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="following" class="tab-content">

                        <div class="bg-[#222] px-5 py-10 rounded-lg shadow-md text-white">
                            <h1 class="text-4xl font-semibold mb-5 uppercase">Truyện đang theo dõi</h1>
                            <div class="mb-[20px] w-full overflow-auto min-h-0">
                                <table
                                    class="border-b border-[#e6e6e6] w-full max-w-full text-[14px] border-spacing-0 border-collapse">
                                    <thead>
                                    <tr>
                                        <th class="p-[.75rem] align-bottom border-b-[2px] border-b-[#eceeef] uppercase border-t-[2px] border-t-[#ee2c74] bg-[#222] text-white whitespace-nowrap text-left"></th>
                                        <th class="p-[.75rem] align-bottom border-b-[2px] border-b-[#eceeef] uppercase border-t-[2px] border-t-[#ee2c74] bg-[#222] text-white whitespace-nowrap text-left">
                                            Tên truyện
                                        </th>
                                        <th class="p-[.75rem] align-bottom border-b-[2px] border-b-[#eceeef] uppercase border-t-[2px] border-t-[#ee2c74] bg-[#222] text-white whitespace-nowrap text-left">
                                            Xem gần nhất
                                        </th>
                                        <th class="p-[.75rem] align-bottom border-b-[2px] border-b-[#eceeef] uppercase border-t-[2px] border-t-[#ee2c74] bg-[#222] text-white whitespace-nowrap text-left">
                                            Chap mới nhất
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <a class="block w-[50px] min-h-[50px] overflow-hidden leading-[50px]"
                                               href="https://demo.nqtcomics.site/mairimashita-iruma-kun-if-episode-of-mafia">
                                                <img class="lozad" alt="Mairimashita! Iruma-kun: IF Episode of MAFIA"
                                                     src="{{ asset('assets/client/images/banner/mairimashita-iruma-kun-if-episode-of-mafia-thumb.jpg')}}">
                                            </a>
                                        </td>
                                        <td>
                                            <a class="text-[16px] font-bold hover:text-orangecus"
                                               href="https://demo.nqtcomics.site/mairimashita-iruma-kun-if-episode-of-mafia">Mairimashita!
                                                Iruma-kun: IF Episode of MAFIA</a>
                                            <div class="text-[13px]">
                                                <button class="text-red-500 btn-unfollow" data-type="comic"
                                                        data-id="63">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-x inline-block"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                                    </svg>
                                                    <span>Bỏ theo dõi</span>
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                        </td>
                                        <td class="whitespace-nowrap">
                                            <a href="https://demo.nqtcomics.site/mairimashita-iruma-kun-if-episode-of-mafia/chuong-11"
                                               class="text-[13px]" title="Chương 11"> Chương 11 <br>
                                                <time
                                                    class="float-none text-[12px] text-[#999] leading-[20px] italic max-w-[47%] whitespace-nowrap overflow-hidden">
                                                    2 tuần trước
                                                </time>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="block w-[50px] min-h-[50px] overflow-hidden leading-[50px]"
                                               href="https://demo.nqtcomics.site/vua-can-sa">
                                                <img class="lozad" alt="Vua Cần Sa"
                                                     src="{{ asset('assets/client/images/banner/vua-can-sa-thumb.jpg')}}">
                                            </a>
                                        </td>
                                        <td>
                                            <a class="text-[16px] font-bold hover:text-orangecus"
                                               href="https://demo.nqtcomics.site/vua-can-sa">Vua Cần Sa</a>
                                            <div class="text-[13px]">
                                                <button class="text-red-500 btn-unfollow" data-type="comic"
                                                        data-id="68">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-x inline-block"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                                    </svg>
                                                    <span>Bỏ theo dõi</span>
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="https://demo.nqtcomics.site/vua-can-sa/chuong-1"
                                               class="text-[13px]" title="Chương 1">Chương 1 </a>
                                        </td>
                                        <td class="whitespace-nowrap">
                                            <a href="https://demo.nqtcomics.site/vua-can-sa/chuong-19"
                                               class="text-[13px]" title="Chương 19"> Chương 19 <br>
                                                <time
                                                    class="float-none text-[12px] text-[#999] leading-[20px] italic max-w-[47%] whitespace-nowrap overflow-hidden">
                                                    2 tuần trước
                                                </time>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="mt-2">

                                </div>
                            </div>
                        </div>
                    </div>


                    <div id="readingHistory" class="tab-content">
                        <div class="bg-[#222] px-5 py-10 rounded-lg shadow-md text-white">
                            <h1 class="text-4xl font-semibold mb-5 uppercase">Lịch sử đọc</h1>
                            <div class="mb-[20px] w-full overflow-auto min-h-0">
                                <table
                                    class="border-b border-[#e6e6e6] w-full max-w-full text-[14px] border-spacing-0 border-collapse">
                                    <thead>
                                    <tr>
                                        <th class="p-[.75rem] align-bottom border-b-[2px] border-b-[#eceeef] uppercase border-t-[2px] border-t-[#ee2c74] bg-[#222] text-white whitespace-nowrap text-left"></th>
                                        <th class="p-[.75rem] align-bottom border-b-[2px] border-b-[#eceeef] uppercase border-t-[2px] border-t-[#ee2c74] bg-[#222] text-white whitespace-nowrap text-left">
                                            Tên truyện
                                        </th>
                                        <th class="p-[.75rem] align-bottom border-b-[2px] border-b-[#eceeef] uppercase border-t-[2px] border-t-[#ee2c74] bg-[#222] text-white whitespace-nowrap text-left">
                                            Xem gần nhất
                                        </th>
                                        <th class="p-[.75rem] align-bottom border-b-[2px] border-b-[#eceeef] uppercase border-t-[2px] border-t-[#ee2c74] bg-[#222] text-white whitespace-nowrap text-left">
                                            Chap mới nhất
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <a class="block w-[50px] min-h-[50px] overflow-hidden leading-[50px]"
                                               href="https://demo.nqtcomics.site/vua-can-sa">
                                                <img class="lozad" alt="Vua Cần Sa"
                                                     src="{{ asset('assets/client/images/banner/vua-can-sa-thumb.jpg')}}">
                                            </a>
                                        </td>
                                        <td>
                                            <a class="text-[16px] font-bold hover:text-orangecus"
                                               href="https://demo.nqtcomics.site/vua-can-sa">Vua Cần Sa</a>
                                            <div class="text-[13px]">
                                                <button class="text-red-500 btn-remove" data-type="comic" data-id="68">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-x inline-block"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                                    </svg>
                                                    <span>Xóa lịch sử</span>
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="https://demo.nqtcomics.site/vua-can-sa/chuong-1"
                                               class="text-[13px]" title="Chương 1">Chương 1 </a>
                                        </td>
                                        <td class="whitespace-nowrap">
                                            <a href="https://demo.nqtcomics.site/vua-can-sa/chuong-19"
                                               class="text-[13px]" title="Chương 19"> Chương 19 <br>
                                                <time
                                                    class="float-none text-[12px] text-[#999] leading-[20px] italic max-w-[47%] whitespace-nowrap overflow-hidden">
                                                    2 tuần trước
                                                </time>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="block w-[50px] min-h-[50px] overflow-hidden leading-[50px]"
                                               href="https://demo.nqtcomics.site/heart-gear">
                                                <img class="lozad" alt="Heart Gear"
                                                     src="{{ asset('assets/client/images/banner/heart-gear-thumb.jpg')}}">
                                            </a>
                                        </td>
                                        <td>
                                            <a class="text-[16px] font-bold hover:text-orangecus"
                                               href="https://demo.nqtcomics.site/heart-gear">Heart Gear</a>
                                            <div class="text-[13px]">
                                                <button class="text-red-500 btn-remove" data-type="comic" data-id="64">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-x inline-block"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                                    </svg>
                                                    <span>Xóa lịch sử</span>
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="https://demo.nqtcomics.site/heart-gear/chuong-1"
                                               class="text-[13px]" title="Chương 1">Chương 1 </a>
                                        </td>
                                        <td class="whitespace-nowrap">
                                            <a href="https://demo.nqtcomics.site/heart-gear/chuong-8"
                                               class="text-[13px]" title="Chương 8"> Chương 8 <br>
                                                <time
                                                    class="float-none text-[12px] text-[#999] leading-[20px] italic max-w-[47%] whitespace-nowrap overflow-hidden">
                                                    2 tuần trước
                                                </time>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="block w-[50px] min-h-[50px] overflow-hidden leading-[50px]"
                                               href="https://demo.nqtcomics.site/fujimi-lovers">
                                                <img class="lozad" alt="Fujimi Lovers"
                                                     src="{{ asset('assets/client/images/banner/fujimi-lovers-thumb.jpg')}}">
                                            </a>
                                        </td>
                                        <td>
                                            <a class="text-[16px] font-bold hover:text-orangecus"
                                               href="https://demo.nqtcomics.site/fujimi-lovers">Fujimi Lovers</a>
                                            <div class="text-[13px]">
                                                <button class="text-red-500 btn-remove" data-type="comic" data-id="47">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-x inline-block"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                                    </svg>
                                                    <span>Xóa lịch sử</span>
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="https://demo.nqtcomics.site/fujimi-lovers/chuong-1"
                                               class="text-[13px]" title="Chương 1">Chương 1 </a>
                                        </td>
                                        <td class="whitespace-nowrap">
                                            <a href="https://demo.nqtcomics.site/fujimi-lovers/chuong-12.3"
                                               class="text-[13px]" title="Chương 12.3"> Chương 12.3 <br>
                                                <time
                                                    class="float-none text-[12px] text-[#999] leading-[20px] italic max-w-[47%] whitespace-nowrap overflow-hidden">
                                                    2 tuần trước
                                                </time>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="mt-2">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="premium" class="tab-content">
                        <div class="bg-[#222] text-white px-5 py-10 rounded-lg shadow-md">
                            <div class=" w-full rounded-3xl ring-1 ring-[#ee2c74] lg:flex">
                                <div class="p-8 sm:p-10 lg:flex-auto">
                                    <h3 class="text-4xl font-bold tracking-tight text-white">Premium 1 tháng</h3>
                                    <div class="mt-10 flex items-center gap-x-4">
                                        <h4 class="flex-none text-md font-semibold leading-6 text-indigo-600">Bao
                                            gồm</h4>
                                        <div class="h-px flex-auto bg-gray-100"></div>
                                    </div>
                                    <ul role="list"
                                        class="mt-8 grid grid-cols-1 gap-4 text-md leading-6 text-white sm:gap-6">
                                        <li class="flex gap-x-3">
                                            <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20"
                                                 fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                      d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                            Truy cập và đọc tất cả các chapter
                                        </li>
                                    </ul>
                                </div>
                                <div class="-mt-2 p-2 lg:mt-0 lg:w-full lg:max-w-md lg:flex-shrink-0">
                                    <div
                                        class="rounded-2xl bg-gray-50 py-10 text-center ring-1 ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center lg:py-16">
                                        <div class="mx-auto max-w-sm px-8">
                                            <p class="mt-6 flex items-baseline justify-center gap-x-2">
                                                <span
                                                    class="text-5xl font-bold tracking-tight text-gray-900">100.000₫</span>
                                                <span
                                                    class="text-sm font-semibold leading-6 tracking-wide text-gray-600">/ 1 tháng</span>
                                            </p>
                                            <a href="chuyen-khoan.html"
                                               class="mt-10 block w-full rounded-md bg-indigo-600 px-5 py-4 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Mua
                                                ngay</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" w-full rounded-3xl ring-1 ring-[#ee2c74] lg:flex mt-10">
                                <div class="p-8 sm:p-10 lg:flex-auto">
                                    <h3 class="text-4xl font-bold tracking-tight text-white">Premium 3 tháng</h3>
                                    <div class="mt-10 flex items-center gap-x-4">
                                        <h4 class="flex-none text-md font-semibold leading-6 text-indigo-600">Bao
                                            gồm</h4>
                                        <div class="h-px flex-auto bg-gray-100"></div>
                                    </div>
                                    <ul role="list"
                                        class="mt-8 grid grid-cols-1 gap-4 text-md leading-6 text-white sm:gap-6">
                                        <li class="flex gap-x-3">
                                            <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20"
                                                 fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                      d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                            Truy cập và đọc tất cả các chapter
                                        </li>
                                    </ul>
                                </div>
                                <div class="-mt-2 p-2 lg:mt-0 lg:w-full lg:max-w-md lg:flex-shrink-0">
                                    <div
                                        class="rounded-2xl bg-gray-50 py-10 text-center ring-1 ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center lg:py-16">
                                        <div class="mx-auto max-w-sm px-8">
                                            <p class="mt-6 flex items-baseline justify-center gap-x-2">
                                                <span
                                                    class="text-5xl font-bold tracking-tight text-gray-900">250.000₫</span>
                                                <span
                                                    class="text-sm font-semibold leading-6 tracking-wide text-gray-600">/ 3 tháng</span>
                                            </p>
                                            <a href="chuyen-khoan.html"
                                               class="mt-10 block w-full rounded-md bg-indigo-600 px-5 py-4 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Mua
                                                ngay</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" w-full rounded-3xl ring-1 ring-[#ee2c74] lg:flex mt-10">
                                <div class="p-8 sm:p-10 lg:flex-auto">
                                    <h3 class="text-4xl font-bold tracking-tight text-white">Premium 6 tháng</h3>
                                    <div class="mt-10 flex items-center gap-x-4">
                                        <h4 class="flex-none text-md font-semibold leading-6 text-indigo-600">Bao
                                            gồm</h4>
                                        <div class="h-px flex-auto bg-gray-100"></div>
                                    </div>
                                    <ul role="list"
                                        class="mt-8 grid grid-cols-1 gap-4 text-md leading-6 text-white sm:gap-6">
                                        <li class="flex gap-x-3">
                                            <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20"
                                                 fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                      d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                            Truy cập và đọc tất cả các chapter
                                        </li>
                                    </ul>
                                </div>
                                <div class="-mt-2 p-2 lg:mt-0 lg:w-full lg:max-w-md lg:flex-shrink-0">
                                    <div
                                        class="rounded-2xl bg-gray-50 py-10 text-center ring-1 ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center lg:py-16">
                                        <div class="mx-auto max-w-sm px-8">
                                            <p class="mt-6 flex items-baseline justify-center gap-x-2">
                                                <span
                                                    class="text-5xl font-bold tracking-tight text-gray-900">500.000₫</span>
                                                <span
                                                    class="text-sm font-semibold leading-6 tracking-wide text-gray-600">/ 6 tháng</span>
                                            </p>
                                            <a href="https://demo.nqtcomics.site/chuyen-khoan?month=6"
                                               class="mt-10 block w-full rounded-md bg-indigo-600 px-5 py-4 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Mua
                                                ngay</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" w-full rounded-3xl ring-1 ring-[#ee2c74] lg:flex mt-10">
                                <div class="p-8 sm:p-10 lg:flex-auto">
                                    <h3 class="text-4xl font-bold tracking-tight text-white">Premium 12 tháng</h3>
                                    <div class="mt-10 flex items-center gap-x-4">
                                        <h4 class="flex-none text-md font-semibold leading-6 text-indigo-600">Bao
                                            gồm</h4>
                                        <div class="h-px flex-auto bg-gray-100"></div>
                                    </div>
                                    <ul role="list"
                                        class="mt-8 grid grid-cols-1 gap-4 text-md leading-6 text-white sm:gap-6">
                                        <li class="flex gap-x-3">
                                            <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20"
                                                 fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                      d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                            Truy cập và đọc tất cả các chapter
                                        </li>
                                    </ul>
                                </div>
                                <div class="-mt-2 p-2 lg:mt-0 lg:w-full lg:max-w-md lg:flex-shrink-0">
                                    <div
                                        class="rounded-2xl bg-gray-50 py-10 text-center ring-1 ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center lg:py-16">
                                        <div class="mx-auto max-w-sm px-8">
                                            <p class="mt-6 flex items-baseline justify-center gap-x-2">
                                                <span
                                                    class="text-5xl font-bold tracking-tight text-gray-900">1.000.000₫</span>
                                                <span
                                                    class="text-sm font-semibold leading-6 tracking-wide text-gray-600">/ 12 tháng</span>
                                            </p>
                                            <a href="https://demo.nqtcomics.site/chuyen-khoan?month=12"
                                               class="mt-10 block w-full rounded-md bg-indigo-600 px-5 py-4 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Mua
                                                ngay</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="changePassword" class="tab-content">
                        <div class="bg-[#222] px-5 py-10 rounded-lg shadow-md text-white">
                            <h1 class="text-3xl font-semibold">Đổi mật khẩu</h1>
                            <div class="mt-5">
                                <div class="flex items-center gap-5 mb-4">
                                    <div class="w-1/3"><p class="text-gray-500">Mật khẩu mới</p></div>
                                    <div class="w-2/3">
                                        <input id="newPass"
                                               class="bg-transparent border border-solid border-[#ccc] py-3 rounded-md focus:outline-none w-full focus:border-blue-300 px-3"
                                               type="text" value="">
                                    </div>
                                </div>
                                <div class="flex items-center gap-5 mb-4">
                                    <div class="w-1/3"><p class="text-gray-500">Nhập lại mật khẩu mới</p></div>
                                    <div class="w-2/3">
                                        <input id="confirmPass"
                                               class="bg-transparent border border-solid border-[#ccc] py-3 rounded-md focus:outline-none w-full focus:border-blue-300 px-3"
                                               type="password" value="">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button
                                        class="rounded bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 p-button p-component btn-submit"
                                        data-pc-name="button" data-pc-section="root">Cập nhật
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="logout" class="tab-content">
                        <h1>Đăng xuất Content Here</h1>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        $('.btn-submit').click(function () {
            let name = $('#name').val();
            let avatar = $('#avatar')[0].files[0];
            let formData = new FormData();
            formData.append('name', name);
            formData.append('avatar', avatar);
            formData.append('_token', 'UjUpA2pEDBgbqx3LSKxfC1nDfETadhNqQrqy42iM');
            $.ajax({
                url: 'https://demo.nqtcomics.site/update-profile',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                    alert(data.message);
                    window.location.reload();
                }
            });
        });
    </script>
@endpush
