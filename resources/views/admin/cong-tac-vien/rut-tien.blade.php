@extends('admin.layouts.app')

@section('title', 'Rút tiền')

@section('content')
    <div class="container ">
        <div class="card shadow p-4">
            <!-- Updated Header Layout -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="d-flex align-items-center">
                    <h4 class="mb-0 d-flex align-items-center justify-content-center">
                        <i class="bx bx-wallet text-primary fs-2 me-2"></i> 2.000.000
                    </h4>
                    <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#withdrawModal">
                        Rút tiền
                    </button>
                </div>

                <div>

                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#supportModal">
                        Hỗ trợ
                    </button>
                    <!-- Support Modal -->
                    <div class="modal fade" id="supportModal" tabindex="-1" aria-labelledby="supportModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title" id="supportModalLabel">Liên hệ hỗ trợ</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="ps-3 pe-3 pt-2">
                                    <p class="bg-primary-subtle rounded-3 p-2">
                                        Cộng tác viên có bất kỳ vấn đề gì về rút tiền vui lòng liên hệ các kênh dưới đây để
                                        được hỗ trợ sớm nhất!
                                    </p>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <!-- Left side with contact options -->
                                        <div class="col-md-7">

                                            <div class="mb-3">
                                                <a href="mailto:mesach247@gmail.com"
                                                    class="btn btn-primary btn-label rounded-pill">
                                                    <i
                                                        class="ri-mail-line label-icon align-middle rounded-pill fs-16 me-2"></i>
                                                    Gửi Email Cho Chúng Tôi
                                                </a>
                                            </div>
                                            <div class="mb-3">
                                                <a target="_blank"
                                                    href="https://www.facebook.com/profile.php?id=100030410919087&sk=about"
                                                    class="btn btn-info btn-label rounded-pill">
                                                    <i
                                                        class="ri-facebook-line label-icon align-middle rounded-pill fs-16 me-2"></i>
                                                    Liên Hệ Facebook
                                                </a>
                                            </div>
                                            <div class="mb-3">
                                                <a href="mailto:mesach247@gmail.com"
                                                    class="btn btn-warning btn-label rounded-pill">
                                                    <i
                                                        class="ri-phone-line label-icon align-middle rounded-pill fs-16 me-2"></i>
                                                    Liên Hệ Zalo Cho Chúng Tôi
                                                </a>
                                            </div>
                                        </div>

                                        <!-- Right side with an image -->
                                        <div class="col-md-5 d-flex justify-content-center align-items-center"
                                            style="height: 100%;">
                                            <lord-icon src="https://cdn.lordicon.com/zpxybbhl.json" trigger="loop"
                                                colors="primary:#405189,secondary:#0ab39c"
                                                style="width:160px; height:160px;"> <!-- Increased size -->
                                            </lord-icon>
                                        </div>

                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="justify-content-between align-items-center fs-9" style="color:gray">
                <p>
                    1. Thu nhập của tháng trước sẽ được phép rút sau ngày mùng 6 tháng này. Ví dụ, thu nhập của tháng
                    1/2019, sẽ được chuyển vào Số tiền có thể rút sau ngày 6/2/2019.
                    <br>2. Nếu bạn xin rút tiền trước ngày 15 hàng tháng, tiền sẽ được chuyển cho bạn vào cuối tháng.
                    Nếu xin rút sau ngày 15, tiền sẽ được chuyển vào cuối tháng sau.
                    <br>3. Khi Số tiền có thể rút đủ VND 1.000.000 thì có thể rút tiền. Sau khi xác nhận lại tài khoản
                    nhận tiền là chính xác, chúng tôi sẽ chuyển tiền cho bạn.
                    <span id="expandLink" style="color:blue; cursor:pointer;">Xem thêm</span>
                </p>

                <div id="additionalInfo" style="display:none; color:gray;">
                    <p>Thông tin bổ sung về quy trình rút tiền và các điều kiện áp dụng:</p>
                    <ul>
                        <li><strong>Đảm bảo an toàn:</strong> Mọi yêu cầu rút tiền phải được thực hiện thông qua hệ thống
                            bảo mật của chúng tôi. Đảm bảo rằng bạn đã cập nhật phần mềm bảo mật và đăng nhập từ thiết bị
                            đáng tin cậy.</li>
                        <li><strong>Tránh sai sót:</strong> Khi nhập số tài khoản, bạn cần kiểm tra kỹ lưỡng thông tin hai
                            lần. Chúng tôi khuyên bạn sử dụng tính năng "Lưu tài khoản" để tránh nhập sai số tài khoản trong
                            các lần rút tiền tiếp theo.</li>
                        <li><strong>Xử lý khi gửi nhầm số tài khoản:</strong> Trong trường hợp gửi nhầm số tài khoản, bạn
                            cần liên hệ ngay với chúng tôi qua số điện thoại hỗ trợ khách hàng. Chúng tôi sẽ hỗ trợ xác minh
                            và đảo ngược giao dịch nếu số tiền chưa được chuyển đi.</li>
                        <li><strong>Giới hạn rút tiền:</strong> Mỗi người dùng chỉ được phép rút tối đa là 20.000.000 VND
                            mỗi ngày. Các yêu cầu rút tiền vượt quá giới hạn này sẽ cần xác minh bổ sung.</li>
                        <li><strong>Thời gian xử lý:</strong> Yêu cầu rút tiền thường được xử lý trong vòng 24 đến 48 giờ
                            làm việc, tùy thuộc vào ngân hàng của bạn.</li>
                        <li><strong>Các biện pháp phòng ngừa lừa đảo:</strong> Chúng tôi sử dụng công nghệ phân tích hành vi
                            để phát hiện các giao dịch bất thường. Bất kỳ giao dịch nghi ngờ nào cũng sẽ được tạm ngừng cho
                            đến khi xác minh đầy đủ.</li>
                    </ul>
                </div>

            </div>

            <script>
                document.getElementById('expandLink').onclick = function() {
                    var info = document.getElementById('additionalInfo');
                    if (info.style.display === 'none') {
                        info.style.display = 'block';
                    } else {
                        info.style.display = 'none';
                    }
                };
            </script>



            <!-- Modal -->
            <div class="modal fade" id="withdrawModal" tabindex="-1" aria-labelledby="withdrawModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="{{ route('withdraw.store') }}" method="POST" autocomplete="off">
                            @csrf <!-- Token CSRF cho Laravel -->
                            <div class="text-center pt-4 pb-2">
                                <h4>Rút tiền</h4>
                            </div>
                            <div class="modal-body">
                                <div class="mb-4">
                                    <h5 class="mb-3">Thông tin rút tiền</h5>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label for="bank-name-input">Tên ngân hàng</label>
                                        <select class="form-control" id="bank-name-input" name="bank-name-input" required>
                                            <option value="">Chọn ngân hàng</option>
                                            <option data-v-166a3ddc="" value="[object Object]">NH TMCP Quan Doi MBBank
                                            </option>
                                            <option data-v-166a3ddc="" value="[object Object]">NH TMCP Dau Tu va Phat Trien
                                                Viet Nam BIDV</option>
                                            <option data-v-166a3ddc="" value="[object Object]">NH Nong Nghiep Phat Trien
                                                Nong Thon VN Agribank</option>
                                            <option data-v-166a3ddc="" value="[object Object]">Ngan Hang Vietcombank VCB
                                            </option>
                                            <option data-v-166a3ddc="" value="[object Object]">NH TMCP A Chau ACB</option>
                                            <option data-v-166a3ddc="" value="[object Object]">Ngan hang Ky Thuong Viet Nam
                                                Techcombank</option>
                                            <option data-v-166a3ddc="" value="[object Object]">Ngan Hang LienVietPostBank
                                            {{-- </option>
                                            <option data-v-166a3ddc="" value="[object Object]">Ngan Hang Sai Gon Ha Noi SHB
                                            </option>
                                            <option data-v-166a3ddc="" value="[object Object]">Ngan hang TMCP Dong A DongA
                                                Bank</option>
                                            <option data-v-166a3ddc="" value="[object Object]">NH TMCP An Binh ABBank
                                            </option>
                                            <option data-v-166a3ddc="" value="[object Object]">NH TMCP Cong Thuong Viet
                                                Nam Vietinbank</option>
                                            <option data-v-166a3ddc="" value="[object Object]">Standard Chartered Bank
                                            </option>
                                            <option data-v-166a3ddc="" value="[object Object]">Ngan hang TMCP Kien Long
                                            </option>
                                            <option data-v-166a3ddc="" value="[object Object]">Ngan Hang TMCP Nam A
                                            </option>
                                            <option data-v-166a3ddc="" value="[object Object]">Ngan Hang TNHH Indovina
                                            </option>
                                            <option data-v-166a3ddc="" value="[object Object]">Ngan Hang Viet Nam Thinh
                                                Vuong VPBANK</option>
                                            <option data-v-166a3ddc="" value="[object Object]">Ngan hang Wooribank
                                            </option>
                                            <option data-v-166a3ddc="" value="[object Object]">NH Cong Nghiep Han Quoc CN
                                                Ha Noi IBK HN</option>
                                            <option data-v-166a3ddc="" value="[object Object]">NH Hop Tac Xa Viet Nam Co
                                                op Bank</option>
                                            <option data-v-166a3ddc="" value="[object Object]">NH Lien Doanh VID VID
                                                Public
                                            </option> --}}
                                        </select>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label for="account-number-input">Số tài khoản</label>
                                        <input type="number" class="form-control" id="account-number-input"
                                            name="account-number-input" placeholder="Nhập số tài khoản" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label for="recipient-name-input">Tên chủ tài khoản</label>
                                        <input type="text" class="form-control" id="recipient-name-input"
                                            name="recipient-name-input" placeholder="VD: NGUYEN VAN A" required
                                            oninput="formatRecipientName(this)">
                                    </div>
                                </div>

                                <script>
                                    function formatRecipientName(input) {
                                        // Chuyển chuỗi thành chữ hoa và loại bỏ dấu tiếng Việt
                                        input.value = removeVietnameseTones(input.value.toUpperCase());
                                    }

                                    function removeVietnameseTones(str) {
                                        // Chuyển các ký tự có dấu thành ký tự không dấu
                                        str = str.normalize('NFD').replace(/[\u0300-\u036f]/g, "");
                                        return str;
                                    }
                                </script>


                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label for="amount-input">Số tiền muốn rút</label>
                                        <select class="form-control" id="amount-input" name="amount-input" required>
                                            <option value="">Chọn mốc</option>
                                            <option value="500000">500,000</option>
                                            <option value="1000000">1,000,000</option>
                                            <option value="2000000">2,000,000</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                                <button type="submit" class="btn btn-success">Xác nhận rút tiền</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="row mt-3">

                <div class="col-lg-12">
                    <div class="card border-1">
                        <div class="card-header">
                            <h4 class="card-title mb-0 flex-grow-1">Lịch sử rút tiền</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div id="table-gridjs"></div>

                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->

            </div>


        </div>
    </div>
    </div>
@endsection
@push('styles')
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/gridjs/theme/mermaid.min.css') }}">
    <!-- Add Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
@endpush
@push('scripts')
    <script src="{{ asset('assets/admin/libs/prismjs/prism.js') }}"></script>

    <!-- gridjs js -->
    <script src="{{ asset('assets/admin/libs/gridjs/gridjs.umd.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dataFromController = @json($dataForGridJs);

            const grid = new gridjs.Grid({
                columns: [{
                        name: "Ngày yêu cầu",
                        width: "auto",
                        formatter: function(cell) {
                            var date = new Date(cell);
                            return gridjs.html(
                                `${date.getDate()}/${date.getMonth() + 1}/${date.getFullYear()} ${date.getHours()}:${date.getMinutes()}`
                            );
                        }
                    },
                    {
                        name: "Số tiền rút",
                        width: "auto"
                    },
                    {
                        name: "Trạng thái",
                        width: "auto",
                        formatter: function(cell) {
                            let label = "";
                            let style = "";
                            

                            switch (cell) {
                                case 'dang_xu_ly':
                                    label = "Đang xử lý";
                                    style =
                                        "background-color: yellow; color: black; border: 1px solid yellow; padding: 2px 5px; border-radius: 4px;";
                                    break;
                                case 'da_huy':
                                    label = "Đã Hủy";
                                    style =
                                        "background-color: red; color: white; border: 1px solid red; padding: 2px 5px; border-radius: 4px;";
                                    break;
                                case 'da_duyet':
                                    label = "Đã duyệt";
                                    style =
                                        "background-color: green; color: white; border: 1px solid green; padding: 2px 5px; border-radius: 4px;";
                                    break;
                            }

                            return gridjs.html(`<span class="" style="${style}">${label}</span>`);
                        }
                    }
                ],
                data: dataFromController.map(function(item) {
                    return [
                        item.created_at,
                        item.so_tien,
                        item.trang_thai,
                    ];
                }),
                sort: true,
                search: true,
                pagination: {
                    limit: 5
                },
                language: {
                    'search': {
                        'placeholder': 'Tìm kiếm...'
                    },
                    'pagination': {
                        'previous': 'Trước',
                        'next': 'Tiếp',
                        'showing': 'Đang hiển thị',
                        'results': () => 'Bản ghi'
                    }
                }
            });

            grid.render(document.getElementById("table-gridjs"));
        });
    </script>
@endpush
