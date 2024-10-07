@extends('admin.layouts.app')
@section('start-point')
    Thống kê sách
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
        <div class="col-xl-3 col-md-6">
            <div class="card card-height-100">
                <div class="d-flex">
                    <div class="flex-grow-1 p-3">
                        <h5 class="mb-3">
                            Doanh thu <span id="selected-quy">quý {{ $quy }}</span>
                            <div id="statistic-type" class="dropdown" style="display:inline-block;">
                                <a href="#" class="dropdown-toggle" id="dropdownToggle" aria-expanded="false"><span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" id="statistic-dropdown" style="display: none; flex-direction: column;">
                                    <a class="dropdown-item-statistic" data-value="1" href="#">Quý 1</a>
                                    <a class="dropdown-item-statistic" data-value="2" href="#">Quý 2</a>
                                    <a class="dropdown-item-statistic" data-value="3" href="#">Quý 3</a>
                                    <a class="dropdown-item-statistic" data-value="4" href="#">Quý 4</a>
                                </div>
                            </div>
                        </h5>
                        <strong class="fs-6 mt-10">
                            <i class="fas fa-money-bill" ></i><span id="doanh-thu">   {{ number_format($doanhThuQuyHienTai, 0, ',', '.') }} VNĐ</span>
                        </strong>
                    </div>
                    <div>
                        <div class="apex-charts" data-colors='["--vz-danger", "--vz-transparent"]' dir="ltr" id="theoQuy"></div>
                    </div>
                </div>
                <div class="p-3">
                    <p class="mb-0 text-muted" id="phan-tram-quy">
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
                    <h4 id="sachId" class="card-title mb-0 flex-grow-1">Doanh Thu Sách Theo Tuần Hiện Tại</h4>
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
                                <h4 class="card-title mb-0">
                                      <span
                                        class="date-highlight text-danger"></span>
                                    <span
                                        class="date-highlight text-danger"></span>
                                </h4>
                                <h4 class="card-title mb-0"></h4>
                            <form action="" method="GET" class="form-inline">
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
                                <button type="submit" class="btn btn-primary mb-2">Xem</button>
                            </form>

                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body pb-0">
                    <div class="d-flex justify-content-end">
                        <div class="dropdown card-header-dropdown" id="donHangSach">
                            <button type="button" class="btn btn-soft-secondary material-shadow-none btn-sm" data-period="1">
                                Ngày
                            </button>
                            <button type="button" class="btn btn-soft-secondary material-shadow-none btn-sm" data-period="2">
                                Tuần
                            </button>
                            <button type="button" class="btn btn-soft-secondary material-shadow-none btn-sm" data-period="3">
                                Tháng
                            </button>
                            <button type="button" class="btn btn-soft-secondary material-shadow-none btn-sm" data-period="4">
                                Năm
                            </button>
                            <button type="button" class="btn btn-soft-secondary material-shadow-none btn-sm" data-period="5">
                                Quý
                            </button>
                        </div>
                    </div>
                    <div id="doanhThuSach" class="apex-charts" dir="ltr"></div> <!-- Chart will be rendered here -->
                </div>
            </div>
        </div><!-- end col -->

        {{-- Thống kê doanh thu thể loại sách dựa trên đơn hàng thành công --}}
        <div class="col-xl-4">
            <div class="card card-height-100">
                <div class="card-header align-items-center d-flex">
                    <h4 id="category-title" class="card-title mb-0 flex-grow-1">Doanh Thu Thể loại Sách Tuần Hiện Tại</h4>
                    <div class="flex-shrink-0">
                        <div class="dropdown card-header-dropdown">
                            <button class="btn btn-soft-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Chọn
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" id="category-dropdown">
                                <a class="dropdown-item" data-value="1" data-type="category" href="#">Ngày</a>
                                <a class="dropdown-item" data-value="2" data-type="category" href="#">Tuần</a>
                                <a class="dropdown-item" data-value="3" data-type="category" href="#">Tháng</a>
                                <a class="dropdown-item" data-value="4" data-type="category" href="#">Năm</a>
                                <a class="dropdown-item" data-value="5" data-type="category" href="#">Quý</a>
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
@push('styles')
    <!-- Thêm vào trong phần <head> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .dropdown-menu {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 5px;
        }

        .dropdown-item-statistic {
            text-align: center;
            width: 100%;
            padding: 5px;
            transition: background-color 0.3s;
        }

        .dropdown-item-statistic:hover {
            background-color: #f1f1f1;
        }
    </style>
@endpush


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
                    categories: Array.from({length: chiTietDoanhThuHomNay.length}, (_, i) => 'Đơn hàng ' + (i + 1)),
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
                    categories: Array.from({length: chiTietDoanhThuThang.length}, (_, i) => 'Đơn hàng ' + (i + 1)),
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
                    categories: Array.from({length: chiTietNamNay.length}, (_, i) => 'Đơn hàng ' + (i + 1)),
                }
            };
            var nam = new ApexCharts(document.querySelector("#theoNam"), namNay);
            nam.render();

            // Biểu đồ doanh thu quý này
            function updateRevenueChart(quy, nam, chiTietDoanhThuQuy = null, doanhThuQuyHienTai = null, phanTramQuy = null) {
                document.getElementById('selected-quy').textContent = 'Quý ' + quy;
                if (doanhThuQuyHienTai !== null) {
                    document.getElementById('doanh-thu').textContent = new Intl.NumberFormat('vi-VN', {
                        style: 'currency',
                        currency: 'VND'
                    }).format(doanhThuQuyHienTai);
                }
                if (phanTramQuy !== null) {
                    var phanTramElement = document.getElementById('phan-tram-quy');
                    if (phanTramQuy >= 0) {
                        phanTramElement.innerHTML = `
                <span class="badge bg-light text-success mb-0">
                    <i class="ri-arrow-up-line align-middle"></i>
                    +${phanTramQuy.toFixed(2)}%
                </span>`;
                    } else {
                        phanTramElement.innerHTML = `
                <span class="badge bg-light text-danger mb-0">
                    <i class="ri-arrow-down-line align-middle"></i>
                    ${phanTramQuy.toFixed(2)}%
                </span>`;
                    }
                }
                if (chiTietDoanhThuQuy !== null && Array.isArray(chiTietDoanhThuQuy)) {
                    var options = {
                        series: [{
                            name: 'Doanh thu',
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
                            categories: Array.from({length: chiTietDoanhThuQuy.length}, (_, i) => 'Đơn hàng ' + (i + 1)),
                        }
                    };
                    if (typeof quynay !== 'undefined') {
                        quynay.destroy();
                    }
                    quynay = new ApexCharts(document.querySelector("#theoQuy"), options);
                    quynay.render();
                } else {
                    console.error('Dữ liệu biểu đồ không hợp lệ');
                }
            }
            var quyHienTai = {{ $quy }};
            var namHienTai = new Date().getFullYear();
            var chiTietDoanhThuQuy = @json($chiTietDoanhThuQuy);
            var doanhThuQuyHienTai = {{ $doanhThuQuyHienTai }};
            var phanTramQuy = {{ $phanTramQuy }};
            console.log('Chi tiết doanh thu quý:', chiTietDoanhThuQuy);
            if (Array.isArray(chiTietDoanhThuQuy)) {
                updateRevenueChart(quyHienTai, namHienTai, chiTietDoanhThuQuy, doanhThuQuyHienTai, phanTramQuy);
            } else {
                console.error('Dữ liệu chiTietDoanhThuQuy không hợp lệ:', chiTietDoanhThuQuy);
            }

            document.querySelectorAll('.dropdown-item-statistic').forEach(item => {
                item.addEventListener('click', function (e) {
                    e.preventDefault();
                    var quy = this.getAttribute('data-value');
                    var nam = new Date().getFullYear();
                    fetch(`/admin/get-revenue-data?quy=${quy}&nam=${nam}`)
                        .then(response => response.json())
                        .then(data => {
                            updateRevenueChart(quy, nam, data.chiTietDoanhThuQuy, data.doanhThuQuyHienTai, data.phanTramQuy);
                        })
                        .catch(error => console.error('Error:', error));
                });
            });

            // Thể loại

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
                        // if (typeof doanhThu === 'object' && !Array.isArray(doanhThu)) {
                        //     seriesData = Object.values(doanhThu);
                        // } else {
                        //     seriesData = doanhThu;
                        // }
                        var seriesData = theLoai.map(function (loai) {
                            var totalDoanhThu = Object.values(doanhThu[loai] || {}).reduce(function (a, b) {
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
                                    formatter: function (value) {
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.') + ' VNĐ';
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
                item.addEventListener('click', function (e) {
                    e.preventDefault();
                    var selectedText = this.textContent;
                    var titleElement = document.querySelector('#category-title');
                    titleElement.textContent = `Doanh Thu Thể loại Sách Theo ${selectedText}`;
                });
            });
            console.log('Trang web đã tải xong, hiển thị biểu đồ mặc định cho tuần.');
            updateCategoryChart(2);

            document.querySelectorAll('#category-dropdown .dropdown-item').forEach(item => {
                item.addEventListener('click', function (e) {
                    e.preventDefault();
                    var value = this.getAttribute('data-value');
                    var type = this.getAttribute('data-type');
                    if (type === 'category') {
                        updateCategoryChart(value);
                    }
                });
            });

// Doanh thu sách
            var chart = null;
            function updateBookChart(period) { // Đổi tên hàm để không trùng lặp
                fetch(`/admin/get-doanh-thu?period=${period}`)
                    .then(response => response.json())
                    .then(data => {
                        var categories = [];
                        var seriesData = [];
                        var soLuongBanData = [];
                        data.forEach(function(item) {
                            categories.push(item.ten_sach);
                            seriesData.push(item.tong_doanh_thu);
                            soLuongBanData.push(item.so_luong_ban);
                        });
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
                        if (chart !== null) {
                            chart.destroy();
                        }
                        chart = new ApexCharts(document.querySelector("#doanhThuSach"), options);
                        chart.render();
                    })
                    .catch(error => console.error('Error:', error));
            }
            function formatCurrency(value) {
                return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.') + ' VNĐ';
            }
            document.querySelectorAll('#donHangSach button').forEach(function(button) {
                button.addEventListener('click', function() {
                    var period = this.getAttribute('data-period');
                    updateBookChart(period); // Gọi hàm updateBookChart
                });
            });
            document.querySelectorAll('#donHangSach button').forEach(button => {
                button.addEventListener('click', function () {
                    var period = this.getAttribute('data-period');
                    var periodText = this.textContent.trim();
                    var titleElement = document.getElementById('sachId');
                    titleElement.textContent = `Doanh Thu Sách Theo ${periodText}`;
                });
            });
            updateBookChart(2);
        });

        // Xử lý mũi tên trỏ xuống chọn quý
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownToggle = document.getElementById('dropdownToggle');
            const dropdownMenu = document.getElementById('statistic-dropdown');
            dropdownToggle.addEventListener('click', function(event) {
                event.preventDefault();
                dropdownMenu.style.display = dropdownMenu.style.display === 'none' || dropdownMenu.style.display === '' ? 'flex' : 'none';
            });
            document.addEventListener('click', function(event) {
                if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.style.display = 'none';
                }
            });
            document.querySelectorAll('.dropdown-item-statistic').forEach(item => {
                item.addEventListener('click', function(event) {
                    event.preventDefault();
                    const selectedValue = this.getAttribute('data-value');
                    console.log('Selected value:', selectedValue);
                    dropdownMenu.style.display = 'none';
                });
            });
        });

    </script>
@endpush
