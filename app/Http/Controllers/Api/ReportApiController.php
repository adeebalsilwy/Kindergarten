<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Http\Resources\ReportResource;
use App\Services\ReportService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="Report", description="API Endpoints for Report")
 */
class ReportApiController extends BaseApiController
{
    protected $service;

    public function __construct(ReportService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/reports",
     *      operationId="getReportList",
     *      tags={"Report"},
     *      summary="Get list of Report",
     *      description="Returns list of Report",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/ReportResource"))
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
        $reports = $this->service->all();

        return $this->sendResponse(ReportResource::collection($reports), __('reports.messages.retrieved'));
    }

    /**
     * @OA\Post(
     *      path="/api/reports",
     *      operationId="storeReport",
     *      tags={"Report"},
     *      summary="Store new Report",
     *      description="Returns created Report data",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/StoreReportRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/ReportResource")
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
    public function store(StoreReportRequest $request): JsonResponse
    {
        $report = $this->service->create($request->validated());

        return $this->sendResponse(new ReportResource($report), __('reports.messages.created'), 201);
    }

    /**
     * @OA\Get(
     *      path="/api/reports/{id}",
     *      operationId="getReportById",
     *      tags={"Report"},
     *      summary="Get Report information",
     *      description="Returns Report data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Report id",
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
     *          @OA\JsonContent(ref="#/components/schemas/ReportResource")
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
        $report = $this->service->find($id);
        if (! $report) {
            return $this->sendError(__('global.not_found'));
        }

        return $this->sendResponse(new ReportResource($report), __('reports.messages.retrieved'));
    }

    /**
     * @OA\Put(
     *      path="/api/reports/{id}",
     *      operationId="updateReport",
     *      tags={"Report"},
     *      summary="Update existing Report",
     *      description="Returns updated Report data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Report id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/UpdateReportRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/ReportResource")
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
    public function update(UpdateReportRequest $request, $id): JsonResponse
    {
        $report = $this->service->update($id, $request->validated());

        return $this->sendResponse(new ReportResource($report), __('reports.messages.updated'));
    }

    /**
     * @OA\Delete(
     *      path="/api/reports/{id}",
     *      operationId="deleteReport",
     *      tags={"Report"},
     *      summary="Delete existing Report",
     *      description="Deletes a record and returns no content",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Report id",
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

        return $this->sendResponse([], __('reports.messages.deleted'), 204);
    }
}
