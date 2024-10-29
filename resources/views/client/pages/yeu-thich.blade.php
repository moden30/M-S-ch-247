@extends('client.layouts.app')
@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"><span class="fa fa-home"></span> Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Yêu thích</a></li>

        </ol>
    </div>
    {{-- <div class="container">
        <div class="col-xs-12 col-md-12">

            <div id="filter-keyword" class="ztop-10 zbottom-10">

                <div id="content-keyword">
                    <div id="title-result">
                        <div class="pull-left"> 22831 truyện </div>
                        <div class="pull-right">
                            <div class="form-group"> <select id="filter_keyword_tax" class="form-control">
                                    <option value="new-chap">Mới Cập Nhật</option>
                                    <option value="ticket_new">Mới Được Đẩy</option>
                                    <option value="new">Truyện Mới</option>
                                    <option value="new-full">Hoàn Thành</option>
                                    <option value="top-ticket-week">🏆Top Đề Cử - Tuần</option>
                                    <option value="top-ticket-month">🏆Top Đề Cử - Tháng</option>
                                    <option value="top-ticket-total">🏆Top Đề Cử - Tất Cả</option>
                                    <option value="top-revenue-week">💸Top Doanh Thu - Tuần</option>
                                    <option value="top-revenue-month">💸Top Doanh Thu - Tháng</option>
                                </select> </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <table class="theloai-thumlist">
                        <tbody>
                            <tr class="col-md-4 col-sm-6 col-xs-12 me-5"
                                style="border-radius: 10px; width:31.36%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);"
                                itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" /> <a
                                        href="../../truyen/tong-vo-nguoi-khac-luyen-vo-ta-tu-tien/index.html"
                                        class="thumbnail" title="Tổng Võ: Người Khác Luyện Võ Ta Tu Tiên"> <img
                                            style="   border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);"
                                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/09/11670629.jpg"
                                            alt="Tổng Võ: Người Khác Luyện Võ Ta Tu Tiên" itemprop="image" /> </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name"> <a
                                            href="../../truyen/tong-vo-nguoi-khac-luyen-vo-ta-tu-tien/index.html"
                                            title="Tổng Võ: Người Khác Luyện Võ Ta Tu Tiên" itemprop="url"> Tổng Võ:
                                            Người Khác Luyện Võ Ta Tu Tiên </a> </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author"> <a href="../../tac-gia/tra-tho-xa/index.html"
                                                    rel="tag">Tra Thổ Xa</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">“Không thể nào! Đây tuyệt đối
                                            không phải là Đại Lực Ưng Trảo Công!”“Đây chính là Đại Lực Ưng Trảo
                                            Công, chỉ là ta đã luyện đến tầng một&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-4 col-sm-6 col-xs-12 me-5"
                                style="border-radius: 10px; width:31.36%;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);"
                                itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" /> <a
                                        href="../../truyen/tong-vo-nguoi-khac-luyen-vo-ta-tu-tien/index.html"
                                        class="thumbnail" title="Tổng Võ: Người Khác Luyện Võ Ta Tu Tiên"> <img
                                            style="   border-radius: 10px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);"
                                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/09/11670629.jpg"
                                            alt="Tổng Võ: Người Khác Luyện Võ Ta Tu Tiên" itemprop="image" /> </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name"> <a
                                            href="../../truyen/tong-vo-nguoi-khac-luyen-vo-ta-tu-tien/index.html"
                                            title="Tổng Võ: Người Khác Luyện Võ Ta Tu Tiên" itemprop="url"> Tổng Võ:
                                            Người Khác Luyện Võ Ta Tu Tiên </a> </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author"> <a href="../../tac-gia/tra-tho-xa/index.html"
                                                    rel="tag">Tra Thổ Xa</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">“Không thể nào! Đây tuyệt đối
                                            không phải là Đại Lực Ưng Trảo Công!”“Đây chính là Đại Lực Ưng Trảo
                                            Công, chỉ là ta đã luyện đến tầng một&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-4 col-sm-6 col-xs-12 me-5"
                                style="border-radius: 10px; width:31.36%;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);"
                                itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" /> <a
                                        href="../../truyen/tong-vo-nguoi-khac-luyen-vo-ta-tu-tien/index.html"
                                        class="thumbnail" title="Tổng Võ: Người Khác Luyện Võ Ta Tu Tiên"> <img
                                            style="   border-radius: 10px;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);"
                                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/09/11670629.jpg"
                                            alt="Tổng Võ: Người Khác Luyện Võ Ta Tu Tiên" itemprop="image" /> </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name"> <a
                                            href="../../truyen/tong-vo-nguoi-khac-luyen-vo-ta-tu-tien/index.html"
                                            title="Tổng Võ: Người Khác Luyện Võ Ta Tu Tiên" itemprop="url"> Tổng Võ:
                                            Người Khác Luyện Võ Ta Tu Tiên </a> </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author"> <a href="../../tac-gia/tra-tho-xa/index.html"
                                                    rel="tag">Tra Thổ Xa</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">“Không thể nào! Đây tuyệt đối
                                            không phải là Đại Lực Ưng Trảo Công!”“Đây chính là Đại Lực Ưng Trảo
                                            Công, chỉ là ta đã luyện đến tầng một&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-4 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" /> <a
                                        href="../../truyen/tong-vo-nguoi-khac-luyen-vo-ta-tu-tien/index.html"
                                        class="thumbnail" title="Tổng Võ: Người Khác Luyện Võ Ta Tu Tiên"> <img
                                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/09/11670629.jpg"
                                            alt="Tổng Võ: Người Khác Luyện Võ Ta Tu Tiên" itemprop="image" /> </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name"> <a
                                            href="../../truyen/tong-vo-nguoi-khac-luyen-vo-ta-tu-tien/index.html"
                                            title="Tổng Võ: Người Khác Luyện Võ Ta Tu Tiên" itemprop="url"> Tổng Võ:
                                            Người Khác Luyện Võ Ta Tu Tiên </a> </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author"> <a href="../../tac-gia/tra-tho-xa/index.html"
                                                    rel="tag">Tra Thổ Xa</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">“Không thể nào! Đây tuyệt đối
                                            không phải là Đại Lực Ưng Trảo Công!”“Đây chính là Đại Lực Ưng Trảo
                                            Công, chỉ là ta đã luyện đến tầng một&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-4 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" /> <a
                                        href="../../truyen/cau-lac-bo-thien-tai/index.html" class="thumbnail"
                                        title="Câu Lạc Bộ Thiên Tài"> <img
                                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/09/11586882.jpg"
                                            alt="Câu Lạc Bộ Thiên Tài" itemprop="image" /> </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name"> <a
                                            href="../../truyen/cau-lac-bo-thien-tai/index.html"
                                            title="Câu Lạc Bộ Thiên Tài" itemprop="url"> Câu Lạc Bộ Thiên Tài </a>
                                    </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author"> <a
                                                    href="../../tac-gia/thanh-thanh-du-thien/index.html"
                                                    rel="tag">Thành Thành Dữ Thiền</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">“Từ khi sinh ra, mỗi ngày tôi
                                            đều sẽ mơ một giấc mơ giống hệt nhau, trong mơ một ngày dường như được
                                            lặp đi lặp lại.” “Trong&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-4 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" /> <a
                                        href="../../truyen/cau-lac-bo-thien-tai/index.html" class="thumbnail"
                                        title="Câu Lạc Bộ Thiên Tài"> <img
                                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/09/11586882.jpg"
                                            alt="Câu Lạc Bộ Thiên Tài" itemprop="image" /> </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name"> <a
                                            href="../../truyen/cau-lac-bo-thien-tai/index.html"
                                            title="Câu Lạc Bộ Thiên Tài" itemprop="url"> Câu Lạc Bộ Thiên Tài </a>
                                    </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author"> <a
                                                    href="../../tac-gia/thanh-thanh-du-thien/index.html"
                                                    rel="tag">Thành Thành Dữ Thiền</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">“Từ khi sinh ra, mỗi ngày tôi
                                            đều sẽ mơ một giấc mơ giống hệt nhau, trong mơ một ngày dường như được
                                            lặp đi lặp lại.” “Trong&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-4 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" /> <a
                                        href="../../truyen/tong-vo-nguoi-khac-luyen-vo-ta-tu-tien/index.html"
                                        class="thumbnail" title="Tổng Võ: Người Khác Luyện Võ Ta Tu Tiên"> <img
                                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/09/11670629.jpg"
                                            alt="Tổng Võ: Người Khác Luyện Võ Ta Tu Tiên" itemprop="image" /> </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name"> <a
                                            href="../../truyen/tong-vo-nguoi-khac-luyen-vo-ta-tu-tien/index.html"
                                            title="Tổng Võ: Người Khác Luyện Võ Ta Tu Tiên" itemprop="url"> Tổng Võ:
                                            Người Khác Luyện Võ Ta Tu Tiên </a> </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author"> <a href="../../tac-gia/tra-tho-xa/index.html"
                                                    rel="tag">Tra Thổ Xa</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">“Không thể nào! Đây tuyệt đối
                                            không phải là Đại Lực Ưng Trảo Công!”“Đây chính là Đại Lực Ưng Trảo
                                            Công, chỉ là ta đã luyện đến tầng một&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-4 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" /> <a
                                        href="../../truyen/cau-lac-bo-thien-tai/index.html" class="thumbnail"
                                        title="Câu Lạc Bộ Thiên Tài"> <img
                                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/09/11586882.jpg"
                                            alt="Câu Lạc Bộ Thiên Tài" itemprop="image" /> </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name"> <a
                                            href="../../truyen/cau-lac-bo-thien-tai/index.html"
                                            title="Câu Lạc Bộ Thiên Tài" itemprop="url"> Câu Lạc Bộ Thiên Tài </a>
                                    </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author"> <a
                                                    href="../../tac-gia/thanh-thanh-du-thien/index.html"
                                                    rel="tag">Thành Thành Dữ Thiền</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">“Từ khi sinh ra, mỗi ngày tôi
                                            đều sẽ mơ một giấc mơ giống hệt nhau, trong mơ một ngày dường như được
                                            lặp đi lặp lại.” “Trong&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-4 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" /> <a
                                        href="../../truyen/cau-lac-bo-thien-tai/index.html" class="thumbnail"
                                        title="Câu Lạc Bộ Thiên Tài"> <img
                                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/09/11586882.jpg"
                                            alt="Câu Lạc Bộ Thiên Tài" itemprop="image" /> </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name"> <a
                                            href="../../truyen/cau-lac-bo-thien-tai/index.html"
                                            title="Câu Lạc Bộ Thiên Tài" itemprop="url"> Câu Lạc Bộ Thiên Tài </a>
                                    </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author"> <a
                                                    href="../../tac-gia/thanh-thanh-du-thien/index.html"
                                                    rel="tag">Thành Thành Dữ Thiền</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">“Từ khi sinh ra, mỗi ngày tôi
                                            đều sẽ mơ một giấc mơ giống hệt nhau, trong mơ một ngày dường như được
                                            lặp đi lặp lại.” “Trong&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-4 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" /> <a
                                        href="../../truyen/tong-vo-nguoi-khac-luyen-vo-ta-tu-tien/index.html"
                                        class="thumbnail" title="Tổng Võ: Người Khác Luyện Võ Ta Tu Tiên"> <img
                                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/09/11670629.jpg"
                                            alt="Tổng Võ: Người Khác Luyện Võ Ta Tu Tiên" itemprop="image" /> </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name"> <a
                                            href="../../truyen/tong-vo-nguoi-khac-luyen-vo-ta-tu-tien/index.html"
                                            title="Tổng Võ: Người Khác Luyện Võ Ta Tu Tiên" itemprop="url"> Tổng Võ:
                                            Người Khác Luyện Võ Ta Tu Tiên </a> </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author"> <a href="../../tac-gia/tra-tho-xa/index.html"
                                                    rel="tag">Tra Thổ Xa</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">“Không thể nào! Đây tuyệt đối
                                            không phải là Đại Lực Ưng Trảo Công!”“Đây chính là Đại Lực Ưng Trảo
                                            Công, chỉ là ta đã luyện đến tầng một&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-4 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" /> <a
                                        href="../../truyen/cau-lac-bo-thien-tai/index.html" class="thumbnail"
                                        title="Câu Lạc Bộ Thiên Tài"> <img
                                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/09/11586882.jpg"
                                            alt="Câu Lạc Bộ Thiên Tài" itemprop="image" /> </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name"> <a
                                            href="../../truyen/cau-lac-bo-thien-tai/index.html"
                                            title="Câu Lạc Bộ Thiên Tài" itemprop="url"> Câu Lạc Bộ Thiên Tài </a>
                                    </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author"> <a
                                                    href="../../tac-gia/thanh-thanh-du-thien/index.html"
                                                    rel="tag">Thành Thành Dữ Thiền</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">“Từ khi sinh ra, mỗi ngày tôi
                                            đều sẽ mơ một giấc mơ giống hệt nhau, trong mơ một ngày dường như được
                                            lặp đi lặp lại.” “Trong&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-4 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" /> <a
                                        href="../../truyen/cau-lac-bo-thien-tai/index.html" class="thumbnail"
                                        title="Câu Lạc Bộ Thiên Tài"> <img
                                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/09/11586882.jpg"
                                            alt="Câu Lạc Bộ Thiên Tài" itemprop="image" /> </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name"> <a
                                            href="../../truyen/cau-lac-bo-thien-tai/index.html"
                                            title="Câu Lạc Bộ Thiên Tài" itemprop="url"> Câu Lạc Bộ Thiên Tài </a>
                                    </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author"> <a
                                                    href="../../tac-gia/thanh-thanh-du-thien/index.html"
                                                    rel="tag">Thành Thành Dữ Thiền</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">“Từ khi sinh ra, mỗi ngày tôi
                                            đều sẽ mơ một giấc mơ giống hệt nhau, trong mơ một ngày dường như được
                                            lặp đi lặp lại.” “Trong&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="clearfix"></div>
                    <div class="load_more_tax text-center"><span class="btn-primary-border font-12 font-oswald"
                            data-maxpage="1269">Xem Thêm Truyện →</span></div>
                </div>
            </div>
        </div>
    </div> --}}
    <style>
        .card {
            display: flex;
            align-items: center;
            background-color: #fff;
            border-radius: 15px;
            padding: 15px;
            width: 450px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: visible;
        }

        .card img {
            width: 100px;
            height: 140px;
            border-radius: 10px;
            object-fit: cover;
            position: absolute;
            top: -15px;
            left: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card-content {
            margin-left: 120px;
        }

        .card-title {
            color: #000000;
            font-weight: bold;
            font-size: 16px;
            margin: 0;
        }

        .card-subtitle {
            color: #888;
            font-size: 14px;
            margin: 5px 0;
        }

        .card-timestamp {
            color: #888;
            font-size: 12px;
        }

        .card-buttons {
            margin-left: 110px;
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .btn-complete,
        .btn-delete {
            padding: 5px 15px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-complete {
            background-color: #ccffcf;
            color: #008507;
        }

        .btn-delete {
            background-color: #eeeeee;
            color: #666666;
        }

        .tag {
            position: absolute;
            /* Position it absolutely within the card */
            top: 10px;
            /* Position from the top */
            right: 10px;
            /* Position from the right */
            background-color: #ffcc00;
            /* Background color for the tag */
            color: #fff;
            /* Text color */
            padding: 5px 10px;
            /* Padding for the tag */
            border-radius: 5px;
            /* Rounded corners */
            font-weight: bold;
            /* Bold text */
            z-index: 10;
            /* Ensure it stays above other elements */
        }

        .btn-update {
            color: #ff9800;
            background-color: #fff3e0;
            border: 1px solid #ffe0b2;
            /* Viền cam nhạt */
            border-radius: 20px;
            padding: 5px 10px;
            font-size: 14px;
            white-space: nowrap;
        }

        .hang {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px 5px;
            /* 40px giữa các hàng, 5px giữa các cột */
            justify-items: center;
        }

        .card {
            width: 100%;
            max-width: 450px;
            height: 150px;
            /* Chiều cao cố định của thẻ */

        }
    </style>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/client/home.css') }}">
    @endpush
    <div class="container mt-5">
        <div class="hang">
            @foreach ($sachYeuThich as $yeuThich)
                @php
                    $sach = $yeuThich->sach;
                @endphp
                <div class="card">
                    <a href="{{ url('/sach/' . $sach->id) }}">
                        <img src="{{ Storage::url($sach->anh_bia_sach) }}" alt="{{ $sach->ten_sach }} - Book Cover">
                    </a>
                    <div class="price-tag">{{ number_format($sach->gia_khuyen_mai ?? $sach->gia_goc, 0, ',', '.') }} VND
                    </div>
                    <div class="card-content">
                        <a href="{{ url('/sach/' . $sach->id) }}" class="card-title">{{ $sach->ten_sach }}</a>
                        <br>
                        <a href="{{ route('chi-tiet-tac-gia', $sach->user->id) }}" class="card-author">Tác giả:
                            {{ $sach->tac_gia }}</a>
                        <br>
                        <a href="{{ url('/the-loai/' . $sach->theLoai->id ?? '#') }}" class="card-genre">Thể loại:
                            {{ $sach->theLoai->ten_the_loai ?? 'Không xác định' }}</a>
                        <p class="card-price">Cập nhật: {{ $sach->updated_at->format('d/m/Y') }}</p>
                        <div class="card-buttons">
                            @if ($sach->tinh_trang_cap_nhat == 'da_full')
                                <button class="btn-complete">Hoàn thành</button>
                            @else
                                <button class="btn-update text-warning">Đang cập nhật</button>
                            @endif
                            <button class="btn-delete" onclick="deleteYeuThich({{ $yeuThich->id }})">Xóa</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
@endsection
@push('scripts')
    <script>
        function deleteYeuThich(yeuThichId) {
            if (confirm('Bạn có chắc muốn xóa sách này khỏi yêu thích?')) {
                fetch(`/yeu-thich/${yeuThichId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                        },
                    })

                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert(data.message);
                            location.reload();
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        }
    </script>
    
@endpush
