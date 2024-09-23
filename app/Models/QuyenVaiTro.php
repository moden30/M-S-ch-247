<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuyenVaiTro extends Model
{
    use HasFactory;

    protected $table = 'quyen_vai_tros';  

    public function quyen()
    {
        return $this->belongsTo(Quyen::class, 'quyen_id');
    }

    public function vaiTro()
    {
        return $this->belongsTo(VaiTro::class, 'vai_tro_id');
    }
}
