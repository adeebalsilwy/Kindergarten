<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="CacheResource",
 *     description="Cache resource",
 *
 *     @OA\Xml(name="CacheResource")
 * )
 */
class CacheResource extends JsonResource
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
            'key' => $this->key,
            'value' => $this->value,
            'expiration' => $this->expiration,
            'owner' => $this->owner,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
