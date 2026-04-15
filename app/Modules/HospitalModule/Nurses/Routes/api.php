<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Nurses\Controllers\Api\NursesController;

Route::apiResource('nurses', NursesController::class)->middleware(['jwt.cookies']);
