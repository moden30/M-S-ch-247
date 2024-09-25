@extends('client.layout.master')
@section('main-conten')

<body style="margin-top: 100px">
<main class="overflow-x-hidden">
    <div class="flex h-fit flex-col overflow-y-hidden">
        <div class="absolute inset-0 z-[-1] h-[35%] w-full lg:h-[45%]">
            <figure class="deslide-cover">
                <img alt="comic-banner"
                    class="object-fit lozad absolute h-full w-full bg-cover bg-top bg-no-repeat object-cover blur"
                    src="{{ asset('assets/client/images/banner/vua-can-sa-thumb.jpg') }}" />
            </figure>
        </div>
        <div class="z-10 mx-auto min-h-screen w-[85%]">
            <section class="h-full w-full overflow-hidden">
                <div class="flex w-full flex-col items-center h-full md:flex-row md:items-start"
                    style="margin-bottom:50px;">
                    <div class="mt-4 w-[50%] md:w-[250px] md:min-w-[250px]">
                        <figure class="aspect-w-3 aspect-h-5 relative rounded-2xl">
                            <img class="absolute inset-0 rounded-2xl object-cover object-center w-full h-full lozad"
                            src="{{ asset('assets/client/images/banner/vua-can-sa-thumb.jpg') }}" />
                        </figure>
                    </div>
                    <div class="grid grid-cols-3 w-full space-y-4">
                        <div
                            class="col-span-3 lg:col-span-2 flex h-full w-full flex-col justify-center p-4 text-white md:min-h-[430px] lg:ml-4">
                            <div class="w-full space-y-4 text-center md:ml-2 md:text-left lg:w-[80%]">
                                <h1
                                    class="font-secondary  font-bold leading-none text-[5.5vw] md:text-[3.5vw] lg:text-[2.5vw]">
                                    Vua Cần Sa
                                </h1>
                                <h2 className="text-[3vw] md:min-h-[28px] md:text-[2vw] lg:text-[1.2vw]">
                                    Đặc khu Cần Sa Tokyo
                                </h2>
                                <h4 class="flex items-center justify-center gap-4 md:justify-start">
                                    <span class="block h-3 w-3 rounded-full bg-cyan-500"></span>
                                    Đang chiếu
                                </h4>
                                <h4 class="flex items-center justify-center gap-2 md:justify-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6 text-green-500">
                                        <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                        <path fill-rule="evenodd"
                                            d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    9
                                </h4>
                            </div>
                            <div class="mt-4 flex flex-col-reverse gap-2 md:flex-col">
                                <ul class="my-4 flex flex-wrap items-center gap-4">
                                    <h3 class="px-2 py-2">Thể loại:</h3>
                                    <li class="rounded-xl bg-highlight hover:text-primary px-4 py-2">
                                        <a href="the-loai/drama.html">
                                            Drama
                                        </a>
                                    </li>
                                    <li class="rounded-xl bg-highlight hover:text-primary px-4 py-2">
                                        <a href="the-loai/manga.html">
                                            Manga
                                        </a>
                                    </li>
                                    <li class="rounded-xl bg-highlight hover:text-primary px-4 py-2">
                                        <a href="the-loai/seinen.html">
                                            Seinen
                                        </a>
                                    </li>
                                </ul>
                                <div
                                    class="my-6 flex h-fit max-h-[160px] w-full flex-col items-center gap-6 md:my-0 xl:flex-row xl:items-start">
                                    <div class="flex gap-6">
                                        <a href="doc-sach">
                                            <button
                                                class="pulse-effect-primary absolute-center h-[50px] w-[150px] gap-3 rounded-2xl bg-primary transition-all hover:scale-[110%]">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-8 h-8">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                                </svg>
                                                Đọc ngay
                                            </button>
                                        </a>
                                        <a href="vua-can-sa/chuong-19.html">
                                            <button
                                                class="pulse-effect-secondary absolute-center h-[50px] w-[150px] gap-3 rounded-2xl bg-white text-gray-800 transition-all hover:scale-[110%]">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-8 h-8 text-primary">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                                                </svg>
                                                Chap mới nhất
                                            </button>
                                        </a>
                                    </div>

                                    <div class="flex w-fit space-x-2">
                                        <button
                                            class="shine-effect btn-follow absolute-center bg-hight-light h-[50px] w-[50px] rounded-xl transition-all hover:text-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-3 lg:col-span-1 flex flex-col gap-1 text-white">
                            <div class="flex flex-col gap-1 items-center lg:items-start">
                                <div class="fs-6" style="font-weight: 600;">Tác giả: <span
                                        style="color: rgb(217, 70, 239);">
                                        Inai Yuto
                                    </span>
                                </div>
                                <div class="fs-6" style="font-weight: 600;">Nhóm dịch: <span
                                        style="color: rgb(217, 70, 239);">Đang cập nhật</span></div>
                                <div class="fs-6" style="font-weight: 600;">Cập nhật lần cuối: 1 tuần trước</div>
                                <div class="fs-6" style="font-weight: 600;">Người theo dõi: 0</div>
                            </div>
                            <div class="mt-4 flex justify-center w-full">
                                <div class="w-full">
                                    <div class="p-3 bg-primary" style="border-radius: 10px 10px 0px 0px;">
                                        <div class="flex items-center">
                                            <div class="flex gap-2" style="font-size: 18px;">
                                                <i class="bi bi-star-fill text-yellow-500"></i>
                                                <span>0<span style="font-weight: 900;">/</span>3</span><span
                                                    style="font-size: 12px;">(0 voted)</span>
                                            </div>
                                            <div class="flex-1 flex justify-end"
                                                style="font-weight: 700; font-size: 16px;">Vote Now</div>
                                        </div>
                                        <div class="text-center mt-3">Đánh giá của bạn với truyện <i>Vua Cần Sa</i>!
                                        </div>
                                    </div>
                                    <div class="text-center"
                                        style="background: rgb(255, 255, 255); color: rgb(240, 195, 87); border-radius: 0px 0px 10px 10px; font-size: 30px; display: grid; grid-template-columns: repeat(3, 1fr);">
                                        <div data-id="1"
                                            class="flex flex-col gap-2 hover:scale-110 cursor-pointer btn-vote">
                                            😩<span class="text-dark" style="font-size: 16px;">Chán òm</span></div>
                                        <div data-id="2"
                                            class="flex flex-col gap-2 hover:scale-110 cursor-pointer btn-vote">
                                            😃<span class="text-dark" style="font-size: 16px;">Hay</span></div>
                                        <div data-id="3"
                                            class="flex flex-col gap-2 hover:scale-110 cursor-pointer btn-vote">
                                            🤩<span class="text-dark" style="font-size: 16px;">Tuyệt vời</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="h-fit w-full">
                <h3 class="text-white text-3xl lg:text-4xl font-bold pb-2 border-primary border-b-[2px]">Nội dung:
                </h3>
                <div class="my-8 text-white">
                    <p>Chito Morio, một người đàn ông 41 tuổi, chủ của một cửa hàng hoa đang chung sống cùng vợ và
                        cô con gái hiện đang học cấp 3 của mình. Tuy nhiên tình hình kinh doanh của cửa hàng ngày
                        càng trở nên ế ẩm đã khiến vợ anh buộc phải ra ngoài làm thêm để giảm bớt gánh nặng kinh tế
                        cho gia đình. Đang trong cơn túng quẫn thì đột nhiên, Morio nhận được thông báo họp lớp đại
                        học và rồi anh đã quyết định tham dự buổi hội mặt đáng nhớ ấy sau khi được vợ mình hết lòng
                        động viên. Thế rồi cuộc đời Morio bắt đầu bước sang trang mới kể từ lúc anh đã gặp lại người
                        bạn thân ngày ấy là Kagayama cũng đến tham dự buổi họp lớp. Trong khi cả hai đang ngồi hàn
                        huyên lại chuyện xưa thì Kagayama bất ngờ giới thiệu cho anh một công việc béo bở có thể
                        kiếm được bộn tiền.</p>
                </div>
            </section>
            <section class="h-fit w-full mt-10">
                <h2
                    class="mt-4 flex select-none items-center font-secondary text-3xl text-white hover:cursor-pointer md:text-4xl lg:text-5xl">
                    <div class="flex items-center transition-all hover:text-primary">Danh sách chương</div>
                </h2>
                <div class="lg:flex">
                    <div class="my-6 flex h-fit w-full lg:w-3/4 flex-col overflow-x-hidden rounded-xl bg-highlight">
                        <div class="z-40 my-4 flex min-h-[40px] w-full items-center gap-4 text-white md:my-2">
                            <div
                                class="mx-4 flex h-[32px] w-[50%] items-center justify-center rounded-xl bg-[#5f5f5f] px-2 hover:bg-white/25 md:w-[30%] lg:w-[20%]">
                                <input id="input" placeholder="Đi đến chương..." type="number" min=0
                                    class="w-full bg-transparent p-2 transition-all" />
                                <button class="px-4 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6">
                                        <path fill-rule="evenodd"
                                            d="M3.792 2.938A49.069 49.069 0 0 1 12 2.25c2.797 0 5.54.236 8.209.688a1.857 1.857 0 0 1 1.541 1.836v1.044a3 3 0 0 1-.879 2.121l-6.182 6.182a1.5 1.5 0 0 0-.439 1.061v2.927a3 3 0 0 1-1.658 2.684l-1.757.878A.75.75 0 0 1 9.75 21v-5.818a1.5 1.5 0 0 0-.44-1.06L3.13 7.938a3 3 0 0 1-.879-2.121V4.774c0-.897.64-1.683 1.542-1.836Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="animate__fadeIn animate__animated m-2 overflow-hidden text-white">
                            <div class="lg:flex ">
                                <div class="w-full">
                                    <ul id="box-episodes"
                                        class="text-white text-[15px] overflow-y-auto h-fit max-h-[600px] box-episodes"
                                        style="scroll-behavior: smooth;">
                                        <li id="chapter-19"
                                            class="flex cursor-pointer items-center border-b-1 px-[15px] py-[8px] w-full justify-between transition-all hover:border-l-[5px] hover:border-primary">
                                            <a href="vua-can-sa/chuong-19.html" class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-10 h-10 mx-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>

                                                <div class="flex flex-col justify-start">
                                                    <span class="">Chapter 19</span>
                                                    <small class="text-gray-500">1 tuần trước</small>
                                                </div>
                                            </a>
                                            <div>
                                                <a href="vua-can-sa/chuong-19.html"
                                                    class="flex items-center whitespace-nowrap bg-primary transition-all hover:scale-[110%] rounded-md py-[7px] px-[10px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-8 h-8 mr-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                                    Đọc
                                                </a>
                                            </div>
                                        </li>
                                        <li id="chapter-18"
                                            class="flex cursor-pointer items-center border-b-1 px-[15px] py-[8px] w-full justify-between transition-all hover:border-l-[5px] hover:border-primary">
                                            <a href="vua-can-sa/chuong-18.html" class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-10 h-10 mx-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>

                                                <div class="flex flex-col justify-start">
                                                    <span class="">Chapter 18</span>
                                                    <small class="text-gray-500">1 tuần trước</small>
                                                </div>
                                            </a>
                                            <div>
                                                <a href="vua-can-sa/chuong-18.html"
                                                    class="flex items-center whitespace-nowrap bg-primary transition-all hover:scale-[110%] rounded-md py-[7px] px-[10px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-8 h-8 mr-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                                    Đọc
                                                </a>
                                            </div>
                                        </li>
                                        <li id="chapter-17"
                                            class="flex cursor-pointer items-center border-b-1 px-[15px] py-[8px] w-full justify-between transition-all hover:border-l-[5px] hover:border-primary">
                                            <a href="vua-can-sa/chuong-17.html" class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-10 h-10 mx-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>

                                                <div class="flex flex-col justify-start">
                                                    <span class="">Chapter 17</span>
                                                    <small class="text-gray-500">1 tuần trước</small>
                                                </div>
                                            </a>
                                            <div>
                                                <a href="vua-can-sa/chuong-17.html"
                                                    class="flex items-center whitespace-nowrap bg-primary transition-all hover:scale-[110%] rounded-md py-[7px] px-[10px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-8 h-8 mr-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                                    Đọc
                                                </a>
                                            </div>
                                        </li>
                                        <li id="chapter-16"
                                            class="flex cursor-pointer items-center border-b-1 px-[15px] py-[8px] w-full justify-between transition-all hover:border-l-[5px] hover:border-primary">
                                            <a href="vua-can-sa/chuong-16.html" class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-10 h-10 mx-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>

                                                <div class="flex flex-col justify-start">
                                                    <span class="">Chapter 16</span>
                                                    <small class="text-gray-500">1 tuần trước</small>
                                                </div>
                                            </a>
                                            <div>
                                                <a href="vua-can-sa/chuong-16.html"
                                                    class="flex items-center whitespace-nowrap bg-primary transition-all hover:scale-[110%] rounded-md py-[7px] px-[10px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-8 h-8 mr-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                                    Đọc
                                                </a>
                                            </div>
                                        </li>
                                        <li id="chapter-15"
                                            class="flex cursor-pointer items-center border-b-1 px-[15px] py-[8px] w-full justify-between transition-all hover:border-l-[5px] hover:border-primary">
                                            <a href="vua-can-sa/chuong-15.html" class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-10 h-10 mx-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>

                                                <div class="flex flex-col justify-start">
                                                    <span class="">Chapter 15</span>
                                                    <small class="text-gray-500">1 tuần trước</small>
                                                </div>
                                            </a>
                                            <div>
                                                <a href="vua-can-sa/chuong-15.html"
                                                    class="flex items-center whitespace-nowrap bg-primary transition-all hover:scale-[110%] rounded-md py-[7px] px-[10px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-8 h-8 mr-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                                    Đọc
                                                </a>
                                            </div>
                                        </li>
                                        <li id="chapter-14"
                                            class="flex cursor-pointer items-center border-b-1 px-[15px] py-[8px] w-full justify-between transition-all hover:border-l-[5px] hover:border-primary">
                                            <a href="vua-can-sa/chuong-14.html" class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-10 h-10 mx-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>

                                                <div class="flex flex-col justify-start">
                                                    <span class="">Chapter 14</span>
                                                    <small class="text-gray-500">1 tuần trước</small>
                                                </div>
                                            </a>
                                            <div>
                                                <a href="vua-can-sa/chuong-14.html"
                                                    class="flex items-center whitespace-nowrap bg-primary transition-all hover:scale-[110%] rounded-md py-[7px] px-[10px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-8 h-8 mr-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                                    Đọc
                                                </a>
                                            </div>
                                        </li>
                                        <li id="chapter-13"
                                            class="flex cursor-pointer items-center border-b-1 px-[15px] py-[8px] w-full justify-between transition-all hover:border-l-[5px] hover:border-primary">
                                            <a href="vua-can-sa/chuong-13.html" class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-10 h-10 mx-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>

                                                <div class="flex flex-col justify-start">
                                                    <span class="">Chapter 13</span>
                                                    <small class="text-gray-500">1 tuần trước</small>
                                                </div>
                                            </a>
                                            <div>
                                                <a href="vua-can-sa/chuong-13.html"
                                                    class="flex items-center whitespace-nowrap bg-primary transition-all hover:scale-[110%] rounded-md py-[7px] px-[10px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-8 h-8 mr-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                                    Đọc
                                                </a>
                                            </div>
                                        </li>
                                        <li id="chapter-12"
                                            class="flex cursor-pointer items-center border-b-1 px-[15px] py-[8px] w-full justify-between transition-all hover:border-l-[5px] hover:border-primary">
                                            <a href="vua-can-sa/chuong-12.html" class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-10 h-10 mx-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>

                                                <div class="flex flex-col justify-start">
                                                    <span class="">Chapter 12</span>
                                                    <small class="text-gray-500">1 tuần trước</small>
                                                </div>
                                            </a>
                                            <div>
                                                <a href="vua-can-sa/chuong-12.html"
                                                    class="flex items-center whitespace-nowrap bg-primary transition-all hover:scale-[110%] rounded-md py-[7px] px-[10px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-8 h-8 mr-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                                    Đọc
                                                </a>
                                            </div>
                                        </li>
                                        <li id="chapter-11"
                                            class="flex cursor-pointer items-center border-b-1 px-[15px] py-[8px] w-full justify-between transition-all hover:border-l-[5px] hover:border-primary">
                                            <a href="vua-can-sa/chuong-11.html" class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-10 h-10 mx-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>

                                                <div class="flex flex-col justify-start">
                                                    <span class="">Chapter 11</span>
                                                    <small class="text-gray-500">1 tuần trước</small>
                                                </div>
                                            </a>
                                            <div>
                                                <a href="vua-can-sa/chuong-11.html"
                                                    class="flex items-center whitespace-nowrap bg-primary transition-all hover:scale-[110%] rounded-md py-[7px] px-[10px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-8 h-8 mr-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                                    Đọc
                                                </a>
                                            </div>
                                        </li>
                                        <li id="chapter-10"
                                            class="flex cursor-pointer items-center border-b-1 px-[15px] py-[8px] w-full justify-between transition-all hover:border-l-[5px] hover:border-primary">
                                            <a href="vua-can-sa/chuong-10.html" class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-10 h-10 mx-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>

                                                <div class="flex flex-col justify-start">
                                                    <span class="">Chapter 10</span>
                                                    <small class="text-gray-500">1 tuần trước</small>
                                                </div>
                                            </a>
                                            <div>
                                                <a href="vua-can-sa/chuong-10.html"
                                                    class="flex items-center whitespace-nowrap bg-primary transition-all hover:scale-[110%] rounded-md py-[7px] px-[10px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-8 h-8 mr-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                                    Đọc
                                                </a>
                                            </div>
                                        </li>
                                        <li id="chapter-9"
                                            class="flex cursor-pointer items-center border-b-1 px-[15px] py-[8px] w-full justify-between transition-all hover:border-l-[5px] hover:border-primary">
                                            <a href="vua-can-sa/chuong-9.html" class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-10 h-10 mx-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>

                                                <div class="flex flex-col justify-start">
                                                    <span class="">Chapter 9</span>
                                                    <small class="text-gray-500">1 tuần trước</small>
                                                </div>
                                            </a>
                                            <div>
                                                <a href="vua-can-sa/chuong-9.html"
                                                    class="flex items-center whitespace-nowrap bg-primary transition-all hover:scale-[110%] rounded-md py-[7px] px-[10px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-8 h-8 mr-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                                    Đọc
                                                </a>
                                            </div>
                                        </li>
                                        <li id="chapter-8"
                                            class="flex cursor-pointer items-center border-b-1 px-[15px] py-[8px] w-full justify-between transition-all hover:border-l-[5px] hover:border-primary">
                                            <a href="vua-can-sa/chuong-8.html" class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-10 h-10 mx-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>

                                                <div class="flex flex-col justify-start">
                                                    <span class="">Chapter 8</span>
                                                    <small class="text-gray-500">1 tuần trước</small>
                                                </div>
                                            </a>
                                            <div>
                                                <a href="vua-can-sa/chuong-8.html"
                                                    class="flex items-center whitespace-nowrap bg-primary transition-all hover:scale-[110%] rounded-md py-[7px] px-[10px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-8 h-8 mr-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                                    Đọc
                                                </a>
                                            </div>
                                        </li>
                                        <li id="chapter-7"
                                            class="flex cursor-pointer items-center border-b-1 px-[15px] py-[8px] w-full justify-between transition-all hover:border-l-[5px] hover:border-primary">
                                            <a href="vua-can-sa/chuong-7.html" class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-10 h-10 mx-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>

                                                <div class="flex flex-col justify-start">
                                                    <span class="">Chapter 7</span>
                                                    <small class="text-gray-500">1 tuần trước</small>
                                                </div>
                                            </a>
                                            <div>
                                                <a href="vua-can-sa/chuong-7.html"
                                                    class="flex items-center whitespace-nowrap bg-primary transition-all hover:scale-[110%] rounded-md py-[7px] px-[10px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-8 h-8 mr-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                                    Đọc
                                                </a>
                                            </div>
                                        </li>
                                        <li id="chapter-6"
                                            class="flex cursor-pointer items-center border-b-1 px-[15px] py-[8px] w-full justify-between transition-all hover:border-l-[5px] hover:border-primary">
                                            <a href="vua-can-sa/chuong-6.html" class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-10 h-10 mx-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>

                                                <div class="flex flex-col justify-start">
                                                    <span class="">Chapter 6</span>
                                                    <small class="text-gray-500">1 tuần trước</small>
                                                </div>
                                            </a>
                                            <div>
                                                <a href="vua-can-sa/chuong-6.html"
                                                    class="flex items-center whitespace-nowrap bg-primary transition-all hover:scale-[110%] rounded-md py-[7px] px-[10px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-8 h-8 mr-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                                    Đọc
                                                </a>
                                            </div>
                                        </li>
                                        <li id="chapter-5"
                                            class="flex cursor-pointer items-center border-b-1 px-[15px] py-[8px] w-full justify-between transition-all hover:border-l-[5px] hover:border-primary">
                                            <a href="vua-can-sa/chuong-5.html" class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-10 h-10 mx-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>

                                                <div class="flex flex-col justify-start">
                                                    <span class="">Chapter 5</span>
                                                    <small class="text-gray-500">1 tuần trước</small>
                                                </div>
                                            </a>
                                            <div>
                                                <a href="vua-can-sa/chuong-5.html"
                                                    class="flex items-center whitespace-nowrap bg-primary transition-all hover:scale-[110%] rounded-md py-[7px] px-[10px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-8 h-8 mr-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                                    Đọc
                                                </a>
                                            </div>
                                        </li>
                                        <li id="chapter-4"
                                            class="flex cursor-pointer items-center border-b-1 px-[15px] py-[8px] w-full justify-between transition-all hover:border-l-[5px] hover:border-primary">
                                            <a href="vua-can-sa/chuong-4.html" class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-10 h-10 mx-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>

                                                <div class="flex flex-col justify-start">
                                                    <span class="">Chapter 4</span>
                                                    <small class="text-gray-500">1 tuần trước</small>
                                                </div>
                                            </a>
                                            <div>
                                                <a href="vua-can-sa/chuong-4.html"
                                                    class="flex items-center whitespace-nowrap bg-primary transition-all hover:scale-[110%] rounded-md py-[7px] px-[10px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-8 h-8 mr-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                                    Đọc
                                                </a>
                                            </div>
                                        </li>
                                        <li id="chapter-3"
                                            class="flex cursor-pointer items-center border-b-1 px-[15px] py-[8px] w-full justify-between transition-all hover:border-l-[5px] hover:border-primary">
                                            <a href="vua-can-sa/chuong-3.html" class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-10 h-10 mx-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>

                                                <div class="flex flex-col justify-start">
                                                    <span class="">Chapter 3</span>
                                                    <small class="text-gray-500">1 tuần trước</small>
                                                </div>
                                            </a>
                                            <div>
                                                <a href="vua-can-sa/chuong-3.html"
                                                    class="flex items-center whitespace-nowrap bg-primary transition-all hover:scale-[110%] rounded-md py-[7px] px-[10px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-8 h-8 mr-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                                    Đọc
                                                </a>
                                            </div>
                                        </li>
                                        <li id="chapter-2"
                                            class="flex cursor-pointer items-center border-b-1 px-[15px] py-[8px] w-full justify-between transition-all hover:border-l-[5px] hover:border-primary">
                                            <a href="vua-can-sa/chuong-2.html" class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-10 h-10 mx-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>

                                                <div class="flex flex-col justify-start">
                                                    <span class="">Chapter 2</span>
                                                    <small class="text-gray-500">1 tuần trước</small>
                                                </div>
                                            </a>
                                            <div>
                                                <a href="vua-can-sa/chuong-2.html"
                                                    class="flex items-center whitespace-nowrap bg-primary transition-all hover:scale-[110%] rounded-md py-[7px] px-[10px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-8 h-8 mr-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                                    Đọc
                                                </a>
                                            </div>
                                        </li>
                                        <li id="chapter-1"
                                            class="flex cursor-pointer items-center border-b-1 px-[15px] py-[8px] w-full justify-between transition-all hover:border-l-[5px] hover:border-primary">
                                            <a href="vua-can-sa/chuong-1.html" class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-10 h-10 mx-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>

                                                <div class="flex flex-col justify-start">
                                                    <span class="">Chapter 1</span>
                                                    <small class="text-gray-500">1 tuần trước</small>
                                                </div>
                                            </a>
                                            <div>
                                                <a href="vua-can-sa/chuong-1.html"
                                                    class="flex items-center whitespace-nowrap bg-primary transition-all hover:scale-[110%] rounded-md py-[7px] px-[10px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-8 h-8 mr-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                                    Đọc
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="w-full lg:w-1/4 lg:pl-10">
                        <h2
                            class="mt-4 flex select-none items-center font-secondary text-3xl text-white hover:cursor-pointer  md:text-4xl lg:text-5xl">
                            <div class="flex items-center transition-all hover:text-primary">Có thể bạn sẽ thích
                            </div>
                        </h2>
                        <div class="mt-[20px] text-white flex flex-col gap-[20px]">
                            <div class="flex gap-[15px] items-center" title="Gokusotsu Kraken">
                                <a href="gokusotsu-kraken.html">
                                    <img class="w-[70px] h-[90px] lozad"
                                        src="{{ asset('assets/client/images/banner/gokusotsu-kraken-thumb.jpg') }}"
                                        alt="Gokusotsu Kraken">
                                </a>
                                <div class="flex-1 w-full overflow-hidden text-ellipsis whitespace-nowrap">
                                    <a href="gokusotsu-kraken.html">
                                        <h5
                                            class="font-bold text-xl text-white whitespace-nowrap overflow-hidden text-ellipsis hover:text-primary">
                                            Gokusotsu Kraken
                                        </h5>
                                    </a>
                                    <div
                                        class="w-100 text-lg text-slate-400 whitespace-nowrap overflow-hidden text-ellipsis">
                                        <span><a href="the-loai/action.html">Action</a>
                                            <span>
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    viewBox="0 0 16 16" class="inline-block" height="1.5em"
                                                    width="1.5em" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <span><a href="the-loai/ecchi.html">Ecchi</a>
                                            <span>
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    viewBox="0 0 16 16" class="inline-block" height="1.5em"
                                                    width="1.5em" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <span><a href="the-loai/fantasy.html">Fantasy</a>
                                            <span>
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    viewBox="0 0 16 16" class="inline-block" height="1.5em"
                                                    width="1.5em" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <span><a href="the-loai/harem.html">Harem</a>
                                            <span>
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    viewBox="0 0 16 16" class="inline-block" height="1.5em"
                                                    width="1.5em" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <span><a href="the-loai/manga.html">Manga</a>
                                            <span>
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    viewBox="0 0 16 16" class="inline-block" height="1.5em"
                                                    width="1.5em" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <span><a href="the-loai/seinen.html">Seinen</a>
                                            <span>
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    viewBox="0 0 16 16" class="inline-block" height="1.5em"
                                                    width="1.5em" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <span><a href="the-loai/supernatural.html">Supernatural</a>
                                        </span>
                                    </div>
                                    <a href="gokusotsu-kraken/chuong-14.html"
                                        class="mt-1 flex items-center hover:text-primary text-blue-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                        </svg>
                                        <small class="mt-1"> Chapter 14</small>
                                    </a>
                                </div>
                            </div>
                            <div class="flex gap-[15px] items-center" title="Tam Giác Bạc">
                                <a href="tam-giac-bac.html">
                                    <img class="w-[70px] h-[90px] lozad"
                                        src="{{ asset('assets/client/images/banner/tam-giac-bac-thumb.jpg') }}"
                                        alt="Tam Giác Bạc">
                                </a>
                                <div class="flex-1 w-full overflow-hidden text-ellipsis whitespace-nowrap">
                                    <a href="tam-giac-bac.html">
                                        <h5
                                            class="font-bold text-xl text-white whitespace-nowrap overflow-hidden text-ellipsis hover:text-primary">
                                            Tam Giác Bạc
                                        </h5>
                                    </a>
                                    <div
                                        class="w-100 text-lg text-slate-400 whitespace-nowrap overflow-hidden text-ellipsis">
                                        <span><a href="the-loai/adventure.html">Adventure</a>
                                            <span>
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    viewBox="0 0 16 16" class="inline-block" height="1.5em"
                                                    width="1.5em" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <span><a href="the-loai/drama.html">Drama</a>
                                            <span>
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    viewBox="0 0 16 16" class="inline-block" height="1.5em"
                                                    width="1.5em" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <span><a href="the-loai/historical.html">Historical</a>
                                            <span>
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    viewBox="0 0 16 16" class="inline-block" height="1.5em"
                                                    width="1.5em" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <span><a href="the-loai/josei.html">Josei</a>
                                            <span>
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    viewBox="0 0 16 16" class="inline-block" height="1.5em"
                                                    width="1.5em" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <span><a href="the-loai/manga.html">Manga</a>
                                            <span>
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    viewBox="0 0 16 16" class="inline-block" height="1.5em"
                                                    width="1.5em" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <span><a href="the-loai/mystery.html">Mystery</a>
                                            <span>
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    viewBox="0 0 16 16" class="inline-block" height="1.5em"
                                                    width="1.5em" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <span><a href="the-loai/sci-fi.html">Sci-fi</a>
                                            <span>
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    viewBox="0 0 16 16" class="inline-block" height="1.5em"
                                                    width="1.5em" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <span><a href="the-loai/seinen.html">Seinen</a>
                                        </span>
                                    </div>
                                    <a href="tam-giac-bac/chuong-19.html"
                                        class="mt-1 flex items-center hover:text-primary text-blue-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                        </svg>
                                        <small class="mt-1"> Chapter 19</small>
                                    </a>
                                </div>
                            </div>
                            <div class="flex gap-[15px] items-center"
                                title="Tsuihousareru Tabi ni Skill wo Te ni Ireta Ore ga, 100 no Isekai de 2-shuume Musou">
                                <a
                                    href="tsuihousareru-tabi-ni-skill-wo-te-ni-ireta-ore-ga-100-no-isekai-de-2-shuume-musou.html">
                                    <img class="w-[70px] h-[90px] lozad"
                                        src="{{ asset('assets/client/images/banner/tsuihousareru-tabi-ni-skill-wo-te-ni-ireta-ore-ga-100-no-isekai-de-2-shuume-musou-thumb.jpg') }}"
                                        alt="Tsuihousareru Tabi ni Skill wo Te ni Ireta Ore ga, 100 no Isekai de 2-shuume Musou">
                                </a>
                                <div class="flex-1 w-full overflow-hidden text-ellipsis whitespace-nowrap">
                                    <a
                                        href="tsuihousareru-tabi-ni-skill-wo-te-ni-ireta-ore-ga-100-no-isekai-de-2-shuume-musou.html">
                                        <h5
                                            class="font-bold text-xl text-white whitespace-nowrap overflow-hidden text-ellipsis hover:text-primary">
                                            Tsuihousareru Tabi ni Skill wo Te ni Ireta Ore ga, 100 no Isekai de
                                            2-shuume Musou
                                        </h5>
                                    </a>
                                    <div
                                        class="w-100 text-lg text-slate-400 whitespace-nowrap overflow-hidden text-ellipsis">
                                        <span><a href="the-loai/action.html">Action</a>
                                            <span>
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    viewBox="0 0 16 16" class="inline-block" height="1.5em"
                                                    width="1.5em" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <span><a href="the-loai/adventure.html">Adventure</a>
                                            <span>
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    viewBox="0 0 16 16" class="inline-block" height="1.5em"
                                                    width="1.5em" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <span><a href="the-loai/comedy.html">Comedy</a>
                                            <span>
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    viewBox="0 0 16 16" class="inline-block" height="1.5em"
                                                    width="1.5em" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <span><a href="the-loai/fantasy.html">Fantasy</a>
                                            <span>
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    viewBox="0 0 16 16" class="inline-block" height="1.5em"
                                                    width="1.5em" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <span><a href="the-loai/manga.html">Manga</a>
                                            <span>
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    viewBox="0 0 16 16" class="inline-block" height="1.5em"
                                                    width="1.5em" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <span><a href="the-loai/romance.html">Romance</a>
                                        </span>
                                    </div>
                                    <a href="tsuihousareru-tabi-ni-skill-wo-te-ni-ireta-ore-ga-100-no-isekai-de-2-shuume-musou/chuong-17.html"
                                        class="mt-1 flex items-center hover:text-primary text-blue-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                        </svg>
                                        <small class="mt-1"> Chapter 17</small>
                                    </a>
                                </div>
                            </div>
                            <div class="flex gap-[15px] items-center" title="Boku No Suki Na Hito Ga Suki Na Hito">
                                <a href="boku-no-suki-na-hito-ga-suki-na-hito.html">
                                    <img class="w-[70px] h-[90px] lozad"
                                        src="{{ asset('assets/client/images/banner/boku-no-suki-na-hito-ga-suki-na-hito-thumb.jpg') }}"
                                        alt="Boku No Suki Na Hito Ga Suki Na Hito">
                                </a>
                                <div class="flex-1 w-full overflow-hidden text-ellipsis whitespace-nowrap">
                                    <a href="boku-no-suki-na-hito-ga-suki-na-hito.html">
                                        <h5
                                            class="font-bold text-xl text-white whitespace-nowrap overflow-hidden text-ellipsis hover:text-primary">
                                            Boku No Suki Na Hito Ga Suki Na Hito
                                        </h5>
                                    </a>
                                    <div
                                        class="w-100 text-lg text-slate-400 whitespace-nowrap overflow-hidden text-ellipsis">
                                        <span><a href="the-loai/comedy.html">Comedy</a>
                                            <span>
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    viewBox="0 0 16 16" class="inline-block" height="1.5em"
                                                    width="1.5em" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <span><a href="the-loai/manga.html">Manga</a>
                                            <span>
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    viewBox="0 0 16 16" class="inline-block" height="1.5em"
                                                    width="1.5em" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <span><a href="the-loai/romance.html">Romance</a>
                                            <span>
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    viewBox="0 0 16 16" class="inline-block" height="1.5em"
                                                    width="1.5em" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <span><a href="the-loai/school-life.html">School Life</a>
                                        </span>
                                    </div>
                                    <a href="boku-no-suki-na-hito-ga-suki-na-hito/chuong-18.html"
                                        class="mt-1 flex items-center hover:text-primary text-blue-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                        </svg>
                                        <small class="mt-1"> Chapter 18</small>
                                    </a>
                                </div>
                            </div>
                            <div class="flex gap-[15px] items-center"
                                title="Misato Có Hơi Lạnh Lùng Với Người Sếp Của Cô Ấy">
                                <a href="misato-co-hoi-lanh-lung-voi-nguoi-sep-cua-co-ay.html">
                                    <img class="w-[70px] h-[90px] lozad"
                                        src="{{ asset('assets/client/images/banner/misato-co-hoi-lanh-lung-voi-nguoi-sep-cua-co-ay-thumb.jpg') }}"
                                        alt="Misato Có Hơi Lạnh Lùng Với Người Sếp Của Cô Ấy">
                                </a>
                                <div class="flex-1 w-full overflow-hidden text-ellipsis whitespace-nowrap">
                                    <a href="misato-co-hoi-lanh-lung-voi-nguoi-sep-cua-co-ay.html">
                                        <h5
                                            class="font-bold text-xl text-white whitespace-nowrap overflow-hidden text-ellipsis hover:text-primary">
                                            Misato Có Hơi Lạnh Lùng Với Người Sếp Của Cô Ấy
                                        </h5>
                                    </a>
                                    <div
                                        class="w-100 text-lg text-slate-400 whitespace-nowrap overflow-hidden text-ellipsis">
                                        <span><a href="the-loai/comedy.html">Comedy</a>
                                            <span>
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    viewBox="0 0 16 16" class="inline-block" height="1.5em"
                                                    width="1.5em" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <span><a href="the-loai/drama.html">Drama</a>
                                            <span>
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    viewBox="0 0 16 16" class="inline-block" height="1.5em"
                                                    width="1.5em" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <span><a href="the-loai/romance.html">Romance</a>
                                            <span>
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                    viewBox="0 0 16 16" class="inline-block" height="1.5em"
                                                    width="1.5em" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <span><a href="the-loai/seinen.html">Seinen</a>
                                        </span>
                                    </div>
                                    <a href="misato-co-hoi-lanh-lung-voi-nguoi-sep-cua-co-ay/chuong-6.html"
                                        class="mt-1 flex items-center hover:text-primary text-blue-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                        </svg>
                                        <small class="mt-1"> Chapter 6</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </div>
</main>
</body>
@endsection
