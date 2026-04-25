<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreScheduleRequest;
use App\Http\Requests\Api\V1\UpdateScheduleRequest;
use App\Http\Resources\ScheduleResource;
use App\Services\ScheduleService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

class ScheduleController extends Controller
{
    use ApiResponse;
    
    public function __construct
    (
        protected ScheduleService $scheduleService
    )
    {}

    public function index(): JsonResponse
    {
        $schedules = $this->scheduleService->getAllSchedules();

        return $this->success(ScheduleResource::collection($schedules)->response()->getData(true));
    }

    public function showScheduleByStatus(string $status): JsonResponse
    {
        $schedules = $this->scheduleService->getSchedulesByStatus($status);
        
        if ($schedules->isEmpty()) {
            return $this->success([], 'No schedules found with the specified status');
        }

        return $this->success(ScheduleResource::collection($schedules)->response()->getData(true));
    }

    public function showScheduleByBarangayId(int $barangayId): JsonResponse
    {
        $schedules = $this->scheduleService->getSchedulesByBarangayId($barangayId);

        if ($schedules->isEmpty()) {
            return $this->success([], 'No schedules found for the specified barangay');
        }

        return $this->success(ScheduleResource::collection($schedules)->response()->getData(true));
    }

    public function show(int $id): JsonResponse
    {
        $schedule = $this->scheduleService->getScheduleById($id);
        if (!$schedule) {
            return $this->notFound('Schedule not found');
        }
        return $this->success(new ScheduleResource($schedule)->response()->getData(true));
    }

    public function findScheduleByDriverId(int $driverId): JsonResponse
    {
        $schedules = $this->scheduleService->getSchedulesByDriverId($driverId);
        if ($schedules->isEmpty()) {
            return $this->success([], 'No schedules found for the specified driver');
        }

        return $this->success(ScheduleResource::collection($schedules)->response()->getData(true));
    }

    public function store(StoreScheduleRequest $request): JsonResponse
    {
        $schedule = $this->scheduleService->createSchedule($request->validated());

        return $this->success(new ScheduleResource($schedule), 'Schedule created successfully', 201);
    }

    public function update(UpdateScheduleRequest $request, int $id): JsonResponse
    {
        $schedule = $this->scheduleService->updateSchedule($id, $request->validated());
        if (!$schedule) {
            return $this->notFound('Schedule not found');
        }
        return $this->success(new ScheduleResource($schedule), 'Schedule updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->scheduleService->deleteSchedule($id);
        if (!$deleted) {
            return $this->notFound('Schedule not found');
        }
        return $this->success(null, 'Schedule deleted successfully');
    }
}
