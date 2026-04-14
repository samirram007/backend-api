<?php

namespace App\Modules\State\Facades;

use Illuminate\Support\Facades\Facade;

class StateFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'state';
    }
}
