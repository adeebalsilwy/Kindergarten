<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="JobResource",
 *     description="Job resource",
 *
 *     @OA\Xml(name="JobResource")
 * )
 */
class JobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'queue' => $this->queue,
            'payload' => $this->payload,
            'attempts' => $this->attempts,
            'reserved_at' => $this->reserved_at,
            'available_at' => $this->available_at,
            'name' => $this->name,
            'total_jobs' => $this->total_jobs,
            'pending_jobs' => $this->pending_jobs,
            'failed_jobs' => $this->failed_jobs,
            'failed_job_ids' => $this->failed_job_ids,
            'options' => $this->options,
            'cancelled_at' => $this->cancelled_at,
            'finished_at' => $this->finished_at,
            'uuid' => $this->uuid,
            'connection' => $this->connection,
            'exception' => $this->exception,
            'failed_at' => $this->failed_at,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
