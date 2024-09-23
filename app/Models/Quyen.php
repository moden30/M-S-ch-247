<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quyen extends Model
{
    use HasFactory;

   protected $table = 'quyens';
   protected $fillable = [
        'ten_quyen', 
        'mo_ta', 
        'trang_thai',
    ];
    // Mối quan hệ nhiều-nhiều giữa Quyen và VaiTro
    public function vaiTros()
    {
        return $this->belongsToMany(VaiTro::class, 'quyen_vai_tros', 'quyen_id', 'vai_tro_id');
    }
   

    
}
