@extends('admin.layouts.app')
@section('start-point')
    Thống kê doanh thu
@endsection
@section('title')
    Biểu đồ
@endsection
@section('content')
{{--  Thống kê doanh thu dựa trên đơn hàng thành công  --}}
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card card-height-100">
                <div class="d-flex">
                    <div class="flex-grow-1 p-3">
                        <h5 class="mb-3">Doanh thu ngày hôm nay</h5>
                        <strong class="fs-6">
                            <i class="fas fa-money-bill"></i> {{ number_format($doanhThuHomNay, 0, ',', '.') }} VNĐ
                        </strong>
                        {{--{{ now()->format('d') }}--}}
                    </div>
                    <div>
                        <div class="apex-charts" data-colors='["--vz-success" , "--vz-transparent"]' dir="ltr" id="theoNgay"></div>
                    </div>
                </div>
               <div class="p-3">
                   <p class="mb-0 text-muted">
                       @if($phanTram >= 0)
                           <span class="badge bg-light text-success mb-0">
                                    <i class="ri-arrow-up-line align-middle"></i>
                                    +{{ number_format($phanTram, 2, ',', '.') }}%
                                </span>
                       @else
                           <span class="badge bg-light text-danger mb-0">
                                    <i class="ri-arrow-down-line align-middle"></i>
                                    {{ number_format($phanTram, 2, ',', '.') }}%
                                </span>
                       @endif
                       so với hôm trước
                   </p>
               </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card card-height-100">
                <div class="d-flex">
                    <div class="flex-grow-1 p-3">
                        <h5 class="mb-3">Doanh thu tháng này </h5>
                        <strong class="fs-6">
                            <i class="fas fa-money-bill"></i> {{ number_format($doanhThuThangNay, 0, ',', '.') }} VNĐ
                        </strong>
                    </div>
                    <div>
                        <div class="apex-charts" data-colors='["--vz-success" , "--vz-transparent"]' dir="ltr" id="theoThang"></div>
                    </div>
                </div>
                <div class="p-3">
                    <p class="mb-0 text-muted">
                        @if($phanTramThang >= 0)
                            <span class="badge bg-light text-success mb-0">
                        <i class="ri-arrow-up-line align-middle"></i>
                        +{{ number_format($phanTramThang, 2, ',', '.') }}%
                    </span>
                        @else
                            <span class="badge bg-light text-danger mb-0">
                        <i class="ri-arrow-down-line align-middle"></i>
                        {{ number_format($phanTramThang, 2, ',', '.') }}%
                    </span>
                        @endif
                        so với tháng trước
                    </p>
                </div>
            </div>
        </div><!--end col-->

        <div class="col-xl-3 col-md-6">
            <div class="card card-height-100">
                <div class="d-flex">
                    <div class="flex-grow-1 p-3">
                        <h5 class="mb-3">Doanh thu năm {{ now()->year }}</h5>
                        <strong class="fs-6">
                            <i class="fas fa-money-bill"></i> {{ number_format($doanhThuNamNay, 0, ',', '.') }} VNĐ
                        </strong>
                    </div>
                    <div>
                        <div class="apex-charts" data-colors='["--vz-success" , "--vz-transparent"]' dir="ltr" id="theoNam"></div>
                    </div>
                </div>
                <div class="p-3">
                    <p class="mb-0 text-muted">
                        @if($phanTramNam >= 0)
                            <span class="badge bg-light text-success mb-0">
                                <i class="ri-arrow-up-line align-middle"></i>
                                    +{{ number_format($phanTramNam, 2, ',', '.') }}%
                                </span>
                        @else
                            <span class="badge bg-light text-danger mb-0">
                                    <i class="ri-arrow-down-line align-middle"></i>
                                    {{ number_format($phanTramNam, 2, ',', '.') }}%
                                </span>
                        @endif
                        so với năm trước
                    </p>
                </div>
            </div>
        </div><!--end col-->
{{--        <div class="col-xl-3 col-md-6">--}}
{{--            <div class="card card-height-100">--}}
{{--                <div class="d-flex">--}}
{{--                    <div class="flex-grow-1 p-3">--}}
{{--                        <h5 class="mb-3">--}}
{{--                            Doanh thu quý {{ $quy }}--}}
{{--                            <span class="dropdown" style="display:inline-block;">--}}
{{--                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"></a>--}}
{{--                            <ul class="dropdown-menu">--}}
{{--                                <li><a class="dropdown-item" href="#">Quý 1</a></li>--}}
{{--                                <li><a class="dropdown-item" href="#">Quý 2</a></li>--}}
{{--                                <li><a class="dropdown-item" href="#">Quý 3</a></li>--}}
{{--                                <li><a class="dropdown-item" href="#">Quý 4</a></li>--}}
{{--                            </ul>--}}
{{--                        </span>--}}
{{--                        </h5>--}}
{{--                        <p class="mb-0 text-muted">--}}
{{--                            @if($phanTramQuy >= 0)--}}
{{--                                <span class="badge bg-light text-success mb-0">--}}
{{--                                <i class="ri-arrow-up-line align-middle"></i>--}}
{{--                                    +{{ number_format($phanTramQuy, 2, ',', '.') }}%--}}
{{--                                </span>--}}
{{--                            @else--}}
{{--                                <span class="badge bg-light text-danger mb-0">--}}
{{--                                    <i class="ri-arrow-down-line align-middle"></i>--}}
{{--                                    {{ number_format($phanTramQuy, 2, ',', '.') }}%--}}
{{--                                </span>--}}
{{--                            @endif--}}
{{--                            so với quý trước--}}
{{--                        </p>--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <div class="apex-charts" data-colors='["--vz-danger", "--vz-transparent"]' dir="ltr" id="theoQuy"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


        <div class="col-xl-3 col-md-6">
            <div class="card card-height-100">
                <div class="d-flex">
                    <div class="flex-grow-1 p-3">
                        <h5 class="mb-3">
                            Doanh thu quý {{ $quy }}
                            <span class="dropdown" style="display:inline-block;">
                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" onclick="selectQuarter(1)">Quý 1</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="selectQuarter(2)">Quý 2</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="selectQuarter(3)">Quý 3</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="selectQuarter(4)">Quý 4</a></li>
                                </ul>
                            </span>
                        </h5>
                        <strong class="fs-6 mt-10">
                            <i class="fas fa-money-bill"></i> {{ number_format($doanhThuQuyHienTai, 0, ',', '.') }} VNĐ
                        </strong>
                    </div>
                    <div>
                        <div class="apex-charts" data-colors='["--vz-danger", "--vz-transparent"]' dir="ltr" id="theoQuy"></div>
                    </div>
                </div>
                <div class="p-3">
                    <p class="mb-0 text-muted">
                        @if($phanTramQuy >= 0)
                            <span class="badge bg-light text-success mb-0">
                                    <i class="ri-arrow-up-line align-middle"></i>
                                    +{{ number_format($phanTramQuy, 2, ',', '.') }}%
                                </span>
                        @else
                            <span class="badge bg-light text-danger mb-0">
                                    <i class="ri-arrow-down-line align-middle"></i>
                                    {{ number_format($phanTramQuy, 2, ',', '.') }}%
                                </span>
                        @endif
                        so với quý trước
                    </p>
                </div>
            </div>
        </div>

    </div><!--end row-->

    <div class="row">
        {{-- Thống kê doanh thu từng cuốn sách dựa trên đơn hàng thành công --}}
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Doanh Thu Sách Theo Tuần Hiện Tại</h4>
                    <div class="flex-shrink-0">
                        <div class="dropdown card-header-dropdown">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="fw-semibold text-uppercase fs-12">Sort by: </span><span class="text-muted">Nov 2021<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Oct 2021</a>
                                <a class="dropdown-item" href="#">Nov 2021</a>
                                <a class="dropdown-item" href="#">Dec 2021</a>
                                <a class="dropdown-item" href="#">Jan 2022</a>
                            </div>
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body pb-0">
                    <div id="doanhThuSach" class="apex-charts" dir="ltr"></div> <!-- Chart will be rendered here -->
                </div>
            </div>
        </div><!-- end col -->

        {{-- Thống kê doanh thu thể loại sách dựa trên đơn hàng thành công --}}
        <div class="col-xl-4">
            <div class="card card-height-100">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Doanh Thu Thể loại Sách Tuần Hiện Tại</h4>
                    <div class="flex-shrink-0">
                        <div class="dropdown card-header-dropdown">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted">Chọn<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Ngày</a>
                                <a class="dropdown-item" href="#">Tuần</a>
                                <a class="dropdown-item" href="#">Tháng</a>
                                <a class="dropdown-item" href="#">Năm</a>
                                <a class="dropdown-item" href="#">Quý</a>
                            </div>
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <div id="theLoai" class="apex-charts" dir="ltr"></div> <!-- Chart for book categories -->
                </div>
            </div> <!-- .card-->
        </div> <!-- .col-->
    </div><!-- end row -->
@endsection
<!-- Thêm vào trong phần <head> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@push('scripts')
    <!-- job-statistics js -->
    <script src="{{ asset('assets/admin/js/pages/job-statistics.init.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var chiTietDoanhThuHomNay = @json($chiTietDoanhThuHomNay);
            var chiTietDoanhThuThang = @json($chiTietDoanhThuThang);
            var chiTietNamNay = @json($chiTietNamNay);

// Biểu đồ doanh thu hôm nay
            var homnay = {
                series: [{
                    name: '',
                    data: chiTietDoanhThuHomNay
                }],
                chart: {
                    type: 'area',
                    height: 100,
                    sparkline: {
                        enabled: true
                    }
                },
                stroke: {
                    curve: 'smooth'
                },
                fill: {
                    opacity: 1,
                },
                colors: ['#34c38f'],
                tooltip: {
                    shared: true,
                    intersect: false,
                    y: {
                        formatter: function (value) {
                            return 'Doanh thu: ' + value.toLocaleString('vi-VN') + ' VNĐ';
                        }
                    }
                },
                xaxis: {
                    categories: Array.from({ length: chiTietDoanhThuHomNay.length }, (_, i) => 'Đơn hàng ' + (i + 1)),
                }
            };

            var nay = new ApexCharts(document.querySelector("#theoNgay"), homnay);
            nay.render();

// Biểu đồ doanh thu tháng
            var thang = {
                series: [{
                    name: '',
                    data: chiTietDoanhThuThang
                }],
                chart: {
                    type: 'area',
                    height: 100,
                    sparkline: {
                        enabled: true
                    }
                },
                stroke: {
                    curve: 'smooth'
                },
                fill: {
                    opacity: 1,
                },
                colors: ['#34c38f'],
                tooltip: {
                    shared: true,
                    intersect: false,
                    y: {
                        formatter: function (value) {
                            return 'Doanh thu: ' + value.toLocaleString('vi-VN') + ' VNĐ';
                        }
                    }
                },
                xaxis: {
                    categories: Array.from({ length: chiTietDoanhThuThang.length }, (_, i) => 'Đơn hàng ' + (i + 1)),
                }
            };

            var thangnay = new ApexCharts(document.querySelector("#theoThang"), thang);
            thangnay.render();

// Biểu đồ doanh thu năm nay
            var namNay = {
                series: [{
                    name: '',
                    data: chiTietNamNay
                }],
                chart: {
                    type: 'area',
                    height: 100,
                    sparkline: {
                        enabled: true
                    }
                },
                stroke: {
                    curve: 'smooth'
                },
                fill: {
                    opacity: 1,
                },
                colors: ['#34c38f'],
                tooltip: {
                    shared: true,
                    intersect: false,
                    y: {
                        formatter: function (value) {
                            return 'Doanh thu: ' + value.toLocaleString('vi-VN') + ' VNĐ';
                        }
                    }
                },
                xaxis: {
                    categories: Array.from({ length: chiTietNamNay.length }, (_, i) => 'Đơn hàng ' + (i + 1)),
                }
            };

            var nam = new ApexCharts(document.querySelector("#theoNam"), namNay);
            nam.render();

            var chiTietDoanhThuQuy = @json($chiTietDoanhThuQuy);
            var quy = {
                series: [{
                    name: '',
                    data: chiTietDoanhThuQuy
                }],
                chart: {
                    type: 'area',
                    height: 100,
                    sparkline: {
                        enabled: true
                    }
                },
                stroke: {
                    curve: 'smooth'
                },
                fill: {
                    opacity: 1,
                },
                colors: ['#34c38f'],
                tooltip: {
                    shared: true,
                    intersect: false,
                    y: {
                        formatter: function (value) {
                            return 'Doanh thu: ' + value.toLocaleString('vi-VN') + ' VNĐ';
                        }
                    }
                },
                xaxis: {
                    categories: Array.from({ length: chiTietDoanhThuQuy.length }, (_, i) => 'Đơn hàng ' + (i + 1)),
                }
            };

            var quynay = new ApexCharts(document.querySelector("#theoQuy"), quy);
            quynay.render();


        {{--function selectQuarter(quarter) {--}}
            {{--    // Gửi AJAX để lấy dữ liệu doanh thu của quý tương ứng và cập nhật biểu đồ--}}
            {{--    $.ajax({--}}
            {{--        url: '{{ route("thong-ke-doanh-thu.getQuarterData") }}', // Đường dẫn đến route mới để lấy dữ liệu--}}
            {{--        method: 'GET',--}}
            {{--        data: { quarter: quarter }, // Gửi quý được chọn đến server--}}
            {{--        success: function (response) {--}}
            {{--            if (response.success) {--}}
            {{--                // Nếu có dữ liệu doanh thu, cập nhật biểu đồ--}}
            {{--                quynay.updateSeries([{--}}
            {{--                    name: 'Doanh thu quý ' + quarter,--}}
            {{--                    data: response.chiTietDoanhThuQuy--}}
            {{--                }]);--}}
            {{--            } else {--}}
            {{--                // Nếu không có dữ liệu, thông báo hoặc hiển thị mặc định--}}
            {{--                alert(response.message); // Hiển thị thông báo không có doanh thu--}}
            {{--                quynay.updateSeries([{--}}
            {{--                    name: 'Doanh thu quý ' + quarter,--}}
            {{--                    data: [0] // Hiển thị dữ liệu mặc định (ví dụ: 0)--}}
            {{--                }]);--}}
            {{--            }--}}
            {{--        },--}}
            {{--        error: function () {--}}
            {{--            // Xử lý lỗi nếu có--}}
            {{--            alert('Đã xảy ra lỗi khi lấy dữ liệu.');--}}
            {{--        }--}}
            {{--    });--}}
            {{--}--}}


            {{--var chiTietDoanhThuQuy = @json($chiTietDoanhThuQuy); // Hoặc mảng rỗng ban đầu--}}
            {{--var quy = {--}}
            {{--    series: [{--}}
            {{--        name: '',--}}
            {{--        data: chiTietDoanhThuQuy--}}
            {{--    }],--}}
            {{--    chart: {--}}
            {{--        type: 'area',--}}
            {{--        height: 100,--}}
            {{--        sparkline: {--}}
            {{--            enabled: true--}}
            {{--        }--}}
            {{--    },--}}
            {{--    stroke: {--}}
            {{--        curve: 'smooth'--}}
            {{--    },--}}
            {{--    fill: {--}}
            {{--        opacity: 1,--}}
            {{--    },--}}
            {{--    colors: ['#34c38f'],--}}
            {{--    tooltip: {--}}
            {{--        shared: true,--}}
            {{--        intersect: false,--}}
            {{--        y: {--}}
            {{--            formatter: function (value) {--}}
            {{--                return 'Doanh thu: ' + value + ' VNĐ';--}}
            {{--            }--}}
            {{--        }--}}
            {{--    },--}}
            {{--    xaxis: {--}}
            {{--        categories: Array.from({ length: chiTietDoanhThuQuy.length }, (_, i) => 'Đơn hàng ' + (i + 1)),--}}
            {{--    }--}}
            {{--};--}}

            // Thể loại
            var theLoai = @json($theLoai);
            var doanhThu = @json($doanhThu);

            var seriesData = theLoai.map(function(loai) {
                var totalDoanhThu = Object.values(doanhThu[loai] || {}).reduce(function (a, b) {
                    return (parseFloat(a) || 0) + (parseFloat(b) || 0);
                }, 0);
                return totalDoanhThu;
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
                            size: '60%'
                        }
                    }
                },
                tooltip: {
                    y: {
                        formatter: function (value) {
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
            var chart = new ApexCharts(document.querySelector("#theLoai"), options);
            chart.render();

            // Doanh thu sách
            var doanhThu = @json($doanhThuTheoSachTheoTuan);
            var categories = [];
            var seriesData = [];
            var soLuongBanData = [];

            doanhThu.forEach(function(item) {
                categories.push(item.ten_sach);
                seriesData.push(item.tong_doanh_thu);
                soLuongBanData.push(item.so_luong_ban);
            });

            function formatCurrency(value) {
                return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.') + ' VNĐ';
            }

            var options = {
                series: [{
                    name: '',
                    data: seriesData
                }],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        barHeight: '50%',
                        distributed: true
                    }
                },
                xaxis: {
                    categories: categories,
                    labels: {
                        rotate: 0,
                        style: {
                            fontSize: '12px',
                            colors: ['#000'],
                        },
                        show: true,
                        trim: true,
                        formatter: function(value) {
                            return value.length > 10 ? value.substring(0, 10) + "..." : value;
                        }
                    }
                },
                tooltip: {
                    y: {
                        formatter: function (value, { dataPointIndex }) {
                            return 'Tổng doanh thu: ' + formatCurrency(value) + '<br>Số lượng đã bán: ' + soLuongBanData[dataPointIndex];
                        }
                    },
                    x: {
                        formatter: function(value, { dataPointIndex }) {
                            // Trả về tên cột đầy đủ khi hover
                            return categories[dataPointIndex];
                        }
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function (value) {
                        return formatCurrency(value);
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#doanhThuSach"), options);
            chart.render();


        });

    </script>
@endpush
