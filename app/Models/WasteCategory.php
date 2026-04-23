<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WasteCategory extends Model
{
    protected $fillable = [
        'category_name'
    ];
    
    public function collectionReports()
    {
        return $this->hasMany(CollectionReport::class);
    }

    public function wasteItems()
    {
        return $this->hasMany(WasteItem::class);
    }
}
