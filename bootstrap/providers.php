<?php

use App\Providers\AppServiceProvider;
use App\Providers\BaseModuleServiceLoader;
use App\Providers\DocumentModuleServiceLoader;
use App\Providers\SchoolModuleServiceLoader;

$providers = [
    AppServiceProvider::class,
    BaseModuleServiceLoader::class,
    DocumentModuleServiceLoader::class,
    SchoolModuleServiceLoader::class,
];

// if (env('APP_MODULE') === 'Hospital') {
//     $providers[] = HospitalServiceProvider::class;
// }

return $providers;
