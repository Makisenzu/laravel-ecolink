<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Geographic extends Model
{
    protected $fillable = [
        'province_id',
        'geographic_name'
    ];

    protected function province() {
        return $this->belongsTo(Province::class);
    }
}
