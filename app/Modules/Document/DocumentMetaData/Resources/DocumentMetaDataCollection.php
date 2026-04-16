<?php

namespace App\Modules\Document\DocumentMetaData\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\SuccessCollection;

class DocumentMetaDataCollection extends SuccessCollection
{

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
