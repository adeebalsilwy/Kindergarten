<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreClassesRequest;
use App\Http\Requests\UpdateClassesRequest;
use App\Http\Resources\ClassesResource;
use App\Services\ClassesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="Classes", description="API Endpoints for Classes")
 */
class ClassesApiController extends BaseApiController
{
    protected $service;

    public function __construct(ClassesService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/classes",
     *      operationId="getClassesList",
     *      tags={"Classes"},
     *      summary="Get list of Classes",
     *      description="Returns list of Classes",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/ClassesResource"))
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
        $classes = $this->service->all();

        return $this->sendResponse(ClassesResource::collection($classes), __('classes.messages.retrieved'));
    }

    /**
     * @OA\Post(
     *      path="/api/classes",
     *      operationId="storeClasses",
     *      tags={"Classes"},
     *      summary="Store new Classes",
     *      description="Returns created Classes data",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/StoreClassesRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/ClassesResource")
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
    public function store(StoreClassesRequest $request): JsonResponse
    {
        $classes = $this->service->create($request->validated());

        return $this->sendResponse(new ClassesResource($classes), __('classes.messages.created'), 201);
    }

    /**
     * @OA\Get(
     *      path="/api/classes/{id}",
     *      operationId="getClassesById",
     *      tags={"Classes"},
     *      summary="Get Classes information",
     *      description="Returns Classes data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Classes id",
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
     *          @OA\JsonContent(ref="#/components/schemas/ClassesResource")
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
        $classes = $this->service->find($id);
        if (! $classes) {
            return $this->sendError(__('global.not_found'));
        }

        return $this->sendResponse(new ClassesResource($classes), __('classes.messages.retrieved'));
    }

    /**
     * @OA\Put(
     *      path="/api/classes/{id}",
     *      operationId="updateClasses",
     *      tags={"Classes"},
     *      summary="Update existing Classes",
     *      description="Returns updated Classes data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Classes id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/UpdateClassesRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/ClassesResource")
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
    public function update(UpdateClassesRequest $request, $id): JsonResponse
    {
        $classes = $this->service->update($id, $request->validated());

        return $this->sendResponse(new ClassesResource($classes), __('classes.messages.updated'));
    }

    /**
     * @OA\Delete(
     *      path="/api/classes/{id}",
     *      operationId="deleteClasses",
     *      tags={"Classes"},
     *      summary="Delete existing Classes",
     *      description="Deletes a record and returns no content",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Classes id",
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

        return $this->sendResponse([], __('classes.messages.deleted'), 204);
    }
}
