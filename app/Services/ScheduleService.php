<?php

namespace App\Services;

use App\Models\CollectionQueue;
use App\Models\Site;
use App\Repositories\Interfaces\ScheduleRepositoryInterface;
use Illuminate\Support\Facades\DB;

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

    public function getSchedulesByDriverId(int $driverId)
    {
        return $this->scheduleRepository->findScheduleByDriverId($driverId);
    }

    public function getScheduleById(int $id)
    {
        return $this->scheduleRepository->findScheduleById($id);
    }

    public function createSchedule(array $data)
    {
        return DB::transaction(function () use ($data) {
            $schedule = $this->scheduleRepository->createSchedule($data);

            $sites = Site::where('status', 'active')
                ->whereHas('purok', function ($query) use ($schedule) {
                    $query->where('barangay_id', $schedule->barangay_id);
                })
                ->orderBy('id')
                ->get(['id']);

            if ($sites->isNotEmpty()) {
                $queueRows = [];

                foreach ($sites as $site) {
                    $queueRows[] = [
                        'schedule_id' => $schedule->id,
                        'site_id' => $site->id,
                        'status' => 'pending',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }

                CollectionQueue::insert($queueRows);
            }

            return $schedule;
        });
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