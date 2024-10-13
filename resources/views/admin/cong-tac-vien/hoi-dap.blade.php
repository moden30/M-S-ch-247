@extends('admin.layouts.app')
@section('start-point')
    Dashboard
@endsection
@section('title')
    Giúp đỡ
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
                                <a href="mailto:tuannm4204@gmail.com" class="btn btn-primary btn-label rounded-pill"><i class="ri-mail-line label-icon align-middle rounded-pill fs-16 me-2"></i> Gửi Email Cho Chúng Tôi</a>
                                <a target="_blank" href="https://www.facebook.com/profile.php?id=100030410919087&sk=about" class="btn btn-info btn-label rounded-pill"><i class="ri-facebook-line label-icon align-middle rounded-pill fs-16 me-2"></i> Facekook</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 ms-auto">
                        <div class="mb-n5 pb-1 faq-img d-none d-xxl-block">
                            <img src="{{ asset('assets/admin/images/faq-img.png') }}" alt="" class="img-fluid">

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
                                <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#genques-collapseOne" aria-expanded="true" aria-controls="genques-collapseOne">
                                    Làm thế nào để mua sách trên website?
                                </button>
                            </h2>
                            <div id="genques-collapseOne" class="accordion-collapse collapse show" aria-labelledby="genques-headingOne" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    Việc mua sách trên website của chúng tôi rất đơn giản và thuận tiện.
                                    Trước hết, bạn có thể sử dụng thanh công cụ tìm kiếm trên trang chủ để nhập tên sách, tác giả hoặc thể loại mà bạn quan tâm.
                                    Bạn cũng có thể duyệt qua các danh mục sách được phân loại chi tiết như sách văn học, sách khoa học, sách thiếu nhi, v.v.
                                    Sau khi tìm được cuốn sách bạn muốn mua, hãy bấm vào nút "Mua ngay".
                                    Bạn có thể tiếp tục thêm các cuốn sách khác vào giỏ hàng hoặc bấm vào biểu tượng giỏ hàng để tiến hành thanh toán.
                                    Tại trang thanh toán, bạn sẽ cần nhập thông tin và chọn phương thức thanh toán phù hợp.
                                    Sau khi hoàn thành, bạn sẽ nhận được email xác nhận đơn hàng và chúng tôi sẽ tiến hành xử lý đơn hàng của bạn ngay lập tức.                                </div>
                            </div>
                        </div>
                        <div class="accordion-item material-shadow">
                            <h2 class="accordion-header" id="genques-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#genques-collapseTwo" aria-expanded="false" aria-controls="genques-collapseTwo">
                                    Tôi có thể thanh toán bằng những phương thức nào?
                                </button>
                            </h2>
                            <div id="genques-collapseTwo" class="accordion-collapse collapse" aria-labelledby="genques-headingTwo" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    Chúng tôi cung cấp nhiều phương thức thanh toán để mang lại sự tiện lợi tối đa cho khách hàng.
                                    Bạn có thể lựa chọn thanh toán khi nhận hàng (COD) nếu bạn muốn kiểm tra sách trước khi trả tiền.
                                    Ngoài ra, chúng tôi còn hỗ trợ thanh toán qua thẻ tín dụng (Visa, MasterCard),
                                    thẻ ATM nội địa có liên kết với Internet Banking, và các ví điện tử phổ biến như Momo, ZaloPay, hoặc VNPAY.
                                    Tất cả các giao dịch thanh toán trực tuyến đều được mã hóa và bảo mật để đảm bảo an toàn thông tin cho khách hàng.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item material-shadow">
                            <h2 class="accordion-header" id="genques-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#genques-collapseThree" aria-expanded="false" aria-controls="genques-collapseThree">
                                    Tôi quên mật khẩu tài khoản, làm sao để khôi phục?
                                </button>
                            </h2>
                            <div id="genques-collapseThree" class="accordion-collapse collapse" aria-labelledby="genques-headingThree" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    Nếu bạn quên mật khẩu, đừng lo lắng! Hãy nhấn vào liên kết "Quên mật khẩu" trên trang đăng nhập.
                                    Sau đó, bạn sẽ được yêu cầu nhập địa chỉ email đã đăng ký tài khoản.
                                    Chúng tôi sẽ gửi một email chứa liên kết khôi phục mật khẩu.
                                    Nhấp vào liên kết này và làm theo hướng dẫn để tạo mật khẩu mới.
                                    Nếu bạn không nhận được email khôi phục mật khẩu sau vài phút, hãy kiểm tra thư mục Spam hoặc liên hệ với bộ phận hỗ trợ khách hàng để được trợ giúp thêm.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item material-shadow">
                            <h2 class="accordion-header" id="genques-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#genques-collapseFour" aria-expanded="false" aria-controls="genques-collapseFour">
                                    Làm thế nào để đọc sách trực tuyến sau khi mua?
                                </button>
                            </h2>
                            <div id="genques-collapseFour" class="accordion-collapse collapse" aria-labelledby="genques-headingFour" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    Sau khi mua sách điện tử, bạn có thể dễ dàng truy cập và đọc sách ngay trên website hoặc ứng dụng di động của chúng tôi.
                                    Để đọc sách, trước tiên hãy đăng nhập vào tài khoản cá nhân mà bạn đã sử dụng để mua sách.
                                    Sau đó, vào mục "Thư viện của tôi", nơi chứa tất cả các sách điện tử bạn đã mua.
                                    Chỉ cần bấm vào biểu tượng sách, bạn có thể bắt đầu đọc trực tuyến ngay trên trình duyệt mà không cần phải tải về.
                                    Nếu bạn sử dụng ứng dụng di động, bạn cũng có thể đọc sách trực tuyến hoặc tải về để đọc khi không có kết nối internet.
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
                                    Làm thế nào để quản lý tài khoản cá nhân?                                </button>
                            </h2>
                            <div id="manageaccount-collapseOne" class="accordion-collapse collapse" aria-labelledby="manageaccount-headingOne" data-bs-parent="#manageaccount-accordion">
                                <div class="accordion-body">
                                    Để quản lý tài khoản cá nhân, bạn cần đăng nhập vào website bằng email và mật khẩu đã đăng ký.
                                    Sau khi đăng nhập, bạn có thể truy cập vào "Tài khoản của tôi", nơi bạn có thể cập nhật thông tin cá nhân như tên, email, số điện thoại và địa chỉ giao hàng.
                                    Ngoài ra, tại đây bạn cũng có thể thay đổi mật khẩu, xem lịch sử đơn hàng, quản lý danh sách sách yêu thích và cập nhật các thông báo về chương trình khuyến mãi.                                </div>
                            </div>
                        </div>
                        <div class="accordion-item material-shadow">
                            <h2 class="accordion-header" id="manageaccount-headingTwo">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#manageaccount-collapseTwo" aria-expanded="true" aria-controls="manageaccount-collapseTwo">
                                    Làm thế nào để quản lý danh sách yêu thích?                                </button>
                            </h2>
                            <div id="manageaccount-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="manageaccount-headingTwo" data-bs-parent="#manageaccount-accordion">
                                <div class="accordion-body">
                                    Bạn có thể thêm sách vào danh sách yêu thích bằng cách bấm vào biểu tượng "Tim" trên trang chi tiết sản phẩm.
                                    Danh sách này cho phép bạn lưu trữ các sách mà bạn quan tâm hoặc dự định mua trong tương lai.
                                    Để quản lý danh sách này, chỉ cần vào tài khoản của bạn và chọn mục "Yêu thích".
                                    Tại đây, bạn có thể xem lại các sách đã thêm, xóa bớt hoặc chuyển trực tiếp các cuốn sách từ danh sách yêu thích vào giỏ hàng.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item material-shadow">
                            <h2 class="accordion-header" id="manageaccount-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#manageaccount-collapseThree" aria-expanded="false" aria-controls="manageaccount-collapseThree">
                                    Tôi có thể quản lý sách đánh giá và nhận xét như thế nào?                                </button>
                            </h2>
                            <div id="manageaccount-collapseThree" class="accordion-collapse collapse" aria-labelledby="manageaccount-headingThree" data-bs-parent="#manageaccount-accordion">
                                <div class="accordion-body">
                                    Bạn có thể liên hệ với bộ phận chăm sóc khách hàng qua nhiều kênh như email, số điện thoại, hoặc chat trực tuyến.
                                    Trong tài khoản của mình, bạn có thể vào phần "Hỗ trợ" để theo dõi lịch sử liên hệ với bộ phận hỗ trợ và các phản hồi từ chúng tôi.
                                    Điều này giúp bạn dễ dàng quản lý các yêu cầu hỗ trợ và theo dõi tiến trình giải quyết các vấn đề liên quan đến đơn hàng hoặc tài khoản.                                </div>
                            </div>
                        </div>
                        <div class="accordion-item material-shadow">
                            <h2 class="accordion-header" id="manageaccount-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#manageaccount-collapseFour" aria-expanded="false" aria-controls="manageaccount-collapseFour">
                                    Làm thế nào để quản lý đánh giá của người dùng về sách tôi đã xuất bản (dành cho tác giả)?
                                </button>
                            </h2>
                            <div id="manageaccount-collapseFour" class="accordion-collapse collapse" aria-labelledby="manageaccount-headingFour" data-bs-parent="#manageaccount-accordion">
                                <div class="accordion-body">
                                    Nếu bạn là tác giả hoặc nhà xuất bản có tài khoản trên trang, bạn có thể quản lý các đánh giá của người dùng về sách của
                                    mình trong phần "Đánh giá của sách" của tài khoản tác giả. Tại đây, bạn có thể xem chi tiết các đánh giá, phản hồi và tương tác với độc giả.
                                    Điều này giúp bạn nắm bắt được phản hồi từ cộng đồng đọc sách, từ đó cải thiện nội dung sách hoặc phát triển thêm các tác phẩm mới phù hợp với thị hiếu độc giả.                                </div>
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
                                    Website bảo vệ thông tin cá nhân của tôi như thế nào?
                                </button>
                            </h2>
                            <div id="privacy-collapseOne" class="accordion-collapse collapse show" aria-labelledby="privacy-headingOne" data-bs-parent="#privacy-accordion">
                                <div class="accordion-body">
                                    Website luôn coi trọng quyền riêng tư của người dùng và sử dụng các biện pháp bảo mật mạnh mẽ để bảo vệ thông tin cá nhân của bạn.
                                    Thông tin nhạy cảm như tên, địa chỉ email, địa chỉ nhận hàng, và phương thức thanh toán đều được mã hóa khi truyền tải và lưu trữ.
                                    Ngoài ra, chỉ những nhân viên có trách nhiệm mới có quyền truy cập thông tin này, và tất cả các hoạt động truy cập đều được giám sát chặt chẽ.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item material-shadow">
                            <h2 class="accordion-header" id="privacy-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#privacy-collapseTwo" aria-expanded="false" aria-controls="privacy-collapseTwo">
                                    Thông tin thanh toán của tôi có được bảo mật không?
                                </button>
                            </h2>
                            <div id="privacy-collapseTwo" class="accordion-collapse collapse" aria-labelledby="privacy-headingTwo" data-bs-parent="#privacy-accordion">
                                <div class="accordion-body">
                                    Website sử dụng các nền tảng thanh toán uy tín và công nghệ mã hóa SSL để bảo vệ thông tin thẻ tín dụng và các thông tin thanh toán khác.
                                    Chúng tôi không lưu trữ số thẻ tín dụng hay thông tin chi tiết thanh toán trên hệ thống của mình.
                                    Tất cả các giao dịch thanh toán đều được xử lý qua các cổng thanh toán bảo mật.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item material-shadow">
                            <h2 class="accordion-header" id="privacy-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#privacy-collapseThree" aria-expanded="false" aria-controls="privacy-collapseThree">
                                    Website có chia sẻ thông tin của tôi với bên thứ ba không?
                                </button>
                            </h2>
                            <div id="privacy-collapseThree" class="accordion-collapse collapse" aria-labelledby="privacy-headingThree" data-bs-parent="#privacy-accordion">
                                <div class="accordion-body">
                                    Website cam kết không bán hoặc chia sẻ thông tin cá nhân của bạn với các bên thứ ba vì mục đích thương mại.
                                    Chúng tôi chỉ chia sẻ thông tin trong những trường hợp cần thiết để hoàn tất các giao dịch mua hàng
                                    (ví dụ: chia sẻ với đơn vị vận chuyển để giao hàng) hoặc khi được yêu cầu bởi cơ quan pháp luật.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item material-shadow">
                            <h2 class="accordion-header" id="privacy-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#privacy-collapseFour" aria-expanded="false" aria-controls="privacy-collapseFour">
                                    Tôi có thể kiểm soát thông tin cá nhân mà website thu thập không?
                                </button>
                            </h2>
                            <div id="privacy-collapseFour" class="accordion-collapse collapse" aria-labelledby="privacy-headingFour" data-bs-parent="#privacy-accordion">
                                <div class="accordion-body">
                                    Bạn hoàn toàn có quyền kiểm soát và cập nhật thông tin cá nhân trong phần "Tài khoản của tôi."
                                    Bạn có thể chỉnh sửa thông tin như tên, địa chỉ email, địa chỉ giao hàng hoặc xóa tài khoản nếu không muốn sử dụng dịch vụ nữa.
                                    Ngoài ra, bạn có thể tùy chọn không nhận thông tin quảng cáo hoặc thông báo từ hệ thống.
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
