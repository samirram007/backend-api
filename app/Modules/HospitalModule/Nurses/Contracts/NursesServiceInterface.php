<?php

namespace App\Modules\Nurses\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\Nurses\Models\Nurses;

interface NursesServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Nurses;
    public function store(array $data): Nurses;
    public function update(array $data, int $id): Nurses;
    public function delete(int $id): bool;
}
