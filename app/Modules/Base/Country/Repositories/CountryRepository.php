<?php
namespace App\Modules\Base\Country\Repositories;

use App\Modules\Base\Country\Contracts\CountryRepositoryInterface;
use App\Modules\Base\Country\Models\Country;
use App\Support\Repositories\BaseRepository;

class CountryRepository extends BaseRepository implements CountryRepositoryInterface
{
    protected \Illuminate\Database\Eloquent\Model $model;

    public function __construct()
    {
        $this->model = new Country();
    }
}
