<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="TeacherResource",
 *     description="Teacher resource",
 *
 *     @OA\Xml(name="TeacherResource")
 * )
 */
class TeacherResource extends JsonResource
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
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'qualification' => $this->qualification,
            'experience' => $this->experience,
            'salary' => $this->salary,
            'hire_date' => $this->hire_date,
            'photo_path' => $this->photo_path,
            'is_active' => $this->is_active,
            'notes' => $this->notes,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
