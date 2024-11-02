@extends('client.layouts.app')
@push('styles')
    <style>
        .highlight {
            background-color: yellow; /* Màu nền cho điểm đánh dấu */
        }
    </style>
<script>
    // document.addEventListener('contextmenu', function(e) {
    //     e.preventDefault();
    // });
    //
    // document.addEventListener('keydown', function(e) {
    //     if (e.ctrlKey && (e.key === 'c' || e.key === 'u')) {
    //         e.preventDefault();
    //     }
    // });
    // document.addEventListener('keydown', function(e) {
    //     if (e.key === 'PrintScreen') {
    //         alert('Chụp màn hình không được phép trên trang này.');
    //         e.preventDefault();
    //     }
    // });


</script>
    <link rel="stylesheet" href="https://truyenhdt.com/wp-content/themes/truyenfull/echo/css/chap.css?v100063">
    <style>
        .modal-content-scroll {
            max-height: 30em; /* Giới hạn chiều cao cho 10 dòng */
            overflow-y: auto; /* Tạo thanh cuộn dọc nếu cần */
        }
        .no-select {
            -webkit-user-select: none; /* Safari */
            -moz-user-select: none; /* Firefox */
            -ms-user-select: none; /* IE/Edge */
            user-select: none; /* Non-prefixed version, currently supported by Chrome and Opera */
        }
        .chuong-item {
            display: block; /* Hiển thị như khối */
            white-space: nowrap; /* Không cho nội dung xuống dòng */
            overflow: hidden; /* Ẩn nội dung thừa */
            text-overflow: ellipsis; /* Hiển thị dấu "..." khi nội dung quá dài */
            transition: background-color 0.3s ease; /* Thêm hiệu ứng chuyển tiếp */
            font-size: 16px;
        }

        .chuong-item:hover {
            background-color: #007bff; /* Màu xanh khi di chuột vào */
            color: white; /* Đổi màu chữ thành trắng */
        }



    </style>
@endpush
@section('content')
    <div class="clearfix"></div>
    <div class="container">
        <div id="ads-header" class="text-center" style="margin-bottom: 10px"></div>
    </div>
    <div class="container container-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><span class="fa fa-home"></span> Trang chủ</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('the-loai',$chuong->sach->theLoai->id) }}">{{ $chuong->sach->theLoai->ten_the_loai }}</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('chi-tiet-sach', $chuong->sach->id) }}">{{ $chuong->sach->ten_sach }}</a></li>
            <li class="breadcrumb-item"><a
                    href="{{ route('chi-tiet-chuong', [$chuong->sach->id,$chuong->id, $chuong->tieu_de]) }}">Chương {{ $chuong->so_chuong }}
                    : {{ $chuong->tieu_de }}</a></li>
        </ol>
    </div>
    <div class="container cpt truyen">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="text-center"> Chương {{ $chuong->so_chuong }} : {{ $chuong->tieu_de }} <span
                        class="dropdown dropdown-wrench ms-3 color-gray font-16"> <a class="dropdown-toggle"
                                                                                     data-toggle="dropdown" href="#"></a>
                    </span></h1>
                <div class="text-center color-gray"> <span class="me-3"> <a href="{{ route('chi-tiet-tac-gia',$chuong->sach->user_id) }}"> <i
                                class="fa fa-user" aria-hidden="true"></i> {{ $chuong->sach->tac_gia }} </a> </span>
                    <span
                        class="me-3"> <i class="fa fa-file-word-o" aria-hidden="true"></i> {{ $countText }} chữ </span>
                    <a
                        href="/web/setting-chap?url=https://truyenhdt.com/truyen/quai-vat-xuc-tu-co-day-chi-muon-song/chap/9841373-chuong-1/">
                        <i class="fa fa-cog" aria-hidden="true"></i> Cài Đặt </a></div>
                <div class="pagination pagination-top mt-5">
                    <div class="next-chap next-chap-1">
                        @if($backChuong)
                            <a href="{{ route('chi-tiet-chuong', [$chuong->sach->id, $backChuong->id, $backChuong->tieu_de]) }}"
                               class="tag-sm color-white btn-primary chuong-link"
                               data-user-sach-id="{{ $chuong->sach->id }}"
                               data-chuong-id="{{ $backChuong->id }}"
                               role="button">
                                « <span></span>Trước
                            </a>
                        @else
                        @endif
                    </div>
                    <div class="fullchap">
                        <div class="fullchap">
                            <div class="full">
                                <span class="btn btn-secondary2 btn-unborder" data-toggle="modal"
                                      data-target="#myModal">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="next-chap next-chap-2">
                        @if($nextChuong)
                            <a href="{{ route('chi-tiet-chuong', [$chuong->sach->id,$nextChuong->id, $nextChuong->tieu_de]) }}"
                               class="tag-sm color-white btn-primary chuong-link"
                               data-user-sach-id="{{ $chuong->sach->id }}"
                               data-chuong-id="{{ $nextChuong->id }}"
                               role="button">
                                <span></span>Tiếp »
                            </a>
                        @else
                        @endif
                    </div>
                </div>
                <div id="ads-chap-top" class="text-center"></div>
                <div class="reading chapter-content">
                    <p id="chapter-text">
                        @if($highlight)
                            {{-- Hiển thị nội dung với điểm đánh dấu --}}
                            {!! str_replace($highlight->highlight_text, '<span class="highlight">'.htmlspecialchars($highlight->highlight_text).'</span>', $chuong->noi_dung) !!}
                        @else
                            {{-- Nếu không có điểm đánh dấu --}}
                            {!! htmlspecialchars($chuong->noi_dung) !!}
                        @endif
                    </p>
                </div>
                <div class="hidden-xs hidden-sm hidden-md text-center mt-3 color-gray"> Sử dụng mũi tên trái (←) hoặc
                    phải (→) để chuyển chương
                </div>
                <div id="ads-chap-bottom" class="text-center"></div>
                <div class="pagination pagination-bottom">
                    <div class="next-chap next-chap-1">
                        @if($backChuong)
                            <a href="{{ route('chi-tiet-chuong', [$chuong->sach->id,$backChuong->id, $backChuong->tieu_de]) }}"
                               class="tag-sm color-white btn-primary chuong-link"
                               data-user-sach-id="{{ $chuong->sach->id }}"
                               data-chuong-id="{{ $backChuong->id }}"
                               role="button">
                                « <span></span>Trước
                            </a>
                        @else
                        @endif
                    </div>
                    <div class="fullchap">
                        <div class="fullchap">
                            <div class="full">
                                <span class="btn btn-secondary2 btn-unborder" data-toggle="modal"
                                      data-target="#myModal">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="next-chap next-chap-2">
                        @if($nextChuong)
                            <a href="{{ route('chi-tiet-chuong', [$chuong->sach->id,$nextChuong->id, $nextChuong->tieu_de]) }}"
                               class="tag-sm color-white btn-primary chuong-link"
                               data-user-sach-id="{{ $chuong->sach->id }}"
                               data-chuong-id="{{ $nextChuong->id }}"
                               role="button">
                                <span></span>Tiếp »
                            </a>
                        @else
                        @endif
                    </div>
                </div>
                <div id="views" data-title="Quái Vật Xúc Tu Cô Đây Chỉ Muốn Sống" data-id="9841373"
                     data-slug="quai-vat-xuc-tu-co-day-chi-muon-song" data-chap="9841373-chuong-1"
                     data-chapid="9841429" data-gold="0" data-date="2023-09-21 16:38:50" data-status="publish">
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 120%">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Danh Sách Chương</h4>
                </div>
                <div class="modal-body">
                    <div class="modal-content-scroll">
                        @foreach($danhSachChuong as $item)
                            <p class="chuong-item">
                                <a href="{{ route('chi-tiet-chuong', [$chuong->sach->id,$item->id, $item->tieu_de]) }}"
                                   class="{{ $item->id == $chuong->id ? 'text-danger' : '' }} chuong-link"
                                   data-user-sach-id="{{ $item->sach->id }}"
                                   data-chuong-id="{{ $item->id }}">
                                    Chương {{ $item->so_chuong }}: {{ $item->tieu_de }}
                                </a>
                            </p>
                        @endforeach
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><span class="fa fa-home"></span> Trang chủ</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('the-loai',$chuong->sach->theLoai->id) }}">{{ $chuong->sach->theLoai->ten_the_loai }}</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('chi-tiet-sach', $chuong->sach->id) }}">{{ $chuong->sach->ten_sach }}</a></li>
            <li class="breadcrumb-item"><a
                    href="{{ route('chi-tiet-chuong', [$chuong->sach->id,$chuong->id, $chuong->tieu_de]) }}">Chương {{ $chuong->so_chuong }}
                    : {{ $chuong->tieu_de }}</a></li>
        </ol>
    </div>
@endsection
@push('scripts')


    <script src="{{ asset('assets/client/themes/truyenfull/echo/js/ajax/chuong.js') }}" type="text/javascript">
    </script>
    <script>
        $(document).on('click', '.chuong-link', function(e) {
            e.preventDefault();

            var userSachId = $(this).data('user-sach-id');
            var chuongId = $(this).data('chuong-id');
            var href = $(this).attr('href');

            $.ajax({
                url: '/lich-su-doc/' + userSachId + '/' + chuongId,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    window.location.href = href;
                },
                error: function(xhr, status, error) {
                    window.location.href = href;
                }
            });

        });
    </script>
    <script>

        let isSweetAlertOpen = false; // Biến cờ để theo dõi trạng thái của SweetAlert

        document.addEventListener('mouseup', function() {
            if (isSweetAlertOpen) return; // Ngăn không cho thực hiện nếu SweetAlert đang mở

            let selectedText = window.getSelection().toString(); // Lấy đoạn văn bản được chọn
            let chapterTextElement = document.getElementById('chapter-text'); // Thay thế với ID của phần nội dung chương
            if (selectedText) {
                let sachId = {{ $chuong->sach->id }}; // Lấy ID sách
                let chuongId = {{ $chuong->id }}; // Lấy ID chương

                // Xóa các đánh dấu cũ
                removeHighlights(chapterTextElement);

                // Gửi yêu cầu lưu
                fetch('/luu-vi-tri-doc', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        sach_id: sachId,
                        chuong_id: chuongId,
                        position: window.getSelection().anchorOffset, // Lưu vị trí
                        highlight_text: selectedText
                    })
                }).then(response => {
                    if (!response.ok) {
                        throw new Error('Mua sách để đọc các chương.');
                    }
                    return response.json();
                })
                    .then(data => {
                        console.log(data.message);
                        isSweetAlertOpen = true; // Đặt cờ để chỉ ra rằng SweetAlert đang mở

                        // Hiển thị thông báo SweetAlert
                        Swal.fire({
                            title: "Thành công!",
                            text: "Điểm đánh dấu đã được lưu.",
                            icon: "success"
                        }).then(() => {
                            isSweetAlertOpen = false; // Đặt lại cờ khi người dùng đã nhấn OK
                            location.reload(); // Tải lại trang sau khi nhấn OK
                        });
                    })
                    .catch(error => {
                        console.error("Có lỗi xảy ra:", error);
                        isSweetAlertOpen = true; // Đặt cờ khi hiển thị thông báo lỗi

                        Swal.fire({
                            title: "Thất bại!",
                            text: "Điểm đánh dấu chưa được lưu.",
                            icon: "error"
                        }).then(() => {
                            isSweetAlertOpen = false; // Đặt lại cờ khi người dùng đã nhấn OK
                        });
                    });
            }
        });

        // Hàm xóa các đánh dấu cũ
        function removeHighlights(element) {
            const highlightedElements = element.getElementsByClassName('highlight');
            while (highlightedElements.length > 0) {
                const parent = highlightedElements[0].parentNode;
                const text = document.createTextNode(highlightedElements[0].textContent);
                parent.replaceChild(text, highlightedElements[0]);
            }
        }

    </script>

@endpush

