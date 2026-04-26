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

    public function updateQueueStatus(int $id, string $status): CollectionQueue
    {
        $collectionQueue = CollectionQueue::findOrFail($id);
        $collectionQueue->update(['status' => $status]);
        return $collectionQueue;
    }

}