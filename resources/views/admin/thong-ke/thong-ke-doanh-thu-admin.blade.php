@extends('admin.layouts.app')
@section('start-point')
    Thống kê doanh thu Admin
@endsection
@section('title')
    Biểu đồ doanh thu Admin
@endsection
@section('content')
    <div class="row">
        {{-- Thống kê doanh thu từng cuốn sách dựa trên đơn hàng thành công --}}
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 id="sachId" class="card-title mb-0 flex-grow-1">Doanh Thu Sách Theo Tuần Hiện Tại</h4>
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
                </div><!-- end card header -->
                <div class="card-body pb-0">
                    <div id="chartDoanhThu" class="apex-charts" style="width: 100%; height: 400px;" dir="ltr"></div> <!-- Chart will be rendered here -->
                </div>
            </div>
        </div><!-- end col -->

        {{-- Thống kê doanh thu thể loại sách dựa trên đơn hàng thành công --}}
        <div class="col-xl-4">
            <div class="card card-height-100">
                <div class="card-header align-items-center d-flex">
                    <h4 id="category-title" class="card-title mb-0 flex-grow-1">Doanh Thu Thể Loại Sách Tuần Hiện Tại</h4>
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
    <script src="{{ asset('assets/admin/libs/echarts/echarts.min.js') }}"></script>
{{--    <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>--}}
    <script>
        // Dữ liệu từ backend
        const data = @json($thongKe);
        const labels = Array.from(new Set(data.map(item => item.tuan))); // Lấy các tuần duy nhất
        const doanhThuData = labels.map(tuan => {
            return data.filter(item => item.tuan == tuan).reduce((sum, item) => sum + item.gia_tri, 0);
        });
        const hoaHongAdminData = labels.map(tuan => {
            return data.filter(item => item.tuan == tuan).reduce((sum, item) => sum + item.hoa_hong_admin, 0);
        });
        const hoaHongCTVData = labels.map(tuan => {
            return data.filter(item => item.tuan == tuan).reduce((sum, item) => sum + item.hoa_hong_ctv, 0);
        });

        // Khởi tạo ECharts
        const chartDom = document.getElementById('chartDoanhThu');
        const myChart = echarts.init(chartDom);

        // Cấu hình biểu đồ
        const option = {
            title: {
                text: 'Thống kê doanh thu và hoa hồng theo tuần',
                left: 'center',
                textStyle: {
                    fontWeight: 'bold',
                    fontSize: 18
                }
            },
            tooltip: {
                trigger: 'axis',
                formatter: function (params) {
                    const week = params[0].name;
                    const doanhThu = params[0].data;
                    const hoaHongAdmin = params[1].data;
                    const hoaHongCTV = params[2].data;
                    return `${week} tuần<br>Doanh thu: ${doanhThu.toLocaleString()} đ<br>Hoa hồng Admin: ${hoaHongAdmin.toLocaleString()} đ<br>Hoa hồng CTV: ${hoaHongCTV.toLocaleString()} đ`;
                }
            },
            legend: {
                data: ['Doanh thu', 'Hoa hồng Admin', 'Hoa hồng CTV'],
                top: '10%',
                left: 'center'
            },
            xAxis: {
                type: 'category',
                data: labels,
                boundaryGap: false,
                axisLabel: {
                    rotate: 45, // Xoay nhãn trục x để dễ đọc hơn
                    interval: 0 // Hiển thị tất cả các nhãn
                }
            },
            yAxis: {
                type: 'value',
                axisLabel: {
                    formatter: '{value} đ' // Hiển thị đơn vị tiền tệ
                }
            },
            series: [
                {
                    name: 'Doanh thu',
                    type: 'line',
                    data: doanhThuData,
                    lineStyle: {
                        color: 'blue',
                        width: 2
                    },
                    smooth: true, // Làm mượt đường biểu đồ
                    symbol: 'circle', // Thêm biểu tượng hình tròn tại các điểm dữ liệu
                    symbolSize: 8
                },
                {
                    name: 'Hoa hồng Admin',
                    type: 'line',
                    data: hoaHongAdminData,
                    lineStyle: {
                        color: 'green',
                        width: 2
                    },
                    smooth: true, // Làm mượt đường biểu đồ
                    symbol: 'circle', // Thêm biểu tượng hình tròn tại các điểm dữ liệu
                    symbolSize: 8
                },
                {
                    name: 'Hoa hồng CTV',
                    type: 'line',
                    data: hoaHongCTVData,
                    lineStyle: {
                        color: 'orange',
                        width: 2
                    },
                    smooth: true, // Làm mượt đường biểu đồ
                    symbol: 'circle', // Thêm biểu tượng hình tròn tại các điểm dữ liệu
                    symbolSize: 8
                }
            ]
        };

        // Render biểu đồ
        myChart.setOption(option);
    </script>


@endpush
