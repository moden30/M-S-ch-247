<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quyen extends Model
{
    use HasFactory;

    protected $table = 'quyens';
    protected $fillable = [
        'ten_quyen',
        'mo_ta',
        'trang_thai',
    ];

    // Mối quan hệ nhiều-nhiều giữa Quyen và VaiTro
    public function vaiTros()
    {
        return $this->belongsToMany(VaiTro::class, 'quyen_vai_tros', 'quyen_id', 'vai_tro_id');
    }

    public static function groupedPermissions()
    {
        return [
            'Quản lý vai trò' => [
                'roles-index' => 'Xem danh sách vai trò',
                'roles-store' => 'Thêm vai trò',
                'roles-update' => 'Sửa vai trò',
                'roles-destroy' => 'Xóa vai trò',
            ],
            'Quản lý banner' => [
                'banner-index' => 'Xem danh sách banner',
                'banner-store' => 'Thêm banner',
                'banner-update' => 'Sửa banner',
                'banner-destroy' => 'Xóa banner',
            ],
            'Quản lý người dùng' => [
                'users-index' => 'Xem danh sách người dùng',
                'users-store' => 'Thêm người dùng',
                'users-update' => 'Sửa người dùng',
                'users-destroy' => 'Xóa người dùng',
            ],
            'Quản lý sách' => [
                'sach-index' => 'Xem danh sách sách',
                'sach-store' => 'Thêm sách',
                'sach-update' => 'Sửa sách',
                'sach-destroy' => 'Xóa sách',
                'sach-anHien' => 'Ẩn/Hiện sách',
                'sach-capNhat' => 'Cập nhật sách',
                'sach-kiemDuyet' => 'Kiểm duyệt sách',
            ],
            'Quản lý thể loại' => [
                'the-loai-index' => 'Xem danh sách thể loại',
                'the-loai-store' => 'Thêm thể loại',
                'the-loai-update' => 'Sửa thể loại',
                'the-loai-destroy' => 'Xóa thể loại',
                'the-loai-capNhatTrangThai' => 'Ẩn/Hiện thể loại',
            ],
            'Quản lý chương sách' => [
                'chuong-create' => 'Thêm chương sách',
                'chuong-update' => 'Sửa chương sách',
                'chuong-destroy' => 'Xóa chương sách',
                'chuong-show' => 'Xem chi tiết chương sách',
            ],
            'Quản lý bài viết' => [
                'bai-viet-index' => 'Xem danh sách bài viết',
                'bai-viet-store' => 'Thêm bài viết',
                'bai-viet-update' => 'Sửa bài viết',
                'bai-viet-destroy' => 'Xóa bài viết',
                'bai-viet-capNhatTrangThai' => 'Ẩn/Hiện bài viết',
            ],
            'Quản lý chuyên mục bài viết' => [
                'chuyen-muc-index' => 'Xem danh sách chuyên mục',
                'chuyen-muc-store' => 'Thêm chuyên mục',
                'chuyen-muc-update' => 'Sửa chuyên mục',
                'chuyen-muc-destroy' => 'Xóa chuyên mục',
                'chuyen-muc-capNhatTrangThai' => 'Ẩn/Hiện chuyên mục',
            ],
            'Quản lý liên hệ' => [
                'lien-he-index' => 'Xem danh sách liên hệ',
                'lien-he-updateStatus' => 'Cập nhật trạng thái liên hệ',
                'lien-he-phanHoiForm' => 'Gửi email phản hồi liên hệ',
            ],
            'Quản lý đơn hàng' => [
                'don-hang-index' => 'Xem danh sách đơn hàng',
                'don-hang-detail' => 'Xem chi tiết đơn hàng',
            ],
            'Quản lý bình luận' => [
                'binh-luan-index' => 'Xem danh sách bình luận',
                'binh-luan-detail' => 'Xem chi tiết bình luận',
                'binh-luan-updateStatus' => 'Cập nhật trạng thái bình luận',
            ],
            'Quản lý đánh giá' => [
                'danh-gia-index' => 'Xem danh sách đánh giá',
                'danh-gia-detail' => 'Xem chi tiết đánh giá',
            ],
            'Quản lý thống kê' => [
                'thong-ke-loi-nhuan' => 'Xem thống kê lợi nhuận',
                'thong-ke-chung' => 'Xem thống kê chung',
                'cong-tac-vien' => 'Xem thống kê cộng tác viên',
                'thong-ke-doanh-thu' => 'Xem thống kê doanh thu',
                'thong-ke-don-hang' => 'Xem thống kê đơn hàng',
                'thong-ke-danh-gia' => 'Xem thống kê dánh giá',
            ],

            'Thống kê dành cho cộng tác viên' => [
                'thong-ke-chung-cong-tac-vien' => 'Thống kê',
            ],
            'Chức năng rút tiền' => [
                'rut-tien' => 'Rút tiền',
            ],
            'Quản lý yêu cầu rút tiền' => [
                'yeu-cau-rut-tien' => 'Danh sách yêu cầu rút tiền',
            ],
            'Quản lý kiểm duyệt cộng tác viên' => [
                'kiem-duyet-cong-tac-vien' => 'Danh sách',
            ],
        ];
    }



}
