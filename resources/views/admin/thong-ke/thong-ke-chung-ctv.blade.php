@extends('admin.layouts.app')
@section('start-point')
    Chi tiết
@endsection
@section('title')
    Biểu đồ
@endsection
@section('content')
    <div class="flex-grow-1 mb-3">
        <h4 class="fs-16 mb-1">Chào mừng,
            <span class="text-danger d-none d-xl-inline-block ms-1 fw-medium user-name-text">
                {{ $ten }}
            </span>
        </h4>
        <p class="text-muted mb-0">Khám phá không gian sáng tạo và chia sẻ tác phẩm của bạn tại Mê Sách 247!</p>
    </div>

    <div class="row project-wrapper">
        <div class="col-xxl-12">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-success-subtle text-success rounded-2 fs-2">
                                        <i data-feather="dollar-sign" class="text-success"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 overflow-hidden ms-3">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-3">Doanh số tổng theo tháng</p>
                                    <div class="d-flex align-items-center mb-3">
                                        <h4 class="fs-4 flex-grow-1 mb-0"><span>{{ number_format($tongDoanhSo, 0, ',', '.') }}</span> VNĐ</h4>
                                        <span class="badge {{ $phanTramDS > 0 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }} fs-12">
                                            <i class="{{ $phanTramDS > 0 ? 'ri-arrow-up-s-line' : 'ri-arrow-down-s-line' }} fs-13 align-middle me-1"></i>
                                            {{ number_format($phanTramDS) }} %
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->

                <div class="col-xl-4">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-warning-subtle text-warning rounded-2 fs-2">
                                        <i data-feather="award" class="text-warning"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-uppercase fw-medium text-muted mb-3">Hoa hồng ước tính theo tháng</p>
                                    <div class="d-flex align-items-center mb-3">
                                        <h4 class="fs-4 flex-grow-1 mb-0"><span>{{ number_format($tongHoaHong, 0, ',', '.') }}</span> VNĐ</h4>
                                        <span class="badge {{ $tongHoaHong > 0 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }} fs-12">
                                            <i class="{{ $tongHoaHong > 0 ? 'ri-arrow-up-s-line' : 'ri-arrow-down-s-line' }} fs-13 align-middle me-1"></i>
                                            {{ number_format($tongHoaHong) }} %
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->

                <div class="col-xl-4">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-info-subtle text-info rounded-2 fs-2">
                                        <i data-feather="star" class="text-info"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 overflow-hidden ms-3">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-3">Đánh giá theo tháng</p>
                                    <div class="d-flex align-items-center mb-3">
                                        <h4 class="fs-4 flex-grow-1 mb-0"><span>{{ $tongSoDanhGia }} Đánh giá</span></h4>
                                        <span class="badge {{ $phanTramDG > 0 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }} fs-12">
                                            <i class="{{ $phanTramDG > 0 ? 'ri-arrow-up-s-line' : 'ri-arrow-down-s-line' }} fs-13 align-middle me-1"></i>
                                            {{ number_format($phanTramDG) }} %
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->


            <div class="row">
                <div class="col-xxl-5">
                    <div class="d-flex flex-column h-100">
                        <div class="row h-100">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="alert alert-warning border-0 rounded-0 m-0 d-flex align-items-center"
                                            role="alert">
                                            <i data-feather="alert-triangle" class="text-warning me-2 icon-sm"></i>
                                            <div class="flex-grow-1 text-truncate">
                                                Mọi tác phẩm đăng lên đều phải tuân thủ quy tắc mà admin đưa ra
                                            </div>
                                        </div>
                                        <div class="row align-items-end">
                                            <div class="col-sm-8">
                                                <div class="p-3">
                                                    <p class="fs-16 lh-base">
                                                        <span style="font-size: 90%"class="fw-semibold">
                                                            Nếu vi phạm bạn có thể bị khoá truyện, nếu
                                                            tái phạm có thể bị khoá tài khoản vĩnh viễn
                                                            <i class="mdi mdi-arrow-right"></i>
                                                        </span>
                                                    </p>
                                                    <div class="mt-3">
                                                        <a href="{{ route('noi-quy.index') }}" class="btn btn-success">Xem quy
                                                            định</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="px-3">
                                                    <img src="{{ asset('assets/admin/images/user-illustarator-2.png') }}"
                                                        class="img-fluid" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div>
                            </div> <!-- end col-->
                        </div> <!-- end row-->
                        <div class="row h-100">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="row align-items-end">
                                            <div class="col-sm-4">
                                                <div class="px-3 mb-4">
                                                    <img style="width:700px;height:auto;" src="{{ asset('assets/admin/images/user-illustarator-21.png') }}"
                                                        class="img-fluid" alt="">
                                                </div>
                                            </div>
                                            <div class="col-sm-8 text-end">
                                                <div class="p-3">
                                                    <p class="fs-16 lh-base">
                                                        <span style="font-size: 90%" class="fw-semibold">
                                                            Nếu có thắc mắc bạn có thể tham khảo qua trang các câu hỏi thường gặp


                                                        </span>
                                                    </p>
                                                    <div class="mt-3">
                                                        <a href="{{ route('cau-hoi-thuong-gap.index') }}" class="btn btn-warning">Xem câu hỏi</a>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div> <!-- end card-body-->
                                </div>
                            </div> <!-- end col-->
                        </div> <!-- end row-->
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Thông số khác</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="fw-medium text-muted mb-0">Tổng đơn bán được tháng này</p>
                                                <h4 class="mt-4 ff-secondary cfs-22 fw-semibold">{{ number_format($tongDonDaBan) }}</h4>
                                                <p class="mb-0 text-muted text-truncate">
                                                    <span class="badge {{ $phanTramDDB >= 0 ? 'bg-light text-success' : 'bg-light text-danger' }} mb-0">
                                                        <i class="{{ $phanTramDDB >= 0 ? 'ri-arrow-up-line' : 'ri-arrow-down-line' }} align-middle"></i>
                                                        {{ $phanTramDDB }} %
                                                    </span>
                                                    so với tháng trước                                                                 .
                                                </p>
                                            </div>
                                            <div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                                        <i data-feather="eye" class="text-info"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col-md-6">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="fw-medium text-muted mb-0">Số lượng yêu thích tháng này</p>
                                                <h4 class="mt-4 ff-secondary cfs-22 fw-semibold">{{ $tongYeuThich }}</h4>
                                                <p class="mb-0 text-muted text-truncate">
                                                     <span class="badge {{ $phanTramYeuThich >= 0 ? 'bg-light text-success' : 'bg-light text-danger' }} mb-0">
                                                        <i class="{{ $phanTramYeuThich >= 0 ? 'ri-arrow-up-line' : 'ri-arrow-down-line' }} align-middle"></i>
                                                        {{ $phanTramYeuThich }} %
                                                    </span>
                                                    so với tháng trước                                                                  .
                                                </p>
                                            </div>
                                            <div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-danger-subtle rounded-circle fs-2">
                                                        <i data-feather="heart" class="text-danger"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div> <!-- end row-->
                    </div> <!-- end row-->
                </div>

                <div class="col-xxl-7">
                    <div class="card">
                        <div class="card-header align-items-center d-flex justify-content-between">
                            <h5 class="mb-0">Top 5 Sách Bán Chạy</h5>
                        </div>
                        <div class="card-body">
                            <div class="live-preview">
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">Ảnh Bìa</th>
                                                <th scope="col" class="text-center">Tên Sách</th>
                                                <th scope="col" class="text-center">Giá Bán</th>
                                                <th scope="col" class="text-center">Tổng Đơn Bán Được</th>
                                                <th scope="col" class="text-center">Xem Sách</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($topSach as $sach)
                                            <tr class="text-center"> <!-- Thêm class text-center cho toàn bộ hàng -->
                                                <td>
                                                    <img src="{{ Storage::url($sach->anh_bia_sach) }}" width="50px" height="60px">
                                                </td>
                                                <td>{{ $sach->ten_sach }}</td>
                                                <td>{{ number_format($sach->gia_goc, 0, ',', '.') }} VNĐ</td>
                                                <td>{{ $sach->dh_count }}</td>
                                                <td><a href="{{ route('sach.show', $sach->id) }}" class="link-success">Xem Sách <i class="ri-arrow-right-line align-middle"></i></a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-none code-view"></div>
                            </div><!-- end live-preview -->
                        </div><!-- end card-body -->
                    </div><!-- end card -->

                </div><!-- end col -->
            </div> <!-- end col-->


        </div> <!-- end row-->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0 align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Hoa Hồng Theo Tháng</h4>
                    </div>
                    <div class="card-body p-0 pb-2">
                        <div class="w-100">
                            <div id="bieuDo"
                                data-colors='["--vz-primary", "--vz-success", "--vz-danger"]'
                                data-colors-minimal='["--vz-light", "--vz-primary", "--vz-info"]'
                                data-colors-saas='["--vz-success", "--vz-info", "--vz-danger"]'
                                data-colors-modern='["--vz-warning", "--vz-primary", "--vz-success"]'
                                data-colors-interactive='["--vz-info", "--vz-primary", "--vz-danger"]'
                                data-colors-creative='["--vz-warning", "--vz-primary", "--vz-danger"]'
                                data-colors-corporate='["--vz-light", "--vz-primary", "--vz-secondary"]'
                                data-colors-galaxy='["--vz-secondary", "--vz-primary", "--vz-primary-rgb, 0.50"]'
                                data-colors-classic='["--vz-light", "--vz-primary", "--vz-secondary"]'
                                data-colors-vintage='["--vz-success", "--vz-primary", "--vz-secondary"]'
                                class="apex-charts" dir="ltr"></div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div>
    </div><!-- end col -->
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>

    <script>
        var thang = ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'];
        var data = @json($bieuDo);
        var bieuDo = {
            chart: {
                type: 'line',
                height: 350
            },
            stroke: {
                curve: 'smooth'
            },
            series: data,
            xaxis: {
                categories: thang
            },
            yaxis: {
                labels: {
                    formatter: function(value) {
                        return formatCurrency(value);
                    }
                }
            },
            tooltip: {
                shared: true,
                intersect: false,
                y: {
                    formatter: function(val) {
    // Lấy phần nguyên của số
    let integerPart = Math.floor(val);

    // Định dạng phần nguyên theo dấu '.'
    return integerPart.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ' VNĐ';
}

                }
            }
        };
        function formatCurrency(value) {
            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' VNĐ';
        }

        var chart = new ApexCharts(document.querySelector("#bieuDo"), bieuDo);
        chart.render();
    </script>

@endpush
