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
                    <div id="doanhThuSach" class="apex-charts" dir="ltr"></div> <!-- Chart will be rendered here -->
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
{{--    <script src="{{ asset('assets/admin/libs/echarts/echarts.min.js') }}"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

// Doanh thu sách
            var chart = null;

            function updateBookChart(period) {
                console.log("Fetching data for period:", period);
                fetch('{{ route("doanh-thu.admin.doanhThu") }}?period=' + period)
                    .then(response => {
                        // Kiểm tra xem phản hồi từ server có hợp lệ không
                        if (!response.ok) {
                            console.error(`HTTP error! Status: ${response.status}`);
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json(); // Trả về dữ liệu dưới dạng JSON
                    })
                    .then(data => {
                        console.log("Received data:", data); // Kiểm tra dữ liệu nhận được từ API

                        if (data.error) {
                            console.error("Error in data:", data.error);
                            throw new Error(data.error); // Nếu dữ liệu có lỗi, ném lỗi ra ngoài
                        }

                        // Xử lý dữ liệu để vẽ biểu đồ
                        var categories = [];
                        var seriesData = [];
                        var soLuongBanData = [];

                        // Giả sử dữ liệu trả về là mảng các sản phẩm, với các thuộc tính như `ten_sach`, `tong_doanh_thu_admin`, `so_luong_ban`
                        data.forEach(function(item) {
                            categories.push(item.ten_sach);  // Danh mục sản phẩm
                            seriesData.push(item.tong_doanh_thu_admin);  // Doanh thu
                            soLuongBanData.push(item.so_luong_ban);  // Số lượng bán
                        });

                        // Cài đặt cho biểu đồ
                        var options = {
                            title: {
                                text: 'Doanh Thu Theo Sản Phẩm',
                                subtext: 'Dữ liệu doanh thu của các sản phẩm',
                                left: 'center'
                            },
                            tooltip: {
                                trigger: 'axis'
                            },
                            legend: {
                                data: ['Doanh Thu', 'Số Lượng Bán'],
                                top: '10%'
                            },
                            xAxis: {
                                type: 'category',
                                data: categories,  // Các danh mục sản phẩm
                                axisTick: {
                                    alignWithLabel: true
                                }
                            },
                            yAxis: [
                                {
                                    type: 'value',
                                    name: 'Doanh Thu',
                                    min: 0
                                },
                                {
                                    type: 'value',
                                    name: 'Số Lượng Bán',
                                    min: 0
                                }
                            ],
                            series: [
                                {
                                    name: 'Doanh Thu',
                                    type: 'bar',  // Loại biểu đồ
                                    data: seriesData,
                                    barWidth: '50%',
                                },
                                {
                                    name: 'Số Lượng Bán',
                                    type: 'line',  // Loại biểu đồ
                                    yAxisIndex: 1,  // Dùng trục y thứ 2
                                    data: soLuongBanData
                                }
                            ]
                        };

                        // Kiểm tra nếu chart đã được tạo trước đó thì dispose trước khi tạo mới
                        if (chart !== null) {
                            chart.dispose();
                        }

                        // Tạo mới biểu đồ
                        chart = echarts.init(document.getElementById("doanhThuSach"));
                        chart.setOption(options); // Gắn các cài đặt vào biểu đồ

                        console.log("Chart rendered successfully");
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error); // In ra lỗi nếu có
                    });
            }

            function formatCurrency(value) {
                return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.') + ' VNĐ';
            }

            document.querySelectorAll('#donHangSach button').forEach(function(button) {
                button.addEventListener('click', function() {
                    var period = this.getAttribute('data-period');
                    updateBookChart(period);

                    var periodText = this.textContent.trim();
                    var titleElement = document.getElementById('sachId');
                    titleElement.textContent = `Doanh Thu Sách Theo ${periodText}`;
                });
            });


            document.querySelectorAll('#donHangSach button').forEach(button => {
                button.addEventListener('click', function () {
                    var periodText = this.textContent.trim();
                    var titleElement = document.getElementById('sachId');
                    titleElement.textContent = `Doanh Thu Sách Theo ${periodText}`;
                });
            });

// Khởi tạo biểu đồ với khoảng thời gian mặc định (ví dụ: 2)
            updateBookChart(2);

        });


    </script>
@endpush
