@extends('admin.layouts.app')
@section('start-point')
    Quản lý đánh giá
@endsection
@section('title')
    Danh sách đánh giá
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-8">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Danh sách </h4>
                            <div class="flex-shrink-0">
                                @if (auth()->user()->vai_tros->contains('id', 1) || auth()->user()->vai_tros->contains('id', 3))
                                    <div class="me-3 d-flex gap-3">
                                        <a href="{{ route('danh-gia.index') }}" class="btn btn-info">Xem tất cả danh
                                            sách</a>
                                        <form method="GET" action="{{ route('danh-gia.index') }}">
                                            <button type="submit" name="danh-gia-cua-tois" class="btn btn-primary">Xem
                                                đánh giá của tôi
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div id="table-gridjs"></div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
        </div>
        <!-- end col -->
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
        document.getElementById("table-gridjs") && new gridjs.Grid({
            columns: [{
                    name: "STT",
                    hidden: true
                },
                {
                    name: "Độc giả",
                    width: "auto",
                    formatter: function(e, row) {
                        const idDanhGia = row.cells[0].data.idDanhGia;
                        const idSach = row.cells[0].data.idSach;
                        const detailUrl = "{{ route('danh-gia.detail', ':id') }}".replace(':id',
                            idDanhGia);
                        const detailSach = "{{ route('chi-tiet-sach', ':id') }}".replace(':id',
                            idSach);
                        const hinhAnh = e.hinh_anh ?
                            `{{ asset('storage/') }}/${e.hinh_anh}` :
                            `{{ asset('assets/admin/images/users/user-dummy-img.jpg') }}`;
                        return gridjs.html(`
                            <div class="d-flex gap-2 align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="${hinhAnh}" alt="Avatar" style="width: 50px; height: 50px;" class="avatar-lg rounded-circle img-thumbnail material-shadow">
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold">${e.ten_doc_gia}</span>
                                    <div class="d-flex mt-2">
                                        <a href="${detailUrl}" class="btn btn-link p-0">Chi tiết</a>
                                        <span class="mx-1">|</span>
                                        <a href="${detailSach}" class="btn btn-link p-0">Phản  hồi</a>
                                    </div>
                                </div>
                            </div>
                        `);
                    }
                },
                {
                    name: "Tên sách",
                    width: "auto",
                    formatter: function(e) {
                        return gridjs.html('<span class="">' + e + "</span>")
                    }
                }, {
                    name: "Nội dung đánh giá",
                    width: "auto",
                    formatter: function(e) {
                        let truncatedContent = e.split(' ').slice(0, 5).join(' ') + '...';
                        return gridjs.html(`<div class="flex-grow-1" title="${e}">${truncatedContent}</div>`);
                    }
                }, {
                    name: "Ngày đánh giá",
                    width: "auto",
                    formatter: function(e) {
                        var date = new Date(e);
                        var formattedDate = date.toLocaleDateString('vi-VN', {
                            year: 'numeric',
                            month: '2-digit',
                            day: '2-digit',
                        });
                        return gridjs.html(`<div class="flex-grow-1">${formattedDate}</div>`);
                    }
                }, {
                    name: "Độ hài lòng",
                    width: "auto",
                    formatter: function(e) {
                        let colorClass = '';
                        let mucDo = '';
                        let style = '';
                        switch (e) {
                            case 'rat_hay':
                                style = 'background-color: green;'
                                colorClass = 'text-white';
                                mucDo = 'Rất hay';
                                break;
                            case 'hay':
                                style = 'background-color: #BEEA03;'
                                colorClass = 'text-white';
                                mucDo = 'Hay';
                                break;
                            case 'trung_binh':
                                style = 'background-color: #FFD100;'
                                colorClass = 'text-white';
                                mucDo = 'Trung bình';
                                break;
                            case 'te':
                                style = 'background-color: #FE9308;'
                                colorClass = 'bg-danger text-white';
                                mucDo = 'Tệ';
                                break;
                            case 'rat_te':
                                style = 'background-color: red;'
                                colorClass = 'text-white';
                                mucDo = 'Rất tệ';
                                break;
                            default:
                                colorClass = 'bg-secondary text-white';
                        }
                        return gridjs.html(
                            `<span class="badge fs-6 ${colorClass}" style="${style} padding: 6px 6px;">${mucDo}</span>`
                        );
                    }
                },
            ],
            pagination: {
                limit: 5
            },
            sort: true,
            search: true,
            data: [
                @foreach ($listDanhGia as $danhGia)
                    [
                        {
                            idDanhGia: '{{ $danhGia->id }}',
                            idSach: '{{ $danhGia->sach->id }}',
                        },
                        {
                            ten_doc_gia: '{{ $danhGia->user->ten_doc_gia }}',
                            hinh_anh: '{{ $danhGia->user->hinh_anh }}'
                        },
                        '{{ $danhGia->sach->ten_sach }}',
                        '{{ $danhGia->noi_dung }}',
                        '{{ $danhGia->ngay_danh_gia }}',
                        '{{ $danhGia->muc_do_hai_long }}',
                        '{{ $danhGia->id }}',
                    ],
                @endforeach
            ]
        }).render(document.getElementById("table-gridjs"));


        function showFullContent(linkElement, fullContent) {
            const textarea = linkElement.closest('div').previousElementSibling;
            textarea.value = fullContent;
        }
    </script>
@endpush
