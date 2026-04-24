<?php

namespace App\Repositories\Eloquent;

use App\Models\Driver;
use App\Repositories\Interfaces\DriverRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class DriverRepository implements DriverRepositoryInterface
{
   public function getAllDrivers(): LengthAwarePaginator
   {
       return Driver::paginate(10);
   }

   public function getDriversByStatus(string $status): LengthAwarePaginator
   {
       return Driver::where('status', $status)->paginate(10);
   }

    public function findDriverById(int $id): ?Driver
    {
         $driver = Driver::find($id);
         if(!$driver) {
             return null;
         }
         return $driver;
    }

    public function createDriver(array $data): Driver
    {
        return Driver::create($data);
    }

    public function updateDriverStatus(int $id, array $data): ?Driver
    {
        $driver = Driver::find($id);
        if ($driver) {
            $driver->update($data);
            return $driver;
        }
        return null;
    }

    public function deleteDriver(int $id): bool
    {
        $driver = Driver::find($id);
        if ($driver) {
            return $driver->delete();
        }
        return false;
    }
}