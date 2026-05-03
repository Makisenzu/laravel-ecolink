<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
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
        'resident_id',
        'purok_id',
        'review_category_id',
        'fullname',
        'content',
        'suggestion',
        'rating',
        'status',
        'is_anonymous',
        'moderation_flag',
        'moderation_score'
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }

    public function purok()
    {
        return $this->belongsTo(Purok::class);
    }

    public function reviewCategory()
    {
        return $this->belongsTo(ReviewCategory::class);
    }
}
