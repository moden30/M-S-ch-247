<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContributorCommissionEarning extends Model
{
    use HasFactory;

    protected $table = 'contributor_commission_earnings';
    protected $fillable = [
        'user_id',
        'id_don_hang',
        'commission_amount',
        'commission_rate',
        'admin_earnings'
    ];
}
