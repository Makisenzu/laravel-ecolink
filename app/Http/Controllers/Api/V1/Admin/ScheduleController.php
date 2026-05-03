<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreScheduleRequest;
use App\Http\Requests\Api\V1\UpdateScheduleRequest;
use App\Http\Resources\ScheduleResource;
use App\Models\Driver;
use App\Models\Schedule;
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

    public function show(Schedule $schedule): JsonResponse
    {
        $schedule = $this->scheduleService->getScheduleById($schedule->id);
        if (!$schedule) {
            return $this->notFound('Schedule not found');
        }
        return $this->success(new ScheduleResource($schedule)->response()->getData(true));
    }

    public function findScheduleByDriverId(Driver $driver): JsonResponse
    {
        $schedules = $this->scheduleService->getSchedulesByDriverId($driver->id);
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

    public function update(UpdateScheduleRequest $request, Schedule $schedule): JsonResponse
    {
        $schedule = $this->scheduleService->updateSchedule($schedule->id, $request->validated());
        if (!$schedule) {
            return $this->notFound('Schedule not found');
        }
        return $this->success(new ScheduleResource($schedule), 'Schedule updated successfully');
    }

    public function destroy(Schedule $schedule): JsonResponse
    {
        $deleted = $this->scheduleService->deleteSchedule($schedule->id);
        if (!$deleted) {
            return $this->notFound('Schedule not found');
        }
        return $this->success(null, 'Schedule deleted successfully');
    }
}
