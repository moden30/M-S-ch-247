@extends('admin.layouts.app')
@section('start-point')
    Quản lý Quyền/Vai trò
@endsection
@section('title')
    Danh sách vai trò
@endsection
@section('content')
    <div class="row">
        <!-- class="col-xl-9 col-lg-8" -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row g-4 align-items-center">
                            <div class="col-sm">
                                <div>
                                    <h5 class="card-title mb-0">Vai trò</h5>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <div class="d-flex flex-wrap align-items-start gap-2">
                                    <button class="btn btn-soft-danger" id="remove-actions" onClick="deleteMultiple()"><i
                                            class="ri-delete-bin-2-line"></i></button>
                                    <a href="{{ route('roles.create') }}" class="btn btn-success"> + Thêm vai trò mới</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div id="table-gridjs"></div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
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
            const theLoais = @json($theLoais);
            const roles = @json($roles);
            new gridjs.Grid({
                columns: [
                    {
                        name: "ID",
                        hidden: true,

                    },
                    {
                        name: "Vai trò",
                        width: "auto",
                        formatter: function(param, row) {
                            var id = row.cells[0].data;
                            var editUrl = `{{ route('roles.edit', ':id') }}`.replace(':id', id);
                            var detailUrl = `{{ route('roles.show', ':id') }}`.replace(':id',
                                id);
                            var deleteUrl = `{{ route('roles.destroy', ':id') }}`.replace(':id',
                                id);
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
                        }
                    },
                    {
                        name: "Mô tả",
                        width: "50%",
                        // formatter: (param) => {
                        //     return gridjs.html()
                        // }
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
                    },
                ],
                data: roles.map((role) => {
                    return [
                        role.id,
                        role.ten_vai_tro,
                        role.mo_ta,
                        role.trang_thai,
                    ];
                }),
                pagination: {
                    limit: 5
                },
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
            fetch(`/admin/vai-tro/${id}/update-status`, {
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
