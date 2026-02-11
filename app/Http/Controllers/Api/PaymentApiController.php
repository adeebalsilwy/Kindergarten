<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Http\Resources\PaymentResource;
use App\Services\PaymentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="Payment", description="API Endpoints for Payment")
 */
class PaymentApiController extends BaseApiController
{
    protected $service;

    public function __construct(PaymentService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/payments",
     *      operationId="getPaymentList",
     *      tags={"Payment"},
     *      summary="Get list of Payment",
     *      description="Returns list of Payment",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/PaymentResource"))
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
        $payments = $this->service->all();

        return $this->sendResponse(PaymentResource::collection($payments), __('payments.messages.retrieved'));
    }

    /**
     * @OA\Post(
     *      path="/api/payments",
     *      operationId="storePayment",
     *      tags={"Payment"},
     *      summary="Store new Payment",
     *      description="Returns created Payment data",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/StorePaymentRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/PaymentResource")
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
    public function store(StorePaymentRequest $request): JsonResponse
    {
        $payment = $this->service->create($request->validated());

        return $this->sendResponse(new PaymentResource($payment), __('payments.messages.created'), 201);
    }

    /**
     * @OA\Get(
     *      path="/api/payments/{id}",
     *      operationId="getPaymentById",
     *      tags={"Payment"},
     *      summary="Get Payment information",
     *      description="Returns Payment data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Payment id",
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
     *          @OA\JsonContent(ref="#/components/schemas/PaymentResource")
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
        $payment = $this->service->find($id);
        if (! $payment) {
            return $this->sendError(__('global.not_found'));
        }

        return $this->sendResponse(new PaymentResource($payment), __('payments.messages.retrieved'));
    }

    /**
     * @OA\Put(
     *      path="/api/payments/{id}",
     *      operationId="updatePayment",
     *      tags={"Payment"},
     *      summary="Update existing Payment",
     *      description="Returns updated Payment data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Payment id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/UpdatePaymentRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/PaymentResource")
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
    public function update(UpdatePaymentRequest $request, $id): JsonResponse
    {
        $payment = $this->service->update($id, $request->validated());

        return $this->sendResponse(new PaymentResource($payment), __('payments.messages.updated'));
    }

    /**
     * @OA\Delete(
     *      path="/api/payments/{id}",
     *      operationId="deletePayment",
     *      tags={"Payment"},
     *      summary="Delete existing Payment",
     *      description="Deletes a record and returns no content",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Payment id",
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

        return $this->sendResponse([], __('payments.messages.deleted'), 204);
    }
}
