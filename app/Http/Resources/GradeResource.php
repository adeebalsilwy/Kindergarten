<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="GradeResource",
 *     description="Grade resource",
 *
 *     @OA\Xml(name="GradeResource")
 * )
 */
class GradeResource extends JsonResource
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
            'child_id' => $this->child_id,
            'subject' => $this->subject,
            'score' => $this->score,
            'date' => $this->date,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
