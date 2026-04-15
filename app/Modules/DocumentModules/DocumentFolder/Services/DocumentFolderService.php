<?php

namespace App\Modules\DocumentFolder\Services;

use App\Modules\DocumentFolder\Contracts\DocumentFolderServiceInterface;
use App\Modules\DocumentFolder\Models\DocumentFolder;
use Illuminate\Database\Eloquent\Collection;

class DocumentFolderService implements DocumentFolderServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return DocumentFolder::with($this->resource)->get();
    }

    public function getById(int $id): ?DocumentFolder
    {
        return DocumentFolder::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): DocumentFolder
    {
        return DocumentFolder::create($data);
    }

    public function update(array $data, int $id): DocumentFolder
    {
        $record = DocumentFolder::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = DocumentFolder::findOrFail($id);
        return $record->delete();
    }
}
