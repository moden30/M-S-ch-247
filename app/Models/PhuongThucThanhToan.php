<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhuongThucThanhToan extends Model
{
    use HasFactory;
    protected $table = 'phuong_thuc_thanh_toans';
    const MOMO_METHOD = 1;
    const VNPAY_METHOD = 2;

    protected $fillable = [
        'ten_phuong_thuc',
        'mo_ta',
        'trang_thai',
    ];
}
