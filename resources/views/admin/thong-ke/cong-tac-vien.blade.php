@extends('admin.layouts.app')
@section('start-point')
    Thống kê cộng tác viên
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
                                <h4 class="fs-16 mb-1">Xin chào,
                                    <span class="text-danger">
                                        @if (auth()->check())
                                            {{ auth()->user()->ten_doc_gia }}
                                        @endif!
                                    </span>
                                </h4>
                                <p class="text-muted mb-0">Đây là những gì diễn ra ngày hôm nay.</p>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="card-title mb-0 flex-grow-1">Tổng quan cộng tác viên </h4>
                                <div class="flex-shrink-0">
                                    <div class="dropdown card-header-dropdown">
                                        <button class="btn btn-soft-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Chọn
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                                            id="category-dropdown">
                                            <a class="dropdown-item" data-value="tong_quan" href="#">Tổng quan</a>
                                            <a class="dropdown-item" data-value="ngay" href="#">Ngày</a>
                                            <a class="dropdown-item" data-value="tuan" href="#">Tuần</a>
                                            <a class="dropdown-item" data-value="thang" href="#">Tháng</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div id="table-gridjs"></div>
                            </div><!-- end card-body -->
                        </div><!-- end card -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="card-title mb-0">Top 10 đăng sách</h4>
                                {{-- <div class="flex-shrink-0">
                                    <div class="dropdown card-header-dropdown">
                                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <span class="fw-semibold text-uppercase fs-12">Lọc: </span>
                                            <span class="text-muted">Tùy chọn <i
                                                    class="mdi mdi-chevron-down ms-1"></i></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end" id="filter-topdangsach">
                                            <a class="dropdown-item filter-option" data-value="top-dang-sach-tong-quan"
                                                href="#">Tổng quan</a>
                                            <a class="dropdown-item filter-option" data-value="top-dang-sach-ngay"
                                                href="#">Ngày</a>
                                            <a class="dropdown-item filter-option" data-value="top-dang-sach-tuan"
                                                href="#">Tuần</a>
                                            <a class="dropdown-item filter-option" data-value="top-dang-sach-thang"
                                                href="#">Tháng</a>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="card-body">
                                <div id="bar_chart" class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Top 10 doanh thu</h4>
                            </div>

                            <div class="card-body">
                                <div id="column_distributed"
                                    data-colors='[  "--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-dark", "--vz-info",
                                                    "--vz-secondary", "--vz-light", "--vz-purple", "--vz-teal"]'
                                    class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Top 10 nhiều đánh giá </h4>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div id="stacked_bar_100"
                                    data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-dark"]'
                                    class="apex-charts" dir="ltr"></div>
                            </div><!-- end card-body -->
                        </div><!-- end card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Cộng tác viên nhiều lượt đọc sách nhất </h4>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div id="line_chart" style="width: 100%; height: 400px;" data-colors='["--vz-primary"]'
                                    class="line_chart" dir="ltr"></div>
                            </div><!-- end card-body -->
                        </div><!-- end card -->
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection

@push('styles')
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/gridjs/theme/mermaid.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/admin/libs/prismjs/prism.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>

    <script src="{{ asset('assets/admin/libs/gridjs/gridjs.umd.js') }}"></script>

    <script>
        let gridInstance = null;

        document.addEventListener('DOMContentLoaded', function() {
            // Thiết lập giá trị mặc định là 'tong_quan'
            const defaultFilter = 'tong_quan';
            setFilterLabel(defaultFilter); // Cập nhật label mặc định cho dropdown
            fetchData(defaultFilter); // Gửi yêu cầu AJAX với bộ lọc mặc định

            // Gắn lại sự kiện click cho các mục dropdown
            document.querySelectorAll('#category-dropdown .dropdown-item').forEach(function(item) {
                item.addEventListener('click', function(event) {
                    event.preventDefault(); // Ngừng reload trang khi click vào item

                    const filter = this.getAttribute(
                        'data-value'); // Lấy giá trị bộ lọc từ data-value
                    setFilterLabel(filter); // Cập nhật nội dung của button dropdown

                    // Gửi yêu cầu AJAX tới server với bộ lọc được chọn
                    fetchData(filter);
                });
            });
        });

        // Hàm cập nhật nội dung cho button dropdown
        function setFilterLabel(filter) {
            const filterLabel = {
                'tong_quan': 'Tổng quan',
                'ngay': 'Theo ngày',
                'tuan': 'Theo tuần',
                'thang': 'Theo tháng'
            };

            // Cập nhật nội dung của button dropdown với bộ lọc đã chọn
            document.getElementById('dropdownMenuButton').innerText = filterLabel[filter];
        }


        // Hàm gửi yêu cầu AJAX và cập nhật dữ liệu vào bảng
        function fetchData(filter) {
            fetch(`{{ route('cong-tac-vien.index') }}?filter=${filter}`, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    updateGridData(data);
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }

        // Hàm cập nhật dữ liệu vào bảng Grid.js
        function updateGridData(data) {
            const gridElement = document.getElementById("table-gridjs");

            if (gridElement) {
                const gridData = data.map(item => [
                    item.ten,
                    item.tong_so_sach_da_dang + ' quyển',
                    item.tong_so_luot_dat + ' lượt',
                    new Intl.NumberFormat('vi-VN', {
                        style: 'currency',
                        currency: 'VND',
                        minimumFractionDigits: 0
                    }).format(item.tong_doanh_thu).replace('₫', '').replace(/\./g, ',') + ' VNĐ'
                ]);

                if (gridInstance) {

                    gridInstance.updateConfig({
                        data: gridData
                    }).forceRender();
                } else {

                    gridInstance = new gridjs.Grid({
                        columns: [{
                                name: "Độc giả"
                            },
                            {
                                name: "Số sách đã đăng"
                            },
                            {
                                name: "Số lượt mua"
                            },
                            {
                                name: "Tổng thu nhập"
                            }
                        ],
                        data: gridData, // Cập nhật dữ liệu mới
                        pagination: {
                            limit: 5
                        },
                        sort: true,
                        search: true
                    }).render(gridElement);
                }
            }
        }
    </script>
@endpush

@push('scripts')
    <script>
        var sachData = @json($sachData);
        var ctvNames = @json($ctvNames);

        // Cấu hình biểu đồ
        var options = {
            series: [{
                name: 'Số lượng sách',
                data: sachData
            }],
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val + " quyển";
                    }
                }
            },
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: ctvNames
            },
            colors: ['rgba(10, 179, 156, 0.85)'],
        };

        // Khởi tạo biểu đồ
        var chart = new ApexCharts(document.querySelector("#bar_chart"), options);
        chart.render();
    </script>
@endpush

@push('scripts')
    <script>
        var sachData = @json($tongDoanhThu);
        var ctvNames = @json($tenDocGia);

        var options = {
            series: [{
                name: 'Doanh Thu',
                data: sachData
            }],
            chart: {
                height: 350,
                type: 'bar'
            },
            plotOptions: {
                bar: {
                    columnWidth: '45%',
                    distributed: true
                }
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                show: false
            },
            xaxis: {
                categories: ctvNames,
                labels: {
                    style: {
                        colors: ['#FF4560', '#008FFB', '#00E396', '#775DD0', '#FEB019', '#FF66C3', '#D1D1D1',
                            '#5D5D5D'
                        ],
                        fontSize: '12px'
                    },
                    formatter: function(value) {
                        let words = value.split(' ');
                        return words[words.length - 1]; // Chỉ hiển thị tên
                    }
                },
                tooltip: {
                    enabled: true,
                    formatter: function(val, opts) {
                        return ctvNames[opts.dataPointIndex];
                    }
                }
            },
            yaxis: {
                labels: {
                    formatter: function(value) {
                        // Định dạng số: loại bỏ phần thập phân, thêm "VNĐ"
                        return value.toLocaleString('vi-VN', {
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 0
                        }) + " VNĐ";
                    },
                    style: {
                        fontSize: '12px',
                        colors: ['#5D5D5D']
                    }
                },
            },
            tooltip: {
                enabled: true,
                y: {
                    formatter: function(val) {
                        return val.toLocaleString('vi-VN', {
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 0
                        }) + " VNĐ";
                    }
                }
            }
        };
        var chart = new ApexCharts(document.querySelector("#column_distributed"), options);
        chart.render();
    </script>
@endpush
@push('scripts')
    <script>
        var options = {
            series: [{
                    name: 'Rất Hay',
                    data: {!! json_encode($data['rat_hay']) !!}
                },
                {
                    name: 'Hay',
                    data: {!! json_encode($data['hay']) !!}
                },
                {
                    name: 'Trung Bình',
                    data: {!! json_encode($data['trung_binh']) !!}
                },
                {
                    name: 'Tệ',
                    data: {!! json_encode($data['te']) !!}
                },
                {
                    name: 'Rất Tệ',
                    data: {!! json_encode($data['rat_te']) !!}
                }
            ],
            chart: {
                height: 350,
                type: 'bar',
                stacked: true,
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                }
            },
            dataLabels: {
                enabled: true
            },
            xaxis: {
                categories: {!! $labelsJson !!},
                title: {
                    text: 'Cộng Tác Viên'
                },
                labels: {
                    formatter: function(value) {
                        let words = value.split(' ');
                        return words[words.length - 1]; // Chỉ hiển thị tên
                    }
                }
            },
            yaxis: {
                labels: {
                    formatter: function(val) {
                        return val; // Không thêm % nữa, hiển thị số lượng
                    }
                }
            },
            tooltip: {
                x: {
                    formatter: function(val, opts) {
                        return opts.w.globals.categoryLabels[opts.dataPointIndex] || val;
                    }
                }
            },
            legend: {
                position: 'top',
                horizontalAlign: 'left',
                offsetX: 40
            },
            fill: {
                opacity: 1
            },
        };

        var chart = new ApexCharts(document.querySelector("#stacked_bar_100"), options);
        chart.render();
    </script>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
           
            var tacGia = @json($tacGia); 
            var luotDoc = @json($luotDoc); 

           
            var data = tacGia.map((name, index) => ({
                fullName: name,
                shortName: name.split(' ').pop(), 
                value: luotDoc[index],
            }));

           
            data.sort((a, b) => a.value - b.value);

          
            var sortedShortNames = data.map(item => item.shortName); 
            var sortedFullNames = data.map(item => item.fullName); 
            var sortedValues = data.map(item => item.value); 
 // Khởi tạo biểu đồ
            var myChart = echarts.init(document.getElementById('line_chart'));

           
            var option = {
                xAxis: {
                    type: 'category',
                    data: sortedShortNames, 
                    axisLabel: {
                        rotate: 45, 
                    },
                },
                yAxis: {
                    type: 'value',
                    name: 'Lượt đọc',
                },
                series: [{
                    data: sortedValues, 
                    type: 'line',
                    label: {
                        show: true,
                        position: 'top',
                        textStyle: {
                            fontSize: 12,
                        },
                    },
                }, ],
                tooltip: {
                    trigger: 'axis',
                    formatter: function(params) {
                       
                        var index = params[0].dataIndex; 
                        var fullName = sortedFullNames[index]; 
                        var value = params[0].value; 
                        return `${fullName}: ${value}`;
                    },
                },
            };

            myChart.setOption(option);
        });
    </script>
@endpush
