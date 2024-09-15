<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'bai_viet_id', 
        'noi_dung', 
        'ngay_binh_luan'];
    
}
