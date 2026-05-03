<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\UpdateCollectionQueueRequest;
use App\Http\Resources\CollectionQueueResource;
use App\Models\CollectionQueue;
use App\Models\Schedule;
use App\Services\CollectionQueueService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class CollectionQueueController extends Controller
{
    use ApiResponse;

    public function __construct
    (
        protected CollectionQueueService $queueService
    )
    {}

    public function index()
    {
        $queues = $this->queueService->getAllCollectionQueues();

        return $this->success(CollectionQueueResource::collection($queues)->response()->getData(true));
    }

    public function showByScheduleId(Request $request, Schedule $schedule)
    {
        $queues = $this->queueService->getCollectionQueueByScheduleId($schedule->id);
        if ($queues->isEmpty()) {
            return $this->notFound('No collection queues found for the specified schedule ID');
        }

        return $this->success(CollectionQueueResource::collection($queues)->response()->getData(true));
    }

    public function updateStatus(UpdateCollectionQueueRequest $request, CollectionQueue $collectionQueue)
    {
        $queue = $this->queueService->updateCollectionQueueStatus($collectionQueue->id, $request->input('status'));

        if (! $queue) {
            return $this->notFound('Collection queue not found');
        }

        return $this->success(new CollectionQueueResource($queue), 'Collection queue status updated successfully');
    }
}
