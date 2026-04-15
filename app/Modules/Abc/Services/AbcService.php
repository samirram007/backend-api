<?php

namespace App\Modules\Abc\Services;

use App\Modules\Abc\Contracts\AbcServiceInterface;
use App\Modules\Abc\Models\Abc;
use Illuminate\Database\Eloquent\Collection;

class AbcService implements AbcServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return Abc::with($this->resource)->get();
    }

    public function getById(int $id): ?Abc
    {
        return Abc::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): Abc
    {
        return Abc::create($data);
    }

    public function update(array $data, int $id): Abc
    {
        $record = Abc::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = Abc::findOrFail($id);
        return $record->delete();
    }
}
