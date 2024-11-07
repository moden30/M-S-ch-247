@extends('client.layouts.app')
@section('content')
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
    <!-- Snowfall Effect Container -->
    <div class="snow-container">
        <!-- Snowflakes -->
        <div class="snow">
            <div class="snowflake">❄</div>
            <div class="snowflake">❅</div>
            <div class="snowflake">❆</div>
            <!-- Add more snowflakes if needed -->
        </div>

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
                                        <img style="object-fit: cover"
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


    <div class="container">
        <h1 class="ms-2" style="font-weight: bold">Bài Viết</h1>
        <hr class="mt-1">
        <div class="slider-container2 mb-5">
            <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
            <div class="slider-wrapper2">
                <div class="slider-track">
                    @foreach ($bai_viets as $item)
                        <div class="slider-item2">
                            <a href="{{route('chi-tiet-bai-viet', $item->id)}}" target="_self">
                                <img src="{{ Storage::url($item->hinh_anh) }}" alt="Banner Image"
                                    class="slider-banner-image2" />
                            </a>
                            <span style="font-weight: bold">{{$item->tieu_de}}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <button class="next" onclick="moveSlide(1)">&#10095;</button>
        </div>
    </div>

    <style>
        .slider-container2 {
            position: relative;
            overflow: hidden;
            margin: 0 auto;
        }

        .slider-wrapper2 {
            overflow: hidden;
            width: 100%;
        }

        .slider-track {
            display: flex;
            transition: transform 0.5s ease;
        }

        .slider-item2 {
            min-width: 33.33%;
            box-sizing: border-box;
            padding: 0 5px;
        }

        .slider-banner-image2 {
            margin-bottom: 2%;
            width: 590px;
            height: 330px;
            border-radius: 10px;
        }
        .slider-banner-image2 {
           object-fit: cover;
        }

        .prev,
        .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            cursor: pointer;
            font-size: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            z-index: 10;
            /* Đảm bảo nút luôn nằm trên ảnh */
        }

        .slider-track {
            display: flex;
            transition: transform 0.5s ease;
            z-index: 1;
            /* Đảm bảo track của slider nằm sau nút điều hướng */
        }


        .prev {
            left: 0;
        }

        .next {
            right: 0;
        }
    </style>

    <script>
        let currentIndex = 0;

        function moveSlide(step) {
            const slides = document.querySelectorAll(".slider-item2");
            const totalSlides = slides.length;

            // Calculate the maximum index that allows three images to be shown at once
            const maxIndex = totalSlides - 3;

            // Update currentIndex based on the step
            currentIndex += step;

            // Ensure currentIndex remains within the valid range
            if (currentIndex < 0) {
                currentIndex = 0;
            } else if (currentIndex > maxIndex) {
                currentIndex = maxIndex;
            }

            // Move the slider track to show the correct images
            const offset = -currentIndex * (100 / 3);
            document.querySelector(".slider-track").style.transform = `translateX(${offset}%)`;
        }
    </script>

    <div class="container ">
        <div class="row">
            <div class="col-xs-12 col-md-12 ">
                <div class="bg-customer" style="background-image: url('{{ asset('assets/client/img/banner2.jpg') }}');padding: 2%">
                    <h2 class="text-success me-5" style="font-size: 40px">TRỞ THÀNH CỘNG TÁC VIÊN TẠI MESACH247 NGAY
                        THÔI!
                    </h2>
                    <div>
                        <a class="btn btn-lg btn-primary" href="{{route('hop-dong')}}">Đăng Ký Cộng Tác Viên</a>
{{--                        <button type="submit" class="btn btn-lg btn-primary">Đăng Ký Cộng Tác Viên</button>--}}
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

@endsection
@push('scripts')
    <script>
        // Snowfall effect
        document.addEventListener("DOMContentLoaded", function() {
            const snowContainer = document.querySelector('.snow');
            for (let i = 0; i < 50; i++) {
                const snowflake = document.createElement('div');
                snowflake.classList.add('snowflake');
                snowflake.textContent = i % 2 === 0 ? '❄' : i % 3 === 0 ? '❅' : '❆';
                snowflake.style.left = Math.random() * 100 + 'vw';
                snowflake.style.animationDuration = (Math.random() * 3 + 5) + 's';
                snowflake.style.fontSize = (Math.random() * 10 + 10) + 'px';
                snowContainer.appendChild(snowflake);
            }
        });

    </script>

@endpush
@push('styles')
    <style>
        /* Snowflake Style */
        @keyframes snowFall {
            0% { transform: translateY(0); opacity: 1; }
            100% { transform: translateY(100vh); opacity: 0; }
        }

        .snowflake {
            position: absolute;
            top: -50px;
            font-size: 1em;
            color: white;
            opacity: 0.8;
            animation: snowFall 10s linear infinite;
            pointer-events: none;
        }

        .snow-container {
            position: relative;
            overflow: hidden;
        }

        .snow-container #sliderbanner {
            position: relative;
            z-index: 1;
        }

        .snow-container .snow {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 2;
        }

    </style>
@endpush
