<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="ChildrenResource",
 *     description="Children resource",
 *
 *     @OA\Xml(name="ChildrenResource")
 * )
 */
class ChildrenResource extends JsonResource
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
            'dob' => $this->dob,
            'gender' => $this->gender,
            'class_grade' => $this->class_grade,
            'parent_id' => $this->parent_id,
            'photo_path' => $this->photo_path,
            'fees_required' => $this->fees_required,
            'fees_paid' => $this->fees_paid,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
