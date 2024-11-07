@extends('client.layouts.app')

@section('content')

<!-- Slide (Carousel) nằm ngoài container -->
<div id="carousel-example" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example" data-slide-to="1"></li>
        <li data-target="#carousel-example" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="{{asset('assets/client/img/bangxephang.png')}}" alt="Slide 1" class="img-responsive">
        </div>
        <div class="item">
            <img src="https://via.placeholder.com/1200x500" alt="Slide 2" class="img-responsive">
        </div>
        <div class="item">
            <img src="https://via.placeholder.com/1200x500" alt="Slide 3" class="img-responsive">
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container">
    <!-- Nội dung còn lại của trang -->
    <div class="row">
        <div class="col-12">
            <h1 class="text-center my-5">Chào mừng đến với Website Đọc Sách Online của chúng tôi</h1>
            <p class="lead text-center">Chúng tôi cung cấp một nền tảng đọc sách trực tuyến tiện lợi và dễ sử dụng, giúp bạn dễ dàng tiếp cận kho sách phong phú mọi lúc, mọi nơi.</p>

            <!-- Section 1: Hình ảnh bên trái, văn bản bên phải -->
            <div class="row align-items-center mb-5">
                <div class="col-md-6">
                    <img src="{{asset('assets/client/img/sunbook.png')}}" alt="Sách online" class="img-fluid rounded fixed-image">
                </div>
                <div class="col-md-6">
                    <h2 class="section-title">Về chúng tôi</h2>
                    <p class="section-content">Website của chúng tôi là một nền tảng đọc sách trực tuyến, nơi bạn có thể tìm thấy hàng ngàn cuốn sách từ các thể loại khác nhau, từ văn học, khoa học, phát triển bản thân đến các cuốn sách chuyên ngành. Chúng tôi cam kết mang đến cho người dùng trải nghiệm đọc sách tuyệt vời và dễ dàng, mọi lúc mọi nơi.</p>
                </div>
            </div>

            <!-- Section 2: Hình ảnh bên phải, văn bản bên trái -->
            <div class="row align-items-center mb-5">
                <div class="col-md-6">
                    <img src="https://via.placeholder.com/500x300" alt="Đọc sách trực tuyến" class="img-fluid rounded fixed-image">
                </div>
                <div class="col-md-6">
                    <h2 class="section-title">Tiện ích nổi bật</h2>
                    <ul class="section-content">
                        <li>Đọc sách trực tuyến miễn phí với chất lượng cao.</li>
                        <li>Cung cấp nhiều thể loại sách phong phú, từ sách nổi tiếng đến sách chuyên ngành.</li>
                        <li>Giao diện thân thiện và dễ sử dụng, phù hợp với mọi lứa tuổi.</li>
                        <li>Khả năng đánh dấu trang và ghi chú trong sách.</li>
                        <li>Tính năng tìm kiếm mạnh mẽ giúp bạn dễ dàng tìm sách yêu thích.</li>
                    </ul>
                </div>
            </div>

            <!-- Section 3: Hình ảnh bên trái, văn bản bên phải -->
            <div class="row align-items-center mb-5">
                <div class="col-md-6">
                    <img src="https://via.placeholder.com/500x300" alt="Đọc sách mọi lúc" class="img-fluid rounded fixed-image">
                </div>
                <div class="col-md-6">
                    <h2 class="section-title">Tại sao chọn chúng tôi?</h2>
                    <p class="section-content">Chúng tôi không chỉ cung cấp các cuốn sách chất lượng mà còn mang đến trải nghiệm đọc sách trực tuyến tối ưu. Bạn có thể đọc sách mọi lúc mọi nơi, trên mọi thiết bị từ máy tính đến điện thoại di động. Hãy khám phá ngay!</p>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="#" class="btn btn-primary">Khám Phá Ngay</a>
            </div>
        </div>
    </div>
</div>

<!-- Đảm bảo Bootstrap 3 CSS và JS đã được bao gồm trong file layout của bạn -->

@push('scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endpush

@endsection
