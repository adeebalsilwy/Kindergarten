<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreDashboardContentRequest;
use App\Http\Requests\UpdateDashboardContentRequest;
use App\Http\Resources\DashboardContentResource;
use App\Services\DashboardContentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="DashboardContent", description="API Endpoints for DashboardContent")
 */
class DashboardContentApiController extends BaseApiController
{
    protected $service;

    public function __construct(DashboardContentService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/dashboard_contents",
     *      operationId="getDashboardContentList",
     *      tags={"DashboardContent"},
     *      summary="Get list of DashboardContent",
     *      description="Returns list of DashboardContent",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/DashboardContentResource"))
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
        $dashboardContents = $this->service->all();

        return $this->sendResponse(DashboardContentResource::collection($dashboardContents), __('dashboard_contents.messages.retrieved'));
    }

    /**
     * @OA\Post(
     *      path="/api/dashboard_contents",
     *      operationId="storeDashboardContent",
     *      tags={"DashboardContent"},
     *      summary="Store new DashboardContent",
     *      description="Returns created DashboardContent data",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/StoreDashboardContentRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/DashboardContentResource")
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
    public function store(StoreDashboardContentRequest $request): JsonResponse
    {
        $dashboardContent = $this->service->create($request->validated());

        return $this->sendResponse(new DashboardContentResource($dashboardContent), __('dashboard_contents.messages.created'), 201);
    }

    /**
     * @OA\Get(
     *      path="/api/dashboard_contents/{id}",
     *      operationId="getDashboardContentById",
     *      tags={"DashboardContent"},
     *      summary="Get DashboardContent information",
     *      description="Returns DashboardContent data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="DashboardContent id",
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
     *          @OA\JsonContent(ref="#/components/schemas/DashboardContentResource")
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
        $dashboardContent = $this->service->find($id);
        if (! $dashboardContent) {
            return $this->sendError(__('global.not_found'));
        }

        return $this->sendResponse(new DashboardContentResource($dashboardContent), __('dashboard_contents.messages.retrieved'));
    }

    /**
     * @OA\Put(
     *      path="/api/dashboard_contents/{id}",
     *      operationId="updateDashboardContent",
     *      tags={"DashboardContent"},
     *      summary="Update existing DashboardContent",
     *      description="Returns updated DashboardContent data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="DashboardContent id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/UpdateDashboardContentRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/DashboardContentResource")
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
    public function update(UpdateDashboardContentRequest $request, $id): JsonResponse
    {
        $dashboardContent = $this->service->update($id, $request->validated());

        return $this->sendResponse(new DashboardContentResource($dashboardContent), __('dashboard_contents.messages.updated'));
    }

    /**
     * @OA\Delete(
     *      path="/api/dashboard_contents/{id}",
     *      operationId="deleteDashboardContent",
     *      tags={"DashboardContent"},
     *      summary="Delete existing DashboardContent",
     *      description="Deletes a record and returns no content",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="DashboardContent id",
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

        return $this->sendResponse([], __('dashboard_contents.messages.deleted'), 204);
    }
}
