<div id="sidebarMobile" class="hidden lg:hidden mt-400">
    <aside id="animationHeader"
           class="slideLeftReturn magictime absolute-center fixed inset-0 z-[999] w-[250px] min-w-[230px] bg-secondary p-4 md:w-[40%] overflow-auto">
        <div class="flex h-full w-full flex-col">
            <div class="absolute-center mt-6 flex h-fit w-full items-center justify-between">
                <button id="toogleClose"
                        class="absolute-center bg-hight-light ml-4 rounded-full p-4 text-white md:p-5" tabindex="0"><svg
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true" class="h-8 w-8 md:h-10 md:w-10">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"></path>
                    </svg></button>
                <div class="absolute-center relative flex-1">
                    <figure class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                        <img src="{{ asset('assets/client/images/logo/logo.png')}}"
                             class="left-1/2 h-[40px] w-[160px] max-w-[200px] md:h-[50px] md:w-[200px]" alt="logo">
                    </figure>
                </div>
            </div>
            <ul class="mt-4 h-full w-full text-white">
                {{-- <li class="mx-4 mt-4 border-t-[2px] border-highlight pt-4 md:mt-8">
                    <h3 class="font-secondary text-3xl md:text-5xl">Thể loại</h3>
                </li>
                <li class="grid grid-cols-2">
                    <button
                        class="hover:bg-hight-light ml-4 mt-4 flex w-full items-center rounded-xl py-2 px-4 md:mt-6">
                        <a class="flex items center text-xl md:text-3xl capitalize"
                           href="the-loai/comedy.html">Comedy</a>
                    </button>
                    <button
                        class="hover:bg-hight-light ml-4 mt-4 flex w-full items-center rounded-xl py-2 px-4 md:mt-6">
                        <a class="flex items center text-xl md:text-3xl capitalize"
                           href="the-loai/ecchi.html">Ecchi</a>
                    </button>
                    <button
                        class="hover:bg-hight-light ml-4 mt-4 flex w-full items-center rounded-xl py-2 px-4 md:mt-6">
                        <a class="flex items center text-xl md:text-3xl capitalize"
                           href="the-loai/manga.html">Manga</a>
                    </button>
                    <button
                        class="hover:bg-hight-light ml-4 mt-4 flex w-full items-center rounded-xl py-2 px-4 md:mt-6">
                        <a class="flex items center text-xl md:text-3xl capitalize"
                           href="the-loai/action.html">Action</a>
                    </button>
                    <button
                        class="hover:bg-hight-light ml-4 mt-4 flex w-full items-center rounded-xl py-2 px-4 md:mt-6">
                        <a class="flex items center text-xl md:text-3xl capitalize"
                           href="the-loai/manhwa.html">Manhwa</a>
                    </button>
                    <button
                        class="hover:bg-hight-light ml-4 mt-4 flex w-full items-center rounded-xl py-2 px-4 md:mt-6">
                        <a class="flex items center text-xl md:text-3xl capitalize"
                           href="the-loai/truyen-mau.html">Truyện Màu</a>
                    </button>
                    <button
                        class="hover:bg-hight-light ml-4 mt-4 flex w-full items-center rounded-xl py-2 px-4 md:mt-6">
                        <a class="flex items center text-xl md:text-3xl capitalize"
                           href="the-loai/adventure.html">Adventure</a>
                    </button>
                    <button
                        class="hover:bg-hight-light ml-4 mt-4 flex w-full items-center rounded-xl py-2 px-4 md:mt-6">
                        <a class="flex items-center text-xl md:text-3xl" href="tim-kiem-nang-cao.html">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="mr-2 h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15">
                                </path>
                            </svg> Xem thêm
                        </a>
                    </button>
                </li> --}}
                <li class="mx-4 mt-4 border-t-[2px] border-highlight pt-4 md:mt-8">
                    <h3 class="font-secondary text-3xl md:text-5xl">Thể loại</h3>
                </li>
                <li class="grid grid-cols-2">
                    @foreach($theLoaisHienThi as $theLoai)
                    <button class="hover:bg-hight-light ml-4 mt-4 flex w-full items-center rounded-xl py-2 px-4 md:mt-6">
                        <a class="flex items center text-xl md:text-3xl capitalize"
                           href="{{ url('the-loai/' . Str::slug($theLoai->ten_the_loai) . '.html') }}">
                            {{ $theLoai->ten_the_loai }}
                        </a>
                    </button>
                    @endforeach
                    
                    <!-- Nút "Xem thêm" nếu có thêm thể loại khác -->
                    @if($theLoaisHienThi->count() == 7)
                    <button class="hover:bg-hight-light ml-4 mt-4 flex w-full items-center rounded-xl py-2 px-4 md:mt-6">
                        <a class="flex items-center text-xl md:text-3xl" href="tim-kiem-nang-cao.html">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="mr-2 h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                            </svg> Xem thêm
                        </a>
                    </button>
                    @endif
                </li>
                <li class="mx-4 mt-4 border-t-[2px] border-highlight pt-4 md:mt-8">
                    <h3 class="font-secondary text-3xl md:text-5xl">
                        <a class="flex items-center" href="tim-kiem-nang-caoc519.html?sort=0">Mới cập nhật
                            <button class="absolute-center h-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                     class="ml-2 h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                </svg>
                            </button>
                        </a>
                    </h3>
                </li>
                <li class="mx-4 mt-4 border-t-[2px] border-highlight pt-4 md:mt-8">
                    <h3 class="font-secondary text-3xl md:text-5xl"><a class="flex items-center"
                                                                       href="tim-kiem-nang-caoa1a1.html?sort=2">Bảng xếp hạng
                            <button class="absolute-center h-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                     class="ml-2 h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                </svg>
                            </button></a>
                    </h3>
                </li>
            </ul>
        </div>
    </aside>
</div>
