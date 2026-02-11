<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="AttendanceResource",
 *     description="Attendance resource",
 *
 *     @OA\Xml(name="AttendanceResource")
 * )
 */
class AttendanceResource extends JsonResource
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
            'date' => $this->date,
            'status' => $this->status,
            'notes' => $this->notes,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
