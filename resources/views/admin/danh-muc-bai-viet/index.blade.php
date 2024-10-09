@extends('admin.layouts.app')
@section('start-point')
    Quản lý danh mục bài viết
@endsection
@section('title')
    Danh sách danh mục bài viết
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <h5 class="fs-16">Thêm chuyên mục bài viết</h5>
                            <!-- Thông báo khi thêm thành công -->
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="ri-notification-off-line label-icon"></i>
                                    <strong class="fs-5">{{ session('success') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <!-- Thông báo khi thêm thất bại -->
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="ri-error-warning-line label-icon"></i>
                                    <strong class="fs-5">Thất bại</strong>
                                    <strong class="d-block">Vui lòng kiểm tra các lỗi sau:</strong>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="accordion accordion-flush filter-accordion">
                    <div class="card-body border-bottom">
                        <form action="{{ route('chuyen-muc.store') }}" method="post">
                            @csrf
                            <div class="filter-choices-input">
                                <label class="form-label">Tên Chuyên Mục</label>
                                <input class="form-control @error('ten_chuyen_muc') is-invalid @enderror" name="ten_chuyen_muc" type="text" value="{{ old('ten_chuyen_muc') }}">
                                @error('ten_chuyen_muc')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Chuyên Mục Cha</label>
                                <select class="form-control" name="chuyen_muc_cha_id">
                                    <option value="">Không có</option>
                                    @foreach($chuyen_mucs as $chuyen_muc)
                                        <option value="{{ $chuyen_muc->id }}">{{ $chuyen_muc->ten_chuyen_muc }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <label class="form-check-label mt-3" for="SwitchCheck3">Trạng thái</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="trang_thai" id="SwitchCheck3" checked>
                            </div>

                            <div class="filter-choices-input mt-3 text-end">
                                <button type="submit" class="btn btn-sm btn-success">Thêm</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-9 col-lg-8">
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
        document.getElementById("table-gridjs") && new gridjs.Grid({
            columns: [
                {
                    name: "ID", hidden: true,

                },
                {
                    name: "Tên Chuyên Mục", width: "auto",
                    formatter: function (e, row) {
                        var id = row.cells[0].data;
                        let sua = `{{ route('chuyen-muc.edit', ':id') }}`.replace(':id', id);
                        let xem = `{{ route('chuyen-muc.show', ':id') }}`.replace(':id', id);
                        // <a href="${xem}" class="btn btn-link p-0">Xem |</a>
                        let xoa = `{{ route('chuyen-muc.destroy', ':id') }}`.replace(':id', id);

                        let csrfToken = '{{ csrf_token() }}';
                        return gridjs.html(`
                            <div class="flex-grow-1">
                                <span class="fw-semibold">${e}</span>
                            </div>
                            <div class="d-flex justify-content-start mt-2">
                                <a href="${sua}" class="btn btn-link p-0">Sửa |</a>
                                <form action="${xoa}" method="POST" style="display:inline;">
                                    <input type="hidden" name="_token" value="${csrfToken}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-link p-0 text-danger" onclick="return confirm('Bạn có muốn xóa không?')">Xóa</button>
                                </form>
                            </div>
                        `);
                    }
                },
                {
                    name: "Chuyên Mục Cha", width: "auto",
                    formatter: function (e) {
                        return gridjs.html(`<a href="">${e}</a>`);
                    }
                },
                {
                    name: "Trạng Thái",
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
                }

            ],
            pagination: { limit: 5 },
            sort: true,
            search: true,
            data: [
                    @foreach($chuyen_mucs as $chuyen_muc)
                [
                    '{{ $chuyen_muc->id }}',
                    '{{ $chuyen_muc->ten_chuyen_muc }}',
                    '{{ $chuyen_muc->chuyenMucCha ? $chuyen_muc->chuyenMucCha->ten_chuyen_muc : "Không có" }}',
                    '{{ $chuyen_muc->trang_thai }}',
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
            fetch(`/admin/chuyen-muc/cap-nhat-trang-thai/${id}`, {
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
