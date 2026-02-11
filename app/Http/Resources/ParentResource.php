<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="ParentResource",
 *     description="Parent resource",
 *
 *     @OA\Xml(name="ParentResource")
 * )
 */
class ParentResource extends JsonResource
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
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
            'relation' => $this->relation,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
