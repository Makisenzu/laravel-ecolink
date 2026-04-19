<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    protected $fillable = [
        'geographic_id',
        'barangay_name'
    ];

    protected function geographic() {
        return $this->belongsTo(Geographic::class);
    }
    
    public function puroks() {
        return $this->hasMany(Purok::class);
    }
}
