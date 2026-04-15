<?php

use App\Providers\AppServiceProvider;
use App\Providers\BaseModuleServiceLoader;
use App\Providers\DocumentModuleServiceLoader;
use App\Providers\SchoolModuleServiceLoader;

return [
    AppServiceProvider::class,
    BaseModuleServiceLoader::class,
    DocumentModuleServiceLoader::class,
    SchoolModuleServiceLoader::class,
];
