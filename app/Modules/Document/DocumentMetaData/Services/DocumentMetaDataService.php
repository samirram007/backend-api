<?php

namespace App\Modules\DocumentMetaData\Services;

use App\Modules\DocumentMetaData\Contracts\DocumentMetaDataServiceInterface;
use App\Modules\DocumentMetaData\Models\DocumentMetaData;
use Illuminate\Database\Eloquent\Collection;

class DocumentMetaDataService implements DocumentMetaDataServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return DocumentMetaData::with($this->resource)->get();
    }

    public function getById(int $id): ?DocumentMetaData
    {
        return DocumentMetaData::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): DocumentMetaData
    {
        return DocumentMetaData::create($data);
    }

    public function update(array $data, int $id): DocumentMetaData
    {
        $record = DocumentMetaData::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = DocumentMetaData::findOrFail($id);
        return $record->delete();
    }
}
