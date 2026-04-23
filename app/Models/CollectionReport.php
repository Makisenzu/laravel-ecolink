<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CollectionReport extends Model
{
    protected $fillable = [
        'schedule_id',
        'waste_category_id',
        'kilogram_collected'
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function wasteCategory()
    {
        return $this->belongsTo(WasteCategory::class);
    }
}
