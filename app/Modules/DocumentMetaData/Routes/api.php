<?php

use Illuminate\Support\Facades\Route;
use App\Modules\DocumentMetaData\Controllers\Api\DocumentMetaDataController;

Route::apiResource('document_meta_datas', DocumentMetaDataController::class)->middleware(['jwt.cookies']);
