<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'start_datetime',
        'end_datetime',
        'location',
        'event_type',
        'organizer',
        'class_id',
        'teacher_id',
        'attendees',
        'requires_confirmation',
        'is_public',
        'is_recurring',
        'recurrence_pattern',
        'recurrence_end_date',
        'recurring_days',
        'status',
        'send_reminders',
        'reminder_hours_before',
        'documents',
        'notes',
    ];

    protected $casts = [
        'start_datetime' => 'datetime',
        'end_datetime' => 'datetime',
        'attendees' => 'array',
        'requires_confirmation' => 'boolean',
        'is_public' => 'boolean',
        'is_recurring' => 'boolean',
        'recurrence_end_date' => 'date',
        'recurring_days' => 'array',
        'send_reminders' => 'boolean',
        'reminder_hours_before' => 'integer',
        'documents' => 'array',
        'deleted_at' => 'datetime',
    ];

    protected $appends = [
        'slug',
        'attendee_count',
        'is_full',
        'is_ongoing',
        'is_registration_open',
    ];

    // Model Events
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($event) {
            $event->status = $event->status ?? 'active';
            $event->is_public = $event->is_public ?? false;
        });
    }

    // Relationships
    public function class(): BelongsTo
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function children(): BelongsToMany
    {
        return $this->belongsToMany(Children::class, 'event_child', 'event_id', 'child_id')
            ->withTimestamps();
    }

    // Accessors
    public function getSlugAttribute(): string
    {
        return Str::slug($this->title);
    }

    public function getAttendeeCountAttribute(): int
    {
        return $this->children()->count();
    }

    public function getIsFullAttribute(): bool
    {
        return $this->max_attendees && $this->attendee_count >= $this->max_attendees;
    }

    public function getIsOngoingAttribute(): bool
    {
        return now()->between($this->start_datetime, $this->end_datetime);
    }

    public function getIsRegistrationOpenAttribute(): bool
    {
        return ! $this->registration_deadline || now()->lt($this->registration_deadline);
    }

    // Mutators
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucwords(strtolower($value));
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = strtolower($value);
    }
}
