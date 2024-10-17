
<div class="col-xs-12 col-sm-3">
    <div class="user_avatar_parent">
        <div class="user_avatar_2">
            <img id="avatar-preview"
                 src="{{ $user->hinh_anh ? Storage::url($user->hinh_anh) : asset('assets/admin/images/users/user-dummy-img.jpg') }}"
                 alt="Avatar"/>
        </div>

        <input type="file" id="upload_avatar" accept="image/*">

        <label for="upload_avatar" class="user_avatar_upload_icon">
            <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
            <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload
        </label>
    </div>


</div>
<div class="col-xs-12 col-sm-5">
    <div class="user_card_info_0">
        <span class="user_card_info">◉ Họ và tên:</span> {{ $user->ten_doc_gia }}
    </div>
    <div class="user_card_info_0">
        <span class="user_card_info crop-text">◉ Email:</span> {{ $user->email }}
    </div>
    <div class="user_card_info_0">
        <span class="user_card_info">◉ ID Thành Viên:</span> {{ $user->id }}
    </div>

</div>
<div class="col-xs-12 col-sm-4">
    <div class="user_card_info_0">
        <span class="user_card_info">◉ Số điện thoại:</span> {{ $user->so_dien_thoai }}
    </div>
    <div class="user_card_info_0">
        <span class="user_card_info">◉ Ngày sinh:</span>
        {{ \Carbon\Carbon::parse($user->sinh_nhat)->format('d/m/Y') }}
    </div>
    <div class="user_card_info_0">
        <span class="user_card_info">◉ Giới tính:</span> {{ $user->gioi_tinh }}
    </div>
    <div class="user_card_info_0">
                                          <span class="user_card_info"><i class="fa fa-money" aria-hidden="true"></i> Số
                                              dư:</span> {{ number_format($user->so_du, 0, ',', '.') }} VNĐ
    </div>
</div>
<div class="col-xs-12 col-sm-3"></div>

</div>

<div class="col-xs-12 col-sm-9">
    <em><a href="/q-a/" class="link-color"><i class="fa fa-blind hidden-xs"
                                              aria-hidden="true"></i> Những câu hỏi
            thường gặp</a></em>
</div>








