@extends('admin.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-0">ĐƠN HÀNG HÔM NAY</h4>
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
                                            {{-- Nếu doanh thu hôm qua là 0 và doanh thu hôm nay cũng là 0 thì không thay đổi --}}
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

                {{--    Hóa đơn chưa thanh toán    --}}
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

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">TỔNG QUAN</h4>
                </div>
                <div class="card-body">
                    <!-- Dropdown để chọn kiểu thống kê -->
                    <div class="mb-3">
                        <label for="statistic-type" class="form-label">Chọn kiểu thống kê</label>
                        <select id="statistic-type" class="form-select">
                            <option value="week">Theo tuần</option>
                            <option value="month" selected>Theo tháng</option>
                            <option value="quarter">Theo quý</option>
                            <option value="year">Theo năm</option>
                        </select>
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
        // Chuyển dữ liệu từ PHP sang JavaScript
        var thongKeTuan = @json($thongKeTuan);
        var thongKeThang = @json($thongKeThang);
        var thongKeQuy = @json($thongKeQuy);
        var annualData = @json($annualData);
        // Dữ liệu cho các loại thống kê
        var chartData = {
            week: {
                labels: ['Tuần 1', 'Tuần 2', 'Tuần 3', 'Tuần 4'],
                successfulOrders: thongKeTuan.map(item => item.thanh_cong),
                pendingOrders: thongKeTuan.map(item => item.dang_xu_ly),
                cancelledOrders: thongKeTuan.map(item => item.that_bai)
            },
            // Các phần dữ liệu khác (month, quarter, year) vẫn giữ nguyên
            month: {
                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8',
                    'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'
                ],
                successfulOrders: thongKeThang.map(item => item.thanh_cong),
                pendingOrders: thongKeThang.map(item => item.dang_xu_ly),
                cancelledOrders: thongKeThang.map(item => item.that_bai)
            },
            quarter: {
                labels: thongKeQuy.map(item => item.start_of_quarter + ' - ' + item.end_of_quarter),
                successfulOrders: thongKeQuy.map(item => item.thanh_cong),
                pendingOrders: thongKeQuy.map(item => item.dang_xu_ly),
                cancelledOrders: thongKeQuy.map(item => item.that_bai)
            },
            year: {
                labels: Object.keys(annualData).map(year => `Năm ${year}`),
        successfulOrders: Object.values(annualData).map(data => data.thanh_cong),
        pendingOrders: Object.values(annualData).map(data => data.dang_xu_ly),
        cancelledOrders: Object.values(annualData).map(data => data.that_bai)
            }
        };

        function calculateTotalOrders() {
            for (const key in chartData) {
                const data = chartData[key];
                data.totalOrders = data.successfulOrders.map((item, index) => {
                    return data.successfulOrders[index] + data.pendingOrders[index] + data.cancelledOrders[index];
                });
            }
        }
        calculateTotalOrders();

        // Hàm cập nhật biểu đồ
        function updateChart(type) {
            var myChart = echarts.init(document.getElementById('chart-bar-label-rotation'));

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
                    data: ['Đơn thành công', 'Đơn chờ xác nhận', 'Đơn đã hủy']
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '3%',
                    containLabel: true
                },
                xAxis: {
                    type: 'category',
                    data: chartData[type].labels
                },
                yAxis: {
                    type: 'value'
                },
                series: [{
                        name: 'Đơn thành công',
                        type: 'bar',
                        data: chartData[type].successfulOrders,
                        label: {
                            show: true,
                            position: 'inside',
                            formatter: '{c}',
                            fontSize: 10
                        }
                    },
                    {
                        name: 'Đơn chờ xác nhận',
                        type: 'bar',
                        data: chartData[type].pendingOrders,
                        label: {
                            show: true,
                            position: 'inside',
                            formatter: '{c}',
                            fontSize: 10
                        }
                    },
                    {
                        name: 'Đơn đã hủy',
                        type: 'bar',
                        data: chartData[type].cancelledOrders,
                        label: {
                            show: true,
                            position: 'inside',
                            formatter: '{c}',
                            fontSize: 10
                        }
                    }
                ]
            };

            myChart.setOption(option);
        }

        // Sự kiện thay đổi kiểu thống kê
        document.getElementById('statistic-type').addEventListener('change', function() {
            var selectedType = this.value;
            updateChart(selectedType); // Cập nhật biểu đồ dựa vào kiểu thống kê được chọn
        });

        // Khởi tạo biểu đồ lần đầu
        updateChart('month'); // Đặt tuần là mặc định
    </script>
@endpush
