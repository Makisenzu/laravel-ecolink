<?php

namespace App\Repositories\Interfaces;

use App\Models\CollectionQueue;
use Illuminate\Pagination\LengthAwarePaginator;

interface CollectionQueueRepositoryInterface
{
    public function all(): LengthAwarePaginator;
    public function getCollectionQueueByScheduleId(int $scheduleId): LengthAwarePaginator;
    public function createCollectionQueue(array $data): CollectionQueue;
    public function updateCollectionQueue(int $id, array $data): CollectionQueue;
    public function deleteCollectionQueue(int $id): bool;
}
