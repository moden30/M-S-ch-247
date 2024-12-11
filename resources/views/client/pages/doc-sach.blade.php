@extends('client.layouts.app')
@push('scripts')
    <script>

    </script>
@endpush
@push('styles')
    <style>
        /*body {*/
        /*    user-select: none;*/
        /*    -webkit-user-select: none;*/
        /*    -ms-user-select: none;*/
        /*    -moz-user-select: none;*/
        /*}*/

        /*!* Chặn kéo thả *!*/
        /*body {*/
        /*    -webkit-touch-callout: none; !* Chặn menu ngữ cảnh trên iOS *!*/
        /*    -webkit-user-drag: none;    !* Chặn kéo thả *!*/
        /*}*/
        /*.chapter-content {*/
        /*    position: relative;*/
        /*}*/

        /*.chapter-content::after {*/
        /*    content: ' ';*/
        /*    position: absolute;*/
        /*    top: 0;*/
        /*    left: 0;*/
        /*    width: 100%;*/
        /*    height: 100%;*/
        /*    background-color: rgba(255, 255, 255, 0.1);  !* Lớp phủ nhẹ che khuất nội dung *!*/
        /*}*/

    </style>

    <script>
        // Chặn phím tắt như Ctrl + C, Ctrl + P, và F12
        document.addEventListener('keydown', function (event) {
            // Chặn sao chép (Ctrl + C) và in (Ctrl + P)
            if (event.ctrlKey && (event.key === 'c' || event.key === 'p')) {
                event.preventDefault();
                alert("Không được phép sao chép nội dung!");
            }

            // Chặn F12 và Ctrl + Shift + I (DevTools)
            if (event.key === 'F12' || (event.ctrlKey && event.shiftKey && event.key === 'I') ||  (event.ctrlKey && event.shiftKey && event.key === 'J')) {
                event.preventDefault();
                alert("Không được phép sử dụng công cụ phát triển!");
            }
        });

        // Chặn bấm chuột phải
        document.addEventListener('contextmenu', function (event) {
            event.preventDefault();
            alert("Chuột phải đã bị vô hiệu hóa!");
        });

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

        @media (min-width: 1200px)

        .container-chapter {
            width: 1170px;
        }

        @media (min-width: 992px)

        .container-chapter {
            width: 970px;
        }

        @media (min-width: 768px)

        .container-chapter {
            width: 750px;
        }

        .container-chapter {
            padding-right: 250px;
            padding-left: 250px;
            margin-right: auto;
            margin-left: auto;
        }

        #chapter-text {
            text-align: justify;
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
            <li class="breadcrumb-item"><a
                    href="{{ route('the-loai',$chuong->sach->theLoai->id) }}">{{ $chuong->sach->theLoai->ten_the_loai }}</a>
            </li>
            <li class="breadcrumb-item"><a
                    href="{{ route('chi-tiet-sach', $chuong->sach->id) }}">{{ $chuong->sach->ten_sach }}</a></li>
            <li class="breadcrumb-item"><a
                    href="{{ route('chi-tiet-chuong', [$chuong->sach->id,$chuong->id, $chuong->tieu_de]) }}">{{ $chuong->so_chuong }}
                    : {{ $chuong->tieu_de }}</a></li>
        </ol>
    </div>
    <div class="container-chapter cpt truyen">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="text-center" style="font-size: 40px">{{ $chuong->so_chuong }}
                    : {{ $chuong->tieu_de }} <span
                        class="dropdown dropdown-wrench ms-3 color-gray font-16"> <a class="dropdown-toggle"
                                                                                     data-toggle="dropdown"
                                                                                     href="#"></a>
                    </span></h1>
                <div class="text-center color-gray"> <span class="me-3"> <a
                            href="{{ route('chi-tiet-tac-gia',$chuong->sach->user_id) }}"> <i
                                class="fa fa-user" aria-hidden="true"></i> {{ $chuong->sach->user->but_danh ? $chuong->sach->user->but_danh : $chuong->sach->user->ten_doc_gia  }} </a> </span>
                    <span
                        class="me-3"> <i class="fa fa-file-word-o" aria-hidden="true"></i> {{ $countText }} từ </span>
                    <span
                        class="me-3"> <i class="fa fa-clock-o" aria-hidden="true"></i> {{ \Carbon\Carbon::parse($chuong->updated_at)->diffForHumans() }} </span>
                    <a href="#" data-toggle="modal"
                       data-target="#myModal-2">
                        <i class="fa fa-cog" aria-hidden="true"></i> cài đặt
                    </a>
                    @if(auth()->user()->id == $chuong->sach->user_id)
                        <span class="dropdown dropdown-wrench ms-3 color-gray font-16">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench" aria-hidden="true"></i>
                                <span class="caret">
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('chuong.edit', [ $chuong->sach_id, $chuong->id]) }}"
                                       target="_blank">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Chỉnh sửa
                                    </a>
                                </li>
                            </ul>
                        </span>
                    @endif

                </div>
                <div class="pagination pagination-top mt-5">
                    <div class="next-chap next-chap-1">
                        @if($backChuong)
                            <a href="{{ route('chi-tiet-chuong', [$chuong->sach->id, $backChuong->id]) }}"
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
                            <a href="{{ route('chi-tiet-chuong', [$chuong->sach->id,$nextChuong->id]) }}"
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
                <div class="reading chapter-content" style="font-size: 24px">
                    <p id="chapter-text">
                        {!! $chuong->noi_dung !!}
                    </p>
                </div>
                <div class="hidden-xs hidden-sm hidden-md text-center mt-3 color-gray"> Sử dụng mũi tên trái (←) hoặc
                    phải (→) để chuyển tiếp
                </div>
                <div id="ads-chap-bottom" class="text-center"></div>
                <div class="pagination pagination-bottom">
                    <div class="next-chap next-chap-1">
                        @if($backChuong)
                            <a href="{{ route('chi-tiet-chuong', [$chuong->sach->id,$backChuong->id]) }}"
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
                            <a href="{{ route('chi-tiet-chuong', [$chuong->sach->id,$nextChuong->id]) }}"
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
                    <h4 class="modal-title" id="myModalLabel">Danh Sách</h4>
                </div>
                <div class="modal-body">
                    <div class="modal-content-scroll">
                        @foreach($danhSachChuong as $item)
                            <p class="chuong-item">
                                <a href="{{ route('chi-tiet-chuong', [$chuong->sach->id,$item->id]) }}"
                                   class="{{ $item->id == $chuong->id ? 'text-danger' : '' }} {{ in_array($item->id, $chuongDaDoc ?? []) ? 'text-success' : '' }} chuong-link"
                                   data-user-sach-id="{{ $item->sach->id }}"
                                   data-chuong-id="{{ $item->id }}">
                                    {{ $item->so_chuong }}: {{ $item->tieu_de }}
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
    <div class="modal fade" id="myModal-2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: #f3f3f3">
                <div class="modal-header">
                    <h4 class="modal-title" style="color: black">Chọn màu</h4>
                </div>
                <div class="modal-body">
                    <div class="modal-content-scroll">
                        <div id="colorSettings">
                            <div class="color-option" style="background-color: #D4C69F;"
                                 onclick="setColor('#D4C69F', '#000000')"></div>
                            <div class="color-option" style="background-color: #CFCFCF;"
                                 onclick="setColor('#CFCFCF', '#000000')"></div>
                            <div class="color-option" style="background-color: #000000;"
                                 onclick="setColor('#000000', '#FFFFFF')"></div>
                            <div class="color-option" style="background-color: #FFFFFF;"
                                 onclick="setColor('#FFFFFF', '#000000')"></div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="color: black">Đóng
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="noteFormContainer">
        <form id="noteForm">
            <input type="hidden" id="noteElementId" name="element_id"> <!-- Lưu phần văn bản bôi đen -->
            <input type="hidden" id="noteOffset" name="offset">
            <input type="hidden" id="chapterId" name="chapter_id" value="{{ $chuong->id }}">

            <div class="mb-3">
                <label for="noteContent" class="form-label">Nội dung ghi chú</label>
                <textarea class="form-control" id="noteContent" name="content" required></textarea> <!-- Người dùng nhập nội dung ghi chú -->
            </div>

            <div class="mb-3">
                <label for="noteColor" class="form-label">Màu sắc</label>
                <input type="color" id="noteColor" name="color" class="form-control" value="#ffff00">
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Lưu ghi chú</button>
                <button type="button" id="closeNoteForm" class="btn btn-secondary">Đóng</button>
            </div>
        </form>
    </div>


    <div class="container mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><span class="fa fa-home"></span> Trang chủ</a>
            </li>
            <li class="breadcrumb-item"><a
                    href="{{ route('the-loai',$chuong->sach->theLoai->id) }}">{{ $chuong->sach->theLoai->ten_the_loai }}</a>
            </li>
            <li class="breadcrumb-item"><a
                    href="{{ route('chi-tiet-sach', $chuong->sach->id) }}">{{ $chuong->sach->ten_sach }}</a></li>
            <li class="breadcrumb-item"><a
                    href="{{ route('chi-tiet-chuong', [$chuong->sach->id,$chuong->id, $chuong->tieu_de]) }}">{{ $chuong->so_chuong }}
                    : {{ $chuong->tieu_de }}</a></li>
        </ol>
    </div>

@endsection
@push('scripts')

    <script src="{{ asset('assets/client/themes/truyenfull/echo/js/ajax/chuong.js') }}" type="text/javascript">
    </script>
    <script>
        $(document).on('click', '.chuong-link', function (e) {
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
                success: function (response) {
                    window.location.href = href;
                },
                error: function (xhr, status, error) {
                    window.location.href = href;
                }
            });

        });
    </script>
    <script>
        function setColor(backgroundColor, textColor) {
            document.documentElement.style.setProperty('--main-bg-color', backgroundColor);
            document.documentElement.style.setProperty('--main-text-color', textColor);
            localStorage.setItem('backgroundColor', backgroundColor);
            localStorage.setItem('textColor', textColor);
        }

        // Áp dụng màu khi tải lại trang
        document.addEventListener("DOMContentLoaded", function () {
            let savedBgColor = localStorage.getItem('backgroundColor') || '#FFFFFF';
            let savedTextColor = localStorage.getItem('textColor') || '#000000';
            document.documentElement.style.setProperty('--main-bg-color', savedBgColor);
            document.documentElement.style.setProperty('--main-text-color', savedTextColor);
        });

    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            if (window.incrementViewInitialized) return;
            window.incrementViewInitialized = true;

            setTimeout(function () {
                fetch("{{ route('luot-xem') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    body: JSON.stringify({
                        chuong_id: {{ $chuong->id }}
                    }),
                })
                    .then(response => response.json())
                    .then(data => console.log(data.message))
                    .catch(error => console.error("Lỗi khi tăng lượt xem:", error));
            }, 10000); // để 10s để test
        });
    </script>
    // Chức năng ghi chú
    <script>
        document.addEventListener('mouseup', function () {
            let selection = window.getSelection();
            let selectedText = selection.toString().trim();

            if (selectedText.length > 0) {
                document.getElementById('noteElementId').value = selectedText;
                document.getElementById('noteFormContainer').style.display = 'block';
            }
        });

        // Đóng form khi nhấn nút Đóng
        document.getElementById('closeNoteForm').addEventListener('click', function() {
            document.getElementById('noteFormContainer').style.display = 'none';
        });

        // Gửi form ghi chú khi người dùng nhấn Lưu
        document.getElementById('noteForm').addEventListener('submit', function (e) {
            e.preventDefault(); // Ngừng hành động mặc định của form

            let noteContent = document.getElementById('noteContent').value;
            let noteColor = document.getElementById('noteColor').value;
            let elementId = document.getElementById('noteElementId').value;
            let chapterId = document.getElementById('chapterId').value;
            let userId = {{ Auth::user()->id }};

            // Gửi Ajax lưu ghi chú
            fetch('/luu-ghi-chu', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    content: noteContent,
                    color: noteColor,
                    element_id: elementId,
                    chapter_id: chapterId,
                    user_id: userId
                })
            })
                .then(response => response.json())
                .then(data => {
                    console.log('Ghi chú đã được lưu:', data);
                    document.getElementById('noteFormContainer').style.display = 'none';
                    location.reload();
                })
                .catch(error => console.error('Lỗi:', error));
        });

        // Xóa ghi chú

        $(document).ready(function() {
            // Lấy CSRF token từ meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Xử lý sự kiện khi nhấp vào ghi chú
            $(document).on('click', '.highlight', function() {
                var noteId = $(this).data('id'); // Lấy id của ghi chú
                var confirmation = confirm('Bạn có chắc chắn muốn xóa ghi chú này?');

                if (confirmation) {
                    $.ajax({
                        url: '/ghi-chu/' + noteId,
                        type: 'DELETE',
                        data: {
                            "_token": csrfToken
                        },
                        success: function(response) {
                            if (response.success) {
                                alert(response.message);
                                $('span[data-id="' + noteId + '"]').remove();
                                location.reload();

                            } else {
                                alert('Lỗi: ' + response.message);
                            }
                        },
                        error: function() {
                            alert('Đã xảy ra lỗi, vui lòng thử lại.');
                        }
                    });
                }
            });
        });





    </script>

@endpush
@push('styles')
    <style>
        #noteFormContainer {
            display: none;
            position: fixed; /* Đảm bảo form luôn cố định trên màn hình */
            top: 50%; /* Đặt form ở vị trí giữa theo chiều dọc */
            left: 50%; /* Đặt form ở vị trí giữa theo chiều ngang */
            transform: translate(-50%, -50%); /* Dịch chuyển form để chính giữa hoàn hảo */
            z-index: 9999;
            background-color: white;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px; /* Chiều rộng của form */
            max-width: 90%; /* Giới hạn chiều rộng tối đa */
            border-radius: 8px;
            overflow: auto;
        }



        .color-option {
            width: 40px;
            height: 40px;
            display: inline-block;
            margin: 5px;
            cursor: pointer;
            border-radius: 50%;
        }

        :root {
            --main-bg-color: #FFFFFF; /* Màu nền mặc định */
            --main-text-color: #000000; /* Màu chữ mặc định */
        }

        /* Áp dụng màu sắc cho các phần tử website */
        body {
            background-color: var(--main-bg-color);
            color: var(--main-text-color);
        }

    </style>
@endpush

