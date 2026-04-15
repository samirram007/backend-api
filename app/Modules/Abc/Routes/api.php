<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Abc\Controllers\Api\AbcController;

Route::apiResource('abcs', AbcController::class)->middleware(['jwt.cookies']);
