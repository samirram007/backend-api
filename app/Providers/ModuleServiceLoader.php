<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleServiceLoader extends ServiceProvider
{
    protected $groupModuleInclude = [
        'Modules/App'
    ];
    protected $singleModuleInclude = [
        ''
    ];
    public function register(): void
    {
        $moduleBasePath = app_path('Modules');
        $modulesOrGroups = glob("{$moduleBasePath}/*", GLOB_ONLYDIR);

        foreach ($modulesOrGroups as $moduleOrGroupPath) {
            $name = basename($moduleOrGroupPath);
            $submodules = glob("{$moduleOrGroupPath}/*", GLOB_ONLYDIR);

            // If this folder contains subdirectories, treat as group
            if (!empty($submodules)) {
                foreach ($submodules as $submodulePath) {
                    $submodule = basename($submodulePath);
                    $routesPath = $submodulePath . '/Routes/api.php';
                    if (file_exists($routesPath)) {
                        $providerClass = "App\\Modules\\{$name}\\{$submodule}\\Providers\\{$submodule}ServiceProvider";
                        if (class_exists($providerClass)) {
                            $this->app->register($providerClass);
                        }
                    }
                }
            } else {
                // Otherwise, treat as a single module
                $routesPath = $moduleOrGroupPath . '/Routes/api.php';
                if (file_exists($routesPath)) {
                    $providerClass = "App\\Modules\\{$name}\\Providers\\{$name}ServiceProvider";
                    if (class_exists($providerClass)) {
                        $this->app->register($providerClass);
                    }
                }
            }
        }
    }
}
