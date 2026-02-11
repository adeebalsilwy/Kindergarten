<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Http\Resources\JobResource;
use App\Services\JobService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="Job", description="API Endpoints for Job")
 */
class JobApiController extends BaseApiController
{
    protected $service;

    public function __construct(JobService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/jobs",
     *      operationId="getJobList",
     *      tags={"Job"},
     *      summary="Get list of Job",
     *      description="Returns list of Job",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/JobResource"))
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
        $jobs = $this->service->all();

        return $this->sendResponse(JobResource::collection($jobs), __('jobs.messages.retrieved'));
    }

    /**
     * @OA\Post(
     *      path="/api/jobs",
     *      operationId="storeJob",
     *      tags={"Job"},
     *      summary="Store new Job",
     *      description="Returns created Job data",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/StoreJobRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/JobResource")
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
    public function store(StoreJobRequest $request): JsonResponse
    {
        $jobs = $this->service->create($request->validated());

        return $this->sendResponse(new JobResource($jobs), __('jobs.messages.created'), 201);
    }

    /**
     * @OA\Get(
     *      path="/api/jobs/{id}",
     *      operationId="getJobById",
     *      tags={"Job"},
     *      summary="Get Job information",
     *      description="Returns Job data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Job id",
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
     *          @OA\JsonContent(ref="#/components/schemas/JobResource")
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
        $jobs = $this->service->find($id);
        if (! $jobs) {
            return $this->sendError(__('global.not_found'));
        }

        return $this->sendResponse(new JobResource($jobs), __('jobs.messages.retrieved'));
    }

    /**
     * @OA\Put(
     *      path="/api/jobs/{id}",
     *      operationId="updateJob",
     *      tags={"Job"},
     *      summary="Update existing Job",
     *      description="Returns updated Job data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Job id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/UpdateJobRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/JobResource")
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
    public function update(UpdateJobRequest $request, $id): JsonResponse
    {
        $jobs = $this->service->update($id, $request->validated());

        return $this->sendResponse(new JobResource($jobs), __('jobs.messages.updated'));
    }

    /**
     * @OA\Delete(
     *      path="/api/jobs/{id}",
     *      operationId="deleteJob",
     *      tags={"Job"},
     *      summary="Delete existing Job",
     *      description="Deletes a record and returns no content",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Job id",
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

        return $this->sendResponse([], __('jobs.messages.deleted'), 204);
    }
}
