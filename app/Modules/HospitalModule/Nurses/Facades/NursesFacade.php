<?php
        namespace App\Modules\Nurses\Facades;
        use Illuminate\Support\Facades\Facade;
        class NursesFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'nurses';
            }
        }

        