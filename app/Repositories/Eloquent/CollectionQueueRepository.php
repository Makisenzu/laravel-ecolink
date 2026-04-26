<?php

namespace App\Repositories\Eloquent;

use App\Models\CollectionQueue;
use App\Repositories\Interfaces\CollectionQueueRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class CollectionQueueRepository implements CollectionQueueRepositoryInterface
{
    public function all(): LengthAwarePaginator
    {
        return CollectionQueue::with(['site.purok', 'schedule.barangay'])
            ->orderBy('queue_order')
            ->paginate(10);
    }

    public function getCollectionQueueByScheduleId(int $scheduleId): LengthAwarePaginator
    {
        return CollectionQueue::with(['site.purok', 'schedule.barangay'])
            ->where('schedule_id', $scheduleId)
            ->orderBy('queue_order')
            ->paginate(10);
    }

    public function createCollectionQueue(array $data): CollectionQueue
    {
        return CollectionQueue::create($data);
    }

    public function updateCollectionQueue(int $id, array $data): CollectionQueue
    {
        $collectionQueue = CollectionQueue::findOrFail($id);
        $collectionQueue->update($data);
        return $collectionQueue;
    }

    public function deleteCollectionQueue(int $id): bool
    {
        $collectionQueue = CollectionQueue::findOrFail($id);
        return $collectionQueue->delete();
    }
}