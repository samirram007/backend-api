<?php

use App\Providers\AppServiceProvider;
use App\Providers\ModuleServiceLoader;
use App\Providers\TelescopeServiceProvider;

$providers = [
    AppServiceProvider::class,
    ModuleServiceLoader::class,
];

if (env('APP_MODULE') === 'Hospital') {
    $providers[] = HospitalServiceProvider::class;
}

return $providers;
