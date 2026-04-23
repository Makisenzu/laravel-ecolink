<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RedeemableCategory extends Model
{
    protected $fillable = [
        'category_name'
    ];
    
    public function redeemableItems()
    {
        return $this->hasMany(Redeemable::class);
    }
}
