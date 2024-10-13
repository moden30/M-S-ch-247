@extends('admin.layouts.app')
@section('start-point')
    Thống kê đơn hàng
@endsection
@section('title')
    Biểu đồ
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <style>
                .header-content {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    width: 100%;
                }

                .form-inline {
                    display: flex;
                    gap: 10px;
                    /* Adjust spacing between form elements */
                }
            </style>

            <div class="header-content">
                @if (request()->has('start_date') && request()->has('end_date'))
                    <h4 class="card-title mb-0">
                        ĐƠN HÀNG: Từ <span
                            class="date-highlight text-danger">{{ \Carbon\Carbon::parse(request()->start_date)->format('d-m-Y') }}</span>
                        đến ngày <span
                            class="date-highlight text-danger">{{ \Carbon\Carbon::parse(request()->end_date)->format('d-m-Y') }}</span>
                    </h4>
                @else
                    <h4 class="card-title mb-0">ĐƠN HÀNG HÔM NAY</h4>
                @endif
                <form action="{{ route('thong-ke-don-hang.thongKeDonHang') }}" method="GET" class="form-inline">
                    <button type="button" class="btn btn-light mb-2 border border-light" id="restoreButton"
                        title="Khôi phục ngày">
                        <i class="ri-refresh-line"></i>
                    </button>
                    <div class="row g-2 mb-2 ps-2">
                        <!-- Từ ngày -->
                        <div class="col">
                            <div class="input-group">
                                <span class="input-group-text">Từ ngày</span>
                                <input type="date" class="form-control" name="start_date" required title="Chọn ngày bắt đầu">
                            </div>
                        </div>

                        <!-- Đến ngày -->
                        <div class="col pe-2">
                            <div class="input-group">
                                <span class="input-group-text">Đến ngày</span>
                                <input type="date" class="form-control" name="end_date" required title="Chọn ngày kết thúc">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mb-2">
                        <i class="ri-filter-line"></i>
                    </button>

                </form>
            </div>
        </div>


        <script>
            document.getElementById('restoreButton').addEventListener('click', function() {
                window.location.href = window.location.pathname; // Resets the page to remove query parameters
            });
        </script>

        <div class="card-body">
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
                                    <span class="text-muted">Được thanh toán</span>
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
                                    <span class="text-muted">Đơn hàng đã thanh toán</span>
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
                                    <span class="text-muted">Đơn hàng đang chờ xử lý </span>
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
                                    <span class="text-muted">Đơn hàng thất bại</span>
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
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">TỔNG QUAN</h4>
                </div>
                <div class="card-body">
                    <!-- Dropdown để chọn kiểu thống kê -->
                    <div class="d-flex">
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
                                    <option value="{{ $year }}" {{ $selectedYear == $year ? 'selected' : '' }}>
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
                    <!-- Biểu đồ -->
                    <div id="chart-bar-label-rotation" data-colors='[ "--vz-success", "--vz-warning", "--vz-danger"]'
                        class="e-charts" style="height: 400px;"></div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
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
                cancelledOrders = [];

            var dataZoom = [{
                type: 'slider',
                start: 0,
                end: 100
            }];

            if (type === 'week') {
                // Lặp qua từng tháng và từng tuần trong tháng
                Object.keys(data.week).forEach(month => {
                    for (let week = 1; week <= 4; week++) {
                        labels.push(`Tháng ${month}, Tuần ${week}`);
                        successfulOrders.push(data.week[month][week].thanh_cong);
                        pendingOrders.push(data.week[month][week].dang_xu_ly);
                        cancelledOrders.push(data.week[month][week].that_bai);
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
                });
            } else if (type === 'quarter') {
                Object.keys(data.quarter).forEach(quarter => {
                    labels.push(`Quý ${quarter}`);
                    successfulOrders.push(data.quarter[quarter].thanh_cong);
                    pendingOrders.push(data.quarter[quarter].dang_xu_ly);
                    cancelledOrders.push(data.quarter[quarter].that_bai);
                });
            } else if (type === 'year') {
                labels.push(`Năm ${year}`);
                successfulOrders.push(data.year.thanh_cong);
                pendingOrders.push(data.year.dang_xu_ly);
                cancelledOrders.push(data.year.that_bai);
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
                        const total = params.reduce((sum, param) => sum + param.value, 0);
                        result += `<div><b>Tổng đơn: ${total}</b></div>`;
                        return result;
                    }
                },
                legend: {
                    data: ['Đơn thành công', 'Đơn đang xử lý', 'Đơn thất bại']
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
                yAxis: {
                    type: 'value',
                    name: 'Đơn hàng', // Nhãn cho trục y
                    nameLocation: 'end', // Vị trí của nhãn trục y
                    nameGap: 35 // Khoảng cách từ nhãn đến trục y
                },
                series: [{
                        name: 'Đơn thành công',
                        type: 'bar',
                        data: successfulOrders,
                        label: {
                            show: true,
                            position: 'inside',
                            formatter: '{c}',
                            fontSize: 10
                        }
                    },
                    {
                        name: 'Đơn đang xử lý',
                        type: 'bar',
                        data: pendingOrders,
                        label: {
                            show: true,
                            position: 'inside',
                            formatter: '{c}',
                            fontSize: 10
                        }
                    },
                    {
                        name: 'Đơn thất bại',
                        type: 'bar',
                        data: cancelledOrders,
                        label: {
                            show: true,
                            position: 'inside',
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
