<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreFinancialReportRequest;
use App\Http\Requests\UpdateFinancialReportRequest;
use App\Http\Resources\FinancialReportResource;
use App\Services\FinancialReportService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="FinancialReport", description="API Endpoints for FinancialReport")
 */
class FinancialReportApiController extends BaseApiController
{
    protected $service;

    public function __construct(FinancialReportService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/financial_reports",
     *      operationId="getFinancialReportList",
     *      tags={"FinancialReport"},
     *      summary="Get list of FinancialReport",
     *      description="Returns list of FinancialReport",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/FinancialReportResource"))
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
        $financialReports = $this->service->all();

        return $this->sendResponse(FinancialReportResource::collection($financialReports), __('financial_reports.messages.retrieved'));
    }

    /**
     * @OA\Post(
     *      path="/api/financial_reports",
     *      operationId="storeFinancialReport",
     *      tags={"FinancialReport"},
     *      summary="Store new FinancialReport",
     *      description="Returns created FinancialReport data",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/StoreFinancialReportRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/FinancialReportResource")
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
    public function store(StoreFinancialReportRequest $request): JsonResponse
    {
        $financialReports = $this->service->create($request->validated());

        return $this->sendResponse(new FinancialReportResource($financialReports), __('financial_reports.messages.created'), 201);
    }

    /**
     * @OA\Get(
     *      path="/api/financial_reports/{id}",
     *      operationId="getFinancialReportById",
     *      tags={"FinancialReport"},
     *      summary="Get FinancialReport information",
     *      description="Returns FinancialReport data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="FinancialReport id",
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
     *          @OA\JsonContent(ref="#/components/schemas/FinancialReportResource")
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
        $financialReports = $this->service->find($id);
        if (! $financialReports) {
            return $this->sendError(__('global.not_found'));
        }

        return $this->sendResponse(new FinancialReportResource($financialReports), __('financial_reports.messages.retrieved'));
    }

    /**
     * @OA\Put(
     *      path="/api/financial_reports/{id}",
     *      operationId="updateFinancialReport",
     *      tags={"FinancialReport"},
     *      summary="Update existing FinancialReport",
     *      description="Returns updated FinancialReport data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="FinancialReport id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/UpdateFinancialReportRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/FinancialReportResource")
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
    public function update(UpdateFinancialReportRequest $request, $id): JsonResponse
    {
        $financialReports = $this->service->update($id, $request->validated());

        return $this->sendResponse(new FinancialReportResource($financialReports), __('financial_reports.messages.updated'));
    }

    /**
     * @OA\Delete(
     *      path="/api/financial_reports/{id}",
     *      operationId="deleteFinancialReport",
     *      tags={"FinancialReport"},
     *      summary="Delete existing FinancialReport",
     *      description="Deletes a record and returns no content",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="FinancialReport id",
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

        return $this->sendResponse([], __('financial_reports.messages.deleted'), 204);
    }
}
