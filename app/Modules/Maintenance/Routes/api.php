<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Maintenance\Controllers\Api\MaintenanceController;




// Backup endpoint: POST /api/maintenance/backup
Route::post('maintenance/backup', [MaintenanceController::class, 'backup'])->middleware(['jwt.cookies']);

// Restore endpoint: POST /api/maintenance/restore
Route::post('maintenance/restore', [MaintenanceController::class, 'restore'])->middleware(['jwt.cookies']);
