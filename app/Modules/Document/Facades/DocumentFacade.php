<?php
namespace App\Modules\Document\Facades;

use Illuminate\Support\Facades\Facade;
class DocumentFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'documents';
    }
}
