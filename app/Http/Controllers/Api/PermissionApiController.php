<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Http\Resources\PermissionResource;
use App\Services\PermissionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="Permission", description="API Endpoints for Permission")
 */
class PermissionApiController extends BaseApiController
{
    protected $service;

    public function __construct(PermissionService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/permission",
     *      operationId="getPermissionList",
     *      tags={"Permission"},
     *      summary="Get list of Permission",
     *      description="Returns list of Permission",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/PermissionResource"))
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
        $permissions = $this->service->all();

        return $this->sendResponse(PermissionResource::collection($permissions), __('permission.messages.retrieved'));
    }

    /**
     * @OA\Post(
     *      path="/api/permission",
     *      operationId="storePermission",
     *      tags={"Permission"},
     *      summary="Store new Permission",
     *      description="Returns created Permission data",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/StorePermissionRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/PermissionResource")
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
    public function store(StorePermissionRequest $request): JsonResponse
    {
        $permission = $this->service->create($request->validated());

        return $this->sendResponse(new PermissionResource($permission), __('permission.messages.created'), 201);
    }

    /**
     * @OA\Get(
     *      path="/api/permission/{id}",
     *      operationId="getPermissionById",
     *      tags={"Permission"},
     *      summary="Get Permission information",
     *      description="Returns Permission data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Permission id",
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
     *          @OA\JsonContent(ref="#/components/schemas/PermissionResource")
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
        $permission = $this->service->find($id);
        if (! $permission) {
            return $this->sendError(__('global.not_found'));
        }

        return $this->sendResponse(new PermissionResource($permission), __('permission.messages.retrieved'));
    }

    /**
     * @OA\Put(
     *      path="/api/permission/{id}",
     *      operationId="updatePermission",
     *      tags={"Permission"},
     *      summary="Update existing Permission",
     *      description="Returns updated Permission data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Permission id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/UpdatePermissionRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/PermissionResource")
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
    public function update(UpdatePermissionRequest $request, $id): JsonResponse
    {
        $permission = $this->service->update($id, $request->validated());

        return $this->sendResponse(new PermissionResource($permission), __('permission.messages.updated'));
    }

    /**
     * @OA\Delete(
     *      path="/api/permission/{id}",
     *      operationId="deletePermission",
     *      tags={"Permission"},
     *      summary="Delete existing Permission",
     *      description="Deletes a record and returns no content",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Permission id",
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

        return $this->sendResponse([], __('permission.messages.deleted'), 204);
    }
}
