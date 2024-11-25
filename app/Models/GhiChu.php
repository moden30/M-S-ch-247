<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GhiChu extends Model
{
    use HasFactory;

    protected $table = 'ghi_chus';
    protected $fillable = [
        'user_id',
        'chuong_id',
        'ghi_chu',
        'vi_tri',
        'tieu_de',
        'mau_sac',
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function chuong() {
        return $this->belongsTo(Chuong::class);
    }
}
