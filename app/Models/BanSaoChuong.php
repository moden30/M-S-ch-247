<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BanSaoChuong extends Model
{
    use HasFactory;
    protected $table = 'ban_sao_chuongs';
    protected $fillable = [
        'sach_id',
        'chuong_id',
        'so_phien_ban',
        'tieu_de',
        'noi_dung',
        'so_chuong',
        'ngay_len_song',
        'trang_thai',
        'kiem_duyet',
    ];

    public function sach()
    {
        return $this->belongsTo(Sach::class, 'sach_id')->withTrashed();
    }
    public function chuong()
    {
        return $this->belongsTo(Chuong::class, 'chuong_id')->withTrashed();
    }
}
