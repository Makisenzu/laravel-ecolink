<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreDriverRequest;
use App\Http\Requests\Api\V1\UpdateDriverRequest;
use App\Http\Resources\DriverResource;
use App\Models\Driver;
use App\Services\DriverService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    use ApiResponse;

    public function __construct
    (
        protected DriverService $driverService
    )
    {}

    public function index(): JsonResponse
    {
        $drivers = $this->driverService->getAllDrivers();

        return $this->success(DriverResource::collection($drivers)->response()->getData(true));
    }   

    public function showDriversByStatus(Request $request, string $status): JsonResponse
    {
        $drivers = $this->driverService->getDriversByStatus($status);

        return $this->success(DriverResource::collection($drivers)->response()->getData(true));
    }

    public function show(Driver $driver): JsonResponse
    {
        $driver->load('user', 'schedules');
        return $this->success(new DriverResource($driver));
    }

    public function store(StoreDriverRequest $request): JsonResponse
    {
        $driver = $this->driverService->addNewDriver($request->validated());

        return $this->success(new DriverResource($driver), 'Driver created successfully');
    }

    public function update(UpdateDriverRequest $request, Driver $driver): JsonResponse
    {
        $driver = $this->driverService->updateDriver($driver->id, $request->validated());

        if (! $driver) {
            return $this->notFound('Driver not found');
        }

        return $this->success(new DriverResource($driver), 'Driver status updated successfully');
    }

    public function destroy(Driver $driver): JsonResponse
    {
        $deleted = $this->driverService->deleteDriver($driver->id);

        if (! $deleted) {
            return $this->notFound('Driver not found');
        }

        return $this->success(null, 'Driver deleted successfully');
    }
}
