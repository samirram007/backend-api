<?php
        namespace App\Modules\Teacher\Facades;
        use Illuminate\Support\Facades\Facade;
        class TeacherFacade extends Facade
        {
            protected static function getFacadeAccessor()
            {
                return 'teachers';
            }
        }

        