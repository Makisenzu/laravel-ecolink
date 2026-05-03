<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class CollectionQueue extends Model
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
        'schedule_id',
        'site_id',
        'queue_order',
        'status',
        'collected_at',
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
