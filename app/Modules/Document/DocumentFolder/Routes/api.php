<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Document\DocumentFolder\Controllers\Api\DocumentFolderController;

Route::apiResource('document_folders', DocumentFolderController::class)->middleware(['jwt.cookies']);
