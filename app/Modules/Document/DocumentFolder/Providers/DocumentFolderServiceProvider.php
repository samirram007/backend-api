<?php

namespace App\Modules\Document\DocumentFolder\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Modules\Document\DocumentFolder\Contracts\DocumentFolderServiceInterface;
use App\Modules\Document\DocumentFolder\Services\DocumentFolderService;

class DocumentFolderServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(DocumentFolderServiceInterface::class, DocumentFolderService::class);
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
