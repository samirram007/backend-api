<?php

namespace App\Modules\DocumentMetaData\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\DocumentMetaData\Contracts\DocumentMetaDataServiceInterface;
use App\Modules\DocumentMetaData\Resources\DocumentMetaDataResource;
use App\Modules\DocumentMetaData\Resources\DocumentMetaDataCollection;
use App\Modules\DocumentMetaData\Requests\DocumentMetaDataRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class DocumentMetaDataController extends Controller
{
    use ApiResponseTrait;

    public function __construct(protected DocumentMetaDataServiceInterface $service) {}

    public function index(): SuccessCollection
    {
        $data = $this->service->getAll();
        return new DocumentMetaDataCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = $this->service->getById($id);
        return  new DocumentMetaDataResource($data);
    }

    public function store(DocumentMetaDataRequest $request): SuccessResource
    {
        $data = $this->service->store($request->validated());
       return  new DocumentMetaDataResource($data, $messages='DocumentMetaData created successfully');
    }

    public function update(DocumentMetaDataRequest $request, int $id): SuccessResource
    {
        $data = $this->service->update($request->validated(), $id);
        return  new DocumentMetaDataResource($data, $messages='DocumentMetaData updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=$this->service->delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'DocumentMetaData deleted successfully':'DocumentMetaData not found',
        ]);
    }
}
