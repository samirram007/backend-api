<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Student\Controllers\Api\StudentController;

Route::apiResource('students', StudentController::class)->middleware(['jwt.cookies']);
