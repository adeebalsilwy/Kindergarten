<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Http\Resources\TeacherResource;
use App\Services\TeacherService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="Teacher", description="API Endpoints for Teacher")
 */
class TeacherApiController extends BaseApiController
{
    protected $service;

    public function __construct(TeacherService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/teachers",
     *      operationId="getTeacherList",
     *      tags={"Teacher"},
     *      summary="Get list of Teacher",
     *      description="Returns list of Teacher",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/TeacherResource"))
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
        $teachers = $this->service->all();

        return $this->sendResponse(TeacherResource::collection($teachers), __('teachers.messages.retrieved'));
    }

    /**
     * @OA\Post(
     *      path="/api/teachers",
     *      operationId="storeTeacher",
     *      tags={"Teacher"},
     *      summary="Store new Teacher",
     *      description="Returns created Teacher data",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/StoreTeacherRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/TeacherResource")
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
    public function store(StoreTeacherRequest $request): JsonResponse
    {
        $teacher = $this->service->create($request->validated());

        return $this->sendResponse(new TeacherResource($teacher), __('teachers.messages.created'), 201);
    }

    /**
     * @OA\Get(
     *      path="/api/teachers/{id}",
     *      operationId="getTeacherById",
     *      tags={"Teacher"},
     *      summary="Get Teacher information",
     *      description="Returns Teacher data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Teacher id",
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
     *          @OA\JsonContent(ref="#/components/schemas/TeacherResource")
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
        $teacher = $this->service->find($id);
        if (! $teacher) {
            return $this->sendError(__('global.not_found'));
        }

        return $this->sendResponse(new TeacherResource($teacher), __('teachers.messages.retrieved'));
    }

    /**
     * @OA\Put(
     *      path="/api/teachers/{id}",
     *      operationId="updateTeacher",
     *      tags={"Teacher"},
     *      summary="Update existing Teacher",
     *      description="Returns updated Teacher data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Teacher id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/UpdateTeacherRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/TeacherResource")
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
    public function update(UpdateTeacherRequest $request, $id): JsonResponse
    {
        $teacher = $this->service->update($id, $request->validated());

        return $this->sendResponse(new TeacherResource($teacher), __('teachers.messages.updated'));
    }

    /**
     * @OA\Delete(
     *      path="/api/teachers/{id}",
     *      operationId="deleteTeacher",
     *      tags={"Teacher"},
     *      summary="Delete existing Teacher",
     *      description="Deletes a record and returns no content",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Teacher id",
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

        return $this->sendResponse([], __('teachers.messages.deleted'), 204);
    }
}
