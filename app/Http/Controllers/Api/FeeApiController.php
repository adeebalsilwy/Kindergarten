<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreFeeRequest;
use App\Http\Requests\UpdateFeeRequest;
use App\Http\Resources\FeeResource;
use App\Services\FeeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="Fee", description="API Endpoints for Fee")
 */
class FeeApiController extends BaseApiController
{
    protected $service;

    public function __construct(FeeService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/fees",
     *      operationId="getFeeList",
     *      tags={"Fee"},
     *      summary="Get list of Fee",
     *      description="Returns list of Fee",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/FeeResource"))
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
        $fees = $this->service->all();

        return $this->sendResponse(FeeResource::collection($fees), __('fees.messages.retrieved'));
    }

    /**
     * @OA\Post(
     *      path="/api/fees",
     *      operationId="storeFee",
     *      tags={"Fee"},
     *      summary="Store new Fee",
     *      description="Returns created Fee data",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/StoreFeeRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/FeeResource")
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
    public function store(StoreFeeRequest $request): JsonResponse
    {
        $fee = $this->service->create($request->validated());

        return $this->sendResponse(new FeeResource($fee), __('fees.messages.created'), 201);
    }

    /**
     * @OA\Get(
     *      path="/api/fees/{id}",
     *      operationId="getFeeById",
     *      tags={"Fee"},
     *      summary="Get Fee information",
     *      description="Returns Fee data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Fee id",
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
     *          @OA\JsonContent(ref="#/components/schemas/FeeResource")
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
        $fee = $this->service->find($id);
        if (! $fee) {
            return $this->sendError(__('global.not_found'));
        }

        return $this->sendResponse(new FeeResource($fee), __('fees.messages.retrieved'));
    }

    /**
     * @OA\Put(
     *      path="/api/fees/{id}",
     *      operationId="updateFee",
     *      tags={"Fee"},
     *      summary="Update existing Fee",
     *      description="Returns updated Fee data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Fee id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/UpdateFeeRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/FeeResource")
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
    public function update(UpdateFeeRequest $request, $id): JsonResponse
    {
        $fee = $this->service->update($id, $request->validated());

        return $this->sendResponse(new FeeResource($fee), __('fees.messages.updated'));
    }

    /**
     * @OA\Delete(
     *      path="/api/fees/{id}",
     *      operationId="deleteFee",
     *      tags={"Fee"},
     *      summary="Delete existing Fee",
     *      description="Deletes a record and returns no content",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Fee id",
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

        return $this->sendResponse([], __('fees.messages.deleted'), 204);
    }
}
