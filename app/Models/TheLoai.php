<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    use HasFactory;
    protected $table= 'the_loais';
    protected $fillable = [
        'ten_the_loai',
        'anh_the_loai',
        'mo_ta',
        'trang_thai',
        'created_at',
        'updated_at'
    ];

    const TRANG_THAI = [
        'an' => 'Ẩn',
        'hien' => 'Hiện',
    ];

    public function getTrangThaiTextAttribute()
    {
        return self::TRANG_THAI[$this->trang_thai];
    }

    public function allTheLoai()
    {
        return TheLoai::all();
    }
    public function saches()
    {
        return $this->hasMany(Sach::class, 'the_loai_id')->withTrashed();
    }
}
