<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
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
}
