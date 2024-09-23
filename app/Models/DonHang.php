<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;

    protected $table = 'don_hangs';

    protected $fillable = [
        'sach_id',
        'user_id',
        'phuong_thuc_thanh_toan_id',
        'so_tien_thanh_toan',
        'trang_thai',
        'mo_ta'
    ];  

    public function sach(){
        return $this->belongsTo(Sach::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function phuongThucThanhToan(){
        return $this->belongsTo(PhuongThucThanhToan::class);
    }
}
