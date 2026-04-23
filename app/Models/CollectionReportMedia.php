<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CollectionReportMedia extends Model
{
    protected $fillable = [
        'collection_report_id',
        'filename',
        'path',
        'mime_type',
        'size',
        'alt_text',
        'description'
    ];

    public function collectionReport()
    {
        return $this->belongsTo(CollectionReport::class);
    }
}
