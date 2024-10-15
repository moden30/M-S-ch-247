<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichSuDangNhap extends Model
{
    use HasFactory;

    protected $table = 'lich_su_dang_nhaps';
    protected $fillable = [
        'tai_khoan_id',
        'ten_thiet_bi',
        'dia_chi_ip',
        'trinh_duyet',
        'he_dieu_hanh',
        'login_time',
        'logout_time',
        'dia_diem',
        'is_active'
    ];

    public function tai_khoan(){
        return $this->belongsTo(User::class, 'tai_khoan_id');
    }
}
