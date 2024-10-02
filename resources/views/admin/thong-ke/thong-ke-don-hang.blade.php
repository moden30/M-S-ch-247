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
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">TỔNG QUAN</h4>
            </div>
            <div class="card-body">
                <!-- Dropdown để chọn kiểu thống kê -->
                <div class="d-flex">
                    <div class="mb-3 col-xl-2">
                        {{-- <label for="statistic-type" class="form-label">Chọn kiểu thống kê</label> --}}
                        <select id="statistic-type" class="form-select">
                            <option value="week">Theo tuần</option>
                            <option value="month" selected>Theo tháng</option>
                            <option value="quarter">Theo quý</option>
                            <option value="year">Theo năm</option>
                        </select>
                    </div>

                    <div class="mb-3 col-xl-2 ps-3">
                        <select id="year-selector" class="form-select">
                            @for ($year = 2020; $year <= now()->year; $year++)
                                <option value="{{ $year }}" {{ $selectedYear == $year ? 'selected' : '' }}>
                                    {{ $year }}</option>
                            @endfor
                        </select>
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
        // Chuyển dữ liệu từ PHP sang JavaScript
        var thongKeTuan = @json($thongKeTuan);
        var thongKeThang = @json($thongKeThang);
        var thongKeQuy = @json($thongKeQuy);
        var annualData = @json($annualData);


        function updateChart(type) {
            var year = document.getElementById('year-selector').value;
            var currentMonth = new Date().getMonth() + 1; // Lấy tháng hiện tại
            var data = {
                week: thongKeTuan[year][currentMonth], // Chỉ lấy dữ liệu của tháng hiện tại
                month: thongKeThang[year],
                quarter: thongKeQuy[year],
                year: annualData[year]
            };

            var chart = echarts.init(document.getElementById('chart-bar-label-rotation'));

            var labels = [],
                successfulOrders = [],
                pendingOrders = [],
                cancelledOrders = [];

            if (type === 'week') {
                // Lặp qua từng tuần trong tháng hiện tại và thêm vào biểu đồ
                Object.keys(data.week).forEach(week => {
                    labels.push(`Tuần ${week}`);
                    successfulOrders.push(data.week[week].thanh_cong);
                    pendingOrders.push(data.week[week].dang_xu_ly);
                    cancelledOrders.push(data.week[week].that_bai);
                });
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
                    data: ['Đơn thành công', 'Đơn chờ xác nhận', 'Đơn đã hủy']
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '15%', // Để lại chỗ cho thanh cuộn ngang
                    containLabel: true
                },
                xAxis: {
                    type: 'category',
                    data: labels,
                    axisLabel: {
                        interval: 0,
                        rotate: 0, // Xoay nhãn để đảm bảo không bị chồng chéo
                    }
                },
                yAxis: {
                    type: 'value'
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
                        name: 'Đơn chờ xác nhận',
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
                        name: 'Đơn đã hủy',
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
                dataZoom: [{
                    type: 'slider', // Cho phép zoom và cuộn ngang bằng cách kéo thanh trượt
                    start: 0, // Bắt đầu từ đầu dữ liệu
                    end: 100 // Hiển thị tối đa 100% dữ liệu, có thể thay đổi để hiển thị ít hơn ban đầu
                }]
            };

            chart.setOption(option);
        }

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
