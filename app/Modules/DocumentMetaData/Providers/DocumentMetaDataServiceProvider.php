<?php

namespace App\Modules\DocumentMetaData\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\DocumentMetaData\Contracts\DocumentMetaDataServiceInterface;
use App\Modules\DocumentMetaData\Services\DocumentMetaDataService;

class DocumentMetaDataServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(DocumentMetaDataServiceInterface::class, DocumentMetaDataService::class);
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
