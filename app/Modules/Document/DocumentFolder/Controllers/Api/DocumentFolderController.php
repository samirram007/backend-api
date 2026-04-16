<?php

namespace App\Modules\Document\DocumentFolder\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Document\DocumentFolder\Contracts\DocumentFolderServiceInterface;
use App\Modules\Document\DocumentFolder\Resources\DocumentFolderResource;
use App\Modules\Document\DocumentFolder\Resources\DocumentFolderCollection;
use App\Modules\Document\DocumentFolder\Requests\DocumentFolderRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\SuccessCollection;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class DocumentFolderController extends Controller
{
    use ApiResponseTrait;

    public function __construct(protected DocumentFolderServiceInterface $service)
    {
    }

    public function index(): SuccessCollection
    {
        $data = $this->service->getAll();
        return new DocumentFolderCollection($data);
    }

    public function show(int $id): SuccessResource
    {
        $data = $this->service->getById($id);
        return new DocumentFolderResource($data);
    }

    public function store(DocumentFolderRequest $request): SuccessResource
    {
        $data = $this->service->store($request->validated());
<<<<<<< HEAD
        return  new DocumentFolderResource($data, $messages = 'DocumentFolder created successfully');
=======
        return new DocumentFolderResource($data, $messages = 'DocumentFolder created successfully');
>>>>>>> 95b4514c99628c764e209138c5a16217ee7483f1
    }

    public function update(DocumentFolderRequest $request, int $id): SuccessResource
    {
        $data = $this->service->update($request->validated(), $id);
<<<<<<< HEAD
        return  new DocumentFolderResource($data, $messages = 'DocumentFolder updated successfully');
=======
        return new DocumentFolderResource($data, $messages = 'DocumentFolder updated successfully');
>>>>>>> 95b4514c99628c764e209138c5a16217ee7483f1
    }

    public function destroy(int $id): JsonResponse
    {

        $result = $this->service->delete($id);
        return new JsonResponse([
            'status' => $result,
            'code' => 204,
            'message' => $result ? 'DocumentFolder deleted successfully' : 'DocumentFolder not found',
        ]);
    }
}
