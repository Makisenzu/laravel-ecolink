<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Redeemable extends Model
{
    protected $fillable = [
        'redeemable_category_id',
        'item_name',
        'description',
        'points_required',
        'stock',
        'status'
    ];

    public function redeemableCategory()
    {
        return $this->belongsTo(RedeemableCategory::class);
    }
}
