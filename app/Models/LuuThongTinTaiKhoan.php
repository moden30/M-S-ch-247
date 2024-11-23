<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuuThongTinTaiKhoan extends Model
{
    use HasFactory;
    protected $table = 'luu_thong_tin_tai_khoan';
    protected $fillable = [
        'user_id',
        'ten_ngan_hang',
        'so_tai_khoan',
        'ten_chu_tai_khoan',
        'anh_qr',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
