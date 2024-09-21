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

                    <div class="filter-choices-input">
                        <input class="form-control" data-choices data-choices-removeItem type="text"
                               id="filter-choices-input" placeholder="Nhập tên sách"/>
                    </div>
                </div>

                <div class="accordion accordion-flush filter-accordion">

                    <div class="card-body border-bottom">
                        <div>
                            <p class="text-muted text-uppercase fs-12 fw-medium mb-2">Thể loại</p>
                            <ul class="list-unstyled mb-0 filter-list">
                                <li>
                                    <a href="#" class="d-flex py-1 align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="fs-13 mb-0 listname">Grocery</h5>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex py-1 align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="fs-13 mb-0 listname">Fashion</h5>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <span class="badge bg-light text-muted">5</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex py-1 align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="fs-13 mb-0 listname">Watches</h5>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex py-1 align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="fs-13 mb-0 listname">Electronics</h5>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <span class="badge bg-light text-muted">5</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex py-1 align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="fs-13 mb-0 listname">Furniture</h5>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <span class="badge bg-light text-muted">6</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex py-1 align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="fs-13 mb-0 listname">Automotive Accessories</h5>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex py-1 align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="fs-13 mb-0 listname">Appliances</h5>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <span class="badge bg-light text-muted">7</span>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="d-flex py-1 align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="fs-13 mb-0 listname">Kids</h5>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-body border-bottom">
                        <p class="text-muted text-uppercase fs-12 fw-medium mb-4">Price</p>

                        <div id="product-price-range"></div>
                        <div class="formCost d-flex gap-2 align-items-center mt-3">
                            <input class="form-control form-control-sm" type="text" id="minCost" value="0"/> <span
                                class="fw-semibold text-muted">to</span> <input class="form-control form-control-sm"
                                                                                type="text" id="maxCost" value="1000"/>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingBrands">
                            <button class="accordion-button bg-transparent shadow-none" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseBrands"
                                    aria-expanded="true" aria-controls="flush-collapseBrands">
                                <span class="text-muted text-uppercase fs-12 fw-medium">Brands</span> <span
                                    class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>
                            </button>
                        </h2>

                        <div id="flush-collapseBrands" class="accordion-collapse collapse show"
                             aria-labelledby="flush-headingBrands">
                            <div class="accordion-body text-body pt-0">
                                <div class="search-box search-box-sm">
                                    <input type="text" class="form-control bg-light border-0" id="searchBrandsList"
                                           placeholder="Search Brands...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                                <div class="d-flex flex-column gap-2 mt-3 filter-check">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Boat"
                                               id="productBrandRadio5" checked>
                                        <label class="form-check-label" for="productBrandRadio5">Boat</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="OnePlus"
                                               id="productBrandRadio4">
                                        <label class="form-check-label" for="productBrandRadio4">OnePlus</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Realme"
                                               id="productBrandRadio3">
                                        <label class="form-check-label" for="productBrandRadio3">Realme</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Sony"
                                               id="productBrandRadio2">
                                        <label class="form-check-label" for="productBrandRadio2">Sony</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="JBL"
                                               id="productBrandRadio1" checked>
                                        <label class="form-check-label" for="productBrandRadio1">JBL</label>
                                    </div>

                                    <div>
                                        <button type="button"
                                                class="btn btn-link text-decoration-none text-uppercase fw-medium p-0">
                                            1,235
                                            More
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end accordion-item -->

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingDiscount">
                            <button class="accordion-button bg-transparent shadow-none collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseDiscount"
                                    aria-expanded="true" aria-controls="flush-collapseDiscount">
                                <span class="text-muted text-uppercase fs-12 fw-medium">Discount</span> <span
                                    class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>
                            </button>
                        </h2>
                        <div id="flush-collapseDiscount" class="accordion-collapse collapse"
                             aria-labelledby="flush-headingDiscount">
                            <div class="accordion-body text-body pt-1">
                                <div class="d-flex flex-column gap-2 filter-check">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="50% or more"
                                               id="productdiscountRadio6">
                                        <label class="form-check-label" for="productdiscountRadio6">50% or more</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="40% or more"
                                               id="productdiscountRadio5">
                                        <label class="form-check-label" for="productdiscountRadio5">40% or more</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="30% or more"
                                               id="productdiscountRadio4">
                                        <label class="form-check-label" for="productdiscountRadio4">
                                            30% or more
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="20% or more"
                                               id="productdiscountRadio3" checked>
                                        <label class="form-check-label" for="productdiscountRadio3">
                                            20% or more
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="10% or more"
                                               id="productdiscountRadio2">
                                        <label class="form-check-label" for="productdiscountRadio2">
                                            10% or more
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Less than 10%"
                                               id="productdiscountRadio1">
                                        <label class="form-check-label" for="productdiscountRadio1">
                                            Less than 10%
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end accordion-item -->

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingRating">
                            <button class="accordion-button bg-transparent shadow-none collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseRating"
                                    aria-expanded="false" aria-controls="flush-collapseRating">
                                <span class="text-muted text-uppercase fs-12 fw-medium">Rating</span> <span
                                    class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>
                            </button>
                        </h2>

                        <div id="flush-collapseRating" class="accordion-collapse collapse"
                             aria-labelledby="flush-headingRating">
                            <div class="accordion-body text-body">
                                <div class="d-flex flex-column gap-2 filter-check">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="4 & Above Star"
                                               id="productratingRadio4" checked>
                                        <label class="form-check-label" for="productratingRadio4">
                                                            <span class="text-muted">
                                                                <i class="mdi mdi-star text-warning"></i>
                                                                <i class="mdi mdi-star text-warning"></i>
                                                                <i class="mdi mdi-star text-warning"></i>
                                                                <i class="mdi mdi-star text-warning"></i>
                                                                <i class="mdi mdi-star"></i>
                                                            </span> 4 & Above
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="3 & Above Star"
                                               id="productratingRadio3">
                                        <label class="form-check-label" for="productratingRadio3">
                                                            <span class="text-muted">
                                                                <i class="mdi mdi-star text-warning"></i>
                                                                <i class="mdi mdi-star text-warning"></i>
                                                                <i class="mdi mdi-star text-warning"></i>
                                                                <i class="mdi mdi-star"></i>
                                                                <i class="mdi mdi-star"></i>
                                                            </span> 3 & Above
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="2 & Above Star"
                                               id="productratingRadio2">
                                        <label class="form-check-label" for="productratingRadio2">
                                                            <span class="text-muted">
                                                                <i class="mdi mdi-star text-warning"></i>
                                                                <i class="mdi mdi-star text-warning"></i>
                                                                <i class="mdi mdi-star"></i>
                                                                <i class="mdi mdi-star"></i>
                                                                <i class="mdi mdi-star"></i>
                                                            </span> 2 & Above
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1 Star"
                                               id="productratingRadio1">
                                        <label class="form-check-label" for="productratingRadio1">
                                                            <span class="text-muted">
                                                                <i class="mdi mdi-star text-warning"></i>
                                                                <i class="mdi mdi-star"></i>
                                                                <i class="mdi mdi-star"></i>
                                                                <i class="mdi mdi-star"></i>
                                                                <i class="mdi mdi-star"></i>
                                                            </span> 1
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end accordion-item -->
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
                            <a href="{{ route('sach.create') }}" class="btn btn-success"><i
                                    class="ri-add-line align-bottom me-1"></i> Thêm mới sách</a>
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
            var saches = @json($saches);
            var mauTrangThai = @json($mau_trang_thai);
            var tinhTrangCapNhat = @json($tinh_trang_cap_nhat);
            var kiemDuyet = @json($kiem_duyet);
            var trangThai = @json($trang_thai);
            new gridjs.Grid({
                columns: [
                    {
                        name: "ID", hidden: true,
                    },
                    {
                        name: "Tiêu đề sách", width: "auto",
                        formatter: function (param, row) {
                            var id = row.cells[0].data;
                            var editUrl = `{{ route('sach.edit', ':id') }}`.replace(':id', id);
                            var detailUrl = `{{ route('sach.show', ':id') }}`.replace(':id', id);
                            var deleteUrl = `{{ route('sach.destroy', ':id') }}`.replace(':id', id);
                            return gridjs.html(` <b>${param}</b>
                                <div class="d-flex justify-content-start mt-2">
                                    <a href="${editUrl}" class="btn btn-link p-0">Sửa |</a>
                                    <a href="${detailUrl}" class="btn btn-link p-0">Xem |</a>
                                       <form action="${deleteUrl}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-link p-0 text-danger" onclick="return confirm('Bạn có muốn xóa sách!')">Xóa</button>
                                       </form>
                                </div>
                            `);
                        }
                    },
                    {
                        name: "Thể loại", width: "auto",
                    },
                    {
                        name: "Ngày đăng", width: "auto",
                        formatter: function (param) {
                            const date = new Date(param);
                            return `${date.getDate().toString().padStart(2, '0')}-${(date.getMonth() + 1).toString().padStart(2, '0')}-${date.getFullYear()}`;
                        }
                    },
                    {name: "Tác giả", width: "auto"},
                    {
                        name: "Tình trạng cập nhật", width: "auto",
                        formatter: function (lien, row) {
                            let trangThaiViet = {
                                'da_full': 'Đã Full',
                                'tiep_tuc_cap_nhat': 'Tiếp Tục Cập Nhật'
                            };

                            let statusClass = lien === 'da_full' ? 'status-da_full' : 'status-tiep_tuc_cap_nhat';

                            return gridjs.html(`
                                <div class="btn-group btn-group-sm" id="update-status-${row.cells[0].data}"
                                    onmouseover="showStatusOptions(${row.cells[0].data})"
                                    onmouseout="hideStatusOptions(${row.cells[0].data})">

                                    <button type="button" class="btn ${statusClass}">${trangThaiViet[lien]}</button>
                                    <button type="button" class="btn ${statusClass} dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" id="status-options-${row.cells[0].data}">
                                        <li><a class="dropdown-item" href="#" onclick="tinhTrangCapNhat(${row.cells[0].data}, 'da_full')">Đã Full</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="tinhTrangCapNhat(${row.cells[0].data}, 'tiep_tuc_cap_nhat')">Tiếp Tục Cập Nhật</a></li>
                                    </ul>
                                </div>
                            `);
                        }
                    },
                    {
                        name: "Tình trạng kiểm duyệt", width: "auto",
                        formatter: function (lien, row) {
                            let trangThaiViet = {
                                'cho_xac_nhan': 'Chờ Xác Nhận',
                                'tu_choi': 'Từ Chối',
                                'duyet': 'Duyệt',
                                'ban_nhap': 'Bản Nháp'
                            };

                            let statusClass = '';
                            switch (lien){
                                case 'cho_xac_nhan':
                                    statusClass = 'status-cho_xac_nhan';
                                    break;
                                case 'tu_choi':
                                    statusClass = 'status-tu_choi';
                                    break
                                case 'duyet':
                                    statusClass = 'status-duyet';
                                    break;
                                case 'ban_nhap':
                                    statusClass = 'status-ban_nhap';
                                    break;
                            }

                            return gridjs.html(`
                                <div class="btn-group btn-group-sm" id="update-${row.cells[0].data}"
                                    onmouseover="showStatusOptions(${row.cells[0].data})"
                                    onmouseout="hideStatusOptions(${row.cells[0].data})">

                                    <button type="button" class="btn ${statusClass}">${trangThaiViet[lien]}</button>
                                    <button type="button" class="btn ${statusClass} dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" id="status-options-${row.cells[0].data}">
                                        <li><a class="dropdown-item" href="#" onclick="tinhKiemDuyet(${row.cells[0].data}, 'cho_xac_nhan')">Chờ Xác Nhận</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="tinhKiemDuyet(${row.cells[0].data}, 'tu_choi')">Từ Chối</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="tinhKiemDuyet(${row.cells[0].data}, 'duyet')">Duyệt</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="tinhKiemDuyet(${row.cells[0].data}, 'ban_nhap')">Bản Nháp</a></li>
                                    </ul>
                                </div>
                            `);
                        }
                    },
                    {
                        name: "Trạng thái", width: "auto",
                        formatter: function (lien, row) {
                            let trangThaiViet = {
                                'an': 'Ẩn',
                                'hien': 'Hiện'
                            };

                            let statusClass = lien === 'an' ? 'status-an' : 'status-hien';

                            return gridjs.html(`
                                <div class="btn-group btn-group-sm" id="visibility-status-${row.cells[0].data}"
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
                data: saches.map(function (item) {
                    return [
                        item.id,
                        item.ten_sach,
                        item.the_loai ? item.the_loai.ten_the_loai : 'Chưa phân loại',
                        item.ngay_dang,
                        item.tac_gia,
                        item.tinh_trang_cap_nhat,
                        item.kiem_duyet,
                        item.trang_thai,
                    ];
                }),
                pagination: {limit: 5},
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

        // Xử lý chuyển đổi trạng thái Ẩn & Hiện
        function changeStatus(id, newStatus) {
            if (!confirm('Bạn muốn thay đổi trạng thái cập nhật chứ?')) {
                return;
            }
            fetch(`/admin/sach/an-hien/${id}`, {
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
                        let statusButton = document.querySelector(`#visibility-status-${id} .btn`);
                        statusButton.className = `btn ${statusClass}`;
                        statusButton.textContent = trangThaiViet[newStatus];
                        hideStatusOptions(id);
                    } else {
                        alert('Không thể cập nhật trạng thái này.');
                    }
                });
        }

        // Xử lý tình trạng cập nhật
        function tinhTrangCapNhat(id, newStatus) {
            if (!confirm('Bạn muốn thay đổi trạng thái tình trạng cập nhật chứ?')) {
                return;
            }

            fetch(`/admin/sach/cap-nhat/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ status: newStatus })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.thanh_cong) {
                        let trangThaiViet = {
                            'da_full': 'Đã Full',
                            'tiep_tuc_cap_nhat': 'Tiếp Tục Cập Nhật'
                        };
                        let statusClass = newStatus === 'da_full' ? 'status-da_full' : 'status-tiep_tuc_cap_nhat';
                        let statusButton = document.querySelector(`#update-status-${id} .btn`);
                        statusButton.className = `btn ${statusClass}`;
                        statusButton.textContent = trangThaiViet[newStatus];
                        hideStatusOptions(id);
                    } else {
                        alert('Không thể cập nhật trạng thái này.');
                    }
                });
        }

        // Xử lý tình trạng kiểm duyệt
        function tinhKiemDuyet(id, newStatus) {
            if (!confirm('Bạn muốn thay đổi trạng thái kiểm duyệt chứ?')) {
                return;
            }
            fetch(`/admin/sach/tinh-trang-cap-nhat/${id}`, {
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
                            'cho_xac_nhan': 'Chờ Xác Nhận',
                            'tu_choi': 'Từ Chối',
                            'duyet': 'Duyệt',
                            'ban_nhap': 'Bản Nháp'
                        };
                        let statusClass = '';
                        switch (newStatus){
                            case 'cho_xac_nhan':
                                statusClass = 'status-cho_xac_nhan';
                                break;
                            case 'tu_choi':
                                statusClass = 'status-tu_choi';
                                break
                            case 'duyet':
                                statusClass = 'status-duyet';
                                break;
                            case 'ban_nhap':
                                statusClass = 'status-ban_nhap';
                                break;
                        }

                        // Cập nhật trạng thái của nút và mũi tên
                        let statusButton = document.querySelector(`#update-${id} .btn`);
                        let dropdownToggle = document.querySelector(`#update-${id} .dropdown-toggle`);

                        statusButton.className = `btn ${statusClass}`;
                        statusButton.textContent = trangThaiViet[newStatus];

                        // Cập nhật màu sắc của mũi tên
                        dropdownToggle.className = `btn ${statusClass} dropdown-toggle dropdown-toggle-split`;
                        dropdownToggle.style.borderTopColor = statusButton.style.color; // Cập nhật màu của mũi tên

                        hideStatusOptions(id);
                    } else {
                        alert('Không thể cập nhật trạng thái này.');
                    }
                });
        }

    </script>
    <style>
        /* Màu của nút của Ẩn & Hiện */
        .status-an {
            background-color: red; /* Màu đỏ cho trạng thái Ẩn */
            color: #fff;
        }

        .status-hien {
            background-color: green; /* Màu xanh cho trạng thái Hiện */
            color: #fff;
        }

        /* Màu nền dropdown */
        .status-an .dropdown-menu,
        .status-hien .dropdown-menu {
            background-color: inherit; /* Sử dụng màu nền của nút */
        }

        /* Mũi tên của dropdown */
        .status-an .dropdown-toggle::after,
        .status-hien .dropdown-toggle::after {
            border-top-color: #fff; /* Màu mũi tên trắng */
        }

        /* Thiết lập nút lớn hơn */
        /*.btn-group-sm .btn {*/
        /*    font-size: 0.875rem; !* Tăng kích thước chữ *!*/
        /*    padding: 0.35rem 0.65rem; !* Tăng kích thước padding *!*/
        /*    height: 1.75rem; !* Tăng chiều cao của nút *!*/
        /*}*/

        /*!* Thiết lập menu dropdown lớn hơn *!*/
        /*.dropdown-menu {*/
        /*    font-size: 0.875rem; !* Tăng kích thước chữ của menu *!*/
        /*}*/

        .dropdown-toggle-split::after {
            display: none; /* Ẩn mũi tên trên dropdown */
        }

        .btn-group-sm .dropdown-menu {
            min-width: 100px; /* Tăng kích thước chiều rộng của menu */
        }

        /* Màu của nút của Đã Full & Tiếp Tục Cập Nhật */
        .status-da_full {
            background-color: blue; /* Màu xanh cho Đã Full */
            color: #fff;
        }

        .status-tiep_tuc_cap_nhat {
            background-color: orange; /* Màu cam cho Tiếp Tục Cập Nhật */
            color: #fff;
        }

        /* Màu nền dropdown cho Đã Full & Tiếp Tục Cập Nhật */
        .status-da_full .dropdown-menu,
        .status-tiep_tuc_cap_nhat .dropdown-menu {
            background-color: inherit; /* Sử dụng màu nền của nút */
        }

        /* Mũi tên của dropdown cho Đã Full & Tiếp Tục Cập Nhật */
        .status-da_full .dropdown-toggle::after,
        .status-tiep_tuc_cap_nhat .dropdown-toggle::after {
            border-top-color: #fff; /* Màu mũi tên trắng */
        }

        /* Màu của nút cho các trạng thái kiểm duyệt */
        .status-cho_xac_nhan {
            background-color: #ffc107; /* Màu vàng cho Chờ Xác Nhận */
            color: #fff;
        }

        .status-tu_choi {
            background-color: #dc3545; /* Màu đỏ cho Từ Chối */
            color: #fff;
        }

        .status-duyet {
            background-color: #28a745; /* Màu xanh cho Duyệt */
            color: #fff;
        }

        .status-ban_nhap {
            background-color: #6c757d; /* Màu xám cho Bản Nháp */
            color: #fff;
        }

        /* Màu nền dropdown cho các trạng thái kiểm duyệt */
        .status-cho_xac_nhan .dropdown-menu,
        .status-tu_choi .dropdown-menu,
        .status-duyet .dropdown-menu,
        .status-ban_nhap .dropdown-menu {
            background-color: inherit; /* Sử dụng màu nền của nút */
        }

        /* Mũi tên của dropdown cho các trạng thái kiểm duyệt */
        .status-cho_xac_nhan .dropdown-toggle::after,
        .status-tu_choi .dropdown-toggle::after,
        .status-duyet .dropdown-toggle::after,
        .status-ban_nhap .dropdown-toggle::after {
            border-top-color: #fff; /* Màu mũi tên trắng */
        }

        /* Ẩn mũi tên trên dropdown */
        .dropdown-toggle-split::after {
            display: none; /* Ẩn mũi tên */
        }

    </style>
@endpush
