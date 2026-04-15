<?php
        namespace App\Modules\Abc\Facades;
        use Illuminate\Support\Facades\Facade;
        class AbcFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'abcs';
            }
        }

        