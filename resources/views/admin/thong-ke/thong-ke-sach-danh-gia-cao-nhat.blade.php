@extends('admin.layouts.app')

@section('start-point')
    Thống kê
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
                        <h5 class="mb-3">Application</h5>
                        <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0"> <i
                                    class="ri-arrow-up-line align-middle"></i> 16.24 % </span> vs. previous month</p>
                    </div>
                    <div>
                        <div class="apex-charts" data-colors='["--vz-success" , "--vz-transparent"]' dir="ltr"
                            id="results_sparkline_charts3"></div>
                    </div>
                </div>
            </div>
        </div><!--end col-->
        <div class="col-xl-3 col-md-6">
            <div class="card card-height-100">
                <div class="d-flex">
                    <div class="flex-grow-1 p-3">
                        <h5 class="mb-3">Interviewed</h5>
                        <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0"> <i
                                    class="ri-arrow-up-line align-middle"></i> 34.24 % </span> vs. previous month</p>
                    </div>
                    <div>
                        <div class="apex-charts" data-colors='["--vz-success" , "--vz-transparent"]' dir="ltr"
                            id="results_sparkline_charts4"></div>
                    </div>
                </div>
            </div>
        </div><!--end col-->
        <div class="col-xl-3 col-md-6">
            <div class="card card-height-100">
                <div class="d-flex">
                    <div class="flex-grow-1 p-3">
                        <h5 class="mb-3">Hired</h5>
                        <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0"> <i
                                    class="ri-arrow-up-line align-middle"></i> 6.67 % </span> vs. previous month</p>
                    </div>
                    <div>
                        <div class="apex-charts" data-colors='["--vz-success" , "--vz-transparent"]' dir="ltr"
                            id="results_sparkline_charts"></div>
                    </div>
                </div>
            </div>
        </div><!--end col-->
        <div class="col-xl-3 col-md-6">
            <div class="card card-height-100">
                <div class="d-flex">
                    <div class="flex-grow-1 p-3">
                        <h5 class="mb-3">Rejected</h5>
                        <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0"> <i
                                    class="ri-arrow-down-line align-middle"></i> 3.24 % </span> vs. previous month</p>
                    </div>
                    <div>
                        <div class="apex-charts" data-colors='["--vz-danger", "--vz-transparent"]' dir="ltr"
                            id="results_sparkline_charts2"></div>
                    </div>
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->

    <div class="row">
        <div class="col-12">
            <div class="card card-height-100">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Thống kê sách theo đánh giá</h4>
                    <div class="flex-shrink-0">
                        <div class="dropdown card-header-dropdown">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span class="text-muted">Current Year<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Today</a>
                                <a class="dropdown-item" href="#">Last Week</a>
                                <a class="dropdown-item" href="#">Last Month</a>
                                <a class="dropdown-item" href="#">Current Year</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="chart-sach-danh-gia-cao-nhat"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/admin/js/pages/apexcharts.min.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var options = {
                chart: {
                    type: 'bar',
                    height: 400
                },
                series: [{
                    name: 'Rất hay',
                    data: [{{ $phan_tram_rat_hay }}]
                }, {
                    name: 'Hay',
                    data: [{{ $phan_tram_hay }}]
                }, {
                    name: 'Trung bình',
                    data: [{{ $phan_tram_trung_binh }}]
                }, {
                    name: 'Tệ',
                    data: [{{ $phan_tram_te }}]
                }, {
                    name: 'Rất tệ',
                    data: [{{ $phan_tram_rat_te }}]
                }],
                xaxis: {
                    categories: ['Tổng mức độ hài lòng'],
                    title: {
                        text: 'Mức độ hài lòng'
                    },
                    labels: {
                        rotate: -45,
                        style: {
                            fontSize: '12px'
                        }
                    }
                },
                yaxis: {
                    title: {
                        text: 'Phần trăm (%)'
                    },
                    labels: {
                        formatter: function(val) {
                            return val.toFixed(2) + "%";
                        }
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        dataLabels: {
                            position: 'top',
                        },
                    }
                },
                colors: ['#34c38f', '#556ee6', '#6f42c1', '#f1b44c', '#f46a6a'],
                dataLabels: {
                    enabled: true,
                    offsetY: -20,
                    style: {
                        fontSize: '12px',
                        colors: ['#304758']
                    },
                    formatter: function(val) {
                        return val.toFixed(2) + "%";
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart-sach-danh-gia-cao-nhat"), options);
            chart.render();
        });
    </script>
@endpush
