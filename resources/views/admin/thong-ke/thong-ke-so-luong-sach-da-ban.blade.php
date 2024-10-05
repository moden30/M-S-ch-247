@extends('admin.layouts.app')
@section('start-point')
    Thống kê doanh thu
@endsection
@section('title')
    Biểu đồ
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <div class="h-100">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card card-height-100">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Số lượng sách bán theo thể loại</h4>
                                <div class="flex-shrink-0">
                                    <div class="dropdown card-header-dropdown">
                                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            <span class="text-muted">Report<i
                                                    class="mdi mdi-chevron-down ms-1"></i></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Download Report</a>
                                            <a class="dropdown-item" href="#">Export</a>
                                            <a class="dropdown-item" href="#">Import</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div id="store-visits-source"
                                     data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]'
                                     data-colors-minimal='["--vz-primary", "--vz-primary-rgb, 0.85", "--vz-primary-rgb, 0.70", "--vz-primary-rgb, 0.60", "--vz-primary-rgb, 0.45"]'
                                     data-colors-interactive='["--vz-primary", "--vz-primary-rgb, 0.85", "--vz-primary-rgb, 0.70", "--vz-primary-rgb, 0.60", "--vz-primary-rgb, 0.45"]'
                                     data-colors-galaxy='["--vz-primary", "--vz-primary-rgb, 0.85", "--vz-primary-rgb, 0.70", "--vz-primary-rgb, 0.60", "--vz-primary-rgb, 0.45"]'
                                     class="apex-charts" dir="ltr"></div>
                            </div>
                        </div> <!-- .card-->
                    </div> <!-- .col-->
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-header border-0 align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Biểu Đồ Sách Đã Bán </h4>
                                <div id="donHangSach">
                                    <button type="button" data-period="1" class="btn btn-soft-secondary material-shadow-none btn-sm">
                                        Tuần
                                    </button>
                                    <button type="button" data-period="2" class="btn btn-soft-secondary material-shadow-none btn-sm">
                                        Tháng
                                    </button>
                                    <button type="button" data-period="3" class="btn btn-soft-secondary material-shadow-none btn-sm">
                                        Năm
                                    </button>
                                    <button type="button" data-period="4" class="btn btn-soft-primary material-shadow-none btn-sm">
                                        Quý
                                    </button>
                                </div>
                            </div><!-- end card header -->
                            <div class="card-header p-0 border-0 bg-light-subtle">
                                <div class="row g-0 text-center">
                                    <div class="col-6 col-sm-3">
                                        <div class="p-3 border border-dashed border-start-0">
                                            <h5 class="mb-1">
                                                <span class="counter-value" id="tongSoLuongBanDuoc" data-target="{{ $tongSoLuongBanDuoc }}">0</span>
                                            </h5>
                                            <p class="text-muted mb-0">Cuốn Sách Bán Được</p>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-6 col-sm-3">
                                        <div class="p-3 border border-dashed border-start-0">
                                            <h5 class="mb-1">
                                                <span class="counter-value" id="tongSoLuongBanDuocXL" data-target="{{ $tongSoLuongBanDuocXL }}">0</span>
                                            </h5>
                                            <p class="text-muted mb-0">Cuốn Sách Chờ Xử Lý</p>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-6 col-sm-3">
                                        <div class="p-3 border border-dashed border-start-0">
                                            <h5 class="mb-1">
                                                <span class="counter-value" id="tongSoLuongBanDuocTB" data-target="{{ $tongSoLuongBanDuocTB }}">0</span>
                                            </h5>
                                            <p class="text-muted mb-0">Cuốn Sách Mua Thất Bại</p>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-6 col-sm-3">
                                        <div class="p-3 border border-dashed border-start-0 border-end-0">
                                            <h5 class="mb-1 text-success">
                                                <span class="counter-value" id="tongDoanhThu" data-target="{{ $tongDoanhThuTuanNay }}">0</span> VNĐ
                                            </h5>
                                            <p class="text-muted mb-0">Tổng Doanh Thu</p>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                            </div>
                            <div class="card-body p-0 pb-2">
                                <div class="w-100">
                                    <div id="sachDaBan"
                                         data-colors='["--vz-primary", "--vz-success", "--vz-danger"]'
                                         class="apex-charts" dir="ltr"></div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    <!-- end col -->
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Top sách bán chạy nhất</h4>
                                <div class="flex-shrink-0">
                                    <div class="dropdown card-header-dropdown">
                                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            <span class="fw-semibold text-uppercase fs-12">Chọn:
                                            </span><span class="text-muted">Today<i
                                                    class="mdi mdi-chevron-down ms-1"></i></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Tuần</a>
                                            <a class="dropdown-item" href="#">Tháng</a>
                                            <a class="dropdown-item" href="#">Năm</a>
                                            <a class="dropdown-item" href="#">Qúy</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div class="table-responsive table-card">
                                    <div class="card-body">
                                        <div id="table-gridjs"></div>
                                    </div><!-- end card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end row-->

            </div> <!-- end .h-100-->

        </div> <!-- end col -->
    </div>
@endsection
@push('styles')
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/gridjs/theme/mermaid.min.css') }}">

@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- prismjs plugin -->
    <script src="{{ asset('assets/admin/libs/prismjs/prism.js') }}"></script>

    <!-- gridjs js -->
    <script src="{{ asset('assets/admin/libs/gridjs/gridjs.umd.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Lấy dữ liệu sách bán chạy từ backend
            var sachBanChay = @json($sachBanChay);

            new gridjs.Grid({
                columns: [
                    { name: "ID", hidden: true },
                    { name: "Tên sách", width: "auto" },
                    { name: "Số lượng đã bán", width: "auto" },
                    { name: "Tổng tiền", width: "auto" }
                ],
                data: sachBanChay.map(function (item) {
                    return [
                        item.sach.id,  // ID sách
                        item.sach.ten_sach,  // Tên sách
                        item.so_luong_ban,  // Số lượng đã bán
                        new Intl.NumberFormat().format(item.tong_tien) + " VND"  // Định dạng số tiền
                    ];
                }),
            }).render(document.getElementById("table-gridjs"));
        });

        document.addEventListener("DOMContentLoaded", function() {
            // Dữ liệu từ backend
            var sachBanTheoTuan = @json($sachBanTheoTuan);
            var sachDangXuLyTheoTuan = @json($sachDangXuLyTheoTuan);
            var sachThatBaiTheoTuan = @json($sachThatBaiTheoTuan);

            var sachBanTheoThang = @json($sachBanTheoThang);
            var sachDangXuLyTheoThang = @json($sachDangXuLyTheoThang);
            var sachThatBaiTheoThang = @json($sachThatBaiTheoThang);

            var sachBanTheoNam = @json($sachBanTheoNam);
            var sachDangXuLyTheoNam = @json($sachDangXuLyTheoNam);
            var sachThatBaiTheoNam = @json($sachThatBaiTheoNam);

            var sachBanTheoQuy = @json($sachBanTheoQuy);
            var sachDangXuLyTheoQuy = @json($sachDangXuLyTheoQuy);
            var sachThatBaiTheoQuy = @json($sachThatBaiTheoQuy);

            // Kiểm tra xem dữ liệu có được truyền đúng không
            console.log("Dữ liệu tuần:", sachBanTheoTuan, sachDangXuLyTheoTuan, sachThatBaiTheoTuan);

            // Nếu dữ liệu không tồn tại, không chạy hàm updateChart
            if (!sachBanTheoTuan || !sachDangXuLyTheoTuan || !sachThatBaiTheoTuan) {
                console.error("Dữ liệu không tồn tại");
                return;
            }

            // Tạo biểu đồ ban đầu
            var tenSachFull = []; // Lưu trữ tên sách đầy đủ cho tooltip
            var chartOptions = {
                chart: {
                    type: 'line',
                    height: 400
                },
                series: [],
                stroke: {
                    width: [0, 2, 2],
                    dashArray: [0, 0, 8]
                },
                colors: ['#28a745', '#005eff', '#ff0000'],
                xaxis: {
                    categories: [],
                    labels: {
                        formatter: function(value) {
                            if (typeof value === 'string') {
                                return value.length > 10 ? value.substring(0, 10) + '...' : value;
                            }
                            return value;
                        }
                    }
                },
                plotOptions: {
                    bar: {
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    }
                },
                dataLabels: {
                    enabled: false
                },
                legend: {
                    position: 'top'
                },
                tooltip: {
                    x: {
                        formatter: function(value, { dataPointIndex }) {
                            return tenSachFull[dataPointIndex]; // Hiển thị tên đầy đủ khi di chuột qua
                        }
                    },
                    y: {
                        formatter: function(value) {
                            return value.toLocaleString() + ' VND';
                        }
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#sachDaBan"), chartOptions);
            chart.render();

            // Hàm cập nhật dữ liệu biểu đồ và thông số
            function updateChartAndData(period) {
                var tenSach = [];
                var tongTienThanhCong = [];
                var tongTienDangXuLy = [];
                var tongTienThatBai = [];

                // Xác định dữ liệu theo kỳ
                let sachBan, sachDangXuLy, sachThatBai;

                switch (period) {
                    case '1': // Tuần
                        sachBan = sachBanTheoTuan;
                        sachDangXuLy = sachDangXuLyTheoTuan;
                        sachThatBai = sachThatBaiTheoTuan;
                        break;
                    case '2': // Tháng
                        sachBan = sachBanTheoThang;
                        sachDangXuLy = sachDangXuLyTheoThang;
                        sachThatBai = sachThatBaiTheoThang;
                        break;
                    case '3': // Năm
                        sachBan = sachBanTheoNam;
                        sachDangXuLy = sachDangXuLyTheoNam;
                        sachThatBai = sachThatBaiTheoNam;
                        break;
                    case '4': // Quý
                        sachBan = sachBanTheoQuy;
                        sachDangXuLy = sachDangXuLyTheoQuy;
                        sachThatBai = sachThatBaiTheoQuy;
                        break;
                }

                // Xử lý dữ liệu cho biểu đồ thành công
                tenSachFull = []; // Làm mới tên sách đầy đủ
                sachBan.forEach(function(item) {
                    // Lưu tên sách đầy đủ cho tooltip
                    tenSachFull.push(item.ten_sach);

                    // Cắt ngắn tên sách để hiển thị trên biểu đồ
                    var shortName = item.ten_sach.length > 10 ? item.ten_sach.substring(0, 10) + '...' : item.ten_sach;
                    tenSach.push(shortName);
                    tongTienThanhCong.push(item.tong_doanh_thu);
                });

                // Xử lý dữ liệu cho sách đang xử lý
                sachDangXuLy.forEach(function(item) {
                    tongTienDangXuLy.push(item.tong_doanh_thu);
                });

                // Xử lý dữ liệu cho thất bại
                sachThatBai.forEach(function(item) {
                    tongTienThatBai.push(item.tong_doanh_thu);
                });

                // Cập nhật biểu đồ với dữ liệu mới
                chart.updateOptions({
                    series: [
                        { name: 'Thành công', type: 'bar', data: tongTienThanhCong },
                        { name: 'Đang xử lý', type: 'line', data: tongTienDangXuLy },
                        { name: 'Thất bại', type: 'line', data: tongTienThatBai }
                    ],
                    xaxis: {
                        categories: tenSach // Dùng tên sách đã cắt ngắn
                    }
                });

                // Gửi yêu cầu AJAX đến server để cập nhật các thông số bán hàng
                fetch(`/admin/lay-du-lieu-theo-ky?period=${period}`)
                    .then(response => response.json())
                    .then(data => {
                        // Cập nhật thông số hiển thị
                        document.getElementById("tongSoLuongBanDuoc").textContent = data.tongSoLuongBanDuoc;
                        document.getElementById("tongSoLuongBanDuocXL").textContent = data.tongSoLuongBanDuocXL;
                        document.getElementById("tongSoLuongBanDuocTB").textContent = data.tongSoLuongBanDuocTB;
                        document.getElementById("tongDoanhThu").textContent = data.tongDoanhThu + " VNĐ";
                    })
                    .catch(error => {
                        console.error('Lỗi:', error);
                    });
            }

            // Thêm sự kiện click cho các nút lựa chọn kỳ
            document.querySelectorAll('#donHangSach button').forEach(function(button) {
                button.addEventListener('click', function() {
                    // Bỏ class 'btn-soft-primary' từ các nút và thêm vào nút được nhấn
                    document.querySelectorAll('#donHangSach button').forEach(btn => {
                        btn.classList.remove('btn-soft-primary');
                        btn.classList.add('btn-soft-secondary');
                    });
                    this.classList.remove('btn-soft-secondary');
                    this.classList.add('btn-soft-primary');

                    // Cập nhật biểu đồ và thông số dựa trên kỳ đã chọn
                    updateChartAndData(this.getAttribute('data-period'));
                });
            });

            // Hiển thị biểu đồ mặc định cho kỳ "Tuần" khi trang web tải
            updateChartAndData('1'); // Hiển thị biểu đồ và thông số với dữ liệu theo tuần mặc định
        });


    </script>

@endpush
