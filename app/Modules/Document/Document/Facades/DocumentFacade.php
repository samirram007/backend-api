<?php
namespace App\Modules\Document\Document\Facades;

use Illuminate\Support\Facades\Facade;
class DocumentFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'documents';
    }
}
