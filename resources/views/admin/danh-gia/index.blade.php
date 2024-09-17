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
                        <div class="card-header">
                            <h4 class="card-title mb-0 flex-grow-1">Danh sách </h4>
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
                    width: "130px",
                    formatter: function(e) {
                        const id = e[0];
                        const detailUrl = "{{ route('danh-gia.detail', ':id') }}".replace(':id', id);
                        return gridjs.html(` 
                        <div class="flex-grow-1">
                            <span class="fw-semibold">  ${e}</span>
                        </div>
                        <a href="${detailUrl}" class="btn btn-link mr-2 p-0">Chi tiết | </a>
                        <a href="" class="btn btn-link p-0">Phản hồi </a>
                   `)}
                  }, {
                    name: "Độc giả",
                    width: "150px",
                    formatter: function(e) {
                        return gridjs.html(`
                     <div class="d-flex gap-2 align-items-center">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('assets/admin/images/users/avatar-1.jpg') }}" alt="" class="avatar-xs rounded-circle" />
                        </div>
                        <div class="flex-grow-1">
                            ${e}
                        </div>
                    </div>
                `)}
                },
                {
                    name: "Tên sách",
                    width: "150px",
                    formatter: function(e) {
                        return gridjs.html('<span class="">' + e + "</span>")
                    }
                }, {
                    name: "Nội dung đánh giá",
                    width: "220px",
                    formatter: function(e) {
                        let truncatedContent = e.split(' ').slice(0, 5).join(' ') + '...';

                        return gridjs.html(`
                    <textarea cols="20" rows="2" class="form-control mt-3" readonly>${truncatedContent}</textarea>
                  
                `);
                    }
                }, {
                    name: "Ngày đánh giá",
                    width: "150px",
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
                    width: "100px",
                    formatter: function(e) {
                        let colorClass = '';
                        switch (e) {
                            case 'Rất hay':
                                colorClass = 'bg-success text-white';
                                break;
                            case 'Hay':
                                colorClass = 'bg-primary  text-white';
                                break;
                            case 'Trung bình':
                                colorClass = 'bg-warning text-white';
                                break;
                            case 'Tệ':
                                colorClass = 'bg-danger text-white';
                                break;
                            case 'Rất tệ':
                                colorClass = 'bg-dark text-white';
                                break;
                            default:
                                colorClass = 'bg-secondary text-white';
                        }
                        return gridjs.html(
                            `<span class="badge ${colorClass}">${e}</span>`
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
                        '{{ $danhGia->id }}',
                        '{{ $danhGia->user->ten_doc_gia }}',
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
