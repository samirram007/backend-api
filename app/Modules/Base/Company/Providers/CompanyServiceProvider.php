<?php

namespace App\Modules\Base\Company\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\Base\Company\Contracts\CompanyServiceInterface;
use App\Modules\Base\Company\Services\CompanyService;

class CompanyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(CompanyServiceInterface::class, CompanyService::class);

        $this->app->singleton('companies', function ($app) {
            return $app->make(CompanyServiceInterface::class);
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
