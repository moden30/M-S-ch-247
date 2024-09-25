@extends('client.layout.docsach')

@section('conten')
<style>
    .mce-toolbar-grp {
        background-color: #fff !important
    }

    .mce-btn-group .mce-btn {
        margin: 1px !important;
        background-color: transparent;
        float: left;
        border: solid 1px #ccc !important
    }

    .mce-grid {
        white-space: normal !important
    }

    .mce-grid a {
        display: inline-block !important;
        cursor: pointer !important
    }

    .mce-content-body {
        font-size: 14px
    }

    .mce-ico {
        height: 30px !important;
        line-height: 30px !important;
        background-repeat: no-repeat !important
    }

    .mce-listbox>button {
        padding: 10px 27px 10px 10px !important
    }

    .mce-ico.mce-i-emobabysoldier {
        background: url(../assets/images/emo/babysoldier.gif) no-repeat;
        height: 30px;
        width: 30px
    }

    .mce-ico.mce-i-emoonion {
        background: url(../assets/images/emo/onion.gif) no-repeat;
        height: 30px;
        width: 30px
    }

    .mce-ico.mce-i-emobafu {
        background: url(../assets/images/emo/bafu.gif) no-repeat;
        height: 30px;
        width: 30px
    }

    .mce-ico.mce-i-emothobua {
        background: url(../assets/images/emo/thobua.gif) no-repeat;
        height: 30px;
        width: 30px
    }

    .mce-ico.mce-i-emothotuzki {
        background: url(../assets/images/emo/thotuzki.gif) no-repeat;
        height: 30px;
        width: 30px
    }

    .mce-ico.mce-i-emoyoyo {
        background: url(../assets/images/emo/yoyo.gif) no-repeat;
        height: 30px;
        width: 30px
    }

    .mce-ico.mce-i-emopanda {
        background: url(../assets/images/emo/panda.gif) no-repeat;
        height: 30px;
        width: 30px
    }

    .mce-ico.mce-i-emotrollface {
        background: url(../assets/images/emo/trollface.png) no-repeat;
        height: 30px;
        width: 30px
    }

    .mce-ico.mce-i-emoyahoo {
        background: url(../assets/images/emo/yahoo.html) center center no-repeat;
        height: 30px;
        width: 17px
    }

    .mce-ico.mce-i-emogif {
        background: url(../assets/images/emo/gif.gif) no-repeat;
        height: 30px;
        width: 30px
    }

    .mce-floatpanel.mce-popover.mce-bottom.mce-start {
        width: 70% !important;
        height: 300px !important;
        overflow-x: hidden;
        left: 80% !important;
        overflow-y: scroll;
        max-width: 300px !important;
    }

    @media(max-width: 1450px) {
        .mce-floatpanel.mce-popover.mce-bottom.mce-start {
            left: 70% !important;
        }
    }

    @media(max-width: 768px) {
        .mce-floatpanel.mce-popover.mce-bottom.mce-start {
            left: 50% !important;
        }
    }

    @media(max-width: 500px) {
        .mce-floatpanel.mce-popover.mce-bottom.mce-start {
            left: 20% !important;
        }
    }
</style>
<style>
    #box-eppisodes::-webkit-scrollbar {
        width: 5px;
    }

    #box-eppisodes::-webkit-scrollbar-thumb {
        background: #f43f5e;
        border-radius: 5px;
    }

    .collapseActive .sidebar {
        width: 0 !important;
        padding: 0 !important;
        display: none;
    }

    #content-img {
        margin-left: 255px;
        width: calc(100% - 255px);
    }

    .collapseActive #content-img {
        width: 100%;
        margin-left: 0 !important;
    }

    .sideright::-webkit-scrollbar {
        width: 10px;
    }

    .sideright::-webkit-scrollbar-thumb {
        background: #555;
        border-radius: 5px;
    }

    .sideright::-webkit-scrollbar-track {
        background: #333;
    }

    .sideright::-webkit-scrollbar-thumb:hover {
        background: #0f0f0f;
    }

    .tips::before {
        height: 4px;
        left: 0;
        right: 0;
        top: 0;
        background: #666;
        content: "";
        opacity: 1;
        position: absolute;
        z-index: 3;
    }

    .tips::after {
        height: 4px;
        left: 0;
        right: 0;
        top: 0;
        background: #666;
        content: "";
        opacity: 1;
        position: absolute;
        z-index: 3;
    }

    .verti {
        animation: rtl-ver-show 3s infinite;
        height: 100px;
        left: 10px;
        position: absolute;
        top: -14px;
        width: 12px;
    }

    @keyframes rtl-ver-show {
        0% {
            top: -14px;
        }

        100% {
            top: -94px;
        }
    }

    .hori {
        animation: rtl-hor-show 3s infinite;
        height: 16px;
        left: -8px;
        position: absolute;
        top: 8px;
        width: 96px;
    }

    @keyframes rtl-hor-show {
        0% {
            left: -8px;
        }

        100% {
            left: -72px;
        }
    }
</style>
    <body >
        <div id="top"></div>
        <a href="#top" class="fixed bottom-10 right-10 p-3 text-white border border-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
            </svg>
        </a>
        <header id="header"
            class="fixed top-0 left-0 p-[10px] text-white bg-[#222] w-full flex lg:invisible items-center gap-[10px] h-[70px]">
            <div>
                <a class="sm:block hidden" href="../index.html"><img src="../logo.png" alt="logo" class="w-[180px]"
                        style="border-right:1px solid #333" /></a>
                <a class="sm:hidden block" href="../index.html"><img style="border-right:1px solid #333"
                        src="../favicon.png" alt="logo" class="w-[50px]" /></a>
            </div>
            <div class="flex items-center">
                <h5 class="text-[14px] font-bold capitalize pr-[20px] !hidden md:block">Vua Cần Sa</h5>
                <div class="flex gap-2 items-center">
                    <div id="showList"
                        class="bg-[#2f2f2f] text-white cursor-pointer px-[10px] h-[35px] rounded-md flex justify-center gap-[10px] items-center font-bold whitespace-nowrap user-none transition-all">
                        <span class="text-lg sm:block !hidden">Chapter 1</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m4.5 5.25 7.5 7.5 7.5-7.5m-15 6 7.5 7.5 7.5-7.5" />
                        </svg>
                    </div>
                    <div class="flex gap-[5px]">
                        <a class="h-[35px] flex items-center bg-[#2f2f2f] px-[8px] py-[1px] justify-center rounded-md pointer-events-none text-gray-500"
                            href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5"></path>
                            </svg>
                        </a>
                        <a class="h-[35px] flex items-center bg-[#2f2f2f] px-[8px] py-[1px] justify-center rounded-md"
                            href="chuong-2.html">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div id="menu-mobile" class="absolute top-[100%] bg-[#111] w-full left-0 hidden">
                    <div class="z-40 my-4 flex min-h-[40px] w-full items-center gap-4 text-white px-5">
                        <div
                            class="w-full flex h-[32px] items-center justify-center rounded-xl bg-[#5f5f5f] px-2 hover:bg-white/25">
                            <input id="input-mobile" placeholder="Đi đến chương..." min="0"
                                class="w-full bg-transparent p-2 transition-all" type="number">
                            <button class="px-4 transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <ul id="box-episodes-mobile" class="max-h-[200px] overflow-auto grid grid-cols-2 sm:grid-cols-4 h-fit">

                        style="scroll-behavior: smooth;">
                        <li id="mobile-19" class="text-xl p-[10px] flex items-center relative m-[3px] bg-[#2f2f2f]">
                            <a href="chuong-19.html">
                                Chapter 19
                            </a>
                        </li>
                        <li id="mobile-18" class="text-xl p-[10px] flex items-center relative m-[3px] bg-[#2f2f2f]">
                            <a href="chuong-18.html">
                                Chapter 18
                            </a>
                        </li>
                        <li id="mobile-17" class="text-xl p-[10px] flex items-center relative m-[3px] bg-[#2f2f2f]">
                            <a href="chuong-17.html">
                                Chapter 17
                            </a>
                        </li>
                        <li id="mobile-16" class="text-xl p-[10px] flex items-center relative m-[3px] bg-[#2f2f2f]">
                            <a href="chuong-16.html">
                                Chapter 16
                            </a>
                        </li>
                        <li id="mobile-15" class="text-xl p-[10px] flex items-center relative m-[3px] bg-[#2f2f2f]">
                            <a href="chuong-15.html">
                                Chapter 15
                            </a>
                        </li>
                        <li id="mobile-14" class="text-xl p-[10px] flex items-center relative m-[3px] bg-[#2f2f2f]">
                            <a href="chuong-14.html">
                                Chapter 14
                            </a>
                        </li>
                        <li id="mobile-13" class="text-xl p-[10px] flex items-center relative m-[3px] bg-[#2f2f2f]">
                            <a href="chuong-13.html">
                                Chapter 13
                            </a>
                        </li>
                        <li id="mobile-12" class="text-xl p-[10px] flex items-center relative m-[3px] bg-[#2f2f2f]">
                            <a href="chuong-12.html">
                                Chapter 12
                            </a>
                        </li>
                        <li id="mobile-11" class="text-xl p-[10px] flex items-center relative m-[3px] bg-[#2f2f2f]">
                            <a href="chuong-11.html">
                                Chapter 11
                            </a>
                        </li>
                        <li id="mobile-10" class="text-xl p-[10px] flex items-center relative m-[3px] bg-[#2f2f2f]">
                            <a href="chuong-10.html">
                                Chapter 10
                            </a>
                        </li>
                        <li id="mobile-9" class="text-xl p-[10px] flex items-center relative m-[3px] bg-[#2f2f2f]">
                            <a href="chuong-9.html">
                                Chapter 9
                            </a>
                        </li>
                        <li id="mobile-8" class="text-xl p-[10px] flex items-center relative m-[3px] bg-[#2f2f2f]">
                            <a href="chuong-8.html">
                                Chapter 8
                            </a>
                        </li>
                        <li id="mobile-7" class="text-xl p-[10px] flex items-center relative m-[3px] bg-[#2f2f2f]">
                            <a href="chuong-7.html">
                                Chapter 7
                            </a>
                        </li>
                        <li id="mobile-6" class="text-xl p-[10px] flex items-center relative m-[3px] bg-[#2f2f2f]">
                            <a href="chuong-6.html">
                                Chapter 6
                            </a>
                        </li>
                        <li id="mobile-5" class="text-xl p-[10px] flex items-center relative m-[3px] bg-[#2f2f2f]">
                            <a href="chuong-5.html">
                                Chapter 5
                            </a>
                        </li>
                        <li id="mobile-4" class="text-xl p-[10px] flex items-center relative m-[3px] bg-[#2f2f2f]">
                            <a href="chuong-4.html">
                                Chapter 4
                            </a>
                        </li>
                        <li id="mobile-3" class="text-xl p-[10px] flex items-center relative m-[3px] bg-[#2f2f2f]">
                            <a href="chuong-3.html">
                                Chapter 3
                            </a>
                        </li>
                        <li id="mobile-2" class="text-xl p-[10px] flex items-center relative m-[3px] bg-[#2f2f2f]">
                            <a href="chuong-2.html">
                                Chapter 2
                            </a>
                        </li>
                        <li id="mobile-1" class="text-xl p-[10px] flex items-center relative m-[3px] bg-primary">
                            <a href="chuong-1.html">
                                Chapter 1
                            </a>
                        </li>
                    </ul>
                </div>
                <div id="menu-server" class="absolute top-[100%] bg-[#111] w-full left-0 hidden z-[100]">
                    <ul id="box-servers-mobile" class="max-h-[40vh] overflow-auto grid grid-cols-2 sm:grid-cols-4 h-fit"
                        style="scroll-behavior: smooth;">
                        <li class="text-xl p-[10px] flex relative m-[3px] bg-primary">
                            <button class="btn-change-server" data-server="VIP #1" data-id="905">
                                VIP #1
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex-1 w-full flex justify-end items-center sm:gap-[10px] !gap-[5px]">
                <div class="bg-[#111] rounded-md !p-[3px] sm:p-[8px] text-[20px] btn-change-server-header cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="w-10 h-10" viewBox="0 0 16 16">
                        <path
                            d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9" />
                        <path fill-rule="evenodd"
                            d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z" />
                    </svg>
                </div>
                <div class="bg-[#111] rounded-md !p-[3px] sm:p-[8px] text-[20px] btn-report cursor-pointer"
                    data-id="905">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-10 h-10">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z">
                        </path>
                    </svg>
                </div>
                <div onclick="showSideright()" class="bg-[#111] rounded-md !p-[3px] sm:p-[8px] text-[20px]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-10 h-10">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                    </svg>
                </div>
                <a href="../vua-can-sa.html" class="bg-[#111] rounded-md !p-[3px] sm:p-[8px] text-[20px]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-10 h-10">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z">
                        </path>
                    </svg>
                </a>
            </div>
        </header>
        <div id="content" class="flex h-fit min-h-screen flex-col bg-[#0f0f0f] ">
            <button id="toggle-expand"
                class="fixed lg:block hidden top-10 left-10 bg-highlight p-2 text-center text-white rounded-full hover:text-[#f43f5e]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                    stroke="currentColor" class="w-8 h-8">
                    <path strokeLinecap="round" strokeLinejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </button>
            <aside class="bg-[#222] sidebar min-h-screen w-[255px] px-[15px] fixed flex-col transition-all flex">
                <div class="flex text-white items-center py-3">
                    <a class="hover:text-primary" href="../vua-can-sa.html">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18">
                            </path>
                        </svg>
                    </a>
                    <div class="sidebar_head__Ka_xY">
                        <a href="../index.html">
                            <img alt="logo" src="{{ asset('assets/client/images/logo/logo.png')}}" style="color: transparent;">
                        </a>
                    </div>
                    <button id="toggle-narrow" class="text-white hover:text-[#f43f5e]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"></path>
                        </svg>
                    </button>
                </div>
                <div class="mt-[15px]">
                    <h5 class="text-white text-[17px] font-bold capitalize">Vua Cần Sa</h5>
                    <h6 class="text-white text-xl mt-4">Chapter: 1</h6>
                </div>
            
                <div class="mt-[20px] flex gap-[20px]">
                    <a
                        class="bg-[#444] hover:bg-[#555] py-[6px] px-[10px] w-full flex justify-center text-[20px] rounded-md pointer-events-none text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5"></path>
                        </svg>
                    </a>
                    <a class="bg-[#444] hover:bg-[#555] py-[6px] px-[10px] w-full flex justify-center text-[20px] rounded-md text-white"
                        href="chuong-2.html">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5"></path>
                        </svg>
                    </a>
                </div>
                <div>
                    <div class="z-40 !my-4 flex min-h-[40px] w-full items-center gap-4 text-white md:my-2">
                        <div
                            class="w-full flex h-[32px] items-center justify-center rounded-xl bg-[#5f5f5f] px-2 hover:bg-white/25">
                            <input id="input" placeholder="Đi đến chương..." min="0"
                                class="w-full bg-transparent p-2 transition-all" type="number">
                            <button class="px-4 transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <ul id="box-episodes"
                        class="bg-[#2f2f2f] text-white max-h-[50vh] rounded-md overflow-auto box-episodes"
                        style="scroll-behavior: smooth;">
                        <li id="chapter-19"
                            class="hover:bg-primary relative flex border-b-1 border-[#222] px-[15px] py-[10px]">
                            <a class="flex w-full gap-[10px] whitespace-nowrap font-bold" href="chuong-19.html">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="mx-4 h-8 w-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z">
                                    </path>
                                </svg>
                                <span>Chapter 19</span>
                            </a>
                        </li>
                        <li id="chapter-18"
                            class="hover:bg-primary relative flex border-b-1 border-[#222] px-[15px] py-[10px]">
                            <a class="flex w-full gap-[10px] whitespace-nowrap font-bold" href="chuong-18.html">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="mx-4 h-8 w-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z">
                                    </path>
                                </svg>
                                <span>Chapter 18</span>
                            </a>
                        </li>
                        <li id="chapter-17"
                            class="hover:bg-primary relative flex border-b-1 border-[#222] px-[15px] py-[10px]">
                            <a class="flex w-full gap-[10px] whitespace-nowrap font-bold" href="chuong-17.html">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="mx-4 h-8 w-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z">
                                    </path>
                                </svg>
                                <span>Chapter 17</span>
                            </a>
                        </li>
                        <li id="chapter-16"
                            class="hover:bg-primary relative flex border-b-1 border-[#222] px-[15px] py-[10px]">
                            <a class="flex w-full gap-[10px] whitespace-nowrap font-bold" href="chuong-16.html">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="mx-4 h-8 w-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z">
                                    </path>
                                </svg>
                                <span>Chapter 16</span>
                            </a>
                        </li>
                        <li id="chapter-15"
                            class="hover:bg-primary relative flex border-b-1 border-[#222] px-[15px] py-[10px]">
                            <a class="flex w-full gap-[10px] whitespace-nowrap font-bold" href="chuong-15.html">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="mx-4 h-8 w-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z">
                                    </path>
                                </svg>
                                <span>Chapter 15</span>
                            </a>
                        </li>
                        <li id="chapter-14"
                            class="hover:bg-primary relative flex border-b-1 border-[#222] px-[15px] py-[10px]">
                            <a class="flex w-full gap-[10px] whitespace-nowrap font-bold" href="chuong-14.html">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="mx-4 h-8 w-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z">
                                    </path>
                                </svg>
                                <span>Chapter 14</span>
                            </a>
                        </li>
                        <li id="chapter-13"
                            class="hover:bg-primary relative flex border-b-1 border-[#222] px-[15px] py-[10px]">
                            <a class="flex w-full gap-[10px] whitespace-nowrap font-bold" href="chuong-13.html">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="mx-4 h-8 w-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z">
                                    </path>
                                </svg>
                                <span>Chapter 13</span>
                            </a>
                        </li>
                        <li id="chapter-12"
                            class="hover:bg-primary relative flex border-b-1 border-[#222] px-[15px] py-[10px]">
                            <a class="flex w-full gap-[10px] whitespace-nowrap font-bold" href="chuong-12.html">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="mx-4 h-8 w-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z">
                                    </path>
                                </svg>
                                <span>Chapter 12</span>
                            </a>
                        </li>
                        <li id="chapter-11"
                            class="hover:bg-primary relative flex border-b-1 border-[#222] px-[15px] py-[10px]">
                            <a class="flex w-full gap-[10px] whitespace-nowrap font-bold" href="chuong-11.html">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="mx-4 h-8 w-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z">
                                    </path>
                                </svg>
                                <span>Chapter 11</span>
                            </a>
                        </li>
                        <li id="chapter-10"
                            class="hover:bg-primary relative flex border-b-1 border-[#222] px-[15px] py-[10px]">
                            <a class="flex w-full gap-[10px] whitespace-nowrap font-bold" href="chuong-10.html">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="mx-4 h-8 w-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z">
                                    </path>
                                </svg>
                                <span>Chapter 10</span>
                            </a>
                        </li>
                        <li id="chapter-9"
                            class="hover:bg-primary relative flex border-b-1 border-[#222] px-[15px] py-[10px]">
                            <a class="flex w-full gap-[10px] whitespace-nowrap font-bold" href="chuong-9.html">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="mx-4 h-8 w-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z">
                                    </path>
                                </svg>
                                <span>Chapter 9</span>
                            </a>
                        </li>
                        <li id="chapter-8"
                            class="hover:bg-primary relative flex border-b-1 border-[#222] px-[15px] py-[10px]">
                            <a class="flex w-full gap-[10px] whitespace-nowrap font-bold" href="chuong-8.html">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="mx-4 h-8 w-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z">
                                    </path>
                                </svg>
                                <span>Chapter 8</span>
                            </a>
                        </li>
                        <li id="chapter-7"
                            class="hover:bg-primary relative flex border-b-1 border-[#222] px-[15px] py-[10px]">
                            <a class="flex w-full gap-[10px] whitespace-nowrap font-bold" href="chuong-7.html">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="mx-4 h-8 w-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z">
                                    </path>
                                </svg>
                                <span>Chapter 7</span>
                            </a>
                        </li>
                        <li id="chapter-6"
                            class="hover:bg-primary relative flex border-b-1 border-[#222] px-[15px] py-[10px]">
                            <a class="flex w-full gap-[10px] whitespace-nowrap font-bold" href="chuong-6.html">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="mx-4 h-8 w-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z">
                                    </path>
                                </svg>
                                <span>Chapter 6</span>
                            </a>
                        </li>
                        <li id="chapter-5"
                            class="hover:bg-primary relative flex border-b-1 border-[#222] px-[15px] py-[10px]">
                            <a class="flex w-full gap-[10px] whitespace-nowrap font-bold" href="chuong-5.html">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="mx-4 h-8 w-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z">
                                    </path>
                                </svg>
                                <span>Chapter 5</span>
                            </a>
                        </li>
                        <li id="chapter-4"
                            class="hover:bg-primary relative flex border-b-1 border-[#222] px-[15px] py-[10px]">
                            <a class="flex w-full gap-[10px] whitespace-nowrap font-bold" href="chuong-4.html">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="mx-4 h-8 w-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z">
                                    </path>
                                </svg>
                                <span>Chapter 4</span>
                            </a>
                        </li>
                        <li id="chapter-3"
                            class="hover:bg-primary relative flex border-b-1 border-[#222] px-[15px] py-[10px]">
                            <a class="flex w-full gap-[10px] whitespace-nowrap font-bold" href="chuong-3.html">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="mx-4 h-8 w-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z">
                                    </path>
                                </svg>
                                <span>Chapter 3</span>
                            </a>
                        </li>
                        <li id="chapter-2"
                            class="hover:bg-primary relative flex border-b-1 border-[#222] px-[15px] py-[10px]">
                            <a class="flex w-full gap-[10px] whitespace-nowrap font-bold" href="chuong-2.html">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="mx-4 h-8 w-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z">
                                    </path>
                                </svg>
                                <span>Chapter 2</span>
                            </a>
                        </li>
                        <li id="chapter-1"
                            class="hover:bg-primary relative flex border-b-1 border-[#222] px-[15px] py-[10px]">
                            <a class="flex w-full gap-[10px] whitespace-nowrap font-bold" href="chuong-1.html">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="mx-4 h-8 w-8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z">
                                    </path>
                                </svg>
                                <span>Chapter 1</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <div onclick="showSideright()"
                        class="flex w-full justify-center mt-5 text-white items-center cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                        </svg>
                        <span>Bình luận</span>
                    </div>
                </div>
                <div>
                    <div class="flex w-full justify-center mt-5 text-white items-center cursor-pointer btn-report">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z">
                            </path>
                        </svg>
                        <span>Báo lỗi</span>
                    </div>
                </div>
            </aside>





            <style>
                #detail {
                    background-color: #fff;
                    max-width: 890px;
                    margin: 0 auto;
                    padding: 30px 20px;
                    color: rgb(0, 0, 0);
                    text-align: justify;
                    transition: background-color 0.3s ease, color 0.3s ease, font-size 0.3s ease;
                }

                .settings {
                    display: none;
                    position: absolute;
                    left: 0;
                    background-color: #fff;
                    padding: 20px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                    border-radius: 10px;
                    margin-top: 10px;
                    width: 350px;
                }

                .settings.active {
                    display: block;
                }

                .settings label {
                    display: block;
                    margin-bottom: 10px;
                }

                .settings input,
                .settings select {
                    margin-bottom: 15px;
                }

                .gear-btn {
                    background-color: transparent;
                    border: none;
                    cursor: pointer;
                    font-size: 20px;
                    color: #fff;
                }

                .audiobook-player {
                    background-color: white;
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                    width: 300px;
                    margin: 0 auto;
                }

                h1 {
                    font-size: 24px;
                    margin-bottom: 20px;
                }

                .controls {
                    margin-top: 20px;
                }


                button:hover {
                    background-color: #0056b3;
                }

                .voice-control,
                .speed-control {
                    margin-top: 20px;
                }
            </style>

            <main id="content-img"
                class="flex overflow-x-hidden justify-center mt-[70px] lg:mt-0 bg-[#0f0f0f] flex-col items-center transition-all">

                <div class="w-full px-2 max-w-[900px] reading-navigation">
                    <section class="bg-[#222] my-[40px] p-[12px] text-white rounded-md w-full flex justify-center gap-2">
                        <a
                            class="text-[15px] hover:bg-[#555] flex bg-[#444] py-[8px] px-[12px] rounded-md items-center gap-5px pointer-events-none text-gray-500">
                            <span>Chap trước</span>
                        </a>
                        <button class="gear-btn" id="settings-button">⚙️</button>
                        <a class="text-[15px] hover:bg-[#555] flex bg-[#444] py-[8px] px-[12px] rounded-md items-center gap-5px text-white"
                            href="chuong-2.html">
                            <span>Chap sau</span>
                        </a>
                    </section>
                </div>

                <div class="settings" id="settings-panel">
                    <h3>Tùy chỉnh hiển thị</h3>
                    <div style="display: flex; align-items: center;">
                        <div>
                            <label for="font-size" style="margin-right: 10px;">Kích cỡ chữ:</label>
                            <input type="range" id="font-size-range" min="14" max="30" value="18"
                                style="margin-right: 20px;">
                            <label for="font-color" style="margin-right: 10px;">Màu chữ:</label>
                            <input type="color" id="font-color-picker" value="#000000" style="margin-right: 20px;">
                        </div>
                        <div>
                            <label for="font-family" style="margin-right: 10px;">Kiểu chữ:</label>
                            <select id="font-family-select" style="border: 2px solid #c4c4c4; padding: 5px;">
                                <option value="Arial">Arial</option>
                                <option value="Times New Roman">Times New Roman</option>
                                <option value="Courier New">Courier New</option>
                            </select>
                            <label for="background-color" style="margin-right: 10px;">Màu nền:</label>
                            <input type="color" id="background-color-picker" value="#ffffff">
                        </div>
                    </div>
                    <div style="margin-top: 20px;">
                        <button id="close-settings-btn">Đóng</button>
                    </div>
                </div>

                <div id="detail" class="flex flex-col justify-center">
                    <div class="max-w-[1000px] select-none">
                        <h1>Tên Tác Phẩm: Hành Trình Bí Ẩn</h1>
                        <p>Chapter 1: Định Mệnh Bắt Đầu | Tác giả: Nguyễn Văn A</p>
                    </div>
                    <div class="max-w-[1000px] select-none">
                        <p id="text-content">
                            Bầu trời thành phố Nam tháng mười một biến đổi thất thường, nhiệt độ lên xuống không ngừng.
                            Vào buổi sáng thứ sáu, sau tiết học tự chọn cuối cùng, Ôn Dữu và bạn cùng phòng Trịnh Nguyệt
                            Chân vừa ngồi xuống ghế trong lớp học, một cơn mưa lớn ập đến bất ngờ khiến nhiều học sinh kêu
                            ca.
                            “Sao lại mưa nữa vậy?” Trịnh Nguyệt Chân dời mắt khỏi điện thoại, nhìn ra ngoài cửa sổ: “Dữu
                            Dữu, cậu mang theo ô không?”
                            Bên cạnh không có tiếng trả lời. Trịnh Nguyệt Chân nghiêng đầu: “Dữu Dữu?”
                            “Hả?” Ôn Dữu giật mình, ngước đôi mắt nai trong veo nhìn cô ấy, vẻ ngây thơ thu hút: “Cậu nói gì
                            cơ?”
                            <!-- Repeat text as necessary -->
                        </p>
                    </div>
                    <div class="controls">
                        <button id="play-button">▶️ Đọc văn bản</button>
                        <button id="pause-button">⏸️ Tạm dừng</button>
                        <button id="resume-button">⏩ Tiếp tục</button>
                        <button id="stop-button">⏹️ Dừng</button>
                    </div>

                    <div class="speed-control">
                        <label for="speed-select">Tốc độ đọc:</label>
                        <select id="speed-select">
                            <option value="0.5">0.5x</option>
                            <option value="1" selected>1x</option>
                            <option value="1.5">1.5x</option>
                            <option value="2">2x</option>
                        </select>
                    </div>

                    <script>
                        const playButton = document.getElementById('play-button');
                        const pauseButton = document.getElementById('pause-button');
                        const resumeButton = document.getElementById('resume-button');
                        const stopButton = document.getElementById('stop-button');
                        const speedSelect = document.getElementById('speed-select');
                        const textContent = document.getElementById('text-content').innerText;

                        // Khởi tạo SpeechSynthesis API
                        const speechSynthesis = window.speechSynthesis;
                        let speech = new SpeechSynthesisUtterance(textContent);
                        speech.lang = 'vi-VN'; // Đặt ngôn ngữ là tiếng Việt

                        // Đọc văn bản
                        playButton.addEventListener('click', () => {
                            speechSynthesis.speak(speech);
                        });

                        // Tạm dừng
                        pauseButton.addEventListener('click', () => {
                            speechSynthesis.pause();
                        });

                        // Tiếp tục
                        resumeButton.addEventListener('click', () => {
                            speechSynthesis.resume();
                        });

                        // Dừng
                        stopButton.addEventListener('click', () => {
                            speechSynthesis.cancel();
                        });

                        // Điều khiển tốc độ
                        speedSelect.addEventListener('change', () => {
                            speech.rate = speedSelect.value;
                        });
                    </script>
                </div>

                <div class="w-full px-2 max-w-[900px] reading-navigation">
                    <section class="bg-[#222] my-[40px] p-[12px] text-white rounded-md w-full flex justify-center gap-2">
                        <a
                            class="text-[15px] hover:bg-[#555] flex bg-[#444] py-[8px] px-[12px] rounded-md items-center gap-5px pointer-events-none text-gray-500">
                            <span>Chap trước</span>
                        </a>
                        <a class="text-[15px] hover:bg-[#555] flex bg-[#444] py-[8px] px-[12px] rounded-md items-center gap-5px text-white"
                            href="chuong-2.html">
                            <span>Chap sau</span>
                        </a>
                    </section>
                </div>

                <script>
                    // Xử lý sự kiện cho nút cài đặt
                    const settingsButton = document.getElementById('settings-button');
                    const settingsPanel = document.getElementById('settings-panel');
                    const closeSettingsBtn = document.getElementById('close-settings-btn');
                    const fontSizeRange = document.getElementById('font-size-range');
                    const fontColorPicker = document.getElementById('font-color-picker');
                    const fontFamilySelect = document.getElementById('font-family-select');
                    const backgroundColorPicker = document.getElementById('background-color-picker');

                    settingsButton.addEventListener('click', () => {
                        settingsPanel.classList.toggle('active');
                    });

                    closeSettingsBtn.addEventListener('click', () => {
                        settingsPanel.classList.remove('active');
                    });

                    // Cập nhật cài đặt hiển thị
                    fontSizeRange.addEventListener('input', () => {
                        document.getElementById('detail').style.fontSize = fontSizeRange.value + 'px';
                    });

                    fontColorPicker.addEventListener('input', () => {
                        document.getElementById('detail').style.color = fontColorPicker.value;
                    });

                    fontFamilySelect.addEventListener('change', () => {
                        document.getElementById('detail').style.fontFamily = fontFamilySelect.value;
                    });

                    backgroundColorPicker.addEventListener('input', () => {
                        document.getElementById('detail').style.backgroundColor = backgroundColorPicker.value;
                    });
                </script>
            </main>




            <aside
                class="bg-[#222] w-full sm:w-[400px] h-screen fixed right-0 top-0 text-white p-3 overflow-auto sideright transform transition-transform duration-500 ease-in-out translate-x-full">
                <div class="flex justify-between w-full p-5 items-center">
                    <h3 class="text-3xl font-bold">Bình luận (0)</h3>
                    <button onclick="showSideright()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-16 h-16 hover:text-primary">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div>
                    <div class="py-2 px-4 mb-4 rounded-lg rounded-t-lg border bg-zinc-800 border-zinc-700">
                        <p class="text-zinc-300 text-[14px]"><a href="../login.html"
                                class="text-primary hover:text-white">Đăng nhập ngay</a> để bình luận</p>
                    </div>
                    <div id="box-comments">
                    </div>
                </div>
            </aside>
        </div>


    </body>
@endsection
