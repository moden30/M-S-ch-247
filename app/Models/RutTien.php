<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RutTien extends Model
{
    use HasFactory;


    protected $fillable = [
        'cong_tac_vien_id',
        'so_tien',
        'trang_thai',
        'ngay_yeu_cau',
        'ngay_xu_ly',
        'ghi_chu'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'cong_tac_vien_id');
    }
}
