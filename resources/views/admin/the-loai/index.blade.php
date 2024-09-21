@extends('admin.layouts.app')
@section('start-point')
    Quản lý thể loại
@endsection
@section('title')
    Danh sách thể loại
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h5 class="fs-16">Thêm thể loại mới</h5>

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
                        <form action="{{ route('the-loai.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Tên thể loại </label>
                                <input class="form-control @error('ten_the_loai') is-invalid @enderror" type="text" name="ten_the_loai" value="{{ old('ten_the_loai') }}">
                            </div>
                            <div class=" mt-3">
                                <label class="form-label">Ảnh đại diện</label>
                                <input class="form-control @error('anh_the_loai') is-invalid @enderror" type="file" name="anh_the_loai">
                            </div>
                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Mô tả ngắn </label>
                                <textarea class="form-control @error('mo_ta') is-invalid @enderror"  id="" cols="15" rows="3" name="mo_ta">{{ old('mo_ta') }}</textarea>
                            </div>
                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Trạng thái @error('trang_thai') is-invalid @enderror</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck3">
                                    <input type="hidden" name="trang_thai" id="trang_thai_hidden" value="Ẩn">
                                </div>
                            </div>
                            <div class="filter-choices-input mt-3">
                                <button type="submit" class="btn btn-sm btn-success">Thêm mới</button>
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
        <!-- end col -->        </div>
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

        document.addEventListener('DOMContentLoaded', function() {
            var checkbox = document.getElementById('SwitchCheck3');
            var hiddenInput = document.getElementById('trang_thai_hidden');
            hiddenInput.value = checkbox.checked ? 'Hiện' : 'Ẩn';
            checkbox.addEventListener('change', function() {
                hiddenInput.value = checkbox.checked ? 'Hiện' : 'Ẩn';
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var theLoais = @json($theLoais);
            new gridjs.Grid({
                columns: [
                    { name: "ID", width: "auto",
                        formatter: function (param, row) {
                            var id = row.cells[0].data;
                            var editUrl = `{{ route('the-loai.edit', ':id') }}`.replace(':id', id);
                            var detailUrl = `{{ route('the-loai.show', ':id') }}`.replace(':id', id);
                            var deleteUrl = `{{ route('the-loai.destroy', ':id') }}`.replace(':id', id);
                            return gridjs.html(` <b>${param}</b>
                                <div class="d-flex justify-content-start mt-2">
                                    <a href="${editUrl}" class="btn btn-link p-0">Sửa |</a>
                                    <a href="${detailUrl}" class="btn btn-link p-0">Xem |</a>
                                    <form action="${deleteUrl}" method="post">
                                    @csrf
                                    @method('delete')
                                     <button type="submit" class="btn btn-link p-0 text-danger" onclick="return confirm('Bạn có muốn xóa!')">Xóa</button>
                                    </form>
                                </div>
                    `);
                        }},
                    { name: "Tiêu thể loại", width: "auto",
                    },
                    { name: "Ảnh thể loại", width: "auto",
                        formatter: function (param) {
                            return gridjs.html(`<img src="{{ Storage::url('${param}') }}" alt="User Image" width="50px">`);
                        }
                    },
                    { name: "Thời gian sửa", width: "auto",
                        formatter: function (param) {
                            const date = new Date(param);
                            return `${date.getDate().toString().padStart(2, '0')}-${(date.getMonth() + 1).toString().padStart(2, '0')}-${date.getFullYear()}`;
                        },
                    },
                    { name: "Thời gian sửa", width: "auto",
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
                    }
                ],
                data: theLoais.map(function(item) {
                    return [
                        item.id,
                        item.ten_the_loai,
                        item.anh_the_loai,
                        item.created_at,
                        item.updated_at,
                        item.trang_thai,
                    ];
                }),
                pagination: { limit: 5 },
                sort: true,
                search: true,
            }).render(document.getElementById("table-gridjs"));
        });


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
            fetch(`/admin/the-loai/cap-nhat-trang-thai/${id}`, {
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

        .btn-group-sm .dropdown-menu {
            min-width: 100px; /* Tăng kích thước chiều rộng của menu */
        }

    </style>
@endpush
