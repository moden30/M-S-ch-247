@extends('client.layouts.app')
@section('content')
    <div class="clearfix"></div>
    <div class="container">
        <div id="ads-header" class="text-center" style="margin-bottom: 10px"></div>
    </div>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../index.html"><span class="fa fa-home"></span> Home</a></li>
            <li class="breadcrumb-item"><a href="../../index4f9e.html?page_id=7676677">Bảng Xếp Hạng Tác Giả</a></li>

        </ol>
    </div>
    <div class="container tax">
        <div class="row row-heading">
            <div class="col-xs-7">
                <h1 class="crop-text"> Bảng xếp hạng tác giả</h1>
            </div>
        </div>
        <div class="col-xs-8">
            <ul class="nav nav-tabs nav-tabs-css" data-id="ticket">
                <li role="presentation" data-time="view" class="active"><a href="#">Lượt xem</a></li>
                <li role="presentation" data-time="review"><a href="#">Đánh giá</a></li>
                <li role="presentation" data-time="favorite"><a href="#">Yêu thích</a></li>
            </ul>
        </div>
        <div class="list-group view-row">

            <div class="col-xs-12 col-sm-6 col-md-8">
                <div class="h3">
                    <h3 class="heading"><i class="fa fa-star" aria-hidden="true"></i>Lượt xem</h3>
                    <div id="top">
                        <ul class="list-group row">
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1688954555/index.html" class="crop-text"> <img class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1688954555-1722967423.jpg') }}" /> <span
                                        style="color:#000000">Limee182</span> </a>
                                <div class="pull-right z-top-date crop-text"> 15 phút trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/0866130181/index.html" class="crop-text"> <img class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/0866130181-1710027444.jpg') }}" /> <span
                                        style="color:#000000">Mosyyy</span> </a>
                                <div class="pull-right z-top-date crop-text"> 3 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1818181868/index.html" class="crop-text"> <img class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1726827386-1726853411.jpg') }}" /> <span
                                        style="color:#000000">Áng Mây Phiêu Bạt</span> </a>
                                <div class="pull-right z-top-date crop-text"> 5 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/hienkutelove/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/hienkutelove-1726782357.jpg') }}" /> <span
                                        style="color:#000000">Jinny1340🍀</span> </a>
                                <div class="pull-right z-top-date crop-text"> 6 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1727430565/index.html" class="crop-text"> <img class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1727430565-1727572655.jpg') }}" /> <span
                                        style="color:#000000">Tư Mã Ý</span> </a>
                                <div class="pull-right z-top-date crop-text"> 7 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1664850474/index.html" class="crop-text"> <img class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1664850474-1699007460.jpg') }}" /> <span
                                        style="color:#000000">Hư Không</span> </a>
                                <div class="pull-right z-top-date crop-text"> 7 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1664850474/index.html" class="crop-text"> <img class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1664850474-1699007460.jpg') }}" /> <span
                                        style="color:#000000">Hư Không</span> </a>
                                <div class="pull-right z-top-date crop-text"> 12 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1693499856/index.html" class="crop-text"> <img class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/101528677470816200340.jpg') }}" /> <span
                                        style="color:#000000">ngân nguyễn</span> </a>
                                <div class="pull-right z-top-date crop-text"> 13 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1682391802/index.html" class="crop-text"> <img class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1682391802-1682418512.jpg') }}" /> <span
                                        style="color:#000000">Thỏ Ngây Thơ</span> </a>
                                <div class="pull-right z-top-date crop-text"> 19 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1679972900/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1679972900-1713804941.jpg') }}" /> <span
                                        style="color:#000000">Cá Voi Xanh</span> </a>
                                <div class="pull-right z-top-date crop-text"> 21 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1683293797/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1683293797-1683319068.jpg') }}" /> <span
                                        style="color:#000000">Ken Bi</span> </a>
                                <div class="pull-right z-top-date crop-text"> 22 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1683293797/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1683293797-1683319068.jpg') }}" /> <span
                                        style="color:#000000">Ken Bi</span> </a>
                                <div class="pull-right z-top-date crop-text"> 22 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1653192109/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1653192109-1705928203.jpg') }}" /> <span
                                        style="color:#000000">Tlinh™</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1697618859/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1697618859-1706520504.jpg') }}" /> <span
                                        style="color:#000000">Cỏ!!!!</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/hienkutelove/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/hienkutelove-1726782357.jpg') }}" /> <span
                                        style="color:#000000">Jinny1340🍀</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/meoluoi/index.html" class="crop-text"> <img class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/meoluoi-1723251906.jpg') }}" /> <span
                                        style="color:#000000">Mèo
                                        Lười</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/calista/index.html" class="crop-text"> <img class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/calista-1728468131.jpg') }}" /> <span
                                        style="color:#000000">Calista</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1715850417/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1715850417-1715875789.jpg') }}" /> <span
                                        style="color:#000000">Sayang❤</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1694429257/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1694429257-1694454508.jpg') }}" /> <span
                                        style="color:#000000">Sắc Nữ Thích Ăn Thịt</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1696244420/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1696244420-1696269676.jpg') }}" /> <span
                                        style="color:#000000">♡Selinaaa♡</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1727403024/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/117210067122364971914.jpg') }}" /> <span
                                        style="color:#000000">Riya Hatun</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/20062060/index.html" class="crop-text"> <img class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/20062060-1728625943.jpg') }}" /> <span
                                        style="color:#000000">Hy Miêu</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1725938952/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1725938952-1727882102.jpg') }}" /> <span
                                        style="color:#000000">Hương Hương</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/hienkutelove/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/hienkutelove-1726782357.jpg') }}" /> <span
                                        style="color:#000000">Jinny1340🍀</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="h3">
                    <h3 class="heading"><i class="fa fa-star" aria-hidden="true"></i> Top 10</h3>
                    <div id="top">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="row" id="top">
                                    <div style="margin-top:20px"></div>
                                    <div class="ztop-item ztop-item-1"> <a href="../../author/hienkutelove/index.html">
                                            <img class="ztop-img"
                                                src="{{ asset('assets/client/img/user/hienkutelove-1726782357.jpg') }}" />
                                            <div class="ztop-label"> <img
                                                    src="{{ asset('assets/client/themes/truyenfull/echo/img/crown.png') }}">
                                            </div>
                                            <div class="ztop-label-2"> <img
                                                    src="{{ asset('assets/client/themes/truyenfull/echo/img/crown-top1.png') }}">
                                            </div>
                                            <div class="ztop-label-3"> 1 </div>
                                        </a> <strong class="ztop-name"> <a href="../../author/hienkutelove/index.html"
                                                class="crop-text-1"> Jinny1340🍀 </a> </strong> <strong
                                            class="ztop-gold crop-text"> <i class="fa fa-money" aria-hidden="true"></i>
                                            1610000 </strong> </div>
                                    <div class="ztop-item ztop-item-2"> <a href="../../author/meoluoi/index.html"> <img
                                                class="ztop-img"
                                                src="{{ asset('assets/client/img/user/meoluoi-1723251906.jpg') }}" />
                                            <div class="ztop-label-2"> <img
                                                    src="{{ asset('assets/client/themes/truyenfull/echo/img/crown-top2.png') }}">
                                            </div>
                                            <div class="ztop-label-3"> 2 </div>
                                        </a> <strong class="ztop-name"> <a href="../../author/meoluoi/index.html"
                                                class="crop-text-1"> Mèo Lười </a> </strong> <strong
                                            class="ztop-gold crop-text"> <i class="fa fa-money" aria-hidden="true"></i>
                                            1552000 </strong> </div>
                                    <div class="ztop-item ztop-item-3"> <a href="../../author/1664780508/index.html">
                                            <img class="ztop-img"
                                                src="{{ asset('assets/client/img/user/1664780508-1710849771.jpg') }}" />
                                            <div class="ztop-label-2"> <img
                                                    src="{{ asset('assets/client/themes/truyenfull/echo/img/crown-top3.png') }}">
                                            </div>
                                            <div class="ztop-label-3"> 3 </div>
                                        </a> <strong class="ztop-name"> <a href="../../author/1664780508/index.html"
                                                class="crop-text-1"> Ăn Cơm Với Bim Bim </a> </strong> <strong
                                            class="ztop-gold crop-text"> <i class="fa fa-money" aria-hidden="true"></i>
                                            1169000 </strong> </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="crop-text"> <a href="../../author/1724190823/index.html" class="ztop-flex">
                                        <div> <span class="ztop-number">4</span> <img class="ztop-img-2"
                                                src="{{ asset('assets/client/img/user/1724190823-1726851034.jpg') }}" />
                                            <strong> <span style="color:#000000">Eclipse</span> </strong>
                                        </div>
                                        <div class="pull-right ztop-gold-2"> <i class="fa fa-money"
                                                aria-hidden="true"></i> 1127000 </div>
                                    </a> </div>
                            </li>
                            <li class="list-group-item">
                                <div class="crop-text"> <a href="../../author/0866130181/index.html" class="ztop-flex">
                                        <div> <span class="ztop-number">5</span> <img class="ztop-img-2"
                                                src="{{ asset('assets/client/img/user/0866130181-1710027444.jpg') }}" />
                                            <strong> <span style="color:#000000">Mosyyy</span> </strong>
                                        </div>
                                        <div class="pull-right ztop-gold-2"> <i class="fa fa-money"
                                                aria-hidden="true"></i> 1050000 </div>
                                    </a> </div>
                            </li>
                            <li class="list-group-item">
                                <div class="crop-text"> <a href="../../author/bo-sua/index.html" class="ztop-flex">
                                        <div> <span class="ztop-number">6</span> <img class="ztop-img-2"
                                                src="{{ asset('assets/client/img/user/bo-sua-1719938254.jpg') }}" />
                                            <strong> <span style="color:#000000">Linh Vy</span> </strong>
                                        </div>
                                        <div class="pull-right ztop-gold-2"> <i class="fa fa-money"
                                                aria-hidden="true"></i> 647000 </div>
                                    </a> </div>
                            </li>
                            <li class="list-group-item">
                                <div class="crop-text"> <a href="../../author/18112021-2/index.html" class="ztop-flex">
                                        <div> <span class="ztop-number">7</span> <img class="ztop-img-2"
                                                src="{{ asset('assets/client/img/user/18112021-2-1728566143.jpg') }}" />
                                            <strong> <span style="color:#000000">Mèo Cá Mặn</span> </strong>
                                        </div>
                                        <div class="pull-right ztop-gold-2"> <i class="fa fa-money"
                                                aria-hidden="true"></i> 635000 </div>
                                    </a> </div>
                            </li>
                            <li class="list-group-item">
                                <div class="crop-text"> <a href="../../author/1699755162/index.html" class="ztop-flex">
                                        <div> <span class="ztop-number">8</span> <img class="ztop-img-2"
                                                src="{{ asset('assets/client/img/user/1699755162-1720642206.jpg') }}" />
                                            <strong> <span style="color:#000000">Sương Vũ</span> </strong>
                                        </div>
                                        <div class="pull-right ztop-gold-2"> <i class="fa fa-money"
                                                aria-hidden="true"></i> 607000 </div>
                                    </a> </div>
                            </li>
                            <li class="list-group-item">
                                <div class="crop-text"> <a href="../../author/1726452192/index.html" class="ztop-flex">
                                        <div> <span class="ztop-number">9</span> <img class="ztop-img-2"
                                                src="{{ asset('assets/client/img/user/1726452192-1726821430.jpg') }}" />
                                            <strong> <span style="color:#000000">Tư Mã Ý</span> </strong>
                                        </div>
                                        <div class="pull-right ztop-gold-2"> <i class="fa fa-money"
                                                aria-hidden="true"></i> 590000 </div>
                                    </a> </div>
                            </li>
                            <li class="list-group-item">
                                <div class="crop-text"> <a href="../../author/1711771736/index.html" class="ztop-flex">
                                        <div> <span class="ztop-number">10</span> <img class="ztop-img-2"
                                                src="{{ asset('assets/client/img/user/1711771736-1723979442.jpg') }}" />
                                            <strong> <span style="color:#000000">Adeline</span> </strong>
                                        </div>
                                        <div class="pull-right ztop-gold-2"> <i class="fa fa-money"
                                                aria-hidden="true"></i> 585000 </div>
                                    </a> </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-group review-row">
            <div class="col-xs-12 col-sm-6 col-md-8">
                <div class="h3">
                    <h3 class="heading"><i class="fa fa-star" aria-hidden="true"></i> Đánh giá</h3>
                    <div id="top">
                        <ul class="list-group row">
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1688954555/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1688954555-1722967423.jpg') }}" /> <span
                                        style="color:#000000">Limee182</span> </a>
                                <div class="pull-right z-top-date crop-text"> 15 phút trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/0866130181/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/0866130181-1710027444.jpg') }}" /> <span
                                        style="color:#000000">Mosyyy</span> </a>
                                <div class="pull-right z-top-date crop-text"> 3 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1818181868/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1726827386-1726853411.jpg') }}" /> <span
                                        style="color:#000000">Áng Mây Phiêu Bạt</span> </a>
                                <div class="pull-right z-top-date crop-text"> 5 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/hienkutelove/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/hienkutelove-1726782357.jpg') }}" /> <span
                                        style="color:#000000">Jinny1340🍀</span> </a>
                                <div class="pull-right z-top-date crop-text"> 6 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1727430565/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1727430565-1727572655.jpg') }}" /> <span
                                        style="color:#000000">Tư Mã Ý</span> </a>
                                <div class="pull-right z-top-date crop-text"> 7 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1664850474/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1664850474-1699007460.jpg') }}" /> <span
                                        style="color:#000000">Hư Không</span> </a>
                                <div class="pull-right z-top-date crop-text"> 7 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1664850474/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1664850474-1699007460.jpg') }}" /> <span
                                        style="color:#000000">Hư Không</span> </a>
                                <div class="pull-right z-top-date crop-text"> 12 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1693499856/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/101528677470816200340.jpg') }}" /> <span
                                        style="color:#000000">ngân nguyễn</span> </a>
                                <div class="pull-right z-top-date crop-text"> 13 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1682391802/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1682391802-1682418512.jpg') }}" /> <span
                                        style="color:#000000">Thỏ Ngây Thơ</span> </a>
                                <div class="pull-right z-top-date crop-text"> 19 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1679972900/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1679972900-1713804941.jpg') }}" /> <span
                                        style="color:#000000">Cá Voi Xanh</span> </a>
                                <div class="pull-right z-top-date crop-text"> 21 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1683293797/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1683293797-1683319068.jpg') }}" /> <span
                                        style="color:#000000">Ken Bi</span> </a>
                                <div class="pull-right z-top-date crop-text"> 22 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1683293797/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1683293797-1683319068.jpg') }}" /> <span
                                        style="color:#000000">Ken Bi</span> </a>
                                <div class="pull-right z-top-date crop-text"> 22 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1653192109/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1653192109-1705928203.jpg') }}" /> <span
                                        style="color:#000000">Tlinh™</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1697618859/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1697618859-1706520504.jpg') }}" /> <span
                                        style="color:#000000">Cỏ!!!!</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/hienkutelove/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/hienkutelove-1726782357.jpg') }}" /> <span
                                        style="color:#000000">Jinny1340🍀</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/meoluoi/index.html" class="crop-text"> <img class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/meoluoi-1723251906.jpg') }}" /> <span
                                        style="color:#000000">Mèo
                                        Lười</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/calista/index.html" class="crop-text"> <img class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/calista-1728468131.jpg') }}" /> <span
                                        style="color:#000000">Calista</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1715850417/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1715850417-1715875789.jpg') }}" /> <span
                                        style="color:#000000">Sayang❤</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1694429257/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1694429257-1694454508.jpg') }}" /> <span
                                        style="color:#000000">Sắc Nữ Thích Ăn Thịt</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1696244420/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1696244420-1696269676.jpg') }}" /> <span
                                        style="color:#000000">♡Selinaaa♡</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1727403024/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/117210067122364971914.jpg') }}" /> <span
                                        style="color:#000000">Riya Hatun</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/20062060/index.html" class="crop-text"> <img class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/20062060-1728625943.jpg') }}" /> <span
                                        style="color:#000000">Hy Miêu</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1725938952/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1725938952-1727882102.jpg') }}" /> <span
                                        style="color:#000000">Hương Hương</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/hienkutelove/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/hienkutelove-1726782357.jpg') }}" /> <span
                                        style="color:#000000">Jinny1340🍀</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="h3">
                    <h3 class="heading"><i class="fa fa-star" aria-hidden="true"></i> Top 10</h3>
                    <div id="top">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="row" id="top">
                                    <div style="margin-top:20px"></div>
                                    <div class="ztop-item ztop-item-1"> <a href="../../author/hienkutelove/index.html">
                                            <img class="ztop-img"
                                                src="{{ asset('assets/client/img/user/hienkutelove-1726782357.jpg') }}" />
                                            <div class="ztop-label"> <img
                                                    src="{{ asset('assets/client/themes/truyenfull/echo/img/crown.png') }}">
                                            </div>
                                            <div class="ztop-label-2"> <img
                                                    src="{{ asset('assets/client/themes/truyenfull/echo/img/crown-top1.png') }}">
                                            </div>
                                            <div class="ztop-label-3"> 1 </div>
                                        </a> <strong class="ztop-name"> <a href="../../author/hienkutelove/index.html"
                                                class="crop-text-1"> Jinny1340🍀 </a> </strong> <strong
                                            class="ztop-gold crop-text"> <i class="fa fa-money" aria-hidden="true"></i>
                                            1610000 </strong> </div>
                                    <div class="ztop-item ztop-item-2"> <a href="../../author/meoluoi/index.html"> <img
                                                class="ztop-img"
                                                src="{{ asset('assets/client/img/user/meoluoi-1723251906.jpg') }}" />
                                            <div class="ztop-label-2"> <img
                                                    src="{{ asset('assets/client/themes/truyenfull/echo/img/crown-top2.png') }}">
                                            </div>
                                            <div class="ztop-label-3"> 2 </div>
                                        </a> <strong class="ztop-name"> <a href="../../author/meoluoi/index.html"
                                                class="crop-text-1"> Mèo Lười </a> </strong> <strong
                                            class="ztop-gold crop-text"> <i class="fa fa-money" aria-hidden="true"></i>
                                            1552000 </strong> </div>
                                    <div class="ztop-item ztop-item-3"> <a href="../../author/1664780508/index.html">
                                            <img class="ztop-img"
                                                src="{{ asset('assets/client/img/user/1664780508-1710849771.jpg') }}" />
                                            <div class="ztop-label-2"> <img
                                                    src="{{ asset('assets/client/themes/truyenfull/echo/img/crown-top3.png') }}">
                                            </div>
                                            <div class="ztop-label-3"> 3 </div>
                                        </a> <strong class="ztop-name"> <a href="../../author/1664780508/index.html"
                                                class="crop-text-1"> Ăn Cơm Với Bim Bim </a> </strong> <strong
                                            class="ztop-gold crop-text"> <i class="fa fa-money" aria-hidden="true"></i>
                                            1169000 </strong> </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="crop-text"> <a href="../../author/1724190823/index.html" class="ztop-flex">
                                        <div> <span class="ztop-number">4</span> <img class="ztop-img-2"
                                                src="{{ asset('assets/client/img/user/1724190823-1726851034.jpg') }}" />
                                            <strong> <span style="color:#000000">Eclipse</span> </strong>
                                        </div>
                                        <div class="pull-right ztop-gold-2"> <i class="fa fa-money"
                                                aria-hidden="true"></i> 1127000 </div>
                                    </a> </div>
                            </li>
                            <li class="list-group-item">
                                <div class="crop-text"> <a href="../../author/0866130181/index.html" class="ztop-flex">
                                        <div> <span class="ztop-number">5</span> <img class="ztop-img-2"
                                                src="{{ asset('assets/client/img/user/0866130181-1710027444.jpg') }}" />
                                            <strong> <span style="color:#000000">Mosyyy</span> </strong>
                                        </div>
                                        <div class="pull-right ztop-gold-2"> <i class="fa fa-money"
                                                aria-hidden="true"></i> 1050000 </div>
                                    </a> </div>
                            </li>
                            <li class="list-group-item">
                                <div class="crop-text"> <a href="../../author/bo-sua/index.html" class="ztop-flex">
                                        <div> <span class="ztop-number">6</span> <img class="ztop-img-2"
                                                src="{{ asset('assets/client/img/user/bo-sua-1719938254.jpg') }}" />
                                            <strong> <span style="color:#000000">Linh Vy</span> </strong>
                                        </div>
                                        <div class="pull-right ztop-gold-2"> <i class="fa fa-money"
                                                aria-hidden="true"></i> 647000 </div>
                                    </a> </div>
                            </li>
                            <li class="list-group-item">
                                <div class="crop-text"> <a href="../../author/18112021-2/index.html" class="ztop-flex">
                                        <div> <span class="ztop-number">7</span> <img class="ztop-img-2"
                                                src="{{ asset('assets/client/img/user/18112021-2-1728566143.jpg') }}" />
                                            <strong> <span style="color:#000000">Mèo Cá Mặn</span> </strong>
                                        </div>
                                        <div class="pull-right ztop-gold-2"> <i class="fa fa-money"
                                                aria-hidden="true"></i> 635000 </div>
                                    </a> </div>
                            </li>
                            <li class="list-group-item">
                                <div class="crop-text"> <a href="../../author/1699755162/index.html" class="ztop-flex">
                                        <div> <span class="ztop-number">8</span> <img class="ztop-img-2"
                                                src="{{ asset('assets/client/img/user/1699755162-1720642206.jpg') }}" />
                                            <strong> <span style="color:#000000">Sương Vũ</span> </strong>
                                        </div>
                                        <div class="pull-right ztop-gold-2"> <i class="fa fa-money"
                                                aria-hidden="true"></i> 607000 </div>
                                    </a> </div>
                            </li>
                            <li class="list-group-item">
                                <div class="crop-text"> <a href="../../author/1726452192/index.html" class="ztop-flex">
                                        <div> <span class="ztop-number">9</span> <img class="ztop-img-2"
                                                src="{{ asset('assets/client/img/user/1726452192-1726821430.jpg') }}" />
                                            <strong> <span style="color:#000000">Tư Mã Ý</span> </strong>
                                        </div>
                                        <div class="pull-right ztop-gold-2"> <i class="fa fa-money"
                                                aria-hidden="true"></i> 590000 </div>
                                    </a> </div>
                            </li>
                            <li class="list-group-item">
                                <div class="crop-text"> <a href="../../author/1711771736/index.html" class="ztop-flex">
                                        <div> <span class="ztop-number">10</span> <img class="ztop-img-2"
                                                src="{{ asset('assets/client/img/user/1711771736-1723979442.jpg') }}" />
                                            <strong> <span style="color:#000000">Adeline</span> </strong>
                                        </div>
                                        <div class="pull-right ztop-gold-2"> <i class="fa fa-money"
                                                aria-hidden="true"></i> 585000 </div>
                                    </a> </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-group favorite-row">
            <div class="col-xs-12 col-sm-6 col-md-8">
                <div class="h3">
                    <h3 class="heading"><i class="fa fa-star" aria-hidden="true"></i> Yêu thích</h3>
                    <div id="top">
                        <ul class="list-group row">
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1688954555/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1688954555-1722967423.jpg') }}" /> <span
                                        style="color:#000000">Limee182</span> </a>
                                <div class="pull-right z-top-date crop-text"> 15 phút trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/0866130181/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/0866130181-1710027444.jpg') }}" /> <span
                                        style="color:#000000">Mosyyy</span> </a>
                                <div class="pull-right z-top-date crop-text"> 3 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1818181868/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1726827386-1726853411.jpg') }}" /> <span
                                        style="color:#000000">Áng Mây Phiêu Bạt</span> </a>
                                <div class="pull-right z-top-date crop-text"> 5 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/hienkutelove/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/hienkutelove-1726782357.jpg') }}" /> <span
                                        style="color:#000000">Jinny1340🍀</span> </a>
                                <div class="pull-right z-top-date crop-text"> 6 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1727430565/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1727430565-1727572655.jpg') }}" /> <span
                                        style="color:#000000">Tư Mã Ý</span> </a>
                                <div class="pull-right z-top-date crop-text"> 7 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1664850474/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1664850474-1699007460.jpg') }}" /> <span
                                        style="color:#000000">Hư Không</span> </a>
                                <div class="pull-right z-top-date crop-text"> 7 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1664850474/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1664850474-1699007460.jpg') }}" /> <span
                                        style="color:#000000">Hư Không</span> </a>
                                <div class="pull-right z-top-date crop-text"> 12 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1693499856/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/101528677470816200340.jpg') }}" /> <span
                                        style="color:#000000">ngân nguyễn</span> </a>
                                <div class="pull-right z-top-date crop-text"> 13 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1682391802/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1682391802-1682418512.jpg') }}" /> <span
                                        style="color:#000000">Thỏ Ngây Thơ</span> </a>
                                <div class="pull-right z-top-date crop-text"> 19 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1679972900/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1679972900-1713804941.jpg') }}" /> <span
                                        style="color:#000000">Cá Voi Xanh</span> </a>
                                <div class="pull-right z-top-date crop-text"> 21 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1683293797/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1683293797-1683319068.jpg') }}" /> <span
                                        style="color:#000000">Ken Bi</span> </a>
                                <div class="pull-right z-top-date crop-text"> 22 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1683293797/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1683293797-1683319068.jpg') }}" /> <span
                                        style="color:#000000">Ken Bi</span> </a>
                                <div class="pull-right z-top-date crop-text"> 22 giờ trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1653192109/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1653192109-1705928203.jpg') }}" /> <span
                                        style="color:#000000">Tlinh™</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1697618859/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1697618859-1706520504.jpg') }}" /> <span
                                        style="color:#000000">Cỏ!!!!</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/hienkutelove/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/hienkutelove-1726782357.jpg') }}" /> <span
                                        style="color:#000000">Jinny1340🍀</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/meoluoi/index.html" class="crop-text"> <img class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/meoluoi-1723251906.jpg') }}" /> <span
                                        style="color:#000000">Mèo
                                        Lười</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/calista/index.html" class="crop-text"> <img class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/calista-1728468131.jpg') }}" /> <span
                                        style="color:#000000">Calista</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1715850417/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1715850417-1715875789.jpg') }}" /> <span
                                        style="color:#000000">Sayang❤</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1694429257/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1694429257-1694454508.jpg') }}" /> <span
                                        style="color:#000000">Sắc Nữ Thích Ăn Thịt</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1696244420/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1696244420-1696269676.jpg') }}" /> <span
                                        style="color:#000000">♡Selinaaa♡</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1727403024/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/117210067122364971914.jpg') }}" /> <span
                                        style="color:#000000">Riya Hatun</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/20062060/index.html" class="crop-text"> <img class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/20062060-1728625943.jpg') }}" /> <span
                                        style="color:#000000">Hy Miêu</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/1725938952/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/1725938952-1727882102.jpg') }}" /> <span
                                        style="color:#000000">Hương Hương</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                            <li class="list-group-item col-xs-12 col-sm-12 col-md-6 z-top-flex"> <a
                                    href="../../author/hienkutelove/index.html" class="crop-text"> <img
                                        class="ztop-img-list"
                                        src="{{ asset('assets/client/img/user/hienkutelove-1726782357.jpg') }}" /> <span
                                        style="color:#000000">Jinny1340🍀</span> </a>
                                <div class="pull-right z-top-date crop-text"> 1 ngày trước </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="h3">
                    <h3 class="heading"><i class="fa fa-star" aria-hidden="true"></i> Top 10</h3>
                    <div id="top">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="row" id="top">
                                    <div style="margin-top:20px"></div>
                                    <div class="ztop-item ztop-item-1"> <a href="../../author/hienkutelove/index.html">
                                            <img class="ztop-img"
                                                src="{{ asset('assets/client/img/user/hienkutelove-1726782357.jpg') }}" />
                                            <div class="ztop-label"> <img
                                                    src="{{ asset('assets/client/themes/truyenfull/echo/img/crown.png') }}">
                                            </div>
                                            <div class="ztop-label-2"> <img
                                                    src="{{ asset('assets/client/themes/truyenfull/echo/img/crown-top1.png') }}">
                                            </div>
                                            <div class="ztop-label-3"> 1 </div>
                                        </a> <strong class="ztop-name"> <a href="../../author/hienkutelove/index.html"
                                                class="crop-text-1"> Jinny1340🍀 </a> </strong> <strong
                                            class="ztop-gold crop-text"> <i class="fa fa-money" aria-hidden="true"></i>
                                            1610000 </strong> </div>
                                    <div class="ztop-item ztop-item-2"> <a href="../../author/meoluoi/index.html"> <img
                                                class="ztop-img"
                                                src="{{ asset('assets/client/img/user/meoluoi-1723251906.jpg') }}" />
                                            <div class="ztop-label-2"> <img
                                                    src="{{ asset('assets/client/themes/truyenfull/echo/img/crown-top2.png') }}">
                                            </div>
                                            <div class="ztop-label-3"> 2 </div>
                                        </a> <strong class="ztop-name"> <a href="../../author/meoluoi/index.html"
                                                class="crop-text-1"> Mèo Lười </a> </strong> <strong
                                            class="ztop-gold crop-text"> <i class="fa fa-money" aria-hidden="true"></i>
                                            1552000 </strong> </div>
                                    <div class="ztop-item ztop-item-3"> <a href="../../author/1664780508/index.html">
                                            <img class="ztop-img"
                                                src="{{ asset('assets/client/img/user/1664780508-1710849771.jpg') }}" />
                                            <div class="ztop-label-2"> <img
                                                    src="{{ asset('assets/client/themes/truyenfull/echo/img/crown-top3.png') }}">
                                            </div>
                                            <div class="ztop-label-3"> 3 </div>
                                        </a> <strong class="ztop-name"> <a href="../../author/1664780508/index.html"
                                                class="crop-text-1"> Ăn Cơm Với Bim Bim </a> </strong> <strong
                                            class="ztop-gold crop-text"> <i class="fa fa-money" aria-hidden="true"></i>
                                            1169000 </strong> </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="crop-text"> <a href="../../author/1724190823/index.html" class="ztop-flex">
                                        <div> <span class="ztop-number">4</span> <img class="ztop-img-2"
                                                src="{{ asset('assets/client/img/user/1724190823-1726851034.jpg') }}" />
                                            <strong> <span style="color:#000000">Eclipse</span> </strong>
                                        </div>
                                        <div class="pull-right ztop-gold-2"> <i class="fa fa-money"
                                                aria-hidden="true"></i> 1127000 </div>
                                    </a> </div>
                            </li>
                            <li class="list-group-item">
                                <div class="crop-text"> <a href="../../author/0866130181/index.html" class="ztop-flex">
                                        <div> <span class="ztop-number">5</span> <img class="ztop-img-2"
                                                src="{{ asset('assets/client/img/user/0866130181-1710027444.jpg') }}" />
                                            <strong> <span style="color:#000000">Mosyyy</span> </strong>
                                        </div>
                                        <div class="pull-right ztop-gold-2"> <i class="fa fa-money"
                                                aria-hidden="true"></i> 1050000 </div>
                                    </a> </div>
                            </li>
                            <li class="list-group-item">
                                <div class="crop-text"> <a href="../../author/bo-sua/index.html" class="ztop-flex">
                                        <div> <span class="ztop-number">6</span> <img class="ztop-img-2"
                                                src="{{ asset('assets/client/img/user/bo-sua-1719938254.jpg') }}" />
                                            <strong> <span style="color:#000000">Linh Vy</span> </strong>
                                        </div>
                                        <div class="pull-right ztop-gold-2"> <i class="fa fa-money"
                                                aria-hidden="true"></i> 647000 </div>
                                    </a> </div>
                            </li>
                            <li class="list-group-item">
                                <div class="crop-text"> <a href="../../author/18112021-2/index.html" class="ztop-flex">
                                        <div> <span class="ztop-number">7</span> <img class="ztop-img-2"
                                                src="{{ asset('assets/client/img/user/18112021-2-1728566143.jpg') }}" />
                                            <strong> <span style="color:#000000">Mèo Cá Mặn</span> </strong>
                                        </div>
                                        <div class="pull-right ztop-gold-2"> <i class="fa fa-money"
                                                aria-hidden="true"></i> 635000 </div>
                                    </a> </div>
                            </li>
                            <li class="list-group-item">
                                <div class="crop-text"> <a href="../../author/1699755162/index.html" class="ztop-flex">
                                        <div> <span class="ztop-number">8</span> <img class="ztop-img-2"
                                                src="{{ asset('assets/client/img/user/1699755162-1720642206.jpg') }}" />
                                            <strong> <span style="color:#000000">Sương Vũ</span> </strong>
                                        </div>
                                        <div class="pull-right ztop-gold-2"> <i class="fa fa-money"
                                                aria-hidden="true"></i> 607000 </div>
                                    </a> </div>
                            </li>
                            <li class="list-group-item">
                                <div class="crop-text"> <a href="../../author/1726452192/index.html" class="ztop-flex">
                                        <div> <span class="ztop-number">9</span> <img class="ztop-img-2"
                                                src="{{ asset('assets/client/img/user/1726452192-1726821430.jpg') }}" />
                                            <strong> <span style="color:#000000">Tư Mã Ý</span> </strong>
                                        </div>
                                        <div class="pull-right ztop-gold-2"> <i class="fa fa-money"
                                                aria-hidden="true"></i> 590000 </div>
                                    </a> </div>
                            </li>
                            <li class="list-group-item">
                                <div class="crop-text"> <a href="../../author/1711771736/index.html" class="ztop-flex">
                                        <div> <span class="ztop-number">10</span> <img class="ztop-img-2"
                                                src="{{ asset('assets/client/img/user/1711771736-1723979442.jpg') }}" />
                                            <strong> <span style="color:#000000">Adeline</span> </strong>
                                        </div>
                                        <div class="pull-right ztop-gold-2"> <i class="fa fa-money"
                                                aria-hidden="true"></i> 585000 </div>
                                    </a> </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <style type="text/css">
        .ztop-img-list {
            width: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .z-top-date {
            color: gray;
            font-size: 12px;
            font-style: italic;
        }

        .z-top-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #heading_tax {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .user_avatar_parent {
            position: relative;
            width: 120px;
            height: 120px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .user_avatar_2 img {
            width: 120px;
            height: 120px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            -webkit-box-shadow: 0 10px 15px 0 rgba(0, 0, 0, .15);
            -moz-box-shadow: 0 10px 15px 0 rgba(0, 0, 0, .15);
            box-shadow: 0 10px 15px 0 rgba(0, 0, 0, .15);
            border-radius: 50%;
        }

        h1.user_nickname {
            font-family: "Oswald";
            font-size: 20px;
            text-align: center;
            margin: 12px 0px 4px 0px;
        }

        .user_login {
            text-align: center;
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .alert.alert-info {
            border-color: #1ebbf0;
        }

        #user_count {
            text-align: center;
            margin: 20px 0px;
        }

        #user_count .number {
            font-size: 16px;
            font-weight: bold;
        }

        #post_author {
            background-color: rgba(0, 0, 0, .04);
            padding: 20px 10px;
        }

        ul.theloai-thumlist {
            margin-top: unset;
        }

        #post_author .description {
            margin: 0px 20px;
            text-align: center;
        }

        #post_author .max-width {
            max-width: 220px;
            text-align: center;
            margin: auto;
        }

        @media (max-width: 768px) {
            .h3 {
                margin-top: 20px;
            }
        }

        .h3 {
            margin-bottom: 10px;
        }

        .btn-r {
            background-image: linear-gradient(135deg, #FF0000 30%, #FE9A2E 100%);
        }

        .ztop-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 4px solid #efca20;
        }

        .ztop-img-2 {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin: 0px 5px;
        }

        .ztop-name {
            text-align: center;
            margin-top: 30px;
            display: block;
            width: 100px;
        }

        .ztop-label {
            position: absolute;
            top: -60px;
            right: -5px;
            z-index: 1;
        }

        .ztop-label-2 {
            position: absolute;
            z-index: 1;
            left: 50%;
            transform: translate(-50%, 0);
        }

        .ztop-label-3 {
            position: absolute;
            z-index: 1;
            left: 50%;
            transform: translate(-50%, 0);
            padding: 5px 12px;
            color: white;
            border-radius: 50%;
            bottom: -55px;
            background-image: linear-gradient(135deg, #f0ed1e 30%, #ec7d50 100%);
        }

        .ztop-label img {
            width: 40px;
            transform: rotate(22deg);
        }

        #top {
            display: flex;
            justify-content: center;
        }

        .ztop-gold {
            text-align: center;
            display: block;
            margin: 10px 0px;
            color: #ddb80f;
        }

        .ztop-gold-2 {
            color: #ddb80f;
            font-weight: bold;
        }

        .ztop-number {
            z-index: 5;
            text-align: center;
            color: white;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #ebebeb;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            background-image: linear-gradient(135deg, #c2c2bd 30%, #6c554b 100%);
            border: 1px #c2c2bd solid;
            font-size: 12px;
            margin-right: 7px;
        }

        .ztop-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .ztop-item {
            margin: 15px 10px 0px 10px;
            text-align: center;
        }

        .ztop-item a {
            position: relative;
        }

        .ztop-item-1 {
            order: 2;
        }

        .ztop-item-2 {
            order: 1;
            margin-top: 30px;
        }

        .ztop-item-3 {
            order: 3;
            margin-top: 30px;
        }

        .ztop-item-2 .ztop-img {
            width: 90px;
            height: 90px;
            border: 4px solid #bcbbb9;
        }

        .ztop-item-3 .ztop-img {
            width: 90px;
            height: 90px;
            border: 4px solid #cc8a27;
        }

        .ztop-item-1 .ztop-label-2 img {
            width: 110px;
        }

        .ztop-item-2 .ztop-label-2 img,
        .ztop-item-3 .ztop-label-2 img {
            width: 90px;
        }

        .ztop-item-2 .ztop-label-3 {
            color: white;
            bottom: -50px;
            padding: 3px 10px;
            background-image: linear-gradient(135deg, #bcbbb9 30%, #6a7173 100%);
        }

        .ztop-item-3 .ztop-label-3 {
            color: white;
            bottom: -50px;
            padding: 3px 10px;
            background-image: linear-gradient(135deg, #cc8a27 30%, #8b5a32 100%);
        }

        @media only screen and (min-width: 768px) and (max-width: 1199px) {
            .ztop-img {
                width: 80px;
                height: 80px;
            }

            .ztop-label {
                top: -51px;
                right: -10px;
            }

            .ztop-name {
                width: 80px;
            }

            .ztop-item-2 .ztop-img,
            .ztop-item-3 .ztop-img {
                width: 70px;
                height: 70px;
            }

            .ztop-label-3 {
                bottom: -45px;
            }

            .ztop-item-2 .ztop-label-3,
            .ztop-item-3 .ztop-label-3 {
                bottom: -40px;
            }
        }

        @media only screen and (min-width: 375px) and (max-width: 413px) {
            .ztop-img {
                width: 80px;
                height: 80px;
            }

            .ztop-label {
                top: -51px;
                right: -10px;
            }

            .ztop-name {
                width: 80px;
            }

            .ztop-item-2 .ztop-img,
            .ztop-item-3 .ztop-img {
                width: 70px;
                height: 70px;
            }
        }

        @media only screen and (max-width: 375px) {
            .ztop-img {
                width: 80px;
                height: 80px;
            }

            .ztop-label {
                top: -51px;
                right: -10px;
            }

            .ztop-item {
                margin: 0px 5px;
            }

            .ztop-name {
                width: 80px;
            }

            .ztop-item-2 .ztop-img,
            .ztop-item-3 .ztop-img {
                width: 70px;
                height: 70px;
            }

            .ztop-label-3 {
                bottom: -45px;
            }

            .ztop-item-2 .ztop-label-3,
            .ztop-item-3 .ztop-label-3 {
                bottom: -40px;
            }
        }

        #top .list-group {
            width: 100%;
        }

        #title-result {
            margin-bottom: 10px;
        }

        .list-group {
            margin-bottom: 0px;
        }
    </style>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            let selectedTab = localStorage.getItem('selectedTab') || 'view';

            $('.nav-tabs-css li').removeClass('active');
            $(`.nav-tabs-css li[data-time="${selectedTab}"]`).addClass('active');
            $('.view-row, .review-row, .favorite-row').hide();
            $(`.${selectedTab}-row`).show();

            $('.nav-tabs-css li').click(function() {
                $('.nav-tabs-css li').removeClass('active');
                $(this).addClass('active');

                $('.view-row, .review-row, .favorite-row').hide();

                selectedTab = $(this).data('time');

                localStorage.setItem('selectedTab', selectedTab);

                $(`.${selectedTab}-row`).show();
            });
        });
    </script>
@endpush
