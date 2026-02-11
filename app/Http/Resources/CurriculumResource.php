<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="CurriculumResource",
 *     description="Curriculum resource",
 *
 *     @OA\Xml(name="CurriculumResource")
 * )
 */
class CurriculumResource extends JsonResource
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
            'objectives' => $this->objectives,
            'learning_outcomes' => $this->learning_outcomes,
            'grade_level' => $this->grade_level,
            'subject_area' => $this->subject_area,
            'topics' => $this->topics,
            'materials_needed' => $this->materials_needed,
            'curriculum_type' => $this->curriculum_type,
            'duration_weeks' => $this->duration_weeks,
            'assessment_methods' => $this->assessment_methods,
            'is_active' => $this->is_active,
            'published_at' => $this->published_at,
            'created_by' => $this->created_by,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
