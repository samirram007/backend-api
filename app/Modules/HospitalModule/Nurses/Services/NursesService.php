<?php

namespace App\Modules\Nurses\Services;

use App\Modules\Nurses\Contracts\NursesServiceInterface;
use App\Modules\Nurses\Models\Nurses;
use Illuminate\Database\Eloquent\Collection;

class NursesService implements NursesServiceInterface
{
    protected $resource=[];

    public function getAll(): Collection
    {
        return Nurses::with($this->resource)->get();
    }

    public function getById(int $id): ?Nurses
    {
        return Nurses::with($this->resource)->findOrFail($id);
    }

    public function store(array $data): Nurses
    {
        return Nurses::create($data);
    }

    public function update(array $data, int $id): Nurses
    {
        $record = Nurses::findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(int $id): bool
    {
        $record = Nurses::findOrFail($id);
        return $record->delete();
    }
}
