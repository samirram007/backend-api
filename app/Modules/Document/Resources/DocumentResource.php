<?php

namespace App\Modules\Document\Resources;

use Illuminate\Http\Request;

use App\Http\Resources\SuccessResource;
class DocumentResource extends SuccessResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'user_id' => $this->user_id,
            'document_type' => $this->document_type,
            'path' => env('APP_URL') . '/storage/' . $this->path,
            'mime_type' => $this->mime_type,
            'size' => $this->size,
            'original_name' => $this->original_name,
            'documents' => $this->document_type === 'folder' ? new DocumentCollection($this->whenLoaded('documents')) : null,
            'folders' => $this->document_type !== 'folder' ? new DocumentCollection($this->whenLoaded('folders')) : null,

        ];
    }
}
