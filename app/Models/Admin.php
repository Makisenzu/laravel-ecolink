<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'user_id',
        'access_level',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exchangeLogs()
    {
        return $this->hasMany(ExchangeLog::class);
    }
}
