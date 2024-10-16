@extends('client.layouts.app')
@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets\client\themes\truyenfull\echo\css\tim-kiem-nang-cao.css') }}">
    @endpush
    <div class="container tax">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.html"><span class="fa fa-home"></span> Home</a></li>
            <li class="breadcrumb-item"><a href="../indexffd2.html?page_id=48645">Tìm Kiếm</a></li>
        </ol>
    </div>
    <div class="container tax"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 sidebar-right">
                <form method="GET" action="" id="searchForm">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <input name="title" type="text" class="form-control"
                                       placeholder="Nhập tên sách" value/>
                                <div class="input-group-btn">
                                    <button class="btn btn-primary color-white" type="submit">
                                        <span class="fa fa-search"></span> Tìm Kiếm
                                    </button>
                                </div>
                            </div>
                            <div id="show_button_collapse" class="tf_hidden text-center">
                                <span class="btn btn-black"
                                      data-toggle="collapse"
                                      href="#collapseExample"
                                      role="button"
                                      aria-expanded="false"
                                      aria-controls="collapseExample">Hiển Thị Mở Rộng</span>
                            </div>
                            <div class="collapse2" id="collapseExample">
                                <div class="category" id="category">
                                    <div class="clearfix">
                                        <div class="h2-child"><span class="the7-list">></span> <span
                                                class="title-child">Thể Loại</span></div>
                                        @foreach($theLoais as $item)
                                            <input type="checkbox"
                                                   id="{{$item->id}}" value="{{$item->id}}" name="the_loai[]">
                                            <label
                                                for="{{$item->id}}"><span></span>{{$item->ten_the_loai}}</label>
                                        @endforeach

                                    </div>
                                    <div class="form-group">
                                        <div class="h2-child"><span class="the7-list">></span> <span
                                                class="title-child">Nội dung người lớn</span></div>
                                        <select
                                            class="form-control" id="status" name="noi_dung_nguoi_lon">
                                            <option value="all">Tất Cả</option>
                                            <option value="co">Có</option>
                                            <option value="khong">Không</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="h2-child"><span class="the7-list">></span> <span
                                                class="title-child">Tình Trạng Truyện</span></div>
                                        <select
                                            class="form-control" id="status" name="tinh_trang_cap_nhat">
                                            <option value="all">Tất Cả</option>
                                            <option value="da_full">Hoàn Thành</option>
                                            <option value="tiep_tuc_cap_nhat">Đang Cập Nhật</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="h2-child"><span class="the7-list">></span> <span
                                                class="title-child">Thời Gian</span></div>
                                        <select class="form-control"
                                                id="status" name="updated_at">
                                            <option value="new">Sách mới nhất</option>
                                            <option value="old">Sách cũ nhất</option>
                                        </select>
                                    </div>
                                    <div class="-ginputr">
                                        <button class="btn btn-primary color-white btn-block"
                                                type="submit"><span class="fa fa-search"></span> Tìm Kiếm
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-9">
                <div class="alert-first"></div>
                <div id="alert-info" class="alert alert-info alert-dismissible" role="alert"></div>
                <div class="theloai-thumlist" id="data-sach">
                </div>
            </div>
        </div>
    </div>
    <div class="container tax">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.html"><span class="fa fa-home"></span> Home</a></li>
            <li class="breadcrumb-item"><a href="../indexffd2.html?page_id=48645">Tìm Kiếm</a></li>
        </ol>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $.ajax({
                url: '{{ route('data-sach') }}',
                type: 'GET',
                success: function (response) {
                    $('#alert-info').html(`Tìm thấy <strong>${response.total}</strong> sách`);
                    $('.theloai-thumlist').empty();
                    response.data.forEach(function (data) {
                        let content = `
                                 <li class="col-md-6 col-sm-6 col-xs-12">
                                    <a href="#" class="thumbnail"
                                       title="${data.ten_sach}">
                                        <img src="${data.anh_bia_sach}"

                                             alt="${data.ten_sach}"/>
                                    </a>
                                    <div class="text">
                                        <div class="d-flex justify-content-between">
                                            <h2 class="crop-text-1" itemprop="name">
                                            <a href="#"
                                               title="${data.ten_sach}"> ${data.ten_sach} </a>
                                            </h2>
                                            <span class="text-danger">${data.gia_sach} VNĐ</span>
                                        </div>
                                        <div class="content">
                                                <p class="crop-text-1 color-gray d-flex justify-content-between">Thể loại: ${data.theloai}  <span
                                                        itemprop="name"> <a href="#" rel="tag">${data.format_ngay_cap_nhat}</a> </span></p>
                                            <p class="crop-text-1 color-gray"><span class="fa fa-user"></span> Tác giả: <span
                                                    itemprop="name"> <a href="#" rel="tag">${data.tac_gia}</a> </span></p>
                                            <p class="crop-text-2">${data.tom_tat}</p>
                                        </div>
                                    </div>
                                </li>
                        `;
                        $('#data-sach').append(content);
                    });
                },
                error: function () {
                    console.error('lỗi');
                }
            });
            $('#searchForm').on('submit', function (event) {
                event.preventDefault();

                $.ajax({
                    url: '{{ route('tim-kiem') }}',
                    type: 'GET',
                    data: $(this).serialize(),
                    success: function (response) {
                        // Cập nhật kết quả tìm kiếm trong trang
                        $('#data-sach').html(response); // Giả sử bạn có một phần tử có id là searchResults để hiển thị kết quả
                    },
                    error: function () {
                        console.error('Có lỗi xảy ra khi tìm kiếm');
                    }
                });
            });
        });
    </script>
@endpush
