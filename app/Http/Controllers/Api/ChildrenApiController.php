<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreChildrenRequest;
use App\Http\Requests\UpdateChildrenRequest;
use App\Http\Resources\ChildrenResource;
use App\Services\ChildrenService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="Children", description="API Endpoints for Children")
 */
class ChildrenApiController extends BaseApiController
{
    protected $service;

    public function __construct(ChildrenService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/children",
     *      operationId="getChildrenList",
     *      tags={"Children"},
     *      summary="Get list of Children",
     *      description="Returns list of Children",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/ChildrenResource"))
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
        $childrens = $this->service->getAll();

        return $this->sendResponse(ChildrenResource::collection($childrens), __('children.messages.retrieved'));
    }

    /**
     * @OA\Post(
     *      path="/api/children",
     *      operationId="storeChildren",
     *      tags={"Children"},
     *      summary="Store new Children",
     *      description="Returns created Children data",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/StoreChildrenRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/ChildrenResource")
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
    public function store(StoreChildrenRequest $request): JsonResponse
    {
        $children = $this->service->create($request->validated());

        return $this->sendResponse(new ChildrenResource($children), __('children.messages.created'), 201);
    }

    /**
     * @OA\Get(
     *      path="/api/children/{id}",
     *      operationId="getChildrenById",
     *      tags={"Children"},
     *      summary="Get Children information",
     *      description="Returns Children data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Children id",
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
     *          @OA\JsonContent(ref="#/components/schemas/ChildrenResource")
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
        $children = $this->service->find($id);
        if (! $children) {
            return $this->sendError(__('global.not_found'));
        }

        return $this->sendResponse(new ChildrenResource($children), __('children.messages.retrieved'));
    }

    /**
     * @OA\Put(
     *      path="/api/children/{id}",
     *      operationId="updateChildren",
     *      tags={"Children"},
     *      summary="Update existing Children",
     *      description="Returns updated Children data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Children id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/UpdateChildrenRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/ChildrenResource")
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
    public function update(UpdateChildrenRequest $request, $id): JsonResponse
    {
        $children = $this->service->update($id, $request->validated());

        return $this->sendResponse(new ChildrenResource($children), __('children.messages.updated'));
    }

    /**
     * @OA\Delete(
     *      path="/api/children/{id}",
     *      operationId="deleteChildren",
     *      tags={"Children"},
     *      summary="Delete existing Children",
     *      description="Deletes a record and returns no content",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Children id",
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

        return $this->sendResponse([], __('children.messages.deleted'), 204);
    }
}
