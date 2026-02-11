<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Http\Resources\EventResource;
use App\Services\EventService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="Event", description="API Endpoints for Event")
 */
class EventApiController extends BaseApiController
{
    protected $service;

    public function __construct(EventService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/events",
     *      operationId="getEventList",
     *      tags={"Event"},
     *      summary="Get list of Event",
     *      description="Returns list of Event",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/EventResource"))
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
        $events = $this->service->all();

        return $this->sendResponse(EventResource::collection($events), __('events.messages.retrieved'));
    }

    /**
     * @OA\Post(
     *      path="/api/events",
     *      operationId="storeEvent",
     *      tags={"Event"},
     *      summary="Store new Event",
     *      description="Returns created Event data",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/StoreEventRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/EventResource")
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
    public function store(StoreEventRequest $request): JsonResponse
    {
        $event = $this->service->create($request->validated());

        return $this->sendResponse(new EventResource($event), __('events.messages.created'), 201);
    }

    /**
     * @OA\Get(
     *      path="/api/events/{id}",
     *      operationId="getEventById",
     *      tags={"Event"},
     *      summary="Get Event information",
     *      description="Returns Event data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Event id",
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
     *          @OA\JsonContent(ref="#/components/schemas/EventResource")
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
        $event = $this->service->find($id);
        if (! $event) {
            return $this->sendError(__('global.not_found'));
        }

        return $this->sendResponse(new EventResource($event), __('events.messages.retrieved'));
    }

    /**
     * @OA\Put(
     *      path="/api/events/{id}",
     *      operationId="updateEvent",
     *      tags={"Event"},
     *      summary="Update existing Event",
     *      description="Returns updated Event data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Event id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/UpdateEventRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/EventResource")
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
    public function update(UpdateEventRequest $request, $id): JsonResponse
    {
        $event = $this->service->update($id, $request->validated());

        return $this->sendResponse(new EventResource($event), __('events.messages.updated'));
    }

    /**
     * @OA\Delete(
     *      path="/api/events/{id}",
     *      operationId="deleteEvent",
     *      tags={"Event"},
     *      summary="Delete existing Event",
     *      description="Deletes a record and returns no content",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Event id",
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

        return $this->sendResponse([], __('events.messages.deleted'), 204);
    }
}
