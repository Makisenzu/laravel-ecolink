<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
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
        'barangay_id',
        'driver_id',
        'collection_date',
        'status',
    ];

    public function barangay()
    {
        return $this->belongsTo(Barangay::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
    public function collectionQueues()
    {
        return $this->hasMany(CollectionQueue::class);
    }

    public function collectionReports()
    {
        return $this->hasMany(CollectionReport::class);
    }
}
