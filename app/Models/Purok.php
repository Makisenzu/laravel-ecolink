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

    public function sites()
    {
        return $this->hasMany(Site::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
