<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="EventResource",
 *     description="Event resource",
 *
 *     @OA\Xml(name="EventResource")
 * )
 */
class EventResource extends JsonResource
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
            'start_datetime' => $this->start_datetime,
            'end_datetime' => $this->end_datetime,
            'location' => $this->location,
            'event_type' => $this->event_type,
            'organizer' => $this->organizer,
            'class_id' => $this->class_id,
            'teacher_id' => $this->teacher_id,
            'attendees' => $this->attendees,
            'requires_confirmation' => $this->requires_confirmation,
            'is_public' => $this->is_public,
            'is_recurring' => $this->is_recurring,
            'recurrence_pattern' => $this->recurrence_pattern,
            'recurrence_end_date' => $this->recurrence_end_date,
            'recurring_days' => $this->recurring_days,
            'status' => $this->status,
            'send_reminders' => $this->send_reminders,
            'reminder_hours_before' => $this->reminder_hours_before,
            'documents' => $this->documents,
            'notes' => $this->notes,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
