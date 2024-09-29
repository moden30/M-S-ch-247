@extends('admin.layouts.app')
@section('start-point')
    Thống kê doanh thu
@endsection
@section('title')
    Biểu đồ
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card card-height-100">
                <div class="d-flex">
                    <div class="flex-grow-1 p-3">
                        <h5 class="mb-3">Doanh thu ngày {{ now()->format('d') }}</h5>
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
                    <div>
                        <div class="apex-charts" data-colors='["--vz-success" , "--vz-transparent"]' dir="ltr" id="theoNgay"></div>
                    </div>
                </div>
            </div>
        </div><!--end col-->

        <div class="col-xl-3 col-md-6">
            <div class="card card-height-100">
                <div class="d-flex">
                    <div class="flex-grow-1 p-3">
                        <h5 class="mb-3">Doanh thu tháng {{ now()->month }}</h5>
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
                    <div>
                        <div class="apex-charts" data-colors='["--vz-success" , "--vz-transparent"]' dir="ltr" id="theoThang"></div>
                    </div>
                </div>
            </div>
        </div><!--end col-->
        <div class="col-xl-3 col-md-6">
            <div class="card card-height-100">
                <div class="d-flex">
                    <div class="flex-grow-1 p-3">
                        <h5 class="mb-3">Doanh thu năm {{ now()->year }}</h5>
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
                    <div>
                        <div class="apex-charts" data-colors='["--vz-success" , "--vz-transparent"]' dir="ltr" id="theoNam"></div>
                    </div>
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
                    <div>
                        <div class="apex-charts" data-colors='["--vz-danger", "--vz-transparent"]' dir="ltr" id="theoQuy"></div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end row-->

@endsection

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
                            return 'Doanh thu: ' + value + ' VNĐ';
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
                            return 'Doanh thu: ' + value + ' VNĐ';
                        }
                    }
                },
                xaxis: {
                    categories: Array.from({ length: chiTietDoanhThuThang.length }, (_, i) => 'Đơn hàng ' + (i + 1)),
                }
            };

            var thangnay = new ApexCharts(document.querySelector("#theoThang"), thang);
            thangnay.render();

            // Biều đồ doanh thu năm nay
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
                            return 'Doanh thu: ' + value + ' VNĐ';
                        }
                    }
                },
                xaxis: {
                    categories: Array.from({ length: chiTietNamNay.length }, (_, i) => 'Đơn hàng ' + (i + 1)),
                }
            };

            var nam = new ApexCharts(document.querySelector("#theoNam"), namNay);
            nam.render();


            {{--var chiTietDoanhThuQuy = @json($chiTietDoanhThuQuy);--}}
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

            {{--var quynay = new ApexCharts(document.querySelector("#theoQuy"), quy);--}}
            {{--quynay.render();--}}


        });
        function selectQuarter(quy) {
            fetch(`/admin/thong-ke-doanh-thu/${quy}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data); // Kiểm tra dữ liệu trả về
                    var doanhThuHienTai = data.doanhThuQuyHienTai;
                    var doanhThuTruoc = data.doanhThuQuyTruoc;
                    var phanTramThayDoi = data.phanTramQuy;
                    var chiTietDoanhThuQuy = data.chiTietDoanhThuQuy;

                    // Xử lý hiển thị thông tin doanh thu
                    console.log("Doanh thu quý hiện tại: ", doanhThuHienTai);
                    console.log("Doanh thu quý trước: ", doanhThuTruoc);
                    console.log("Phần trăm thay đổi: ", phanTramThayDoi);

                    // Cập nhật biểu đồ nếu cần
                    if (quynay) {
                        quynay.destroy();
                    }

                    var quyData = {
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
                                    return 'Doanh thu: ' + value + ' VNĐ';
                                }
                            }
                        },
                        xaxis: {
                            categories: Array.from({ length: chiTietDoanhThuQuy.length }, (_, i) => 'Đơn hàng ' + (i + 1)),
                        }
                    };

                    quynay = new ApexCharts(document.querySelector("#theoQuy"), quyData);
                    quynay.render();
                });
        }


    </script>

@endpush
