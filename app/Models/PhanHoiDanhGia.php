<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhanHoiDanhGia extends Model
{
    use HasFactory;

    protected $fillable = [
        'danh_gia_id',
        'user_id',
        'noi_dung_phan_hoi',
    ];

    public function danhGia()
    {
        return $this->belongsTo(DanhGia::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
