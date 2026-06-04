<?php

use App\Http\Controllers\Api\V1\Admin\CollectionQueueController;
use App\Http\Controllers\Api\V1\Admin\DriverController;
use App\Http\Controllers\Api\V1\Admin\ReviewController;
use App\Http\Controllers\Api\V1\Admin\ScheduleController;
use App\Http\Controllers\Api\V1\Admin\RedeemableController;
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
    Route::get('/sites/{site}', [SiteController::class, 'show'])->middleware('permission:sites.view');
    Route::put('/sites/{site}', [SiteController::class, 'update'])->middleware('permission:sites.update');
    Route::delete('/sites/{site}', [SiteController::class, 'destroy'])->middleware('permission:sites.delete');

    //driver management
    Route::get('/drivers', [DriverController::class, 'index'])->middleware('permission:drivers.view');
    Route::put('/drivers/update/status/{driver}', [DriverController::class, 'update'])->middleware('permission:drivers.update');
    Route::get('/drivers/status/{status}', [DriverController::class, 'showDriversByStatus'])->middleware('permission:drivers.view');
    Route::get('/drivers/{driver}', [DriverController::class, 'show'])->middleware('permission:drivers.view');
    Route::post('/drivers/create', [DriverController::class, 'store'])->middleware('permission:drivers.create'); 

    //schedule management
    Route::middleware('permission:schedules.view')->group(function (): void {
        Route::get('/schedules', [ScheduleController::class, 'index']);
        Route::get('/schedules/driver/{driver}', [ScheduleController::class, 'findScheduleByDriverId']);
        Route::get('/schedules/status/{status}', [ScheduleController::class, 'showScheduleByStatus']);
        Route::get('/schedules/barangay/{barangayId}', [ScheduleController::class, 'showScheduleByBarangayId']);
        Route::get('/schedules/{schedule}', [ScheduleController::class, 'show']);
    });

    Route::middleware('permission:schedules.update')->group(function(): void {
        Route::put('/schedules/{schedule}/status', [ScheduleController::class, 'updateScheduleStatus']);
    });

    Route::post('/schedules/create', [ScheduleController::class, 'store'])->middleware('permission:schedules.create');
    Route::put('/schedules/{schedule}', [ScheduleController::class, 'update'])->middleware('permission:schedules.update');
    Route::delete('/schedules/{schedule}', [ScheduleController::class, 'destroy'])->middleware('permission:schedules.delete');

    //Queue management
    Route::get('/collection-queues', [CollectionQueueController::class, 'index'])->middleware('permission:queues.view');
    Route::get('/collection-queues/schedule/{schedule}', [CollectionQueueController::class, 'showByScheduleId'])->middleware('permission:queues.view');
    Route::put('/collection-queues/{collectionQueue}/status', [CollectionQueueController::class, 'updateStatus'])->middleware('permission:queues.update');


    //Review management
    Route::middleware('permission:reviews.view')->group(function (): void {
        Route::get('/reviews', [ReviewController::class, 'index']);
        Route::get('/reviews/{review}', [ReviewController::class, 'show']);
    });
    Route::post('/reviews/create', [ReviewController::class, 'store'])->middleware('permission:reviews.create');
    Route::put('/reviews/{review}', [ReviewController::class, 'update'])->middleware('permission:reviews.update');
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->middleware('permission:reviews.delete');

    //Redeemable management
    Route::middleware('permission:redeemables.view')->group(function (): void {
         Route::get('/redeemables', [RedeemableController::class, 'index']);
         Route::get('/redeemables/{redeemable}', [RedeemableController::class, 'show']);
    });
    Route::post('/redeemables/create', [RedeemableController::class, 'store'])->middleware('permission:redeemables.create');
    Route::put('/redeemables/{redeemable}', [RedeemableController::class, 'update'])->middleware('permission:redeemables.update');
    Route::delete('/redeemables/{redeemable}', [RedeemableController::class, 'destroy'])->middleware('permission:redeemables.delete');
});
