@extends('admin.layouts.app')
@section('start-point')
    Quản lý
@endsection
@section('title')
    Biểu đồ
@endsection
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
                                <p class="text-muted mb-0">Đây là tổng quan các thông tin của mê sách 247</p>

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

                                </div>


                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                            {{ number_format($doanhThuHomNay, 0, ',', '.') }} VNĐ
                                        </h4>


                                        <a href="{{ route('thong-ke-doanh-thu.index') }}"
                                            class="text-decoration-underline">Xem chi tiết doanh thu</a>

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
                        <!-- card cho tổng doanh thu tuần này -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <p class="text-uppercase fw-medium text-muted mb-0">TỔNG LỢI NHUẬN</p>
                                    </div>

                                </div>


                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                            {{ number_format($doanhThuHomNay1, 0, ',', '.') }} VNĐ
                                        </h4>


                                        <a href="{{ route('thong-ke-admin.index') }}" class="text-decoration-underline">Xem
                                            chi tiết doanh thu</a>

                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-danger-subtle rounded fs-3">
                                            <i class="bx bx-money text-danger"></i>


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
                                    {{--                                    @unless (request()->has('start_date') && request()->has('end_date')) --}}
                                    {{--                                        <div class="flex-shrink-0"> --}}
                                    {{--                                            <h5 class="{{ $phanTram < 0 ? 'text-danger' : 'text-success' }} fs-14 mb-0"> --}}
                                    {{--                                                <i --}}
                                    {{--                                                    class="{{ $phanTram < 0 ? 'ri-arrow-right-down-line' : 'ri-arrow-right-up-line' }} fs-13 align-middle"></i> --}}
                                    {{--                                                {{ $phanTram < 0 ? '-' : '+' }} {{ abs($phanTram) }} % --}}
                                    {{--                                            </h5> --}}
                                    {{--                                        </div> --}}
                                    {{--                                    @endunless --}}
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                            <span class="counter-value" data-target="{{ $tongDonHangHomNay }}">0</span>
                                            đơn
                                            hàng
                                        </h4>
                                        <a href="{{ route('thong-ke-don-hang.thongKeDonHang') }}"
                                            class="text-decoration-underline">Xem chi tiết đơn hàng</a>
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
                                        <p class="text-uppercase fw-medium text-muted mb-0">SỐ LƯỢNG CỘNG TÁC VIÊN</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                            <span class="counter-value" data-target="{{ $soLuongCongTacVien }}"></span>
                                            Cộng tác viên
                                        </h4>
                                        <a href="{{ route('cong-tac-vien.index') }}" class="text-decoration-underline">Xem
                                            chi tiết công tác viên</a>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-warning-subtle rounded fs-3">
                                            <i class="bx bx-user-circle text-warning"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    {{--    Đơn đã hủy    --}}
                    {{-- <div class="col-xl-3 col-md-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <p class="text-uppercase fw-medium text-muted mb-0">TỔNG SÁCH</p>
                                    </div>

                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                            <span class="counter-value" data-target="{{ $tongSoSach }}"></span> Sách
                                        </h4>
                                        <span>Bạn có {{ $tongSoSach }} cuốn sách bán được</span>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-danger-subtle rounded fs-3">
                                            <i data-feather="book-open" class="text-danger bx bx-book"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div> <!-- end row-->

                <div class="row">

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
                            </div>

                            <div class="card-body p-0 pb-2">

                                <!-- Biểu đồ -->
                                <div id="chart-bar-label-rotation" data-colors='[ ]' class="e-charts"
                                    style="height: 400px;"></div>

                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div>

                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Sách được yêu thích</h4>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div class="table-responsive table-card">
                                    <!-- Grid.js will render the table here -->
                                    <div id="table-gridjs2"></div>
                                </div>

                                <!-- You can handle pagination directly in Grid.js settings, or customize it here if needed -->
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Tổng quan cộng tác viên</h4>

                            </div><!-- end card header -->

                            <div class="card-body">
                                <div class="table-responsive table-card">
                                    <div id="table-gridjs"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end row-->



            </div> <!-- end col -->
        </div>
    @endsection

    @push('scripts')
        <!-- job-statistics js -->
        <script src="{{ asset('assets/admin/js/pages/job-statistics.init.js') }}"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                function updateCategoryChart(type) {
                    fetch(`/admin/get-revenue-by-category?type=${type}`)
                        .then(response => response.json())
                        .then(data => {
                            if (!data.theLoai || !data.doanhThu) {
                                return;
                            }
                            var theLoai = data.theLoai;
                            var doanhThu = data.doanhThu;
                            var seriesData = theLoai.map(function(loai) {
                                return parseFloat(doanhThu[loai] || 0);
                            });
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
                                            size: '60%',
                                        }
                                    }
                                },
                                tooltip: {
                                    y: {
                                        formatter: function(value) {
                                            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.') +
                                                ' VNĐ';
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
        <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
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

                        cancelledOrders.push(data.month[month].that_bai);
                        revenue.push(doanhThuThang[year][month]); // Sử dụng dữ liệu doanh thu từ PHP
                    });
                } else if (type === 'quarter') {
                    Object.keys(data.quarter).forEach(quarter => {
                        labels.push(`Quý ${quarter}`);
                        successfulOrders.push(data.quarter[quarter].thanh_cong);

                        cancelledOrders.push(data.quarter[quarter].that_bai);
                        revenue.push(doanhThuQuy[year][quarter]); // Sử dụng dữ liệu doanh thu từ PHP
                    });
                } else if (type === 'year') {
                    labels.push(`Năm ${year}`);
                    successfulOrders.push(data.year.thanh_cong);

                    cancelledOrders.push(data.year.that_bai);
                    revenue.push(doanhThuNam[year]); // Sử dụng dữ liệu doanh thu từ PHP
                }


                var option = {
                    tooltip: {
                        trigger: 'axis',
                        axisPointer: {
                            type: 'shadow'
                        },
                        extraCssText: 'width: auto; min-width: 250px;',
                        formatter: function(params) {
                            let result = `<div>${params[0].axisValueLabel}</div>`;
                            params.forEach(param => {
                                let valueFormatted = param.value.toLocaleString('vi-VN').replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                                result +=
                                    `<div>${param.marker}${param.seriesName}: ${valueFormatted} ${param.seriesName === 'Doanh thu' ? 'VNĐ' : ''}</div>`;
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
                        data: ['Đơn thành công', 'Đơn thất bại', 'Doanh thu']
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
                                formatter: function(value) {
                                    // Convert the value to a string with a dot as the thousands separator
                                    var formattedValue = value.toLocaleString('vi-VN').replace(/,/g, '.');
                                    // Return the value with ' VND' appended
                                    return formattedValue + ' VNĐ';
                                }
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
    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/admin/libs/gridjs/theme/mermaid.min.css') }}">
        <style>
            /* Thiết lập chiều cao cho các dòng của Grid.js */
            .gridjs-tr {
                height: 70px;
                /* Có thể điều chỉnh giá trị này phù hợp với nhu cầu của bạn */
            }

            .gridjs-table {
                font-size: 100%;
                /* Giảm cỡ chữ xuống một nửa */

            }
        </style>
    @endpush
    @push('scripts')
        <script src="{{ asset('assets/admin/libs/prismjs/prism.js') }}"></script>

        <script src="{{ asset('assets/admin/libs/gridjs/gridjs.umd.js') }}"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var style = document.createElement('style');
                document.head.appendChild(style);
                style.innerHTML = `
                #table-gridjs .gridjs-th, #table-gridjs .gridjs-td {
                    border-right: none !important;
                    border-left: none !important;
                    padding: 8px;
                    text-align: left;
                }

                #table-gridjs .gridjs-tr {
                    border-bottom: 1px solid #ccc;
                }

                #table-gridjs .gridjs-tr:hover {
                    background-color: #f5f5f5;
                }
                `;

                new gridjs.Grid({
                    columns: [{
                            name: "Độc giả",
                            width: "auto",
                            formatter: function(e) {
                                return gridjs.html('<span>' + e + "</span>")
                            }
                        },
                        {
                            name: "Số sách đã đăng",
                            width: "auto",
                            formatter: function(e) {
                                return gridjs.html('<span>' + e + ' quyển' + "</span>")
                            }
                        }, {
                            name: "Số lượt mua",
                            width: "auto",
                            formatter: function(e) {
                                return gridjs.html('<span>' + e + ' lượt' + "</span>")
                            }
                        }, {
                            name: "Tổng thu nhập",
                            width: "auto",
                            formatter: function(e) {
                                var formattedCurrency = new Intl.NumberFormat('vi-VN', {
                                    style: 'decimal',
                                    minimumFractionDigits: 0
                                }).format(e);
                                return gridjs.html('<span>' + formattedCurrency + ' VNĐ</span>');
                            }
                        }
                    ],
                    pagination: {
                        limit: 5
                    },
                    sort: true,
                    search: false,
                    data: [
                        @foreach ($tongQuan as $ds)
                            [
                                '{{ $ds->ten }}',
                                '{{ $ds->tong_so_sach_da_dang }}',
                                '{{ $ds->tong_so_luot_dat }}',
                                '{{ $ds->tong_doanh_thu }}',
                            ],
                        @endforeach
                    ]
                }).render(document.getElementById("table-gridjs"));
            });
        </script>


        <!-- Grid.js for Top sách được yêu thích -->

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var style = document.createElement('style');
                document.head.appendChild(style);
                style.innerHTML = `

#table-gridjs2 .gridjs-th, #table-gridjs2 .gridjs-td {
    border-right: none !important;
    border-left: none !important;
    padding: 8px;
    text-align: left;
}



#table-gridjs2 .gridjs-tr {
    border-bottom: 1px solid #ccc;
}

#table-gridjs2 .gridjs-tr:hover {
    background-color: #f5f5f5;
}
`;

                function truncateText(text, maxLength) {
                    if (text.length > maxLength) {
                        return text.substring(0, maxLength) + '...';
                    }
                    return text;
                }

                var hienThiYeuThich = @json($hienThiYeuThich);
                new gridjs.Grid({
                    columns: [{
                            name: "ID",
                            hidden: true
                        },
                        {
                            name: "Ảnh bìa",
                            width: "10%", // Adjust width here
                            formatter: (cell) => gridjs.html(
                                `<img src="${cell}" alt="Book Image" style="width: 30px; height: 38px;">`
                            )
                        },
                        {
                            name: "Tên sách",
                            width: "auto",

                        }

                        ,

                        {
                            name: "Thể loại",
                            width: "20%", // Adjust width here

                        },
                        {
                            name: "Yêu thích",
                            width: "15%", // Adjusted width to be narrower

                        }
                    ],
                    data: hienThiYeuThich.map(function(item) {
                        return [
                            item.id,
                            `{{ Storage::url('${item.anh_bia_sach}') }}`,
                            item.ten_sach,
                            item.the_loai.ten_the_loai,
                            item.nguoi_yeu_thich_count
                        ];
                    }),
                    pagination: {
                        limit: 5
                    },
                    sort: true,
                    search: false,



                }).render(document.getElementById("table-gridjs2"));


            });
        </script>
    @endpush
