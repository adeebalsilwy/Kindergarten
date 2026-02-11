<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreGuardianRequest;
use App\Http\Requests\UpdateGuardianRequest;
use App\Http\Resources\GuardianResource;
use App\Services\GuardianService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="Guardian", description="API Endpoints for Guardian")
 */
class GuardianApiController extends BaseApiController
{
    protected $service;

    public function __construct(GuardianService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/guardians",
     *      operationId="getGuardianList",
     *      tags={"Guardian"},
     *      summary="Get list of Guardian",
     *      description="Returns list of Guardian",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/GuardianResource"))
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

        return $this->sendResponse(GuardianResource::collection($parents), __('guardians.messages.retrieved'));
    }

    /**
     * @OA\Post(
     *      path="/api/guardians",
     *      operationId="storeGuardian",
     *      tags={"Guardian"},
     *      summary="Store new Guardian",
     *      description="Returns created Guardian data",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/StoreGuardianRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/GuardianResource")
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
    public function store(StoreGuardianRequest $request): JsonResponse
    {
        $parents = $this->service->create($request->validated());

        return $this->sendResponse(new GuardianResource($parents), __('guardians.messages.created'), 201);
    }

    /**
     * @OA\Get(
     *      path="/api/guardians/{id}",
     *      operationId="getGuardianById",
     *      tags={"Guardian"},
     *      summary="Get Guardian information",
     *      description="Returns Guardian data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Guardian id",
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
     *          @OA\JsonContent(ref="#/components/schemas/GuardianResource")
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

        return $this->sendResponse(new GuardianResource($parents), __('guardians.messages.retrieved'));
    }

    /**
     * @OA\Put(
     *      path="/api/guardians/{id}",
     *      operationId="updateGuardian",
     *      tags={"Guardian"},
     *      summary="Update existing Guardian",
     *      description="Returns updated Guardian data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Guardian id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/UpdateGuardianRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/GuardianResource")
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
    public function update(UpdateGuardianRequest $request, $id): JsonResponse
    {
        $parents = $this->service->update($id, $request->validated());

        return $this->sendResponse(new GuardianResource($parents), __('guardians.messages.updated'));
    }

    /**
     * @OA\Delete(
     *      path="/api/guardians/{id}",
     *      operationId="deleteGuardian",
     *      tags={"Guardian"},
     *      summary="Delete existing Guardian",
     *      description="Deletes a record and returns no content",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Guardian id",
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

        return $this->sendResponse([], __('guardians.messages.deleted'), 204);
    }
}
