@extends('client.layouts.app')
@section('content')
    <div class="container container-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}"><span class="fa fa-home"></span> Trang chủ</a></li>
            <li class="breadcrumb-item"><a
                    href="/chuyen-muc/{{ $baiViet->chuyenMuc->id }}">{{ $baiViet->chuyenMuc->ten_chuyen_muc }}</a></li>
            <li class="breadcrumb-item active">{{ $baiViet->tieu_de }}</li>
        </ol>
    </div>

    <div class="container cpt truyen">
        <div class="row">
            <div class="col-xs-12">

                <!-- Thông tin bài viết -->
                <div class="color-gray col-md-11">
                    <span class="me-3">
                        Tác giả: <a href="/user/{{ $baiViet->tacGia->id }}">{{ $baiViet->tacGia->ten_doc_gia }}</a>
                        - {{ $baiViet->ngay_dang->format('d/m/Y') }}
                    </span>
                </div>

                <div class="color-gray col-md-1">
                    <a
                        href="/web/setting-chap?url=https://truyenhdt.com/truyen/quai-vat-xuc-tu-co-day-chi-muon-song/chap/9841373-chuong-1/">
                        <i class="fa fa-cog" aria-hidden="true"></i> Cài Đặt </a>
                </div>

                <h1 class="text-center" style="font-size: 50px;">{{ $baiViet->tieu_de }}</h1>
                <div class="text-center color-gray mb-5">
                    <h2 class="me-3">
                        <a href="/user/{{ $baiViet->tacGia->id }}"><i class="fa fa-user"
                                aria-hidden="true"></i>{{ $baiViet->tacGia->ten_doc_gia }}</a>
                    </h2>
                </div>

                <!-- Hình ảnh bài viết -->
                <div class="text-center">
                    <img src="{{ asset('storage/' . $baiViet->hinh_anh) }}" alt="{{ $baiViet->tieu_de }}"
                        style="width:100%; height: 150px; object-fit: cover; display: block; margin: 0 auto;" />
                </div>

                {{--                Đổ nội dung --}}
                <div class="reading" style="color: rgb(51, 51, 51);">
                    <p>{!! $baiViet->noi_dung !!}</p>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div id="comments">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="heading"><i class="fa fa-comments-o" aria-hidden="true"></i> Bình Luận
                                    ({{ $baiViet->binhLuans->count() }})</h3>
                            </div>
                            <div>
                                <div class="pull-right"> <a href="#truyen_tabs">
                                        <div class="uptop"> <i class="fa fa-arrow-up" aria-hidden="true"></i> </div>
                                    </a> </div>
                            </div>
                        </div>
                        <ol class>
                            @foreach ($baiViet->binhLuans as $binhLuan)
                                <li>
                                    <div class="comment-author vcard">
                                        <div class="avatar_user_comment">
                                            <img src="{{ asset('storage/' . $binhLuan->user->hinh_anh) }}"
                                                alt="{{ $binhLuan->user->ten_doc_gia }}" class="avatar-32" />
                                        </div>
                                        <div class="post-comments">
                                            <div>
                                                <span class="fn">
                                                    <a href="#">{{ $binhLuan->user->ten_doc_gia }}</a>
                                                </span>
                                                <span class="ago">({{ $binhLuan->created_at->diffForHumans() }})</span>
                                            </div>
                                            <div class="commenttext">
                                                <p>{{ $binhLuan->noi_dung }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ol>
                        @if (auth()->check())
                            <!-- Form bình luận chỉ hiện khi người dùng đã đăng nhập -->
                            <div class="flex-comment">
                                <span class="addcomment">
                                    <span class="btn btn-primary font-12 font-oswald" id="openCommentModal">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Thêm Bình Luận
                                        <i class="fa fa-comment" aria-hidden="true"></i>
                                    </span>
                                </span>
                            </div>
                        @else
                            <div class="alert alert-warning" role="alert">
                                Bạn chưa đăng nhập, vui lòng <a href="{{ route('login') }}">đăng nhập</a> để bình luận.
                            </div>
                        @endif
                        @if (auth()->check())
                            <p>Đã đăng nhập với người dùng: {{ auth()->user()->ten_doc_gia }}</p>
                        @endif


                        {{-- <span class="load_more_cmt" data-cpage="1">
                            <span class="btn-primary-border font-12 font-oswald">Xem Thêm Bình Luận→</span>
                        </span> --}}
                    </div>
                    <div class="modal fade respond" id="myModal" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Comment</h4>
                                </div>
                                <form action="{{ route('bai-viet.addComment', $baiViet->id) }}" method="POST">
                                    @csrf
                                    <div class="modal-body clearfix">
                                        <div class="form-group form-group-ajax">
                                            <textarea class="form-control" name="noi_dung" id="comment_content" tabindex="4"
                                                placeholder="Nhập bình luận của bạn ở đây..." required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Gửi Nhận Xét</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                                    </div>
                                </form>                                

                            </div>
                        </div>
                    </div>

                    <div class="modal fade respond" id="myModal2" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header"> <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Chú Ý</h4>
                                </div>
                                <div class="modal-body clearfix"> </div>
                                <div class="modal-footer"> <button type="button" class="btn btn-default"
                                        data-dismiss="modal">Thoát</button> </div>
                            </div>
                        </div>
                    </div>
                    <div id="show_pre_comment_ajax"></div>
                    <div id="zdata" data-postname="sau-khi-om-bung-bo-chay-dai-my-nhan-cung-nhai-con-di-xin-com"
                        data-posttype="truyen"></div>
                </div>
                {{-- <div class="col-md-3 hidden-sm hidden-xs"> </div>
                <div id="ads-chap-bottom" class="text-center"></div> --}}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- jQuery -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<!-- Bootstrap JS -->
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}

@endpush
@push('scripts')
    <script>
        $(document).ready(function() {
    $('#openCommentModal').click(function() {
        console.log('Button clicked');
        $('#myModal').modal('show');
    });
});
    </script>
@endpush
