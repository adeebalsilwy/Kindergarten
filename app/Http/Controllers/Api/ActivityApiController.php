<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Http\Resources\ActivityResource;
use App\Services\ActivityService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="Activity", description="API Endpoints for Activity")
 */
class ActivityApiController extends BaseApiController
{
    protected $service;

    public function __construct(ActivityService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/activities",
     *      operationId="getActivityList",
     *      tags={"Activity"},
     *      summary="Get list of Activity",
     *      description="Returns list of Activity",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/ActivityResource"))
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
        $activities = $this->service->all();

        return $this->sendResponse(ActivityResource::collection($activities), __('activities.messages.retrieved'));
    }

    /**
     * @OA\Post(
     *      path="/api/activities",
     *      operationId="storeActivity",
     *      tags={"Activity"},
     *      summary="Store new Activity",
     *      description="Returns created Activity data",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/StoreActivityRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/ActivityResource")
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
    public function store(StoreActivityRequest $request): JsonResponse
    {
        $activity = $this->service->create($request->validated());

        return $this->sendResponse(new ActivityResource($activity), __('activities.messages.created'), 201);
    }

    /**
     * @OA\Get(
     *      path="/api/activities/{id}",
     *      operationId="getActivityById",
     *      tags={"Activity"},
     *      summary="Get Activity information",
     *      description="Returns Activity data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Activity id",
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
     *          @OA\JsonContent(ref="#/components/schemas/ActivityResource")
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
        $activity = $this->service->find($id);
        if (! $activity) {
            return $this->sendError(__('global.not_found'));
        }

        return $this->sendResponse(new ActivityResource($activity), __('activities.messages.retrieved'));
    }

    /**
     * @OA\Put(
     *      path="/api/activities/{id}",
     *      operationId="updateActivity",
     *      tags={"Activity"},
     *      summary="Update existing Activity",
     *      description="Returns updated Activity data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Activity id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/UpdateActivityRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/ActivityResource")
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
    public function update(UpdateActivityRequest $request, $id): JsonResponse
    {
        $activity = $this->service->update($id, $request->validated());

        return $this->sendResponse(new ActivityResource($activity), __('activities.messages.updated'));
    }

    /**
     * @OA\Delete(
     *      path="/api/activities/{id}",
     *      operationId="deleteActivity",
     *      tags={"Activity"},
     *      summary="Delete existing Activity",
     *      description="Deletes a record and returns no content",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Activity id",
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

        return $this->sendResponse([], __('activities.messages.deleted'), 204);
    }
}
