<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSach extends Model
{
    use HasFactory;
    protected $table = 'user_saches';
    protected $fillable = [
        'user_id',
        'sach_id',
        'chuong_id',
        'updated_at'
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
