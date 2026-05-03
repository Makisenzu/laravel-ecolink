<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{

    use HasUlids;

    public function uniqueIds(): array
    {
        return ['ulid'];
    }

    public function getRouteKeyName(): string
    {
        return 'ulid';
    }
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

    public function collectionQueues()
    {
        return $this->hasMany(CollectionQueue::class);
    }
}
