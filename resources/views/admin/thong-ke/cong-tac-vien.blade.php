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
                                    <span class="text-danger">@if (auth()->check())
                                            {{ auth()->user()->ten_doc_gia }}
                                        @endif!</span>
                                </h4>
                                <p class="text-muted mb-0">Đây là những gì diễn ra trong ngày hôm nay.</p>
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
                                <h4 class="card-title mb-0 flex-grow-1">Tổng quan độc giả </h4>
                                <div class="flex-shrink-0">
                                    <div class="dropdown card-header-dropdown">
                                        <button class="btn btn-soft-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Chọn
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end"
                                             aria-labelledby="dropdownMenuButton" id="category-dropdown">
                                            <!-- Thêm mục Tổng quan -->
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
                                <h4 class="card-title mb-0">Top 10 cộng tác viên đăng sách</h4>
                            </div>
                            <div class="card-body">
                                <div id="bar_chart" data-colors='["--vz-success"]' class="apex-charts" dir="ltr">
                                </div>
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
                                <h4 class="card-title mb-0">Top 10 cộng tác viên nhiều đánh giá nhất</h4>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div id="stacked_bar_100"
                                     data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-dark"]'
                                     class="apex-charts" dir="ltr"></div>
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

    <script src="{{ asset('assets/admin/libs/gridjs/gridjs.umd.js') }}"></script>

    <script>
        let gridInstance = null; // Biến lưu trữ instance của Grid.js

        document.addEventListener('DOMContentLoaded', function () {
            // Thiết lập giá trị mặc định là 'tong_quan'
            const defaultFilter = 'tong_quan';
            setFilterLabel(defaultFilter); // Cập nhật label mặc định cho dropdown
            fetchData(defaultFilter); // Gửi yêu cầu AJAX với bộ lọc mặc định

            // Gắn lại sự kiện click cho các mục dropdown
            document.querySelectorAll('#category-dropdown .dropdown-item').forEach(function (item) {
                item.addEventListener('click', function (event) {
                    event.preventDefault();  // Ngừng reload trang khi click vào item

                    const filter = this.getAttribute('data-value');  // Lấy giá trị bộ lọc từ data-value
                    setFilterLabel(filter);  // Cập nhật nội dung của button dropdown

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
                    console.log(data);  // Debug: Kiểm tra dữ liệu
                    updateGridData(data);  // Cập nhật bảng với dữ liệu mới
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
                    item.ten,  // Tên độc giả
                    item.tong_so_sach_da_dang + ' quyển',  // Số sách đã đăng
                    item.tong_so_luot_dat + ' lượt',  // Số lượt mua
                    new Intl.NumberFormat('vi-VN', {style: 'currency', currency: 'VND'}).format(item.tong_doanh_thu)  // Tổng thu nhập
                ]);

                if (gridInstance) {
                    // Nếu Grid.js đã được khởi tạo rồi, chỉ cần gọi phương thức update để cập nhật dữ liệu
                    gridInstance.updateConfig({
                        data: gridData
                    }).forceRender();
                } else {
                    // Nếu Grid.js chưa được khởi tạo, tạo mới
                    gridInstance = new gridjs.Grid({
                        columns: [
                            {name: "Độc giả"},
                            {name: "Số sách đã đăng"},
                            {name: "Số lượt mua"},
                            {name: "Tổng thu nhập"}
                        ],
                        data: gridData,  // Cập nhật dữ liệu mới
                        pagination: {limit: 5},
                        sort: true,
                        search: true
                    }).render(gridElement);
                }
            }
        }



    </script>
@endpush


@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var sachData = @json($sachData);
        var ctvNames = @json($ctvNames);

        var options = {
            series: [{
                data: sachData
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    borderRadiusApplication: 'end',
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
                data: sachData
            }],
            chart: {
                height: 350,
                type: 'bar',
                events: {
                    click: function (chart, w, e) {
                    }
                }
            },
            plotOptions: {
                bar: {
                    columnWidth: '45%',
                    distributed: true,
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
                        fontSize: '12px',
                    },
                    formatter: function (value) {
                        return value.length > 7 ? value.substring(0, 7) + '...' : value;
                    }
                },
                tooltip: {
                    enabled: true,
                    formatter: function (val, opts) {
                        return ctvNames[opts.dataPointIndex];
                    }
                }
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return "Tổng thu nhập: " + val.toLocaleString('vi-VN', {
                            style: 'currency',
                            currency: 'VND'
                        });
                    }
                }
            }
        };
        var chart = new ApexCharts(document.querySelector("#column_distributed"), options);
        chart.render();
    </script>
@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        // Dữ liệu biểu đồ

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
                    formatter: function (val) {
                        // Hiển thị tối đa 7 ký tự của tên
                        return val.length > 7 ? val.substring(0, 7) + "..." : val;
                    }
                }
            },
            yaxis: {
                title: {
                    text: 'Tỷ Lệ (%)'
                },
                labels: {
                    formatter: function (val) {
                        return val + "%";
                    }
                }
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + "%"; // Hiển thị tỉ lệ
                    }
                },
                x: {
                    formatter: function (val, opts) {
                        // Đảm bảo tên hiển thị đầy đủ
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

{{--@push('scripts')--}}
{{--    <script src="{{ asset('assets/admin/libs/prismjs/prism.js') }}"></script>--}}

{{--    <script src="{{ asset('assets/admin/libs/gridjs/gridjs.umd.js') }}"></script>--}}

{{--    <script>--}}
{{--        document.getElementById("table-gridjs") && new gridjs.Grid({--}}
{{--            columns: [{--}}
{{--                name: "Độc giả",--}}
{{--                width: "auto",--}}
{{--                formatter: function (e) {--}}
{{--                    return gridjs.html('<span class="">' + e + "</span>")--}}
{{--                }--}}
{{--            },--}}
{{--                {--}}
{{--                    name: "Số sách đã đăng",--}}
{{--                    width: "auto",--}}
{{--                    formatter: function (e) {--}}
{{--                        return gridjs.html('<span class="">' + e + '  quyển' + "</span>")--}}
{{--                    }--}}
{{--                }, {--}}
{{--                    name: "Số lượt mua",--}}
{{--                    width: "auto",--}}
{{--                    formatter: function (e) {--}}
{{--                        return gridjs.html('<span class="">' + e + '  lượt' + "</span>")--}}
{{--                    }--}}
{{--                }, {--}}
{{--                    name: "Tổng thu nhập",--}}
{{--                    width: "auto",--}}
{{--                    formatter: function (e) {--}}
{{--                        var formattedCurrency = new Intl.NumberFormat('vi-VN', {--}}
{{--                            style: 'currency',--}}
{{--                            currency: 'VND'--}}
{{--                        }).format(e);--}}
{{--                        return gridjs.html('<span class="">' + formattedCurrency + "</span>");--}}
{{--                    }--}}
{{--                }--}}
{{--            ],--}}
{{--            pagination: {--}}
{{--                limit: 5--}}
{{--            },--}}
{{--            sort: true,--}}
{{--            search: true,--}}
{{--            data: [--}}
{{--                    @foreach ($tongQuan as $ds)--}}
{{--                [--}}
{{--                    '{{ $ds->ten }}',--}}
{{--                    '{{ $ds->tong_so_sach_da_dang }}',--}}
{{--                    '{{ $ds->tong_so_luot_dat }}',--}}
{{--                    '{{ $ds->tong_doanh_thu }}',--}}
{{--                ],--}}
{{--                @endforeach--}}
{{--            ]--}}
{{--        }).render(document.getElementById("table-gridjs"));--}}

{{--        function showFullContent(linkElement, fullContent) {--}}
{{--            const textarea = linkElement.closest('div').previousElementSibling;--}}
{{--            textarea.value = fullContent;--}}
{{--        }--}}
{{--    </script>--}}
{{--@endpush--}}

