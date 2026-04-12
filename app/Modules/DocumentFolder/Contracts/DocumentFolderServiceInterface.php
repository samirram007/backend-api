<?php

namespace App\Modules\DocumentFolder\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\DocumentFolder\Models\DocumentFolder;

interface DocumentFolderServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?DocumentFolder;
    public function store(array $data): DocumentFolder;
    public function update(array $data, int $id): DocumentFolder;
    public function delete(int $id): bool;
}
