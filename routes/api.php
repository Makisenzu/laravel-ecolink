<?php

use App\Http\Controllers\Api\V1\Admin\DriverController;
use App\Http\Controllers\Api\V1\Admin\ScheduleController;
use App\Http\Controllers\Api\V1\Admin\SiteController;
use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('throttle:auth')->prefix('auth')->group(function (): void {
    Route::post('login', [AuthController::class, 'login'])->name('api.v1.login');
});

Route::middleware(['auth:sanctum', 'throttle:api'])->group(function (): void {
    //site management
    Route::get('/sites', [SiteController::class, 'index'])->middleware('permission:sites.view');
    Route::post('/sites/create', [SiteController::class, 'store'])->middleware('permission:sites.create');

    //driver management
    Route::get('/drivers', [DriverController::class, 'index'])->middleware('permission:drivers.view');
    Route::put('/drivers/{id}/status', [DriverController::class, 'updateStatus'])->middleware('permission:drivers.update'); 

    //schedule management
    Route::get('/schedules', [ScheduleController::class, 'index'])->middleware('permission:schedules.view');
    Route::get('/schedules/driver/{driverId}', [ScheduleController::class, 'findScheduleByDriverId'])->middleware('permission:schedules.view');
    Route::get('/schedules/status/{status}', [ScheduleController::class, 'showScheduleByStatus'])->middleware('permission:schedules.view');
    Route::get('/schedules/barangay/{barangayId}', [ScheduleController::class, 'showScheduleByBarangayId'])->middleware('permission:schedules.view');
    Route::get('/schedules/{id}', [ScheduleController::class, 'show'])->middleware('permission:schedules.view');
    Route::post('/schedules/create', [ScheduleController::class, 'store'])->middleware('permission:schedules.create');
    Route::put('/schedules/{id}', [ScheduleController::class, 'update'])->middleware('permission:schedules.update');
    Route::delete('/schedules/{id}', [ScheduleController::class, 'destroy'])->middleware('permission:schedules.delete');
});
