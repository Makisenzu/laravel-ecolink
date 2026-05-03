<?php

namespace App\Services;

use App\Repositories\Interfaces\DriverRepositoryInterface;

class DriverService
{
    protected $driverRepository;

    public function __construct(DriverRepositoryInterface $driverRepository)
    {
        $this->driverRepository = $driverRepository;
    }

    public function addNewDriver(array $data)
    {
        return $this->driverRepository->createDriver($data);
    }

    public function getAllDrivers()
    {
        return $this->driverRepository->getAllDrivers();
    }

    public function getDriversByStatus(string $status)
    {
        return $this->driverRepository->getDriversByStatus($status);
    }

    public function getDriverById(int $id)
    {
        return $this->driverRepository->findDriverById($id);
    }

    public function updateDriver(int $id, array $data)
    {
        return $this->driverRepository->updateDriver($id, $data);
    }

    public function deleteDriver(int $id)
    {
        return $this->driverRepository->deleteDriver($id);
    }
}