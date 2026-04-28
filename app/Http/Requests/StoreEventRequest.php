<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'start_datetime' => 'nullable|date',
            'end_datetime' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'event_type' => 'nullable|string|max:255',
            'organizer' => 'nullable|string|max:255',
            'class_id' => 'nullable',
            'teacher_id' => 'nullable',
            'attendees' => 'nullable|json',
            'requires_confirmation' => 'nullable|boolean',
            'is_public' => 'nullable|boolean',
            'is_recurring' => 'nullable|boolean',
            'recurrence_pattern' => 'nullable|string|max:255',
            'recurrence_end_date' => 'nullable|date',
            'recurring_days' => 'nullable|json',
            'status' => 'nullable|string|max:255',
            'send_reminders' => 'nullable|boolean',
            'reminder_hours_before' => 'nullable|integer',
            'documents' => 'nullable|json',
            'notes' => 'nullable|string',

        ];
    }

    protected function prepareForValidation()
    {
        $eventTitles = ['احتفال اليوم الوطني', 'حفل تخرج الأطفال', 'يوم رياضي مفتوح', 'لقاء أولياء الأمور', 'يوم الرسم والإبداع', 'زيارة ميدانية ترفيهية'];
        $eventTypes = ['celebration', 'graduation', 'sports', 'meeting', 'workshop', 'trip'];
        $organizers = ['إدارة الروضة', 'الفريق التربوي', 'مجلس أولياء الأمور'];
        $locations = ['قاعة المناسبات', 'الحديقة الخارجية', 'المسرح', 'المكتبة'];

        $this->merge([
            'title' => $this->title ?? $eventTitles[array_rand($eventTitles)],
            'description' => $this->description ?? 'فعالية ممتعة وهادفة لأطفالنا الأعزاء',
            'start_datetime' => $this->start_datetime ?? now()->addDays(rand(1, 30))->format('Y-m-d H:i:s'),
            'end_datetime' => $this->end_datetime ?? now()->addDays(rand(1, 30))->addHours(2)->format('Y-m-d H:i:s'),
            'location' => $this->location ?? $locations[array_rand($locations)],
            'event_type' => $this->event_type ?? $eventTypes[array_rand($eventTypes)],
            'organizer' => $this->organizer ?? $organizers[array_rand($organizers)],
            'class_id' => $this->class_id ?? null,
            'teacher_id' => $this->teacher_id ?? null,
            'attendees' => $this->attendees ?? json_encode(['أولياء الأمور', 'الأطفال', 'المعلمين']),
            'requires_confirmation' => $this->requires_confirmation ?? false,
            'is_public' => $this->is_public ?? true,
            'is_recurring' => $this->is_recurring ?? false,
            'recurrence_pattern' => $this->recurrence_pattern ?? null,
            'recurrence_end_date' => $this->recurrence_end_date ?? null,
            'recurring_days' => $this->recurring_days ?? null,
            'status' => $this->status ?? 'confirmed',
            'send_reminders' => $this->send_reminders ?? true,
            'reminder_hours_before' => $this->reminder_hours_before ?? 24,
            'documents' => $this->documents ?? null,
            'notes' => $this->notes ?? 'يرجى الحضور في الموعد المحدد',
            'max_attendees' => $this->max_attendees ?? rand(50, 200),
            'cost' => $this->cost ?? rand(0, 100),
            'registration_deadline' => $this->registration_deadline ?? now()->addDays(7)->format('Y-m-d H:i:s'),
        ]);
    }

    public function attributes()
    {
        return [
            'title' => __('events.fields.title'),
            'description' => __('events.fields.description'),
            'start_datetime' => __('events.fields.start_datetime'),
            'end_datetime' => __('events.fields.end_datetime'),
            'location' => __('events.fields.location'),
            'event_type' => __('events.fields.event_type'),
            'organizer' => __('events.fields.organizer'),
            'class_id' => __('events.fields.class_id'),
            'teacher_id' => __('events.fields.teacher_id'),
            'attendees' => __('events.fields.attendees'),
            'requires_confirmation' => __('events.fields.requires_confirmation'),
            'is_public' => __('events.fields.is_public'),
            'is_recurring' => __('events.fields.is_recurring'),
            'recurrence_pattern' => __('events.fields.recurrence_pattern'),
            'recurrence_end_date' => __('events.fields.recurrence_end_date'),
            'recurring_days' => __('events.fields.recurring_days'),
            'status' => __('events.fields.status'),
            'send_reminders' => __('events.fields.send_reminders'),
            'reminder_hours_before' => __('events.fields.reminder_hours_before'),
            'documents' => __('events.fields.documents'),
            'notes' => __('events.fields.notes'),

        ];
    }
}
