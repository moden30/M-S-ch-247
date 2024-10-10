@extends('admin.layouts.app')

@section('start-point')
    Thống kê
@endsection

@section('title')
    Biểu đồ
@endsection

@section('content')
    <div class="row">
        <!-- Thống kê sách theo đánh giá -->
        <div class="col-12">
            <div class="card card-height-100">
                <div class="card-header align-items-center d-flex justify-content-between">
                    <h4 class="card-title mb-0">Thống kê sách theo đánh giá</h4>
                    <div class="d-flex align-items-center gap-2">
                        <label for="tim_sach" class="col-form-label fw-bold mb-0">Tìm kiếm sách:</label>
                        <div class="position-relative">
                            <input type="text" id="tim_sach" class="form-control" placeholder="Nhập tên sách">
                            <ul id="ket_qua_tim_kiem" class="list-group"
                                style="display:none; position: absolute; z-index: 1000; width: 100%;"></ul>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="GET" action="{{ route('admin.sachDanhGiaCaoNhat') }}"
                        class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="sach_id" class="col-form-label fw-bold mb-0">Sách:</label>
                        </div>
                        <div class="col-auto">
                            <select name="sach_id" id="sach_id" class="form-select">
                                <option value="">Tất cả sách</option>
                                @foreach ($danh_sach_sach as $sach)
                                    <option value="{{ $sach->id }}"
                                        {{ $sach->id == request('sach_id') ? 'selected' : '' }}>
                                        {{ $sach->ten_sach }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Xem biểu đồ</button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div id="chart-sach-danh-gia-cao-nhat"></div>
                </div>
            </div>
        </div>

        <!-- Bảng top sách được yêu thích -->
        <div class="col-6">
            <div class="card card-height-100">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Top 10 sách được yêu thích</h4>
                    <div class="flex-shrink-0">
                        <div class="dropdown card-header-dropdown">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span class="fw-semibold text-uppercase fs-12">Chọn: </span>
                                <span class="text-muted">
                                    @if ($timeFilterSach == 'ngay')
                                        Ngày
                                    @elseif ($timeFilterSach == 'tuan')
                                        Tuần
                                    @elseif ($timeFilterSach == 'thang')
                                        Tháng
                                    @elseif ($timeFilterSach == 'nam')
                                        Năm
                                    @else
                                        Tất cả
                                    @endif
                                    <i class="mdi mdi-chevron-down ms-1"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="?time_filter_sach=ngay">Ngày</a>
                                <a class="dropdown-item" href="?time_filter_sach=tuan">Tuần</a>
                                <a class="dropdown-item" href="?time_filter_sach=thang">Tháng</a>
                                <a class="dropdown-item" href="?time_filter_sach=nam">Năm</a>
                                <a class="dropdown-item" href="?time_filter_sach=all">Tất cả</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="table-gridjs"></div>
                </div>
            </div>
        </div>
        <!-- Bảng top bài viết được bình luận nhiều nhất -->
        <div class="col-6">
            <div class="card card-height-100 ">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Top 10 bài viết được bình luận nhiều nhất</h4>
                    <div class="flex-shrink-0">
                        <div class="dropdown card-header-dropdown">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span class="fw-semibold text-uppercase fs-12">Chọn: </span>
                                <span class="text-muted">
                                    @if ($timeFilterBaiViet == 'ngay')
                                        Ngày
                                    @elseif ($timeFilterBaiViet == 'tuan')
                                        Tuần
                                    @elseif ($timeFilterBaiViet == 'thang')
                                        Tháng
                                    @elseif ($timeFilterBaiViet == 'nam')
                                        Năm
                                    @else
                                        Tất cả
                                    @endif
                                    <i class="mdi mdi-chevron-down ms-1"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="?time_filter_baiviet=ngay">Ngày</a>
                                <a class="dropdown-item" href="?time_filter_baiviet=tuan">Tuần</a>
                                <a class="dropdown-item" href="?time_filter_baiviet=thang">Tháng</a>
                                <a class="dropdown-item" href="?time_filter_baiviet=nam">Năm</a>
                                <a class="dropdown-item" href="?time_filter_baiviet=all">Tất cả</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div id="table-gridjs-binh-luan-bai-viet"></div>
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
    <!-- job-statistics js -->
    <script src="{{ asset('assets/admin/js/pages/job-statistics.init.js') }}"></script>
    <!-- ApexCharts for đánh giá chart -->
    <script src="{{ asset('assets/admin/js/pages/apexcharts.min.js') }}"></script>
    <!-- Thêm jQuery từ CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endpush

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var chartOptions = {
                chart: {
                    type: 'bar',
                    height: 350
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
                    categories: ['Tổng mức độ hài lòng']
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
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart-sach-danh-gia-cao-nhat"), chartOptions);
            chart.render();

            // Hàm gửi yêu cầu AJAX để tìm kiếm sách
            function timKiemSach(tuKhoa) {
                if (tuKhoa.length >= 2) {
                    $.ajax({
                        url: '{{ route('admin.timSach') }}',
                        method: 'GET',
                        data: {
                            tu_khoa: tuKhoa
                        },
                        success: function(data) {
                            var ketQuaTimKiem = $('#ket_qua_tim_kiem');
                            ketQuaTimKiem.empty().show();

                            if (data.length > 0) {
                                $.each(data, function(index, sach) {
                                    ketQuaTimKiem.append(
                                        '<li class="list-group-item ket-qua-item" data-id="' +
                                        sach.id + '">' + sach.ten_sach + '</li>'
                                    );
                                });
                            } else {
                                ketQuaTimKiem.append(
                                    '<li class="list-group-item">Không tìm thấy sách</li>');
                            }
                        }
                    });
                } else {
                    $('#ket_qua_tim_kiem').hide();
                }
            }

            // Sự kiện khi người dùng nhập ký tự (input)
            $('#tim_sach').on('input', function() {
                var tuKhoa = $(this).val(); // Lấy từ khóa từ ô tìm kiếm
                timKiemSach(tuKhoa);
            });

            // Sự kiện khi người dùng nhấn Enter (keypress)
            $('#tim_sach').on('keypress', function(event) {
                if (event.which == 13) {
                    event.preventDefault();
                    var tuKhoa = $(this).val();
                    timKiemSach(tuKhoa);
                }
            });

            // Xử lý khi chọn sách từ danh sách kết quả
            $(document).on('click', '.ket-qua-item', function() {
                var sachId = $(this).data('id');
                $('#ket_qua_tim_kiem').hide();
                $('#tim_sach').val($(this).text());

                // Gửi AJAX để lấy dữ liệu đánh giá cho sách đã chọn
                $.ajax({
                    url: '{{ route('admin.sachDanhGiaCaoNhat') }}',
                    method: 'GET',
                    data: {
                        sach_id: sachId
                    },
                    success: function(data) {
                        chart.updateSeries([{
                            name: 'Rất hay',
                            data: [data.phan_tram_rat_hay]
                        }, {
                            name: 'Hay',
                            data: [data.phan_tram_hay]
                        }, {
                            name: 'Trung bình',
                            data: [data.phan_tram_trung_binh]
                        }, {
                            name: 'Tệ',
                            data: [data.phan_tram_te]
                        }, {
                            name: 'Rất tệ',
                            data: [data.phan_tram_rat_te]
                        }]);
                    }
                });
            });

            document.getElementById('sach_id').addEventListener('change', function() {
                var sachId = this.value;
                $.ajax({
                    url: '{{ route('admin.sachDanhGiaCaoNhat') }}',
                    method: 'GET',
                    data: {
                        sach_id: sachId
                    },
                    success: function(data) {
                        chart.updateSeries([{
                            name: 'Rất hay',
                            data: [data.phan_tram_rat_hay]
                        }, {
                            name: 'Hay',
                            data: [data.phan_tram_hay]
                        }, {
                            name: 'Trung bình',
                            data: [data.phan_tram_trung_binh]
                        }, {
                            name: 'Tệ',
                            data: [data.phan_tram_te]
                        }, {
                            name: 'Rất tệ',
                            data: [data.phan_tram_rat_te]
                        }]);
                    },
                    error: function() {
                        alert('Không thể lấy dữ liệu đánh giá cho sách này.');
                    }
                });
            });

        });
    </script>

    <!-- Grid.js for Top sách được yêu thích -->
    <script src="{{ asset('assets/admin/libs/gridjs/gridjs.umd.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var hienThiYeuThich = @json($hienThiYeuThich);
            new gridjs.Grid({
                columns: [{
                        name: "ID",
                        hidden: true
                    },
                    {
                        name: "Ảnh bìa",
                        width: "15%",
                        formatter: (cell) => gridjs.html(
                            `<div class="d-flex justify-content-center"><img src="${cell}" alt="Ảnh bìa" style="width: 60px;"></div>`
                        )
                    },
                    {
                        name: "Tên sách",
                        width: "35%"
                    },
                    {
                        name: "Thể loại",
                        width: "30%"
                    },
                    {
                        name: "Lượt yêu thích",
                        width: "20%",
                        formatter: (cell) => gridjs.html(
                            `<p>${cell} lượt<p>`
                        )
                    }
                ],
                data: hienThiYeuThich.map(function(item) {
                    return [
                        item.id,
                        `{{ Storage::url('${item.anh_bia_sach}') }}`,
                        item.ten_sach,
                        item.the_loai.ten_the_loai,
                        item.nguoi_yeu_thich_count,
                    ];
                }),
                pagination: {
                    limit: 5
                },
                sort: true,
                search: false,
            }).render(document.getElementById("table-gridjs"));
        });
    </script>

    <!-- Grid.js for Top bài viết bình luận -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var topBaiVietBinhLuan = @json($topBaiVietBinhLuan);

            new gridjs.Grid({
                columns: [{
                        name: "ID",
                        hidden: true
                    },
                    {
                        name: "Ảnh bài viết",
                        width: "15%",
                        formatter: (cell) => gridjs.html(
                            `<div class="d-flex justify-content-center"><img src="${cell}" alt="Ảnh bài viết" style="width: 60px;"></div>`
                        )
                    },
                    {
                        name: "Tên bài viết",
                        width: "65%"
                    },
                    {
                        name: "Lượt bình luận",
                        width: "20%",
                        formatter: (cell) => gridjs.html(
                            `<p>${cell} lượt<p>`
                        )
                    },
                ],
                data: topBaiVietBinhLuan.map(function(item) {
                    return [
                        item.id,
                        `{{ Storage::url('${item.hinh_anh}') }}`,
                        item.tieu_de,
                        item.binh_luans_count
                    ];
                }),
                pagination: {
                    limit: 5
                },
                sort: true,
                search: false,
            }).render(document.getElementById("table-gridjs-binh-luan-bai-viet"));
        });
    </script>
@endpush
