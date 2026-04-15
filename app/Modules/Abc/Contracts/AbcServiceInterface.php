<?php

namespace App\Modules\Abc\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\Abc\Models\Abc;

interface AbcServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Abc;
    public function store(array $data): Abc;
    public function update(array $data, int $id): Abc;
    public function delete(int $id): bool;
}
