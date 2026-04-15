<?php

namespace App\Modules\Abc\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Modules\Abc\Resources\AbcResource;
use App\Modules\Abc\Resources\AbcCollection;
use App\Modules\Abc\Requests\AbcRequest;
use App\Modules\Abc\Facades\AbcFacade as Abc;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class AbcController extends Controller
{
    use ApiResponseTrait;

    public function __construct() {}

    public function index(): SuccessCollection
    {
        $data = Abc::getAll();
        return new AbcCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = Abc::getById($id);
        return  new AbcResource($data);
    }

    public function store(AbcRequest $request): SuccessResource
    {
        $data = Abc::store($request->validated());
       return  new AbcResource($data, $messages='Abc created successfully');
    }

    public function update(AbcRequest $request, int $id): SuccessResource
    {
        $data = Abc::update($request->validated(), $id);
        return  new AbcResource($data, $messages='Abc updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=Abc::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'Abc deleted successfully':'Abc not found',
        ]);
    }
}
