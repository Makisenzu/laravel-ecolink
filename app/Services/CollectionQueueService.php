<?php

namespace App\Services;

use App\Repositories\Interfaces\CollectionQueueRepositoryInterface;

class CollectionQueueService
{
    protected $collectionQueueRepository;
    public function __construct(CollectionQueueRepositoryInterface $collectionQueueRepository)
    {
        $this->collectionQueueRepository = $collectionQueueRepository;
    }

    public function getAllCollectionQueues()
    {
        return $this->collectionQueueRepository->all();
    }

    public function getCollectionQueueByScheduleId(int $scheduleId)
    {
        return $this->collectionQueueRepository->getCollectionQueueByScheduleId($scheduleId);
    }

    public function updateCollectionQueueStatus(int $id, string $status)
    {
        return $this->collectionQueueRepository->updateQueueStatus($id, $status);
    }
}