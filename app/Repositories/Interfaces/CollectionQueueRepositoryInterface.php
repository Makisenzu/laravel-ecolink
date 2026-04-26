<?php

namespace App\Repositories\Interfaces;

use App\Models\CollectionQueue;
use Illuminate\Pagination\LengthAwarePaginator;

interface CollectionQueueRepositoryInterface
{
    public function all(): LengthAwarePaginator;
    public function getCollectionQueueByScheduleId(int $scheduleId): LengthAwarePaginator;
    public function updateQueueStatus(int $id, string $status): CollectionQueue;
}
