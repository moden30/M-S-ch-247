@extends('client.layouts.app')
@section('content')
    <style>
        .bg-customer {
            background-image: url('{{ asset('assets/client/img/banner2.jpg') }}');
            /* Đường dẫn tới hình ảnh */
            background-size: cover;
            /* Đảm bảo hình ảnh bao phủ toàn bộ màn hình */
            background-repeat: no-repeat;
            /* Ngăn không cho hình ảnh lặp lại */
            background-attachment: fixed;
            /* Cố định hình ảnh nền */
            background-position: center;
            /* Đặt vị trí hình ảnh ở giữa */
            height: 150px;
            width: 100%;
            border-radius: 12px 12px 0 0;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-size: 18px;
        }
    </style>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/client/home.css') }}">
    @endpush
    @push('scripts')
        <script src="{{ asset('js/client/home.js') }}"></script>
    @endpush

    @if(session('success'))
        <script>
            Swal.fire({
                title: "Thành công !",
                text: "{{session('sucess')}}",
                icon: "success"
            });
        </script>
    @elseif(session('error'))
        <script>
            Swal.fire({
                title: "Thất bại",
                text: "{{session('error')}}",
                icon: "error"
            });
        </script>
    @endif

    <!-- Slider -->
    <div class="slider-cont" id="sliderbanner">
        @if (!is_null($slider))
            @foreach ($slider->hinhAnhBanner as $item)
                <div class="sliderbanner-item">
                    <a href="#" target="_blank">
                        <img src="{{ Storage::url($item->hinh_anh) }}" alt="Banner Image" />
                    </a>
                </div>
            @endforeach
        @else
            <div class="sliderbanner-item">
                <a href="#" target="_blank">
                    <img src="{{ asset('assets/client/slide/truyen/slide2.gif') }}" alt="Banner Image" />
                </a>
            </div>
        @endif
    </div>


    <!-- Main content -->
    <div class="container ztop-10">
        <!-- Đổ ra các row sách từ controller truyền zo -->
        @foreach($sections as $section)
            <x-book-section
                heading="{{$section['heading']}}"
                :books="$section['books']"
                sectionId="{{$loop->index}}"
            />
        @endforeach
    </div>

    <div class="container">
        <div class="panel panel-default comic-card">
            <div class="panel-body">
                <h2 class="ms-2 mt-2 ms-4 heading" style="font-weight: bold;font-size: 32px">Tác Giả Hot</h2>
                <div class="list-user-parent text-center d-flex justify-content-center">
                    <div class="list-user">
                        @foreach($topTacGias as $item)
                            <div class="item-user" title="Tác giả 1">
                                <div class="u-avatar">
                                    <a href="{{route('chi-tiet-tac-gia', $item->id)}}">
                                        <img
                                            src="{{(!is_null($item->hinh_anh) ? Storage::url($item->hinh_anh) : asset('assets/admin/images/users/user-dummy-img.jpg'))}}"
                                            class="avatar-img" alt="user-avt"/>
                                    </a>
                                </div>
                                <div>
                                    <div>
                                        <a
                                            href="{{route('chi-tiet-tac-gia', $item->id)}}">{{$item->ten_doc_gia}}</a>
                                    </div>
                                    <span style="opacity: 60%">Đang có {{$item->total_books}} sách</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container ">
        <div class="row">
            <div class="col-xs-12 col-md-12 ">
                <div class="bg-customer">
                    <h2 class="text-success me-5" style="font-size: 40px">TRỞ THÀNH CỘNG TÁC VIÊN TẠI MESACH247 NGAY
                        THÔI!
                    </h2>
                    <div>
                        <button type="submit" class="btn btn-lg btn-primary">Đăng Ký Cộng Tác Viên</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="slider-footer d-flex">
            @foreach ($sliderFooter->hinhAnhBanner as $item)
                <div class="sliderbanner-item">
                    <a href="#" target="_blank">
                        <img src="{{ Storage::url($item->hinh_anh) }}" alt="Banner Image" class="slider-banner-image" />
                    </a>
                </div>
            @endforeach
        </div>
    </div>


    {{-- <div class="container">
        <div class="slideshow-container">
            @foreach ($sliderFooter->hinhAnhBanner as $item)
                <div class="mySlides">
                    <a href="#" target="_blank">
                        <img src="{{ Storage::url($item->hinh_anh) }}" alt="Banner Image" class="slider-banner-image"/>
                    </a>
                </div>
            @endforeach

            <!-- Nút điều hướng -->
            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>
        </div>
    </div>

    <style>
        * {
            box-sizing: border-box;
        }
        .slideshow-container {
            position: relative;
            max-width: 1000px;
            margin: auto;
            display: flex;
            overflow-x: auto;
            gap: 20px;
        }
        .mySlides {
            flex: 0 0 50%;
        }
        .slider-banner-image {
            width: 100%;
            vertical-align: middle;
        }
        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            user-select: none;
        }
        .next {
            right: 0;
        }
        .prev {
            left: 0;
        }
        .prev:hover, .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
    </style>

    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex - 1].style.display = "block";
        }
    </script> --}}

@endsection
