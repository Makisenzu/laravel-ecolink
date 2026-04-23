<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RedemptionHistory extends Model
{
    protected $fillable = [
        'resident_id',
        'redeemable_id',
        'redeemed_quantity',
        'points_spent',
        'status'
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }

    public function redeemable()
    {
        return $this->belongsTo(Redeemable::class);
    }
}
