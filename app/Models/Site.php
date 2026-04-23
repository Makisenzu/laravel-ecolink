<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = [
        'purok_id',
        'site_name',
        'latitude',
        'longitude',
        'location_type',
        'status',
    ];

    public function purok()
    {
        return $this->belongsTo(Purok::class);
    }
}
