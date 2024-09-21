@extends('admin.layouts.app')
@section('start-point')
    Quản lý sách
@endsection
@section('title')
    Danh sách
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <h5 class="fs-16">Bộ lọc</h5>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="#" class="text-decoration-underline" id="clearall">Xóa tất cả</a>
                        </div>
                    </div>
                </div>

                <div class="accordion accordion-flush filter-accordion">

                    <div class="card-body border-bottom">
                        <div>
                            <p class="text-muted text-uppercase fs-12 fw-medium mb-2">Chuyên Mục</p>
                            <ul class="list-unstyled mb-0 filter-list">
                                @foreach($chuyenMucs as $item)
                                    <li>
                                        <a href="{{ route('bai-viet.index', ['chuyen_muc_id' => $item->id]) }}"
                                           class="d-flex py-1 align-items-center">
                                            <div class="flex-grow-1">
                                                <h5 class="fs-13 mb-0 listname">{{ $item->ten_chuyen_muc }}</h5>
                                            </div>
                                            <div class="flex-shrink-0 ms-2">
                                                <span
                                                    class="badge bg-light text-muted">{{ $item->baiViets->count() }}</span>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="card-body border-bottom">
                        <div class="row">
                            <p class="text-muted text-uppercase fs-12 fw-medium mb-2">Lọc theo khoảng thời gian</p>
                            <form action="{{ route('bai-viet.index') }}" method="GET">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Từ ngày</span>
                                    <input type="date" class="form-control" name="from_date"
                                           value="{{ request()->get('from_date') }}">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Đến ngày</span>
                                    <input type="date" class="form-control" name="to_date"
                                           value="{{ request()->get('to_date') }}">
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Lọc</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingDiscount">
                            <button class="accordion-button bg-transparent shadow-none collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseDiscount"
                                    aria-expanded="true" aria-controls="flush-collapseDiscount">
                                <span class="text-muted text-uppercase fs-12 fw-medium">Lọc theo tên tác giả</span>
                                <span class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>
                            </button>
                        </h2>
                        <div id="flush-collapseDiscount" class="accordion-collapse collapse"
                             aria-labelledby="flush-headingDiscount">
                            <div class="accordion-body text-body pt-1">
                                <ul class="list-unstyled mb-0 filter-list">
                                    @foreach($tacGias as $item)
                                        <li>
                                            <a href="{{ route('bai-viet.index', ['user_id' => $item->id]) }}"
                                               class="d-flex py-1 align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="fs-13 mb-0 listname">{{ $item->ten_doc_gia }}</h5>
                                                </div>
                                                <div class="flex-shrink-0 ms-2">
                                                    <span
                                                        class="badge bg-light text-muted">{{ $item->baiViets->count() }}</span>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-9 col-lg-8">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">

                        <h4 class="card-title mb-0 flex-grow-1">Danh sách </h4>

                        <div class="flex-shrink-0">
                            <a href="{{ route('bai-viet.create') }}" class="btn btn-success"><i
                                    class="ri-add-line align-bottom me-1"></i> Thêm bài viết mới</a>
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div id="table-gridjs"></div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@push('styles')
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/gridjs/theme/mermaid.min.css') }}">

@endpush
@push('scripts')
    <!-- prismjs plugin -->
    <script src="{{ asset('assets/admin/libs/prismjs/prism.js') }}"></script>

    <!-- gridjs js -->
    <script src="{{ asset('assets/admin/libs/gridjs/gridjs.umd.js') }}"></script>
    <!--  Đây là chỗ hiển thị dữ liệu phân trang -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var baiviets = @json($baiviets);
            var mauTrangThai = @json($mau_trang_thai);
            var trangThai = @json($trang_thai);
            new gridjs.Grid({
                columns: [
                    {
                        name: "ID", width: "auto",
                        formatter: function (param, row) {
                            var id = row.cells[0].data;
                            var editUrl = `{{ route('bai-viet.edit', ':id') }}`.replace(':id', id);
                            var detailUrl = `{{ route('bai-viet.show', ':id') }}`.replace(':id', id);
                            var deleteUrl = `{{ route('bai-viet.destroy', ':id') }}`.replace(':id', id);
                            return gridjs.html(` <b>${param}</b>
                                <div class="d-flex justify-content-start mt-2">
                                    <a href="${editUrl}" class="btn btn-link p-0">Sửa |</a>
                                    <a href="${detailUrl}" class="btn btn-link p-0">Xem |</a>
                                       <form action="${deleteUrl}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-link p-0 text-danger" onclick="return confirm('Bạn có muốn xóa bài viết!')">Xóa</button>
                                       </form>
                                </div>
                            `);
                        }
                    },
                    {
                        name: "Tiêu đề bài viết", width: "auto",
                    },
                    {name: "Tác giả", width: "auto"},

                    {
                        name: "Chuyên mục", width: "auto",
                    },
                    {
                        name: "Ngày đăng", width: "auto",
                        formatter: function (param) {
                            const date = new Date(param);
                            return `${date.getDate().toString().padStart(2, '0')}-${(date.getMonth() + 1).toString().padStart(2, '0')}-${date.getFullYear()}`;
                        }
                    },
                    {
                        name: "Trạng thái", width: "auto",
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
                    },
                ],
                data: baiviets.map(function (item) {
                    return [
                        item.id,
                        item.tieu_de,
                        item.tac_gia.ten_doc_gia,
                        item.chuyen_muc ? item.chuyen_muc.ten_chuyen_muc : 'Chưa phân loại',
                        item.ngay_dang,
                        item.trang_thai,
                    ];
                }),
                pagination: {limit: 5},
                sort: true,
                search: true,
            }).render(document.getElementById("table-gridjs"));
        });

        // Xử lý trỏ chuột
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
            fetch(`/admin/bai-viet/cap-nhat-trang-thai/${id}`, {
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

        .dropdown-toggle-split::after {
            display: none;
        }

        .btn-group-sm .dropdown-menu {
            min-width: 100px; /* Tăng kích thước chiều rộng của menu */
        }

    </style>
@endpush
