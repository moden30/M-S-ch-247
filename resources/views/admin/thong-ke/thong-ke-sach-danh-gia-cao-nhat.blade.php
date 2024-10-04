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
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Thống kê sách theo đánh giá</h4>
                    <form method="GET" action="{{ route('admin.sachDanhGiaCaoNhat') }}" class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="sach_id" class="col-form-label fw-bold">Sách:</label>
                        </div>
                        <div class="col-auto">
                            <select name="sach_id" id="sach_id" class="form-select">
                                <option value="">Tất cả sách</option> 
                                @foreach($danh_sach_sach as $sach)
                                    <option value="{{ $sach->id }}" {{ $sach->id == request('sach_id') ? 'selected' : '' }}>
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
@endpush

@push('scripts')
    <!-- ApexCharts for đánh giá chart -->
    <script src="{{ asset('assets/admin/js/pages/apexcharts.min.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var options = {
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
    
            // Cập nhật biểu đồ khi thay đổi sách
            document.getElementById('sach_id').addEventListener('change', function() {
                var sachId = this.value;
                $.ajax({
                    url: '{{ route("admin.sachDanhGiaCaoNhat") }}', 
                    method: 'GET',
                    data: { sach_id: sachId },
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
                        name: "Tên sách",
                        width: "auto"
                    },
                    {
                        name: "Thể loại",
                        width: "auto"
                    },
                    {
                        name: "Số lượng yêu thích",
                        width: "auto"
                    },
                ],
                data: hienThiYeuThich.map(function(item) {
                    return [
                        item.id,
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
                        name: "Tên bài viết",
                        width: "auto"
                    },
                    {
                        name: "Số lượng bình luận",
                        width: "auto"
                    },
                ],
                data: topBaiVietBinhLuan.map(function(item) {
                    return [
                        item.id,
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
