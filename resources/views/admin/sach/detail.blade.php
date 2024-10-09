@extends('admin.layouts.app')
@section('start-point')
    Quản lý sách
@endsection
@section('title')
    Chi tiết : {{ $sach->ten_sach }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row gx-lg-5">
                        <div class="col-xl-4 col-md-8 mx-auto">
                            <div class="product-img-slider sticky-side-div">
                                <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                                    <div class="swiper-wrapper d-flex justify-content-center">
                                        <img src="{{ Storage::url($sach->anh_bia_sach) }}" alt="" class="img-fluid d-block" />
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="col-sm-4 mt-3">
                                        <a href="{{ route('chuong.create', $sach->id) }}"><button class="btn btn-success" type="submit">Thêm chương mới</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-8">
                            <div class="mt-xl-0 mt-5">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <div class="d-flex">
                                            <h4 class="me-3">{{ $sach->ten_sach }}</h4>
                                            <span class="fs-5 {{ $sach->trang_thai === 'an' ? 'text-danger' : 'text-success' }}">{{ $sach->trang_thai === 'an' ? 'Ẩn' : 'Hiện' }}</span>

                                        </div>
                                       <div class="hstack gap-3 flex-wrap">
                                            <div class="text-muted">Tác giả : <a href="#" class="text-primary">{{ $sach->tac_gia }}</a></div>
                                            <div></div>
                                            <div class="text-muted">Thể loại : <span class="text-body fw-medium">{{ $sach->TheLoai->ten_the_loai }} </span></div>
                                            <div class="vr"></div>
                                            <div class="text-muted">Ngày đăng : <span class="text-body fw-medium">{{ $sach->ngay_dang }}</span></div>
                                            <div class="text-muted">Loại sách : <span class="text-body fw-medium">{{ $sach->noi_dung_nguoi_lon === 'co' ? '18+': '13+' }}</span></div>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div>
                                            <a href="{{ route('sach.edit', $sach->id) }}" class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="ri-pencil-fill align-bottom"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 text-muted">
                                    <h5 class="fs-14">Tóm tắt :</h5>
                                    <p>{{ $sach->tom_tat }}</p>
                                </div>

                                <div class="row mt-3">
                                    <h5 class="fs-14">Danh sách chương :</h5>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div id="table-gridjs"></div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div>
                                        <!-- end col -->
                                    </div>
                                </div>
                                <div class="mt-5">

                                    <div class="row gy-4 gx-0">
                                        <div class="col-lg-4">
                                            <div>
                                                <h5 class="fs-14 mb-3">Đánh giá </h5>
                                            </div>
                                            <div>
                                                @foreach($ketQuaDanhGia as $mucDo => $danhGias)
                                                    <div class="mt-3">
                                                        <div class="row align-items-center g-2 d-flex">
                                                            <div class="col-auto">
                                                                <div class="p-2">
                                                                    <h6 class="mb-0">{{ $mucDoHaiLong[$mucDo]['label'] }}</h6>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="p-2">
                                                                    <div class="progress animated-progress progress-sm w-100">
                                                                        @php
                                                                            $tongSoLuotDanhGia = \App\Models\DanhGia::where('sach_id', $id)->count();
                                                                            $count = count($danhGias);
                                                                            $tong = $tongSoLuotDanhGia > 0 ? ($count / $tongSoLuotDanhGia) * 100 : 0;
                                                                        @endphp
                                                                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ number_format($tong, 2) }}%;" aria-valuenow="{{ number_format($tong, 2) }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <div class="p-2">
                                                                    <h6 class="mb-0 text-muted">{{ $count }}</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- end col -->

                                        <div class="col-lg-8">
                                            <div class="ps-lg-4">
{{--                                                <div class="d-flex flex-wrap align-items-start gap-3">--}}
{{--                                                    <h5 class="fs-14">Chi tiết đánh giá: </h5>--}}
{{--                                                </div>--}}
                                                <div class="me-lg-n3 pe-lg-4" data-simplebar style="max-height: 225px;">
                                                    <ul class="list-unstyled mb-0">
                                                        @foreach($ketQuaDanhGia as $mucDo => $danhGias)
                                                            @foreach($danhGias as $danhGia)
                                                                <li class="py-2">
                                                                    <div class="border border-dashed rounded p-3">
                                                                        <div class="d-flex align-items-end">
                                                                            <div class="flex-grow-1">
                                                                                <h5 class="fs-14 mb-0">{{ $danhGia['ten_nguoi_danh_gia'] }}</h5>
                                                                            </div>
                                                                            <div class="flex-shrink-0">
                                                                                <p class="text-muted fs-13 mb-0">{{ \Carbon\Carbon::parse($danhGia['ngay_danh_gia'])->format('d-m-Y') }}</p>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="d-flex align-items-start mb-3">
                                                                            <div class="hstack gap-3">
                                                                                <div class="badge rounded-pill {{ $mucDoHaiLong[$mucDo]['colorClass'] }} mb-0">
                                                                                    <i class="mdi mdi-star"></i> {{ $mucDoHaiLong[$mucDo]['label'] }}
                                                                                </div>
                                                                                <div class="vr"></div>
                                                                                <div class="flex-grow-1">
                                                                                    <p class="text-muted mb-0">{{ $danhGia['noi_dung'] }}</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        @endforeach
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end Ratings & Reviews -->
                                </div>
                                <!-- end card body -->
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@push('styles')
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/gridjs/theme/mermaid.min.css') }}">

@endpush
@push('scripts')
    <!-- prismjs plugin -->
    <script src="{{ asset('assets/admin/libs/prismjs/prism.js') }}"></script>

    <!-- gridjs js -->
    <script src="{{ asset('assets/admin/libs/gridjs/gridjs.umd.js') }}"></script>
    <!--  Đây là chỗ hiển thị dữ liệu phân trang -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var chuongs = @json($chuongs);
            new gridjs.Grid({
                columns: [
                    { name: "ID", width: "20px"},
                    { name: "Số chương", width: "50px",
                        formatter: function (param, row) {
                            var id = row.cells[0].data;
                            var editUrl = `{{ route('chuong.edit', ['sach' => ':sachId', 'chuong' => ':id']) }}`.replace(':sachId', '{{ $sach->id }}').replace(':id', id);
                            var detailUrl = `{{ route('chuong.show', ['sach' => ':sachId', 'chuong' => ':id']) }}`.replace(':sachId', '{{ $sach->id }}').replace(':id', id);
                            var deleteUrl = `{{ route('chuong.destroy', ['sach' => ':sachId', 'chuong' => ':id']) }}`.replace(':sachId', '{{ $sach->id }}').replace(':id', id);
                            return gridjs.html(` <b>Chương ${param}</b>
                                <div class="d-flex justify-content-start mt-2">
                                    <a href="${editUrl}" class="btn btn-link p-0">Sửa |</a>
                                    <a href="${detailUrl}" class="btn btn-link p-0">Xem |</a>
                                       <form action="${deleteUrl}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-link p-0 text-danger" onclick="return confirm('Bạn có muốn xóa chương!')">Xóa</button>
                                       </form>
                                </div>
                            `);
                        }},
                    { name: "Tiêu đề sách", width: "150px"},
                ],
                data: chuongs.map(function(item) {
                    return [
                        item.id,
                        item.so_chuong,
                        item.tieu_de,
                    ];
                }),
                pagination: { limit: 5 },
                sort: true,
                search: true,
            }).render(document.getElementById("table-gridjs"));
        });
    </script>
    <style>
        .col-auto {
            flex: 0 0 80px; /* Giảm chiều rộng của cột chứa tiêu đề và số lượng đánh giá để dành nhiều không gian cho thanh tiến trình */
        }

        .progress {
            width: 100%; /* Đảm bảo thanh tiến trình chiếm toàn bộ chiều rộng của cột */
            height: 5px; /* Chiều cao cho thanh tiến trình */
        }

        .p-2 {
            padding: 8px; /* Điều chỉnh khoảng cách padding */
        }

        .mt-3 {
            margin-top: 6px; /* Khoảng cách giữa các mục */
        }


    </style>


@endpush
