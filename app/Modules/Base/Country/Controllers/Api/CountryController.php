<?php

namespace App\Modules\Base\Country\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Base\Country\Facades\CountryFacade as Country;
use App\Modules\Base\Country\Resources\CountryResource;
use App\Modules\Base\Country\Resources\CountryCollection;
use App\Modules\Base\Country\Requests\CountryRequest;
use App\Http\Resources\SuccessResource;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class CountryController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
    }


    public function index(): JsonResponse
    {
        // Use cache for all countries
        $data = Cache::rememberForever('countries_all', function () {
            return Country::getAll();
        });
        return (new CountryCollection($data))->response();
    }


    public function show(int $id): SuccessResource
    {
        // Use cache for single country
        $data = Cache::rememberForever("country_{$id}", function () use ($id) {
            return Country::getById($id);
        });
        return new CountryResource($data, $messages = 'Country retrieved successfully');
    }



    public function store(CountryRequest $request): SuccessResource
    {
        $data = Country::store($request->validated());
        // Clear country cache after create
        Cache::forget('countries_all');
        if ($data && isset($data->id)) {
            Cache::forget("country_{$data->id}");
        }
        return new CountryResource($data, $messages = 'Country created successfully');
    }



    public function update(CountryRequest $request, int $id): SuccessResource
    {
        $data = Country::update($request->validated(), $id);
        // Clear country cache after update
        Cache::forget('countries_all');
        Cache::forget("country_{$id}");
        return new CountryResource($data, $messages = 'Country updated successfully');
    }


    public function destroy(int $id): JsonResponse
    {
        $result = Country::delete($id);
        // Clear country cache after delete
        Cache::forget('countries_all');
        Cache::forget("country_{$id}");
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'Country deleted successfully' : 'Country not found',
        ]);
    }

}
