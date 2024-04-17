<?php

use App\Http\Controllers\LocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; 




Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('locations')->group(function () {
        Route::post('/', [LocationController::class, 'store'])->name('locations.store');
        Route::put('/{id}', [LocationController::class, 'update'])->name('locations.update');
        Route::delete('/{id}', [LocationController::class, 'destroy'])->name('locations.destroy');
    });
});