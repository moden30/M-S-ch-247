<header class="h-40 bg-background fixed top-0 left-0 w-full z-50 ">
    <div class="mx-auto flex h-full w-full items-center md:max-w-[644px] lg:max-w-[1200px] relative">
        <button id="toogleHeader" class="button mx-6 rounded-full p-4 md:m-0 lg:hidden">
            <svg stroke="currentColor" fill="currentColor" strokeWidth="0" viewBox="0 0 20 20"
                 class=" text-4xl text-white" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                <path fillRule="evenodd"
                      d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1z"
                      clipRule="evenodd"></path>
            </svg>
        </button>
        <div class="relative flex h-full w-56 items-center md:w-80 md:px-6 lg:px-0 lg:pl-6">
            <figure class="absolute z-10 text-4xl font-semibold text-white md:text-5xl">
                <a href="{{ route('trang-chu') }}">
                    <img class="h-[40px] w-[130px] max-w-[200px] fill-white md:h-[50px] md:w-[200px]" src="{{ asset('assets/client/images/logo/logo.png') }}"
                         alt="logo">
                </a>
            </figure>
            <div class="absolute left-10 top-auto z-0">
            </div>
        </div>
        <nav>
            <ul
                class="ml-32 hidden h-full w-fit items-center space-x-10 font-secondary text-3xl text-white lg:flex">
                <li class="relative transition-all menu-category">
                    <button class="flex items-center false">Thể loại
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5"
                             stroke="currentColor" aria-hidden="true" class="h-8 w-8">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5">
                            </path>
                        </svg>
                    </button>
                    <div class="submenu">
                        <ul
                            class="animate__animated animate__fadeIn animate__faster absolute top-full left-1/2 z-50 flex h-fit w-fit -translate-x-1/2 flex-col flex-nowrap items-center justify-evenly rounded-2xl bg-secondary py-4 transition-all">
                            <li><a class="absolute-center mx-2 my-2 h-14 whitespace-nowrap px-6 font-primary duration-300 capitalize"
                                   href="the-loai/comedy.html">Comedy</a></li>
                            <li><a class="absolute-center mx-2 my-2 h-14 whitespace-nowrap px-6 font-primary duration-300 capitalize"
                                   href="the-loai/ecchi.html">Ecchi</a></li>
                            <li><a class="absolute-center mx-2 my-2 h-14 whitespace-nowrap px-6 font-primary duration-300 capitalize"
                                   href="the-loai/manga.html">Manga</a></li>
                            <li><a class="absolute-center mx-2 my-2 h-14 whitespace-nowrap px-6 font-primary duration-300 capitalize"
                                   href="the-loai/action.html">Action</a></li>
                            <li><a class="absolute-center mx-2 my-2 h-14 whitespace-nowrap px-6 font-primary duration-300 capitalize"
                                   href="the-loai/manhwa.html">Manhwa</a></li>
                            <li><a class="absolute-center mx-2 my-2 h-14 whitespace-nowrap px-6 font-primary duration-300 capitalize"
                                   href="the-loai/truyen-mau.html">Truyện Màu</a></li>
                            <li><a class="absolute-center mx-2 my-2 h-14 whitespace-nowrap px-6 font-primary duration-300 capitalize"
                                   href="the-loai/adventure.html">Adventure</a></li>
                            <li><a class="absolute-center mx-2 my-2 h-14 whitespace-nowrap px-6 font-primary duration-300"
                                   href="tim-kiem-nang-cao.html">Xem thêm<svg xmlns="http://www.w3.org/2000/svg"
                                                                              fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor"
                                                                              aria-hidden="true" class="h-8 w-8 text-white">
                                        <path strokeLinecap="round" strokeLinejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg></a></li>
                            <li
                                class="slide absolute top-2 -z-10 h-14 w-[85%] opacity-0 rounded-2xl bg-[#555759] px-6 duration-150">
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="transition-all hover:text-primary ">
                    <a href="moi-cap-nhat.html">Mới cập nhật</a>
                </li>
                <li class="transition-all hover:text-primary ">
                    <a href="bang-xep-hang.html">Bảng xếp hạng</a>
                </li>
            </ul>
        </nav>
        <div class="relative ml-10 flex h-full flex-1 items-center justify-end md:justify-between lg:ml-0">
            <form action="https://demo.nqtcomics.site/tim-kiem-nang-cao"
                  class="relative ml-16 flex h-[40%] w-fit items-center justify-between rounded-2xl bg-highlight text-white lg:w-[68%]">
                <button type="submit"
                        class="mx-4 hidden rounded-xl bg-rose-300 px-2 py-1 text-rose-600 transition-all hover:bg-rose-500 hover:text-white/80 md:block">
                    <a href="tim-kiem-nang-cao.html">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             aria-hidden="true" class="h-8 w-8">
                            <path
                                d="M6 12a.75.75 0 01-.75-.75v-7.5a.75.75 0 111.5 0v7.5A.75.75 0 016 12zM18 12a.75.75 0 01-.75-.75v-7.5a.75.75 0 011.5 0v7.5A.75.75 0 0118 12zM6.75 20.25v-1.5a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0zM18.75 18.75v1.5a.75.75 0 01-1.5 0v-1.5a.75.75 0 011.5 0zM12.75 5.25v-1.5a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0zM12 21a.75.75 0 01-.75-.75v-7.5a.75.75 0 011.5 0v7.5A.75.75 0 0112 21zM3.75 15a2.25 2.25 0 104.5 0 2.25 2.25 0 00-4.5 0zM12 11.25a2.25 2.25 0 110-4.5 2.25 2.25 0 010 4.5zM15.75 15a2.25 2.25 0 104.5 0 2.25 2.25 0 00-4.5 0z">
                            </path>
                        </svg>
                    </a>
                </button>
                <input type="search" id="input-keyword"
                       class="hidden w-[80%] bg-transparent placeholder:text-white md:block"
                       placeholder="Tìm truyện..." name="keyword" />
                <button id="toggle-search" type="button"
                        class="h-full w-fit rounded-2xl p-4 hover:cursor-pointer hover:opacity-60">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                         aria-hidden="true" class="h-8 w-8">
                        <path fillRule="evenodd"
                              d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z"
                              clipRule="evenodd"></path>
                    </svg>
                </button>
                <div
                    class="left-0 search-results max-md:hidden absolute top-full z-50 flex h-fit w-full flex-col justify-evenly rounded-2xl bg-secondary transition-all">
                </div>

            </form>

            <button class="relative ml-4 rounded-2xl bg-highlight p-4">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                     class="h-8 w-8 text-white">
                    <path fillRule="evenodd"
                          d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z"
                          clipRule="evenodd"></path>
                </svg>
            </button>
            <div class="absolute-center mx-4 h-full w-24">
                <div class="relative">
                    <a href="{{ route('trang-ca-nhan') }}"
                       class="flex items-center justify-center h-20 w-20 overflow-hidden rounded-full bg-secondary bg-cover bg-no-repeat text-white hover:bg-white/10">
                        <svg stroke="currentColor" fill="currentColor" strokeWidth="0" viewBox="0 0 24 24"
                             class="h-14 w-14" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="search-group-mobile z-[1000] w-full left-0 absolute top-full lg:hidden hidden">
            <form action="https://demo.nqtcomics.site/tim-kiem-nang-cao"
                  class="flex h-[40%] items-center justify-between bg-highlight text-white w-full">
                <button type="submit"
                        class="mx-4 rounded-xl bg-rose-300 px-2 py-1 text-rose-600 transition-all hover:bg-rose-500 hover:text-white/80">
                    <a href="tim-kiem-nang-cao.html">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             aria-hidden="true" class="h-8 w-8">
                            <path
                                d="M6 12a.75.75 0 01-.75-.75v-7.5a.75.75 0 111.5 0v7.5A.75.75 0 016 12zM18 12a.75.75 0 01-.75-.75v-7.5a.75.75 0 011.5 0v7.5A.75.75 0 0118 12zM6.75 20.25v-1.5a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0zM18.75 18.75v1.5a.75.75 0 01-1.5 0v-1.5a.75.75 0 011.5 0zM12.75 5.25v-1.5a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0zM12 21a.75.75 0 01-.75-.75v-7.5a.75.75 0 011.5 0v7.5A.75.75 0 0112 21zM3.75 15a2.25 2.25 0 104.5 0 2.25 2.25 0 00-4.5 0zM12 11.25a2.25 2.25 0 110-4.5 2.25 2.25 0 010 4.5zM15.75 15a2.25 2.25 0 104.5 0 2.25 2.25 0 00-4.5 0z">
                            </path>
                        </svg>
                    </a>
                </button>
                <input id="search-mobile" class="w-[80%] bg-transparent placeholder:text-white"
                       placeholder="Tìm truyện..." name="keyword" />
                <button type="button" class="h-full w-fit rounded-2xl p-4 hover:cursor-pointer hover:opacity-60">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                         aria-hidden="true" class="h-8 w-8">
                        <path fillRule="evenodd"
                              d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z"
                              clipRule="evenodd"></path>
                    </svg>
                </button>
                <div
                    class="left-0 search-results-mobile absolute top-full z-50 flex h-fit w-full flex-col justify-evenly rounded-2xl bg-secondary transition-all">
                </div>
            </form>
        </div>
    </div>

</header>
