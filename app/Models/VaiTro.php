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
}
