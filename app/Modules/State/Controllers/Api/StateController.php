<?php

namespace App\Modules\State\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\State\Facades\StateFacade as State;
use App\Modules\State\Resources\StateResource;
use App\Modules\State\Resources\StateCollection;
use App\Modules\State\Requests\StateRequest;
use App\Http\Resources\SuccessResource;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class StateController extends Controller
{
    use ApiResponseTrait;



    public function index(): JsonResponse
    {
        $data = State::getAll();
        //dd($data->toArray());
        return (new StateCollection($data))->response();
    }

    public function show(int $id): SuccessResource
    {
        $data = State::getById($id);
        return new StateResource($data, $messages = 'State retrieved successfully');


    }

    public function store(StateRequest $request): SuccessResource
    {
        $data = State::store($request->validated());
        return new StateResource($data, $messages = 'State created successfully');

    }

    public function update(StateRequest $request, int $id): SuccessResource
    {
        $data = State::update($request->validated(), $id);
        return new StateResource($data, $messages = 'State updated successfully');

    }

    public function destroy(int $id): JsonResponse
    {
        $result = State::delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'State deleted successfully' : 'State not found',
        ]);

    }
}
