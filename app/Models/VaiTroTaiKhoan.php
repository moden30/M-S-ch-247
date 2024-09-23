<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaiTroTaiKhoan extends Model
{
    use HasFactory;
    protected $table = 'vai_tro_tai_khoans';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vaiTro()
    {
        return $this->belongsTo(VaiTro::class);
    }
}
