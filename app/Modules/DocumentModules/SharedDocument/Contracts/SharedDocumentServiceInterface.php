<?php

namespace App\Modules\SharedDocument\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\SharedDocument\Models\SharedDocument;

interface SharedDocumentServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?SharedDocument;
    public function store(array $data): SharedDocument;
    public function update(array $data, int $id): SharedDocument;
    public function delete(int $id): bool;
}
