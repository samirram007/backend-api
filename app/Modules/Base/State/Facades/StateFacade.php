<?php

namespace App\Modules\Base\State\Facades;

use Illuminate\Support\Facades\Facade;

class StateFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'state';
    }
}
