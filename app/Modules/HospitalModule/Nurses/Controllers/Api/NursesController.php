<?php

namespace App\Modules\Nurses\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\Nurses\Resources\NursesResource;
use App\Modules\Nurses\Resources\NursesCollection;
use App\Modules\Nurses\Requests\NursesRequest;
use App\Modules\Nurses\Facades\NursesFacade as Nurses;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class NursesController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Nurses::getAll();
        return new NursesCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Nurses::getById($id);
        return  new NursesResource($data);
    }

    public function store(NursesRequest $request): SuccessResource
    {
        $data = Nurses::store($request->validated());
       return  new NursesResource($data, $messages='Nurses created successfully');
    }

    public function update(NursesRequest $request, int $id): SuccessResource
    {
        $data = Nurses::update($request->validated(), $id);
        return  new NursesResource($data, $messages='Nurses updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Nurses::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Nurses deleted successfully':'Nurses not found',
        ]);
    }
}
