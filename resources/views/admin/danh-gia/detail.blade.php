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
                                    <td><span class="badge bg-success text-white w-100">Rất hay</span></td>
                                    <td>{{ $ratHay }}</td>
                                </tr>
                                <tr>
                                    <td><span class="badge bg-primary text-white w-100">Hay</span></td>
                                    <td>{{ $hay }}</td>
                                </tr>
                                <tr>
                                    <td><span class="badge bg-warning text-dark w-100">Trung bình</span></td>
                                    <td>{{ $trungBinh }}</td>
                                </tr>
                                <tr>
                                    <td><span class="badge bg-danger text-white w-100">Tệ</span></td>
                                    <td>{{ $te }}</td>
                                </tr>
                                <tr>
                                    <td><span class="badge bg-dark text-white w-100">Rất tệ</span></td>
                                    <td>{{ $ratTe }}</td>
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
                        <div class="position-absolute top-0 end-0 p-3">
                            @php
                                $colorClass = '';
                                $name = '';
                                switch ($danhGia->muc_do_hai_long) {
                                    case 'rat_hay':
                                        $colorClass = 'bg-success';
                                        $name = 'Rất hay';
                                        break;
                                    case 'hay':
                                        $colorClass = 'bg-primary';
                                        $name = 'Hay';
                                        break;
                                    case 'trung_binh':
                                        $colorClass = 'bg-warning';
                                        $name = 'Trung Bình';
                                        break;
                                    case 'te':
                                        $colorClass = 'bg-danger';
                                        $name = 'Tệ';
                                        break;
                                    case 'rat_te':
                                        $colorClass = 'bg-dark';
                                        $name = 'Rất Tệ';
                                        break;
                                    default:
                                        $colorClass = 'bg-secondary';
                                }
                            @endphp

                            <span class="badge {{ $colorClass }} text-white p-3">
                                {{ $name }}
                            </span>
                        </div>
                        <h6 class="mb-3 fw-semibold text-uppercase">Thông Tin Người Đánh Giá</h6>
                        <p><strong>Họ Tên:</strong> {{ $danhGia->user->ten_doc_gia }}</p>
                        <p><strong>Số Điện Thoại:</strong> {{ $danhGia->user->so_dien_thoai }}</p>
                        <p><strong>Email:</strong> {{ $danhGia->user->email }}</p>
                        <p><strong>Ngày Đánh Giá:</strong>
                            {{ \Carbon\Carbon::parse($danhGia->ngay_danh_gia)->format('d/m/Y') }} </p>


                        <h6 class="mb-3 fw-semibold text-uppercase">Nội Dung Đánh Giá</h6>
                        <p>{{ $danhGia->noi_dung }}</p>


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
                                        @foreach ($listDanhGia as $danhGia)
                                        @php switch ($danhGia->muc_do_hai_long) {
                                            case 'rat_hay':
                                                $colorClass = 'bg-success text-white';
                                                $mucDo = 'Rất hay';
                                                break;
                                            case 'hay':
                                                $colorClass = 'bg-primary  text-white';
                                                $mucDo = 'Hay';
                                                break;
                                            case 'trung_binh':
                                                $colorClass = 'bg-warning text-white';
                                                $mucDo = 'Trung bình';
                                                break;
                                            case 'te':
                                                $colorClass = 'bg-danger text-white';
                                                $mucDo = 'Tệ';
                                                break;
                                            case 'rat_te':
                                                $colorClass = 'bg-dark text-white';
                                                $mucDo = 'Rất tệ';
                                                break;
                                            default:
                                                $colorClass = 'bg-secondary text-white';
                                        }
                                        $shortContent = Str::limit($danhGia->noi_dung, 30, '...');
                                        @endphp
                                        <tr>
                                            <td>
                                                <h6 class="fs-15 mb-0">{{$danhGia->user->ten_doc_gia}}</h6>
                                            </td>
                                            <td>
                                                <span class="badge {{$colorClass}} w-100">{{  $mucDo }}</span>
                                            </td>
                                            <td>
                                                <div class="flex-grow-1">{{$shortContent}}</div>
                                               </td>
                                               <td>{{ \Carbon\Carbon::parse($danhGia->ngay_danh_gia)->format('d/m/Y') }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="javascript:void(0);" class="btn btn-light btn-icon"
                                                        id="dropdownMenuLink1" data-bs-toggle="dropdown"
                                                        aria-expanded="true">
                                                        <i class="ri-equalizer-fill"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                        aria-labelledby="dropdownMenuLink1">
                                                        <li><a class="dropdown-item" href="{{$danhGia->id}}"><i
                                                                    class="ri-eye-fill me-2 align-middle text-muted"></i>Xem</a>
                                                        </li>
                                                        {{-- <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="ri-delete-bin-5-line me-2 align-middle text-muted"></i>Xóa</a>
                                                        </li> --}}
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
