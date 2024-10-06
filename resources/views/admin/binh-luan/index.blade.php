@extends('admin.layouts.app')
@section('start-point')
    Quản lý bình luận
@endsection
@section('title')
    Danh sách bình luận
@endsection
@section('content')
    <div class="row">

        <!-- end col -->

        <div class="col-xl-12 col-lg-8">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0 flex-grow-1">Danh sách </h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div id="table-gridjs"></div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@push('styles')
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/gridjs/theme/mermaid.min.css') }}">
    <style>
        .tooltip-content {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .tooltip-content .tooltip-text {
            visibility: hidden;
            width: 300px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            top: 125%;
            /* Hiển thị tooltip phía dưới */
            left: 50%;
            margin-left: -150px;
            /* Căn giữa tooltip */
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip-content:hover .tooltip-text {
            visibility: visible;
            opacity: 1;
        }
    </style>
@endpush
@push('scripts')
    <!-- prismjs plugin -->
    <script src="{{ asset('assets/admin/libs/prismjs/prism.js') }}"></script>

    <!-- gridjs js -->
    <script src="{{ asset('assets/admin/libs/gridjs/gridjs.umd.js') }}"></script>
    <!--  Đây là chỗ hiển thị dữ liệu phân trang -->

    <script>
        document.getElementById("table-gridjs") && new gridjs.Grid({
            columns: [{
                name: "ID",
                hidden: true,
            }, {
                name: "Độc giả",
                width: "auto",
                formatter: function(e, row) {
                    let id = row.cells[0].data;
                    let detailUrl = "{{ route('binh-luan.detail', ':id') }}".replace(':id', id);

                    return gridjs.html(`
                        <span class="fw-semibold">${e}</span>
                        <div class="d-flex justify-content-start mt-2">
                            <a href="${detailUrl}" class="btn btn-link p-0">Xem chi tiết</a>
                        </div>
                    `);
                }

            }, {
                name: "Bài viết",
                width: "auto",
                formatter: function(e) {
                    return gridjs.html('<span >' + e + "</span>")
                }
            }, {
                name: "Nội dung bình luận",
                width: "auto",
                formatter: function(e) {
                    const truncatedText = e.split(' ').slice(0, 10).join(' ') + (e.split(' ').length >
                        10 ? '...' : '');

                    return gridjs.html(`
                    <div class="tooltip-content">
                        <span>${truncatedText}</span>
                        <div class="tooltip-text">${e}</div>
                    </div>
                `);
                }
            }, {
                name: "Ngày bình luận",
                width: "auto",
                formatter: function(e) {
                    return gridjs.html('<span>' + e + "</span>")
                }
            },
            {
                name: "Trạng thái",
                width: "auto",
                formatter: function (lien, row) {
                    let trangThaiViet = {
                        'an': 'Ẩn',
                        'hien': 'Hiện'
                    };

                    let statusClass = '';
                    switch (lien) {
                        case 'an':
                            statusClass = 'status-an';
                            break;
                        case 'hien':
                            statusClass = 'status-hien';
                            break;
                    }

                    return gridjs.html(`
                                <div class="btn-group btn-group-sm" id="status-${row.cells[0].data}"
                                    onmouseover="showStatusOptions(${row.cells[0].data})"
                                    onmouseout="hideStatusOptions(${row.cells[0].data})">

                                    <button type="button" class="btn ${statusClass}">${trangThaiViet[lien]}</button>
                                    <button type="button" class="btn ${statusClass} dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" id="status-options-${row.cells[0].data}">
                                        <li><a class="dropdown-item" href="#" onclick="changeStatus(${row.cells[0].data}, 'an')">Ẩn</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="changeStatus(${row.cells[0].data}, 'hien')">Hiện</a></li>
                                    </ul>
                                </div>
                            `);
                }
            }],
            pagination: {
                limit: 5
            },
            sort: true,
            search: true,
            data: [
                @foreach ($binhLuans as $binhLuan)
                    [
                        '{{ $binhLuan->id }}',
                        '{{ $binhLuan->user->ten_doc_gia }}',
                        '{{ $binhLuan->baiViet->tieu_de }}',
                        '{{ $binhLuan->noi_dung }}',
                        '{{ \Carbon\Carbon::parse($binhLuan->ngay_binh_luan)->format('d/m/Y') }}',
                        '{{ $binhLuan->trang_thai }}',
                    ],
                @endforeach
            ]
        }).render(document.getElementById("table-gridjs"));

        function showStatusOptions(id) {
            document.getElementById('status-options-' + id).classList.remove('d-none');
        }

        // Xử lý trỏ chuột
        function hideStatusOptions(id) {
            document.getElementById('status-options-' + id).classList.add('d-none');
        }

        // Xử lý chuyển đổi trạng thái
        function changeStatus(id, newStatus) {
            if (!confirm('Bạn muốn thay đổi trạng thái cập nhật chứ?')) {
                return;
            }
            fetch(`/admin/binh-luan/${id}/update-status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ status: newStatus })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        let trangThaiViet = {
                            'an': 'Ẩn',
                            'hien': 'Hiện'
                        };
                        let statusClass = newStatus === 'an' ? 'status-an' : 'status-hien';

                        let statusButton = document.querySelector(`#status-${id} .btn`);
                        let dropdownToggle = document.querySelector(`#status-${id} .dropdown-toggle`);
                        statusButton.className = `btn ${statusClass}`;
                        statusButton.textContent = trangThaiViet[newStatus];
                        dropdownToggle.className = `btn ${statusClass} dropdown-toggle dropdown-toggle-split`;
                        hideStatusOptions(id);
                    } else {
                        alert('Không thể cập nhật trạng thái này.');
                    }
                });
        }
    </script>

    <style>
        /* Màu của nút */
        .status-an {
            background-color: red; /* Màu đỏ cho trạng thái Ẩn */
            color: #fff;
        }

        .status-hien {
            background-color: green; /* Màu xanh cho trạng thái Hiện */
            color: #fff;
        }

        /* Giữ nguyên màu khi hover */
        .status-an:hover {
            background-color: red; /* Giữ nguyên màu đỏ cho nút trạng thái Ẩn */
            color: #fff;
        }

        .status-hien:hover {
            background-color: green; /* Giữ nguyên màu xanh cho nút trạng thái Hiện */
            color: #fff;
        }

        /* Màu nền dropdown */
        .status-an .dropdown-menu {
            background-color: red;
        }

        .status-hien .dropdown-menu {
            background-color: green;
        }

        /* Mũi tên của dropdown */
        .status-an .dropdown-toggle::after,
        .status-hien .dropdown-toggle::after {
            border-top-color: #fff;
        }

        .btn-group-sm .dropdown-menu {
            min-width: 100px; /* Tăng kích thước chiều rộng của menu */
        }

    </style>
@endpush
