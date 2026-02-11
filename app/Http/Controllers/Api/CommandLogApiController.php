<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreCommandLogRequest;
use App\Http\Requests\UpdateCommandLogRequest;
use App\Http\Resources\CommandLogResource;
use App\Services\CommandLogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="CommandLog", description="API Endpoints for CommandLog")
 */
class CommandLogApiController extends BaseApiController
{
    protected $service;

    public function __construct(CommandLogService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/command_logs",
     *      operationId="getCommandLogList",
     *      tags={"CommandLog"},
     *      summary="Get list of CommandLog",
     *      description="Returns list of CommandLog",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/CommandLogResource"))
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
        $commandLogs = $this->service->all();

        return $this->sendResponse(CommandLogResource::collection($commandLogs), __('command_logs.messages.retrieved'));
    }

    /**
     * @OA\Post(
     *      path="/api/command_logs",
     *      operationId="storeCommandLog",
     *      tags={"CommandLog"},
     *      summary="Store new CommandLog",
     *      description="Returns created CommandLog data",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/StoreCommandLogRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/CommandLogResource")
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
    public function store(StoreCommandLogRequest $request): JsonResponse
    {
        $commandLog = $this->service->create($request->validated());

        return $this->sendResponse(new CommandLogResource($commandLog), __('command_logs.messages.created'), 201);
    }

    /**
     * @OA\Get(
     *      path="/api/command_logs/{id}",
     *      operationId="getCommandLogById",
     *      tags={"CommandLog"},
     *      summary="Get CommandLog information",
     *      description="Returns CommandLog data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="CommandLog id",
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
     *          @OA\JsonContent(ref="#/components/schemas/CommandLogResource")
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
        $commandLog = $this->service->find($id);
        if (! $commandLog) {
            return $this->sendError(__('global.not_found'));
        }

        return $this->sendResponse(new CommandLogResource($commandLog), __('command_logs.messages.retrieved'));
    }

    /**
     * @OA\Put(
     *      path="/api/command_logs/{id}",
     *      operationId="updateCommandLog",
     *      tags={"CommandLog"},
     *      summary="Update existing CommandLog",
     *      description="Returns updated CommandLog data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="CommandLog id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/UpdateCommandLogRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/CommandLogResource")
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
    public function update(UpdateCommandLogRequest $request, $id): JsonResponse
    {
        $commandLog = $this->service->update($id, $request->validated());

        return $this->sendResponse(new CommandLogResource($commandLog), __('command_logs.messages.updated'));
    }

    /**
     * @OA\Delete(
     *      path="/api/command_logs/{id}",
     *      operationId="deleteCommandLog",
     *      tags={"CommandLog"},
     *      summary="Delete existing CommandLog",
     *      description="Deletes a record and returns no content",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="CommandLog id",
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

        return $this->sendResponse([], __('command_logs.messages.deleted'), 204);
    }
}
