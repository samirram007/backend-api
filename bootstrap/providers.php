<?php

use App\Providers\AppServiceProvider;
use App\Providers\BaseModuleServiceLoader;
use App\Providers\DocumentModuleServiceLoader;
use App\Providers\HospitalModuleServiceLoader;
use App\Providers\SchoolModuleServiceLoader;


if (env('APP_MODULE') == "Hospital") {
    // dd("Hospital Running");
    return [
        AppServiceProvider::class,
        BaseModuleServiceLoader::class,
        DocumentModuleServiceLoader::class,
        HospitalModuleServiceLoader::class
    ];
} else if (env('APP_MODULE') == "School") {
    return [
        AppServiceProvider::class,
        BaseModuleServiceLoader::class,
        DocumentModuleServiceLoader::class,
        SchoolModuleServiceLoader::class
    ];
}
dd("Hospital Running 2");
return [
    AppServiceProvider::class,
    BaseModuleServiceLoader::class,
    // DocumentModuleServiceLoader::class,
    // SchoolModuleServiceLoader::class,
    // HospitalModuleServiceLoader::class
];
