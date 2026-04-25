<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\Admin\SiteController;
use Illuminate\Support\Facades\Route;

Route::middleware('throttle:auth')->prefix('auth')->group(function (): void {
    Route::post('login', [AuthController::class, 'login'])->name('api.v1.login');
});

Route::middleware(['auth:sanctum', 'throttle:api'])->group(function (): void {
    Route::get('/sites', [SiteController::class, 'index'])->middleware('permission:sites.view');
    Route::post('/sites/create', [SiteController::class, 'store'])->middleware('permission:sites.create');
});
