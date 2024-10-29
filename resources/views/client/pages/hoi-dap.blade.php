@extends('client.layouts.app')
@section('content')
    <div class="clearfix"></div>
    <div class="container">
        <div id="ads-header" class="text-center" style="margin-bottom: 10px"></div>
    </div>
    <div class="container tax">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.html"><span class="fa fa-home"></span> Home</a></li>
            <li class="breadcrumb-item"><a href="../index22af.html?page_id=5503553">Những Câu Hỏi Thường Gặp</a></li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="text-center crop-text-2">Những Câu Hỏi Thường Gặp</h1>
                <h2 class="crop-text-2">Dành cho Độc Giả</h2>
                <div class="panel-group row" id="fqa">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="panel panel-default" id="q1">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse1" class="collapsed" aria-expanded="false"> <span
                                            class="number">1</span> Làm sao để mua sách? </a> </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 211px;">
                                <div class="panel-body"> Bạn có thể mua sách bằng cách chọn sách mong muốn và thực hiện
                                    thanh toán </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="panel panel-default" id="q2">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse2" class="collapsed" aria-expanded="false"> <span
                                            class="number">2</span>Tôi thấy giao diện bị lỗi? </a> </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 211px;">
                                <div class="panel-body">Bạn có thể gửi liên hệ thông qua form liên hệ hoặc liên hệ qua zalo
                                    hoặc fanpage của chúng tôi.</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="panel panel-default" id="q3">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse3" class="collapsed" aria-expanded="false"> <span
                                            class="number">3</span>Tôi có thể đăng sách không? </a> </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 211px;">
                                <div class="panel-body"> Bạn có thể đăng ký làm cộng tác viên của mê sách 247 và bắt đầu
                                    công việc sáng tác.</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="panel panel-default" id="q4">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse4" class="collapsed" aria-expanded="false"> <span
                                            class="number">4</span>Tôi liên hệ thì bao lâu sẽ được phản hồi? </a> </h4>
                            </div>
                            <div id="collapse4" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 211px;">
                                <div class="panel-body"> Thông thường các liên hệ sẽ được phản hồi trong 24h</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="panel panel-default" id="q5">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse5" class="collapsed" aria-expanded="false"> <span
                                            class="number">5</span>Làm sao để thay đổi thông tin tài khoản? </a> </h4>
                            </div>
                            <div id="collapse5" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 211px;">
                                <div class="panel-body"> Bạn có thể truy cập trang cá nhân và tiến hành cập nhật thông tin.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="panel panel-default" id="q6">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse6" class="collapsed" aria-expanded="false"> <span
                                            class="number">6</span>Cách liên hệ với quản trị viên? </a> </h4>
                            </div>
                            <div id="collapse6" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 211px;">
                                <div class="panel-body"> Khi bạn gặp bất kỳ vấn đề gì liên quan tới website bạn có thể liên
                                    hệ qua form liên hệ hoặc qua fanpage,zalo,email cho quản trị viên. </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="panel panel-default" id="q7">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse7" class="collapsed" aria-expanded="false"> <span
                                            class="number">7</span> Có thể hủy yêu thích một cuốn sách không? </a> </h4>
                            </div>
                            <div id="collapse7" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 211px;">
                                <div class="panel-body"> Bạn có thể truy cập vào trang yêu thích và tiến hành hủy bỏ yêu
                                    thích của cuốn sách. </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="panel panel-default" id="q8">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse8" class="collapsed" aria-expanded="false"> <span
                                            class="number">8</span>Cách tố cáo người dùng vi phạm? </a> </h4>
                            </div>
                            <div id="collapse8" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 211px;">
                                <div class="panel-body"> Bạn hãy chụp lại bằng chứng và gửi qua các kênh liên hệ để chúng
                                    tôi có phương án xử lý sớm nhất. </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="panel panel-default" id="q9">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse9" class="collapsed" aria-expanded="false"> <span
                                            class="number">9</span> Tôi muốn chỉnh giao diện đọc sách theo sở thích riêng?
                                    </a> </h4>
                            </div>
                            <div id="collapse9" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 211px;">
                                <div class="panel-body"> Trong trang đọc sách bạn hoàn toàn có thể thay đổi màu sắc,kích
                                    cỡ, kiểu chữ để phù hợp với sở thích cá nhân bằng cách ấn vào ô tùy chỉnh và ấn lưu.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="panel panel-default" id="q10">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse10" class="collapsed" aria-expanded="false"> <span
                                            class="number">10</span>Thấy dấu hiệu sao chép tác phẩm? </a> </h4>
                            </div>
                            <div id="collapse10" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 211px;">
                                <div class="panel-body">
                                    Nếu trường hợp bạn thấy tác phẩm được đăng trên website có nội dung giống một tác phẩm
                                    khác thì vui lòng liên hệ sớm nhất với quản trị viên kèm bằng chứng để có biện pháp xử
                                    lý nhanh chóng và hợp lý nhất
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="panel panel-default" id="q11">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse11" class="collapsed" aria-expanded="false"> <span
                                            class="number">11</span>Có được đọc sách miễn phí không? </a> </h4>
                            </div>
                            <div id="collapse11" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 211px;">
                                <div class="panel-body"> Bạn có thể lựa chọn cho mình những cuốn sách có tag miễn phí để trải nghiệm. </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="panel panel-default" id="q12">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse12" class="collapsed" aria-expanded="false"> <span
                                            class="number">12</span>Tại sao comment của tôi không được duyệt? </a> </h4>
                            </div>
                            <div id="collapse12" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 211px;">
                                <div class="panel-body"> Để bình luận được duyệt, phải thỏa mãn tất cả các yêu cầu
                                    sau:<br><br>- Không được xúc phạm, đe dọa đến bất kỳ cá nhân/ tổ chức nào<br>- Không
                                    được dẫn link đến website khác<br>- Không lôi kéo thành viên </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="panel panel-default" id="q13">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse13" class="collapsed" aria-expanded="false"> <span
                                            class="number">13</span>Tại sao tôi nhắn tin qua Facebook, Telegram không
                                        được phản hồi? </a> </h4>
                            </div>
                            <div id="collapse13" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 211px;">
                                <div class="panel-body"> Vui lòng vào thẳng vấn đề, đặt rõ câu hỏi. Nếu gặp lỗi hãy chụp
                                    ảnh màn hình hoặc quay lại video để bộ phận kỹ thuật có thể giải quyết nhanh hơn.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="panel panel-default" id="q14">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse14" class="collapsed" aria-expanded="false"> <span
                                            class="number">14</span>Tôi thấy website bị vỡ giao diện </a> </h4>
                            </div>
                            <div id="collapse14" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 211px;">
                                <div class="panel-body"> Vui lòng dùng trình duyệt Chrome để đạt hiệu suất và trải
                                    nghiệm website tốt hơn </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="panel panel-default" id="q15">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse15" class="collapsed" aria-expanded="false"> <span
                                            class="number">15</span>Làm sao để nhận thông báo truyện khi ra chương mới
                                    </a> </h4>
                            </div>
                            <div id="collapse15" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 211px;">
                                <div class="panel-body"> Vui lòng bấm vào nút Theo Dõi ở mỗi đầu truyện. Mỗi khi truy
                                    cập vào Trang Chủ, hệ thống sẽ thông báo ngay tại đầu website khi truyện có chương
                                    mới </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="panel panel-default" id="q16">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse16" class="collapsed" aria-expanded="false"> <span
                                            class="number">16</span>Tôi đăng nhập bằng thiết bị mới bị mất lịch sử đọc
                                        truyện? </a> </h4>
                            </div>
                            <div id="collapse16" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 211px;">
                                <div class="panel-body"> Hệ thống lưu lịch sử đọc truyện vào trình duyệt chứ không lưu
                                    vào tài khoản. Hãy dùng chức năng <a href="../user/setting/data/index.html#h1">chuyển
                                        đổi từ liệu</a> để chuyển đổi 2
                                    chiều giữa trình duyệt và tài khoản </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h2 class="crop-text-2">Dành cho cộng tác viên</h2>
                <div class="panel-group row" id="fqa">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="panel panel-default" id="q1">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                        href="#collapsez1" class="collapsed" aria-expanded="false"> <span
                                            class="number">1</span>Tôi có thể kiếm tiền với truyện của mình? </a> </h4>
                            </div>
                            <div id="collapsez1" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 211px;">
                                <div class="panel-body"> Với truyện sáng tác/ dịch/ edit bạn có thể bật chương VIP để
                                    tạo ra doanh thu. </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="panel panel-default" id="q2">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                        href="#collapsez2" class="collapsed" aria-expanded="false"> <span
                                            class="number">2</span>Tôi có thể kiếm tiền với truyện sưu tầm? </a> </h4>
                            </div>
                            <div id="collapsez2" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 211px;">
                                <div class="panel-body"> Hoàn toàn được, bạn có thể dùng chắc năng quy đổi từ lượt xem
                                    thành Vàng </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="panel panel-default" id="q3">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                        href="#collapsez3" class="collapsed" aria-expanded="false"> <span
                                            class="number">3</span>Tỷ lệ chia sẻ doanh thu của website? </a> </h4>
                            </div>
                            <div id="collapsez3" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 211px;">
                                <div class="panel-body"> Doanh thu qua việc bán sách sẽ được tính 70 cho tác giả và 30 cho
                                    quản trị viên.</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="panel panel-default" id="q4">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                        href="#collapsez4" class="collapsed" aria-expanded="false"> <span
                                            class="number">4</span>Tôi rút tiền hoa hồng thì bao lâu sẽ nhận được? </a>
                                </h4>
                            </div>
                            <div id="collapsez4" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 211px;">
                                <div class="panel-body"> - Khi thực hiện rút tiền về tài khoản, bạn sẽ nhận được trong
                                    24h trừ ngày nghỉ và lễ tết. </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="panel panel-default" id="q5">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                        href="#collapsez5" class="collapsed" aria-expanded="false"> <span
                                            class="number">5</span>Tôi có mất phí rút tiền không? </a> </h4>
                            </div>
                            <div id="collapsez5" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 211px;">
                                <div class="panel-body"> Hoàn toàn miễn phí </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="panel panel-default" id="q6">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                        href="#collapsez6" class="collapsed" aria-expanded="false"> <span
                                            class="number">6</span>Truyện của tôi đã có trên hệ thống. Tôi muốn quyền
                                        quản lý? </a> </h4>
                            </div>
                            <div id="collapsez6" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 211px;">
                                <div class="panel-body"> Nếu bạn sáng tác/ dịch/ edit truyện đó. Bạn hoàn toàn có thể
                                    lấy quyền quản lý, vui lòng gửi bằng chứng chứng minh cho BQT. </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="panel panel-default" id="q7">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                        href="#collapsez7" class="collapsed" aria-expanded="false"> <span
                                            class="number">7</span>Tại sao truyện của tôi không được duyệt? </a> </h4>
                            </div>
                            <div id="collapsez7" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 211px;">
                                <div class="panel-body"> - Bạn phải click vào nút Yêu cầu BQT duyệt truyện thì truyện
                                    của bạn mới được xem xét đăng công khai. <a href="../guide/publish/index.html">Chi
                                        tiết xem tại đây</a>.<br><br>Nếu đã đủ điều kiện mà truyện của bạn > 1 ngày chưa
                                    được duyệt, vui lòng liên hệ BQT </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="panel panel-default" id="q8">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                        href="#collapsez8" class="collapsed" aria-expanded="false"> <span
                                            class="number">8</span>Tôi muốn đăng tiếp truyện đã có trên hệ thống? </a>
                                </h4>
                            </div>
                            <div id="collapsez8" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 211px;">
                                <div class="panel-body"> Nếu truyện dịch/edit đã lâu không ra chương. Bạn vui lòng liên
                                    hệ BQT để đăng tiếp truyện </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        #fqa .panel-body a {
            border-bottom: 1px dashed black;
        }

        h1 {
            font-size: 32px;
            padding-right: 15px;
            padding-left: 15px;
            font-family: "Oswald";
            font-weight: normal;
            margin-bottom: 20px;
        }

        .number {
            z-index: 5;
            text-align: center;
            color: white;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #ebebeb;
            /* margin: 3px; */
            display: inline-flex;
            justify-content: center;
            align-items: center;
            background-image: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
            border: 1px #1ebbf0 solid;
            font-size: 12px;
            margin-right: 7px;
        }

        .panel-default>.panel-heading {
            background-image: unset;
        }
    </style>
@endsection
