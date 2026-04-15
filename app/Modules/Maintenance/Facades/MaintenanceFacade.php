<?php
        namespace App\Modules\Maintenance\Facades;
        use Illuminate\Support\Facades\Facade;
        class MaintenanceFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'maintenances';
            }
        }

        