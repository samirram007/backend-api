<?php

namespace App\Modules\Abc\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\Abc\Contracts\AbcServiceInterface;
use App\Modules\Abc\Services\AbcService;

class AbcServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AbcServiceInterface::class, AbcService::class);

        $this->app->singleton('abcs', function ($app) {
            return $app->make(AbcServiceInterface::class);
        });


    }

    public function boot(): void
    {
        $this->loadRoutes();
        $this->loadMigrations();
    }

    private function loadRoutes(): void
    {
        Route::middleware('api')
            ->prefix('api')
            ->group(__DIR__ . '/../Routes/api.php');
    }

    private function loadMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }
}
