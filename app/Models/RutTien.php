<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RutTien extends Model
{
    use HasFactory;

    protected $fillable = [
        'cong_tac_vien_id',
        'ma_yeu_cau',
        'so_tien',
        'trang_thai',
        'ten_ngan_hang',
        'so_tai_khoan',
        'ten_chu_tai_khoan',
        'anh_qr',
        'ghi_chu',
    ];

    const TRANG_THAI = [
        'da_huy' => 'Đã Hủy',
        'da_duyet' => 'Đã Duyệt',
        'dang_xu_ly' => 'Đang Xử Lý'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'cong_tac_vien_id');
    }
}
