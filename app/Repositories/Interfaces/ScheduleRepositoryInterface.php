<?php

namespace App\Repositories\Interfaces;

use App\Models\Schedule;
use Illuminate\Pagination\LengthAwarePaginator;

interface ScheduleRepositoryInterface
{
    public function all(): LengthAwarePaginator;
    public function getScheduleByStatus(string $status): LengthAwarePaginator;
    public function findSchedulesByBarangayId(int $barangayId): LengthAwarePaginator;
    public function findScheduleById(int $id): ?Schedule;
    public function createSchedule(array $data): Schedule;
    public function updateSchedule(int $id, array $data): ?Schedule;
    public function deleteSchedule(int $id): bool;
}
