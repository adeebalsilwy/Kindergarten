<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Resources\RoleResource;
use App\Services\RoleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="Role", description="API Endpoints for Role")
 */
class RoleApiController extends BaseApiController
{
    protected $service;

    public function __construct(RoleService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/roles",
     *      operationId="getRoleList",
     *      tags={"Role"},
     *      summary="Get list of Role",
     *      description="Returns list of Role",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/RoleResource"))
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
        $roles = $this->service->all();

        return $this->sendResponse(RoleResource::collection($roles), __('roles.messages.retrieved'));
    }

    /**
     * @OA\Post(
     *      path="/api/roles",
     *      operationId="storeRole",
     *      tags={"Role"},
     *      summary="Store new Role",
     *      description="Returns created Role data",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/StoreRoleRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/RoleResource")
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
    public function store(StoreRoleRequest $request): JsonResponse
    {
        $roles = $this->service->create($request->validated());

        return $this->sendResponse(new RoleResource($roles), __('roles.messages.created'), 201);
    }

    /**
     * @OA\Get(
     *      path="/api/roles/{id}",
     *      operationId="getRoleById",
     *      tags={"Role"},
     *      summary="Get Role information",
     *      description="Returns Role data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Role id",
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
     *          @OA\JsonContent(ref="#/components/schemas/RoleResource")
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
        $roles = $this->service->find($id);
        if (! $roles) {
            return $this->sendError(__('global.not_found'));
        }

        return $this->sendResponse(new RoleResource($roles), __('roles.messages.retrieved'));
    }

    /**
     * @OA\Put(
     *      path="/api/roles/{id}",
     *      operationId="updateRole",
     *      tags={"Role"},
     *      summary="Update existing Role",
     *      description="Returns updated Role data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Role id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/UpdateRoleRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/RoleResource")
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
    public function update(UpdateRoleRequest $request, $id): JsonResponse
    {
        $roles = $this->service->update($id, $request->validated());

        return $this->sendResponse(new RoleResource($roles), __('roles.messages.updated'));
    }

    /**
     * @OA\Delete(
     *      path="/api/roles/{id}",
     *      operationId="deleteRole",
     *      tags={"Role"},
     *      summary="Delete existing Role",
     *      description="Deletes a record and returns no content",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Role id",
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

        return $this->sendResponse([], __('roles.messages.deleted'), 204);
    }
}
