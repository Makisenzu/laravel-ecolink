<?php

namespace App\Repositories\Eloquent;

use App\Models\Schedule;
use App\Repositories\Interfaces\ScheduleRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class ScheduleRepository implements ScheduleRepositoryInterface
{
    public function all(): LengthAwarePaginator
    {
        return Schedule::paginate(10);
    }

    public function getScheduleByStatus(string $status): LengthAwarePaginator
    {
        return Schedule::where('status', $status)->paginate(10);
    }

    public function findSchedulesByBarangayId(int $barangayId): LengthAwarePaginator
    {
        return Schedule::where('barangay_id', $barangayId)->paginate(10);
    }

    public function findScheduleById(int $id): ?Schedule
    {
        $schedule = Schedule::find($id);
        if (!$schedule) {
            return null;
        }
        return $schedule;
    }

    public function findScheduleByDriverId(int $driverId): LengthAwarePaginator
    {
        return Schedule::where('driver_id', $driverId)->paginate(10);
    }

    public function createSchedule(array $data): Schedule
    {
        return Schedule::create($data);
    }

    public function updateSchedule(int $id, array $data): ?Schedule
    {
        $schedule = Schedule::find($id);
        if ($schedule) {
            $schedule->update($data);
            return $schedule;
        }
        return null;
    }

    public function deleteSchedule(int $id): bool
    {
        $schedule = Schedule::find($id);
        if ($schedule) {
            return $schedule->delete();
        }
        return false;
    }
}