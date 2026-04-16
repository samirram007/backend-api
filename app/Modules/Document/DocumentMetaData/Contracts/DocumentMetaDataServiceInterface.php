<?php

namespace App\Modules\Document\DocumentMetaData\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\Document\DocumentMetaData\Models\DocumentMetaData;

interface DocumentMetaDataServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?DocumentMetaData;
    public function store(array $data): DocumentMetaData;
    public function update(array $data, int $id): DocumentMetaData;
    public function delete(int $id): bool;
}
