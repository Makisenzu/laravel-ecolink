<?php

namespace App\Repositories\Interfaces;

use App\Models\Driver;
use Illuminate\Pagination\LengthAwarePaginator;

interface DriverRepositoryInterface
{
    public function getAllDrivers(): LengthAwarePaginator;
    public function getDriversByStatus(string $status): LengthAwarePaginator;
    public function findDriverById(int $id): ?Driver;
    public function createDriver(array $data): Driver;
    public function updateDriverStatus(int $id, array $data): ?Driver;
    public function deleteDriver(int $id): bool;
}
