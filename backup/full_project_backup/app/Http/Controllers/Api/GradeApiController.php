<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;
use App\Http\Resources\GradeResource;
use App\Services\GradeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="Grade", description="API Endpoints for Grade")
 */
class GradeApiController extends BaseApiController
{
    protected $service;

    public function __construct(GradeService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/grades",
     *      operationId="getGradeList",
     *      tags={"Grade"},
     *      summary="Get list of Grade",
     *      description="Returns list of Grade",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/GradeResource"))
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
        $grades = $this->service->all();

        return $this->sendResponse(GradeResource::collection($grades), __('grades.messages.retrieved'));
    }

    /**
     * @OA\Post(
     *      path="/api/grades",
     *      operationId="storeGrade",
     *      tags={"Grade"},
     *      summary="Store new Grade",
     *      description="Returns created Grade data",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/StoreGradeRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/GradeResource")
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
    public function store(StoreGradeRequest $request): JsonResponse
    {
        $grades = $this->service->create($request->validated());

        return $this->sendResponse(new GradeResource($grades), __('grades.messages.created'), 201);
    }

    /**
     * @OA\Get(
     *      path="/api/grades/{id}",
     *      operationId="getGradeById",
     *      tags={"Grade"},
     *      summary="Get Grade information",
     *      description="Returns Grade data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Grade id",
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
     *          @OA\JsonContent(ref="#/components/schemas/GradeResource")
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
        $grades = $this->service->find($id);
        if (! $grades) {
            return $this->sendError(__('global.not_found'));
        }

        return $this->sendResponse(new GradeResource($grades), __('grades.messages.retrieved'));
    }

    /**
     * @OA\Put(
     *      path="/api/grades/{id}",
     *      operationId="updateGrade",
     *      tags={"Grade"},
     *      summary="Update existing Grade",
     *      description="Returns updated Grade data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Grade id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/UpdateGradeRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/GradeResource")
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
    public function update(UpdateGradeRequest $request, $id): JsonResponse
    {
        $grades = $this->service->update($id, $request->validated());

        return $this->sendResponse(new GradeResource($grades), __('grades.messages.updated'));
    }

    /**
     * @OA\Delete(
     *      path="/api/grades/{id}",
     *      operationId="deleteGrade",
     *      tags={"Grade"},
     *      summary="Delete existing Grade",
     *      description="Deletes a record and returns no content",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Grade id",
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

        return $this->sendResponse([], __('grades.messages.deleted'), 204);
    }
}
