<?php

use App\Http\Controllers\Api\V1\Admin\SiteController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum', 'throttle:authenticated')->group(function (): void {
    Route::get('/sites', [SiteController::class, 'index'])->middleware('permission:sites.view');
});
