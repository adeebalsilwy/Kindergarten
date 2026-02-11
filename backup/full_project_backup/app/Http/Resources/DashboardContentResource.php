<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="DashboardContentResource",
 *     description="DashboardContent resource",
 *
 *     @OA\Xml(name="DashboardContentResource")
 * )
 */
class DashboardContentResource extends JsonResource
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
            'section' => $this->section,
            'key' => $this->key,
            'content' => $this->content,
            'is_active' => $this->is_active,
            'order' => $this->order,
            'metadata' => $this->metadata,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
