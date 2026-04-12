<?php
namespace App\Modules\Company\Facades;

use Illuminate\Support\Facades\Facade;

class CompanyFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'companies';
    }
}
