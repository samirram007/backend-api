<?php

namespace App\Modules\DocumentFolder\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\DocumentFolder\Contracts\DocumentFolderServiceInterface;
use App\Modules\DocumentFolder\Resources\DocumentFolderResource;
use App\Modules\DocumentFolder\Resources\DocumentFolderCollection;
use App\Modules\DocumentFolder\Requests\DocumentFolderRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class DocumentFolderController extends Controller
{
    use ApiResponseTrait;

    public function __construct(protected DocumentFolderServiceInterface $service) {}

    public function index(): SuccessCollection
    {
        $data = $this->service->getAll();
        return new DocumentFolderCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = $this->service->getById($id);
        return  new DocumentFolderResource($data);
    }

    public function store(DocumentFolderRequest $request): SuccessResource
    {
        $data = $this->service->store($request->validated());
       return  new DocumentFolderResource($data, $messages='DocumentFolder created successfully');
    }

    public function update(DocumentFolderRequest $request, int $id): SuccessResource
    {
        $data = $this->service->update($request->validated(), $id);
        return  new DocumentFolderResource($data, $messages='DocumentFolder updated successfully');
    }

        public function destroy(int $id): JsonResponse
    {

        $result=$this->service->delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result?'DocumentFolder deleted successfully':'DocumentFolder not found',
        ]);
    }
}
