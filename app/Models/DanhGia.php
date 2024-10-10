<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    use HasFactory;

    protected $table = 'danh_gias';

    protected $fillable = [
        'sach_id',
        'user_id',
        'noi_dung',
        'ngay_danh_gia',
        'muc_do_hai_long',
        'trang_thai',
    ];

    public function sach()
    {
        return $this->belongsTo(Sach::class, 'sach_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
