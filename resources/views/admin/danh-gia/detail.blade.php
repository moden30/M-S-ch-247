@extends('admin.layouts.app')
@section('start-point')
    Chi tiết đánh giá
@endsection
@section('title')
    Chi tiết đánh giá
@endsection
@section('content')
    <div class="row">
        <div class="col-xxl-3">
            <div class="card">
                <div class="card-body text-center">
                    <!-- Ảnh thay thế -->
                    <div class="mb-2">
                        <img src="{{ Storage::url($danhGia->sach->anh_bia_sach) }}" alt="Ảnh Sản Phẩm" class="img-fluid"
                            style="max-width: 200px;">
                    </div>

                    <!-- Tên sản phẩm dưới chân ảnh -->
                    <h5 class="fs-14 mb-4">{{ $danhGia->sach->ten_sach }}</h5>

                    <!-- Nút Xem Sản Phẩm -->
                    <a href="{{ route('sach.show', $danhGia->sach_id) }}" class="btn btn-primary">Xem Sách</a>
                </div>
            </div>

            <!--end card-->
            <div class="card mb-3">
                <div class="card-body">
                    <div class="table-card">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td class="fw-medium">Mức Độ</td>
                                    <td class="fw-medium">Số Lượt Đánh Giá</td>
                                </tr>
                                <tr>
                                    <td><span class="badge text-white w-100 fs-6" style="background-color: green;">Rất hay</span></td>
                                    <td>{{ $ratHay }} lượt</td>
                                </tr>
                                <tr>
                                    <td><span class="badge text-white w-100 fs-6" style="background-color: #BEEA03;">Hay</span></td>
                                    <td>{{ $hay }} lượt</td>
                                </tr>
                                <tr>
                                    <td><span class="badge text-white w-100 fs-6" style="background-color: #FFD100;">Trung bình</span></td>
                                    <td>{{ $trungBinh }} lượt</td>
                                </tr>
                                <tr>
                                    <td><span class="badge text-white w-100 fs-6" style="background-color: #FE9308;">Tệ</span></td>
                                    <td>{{ $te }} lượt</td>
                                </tr>
                                <tr>
                                    <td><span class="badge text-white w-100 fs-6" style="background-color: red;">Rất tệ</span></td>
                                    <td>{{ $ratTe }} lượt</td>
                                </tr>
                            </tbody>
                        </table>
                        <!--end table-->
                    </div>
                </div>
            </div>

        </div>
        <!---end col-->
        <div class="col-xxl-9">
            <div class="card">
                <div class="card-body">
                    <div class="text-muted">
                        {{-- <div class="position-absolute top-0 end-0 p-3">
                            <span class="badge {{ $colorClass }} text-white p-3">
                                {{ $name }}
                            </span>
                        </div> --}}
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-3 fw-semibold text-uppercase">Thông Tin Người Đánh Giá</h6>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Họ tên</th>
                                            <th>Điện thoại</th>
                                            <th>Email</th>
                                            <th>Ngày đánh giá</th>
                                            <th>Đánh giá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $danhGia->user->ten_doc_gia }}</td>
                                            <td>{{ $danhGia->user->so_dien_thoai }}</td>
                                            <td>{{ $danhGia->user->email }}</td>
                                            <td>{{ \Carbon\Carbon::parse($danhGia->ngay_danh_gia)->format('d/m/Y') }}</td>
                                            <td>
                                                @php
                                                    $colorClass = '';
                                                    $style = '';
                                                    $name = '';
                                                    switch ($danhGia->muc_do_hai_long) {
                                                        case 'rat_hay':
                                                            $style = 'background-color: green;'  ;
                                                            $name = 'Rất hay';
                                                            break;
                                                        case 'hay':
                                                            $style = 'background-color: #BEEA03;';
                                                            $name = 'Hay';
                                                            break;
                                                        case 'trung_binh':
                                                            $style = 'background-color: #FFD100;';
                                                            $name = 'Trung Bình';
                                                            break;
                                                        case 'te':
                                                            $style = 'background-color: #FE9308;';
                                                            $name = 'Tệ';
                                                            break;
                                                        case 'rat_te':
                                                            $style = 'background-color: red;';
                                                            $name = 'Rất Tệ';
                                                            break;
                                                        default:
                                                            $colorClass = 'bg-secondary';
                                                    }
                                                @endphp
                                                <span class="badge {{$colorClass}}" style="{{ $style }}">{{$name}}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h6 class="mb-3 fw-semibold text-uppercase">Nội Dung Đánh Giá</h6>
                                </div>
                                <div class="card-body">
                                    <p>{{ $danhGia->noi_dung }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Nút Liên Hệ Khách Hàng -->
                    {{-- <div class="text-center mt-4">
                        <a href="#" class="btn btn-primary">Liên Hệ Khách Hàng</a>
                    </div> --}}
                </div>
            </div>


            <!--end card-->
            <div class="card">
                <div class="card-header">
                    <div>
                        <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#reviews" role="tab">
                                    Đánh giá khác của khách hàng
                                </a>
                            </li>
                        </ul>
                        <!--end nav-->
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="reviews" role="tabpanel">
                            <div class="table-responsive table-card">
                                <table class="table table-borderless align-middle mb-0">
                                    <thead class="table-light text-muted">
                                        <tr>
                                            <th scope="col">Tên khách hàng</th>
                                            <th scope="col">Đánh giá</th>
                                            <th scope="col">Nhận xét</th>
                                            <th scope="col">Ngày</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($danhGiaKhac as $danhGia)
                                            @php
                                                switch ($danhGia->muc_do_hai_long) {
                                                    case 'rat_hay':
                                                        $colorClass = ' text-white';
                                                        $style = 'background-color: green;'  ;
                                                        $mucDo = 'Rất hay';
                                                        break;
                                                    case 'hay':
                                                        $colorClass = '  text-white';
                                                         $style = 'background-color: #BEEA03;';
                                                        $mucDo = 'Hay';
                                                        break;
                                                    case 'trung_binh':
                                                        $colorClass = ' text-white';
                                                        $style = 'background-color: #FFD100;';
                                                        $mucDo = 'Trung bình';
                                                        break;
                                                    case 'te':
                                                        $colorClass = ' text-white';
                                                         $style = 'background-color: #FE9308;';
                                                        $mucDo = 'Tệ';
                                                        break;
                                                    case 'rat_te':
                                                        $colorClass = 'bg-dark text-white';
                                                        $style = 'background-color: red;';
                                                        $mucDo = 'Rất tệ';
                                                        break;
                                                    default:
                                                        $colorClass = 'bg-secondary text-white';
                                                }
                                                $shortContent = Str::limit($danhGia->noi_dung, 30, '...');
                                            @endphp
                                            <tr>
                                                <td>
                                                    <h6 class="fs-15 mb-0">{{ $danhGia->user->ten_doc_gia }}</h6>
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge {{ $colorClass }} w-100 fs-6" style="{{ $style }}">{{ $mucDo }}</span>
                                                </td>
                                                <td>
                                                    <div class="flex-grow-1">{{ $shortContent }}</div>
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($danhGia->ngay_danh_gia)->format('d/m/Y') }}
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="javascript:void(0);" class="btn btn-light btn-icon"
                                                            id="dropdownMenuLink1" data-bs-toggle="dropdown"
                                                            aria-expanded="true">
                                                            <i class="ri-equalizer-fill"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            aria-labelledby="dropdownMenuLink1">
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('danh-gia.detail', $danhGia->id) }}"><i
                                                                        class="ri-eye-fill me-2 align-middle text-muted"></i>Xem</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!--end table-->
                            </div>
                        </div>
                    </div>
                    <!--end tab-content-->
                </div>
            </div>


            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection

@push('styles')
    <style>
        .card {
            border: 1px solid #dee2e6;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
@endpush
