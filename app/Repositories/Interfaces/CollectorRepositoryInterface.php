<?php

namespace App\Repositories\Interfaces;

use Illuminate\Pagination\LengthAwarePaginator;

interface CollectorRepositoryInterface
{
    public function getDriverSchedule(int $driverID): LengthAwarePaginator;
    public function updateCollectionStatus(int $driverID, string $status): bool;
    public function getScheduleByStatus(string $status): LengthAwarePaginator;
}
