<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreParentRequest;
use App\Http\Requests\UpdateParentRequest;
use App\Http\Resources\ParentResource;
use App\Services\ParentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="Parent", description="API Endpoints for Parent")
 */
class ParentApiController extends BaseApiController
{
    protected $service;

    public function __construct(ParentService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/parents",
     *      operationId="getParentList",
     *      tags={"Parent"},
     *      summary="Get list of Parent",
     *      description="Returns list of Parent",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/ParentResource"))
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
        $parents = $this->service->all();

        return $this->sendResponse(ParentResource::collection($parents), __('parents.messages.retrieved'));
    }

    /**
     * @OA\Post(
     *      path="/api/parents",
     *      operationId="storeParent",
     *      tags={"Parent"},
     *      summary="Store new Parent",
     *      description="Returns created Parent data",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/StoreParentRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/ParentResource")
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
    public function store(StoreParentRequest $request): JsonResponse
    {
        $parents = $this->service->create($request->validated());

        return $this->sendResponse(new ParentResource($parents), __('parents.messages.created'), 201);
    }

    /**
     * @OA\Get(
     *      path="/api/parents/{id}",
     *      operationId="getParentById",
     *      tags={"Parent"},
     *      summary="Get Parent information",
     *      description="Returns Parent data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Parent id",
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
     *          @OA\JsonContent(ref="#/components/schemas/ParentResource")
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
        $parents = $this->service->find($id);
        if (! $parents) {
            return $this->sendError(__('global.not_found'));
        }

        return $this->sendResponse(new ParentResource($parents), __('parents.messages.retrieved'));
    }

    /**
     * @OA\Put(
     *      path="/api/parents/{id}",
     *      operationId="updateParent",
     *      tags={"Parent"},
     *      summary="Update existing Parent",
     *      description="Returns updated Parent data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Parent id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/UpdateParentRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/ParentResource")
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
    public function update(UpdateParentRequest $request, $id): JsonResponse
    {
        $parents = $this->service->update($id, $request->validated());

        return $this->sendResponse(new ParentResource($parents), __('parents.messages.updated'));
    }

    /**
     * @OA\Delete(
     *      path="/api/parents/{id}",
     *      operationId="deleteParent",
     *      tags={"Parent"},
     *      summary="Delete existing Parent",
     *      description="Deletes a record and returns no content",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Parent id",
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

        return $this->sendResponse([], __('parents.messages.deleted'), 204);
    }
}
