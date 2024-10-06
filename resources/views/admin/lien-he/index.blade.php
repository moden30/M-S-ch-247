@extends('admin.layouts.app')
@section('start-point')
    Quản lý liên hệ
@endsection
@section('title')
    Danh sách
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class=" d-flex align-items-center flex-wrap gap-2">
                        <div class="col-3 flex-grow-1">
                            <div class="col-sm-2">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="text-muted">Trạng Thái: </span>
                                    <form method="GET" action="{{ route('lien-he.index') }}">
                                        <select class="form-select mb-0" name="status" onchange="this.form.submit()">
                                            <option value="">Tất cả</option>
                                            <option value="mo" {{ request('status') == 'mo' ? 'selected' : '' }}>Chưa hỗ
                                                trợ
                                            </option>
                                            <option value="dong" {{ request('status') == 'dong' ? 'selected' : '' }}>Đã
                                                hỗ trợ
                                            </option>
                                            <option
                                                value="dang_ho_tro" {{ request('status') == 'dang_ho_tro' ? 'selected' : '' }}>
                                                Đang hỗ trợ
                                            </option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
{{--                        <div class="flex-shrink-0">--}}
{{--                            <div class="hstack text-nowrap gap-2">--}}
{{--                                <button class="btn btn-soft-danger material-shadow-none" id="remove-actions"--}}
{{--                                        onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>--}}
{{--                                <button class="btn btn-danger material-shadow-none"><i--}}
{{--                                        class="ri-filter-2-line me-1 align-bottom"></i> Filters--}}
{{--                                </button>--}}
{{--                                <button class="btn btn-soft-success material-shadow-none">Import</button>--}}
{{--                                <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown"--}}
{{--                                        aria-expanded="false" class="btn btn-soft-info material-shadow-none"><i--}}
{{--                                        class="ri-more-2-fill"></i></button>--}}
{{--                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">--}}
{{--                                    <li><a class="dropdown-item" href="#">All</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Last Week</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Last Month</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Last Year</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-9">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="table-gridjs"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-3" id="lien-he-detail">
            <div class="card" >
                <div class="card-body text-center">
                <h5 class="mt-4 mb-1">Chọn một liên hệ để xem chi tiết</h5>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link href="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/gridjs/theme/mermaid.min.css') }}">

@endpush
@push('scripts')
    <script src="{{ asset('assets/admin/libs/list.js/list.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/pages/crm-contact.init.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/prismjs/prism.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/gridjs/gridjs.umd.js') }}"></script>

    <!--  Đây là chỗ hiển thị dữ liệu phân trang -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var list = @json($list);
            new gridjs.Grid({
                columns: [
                    {
                        name: "ID",
                        hidden: true,
                    },
                    {
                        name: "Chủ Đề", width: "auto",
                        formatter: function (param, row) {
                            var id = row.cells[0].data;
                            return gridjs.html(`<b>${param}</b>
                                <div class="d-flex justify-content-start mt-2">
                                    <a href="/admin/lien-he/${id}/form" class="btn btn-link p-0 lien-he-row" data-id="${id}">Phản Hồi</a>
                                </div>
                            `);
                        }
                    },
                    {name: "Tên Khách Hàng", width: "auto"},
                    {name: "Email", width: "auto"},
                    {
                        name: "Trạng thái",
                        width: "auto",
                        formatter: function (lien, row) {
                            let trangThaiViet = {
                                'mo': 'Chưa hỗ trợ',
                                'dang_ho_tro': 'Đang hỗ trợ',
                                'dong': 'Đã hỗ trợ'
                            };

                            let statusClass = '';
                            switch (lien) {
                                case 'mo':
                                    statusClass = 'status-chua-ho-tro';
                                    break;
                                case 'dang_ho_tro':
                                    statusClass = 'status-dang-ho-tro';
                                    break;
                                case 'dong':
                                    statusClass = 'status-da-ho-tro';
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
                                        <li><a class="dropdown-item" href="#" onclick="changeStatus(${row.cells[0].data}, 'mo')">Chưa hỗ trợ</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="changeStatus(${row.cells[0].data}, 'dang_ho_tro')">Đang hỗ trợ</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="changeStatus(${row.cells[0].data}, 'dong')">Đã hỗ trợ</a></li>
                                    </ul>
                                </div>
                            `);
                        }
                    },
                ],
                data: list.map(function (item) {
                    return [
                        item.id,
                        item.chu_de,
                        item.ten_khach_hang,
                        item.email,
                        item.trang_thai,
                    ];
                }),
                pagination: {limit: 5},
                sort: true,
                search: true,
            }).render(document.getElementById("table-gridjs"));

            // Hiển thị chi tiết
                const defaultImage = "{{ asset('assets/admin/images/users/user-dummy-img.jpg') }}";
            document.addEventListener('mouseover', function (event) {
                if (event.target.classList.contains('lien-he-row')) {
                    var id = event.target.getAttribute('data-id');
                    fetch(`/admin/lien-he/${id}`)
                        .then(response => response.json())
                        .then(data => {
                            const trangThai = {
                                'mo': 'Chưa hỗ trợ',
                                'dang_ho_tro': 'Đang hỗ trợ',
                                'dong': 'Đã hỗ trợ'
                            };

                            // Đường dẫn tới ảnh mặc định
                            // Đường dẫn tới ảnh mặc định (Blade sẽ xử lý trước khi JavaScript chạy)

                            const hinhAnh = data.tai_khoan.hinh_anh
                                ? `/storage/${data.tai_khoan.hinh_anh}` : defaultImage;


                            document.getElementById('lien-he-detail').innerHTML = `
                                <div class="card" >
                                    <div class="card-body text-center">
                                            <div class="position-relative d-inline-block">
                                                <img src="${hinhAnh}"
                                                     alt="Avatar"
                                                     class="avatar-lg rounded-circle img-thumbnail material-shadow">
                                                <span class="contact-active position-absolute rounded-circle bg-success">
                                                    <span class="visually-hidden"></span>
                                                </span>
                                            </div>
                                            <h5 class="mt-4 mb-1">${data.ten_khach_hang}</h5>
                                            <p class="text-muted">Ở đây sẽ hiện vai trò</p>

                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item avatar-xs">
                                                    <a href="/admin/lien-he/${id}/form" class="avatar-title bg-danger-subtle text-danger fs-15 rounded">
                                                        <i class="ri-mail-line"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body ">
                                            <h6 class="text-muted text-uppercase fw-semibold mb-3">THÔNG TIN CÁ NHÂN</h6>
                                            <div class="table-responsive table-card">
                                                <table class="table table-borderless mb-0 ms-3 me-3">
                                                    <tbody>
                                                        <tr class="row">
                                                            <td class="fw-medium col-lg-3" scope="row">Email</td>
                                                            <td class="col-lg-9">${data.email}</td>
                                                        </tr>
                                                        <tr class="row">
                                                            <td class="fw-medium col-3" scope="row">Chủ đề</td>
                                                            <td class="col-9">${data.chu_de}</td>
                                                        </tr>
                                                        <tr class="row">
                                                            <td class="fw-medium col-lg-3" scope="row">Nội dung</td>
                                                            <td class="col-lg-9">${data.noi_dung}</td>
                                                        </tr>
                                                        <tr class="row">
                                                            <td class="fw-medium col-lg-3" scope="row">Ảnh</td>
                                                            <td class="col-lg-9"><img src="${data.anh}" alt="" width="50px" height="50px"></td>
                                                        </tr>
                                                        <tr class="row">
                                                            <td class="fw-medium col-lg-3" scope="row">Trạng thái</td>
                                                            <td class="col-lg-9 trang-thai-chi-tiet">
                                                                ${trangThai[data.trang_thai]}
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                        `;
                        });
                }
            });
        });

        // Sử lý trỏ chuột
        function showStatusOptions(id) {
            document.getElementById('status-options-' + id).classList.remove('d-none');
        }

        // Sử lý trỏ chuột
        function hideStatusOptions(id) {
            document.getElementById('status-options-' + id).classList.add('d-none');
        }

        // Sử lý chuyển đổi trạng thái
        function changeStatus(id, newStatus) {
            if (!confirm('Bạn muốn thay đổi trạng thái liên hệ chứ?')) {
                return;
            }
            fetch(`/admin/lien-he/${id}/update-status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({status: newStatus})
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        let trangThaiViet = {
                            'mo': 'Chưa hỗ trợ',
                            'dang_ho_tro': 'Đang hỗ trợ',
                            'dong': 'Đã hỗ trợ'
                        };
                        let statusClass = '';
                        switch (newStatus) {
                            case 'mo':
                                statusClass = 'status-chua-ho-tro';
                                break;
                            case 'dang_ho_tro':
                                statusClass = 'status-dang-ho-tro';
                                break;
                            case 'dong':
                                statusClass = 'status-da-ho-tro';
                                break;
                        }

                        // Cập nhật trạng thái của nút và mũi tên
                        let statusButton = document.querySelector(`#status-${id} .btn`);
                        let dropdownToggle = document.querySelector(`#status-${id} .dropdown-toggle`);

                        statusButton.className = `btn ${statusClass}`;
                        statusButton.textContent = trangThaiViet[newStatus];

                        // Cập nhật màu sắc của mũi tên
                        dropdownToggle.className = `btn ${statusClass} dropdown-toggle dropdown-toggle-split`;
                        dropdownToggle.style.borderTopColor = statusButton.style.color; // Cập nhật màu của mũi tên

                        // Cập nhật trạng thái trong phần chi tiết
                        let trangThaiChiTiet = document.querySelector('#lien-he-detail td.trang-thai-chi-tiet');
                        if (trangThaiChiTiet) {
                            trangThaiChiTiet.textContent = trangThaiViet[newStatus];
                        }

                        hideStatusOptions(id);
                    } else {
                        alert('Không thể cập nhật trạng thái này.');
                    }
                });
        }
    </script>

    {{-- CSS sử lý chuyển đổi trạng thái --}}
    <style>
        /* Màu của nút */
        .status-chua-ho-tro {
            background-color: #B0B0B0;
            color: #fff;
        }

        .status-dang-ho-tro {
            background-color: #ffc107;
            color: #fff;
        }

        .status-da-ho-tro {
            background-color: #28A745;
            color: #fff;
        }

        /* Màu của nút */
        .status-chua-ho-tro:hover {
            background-color: #B0B0B0;
            color: #fff;

        }

        .status-dang-ho-tro:hover {
            background-color: #ffc107;
            color: #fff;

        }

        .status-da-ho-tro:hover {
            background-color: #28A745;
            color: #fff;

        }

        /* Màu của mũi tên khi chuyển đổi trạng thái */
        .status-chua-ho-tro .dropdown-toggle::after {
            border-top-color: #fff;
        }

        .status-dang-ho-tro .dropdown-toggle::after {
            border-top-color: #fff;
        }

        .status-da-ho-tro .dropdown-toggle::after {
            border-top-color: #fff;
        }

        /* Màu nền */
        .status-chua-ho-tro .dropdown-menu {
            background-color: #B0B0B0;
        }

        .status-dang-ho-tro .dropdown-menu {
            background-color: #FFC107;
        }

        .status-da-ho-tro .dropdown-menu {
            background-color: #28A745;
        }

        .btn-group-sm .btn {
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            height: 1.5rem;
        }

        .dropdown-menu {
            font-size: 0.75rem;
        }

        .btn-group-sm .dropdown-menu {
            min-width: 80px;
        }


    </style>

@endpush
