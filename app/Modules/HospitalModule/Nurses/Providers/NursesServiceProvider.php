<?php

namespace App\Modules\Nurses\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\Nurses\Contracts\NursesServiceInterface;
use App\Modules\Nurses\Services\NursesService;

class NursesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(NursesServiceInterface::class, NursesService::class);

        $this->app->singleton('nurses', function ($app) {
            return $app->make(NursesServiceInterface::class);
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
