@extends('admin.layouts.app')
@section('start-point')
    Giúp đỡ
@endsection
@section('title')
   Q&A
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card rounded-0 bg-success-subtle mx-n4 mt-n4 border-top">
            <div class="px-4">
                <div class="row">
                    <div class="col-xxl-5 align-self-center">
                        <div class="py-4">
                            <h4 class="display-6 coming-soon-text">CÁC CÂU HỎI THƯỜNG GẶP</h4>
                                <p class="text-success fs-15 mt-3">Nếu bạn không tìm thấy câu trả lời cho câu hỏi của mình trong FAQ, bạn luôn có thể liên hệ với chúng tôi hoặc gửi email cho chúng tôi. Chúng tôi sẽ trả lời bạn sớm!</p>
                            <div class="hstack flex-wrap gap-2">
                                <a href="mailto:mesach247@gmail.com" class="btn btn-primary btn-label rounded-pill"><i class="ri-mail-line label-icon align-middle rounded-pill fs-16 me-2"></i> Gửi Email Cho Chúng Tôi</a>
                                <a target="_blank" href="https://www.facebook.com/profile.php?id=100030410919087&sk=about" class="btn btn-info btn-label rounded-pill"><i class="ri-facebook-line label-icon align-middle rounded-pill fs-16 me-2"></i> Facekook</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 ms-auto">
                        <div class="mb-n5 pb-1 faq-img d-none d-xxl-block">
                            <img src="assets/images/faq-img.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->

        <div class="row justify-content-evenly mb-4">
            <div class="col-lg-4">
                <div class="mt-3">
                    <div class="d-flex align-items-center mb-2">
                        <div class="flex-shrink-0 me-1">
                            <i class="ri-question-line fs-24 align-middle text-success me-1"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fs-16 mb-0 fw-semibold">Câu hỏi chung</h5>
                        </div>
                    </div>

                    <div class="accordion accordion-border-box" id="genques-accordion">
                        <div class="accordion-item material-shadow">
                            <h2 class="accordion-header" id="genques-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#genques-collapseOne" aria-expanded="true" aria-controls="genques-collapseOne">
                                    Thầy Huấn Hoa Hồng là ai?
                                </button>
                            </h2>
                            <div id="genques-collapseOne" class="accordion-collapse collapse show" aria-labelledby="genques-headingOne" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    Huấn Hoa Hồng là một nhân vật nổi tiếng trong cộng đồng mạng Việt Nam, đặc biệt trên nền tảng TikTok. Anh được biết đến với phong cách ăn mặc đặc trưng, thường xuyên đeo kính và có những video chia sẻ về cuộc sống, kinh nghiệm và những quan điểm cá nhân. Huấn Hoa Hồng cũng gây chú ý với các phát ngôn và hành động mạnh mẽ, dẫn đến việc có nhiều tranh cãi và nhận được sự quan tâm từ dư luận.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item material-shadow">
                            <h2 class="accordion-header" id="genques-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#genques-collapseTwo" aria-expanded="false" aria-controls="genques-collapseTwo">
                                    Long 9 ngón là ai?
                                </button>
                            </h2>
                            <div id="genques-collapseTwo" class="accordion-collapse collapse" aria-labelledby="genques-headingTwo" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    Long 9 ngón (tên thật là Đỗ Văn Long) là một nhân vật nổi tiếng trong cộng đồng mạng Việt Nam, đặc biệt trên nền tảng TikTok và YouTube. Anh được biết đến với phong cách truyền tải nội dung giải trí, thường là những video hài hước, phản ánh cuộc sống hàng ngày và các vấn đề xã hội.                                </div>
                            </div>
                        </div>
                        <div class="accordion-item material-shadow">
                            <h2 class="accordion-header" id="genques-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#genques-collapseThree" aria-expanded="false" aria-controls="genques-collapseThree">
                                    Thơ Nguyễn Là ai?
                                </button>
                            </h2>
                            <div id="genques-collapseThree" class="accordion-collapse collapse" aria-labelledby="genques-headingThree" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    he wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item material-shadow">
                            <h2 class="accordion-header" id="genques-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#genques-collapseFour" aria-expanded="false" aria-controls="genques-collapseFour">
                                    Free Fire là gì?
                                </button>
                            </h2>
                            <div id="genques-collapseFour" class="accordion-collapse collapse" aria-labelledby="genques-headingFour" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    Là lửa chùa chứ là gì.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end accordion-->
                </div>
            </div>

            <div class="col-lg-4">
                <div class="mt-3">
                    <div class="d-flex align-items-center mb-2">
                        <div class="flex-shrink-0 me-1">
                            <i class="ri-user-settings-line fs-24 align-middle text-success me-1"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fs-16 mb-0 fw-semibold">Câu hỏi liên quan đến cách quản lý</h5>
                        </div>
                    </div>

                    <div class="accordion accordion-border-box" id="manageaccount-accordion">
                        <div class="accordion-item material-shadow">
                            <h2 class="accordion-header" id="manageaccount-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#manageaccount-collapseOne" aria-expanded="false" aria-controls="manageaccount-collapseOne">
                                    Admin là ai?
                                </button>
                            </h2>
                            <div id="manageaccount-collapseOne" class="accordion-collapse collapse" aria-labelledby="manageaccount-headingOne" data-bs-parent="#manageaccount-accordion">
                                <div class="accordion-body">
                                    Admin là người sẽ cắn 90% hoa hồng của cộng tác viên
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item material-shadow">
                            <h2 class="accordion-header" id="manageaccount-headingTwo">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#manageaccount-collapseTwo" aria-expanded="true" aria-controls="manageaccount-collapseTwo">
                                    Câu hỏi 1?
                                </button>
                            </h2>
                            <div id="manageaccount-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="manageaccount-headingTwo" data-bs-parent="#manageaccount-accordion">
                                <div class="accordion-body">
                                    J97 (tên thật là Nguyễn Đức Thiện) là một nhân vật nổi tiếng trên mạng xã hội Việt Nam, đặc biệt trên nền tảng TikTok. Anh được biết đến với phong cách truyền tải nội dung hài hước, các video thú vị và thường xuyên chia sẻ những câu chuyện về cuộc sống hàng ngày. J97 thu hút sự chú ý của cộng đồng mạng nhờ tính cách hài hước và gần gũi.                                </div>
                            </div>
                        </div>
                        <div class="accordion-item material-shadow">
                            <h2 class="accordion-header" id="manageaccount-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#manageaccount-collapseThree" aria-expanded="false" aria-controls="manageaccount-collapseThree">
                                    Câu hỏi 2?
                                </button>
                            </h2>
                            <div id="manageaccount-collapseThree" class="accordion-collapse collapse" aria-labelledby="manageaccount-headingThree" data-bs-parent="#manageaccount-accordion">
                                <div class="accordion-body">
                                    he wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item material-shadow">
                            <h2 class="accordion-header" id="manageaccount-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#manageaccount-collapseFour" aria-expanded="false" aria-controls="manageaccount-collapseFour">
                                    Câu hỏi 3?
                                </button>
                            </h2>
                            <div id="manageaccount-collapseFour" class="accordion-collapse collapse" aria-labelledby="manageaccount-headingFour" data-bs-parent="#manageaccount-accordion">
                                <div class="accordion-body">
                                    Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia. Nam pretium turpis et arcu arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis aliquam ultrices mauris.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end accordion-->
                </div>
            </div>

            <div class="col-lg-4">
                <div class="mt-3">
                    <div class="d-flex align-items-center mb-2">
                        <div class="flex-shrink-0 me-1">
                            <i class="ri-shield-keyhole-line fs-24 align-middle text-success me-1"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fs-16 mb-0 fw-semibold">Quyền riêng tư và bảo mật</h5>
                        </div>
                    </div>

                    <div class="accordion accordion-border-box" id="privacy-accordion">
                        <div class="accordion-item material-shadow">
                            <h2 class="accordion-header" id="privacy-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#privacy-collapseOne" aria-expanded="true" aria-controls="privacy-collapseOne">
                                    Câu hỏi 1?
                                </button>
                            </h2>
                            <div id="privacy-collapseOne" class="accordion-collapse collapse show" aria-labelledby="privacy-headingOne" data-bs-parent="#privacy-accordion">
                                <div class="accordion-body">
                                    Long 9 ngón (tên thật là Đỗ Văn Long) là một nhân vật nổi tiếng trong cộng đồng mạng Việt Nam, đặc biệt trên nền tảng TikTok và YouTube. Anh được biết đến với phong cách truyền tải nội dung giải trí, thường là những video hài hước, phản ánh cuộc sống hàng ngày và các vấn đề xã hội.                                </div>
                            </div>
                        </div>
                        <div class="accordion-item material-shadow">
                            <h2 class="accordion-header" id="privacy-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#privacy-collapseTwo" aria-expanded="false" aria-controls="privacy-collapseTwo">
                                    Câu hỏi 2?
                                </button>
                            </h2>
                            <div id="privacy-collapseTwo" class="accordion-collapse collapse" aria-labelledby="privacy-headingTwo" data-bs-parent="#privacy-accordion">
                                <div class="accordion-body">
                                    The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item material-shadow">
                            <h2 class="accordion-header" id="privacy-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#privacy-collapseThree" aria-expanded="false" aria-controls="privacy-collapseThree">
                                    Câu hỏi 3?
                                </button>
                            </h2>
                            <div id="privacy-collapseThree" class="accordion-collapse collapse" aria-labelledby="privacy-headingThree" data-bs-parent="#privacy-accordion">
                                <div class="accordion-body">
                                    he wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item material-shadow">
                            <h2 class="accordion-header" id="privacy-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#privacy-collapseFour" aria-expanded="false" aria-controls="privacy-collapseFour">
                                    Câu hỏi 4?
                                </button>
                            </h2>
                            <div id="privacy-collapseFour" class="accordion-collapse collapse" aria-labelledby="privacy-headingFour" data-bs-parent="#privacy-accordion">
                                <div class="accordion-body">
                                    Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia. Nam pretium turpis et arcu arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis aliquam ultrices mauris.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end accordion-->
                </div>
            </div>
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->
@endsection
