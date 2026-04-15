<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Document\Document\Controllers\Api\DocumentController;

Route::apiResource('documents', DocumentController::class)->middleware(['jwt.cookies']);
