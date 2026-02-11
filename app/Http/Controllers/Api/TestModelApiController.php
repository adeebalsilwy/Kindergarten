<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreTestModelRequest;
use App\Http\Requests\UpdateTestModelRequest;
use App\Http\Resources\TestModelResource;
use App\Services\TestModelService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="TestModel", description="API Endpoints for TestModel")
 */
class TestModelApiController extends BaseApiController
{
    protected $service;

    public function __construct(TestModelService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/test_models",
     *      operationId="getTestModelList",
     *      tags={"TestModel"},
     *      summary="Get list of TestModel",
     *      description="Returns list of TestModel",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/TestModelResource"))
     *       ),
     *
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function index(Request $request): JsonResponse
    {
        $testModels = $this->service->all();

        return $this->sendResponse(TestModelResource::collection($testModels), __('test_models.messages.retrieved'));
    }

    /**
     * @OA\Post(
     *      path="/api/test_models",
     *      operationId="storeTestModel",
     *      tags={"TestModel"},
     *      summary="Store new TestModel",
     *      description="Returns created TestModel data",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/StoreTestModelRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/TestModelResource")
     *       ),
     *
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function store(StoreTestModelRequest $request): JsonResponse
    {
        $testModel = $this->service->create($request->validated());

        return $this->sendResponse(new TestModelResource($testModel), __('test_models.messages.created'), 201);
    }

    /**
     * @OA\Get(
     *      path="/api/test_models/{id}",
     *      operationId="getTestModelById",
     *      tags={"TestModel"},
     *      summary="Get TestModel information",
     *      description="Returns TestModel data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="TestModel id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/TestModelResource")
     *       ),
     *
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function show($id): JsonResponse
    {
        $testModel = $this->service->find($id);
        if (! $testModel) {
            return $this->sendError(__('global.not_found'));
        }

        return $this->sendResponse(new TestModelResource($testModel), __('test_models.messages.retrieved'));
    }

    /**
     * @OA\Put(
     *      path="/api/test_models/{id}",
     *      operationId="updateTestModel",
     *      tags={"TestModel"},
     *      summary="Update existing TestModel",
     *      description="Returns updated TestModel data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="TestModel id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/UpdateTestModelRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/TestModelResource")
     *       ),
     *
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function update(UpdateTestModelRequest $request, $id): JsonResponse
    {
        $testModel = $this->service->update($id, $request->validated());

        return $this->sendResponse(new TestModelResource($testModel), __('test_models.messages.updated'));
    }

    /**
     * @OA\Delete(
     *      path="/api/test_models/{id}",
     *      operationId="deleteTestModel",
     *      tags={"TestModel"},
     *      summary="Delete existing TestModel",
     *      description="Deletes a record and returns no content",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="TestModel id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *
     *          @OA\JsonContent()
     *       ),
     *
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function destroy($id): JsonResponse
    {
        $this->service->delete($id);

        return $this->sendResponse([], __('test_models.messages.deleted'), 204);
    }
}
