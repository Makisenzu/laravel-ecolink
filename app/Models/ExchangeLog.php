<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExchangeLog extends Model
{
    protected $fillable = [
        'resident_id',
        'waste_item_id',
        'admin_id',
        'quantity',
        'points_earned'
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }

    public function wasteItem()
    {
        return $this->belongsTo(WasteItem::class, 'waste_item_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
