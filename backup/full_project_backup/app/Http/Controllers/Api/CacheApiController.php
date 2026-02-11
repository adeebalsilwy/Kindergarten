<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreCacheRequest;
use App\Http\Requests\UpdateCacheRequest;
use App\Http\Resources\CacheResource;
use App\Services\CacheService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="Cache", description="API Endpoints for Cache")
 */
class CacheApiController extends BaseApiController
{
    protected $service;

    public function __construct(CacheService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/cache",
     *      operationId="getCacheList",
     *      tags={"Cache"},
     *      summary="Get list of Cache",
     *      description="Returns list of Cache",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/CacheResource"))
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
        $caches = $this->service->all();

        return $this->sendResponse(CacheResource::collection($caches), __('cache.messages.retrieved'));
    }

    /**
     * @OA\Post(
     *      path="/api/cache",
     *      operationId="storeCache",
     *      tags={"Cache"},
     *      summary="Store new Cache",
     *      description="Returns created Cache data",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/StoreCacheRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/CacheResource")
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
    public function store(StoreCacheRequest $request): JsonResponse
    {
        $cache = $this->service->create($request->validated());

        return $this->sendResponse(new CacheResource($cache), __('cache.messages.created'), 201);
    }

    /**
     * @OA\Get(
     *      path="/api/cache/{id}",
     *      operationId="getCacheById",
     *      tags={"Cache"},
     *      summary="Get Cache information",
     *      description="Returns Cache data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Cache id",
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
     *          @OA\JsonContent(ref="#/components/schemas/CacheResource")
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
        $cache = $this->service->find($id);
        if (! $cache) {
            return $this->sendError(__('global.not_found'));
        }

        return $this->sendResponse(new CacheResource($cache), __('cache.messages.retrieved'));
    }

    /**
     * @OA\Put(
     *      path="/api/cache/{id}",
     *      operationId="updateCache",
     *      tags={"Cache"},
     *      summary="Update existing Cache",
     *      description="Returns updated Cache data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Cache id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/UpdateCacheRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/CacheResource")
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
    public function update(UpdateCacheRequest $request, $id): JsonResponse
    {
        $cache = $this->service->update($id, $request->validated());

        return $this->sendResponse(new CacheResource($cache), __('cache.messages.updated'));
    }

    /**
     * @OA\Delete(
     *      path="/api/cache/{id}",
     *      operationId="deleteCache",
     *      tags={"Cache"},
     *      summary="Delete existing Cache",
     *      description="Deletes a record and returns no content",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Cache id",
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

        return $this->sendResponse([], __('cache.messages.deleted'), 204);
    }
}
