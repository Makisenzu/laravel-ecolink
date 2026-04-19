<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purok extends Model
{
    protected $fillable = [
        'barangay_id',
        'purok_name'
    ];

    protected function barangay() {
        return $this->belongsTo(Barangay::class);
    }
}
