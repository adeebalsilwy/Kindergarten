<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="ActivityResource",
 *     description="Activity resource",
 *
 *     @OA\Xml(name="ActivityResource")
 * )
 */
class ActivityResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'instructions' => $this->instructions,
            'class_id' => $this->class_id,
            'teacher_id' => $this->teacher_id,
            'curriculum_id' => $this->curriculum_id,
            'scheduled_date' => $this->scheduled_date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'activity_type' => $this->activity_type,
            'difficulty_level' => $this->difficulty_level,
            'required_materials' => $this->required_materials,
            'estimated_duration' => $this->estimated_duration,
            'location' => $this->location,
            'is_active' => $this->is_active,
            'learning_objectives' => $this->learning_objectives,
            'outcomes' => $this->outcomes,
            'completed_at' => $this->completed_at,
            'notes' => $this->notes,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
