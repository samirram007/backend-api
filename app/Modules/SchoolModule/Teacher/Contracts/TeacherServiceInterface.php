<?php

namespace App\Modules\Teacher\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Modules\Teacher\Models\Teacher;

interface TeacherServiceInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?Teacher;
    public function store(array $data): Teacher;
    public function update(array $data, int $id): Teacher;
    public function delete(int $id): bool;
}
