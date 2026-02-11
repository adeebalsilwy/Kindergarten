<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Http\Resources\ExpenseResource;
use App\Services\ExpenseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="Expense", description="API Endpoints for Expense")
 */
class ExpenseApiController extends BaseApiController
{
    protected $service;

    public function __construct(ExpenseService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/expenses",
     *      operationId="getExpenseList",
     *      tags={"Expense"},
     *      summary="Get list of Expense",
     *      description="Returns list of Expense",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/ExpenseResource"))
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
        $expenses = $this->service->all();

        return $this->sendResponse(ExpenseResource::collection($expenses), __('expenses.messages.retrieved'));
    }

    /**
     * @OA\Post(
     *      path="/api/expenses",
     *      operationId="storeExpense",
     *      tags={"Expense"},
     *      summary="Store new Expense",
     *      description="Returns created Expense data",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/StoreExpenseRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/ExpenseResource")
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
    public function store(StoreExpenseRequest $request): JsonResponse
    {
        $expenses = $this->service->create($request->validated());

        return $this->sendResponse(new ExpenseResource($expenses), __('expenses.messages.created'), 201);
    }

    /**
     * @OA\Get(
     *      path="/api/expenses/{id}",
     *      operationId="getExpenseById",
     *      tags={"Expense"},
     *      summary="Get Expense information",
     *      description="Returns Expense data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Expense id",
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
     *          @OA\JsonContent(ref="#/components/schemas/ExpenseResource")
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
        $expenses = $this->service->find($id);
        if (! $expenses) {
            return $this->sendError(__('global.not_found'));
        }

        return $this->sendResponse(new ExpenseResource($expenses), __('expenses.messages.retrieved'));
    }

    /**
     * @OA\Put(
     *      path="/api/expenses/{id}",
     *      operationId="updateExpense",
     *      tags={"Expense"},
     *      summary="Update existing Expense",
     *      description="Returns updated Expense data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Expense id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/UpdateExpenseRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/ExpenseResource")
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
    public function update(UpdateExpenseRequest $request, $id): JsonResponse
    {
        $expenses = $this->service->update($id, $request->validated());

        return $this->sendResponse(new ExpenseResource($expenses), __('expenses.messages.updated'));
    }

    /**
     * @OA\Delete(
     *      path="/api/expenses/{id}",
     *      operationId="deleteExpense",
     *      tags={"Expense"},
     *      summary="Delete existing Expense",
     *      description="Deletes a record and returns no content",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Expense id",
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

        return $this->sendResponse([], __('expenses.messages.deleted'), 204);
    }
}
