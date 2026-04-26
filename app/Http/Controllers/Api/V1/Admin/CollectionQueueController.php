<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\UpdateCollectionQueueRequest;
use App\Http\Resources\CollectionQueueResource;
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

    public function showByScheduleId(Request $request, int $scheduleId)
    {
        $queues = $this->queueService->getCollectionQueueByScheduleId($scheduleId);
        if ($queues->isEmpty()) {
            return $this->notFound('No collection queues found for the specified schedule ID');
        }

        return $this->success(CollectionQueueResource::collection($queues)->response()->getData(true));
    }

    public function updateStatus(UpdateCollectionQueueRequest $request, int $id)
    {
        $queue = $this->queueService->updateCollectionQueueStatus($id, $request->input('status'));

        if (! $queue) {
            return $this->notFound('Collection queue not found');
        }

        return $this->success(new CollectionQueueResource($queue), 'Collection queue status updated successfully');
    }
}
