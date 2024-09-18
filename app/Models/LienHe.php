<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LienHe extends Model
{
    use HasFactory;
    protected $table = "lien_hes";
    // Trạng thái
    const TRANG_THAI = [
        'mo' => 'Chưa hỗ trợ',
        'dang_ho_tro' => 'Đang hỗ trợ',
        'dong' => 'Đã hỗ trợ'
    ];

    // Quan hệ "belongsTo" giữa Liên hệ và Tài khoản (một liên hệ thuộc về một tài khoản)
    public function taiKhoan(){
        return $this->belongsTo(User::class, 'user_id');
    }

    //Hiển thị tất cả các liên hệ
    public function allLienHe(){
        return LienHe::with('taiKhoan')->get();
    }
    
    //Xem chi tiết liên hệ
    public function chiTiet($id){
        return LienHe::with('taikhoan')->find($id);
    }
}
