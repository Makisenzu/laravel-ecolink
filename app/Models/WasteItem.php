<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WasteItem extends Model
{
    protected $fillable = [
        'waste_category_id',
        'item_name',
        'points_per_unit',
        'status',
    ];

    public function wasteCategory()
    {
        return $this->belongsTo(WasteCategory::class);
    }
}
