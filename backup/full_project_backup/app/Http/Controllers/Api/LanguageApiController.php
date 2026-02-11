<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;
use App\Http\Resources\LanguageResource;
use App\Services\LanguageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="Language", description="API Endpoints for Language")
 */
class LanguageApiController extends BaseApiController
{
    protected $service;

    public function __construct(LanguageService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/api/languages",
     *      operationId="getLanguageList",
     *      tags={"Language"},
     *      summary="Get list of Language",
     *      description="Returns list of Language",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/LanguageResource"))
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
        $languages = $this->service->all();

        return $this->sendResponse(LanguageResource::collection($languages), __('languages.messages.retrieved'));
    }

    /**
     * @OA\Post(
     *      path="/api/languages",
     *      operationId="storeLanguage",
     *      tags={"Language"},
     *      summary="Store new Language",
     *      description="Returns created Language data",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/StoreLanguageRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/LanguageResource")
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
    public function store(StoreLanguageRequest $request): JsonResponse
    {
        $languages = $this->service->create($request->validated());

        return $this->sendResponse(new LanguageResource($languages), __('languages.messages.created'), 201);
    }

    /**
     * @OA\Get(
     *      path="/api/languages/{id}",
     *      operationId="getLanguageById",
     *      tags={"Language"},
     *      summary="Get Language information",
     *      description="Returns Language data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Language id",
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
     *          @OA\JsonContent(ref="#/components/schemas/LanguageResource")
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
        $languages = $this->service->find($id);
        if (! $languages) {
            return $this->sendError(__('global.not_found'));
        }

        return $this->sendResponse(new LanguageResource($languages), __('languages.messages.retrieved'));
    }

    /**
     * @OA\Put(
     *      path="/api/languages/{id}",
     *      operationId="updateLanguage",
     *      tags={"Language"},
     *      summary="Update existing Language",
     *      description="Returns updated Language data",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Language id",
     *          required=true,
     *          in="path",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/UpdateLanguageRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *          @OA\JsonContent(ref="#/components/schemas/LanguageResource")
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
    public function update(UpdateLanguageRequest $request, $id): JsonResponse
    {
        $languages = $this->service->update($id, $request->validated());

        return $this->sendResponse(new LanguageResource($languages), __('languages.messages.updated'));
    }

    /**
     * @OA\Delete(
     *      path="/api/languages/{id}",
     *      operationId="deleteLanguage",
     *      tags={"Language"},
     *      summary="Delete existing Language",
     *      description="Deletes a record and returns no content",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Language id",
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

        return $this->sendResponse([], __('languages.messages.deleted'), 204);
    }
}
