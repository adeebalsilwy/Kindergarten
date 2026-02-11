<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreAccountingEntryRequest;
use App\Http\Requests\UpdateAccountingEntryRequest;
use App\Http\Resources\AccountingEntryResource;
use App\Services\AccountingEntryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="AccountingEntry", description="API Endpoints for AccountingEntry")
 */
class AccountingEntryApiController extends BaseApiController
{
    protected $service;

    public function __construct(AccountingEntryService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/accounting_entries",
     *      operationId="getAccountingEntryList",
     *      tags={"AccountingEntry"},
     *      summary="Get list of AccountingEntry",
     *      description="Returns list of AccountingEntry",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/AccountingEntryResource"))
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
        $accountingEntries = $this->service->all();

        return $this->sendResponse(AccountingEntryResource::collection($accountingEntries), __('accounting_entries.messages.retrieved'));
    }

    /**
     * @OA\Post(
     *      path="/api/accounting_entries",
     *      operationId="storeAccountingEntry",
     *      tags={"AccountingEntry"},
     *      summary="Store new AccountingEntry",
     *      description="Returns created AccountingEntry data",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/StoreAccountingEntryRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/AccountingEntryResource")
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
    public function store(StoreAccountingEntryRequest $request): JsonResponse
    {
        $accountingEntries = $this->service->create($request->validated());

        return $this->sendResponse(new AccountingEntryResource($accountingEntries), __('accounting_entries.messages.created'), 201);
    }

    /**
     * @OA\Get(
     *      path="/api/accounting_entries/{id}",
     *      operationId="getAccountingEntryById",
     *      tags={"AccountingEntry"},
     *      summary="Get AccountingEntry information",
     *      description="Returns AccountingEntry data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="AccountingEntry id",
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
     *          @OA\JsonContent(ref="#/components/schemas/AccountingEntryResource")
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
        $accountingEntries = $this->service->find($id);
        if (! $accountingEntries) {
            return $this->sendError(__('global.not_found'));
        }

        return $this->sendResponse(new AccountingEntryResource($accountingEntries), __('accounting_entries.messages.retrieved'));
    }

    /**
     * @OA\Put(
     *      path="/api/accounting_entries/{id}",
     *      operationId="updateAccountingEntry",
     *      tags={"AccountingEntry"},
     *      summary="Update existing AccountingEntry",
     *      description="Returns updated AccountingEntry data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="AccountingEntry id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/UpdateAccountingEntryRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/AccountingEntryResource")
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
    public function update(UpdateAccountingEntryRequest $request, $id): JsonResponse
    {
        $accountingEntries = $this->service->update($id, $request->validated());

        return $this->sendResponse(new AccountingEntryResource($accountingEntries), __('accounting_entries.messages.updated'));
    }

    /**
     * @OA\Delete(
     *      path="/api/accounting_entries/{id}",
     *      operationId="deleteAccountingEntry",
     *      tags={"AccountingEntry"},
     *      summary="Delete existing AccountingEntry",
     *      description="Deletes a record and returns no content",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="AccountingEntry id",
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

        return $this->sendResponse([], __('accounting_entries.messages.deleted'), 204);
    }
}
