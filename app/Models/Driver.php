<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'user_id',
        'licence_number',
        'status',
        'employment_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
