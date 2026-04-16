<?php

namespace App\Modules\Base\Country\Services;

use App\Modules\Base\Country\Contracts\CountryServiceInterface;
use App\Modules\Base\Country\Contracts\CountryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CountryService implements CountryServiceInterface
{
    protected $resource = ['states'];
    protected $repo;

    public function __construct(CountryRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function getAll(): Collection
    {
        return $this->repo->all($this->resource);
    }

    public function getById(int $id): ?\App\Modules\Base\Country\Models\Country
    {
        return $this->repo->find($id, $this->resource);
    }

    public function store(array $data): \App\Modules\Base\Country\Models\Country
    {
        return $this->repo->create($data);
    }

    public function update(array $data, int $id): \App\Modules\Base\Country\Models\Country
    {
        return $this->repo->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->repo->delete($id);
    }
}
