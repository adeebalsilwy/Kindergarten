<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="User", description="API Endpoints for User")
 */
class UserApiController extends BaseApiController
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/users",
     *      operationId="getUserList",
     *      tags={"User"},
     *      summary="Get list of User",
     *      description="Returns list of User",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/UserResource"))
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
        $users = $this->service->all();

        return $this->sendResponse(UserResource::collection($users), __('users.messages.retrieved'));
    }

    /**
     * @OA\Post(
     *      path="/api/users",
     *      operationId="storeUser",
     *      tags={"User"},
     *      summary="Store new User",
     *      description="Returns created User data",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/StoreUserRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/UserResource")
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
    public function store(StoreUserRequest $request): JsonResponse
    {
        $user = $this->service->create($request->validated());

        return $this->sendResponse(new UserResource($user), __('users.messages.created'), 201);
    }

    /**
     * @OA\Get(
     *      path="/api/users/{id}",
     *      operationId="getUserById",
     *      tags={"User"},
     *      summary="Get User information",
     *      description="Returns User data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="User id",
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
     *          @OA\JsonContent(ref="#/components/schemas/UserResource")
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
        $user = $this->service->find($id);
        if (! $user) {
            return $this->sendError(__('global.not_found'));
        }

        return $this->sendResponse(new UserResource($user), __('users.messages.retrieved'));
    }

    /**
     * @OA\Put(
     *      path="/api/users/{id}",
     *      operationId="updateUser",
     *      tags={"User"},
     *      summary="Update existing User",
     *      description="Returns updated User data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/UpdateUserRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/UserResource")
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
    public function update(UpdateUserRequest $request, $id): JsonResponse
    {
        $user = $this->service->update($id, $request->validated());

        return $this->sendResponse(new UserResource($user), __('users.messages.updated'));
    }

    /**
     * @OA\Delete(
     *      path="/api/users/{id}",
     *      operationId="deleteUser",
     *      tags={"User"},
     *      summary="Delete existing User",
     *      description="Deletes a record and returns no content",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="User id",
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

        return $this->sendResponse([], __('users.messages.deleted'), 204);
    }
}
