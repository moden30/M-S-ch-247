<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chuong extends Model
{
    use HasFactory;

    protected $table = 'chuongs';

    protected $fillable = [
        'sach_id',
        'tieu_de',
        'noi_dung',
        'so_chuong',
        'ngay_len_song',
        'trang_thai',
        'kiem_duyet',
        'loai_sua'
    ];

    public function sach()
    {
        return $this->belongsTo(Sach::class, 'sach_id');
    }



    const NOI_DUNG_NGUOI_LON = [
        'co' => 'Có',
        'khong' => 'Không',
    ];

    const CO = 'co';
    const KHONG = 'khong';
}
