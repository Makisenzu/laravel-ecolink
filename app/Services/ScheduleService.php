<?php

namespace App\Services;

use App\Repositories\Interfaces\ScheduleRepositoryInterface;

class ScheduleService
{
    protected $scheduleRepository;

    public function __construct(ScheduleRepositoryInterface $scheduleRepository)
    {
        $this->scheduleRepository = $scheduleRepository;
    }

    public function getAllSchedules()
    {
        return $this->scheduleRepository->all();
    }

    public function getSchedulesByStatus(string $status)
    {
        return $this->scheduleRepository->getScheduleByStatus($status);
    }

    public function getSchedulesByBarangayId(int $barangayId)
    {
        return $this->scheduleRepository->findSchedulesByBarangayId($barangayId);
    }

    public function getScheduleById(int $id)
    {
        return $this->scheduleRepository->findScheduleById($id);
    }

    public function createSchedule(array $data)
    {
        return $this->scheduleRepository->createSchedule($data);
    }

    public function updateSchedule(int $id, array $data)
    {
        return $this->scheduleRepository->updateSchedule($id, $data);
    }

    public function deleteSchedule(int $id)
    {
        return $this->scheduleRepository->deleteSchedule($id);
    }
}