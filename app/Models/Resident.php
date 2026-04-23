<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    protected $fillable = [
        'user_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function redemptionHistories()
    {
        return $this->hasMany(RedemptionHistory::class);
    }

    public function exchangeLogs()
    {
        return $this->hasMany(ExchangeLog::class);
    }
}
