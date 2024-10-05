@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <div class="h-100">
                <div class="row mb-3 pb-1">
                    <div class="col-12">
                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-16 mb-1">Xin chào, <span
                                        class="text-danger d-none d-xl-inline-block ms-1 fw-medium user-name-text">
                                        @if (auth()->check())
                                            {{ auth()->user()->ten_doc_gia }}
                                        @endif
                                    </span></h4>
                                <p class="text-muted mb-0">Đây là những gì diễn ra trong ngày hôm nay.</p>
                            </div>
                            <div class="mt-3 mt-lg-0">
                                <form action="javascript:void(0);">
                                    <div class="row g-3 mb-0 align-items-center">
                                        <div class="col-sm-auto">
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control border-0 minimal-border dash-filter-picker shadow"
                                                    data-provider="flatpickr" data-range-date="true"
                                                    data-date-format="d M, Y"
                                                    data-deafult-date="01 Jan 2022 to 31 Jan 2022">
                                                <div class="input-group-text bg-primary border-primary text-white">
                                                    <i class="ri-calendar-2-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-auto">
                                            <button type="button" class="btn btn-soft-success material-shadow-none"><i
                                                    class="ri-add-circle-line align-middle me-1"></i> Add Product</button>
                                        </div>
                                        <!--end col-->
                                        <div class="col-auto">
                                            <button type="button"
                                                class="btn btn-soft-info btn-icon waves-effect material-shadow-none waves-light layout-rightside-btn"><i
                                                    class="ri-pulse-line"></i></button>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </form>
                            </div>
                        </div><!-- end card header -->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <!-- card cho tổng doanh thu tuần này -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <p class="text-uppercase fw-medium text-muted mb-0">TỔNG DOANH THU</p>
                                    </div>
                                    @unless (request()->has('start_date') && request()->has('end_date'))
                                        <div class="flex-shrink-0">
                                            <h5
                                                class="{{ $tongDoanhThuHomNay < $tongDoanhThuHomQua ? 'text-danger' : 'text-success' }} fs-14 mb-0">
                                                <i
                                                    class="{{ $tongDoanhThuHomNay < $tongDoanhThuHomQua ? 'ri-arrow-right-down-line' : 'ri-arrow-right-up-line' }} fs-13 align-middle"></i>
                                                @if ($tongDoanhThuHomQua > 0)
                                                    {{ $tongDoanhThuHomNay < $tongDoanhThuHomQua ? '-' : '+' }}
                                                    {{ number_format(abs((($tongDoanhThuHomNay - $tongDoanhThuHomQua) / $tongDoanhThuHomQua) * 100), 2) }}
                                                    %
                                                @else
                                                    @if ($tongDoanhThuHomNay > 0)
                                                        + 100 %
                                                    @else
                                                        0 %
                                                    @endif
                                                @endif
                                            </h5>
                                        </div>
                                    @endunless

                                </div>



                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                            <span class="counter-value" data-target="{{ $tongDoanhThuHomNay }}">0</span> VNĐ

                                        </h4>
                                        <span
                                            class="badge bg-warning me-1">{{ number_format($tongDoanhThuHomNay, 0, ',', '.') }}
                                            VNĐ</span>
                                        <span class="text-muted">Được khách hàng thanh toán</span>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle rounded fs-3">
                                            <i class="bx bx-dollar-circle text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <p class="text-uppercase fw-medium text-muted mb-0">ĐƠN HÀNG THÀNH CÔNG</p>
                                    </div>
                                    @unless (request()->has('start_date') && request()->has('end_date'))
                                        <div class="flex-shrink-0">
                                            <h5 class="{{ $phanTram < 0 ? 'text-danger' : 'text-success' }} fs-14 mb-0">
                                                <i
                                                    class="{{ $phanTram < 0 ? 'ri-arrow-right-down-line' : 'ri-arrow-right-up-line' }} fs-13 align-middle"></i>
                                                {{ $phanTram < 0 ? '-' : '+' }} {{ abs($phanTram) }} %
                                            </h5>
                                        </div>
                                    @endunless
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                            <span class="counter-value" data-target="{{ $tongDonHangHomNay }}">0</span> đơn
                                            hàng
                                        </h4>
                                        <span class="badge bg-warning me-1">{{ $tongDonHangHomNay }}</span>
                                        <span class="text-muted">Tổng số đơn hàng được thanh toán thành công</span>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-success-subtle rounded fs-3">
                                            <i class="bx bx-check-circle text-success"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <p class="text-uppercase fw-medium text-muted mb-0">ĐƠN ĐANG XỬ LÝ</p>
                                    </div>
                                    @unless (request()->has('start_date') && request()->has('end_date'))
                                        <div class="flex-shrink-0">
                                            <h5
                                                class="{{ $hoaDonHomNay < $hoaDonHomQua ? 'text-danger' : 'text-success' }} fs-14 mb-0">
                                                <i
                                                    class="{{ $hoaDonHomNay < $hoaDonHomQua ? 'ri-arrow-right-down-line' : 'ri-arrow-right-up-line' }} fs-13 align-middle"></i>
                                                @if ($hoaDonHomQua > 0)
                                                    {{ $hoaDonHomNay < $hoaDonHomQua ? '-' : '+' }}
                                                    {{ number_format(abs((($hoaDonHomNay - $hoaDonHomQua) / $hoaDonHomQua) * 100), 2) }}
                                                    %
                                                @else
                                                    {{-- Nếu không có hóa đơn hôm qua và có hóa đơn hôm nay thì thay đổi là 100% --}}
                                                    @if ($hoaDonHomNay > 0)
                                                        + 100 %
                                                    @else
                                                        0 %
                                                    @endif
                                                @endif
                                            </h5>
                                        </div>
                                    @endunless
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                            <span class="counter-value" data-target="{{ $hoaDonHomNay }}"></span> Đơn hàng
                                        </h4>
                                        <span class="badge bg-warning me-1">{{ $hoaDonHomNay }}</span>
                                        <span class="text-muted">Tổng số đơn hàng đang chờ xử lý </span>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-warning-subtle rounded fs-3">
                                            <i class="bx bx-info-circle text-warning"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    {{--    Đơn đã hủy    --}}
                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <p class="text-uppercase fw-medium text-muted mb-0">ĐƠN ĐÃ HỦY</p>
                                    </div>
                                    @unless (request()->has('start_date') && request()->has('end_date'))
                                        <div class="flex-shrink-0">
                                            <h5
                                                class="{{ $hoaDonHuyHomNay < $hoaDonHuyHomQua ? 'text-danger' : 'text-success' }} fs-14 mb-0">
                                                <i
                                                    class="{{ $hoaDonHuyHomNay < $hoaDonHuyHomQua ? 'ri-arrow-right-down-line' : 'ri-arrow-right-up-line' }} fs-13 align-middle"></i>
                                                @if ($hoaDonHuyHomQua > 0)
                                                    {{ $hoaDonHuyHomNay < $hoaDonHuyHomQua ? '-' : '+' }}
                                                    {{ number_format(abs((($hoaDonHuyHomNay - $hoaDonHuyHomQua) / $hoaDonHuyHomQua) * 100), 2) }}
                                                    %
                                                @else
                                                    {{-- Nếu không có hóa đơn hủy hôm qua và có hóa đơn hủy hôm nay thì thay đổi là 100% --}}
                                                    @if ($hoaDonHuyHomNay > 0)
                                                        + 100 %
                                                    @else
                                                        0 %
                                                    @endif
                                                @endif
                                            </h5>
                                        </div>
                                    @endunless
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                            <span class="counter-value" data-target="{{ $hoaDonHuyHomNay }}"></span> Đơn
                                        </h4>
                                        <span class="badge bg-warning me-1">{{ $hoaDonHuyHomNay }}</span>
                                        <span class="text-muted"> Tổng số đơn hàng thất bại do chưa thanh toán</span>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-danger-subtle rounded fs-3">
                                            <i data-feather="x-octagon" class="text-danger bx bx-x-circle"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div> <!-- end row-->

                <div class="row">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-header border-0 align-items-center d-flex">
                                <h3 class=" mb-0 flex-grow-1">Tổng quan</h3>
                                <div class="d-flex mt-3">
                                    <div class="mb-3 col-xl-2" style="width: 140px;">
                                        {{-- <label for="statistic-type" class="form-label">Chọn kiểu thống kê</label> --}}
                                        <select id="statistic-type" class="form-select">
                                            <option value="week">Theo tuần</option>
                                            <option value="month" selected>Theo tháng</option>
                                            <option value="quarter">Theo quý</option>
                                            <option value="year">Theo năm</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-xl-2 ps-3" style="width: 110px;">
                                        <select id="year-selector" class="form-select">
                                            @for ($year = 2020; $year <= now()->year; $year++)
                                                <option value="{{ $year }}"
                                                    {{ $selectedYear == $year ? 'selected' : '' }}>
                                                    {{ $year }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="mb-3 col-xl-2 ps-3">
                                        <button type="button" class="btn btn-light mb-2" id="resetZoomButton">
                                            <i class="ri-refresh-line"></i>
                                        </button>
                                    </div>
                                </div>
                            </div><!-- end card header -->

                            <div class="card-header p-0 border-0 bg-light-subtle">
                                <div class="row g-0 text-center">
                                    <div class="col-6 col-sm-3">
                                        <div class="p-3 border border-dashed border-start-0">
                                            <h5 class="mb-1"><span class="counter-value" data-target="7585">0</span>
                                            </h5>
                                            <p class="text-muted mb-0">Đơn hàng</p>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-6 col-sm-3">
                                        <div class="p-3 border border-dashed border-start-0">
                                            <h5 class="mb-1">$<span class="counter-value" data-target="22.89">0</span>k
                                            </h5>
                                            <p class="text-muted mb-0">Doanh thu</p>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-6 col-sm-3">
                                        <div class="p-3 border border-dashed border-start-0">
                                            <h5 class="mb-1"><span class="counter-value" data-target="367">0</span>
                                            </h5>
                                            <p class="text-muted mb-0">Cộng tác viên</p>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-6 col-sm-3">
                                        <div class="p-3 border border-dashed border-start-0">
                                            <h5 class="mb-1"><span class="counter-value" data-target="367">543</span>
                                            </h5>
                                            <p class="text-muted mb-0">Sách</p>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                            </div><!-- end card header -->

                            <div class="card-body p-0 pb-2">

                                <!-- Biểu đồ -->
                                <div id="chart-bar-label-rotation" data-colors='[ ]' class="e-charts"
                                    style="height: 400px;"></div>

                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-4">
                        <!-- card -->
                        <div class="card card-height-100">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Sales by Locations</h4>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-soft-primary material-shadow-none btn-sm">
                                        Export Report
                                    </button>
                                </div>
                            </div><!-- end card header -->

                            <!-- card body -->
                            <div class="card-body">

                                <div id="sales-by-locations" data-colors='["--vz-light", "--vz-success", "--vz-primary"]'
                                    data-colors-interactive='["--vz-light", "--vz-info", "--vz-primary"]'
                                    style="height: 269px" dir="ltr"></div>

                                <div class="px-2 py-2 mt-1">
                                    <p class="mb-1">Canada <span class="float-end">75%</span></p>
                                    <div class="progress mt-2" style="height: 6px;">
                                        <div class="progress-bar progress-bar-striped bg-primary" role="progressbar"
                                            style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="75">
                                        </div>
                                    </div>

                                    <p class="mt-3 mb-1">Greenland <span class="float-end">47%</span>
                                    </p>
                                    <div class="progress mt-2" style="height: 6px;">
                                        <div class="progress-bar progress-bar-striped bg-primary" role="progressbar"
                                            style="width: 47%" aria-valuenow="47" aria-valuemin="0" aria-valuemax="47">
                                        </div>
                                    </div>

                                    <p class="mt-3 mb-1">Russia <span class="float-end">82%</span></p>
                                    <div class="progress mt-2" style="height: 6px;">
                                        <div class="progress-bar progress-bar-striped bg-primary" role="progressbar"
                                            style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="82">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>

                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Top sách bán chạy nhất</h4>
                                <div class="flex-shrink-0">
                                    <div class="dropdown card-header-dropdown">
                                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <span class="fw-semibold text-uppercase fs-12">Sort by:
                                            </span><span class="text-muted">Today<i
                                                    class="mdi mdi-chevron-down ms-1"></i></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Today</a>
                                            <a class="dropdown-item" href="#">Yesterday</a>
                                            <a class="dropdown-item" href="#">Last 7 Days</a>
                                            <a class="dropdown-item" href="#">Last 30 Days</a>
                                            <a class="dropdown-item" href="#">This Month</a>
                                            <a class="dropdown-item" href="#">Last Month</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div class="table-responsive table-card">
                                    <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm bg-light rounded p-1 me-2">
                                                            <img src="assets/images/products/img-5.png" alt=""
                                                                class="img-fluid d-block" />
                                                        </div>
                                                        <div>
                                                            <h5 class="fs-14 my-1"><a
                                                                    href="apps-ecommerce-product-details.html"
                                                                    class="text-reset">Stillbird Helmet</a></h5>
                                                            <span class="text-muted">Ngày thêm 23-02-2024</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 my-1 fw-normal">213.000đ</h5>
                                                    <span class="text-muted">Giá</span>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 my-1 fw-normal">74</h5>
                                                    <span class="text-muted">Lượt mua</span>
                                                </td>

                                                <td>
                                                    <h5 class="fs-14 my-1 fw-normal">$3.996.000đ</h5>
                                                    <span class="text-muted">Doanh thu</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="card card-height-100">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Top Sellers</h4>
                                <div class="flex-shrink-0">
                                    <div class="dropdown card-header-dropdown">
                                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <span class="text-muted">Report<i
                                                    class="mdi mdi-chevron-down ms-1"></i></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Download Report</a>
                                            <a class="dropdown-item" href="#">Export</a>
                                            <a class="dropdown-item" href="#">Import</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div class="table-responsive table-card">
                                    <table class="table table-centered table-hover align-middle table-nowrap mb-0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 me-2">
                                                            <img src="{{ asset('assets/admin/images/companies/img-1.png') }}"
                                                                alt="" class="avatar-sm p-2" />
                                                        </div>
                                                        <div>
                                                            <h5 class="fs-14 my-1 fw-medium">
                                                                <a href="apps-ecommerce-seller-details.html"
                                                                    class="text-reset">iTest Factory</a>
                                                            </h5>
                                                            <span class="text-muted">Oliver Tyler</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="text-muted">Bags and Wallets</span>
                                                </td>
                                                <td>
                                                    <p class="mb-0">8547</p>
                                                    <span class="text-muted">Stock</span>
                                                </td>
                                                <td>
                                                    <span class="text-muted">$541200</span>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 mb-0">32%<i
                                                            class="ri-bar-chart-fill text-success fs-16 align-middle ms-2"></i>
                                                    </h5>
                                                </td>
                                            </tr><!-- end -->
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 me-2">
                                                            <img src="{{ asset('assets/admin/images/companies/img-2.png') }}"
                                                                alt="" class="avatar-sm p-2" />
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h5 class="fs-14 my-1 fw-medium"><a
                                                                    href="apps-ecommerce-seller-details.html"
                                                                    class="text-reset">Digitech Galaxy</a></h5>
                                                            <span class="text-muted">John Roberts</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="text-muted">Watches</span>
                                                </td>
                                                <td>
                                                    <p class="mb-0">895</p>
                                                    <span class="text-muted">Stock</span>
                                                </td>
                                                <td>
                                                    <span class="text-muted">$75030</span>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 mb-0">79%<i
                                                            class="ri-bar-chart-fill text-success fs-16 align-middle ms-2"></i>
                                                    </h5>
                                                </td>
                                            </tr><!-- end -->
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 me-2">
                                                            <img src="{{ asset('assets/admin/images/companies/img-3.png') }}"
                                                                alt="" class="avatar-sm p-2" />
                                                        </div>
                                                        <div class="flex-gow-1">
                                                            <h5 class="fs-14 my-1 fw-medium"><a
                                                                    href="apps-ecommerce-seller-details.html"
                                                                    class="text-reset">Nesta Technologies</a></h5>
                                                            <span class="text-muted">Harley Fuller</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="text-muted">Bike Accessories</span>
                                                </td>
                                                <td>
                                                    <p class="mb-0">3470</p>
                                                    <span class="text-muted">Stock</span>
                                                </td>
                                                <td>
                                                    <span class="text-muted">$45600</span>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 mb-0">90%<i
                                                            class="ri-bar-chart-fill text-success fs-16 align-middle ms-2"></i>
                                                    </h5>
                                                </td>
                                            </tr><!-- end -->
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 me-2">
                                                            <img src="{{ asset('assets/admin/images/companies/img-8.png') }}"
                                                                alt="" class="avatar-sm p-2" />
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h5 class="fs-14 my-1 fw-medium"><a
                                                                    href="apps-ecommerce-seller-details.html"
                                                                    class="text-reset">Zoetic Fashion</a></h5>
                                                            <span class="text-muted">James Bowen</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="text-muted">Clothes</span>
                                                </td>
                                                <td>
                                                    <p class="mb-0">5488</p>
                                                    <span class="text-muted">Stock</span>
                                                </td>
                                                <td>
                                                    <span class="text-muted">$29456</span>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 mb-0">40%<i
                                                            class="ri-bar-chart-fill text-success fs-16 align-middle ms-2"></i>
                                                    </h5>
                                                </td>
                                            </tr><!-- end -->
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 me-2">
                                                            <img src="{{ asset('assets/admin/images/companies/img-5.png') }}"
                                                                alt="" class="avatar-sm p-2" />
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h5 class="fs-14 my-1 fw-medium">
                                                                <a href="apps-ecommerce-seller-details.html"
                                                                    class="text-reset">Meta4Systems</a>
                                                            </h5>
                                                            <span class="text-muted">Zoe Dennis</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="text-muted">Furniture</span>
                                                </td>
                                                <td>
                                                    <p class="mb-0">4100</p>
                                                    <span class="text-muted">Stock</span>
                                                </td>
                                                <td>
                                                    <span class="text-muted">$11260</span>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 mb-0">57%<i
                                                            class="ri-bar-chart-fill text-success fs-16 align-middle ms-2"></i>
                                                    </h5>
                                                </td>
                                            </tr><!-- end -->
                                        </tbody>
                                    </table><!-- end table -->
                                </div>

                                <div
                                    class="align-items-center mt-4 pt-2 justify-content-between row text-center text-sm-start">
                                    <div class="col-sm">
                                        <div class="text-muted">
                                            Showing <span class="fw-semibold">5</span> of <span
                                                class="fw-semibold">25</span> Results
                                        </div>
                                    </div>
                                    <div class="col-sm-auto  mt-3 mt-sm-0">
                                        <ul
                                            class="pagination pagination-separated pagination-sm mb-0 justify-content-center">
                                            <li class="page-item disabled">
                                                <a href="#" class="page-link">←</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">1</a>
                                            </li>
                                            <li class="page-item active">
                                                <a href="#" class="page-link">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">→</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div> <!-- .card-body-->
                        </div> <!-- .card-->
                    </div> <!-- .col-->
                </div> <!-- end row-->

                <div class="row">
                    {{-- Thống kê doanh thu thể loại sách dựa trên đơn hàng thành công --}}
                    <div class="col-xl-4">
                        <div class="card card-height-100">
                            <div class="card-header align-items-center d-flex">
                                <h4 id="category-title" class="card-title mb-0 flex-grow-1">Doanh Thu Thể loại Sách Tuần
                                    Hiện Tại</h4>
                                <div class="flex-shrink-0">
                                    <div class="dropdown card-header-dropdown">
                                        <button class="btn btn-soft-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Chọn
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                                            id="category-dropdown">
                                            <a class="dropdown-item" data-value="1" data-type="category"
                                                href="#">Ngày</a>
                                            <a class="dropdown-item" data-value="2" data-type="category"
                                                href="#">Tuần</a>
                                            <a class="dropdown-item" data-value="3" data-type="category"
                                                href="#">Tháng</a>
                                            <a class="dropdown-item" data-value="4" data-type="category"
                                                href="#">Năm</a>
                                            <a class="dropdown-item" data-value="5" data-type="category"
                                                href="#">Quý</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card header -->
                            <div class="card-body">
                                <div id="theLoai" class="apex-charts" dir="ltr"></div>
                                <!-- Chart for book categories -->
                            </div>
                        </div> <!-- .card-->
                    </div> <!-- .col-->

                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Recent Orders</h4>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-soft-info btn-sm material-shadow-none">
                                        <i class="ri-file-list-3-line align-middle"></i> Generate Report
                                    </button>
                                </div>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div class="table-responsive table-card">
                                    <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                        <thead class="text-muted table-light">
                                            <tr>
                                                <th scope="col">Order ID</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Vendor</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Rating</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="apps-ecommerce-order-details.html"
                                                        class="fw-medium link-primary">#VZ2112</a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 me-2">
                                                            <img src="{{ asset('assets/admin/images/user/avatar-1.jpg') }}"
                                                                alt=""
                                                                class="avatar-xs rounded-circle material-shadow" />
                                                        </div>
                                                        <div class="flex-grow-1">Alex Smith</div>
                                                    </div>
                                                </td>
                                                <td>Clothes</td>
                                                <td>
                                                    <span class="text-success">$109.00</span>
                                                </td>
                                                <td>Zoetic Fashion</td>
                                                <td>
                                                    <span class="badge bg-success-subtle text-success">Paid</span>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 fw-medium mb-0">5.0<span
                                                            class="text-muted fs-11 ms-1">(61 votes)</span></h5>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td>
                                                    <a href="apps-ecommerce-order-details.html"
                                                        class="fw-medium link-primary">#VZ2111</a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 me-2">
                                                            <img src="{{ asset('assets/admin/images/user/avatar-2.jpg') }}"
                                                                alt=""
                                                                class="avatar-xs rounded-circle material-shadow" />
                                                        </div>
                                                        <div class="flex-grow-1">Jansh Brown</div>
                                                    </div>
                                                </td>
                                                <td>Kitchen Storage</td>
                                                <td>
                                                    <span class="text-success">$149.00</span>
                                                </td>
                                                <td>Micro Design</td>
                                                <td>
                                                    <span class="badge bg-warning-subtle text-warning">Pending</span>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 fw-medium mb-0">4.5<span
                                                            class="text-muted fs-11 ms-1">(61 votes)</span></h5>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td>
                                                    <a href="apps-ecommerce-order-details.html"
                                                        class="fw-medium link-primary">#VZ2109</a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 me-2">
                                                            <img src="{{ asset('assets/admin/images/user/avatar-3.jpg') }}"
                                                                alt=""
                                                                class="avatar-xs rounded-circle material-shadow" />
                                                        </div>
                                                        <div class="flex-grow-1">Ayaan Bowen</div>
                                                    </div>
                                                </td>
                                                <td>Bike Accessories</td>
                                                <td>
                                                    <span class="text-success">$215.00</span>
                                                </td>
                                                <td>Nesta Technologies</td>
                                                <td>
                                                    <span class="badge bg-success-subtle text-success">Paid</span>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 fw-medium mb-0">4.9<span
                                                            class="text-muted fs-11 ms-1">(89 votes)</span></h5>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td>
                                                    <a href="apps-ecommerce-order-details.html"
                                                        class="fw-medium link-primary">#VZ2108</a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 me-2">
                                                            <img src="{{ asset('assets/admin/images/user/avatar-4.jpg') }}"
                                                                alt=""
                                                                class="avatar-xs rounded-circle material-shadow" />
                                                        </div>
                                                        <div class="flex-grow-1">Prezy Mark</div>
                                                    </div>
                                                </td>
                                                <td>Furniture</td>
                                                <td>
                                                    <span class="text-success">$199.00</span>
                                                </td>
                                                <td>Syntyce Solutions</td>
                                                <td>
                                                    <span class="badge bg-danger-subtle text-danger">Unpaid</span>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 fw-medium mb-0">4.3<span
                                                            class="text-muted fs-11 ms-1">(47 votes)</span></h5>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td>
                                                    <a href="apps-ecommerce-order-details.html"
                                                        class="fw-medium link-primary">#VZ2107</a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 me-2">
                                                            <img src="{{ asset('assets/admin/images/user/avatar-6.jpg') }}"
                                                                alt=""
                                                                class="avatar-xs rounded-circle material-shadow" />
                                                        </div>
                                                        <div class="flex-grow-1">Vihan Hudda</div>
                                                    </div>
                                                </td>
                                                <td>Bags and Wallets</td>
                                                <td>
                                                    <span class="text-success">$330.00</span>
                                                </td>
                                                <td>iTest Factory</td>
                                                <td>
                                                    <span class="badge bg-success-subtle text-success">Paid</span>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 fw-medium mb-0">4.7<span
                                                            class="text-muted fs-11 ms-1">(161 votes)</span></h5>
                                                </td>
                                            </tr><!-- end tr -->
                                        </tbody><!-- end tbody -->
                                    </table><!-- end table -->
                                </div>
                            </div>
                        </div> <!-- .card-->
                    </div> <!-- .col-->
                </div> <!-- end row-->

            </div> <!-- end .h-100-->

        </div> <!-- end col -->

        <div class="col-auto layout-rightside-col">
            <div class="overlay"></div>
            <div class="layout-rightside">
                <div class="card h-100 rounded-0">
                    <div class="card-body p-0">
                        <div class="p-3">
                            <h6 class="text-muted mb-0 text-uppercase fw-semibold">Recent Activity</h6>
                        </div>
                        <div data-simplebar style="max-height: 410px;" class="p-3 pt-0">
                            <div class="acitivity-timeline acitivity-main">
                                <div class="acitivity-item d-flex">
                                    <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                        <div
                                            class="avatar-title bg-success-subtle text-success rounded-circle material-shadow">
                                            <i class="ri-shopping-cart-2-line"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1 lh-base">Purchase by James Price</h6>
                                        <p class="text-muted mb-1">Product noise evolve smartwatch </p>
                                        <small class="mb-0 text-muted">02:14 PM Today</small>
                                    </div>
                                </div>
                                <div class="acitivity-item py-3 d-flex">
                                    <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                        <div
                                            class="avatar-title bg-danger-subtle text-danger rounded-circle material-shadow">
                                            <i class="ri-stack-fill"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1 lh-base">Added new <span class="fw-semibold">style
                                                collection</span></h6>
                                        <p class="text-muted mb-1">By Nesta Technologies</p>
                                        <div class="d-inline-flex gap-2 border border-dashed p-2 mb-2">
                                            <a href="apps-ecommerce-product-details.html" class="bg-light rounded p-1">
                                                <img src="{{ asset('assets/admin/images/products/img-8.png') }}"
                                                    alt="" class="img-fluid d-block" />
                                            </a>
                                            <a href="apps-ecommerce-product-details.html" class="bg-light rounded p-1">
                                                <img src="{{ asset('assets/admin/images/products/img-2.png') }}"
                                                    alt="" class="img-fluid d-block" />
                                            </a>
                                            <a href="apps-ecommerce-product-details.html" class="bg-light rounded p-1">
                                                <img src="{{ asset('assets/admin/images/products/img-10.png') }}"
                                                    alt="" class="img-fluid d-block" />
                                            </a>
                                        </div>
                                        <p class="mb-0 text-muted"><small>9:47 PM Yesterday</small></p>
                                    </div>
                                </div>
                                <div class="acitivity-item py-3 d-flex">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('assets/admin/images/user/avatar-2.jpg') }}" alt=""
                                            class="avatar-xs rounded-circle acitivity-avatar material-shadow">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1 lh-base">Natasha Carey have liked the products</h6>
                                        <p class="text-muted mb-1">Allow users to like products in your WooCommerce store.
                                        </p>
                                        <small class="mb-0 text-muted">25 Dec, 2021</small>
                                    </div>
                                </div>
                                <div class="acitivity-item py-3 d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="avatar-xs acitivity-avatar">
                                            <div class="avatar-title rounded-circle bg-secondary material-shadow">
                                                <i class="mdi mdi-sale fs-14"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1 lh-base">Today offers by <a
                                                href="apps-ecommerce-seller-details.html" class="link-secondary">Digitech
                                                Galaxy</a></h6>
                                        <p class="text-muted mb-2">Offer is valid on orders of Rs.500 Or above for selected
                                            products only.</p>
                                        <small class="mb-0 text-muted">12 Dec, 2021</small>
                                    </div>
                                </div>
                                <div class="acitivity-item py-3 d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="avatar-xs acitivity-avatar">
                                            <div
                                                class="avatar-title rounded-circle bg-danger-subtle text-danger material-shadow">
                                                <i class="ri-bookmark-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1 lh-base">Favorite Product</h6>
                                        <p class="text-muted mb-2">Esther James have Favorite product.</p>
                                        <small class="mb-0 text-muted">25 Nov, 2021</small>
                                    </div>
                                </div>
                                <div class="acitivity-item py-3 d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="avatar-xs acitivity-avatar">
                                            <div class="avatar-title rounded-circle bg-secondary material-shadow">
                                                <i class="mdi mdi-sale fs-14"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1 lh-base">Flash sale starting <span
                                                class="text-primary">Tomorrow.</span></h6>
                                        <p class="text-muted mb-0">Flash sale by <a href="javascript:void(0);"
                                                class="link-secondary fw-medium">Zoetic Fashion</a></p>
                                        <small class="mb-0 text-muted">22 Oct, 2021</small>
                                    </div>
                                </div>
                                <div class="acitivity-item py-3 d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="avatar-xs acitivity-avatar">
                                            <div
                                                class="avatar-title rounded-circle bg-info-subtle text-info material-shadow">
                                                <i class="ri-line-chart-line"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1 lh-base">Monthly sales report</h6>
                                        <p class="text-muted mb-2"><span class="text-danger">2 days left</span>
                                            notification to submit the monthly sales report. <a href="javascript:void(0);"
                                                class="link-warning text-decoration-underline">Reports Builder</a></p>
                                        <small class="mb-0 text-muted">15 Oct</small>
                                    </div>
                                </div>
                                <div class="acitivity-item d-flex">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('assets/admin/images/user/avatar-3.jpg') }}" alt=""
                                            class="avatar-xs rounded-circle acitivity-avatar material-shadow" />
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1 lh-base">Frank Hook Commented</h6>
                                        <p class="text-muted mb-2 fst-italic">" A product that has reviews is more likable
                                            to be sold than a product. "</p>
                                        <small class="mb-0 text-muted">26 Aug, 2021</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-3 mt-2">
                            <h6 class="text-muted mb-3 text-uppercase fw-semibold">Top 10 Categories
                            </h6>

                            <ol class="ps-3 text-muted">
                                <li class="py-1">
                                    <a href="#" class="text-muted">Mobile & Accessories <span
                                            class="float-end">(10,294)</span></a>
                                </li>
                                <li class="py-1">
                                    <a href="#" class="text-muted">Desktop <span
                                            class="float-end">(6,256)</span></a>
                                </li>
                                <li class="py-1">
                                    <a href="#" class="text-muted">Electronics <span
                                            class="float-end">(3,479)</span></a>
                                </li>
                                <li class="py-1">
                                    <a href="#" class="text-muted">Home & Furniture <span
                                            class="float-end">(2,275)</span></a>
                                </li>
                                <li class="py-1">
                                    <a href="#" class="text-muted">Grocery <span
                                            class="float-end">(1,950)</span></a>
                                </li>
                                <li class="py-1">
                                    <a href="#" class="text-muted">Fashion <span
                                            class="float-end">(1,582)</span></a>
                                </li>
                                <li class="py-1">
                                    <a href="#" class="text-muted">Appliances <span
                                            class="float-end">(1,037)</span></a>
                                </li>
                                <li class="py-1">
                                    <a href="#" class="text-muted">Beauty, Toys & More <span
                                            class="float-end">(924)</span></a>
                                </li>
                                <li class="py-1">
                                    <a href="#" class="text-muted">Food & Drinks <span
                                            class="float-end">(701)</span></a>
                                </li>
                                <li class="py-1">
                                    <a href="#" class="text-muted">Toys & Games <span
                                            class="float-end">(239)</span></a>
                                </li>
                            </ol>
                            <div class="mt-3 text-center">
                                <a href="javascript:void(0);" class="text-muted text-decoration-underline">View all
                                    Categories</a>
                            </div>
                        </div>
                        <div class="p-3">
                            <h6 class="text-muted mb-3 text-uppercase fw-semibold">Products Reviews</h6>
                            <!-- Swiper -->
                            <div class="swiper vertical-swiper" style="height: 250px;">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="card border border-dashed shadow-none">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 avatar-sm">
                                                        <div class="avatar-title bg-light rounded material-shadow">
                                                            <img src="{{ asset('assets/admin/images/companies/img-1.png') }}"
                                                                alt="" height="30">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <div>
                                                            <p class="text-muted mb-1 fst-italic text-truncate-two-lines">
                                                                " Great product and looks great, lots of features. "</p>
                                                            <div class="fs-11 align-middle text-warning">
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-fill"></i>
                                                            </div>
                                                        </div>
                                                        <div class="text-end mb-0 text-muted">
                                                            - by <cite title="Source Title">Force Medicines</cite>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card border border-dashed shadow-none">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <img src="{{ asset('assets/admin/images/user/avatar-3.jpg') }}"
                                                            alt="" class="avatar-sm rounded material-shadow">
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <div>
                                                            <p class="text-muted mb-1 fst-italic text-truncate-two-lines">
                                                                " Amazing template, very easy to understand and manipulate.
                                                                "</p>
                                                            <div class="fs-11 align-middle text-warning">
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-half-fill"></i>
                                                            </div>
                                                        </div>
                                                        <div class="text-end mb-0 text-muted">
                                                            - by <cite title="Source Title">Henry Baird</cite>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card border border-dashed shadow-none">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 avatar-sm">
                                                        <div class="avatar-title bg-light rounded">
                                                            <img src="{{ asset('assets/admin/images/companies/img-8.png') }}"
                                                                alt="" height="30">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <div>
                                                            <p class="text-muted mb-1 fst-italic text-truncate-two-lines">
                                                                "Very beautiful product and Very helpful customer service."
                                                            </p>
                                                            <div class="fs-11 align-middle text-warning">
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-line"></i>
                                                                <i class="ri-star-line"></i>
                                                            </div>
                                                        </div>
                                                        <div class="text-end mb-0 text-muted">
                                                            - by <cite title="Source Title">Zoetic Fashion</cite>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card border border-dashed shadow-none">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <img src="{{ asset('assets/admin/images/user/avatar-2.jpg') }}"
                                                            alt="" class="avatar-sm rounded material-shadow">
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <div>
                                                            <p class="text-muted mb-1 fst-italic text-truncate-two-lines">"
                                                                The product is very beautiful. I like it. "</p>
                                                            <div class="fs-11 align-middle text-warning">
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-half-fill"></i>
                                                                <i class="ri-star-line"></i>
                                                            </div>
                                                        </div>
                                                        <div class="text-end mb-0 text-muted">
                                                            - by <cite title="Source Title">Nancy Martino</cite>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-3">
                            <h6 class="text-muted mb-3 text-uppercase fw-semibold">Customer Reviews</h6>
                            <div class="bg-light px-3 py-2 rounded-2 mb-2">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <div class="fs-16 align-middle text-warning">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-half-fill"></i>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <h6 class="mb-0">4.5 out of 5</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="text-muted">Total <span class="fw-medium">5.50k</span> reviews</div>
                            </div>

                            <div class="mt-3">
                                <div class="row align-items-center g-2">
                                    <div class="col-auto">
                                        <div class="p-1">
                                            <h6 class="mb-0">5 star</h6>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="p-1">
                                            <div class="progress animated-progress progress-sm">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 50.16%" aria-valuenow="50.16" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="p-1">
                                            <h6 class="mb-0 text-muted">2758</h6>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row align-items-center g-2">
                                    <div class="col-auto">
                                        <div class="p-1">
                                            <h6 class="mb-0">4 star</h6>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="p-1">
                                            <div class="progress animated-progress progress-sm">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 29.32%" aria-valuenow="29.32" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="p-1">
                                            <h6 class="mb-0 text-muted">1063</h6>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row align-items-center g-2">
                                    <div class="col-auto">
                                        <div class="p-1">
                                            <h6 class="mb-0">3 star</h6>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="p-1">
                                            <div class="progress animated-progress progress-sm">
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: 18.12%" aria-valuenow="18.12" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="p-1">
                                            <h6 class="mb-0 text-muted">997</h6>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row align-items-center g-2">
                                    <div class="col-auto">
                                        <div class="p-1">
                                            <h6 class="mb-0">2 star</h6>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="p-1">
                                            <div class="progress animated-progress progress-sm">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 4.98%" aria-valuenow="4.98" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="p-1">
                                            <h6 class="mb-0 text-muted">227</h6>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row align-items-center g-2">
                                    <div class="col-auto">
                                        <div class="p-1">
                                            <h6 class="mb-0">1 star</h6>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="p-1">
                                            <div class="progress animated-progress progress-sm">
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                    style="width: 7.42%" aria-valuenow="7.42" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="p-1">
                                            <h6 class="mb-0 text-muted">408</h6>
                                        </div>
                                    </div>
                                </div><!-- end row -->
                            </div>
                        </div>

                        <div class="card sidebar-alert bg-light border-0 text-center mx-4 mb-0 mt-3">
                            <div class="card-body">
                                <img src="{{ asset('assets/admin/images/giftbox.png') }}" alt="">
                                <div class="mt-4">
                                    <h5>Invite New Seller</h5>
                                    <p class="text-muted lh-base">Refer a new seller to us and earn $100 per refer.</p>
                                    <button type="button" class="btn btn-primary btn-label rounded-pill"><i
                                            class="ri-mail-fill label-icon align-middle rounded-pill fs-16 me-2"></i>
                                        Invite Now</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div> <!-- end card-->
            </div> <!-- end .rightbar-->

        </div> <!-- end col -->
    </div>
@endsection

@push('scripts')
    <!-- job-statistics js -->
    <script src="{{ asset('assets/admin/js/pages/job-statistics.init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function updateCategoryChart(type) {
                console.log(`Đang tải dữ liệu cho loại: ${type}`);
                fetch(`/admin/get-revenue-by-category?type=${type}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log('Dữ liệu trả về từ API:', data);
                        if (!data.theLoai || !data.doanhThu) {
                            console.error('Dữ liệu không hợp lệ từ API');
                            return;
                        }
                        var theLoai = data.theLoai;
                        var doanhThu = data.doanhThu;
                        var seriesData = theLoai.map(function(loai) {
                            var totalDoanhThu = Object.values(doanhThu[loai] || {}).reduce(function(a,
                                b) {
                                return (parseFloat(a) || 0) + (parseFloat(b) || 0);
                            }, 0);
                            return totalDoanhThu;
                        });
                        console.log('Series Data:', seriesData);
                        var options = {
                            series: seriesData,
                            chart: {
                                type: 'donut',
                                height: 350
                            },
                            labels: theLoai,
                            plotOptions: {
                                pie: {
                                    donut: {
                                        size: '60%'
                                    }
                                }
                            },
                            tooltip: {
                                y: {
                                    formatter: function(value) {
                                        return value.toLocaleString('vi-VN') + ' VNĐ';
                                    }
                                }
                            },
                            legend: {
                                position: 'bottom',
                                horizontalAlign: 'center',
                                floating: false
                            },
                            responsive: [{
                                breakpoint: 480,
                                options: {
                                    chart: {
                                        width: 300
                                    },
                                    legend: {
                                        position: 'bottom'
                                    }
                                }
                            }]
                        };
                        if (typeof categoryChart !== 'undefined') {
                            categoryChart.destroy();
                        }
                        categoryChart = new ApexCharts(document.querySelector("#theLoai"), options);
                        categoryChart.render();
                    })
                    .catch(error => console.error('Lỗi:', error));
            }

            var chartElement = document.querySelector("#theLoai");
            if (!chartElement) {
                console.error('Phần tử với id #theLoai không tồn tại.');
                return;
            }
            document.querySelectorAll('#category-dropdown .dropdown-item').forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    var selectedText = this.textContent;
                    var titleElement = document.querySelector('#category-title');
                    titleElement.textContent = `Doanh Thu Thể loại Sách Theo ${selectedText}`;
                });
            });
            console.log('Trang web đã tải xong, hiển thị biểu đồ mặc định cho tuần.');
            updateCategoryChart(2);

            document.querySelectorAll('#category-dropdown .dropdown-item').forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    var value = this.getAttribute('data-value');
                    var type = this.getAttribute('data-type');
                    if (type === 'category') {
                        updateCategoryChart(value);
                    }
                });
            });
        });
    </script>





    <script src="{{ asset('assets/admin/libs/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/pages/echarts22.init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var chart = echarts.init(document.getElementById('chart-bar-label-rotation'));
        // Chuyển dữ liệu từ PHP sang JavaScript
        var thongKeTuan = @json($thongKeTuan);
        var thongKeThang = @json($thongKeThang);
        var thongKeQuy = @json($thongKeQuy);
        var annualData = @json($annualData);
        var doanhThuTuan = @json($doanhThuTuan);
        var doanhThuThang = @json($doanhThuThang);
        var doanhThuQuy = @json($doanhThuQuy);
        var doanhThuNam = @json($doanhThuNam);




        function updateChart(type) {
            var year = document.getElementById('year-selector').value;
            var currentMonth = new Date().getMonth() + 1; // Lấy tháng hiện tại
            var data = {
                week: thongKeTuan[year],
                month: thongKeThang[year],
                quarter: thongKeQuy[year],
                year: annualData[year]
            };



            var labels = [],
                successfulOrders = [],
                pendingOrders = [],
                cancelledOrders = [],
                revenue = []; // Thêm một mảng mới cho doanh thu
            var dataZoom = [{
                type: 'slider',
                start: 0,
                end: 100
            }];

            if (type === 'week') {
                Object.keys(data.week).forEach(month => {
                    for (let week = 1; week <= 4; week++) {
                        labels.push(`Tháng ${month}, Tuần ${week}`);
                        successfulOrders.push(data.week[month][week].thanh_cong);
                        pendingOrders.push(data.week[month][week].dang_xu_ly);
                        cancelledOrders.push(data.week[month][week].that_bai);
                        revenue.push(doanhThuTuan[year][month][week]); // Sử dụng dữ liệu doanh thu từ PHP
                    }
                });

                // Tính toán phạm vi zoom cho tuần hiện tại của tháng hiện tại
                var startIndex = (currentMonth - 1) * 4 * 100 / 48; // Dùng 48 tuần (đơn giản hóa, thực tế nên là 52 tuần)
                var endIndex = startIndex + (4 * 100 / 48);
                dataZoom = [{
                    type: 'slider',
                    start: Math.max(0, startIndex),
                    end: Math.min(100, endIndex)
                }];

            } else if (type === 'month') {
                Object.keys(data.month).forEach(month => {
                    labels.push(`Tháng ${month}`);
                    successfulOrders.push(data.month[month].thanh_cong);
                    pendingOrders.push(data.month[month].dang_xu_ly);
                    cancelledOrders.push(data.month[month].that_bai);
                    revenue.push(doanhThuThang[year][month]); // Sử dụng dữ liệu doanh thu từ PHP
                });
            } else if (type === 'quarter') {
                Object.keys(data.quarter).forEach(quarter => {
                    labels.push(`Quý ${quarter}`);
                    successfulOrders.push(data.quarter[quarter].thanh_cong);
                    pendingOrders.push(data.quarter[quarter].dang_xu_ly);
                    cancelledOrders.push(data.quarter[quarter].that_bai);
                    revenue.push(doanhThuQuy[year][quarter]); // Sử dụng dữ liệu doanh thu từ PHP
                });
            } else if (type === 'year') {
                labels.push(`Năm ${year}`);
                successfulOrders.push(data.year.thanh_cong);
                pendingOrders.push(data.year.dang_xu_ly);
                cancelledOrders.push(data.year.that_bai);
                revenue.push(doanhThuNam[year]); // Sử dụng dữ liệu doanh thu từ PHP
            }


            var option = {
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {
                        type: 'shadow'
                    },
                    formatter: function(params) {
                        let result = `<div>${params[0].axisValueLabel}</div>`;
                        params.forEach(param => {
                            result += `<div>${param.marker}${param.seriesName}: ${param.value}</div>`;
                        });
                        // Chỉ tính tổng các đơn hàng, loại trừ doanh thu
                        const total = params.reduce((sum, param) => {
                            if (param.seriesName !==
                                'Doanh thu') { // Chỉ tính các series không phải là 'Doanh thu'
                                return sum + param.value;
                            }
                            return sum;
                        }, 0);
                        result += `<div><b>Tổng đơn: ${total}</b></div>`;
                        return result;
                    }
                },
                legend: {
                    data: ['Đơn thành công', 'Đơn đang xử lý', 'Đơn thất bại', 'Doanh thu']
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '15%',
                    containLabel: true
                },
                xAxis: {
                    type: 'category',
                    data: labels,
                    axisLabel: {
                        interval: 0,
                        rotate: 0,
                    }
                },
                yAxis: [{
                        type: 'value',
                        name: 'Đơn hàng',
                        position: 'right',
                        nameLocation: 'end',
                        nameGap: 35,
                        axisLine: {
                            lineStyle: {
                                color: '#405189' // Màu của trục doanh thu
                            }
                        },
                        axisLabel: {
                            formatter: '{value}' // Định dạng giá trị trên trục
                        }
                    }, {
                        type: 'value',
                        name: 'Doanh thu',
                        position: 'left',
                        nameLocation: 'end',
                        nameGap: 35,
                        axisLine: {
                            lineStyle: {
                                color: '#333' // Màu của trục
                            }
                        },
                        axisLabel: {
                            formatter: '{value}' // Định dạng giá trị trên trục
                        }
                    }

                ],

                series: [{
                        name: 'Đơn thành công',
                        type: 'bar',
                        stack: 'total',
                        yAxisIndex: 0,
                        data: successfulOrders,
                        z: 2, // Giá trị z cao hơn để đặt phía trước
                        itemStyle: {
                            color: 'rgba(0, 128, 0, 0.8)' // Xanh lục trong suốt 50%
                        },
                        label: {
                            show: false,
                            position: 'inside',
                            formatter: '{c}',
                            fontSize: 10
                        }
                    },
                    {
                        name: 'Đơn đang xử lý',
                        type: 'bar',
                        stack: 'total',
                        yAxisIndex: 0,
                        data: pendingOrders,
                        z: 2, // Giá trị z cao hơn để đặt phía trước
                        itemStyle: {
                            color: 'rgba(255, 165, 0, 0.8)' // Cam trong suốt 50%
                        },
                        label: {
                            show: false,
                            position: 'inside',
                            formatter: '{c}',
                            fontSize: 10
                        }
                    },
                    {
                        name: 'Đơn thất bại',
                        type: 'bar',
                        stack: 'total',
                        yAxisIndex: 0,
                        data: cancelledOrders,
                        z: 2, // Giá trị z cao hơn để đặt phía trước
                        itemStyle: {
                            color: 'rgba(221, 75, 57, 0.8)' // Đỏ với độ trong suốt 50%
                        },
                        label: {
                            show: false,
                            position: 'inside',
                            formatter: '{c}',
                            fontSize: 10
                        }
                    },
                    {
                        name: 'Doanh thu',
                        type: 'line',
                        yAxisIndex: 1,
                        data: revenue,
                        z: 1, // Giá trị z thấp hơn để đặt phía sau
                        smooth: false,
                        symbol: 'none',
                        lineStyle: {
                            width: 2,
                            color: '#405189'
                        },
                        label: {
                            show: false,
                            position: 'top',
                            formatter: '{c}',
                            fontSize: 10
                        }
                    }
                ],



                dataZoom: dataZoom
            };

            chart.setOption(option);
        }

        function resetZoom() {
            chart.dispatchAction({
                type: 'dataZoom',
                start: 0,
                end: 100
            });
        }
        document.getElementById('resetZoomButton').addEventListener('click', function() {
            resetZoom();
        });

        document.getElementById('statistic-type').addEventListener('change', function() {
            updateChart(this.value);
        });

        document.getElementById('year-selector').addEventListener('change', function() {
            updateChart(document.getElementById('statistic-type').value);
        });

        // Khởi tạo biểu đồ lần đầu với dữ liệu theo tháng
        updateChart('month');
    </script>
@endpush
