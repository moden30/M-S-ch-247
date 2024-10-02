@extends('admin.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-0">ĐƠN HÀNG HÔM NAY</h4>
            <form action="{{ route('thong-ke-don-hang.thongKeDonHang') }}" method="GET"
                class="form-inline d-flex justify-content-end">
                <button type="button" class="btn btn-light mb-2" id="restoreButton" title="Khôi phục ngày">
                    <i id="restoreButton" class="ri-refresh-line"></i>
                </button>
                <div class="form-group mb-2 ps-3">
                    <label for="start_date" class="sr-only">Từ ngày</label>
                    <input type="date" class="form-control" name="start_date" required>
                </div>
                <div class="form-group  mb-2 ps-3 pe-3">
                    <label for="end_date" class="sr-only">Đến ngày</label>
                    <input type="date" class="form-control" name="end_date" required>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Xem Thống Kê</button>


                <script>
                    document.getElementById('restoreButton').addEventListener('click', function() {
                        window.location.href = window.location.pathname; // Chỉ lấy phần đường dẫn mà không có tham số truy vấn
                    });
                </script>

            </form>

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <!-- card cho tổng doanh thu tuần này -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <p class="text-uppercase fw-medium text-muted mb-0">TỔNG DOANH HÔM NAY</p>
                                </div>
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

                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                <span class="counter-value" data-target="{{ $tongDoanhThuHomNay }}">0</span> VNĐ

                            </h4>
                            <span
                                class="badge bg-warning me-1">{{ number_format($tongDoanhThuHomNay, 0, ',', '.') }}
                                VNĐ</span>
                            <span class="text-muted">Được thanh toán bởi khách hàng</span>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-light rounded fs-3">
                                <i data-feather="check-square" class="text-success icon-dual-success"></i>
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
                        <div class="flex-shrink-0">
                            <h5 class="{{ $phanTram < 0 ? 'text-danger' : 'text-success' }} fs-14 mb-0">
                                <i
                                    class="{{ $phanTram < 0 ? 'ri-arrow-right-down-line' : 'ri-arrow-right-up-line' }} fs-13 align-middle"></i>
                                {{ $phanTram < 0 ? '-' : '+' }} {{ abs($phanTram) }} %
                            </h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                <span class="counter-value" data-target="{{ $tongDonHangHomNay }}">0</span> đơn
                                hàng
                            </h4>
                            <span class="badge bg-warning me-1">{{ $tongDonHangHomNay }}</span>
                            <span class="text-muted">Tổng số đơn thành công hôm nay</span>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-light rounded fs-3">
                                <i data-feather="file-text" class="text-success icon-dual-success"></i>
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
                            <p class="text-uppercase fw-medium text-muted mb-0">ĐƠN CHƯA THANH TOÁN</p>
                        </div>
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

                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                <span class="counter-value" data-target="{{ $hoaDonHomNay }}"></span> Đơn hàng
                            </h4>
                            <span class="badge bg-warning me-1">{{ $hoaDonHomNay }}</span>
                            <span class="text-muted">Đơn chưa thanh toán bởi khách hàng</span>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-light rounded fs-3">
                                <i data-feather="clock" class="text-success icon-dual-success"></i>
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

            </div>
            <div class="d-flex align-items-end justify-content-between mt-4">
                <div>
                    <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                        <span class="counter-value" data-target="{{ $hoaDonHuyHomNay }}"></span> Đơn
                    </h4>
                    <span class="badge bg-warning me-1">{{ $hoaDonHuyHomNay }}</span>
                    <span class="text-muted"> Đã bị hủy bởi khách hàng hôm nay</span>
                </div>
                <div class="avatar-sm flex-shrink-0">
                    <span class="avatar-title bg-light rounded fs-3">
                        <i data-feather="x-octagon" class="text-success icon-dual-success"></i>
                    </span>
                </div>
            </div>
        </div><!-- end card body -->
    </div><!-- end card -->
</div><!-- end col -->
</div> <!-- end row-->
</div>
</div>
