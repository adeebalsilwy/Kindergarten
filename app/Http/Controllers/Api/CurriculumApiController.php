<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreCurriculumRequest;
use App\Http\Requests\UpdateCurriculumRequest;
use App\Http\Resources\CurriculumResource;
use App\Services\CurriculumService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="Curriculum", description="API Endpoints for Curriculum")
 */
class CurriculumApiController extends BaseApiController
{
    protected $service;

    public function __construct(CurriculumService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/curricula",
     *      operationId="getCurriculumList",
     *      tags={"Curriculum"},
     *      summary="Get list of Curriculum",
     *      description="Returns list of Curriculum",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/CurriculumResource"))
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
        $curricula = $this->service->all();

        return $this->sendResponse(CurriculumResource::collection($curricula), __('curricula.messages.retrieved'));
    }

    /**
     * @OA\Post(
     *      path="/api/curricula",
     *      operationId="storeCurriculum",
     *      tags={"Curriculum"},
     *      summary="Store new Curriculum",
     *      description="Returns created Curriculum data",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/StoreCurriculumRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/CurriculumResource")
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
    public function store(StoreCurriculumRequest $request): JsonResponse
    {
        $curriculum = $this->service->create($request->validated());

        return $this->sendResponse(new CurriculumResource($curriculum), __('curricula.messages.created'), 201);
    }

    /**
     * @OA\Get(
     *      path="/api/curricula/{id}",
     *      operationId="getCurriculumById",
     *      tags={"Curriculum"},
     *      summary="Get Curriculum information",
     *      description="Returns Curriculum data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Curriculum id",
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
     *          @OA\JsonContent(ref="#/components/schemas/CurriculumResource")
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
        $curriculum = $this->service->find($id);
        if (! $curriculum) {
            return $this->sendError(__('global.not_found'));
        }

        return $this->sendResponse(new CurriculumResource($curriculum), __('curricula.messages.retrieved'));
    }

    /**
     * @OA\Put(
     *      path="/api/curricula/{id}",
     *      operationId="updateCurriculum",
     *      tags={"Curriculum"},
     *      summary="Update existing Curriculum",
     *      description="Returns updated Curriculum data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Curriculum id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/UpdateCurriculumRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/CurriculumResource")
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
    public function update(UpdateCurriculumRequest $request, $id): JsonResponse
    {
        $curriculum = $this->service->update($id, $request->validated());

        return $this->sendResponse(new CurriculumResource($curriculum), __('curricula.messages.updated'));
    }

    /**
     * @OA\Delete(
     *      path="/api/curricula/{id}",
     *      operationId="deleteCurriculum",
     *      tags={"Curriculum"},
     *      summary="Delete existing Curriculum",
     *      description="Deletes a record and returns no content",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Curriculum id",
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

        return $this->sendResponse([], __('curricula.messages.deleted'), 204);
    }
}
