<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="ClassesResource",
 *     description="Classes resource",
 *
 *     @OA\Xml(name="ClassesResource")
 * )
 */
class ClassesResource extends JsonResource
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
            'code' => $this->code,
            'description' => $this->description,
            'teacher_id' => $this->teacher_id,
            'age_group' => $this->age_group,
            'capacity' => $this->capacity,
            'current_students' => $this->current_students,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'room_number' => $this->room_number,
            'monthly_fee' => $this->monthly_fee,
            'is_active' => $this->is_active,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
