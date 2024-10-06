<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaiTro extends Model
{
    use HasFactory;

    protected $table = 'vai_tros';
    protected $fillable = [
        'ten_vai_tro',
        'mo_ta',
        'trang_thai',
    ];

    // Mối quan hệ nhiều-nhiều giữa VaiTro và Quyen
    public function quyens()
    {
        return $this->belongsToMany(Quyen::class, 'quyen_vai_tros', 'vai_tro_id', 'quyen_id');
    }

    const TRANG_THAI = [
        'an' => 'Ẩn',
        'hien' => 'Hiện',
    ];
    public function getTrangThaiTextAttribute()
    {
        return self::TRANG_THAI[$this->trang_thai];
    }

}
