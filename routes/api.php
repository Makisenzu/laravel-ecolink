<?php

use App\Http\Controllers\Api\V1\Admin\SiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function (): void {
    Route::apiResource('sites', SiteController::class)->parameters([
        'sites' => 'id',
    ]);
});
