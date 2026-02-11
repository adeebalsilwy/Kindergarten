<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Http\Resources\AttendanceResource;
use App\Services\AttendanceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="Attendance", description="API Endpoints for Attendance")
 */
class AttendanceApiController extends BaseApiController
{
    protected $service;

    public function __construct(AttendanceService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/attendances",
     *      operationId="getAttendanceList",
     *      tags={"Attendance"},
     *      summary="Get list of Attendance",
     *      description="Returns list of Attendance",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/AttendanceResource"))
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
        $attendances = $this->service->all();

        return $this->sendResponse(AttendanceResource::collection($attendances), __('attendances.messages.retrieved'));
    }

    /**
     * @OA\Post(
     *      path="/api/attendances",
     *      operationId="storeAttendance",
     *      tags={"Attendance"},
     *      summary="Store new Attendance",
     *      description="Returns created Attendance data",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/StoreAttendanceRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/AttendanceResource")
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
    public function store(StoreAttendanceRequest $request): JsonResponse
    {
        $attendance = $this->service->create($request->validated());

        return $this->sendResponse(new AttendanceResource($attendance), __('attendances.messages.created'), 201);
    }

    /**
     * @OA\Get(
     *      path="/api/attendances/{id}",
     *      operationId="getAttendanceById",
     *      tags={"Attendance"},
     *      summary="Get Attendance information",
     *      description="Returns Attendance data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Attendance id",
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
     *          @OA\JsonContent(ref="#/components/schemas/AttendanceResource")
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
        $attendance = $this->service->find($id);
        if (! $attendance) {
            return $this->sendError(__('global.not_found'));
        }

        return $this->sendResponse(new AttendanceResource($attendance), __('attendances.messages.retrieved'));
    }

    /**
     * @OA\Put(
     *      path="/api/attendances/{id}",
     *      operationId="updateAttendance",
     *      tags={"Attendance"},
     *      summary="Update existing Attendance",
     *      description="Returns updated Attendance data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Attendance id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/UpdateAttendanceRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/AttendanceResource")
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
    public function update(UpdateAttendanceRequest $request, $id): JsonResponse
    {
        $attendance = $this->service->update($id, $request->validated());

        return $this->sendResponse(new AttendanceResource($attendance), __('attendances.messages.updated'));
    }

    /**
     * @OA\Delete(
     *      path="/api/attendances/{id}",
     *      operationId="deleteAttendance",
     *      tags={"Attendance"},
     *      summary="Delete existing Attendance",
     *      description="Deletes a record and returns no content",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Attendance id",
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

        return $this->sendResponse([], __('attendances.messages.deleted'), 204);
    }
}
