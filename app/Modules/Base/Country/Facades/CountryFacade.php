<?php
namespace App\Modules\Base\Country\Facades;

use Illuminate\Support\Facades\Facade;
class CountryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'countries';
    }
}
