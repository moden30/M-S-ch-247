<div id="notificationModal"
     style="display: none; position: absolute; top: 0; width: 430px; height: 500px; padding: 20px; background-color: rgba(0,0,0,0.8); color: white; box-sizing: border-box; border-radius: 8px; z-index: 2000; overflow-y: auto;">
    <div class="modal-header" style="position: sticky; top: 0;  z-index: 1; padding: 0;">
        <div class="d-flex justify-content-between mb-5">
            <h3>Thông Báo ({{$countThongBaos}})</h3>
            <button type="submit" class="btn btn-primary">Đánh dấu đã đọc</button>
        </div>
    </div>
    <div class="modal-body">
        <div class="notification-item">
            @foreach($thongBaos as $item)
                <a href="{{route('chi-tiet-thong-bao', $item->id)}}" style="color: white; padding: 10px 0" class="d-flex mb-4">
                    <div class="col-md-2 d-flex justify-content-center">
                        <i class="fa fa-bell-o" aria-hidden="true" style="font-size: 30px;"></i>
                    </div>
                    <div class="col-md-10">
                        <div class="d-flex justify-content-between">
                            <span>{{$item->created_at->diffForHumans()}}</span>
                            <span>{{($item->trang_thai == 'da_xem') ? 'Đã đọc' : "Chưa đọc"}}</span>
                        </div>
                        <div>
                            <h4 style="font-size: 18px">{{$item->tieu_de}}</h4>
                        </div>
                        <div>
                            <p>{{$item->noi_dung}}</p>
                        </div>
                    </div>
                </a>
            @endforeach
            <div class="text-center">Hết</div>
        </div>
    </div>
</div>
