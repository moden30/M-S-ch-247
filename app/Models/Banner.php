<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banners';

    protected $fillable = [
        'tieu_de',
        'noi_dung',
        'loai_banner',
        'trang_thai',
    ];

    public function hinhAnhBanner()
    {
        return $this->hasMany(HinhAnhBanner::class, 'banner_id');
    }
}
