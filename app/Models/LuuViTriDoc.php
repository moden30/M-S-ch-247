<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuuViTriDoc extends Model
{
    use HasFactory;
    protected $table = 'luu_vi_tri_docs';
    protected $fillable = [
        'user_id',
        'sach_id',
        'chuong_id',
        'position',
        'highlight_text'
    ];

    public function sach()
    {
        return $this->belongsTo(Sach::class, 'sach_id');
    }

    public function chuong()
    {
        return $this->belongsTo(Chuong::class, 'chuong_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
