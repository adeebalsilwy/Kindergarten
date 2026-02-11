<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Activity extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'instructions',
        'class_id',
        'teacher_id',
        'curriculum_id',
        'scheduled_date',
        'start_time',
        'end_time',
        'activity_type',
        'difficulty_level',
        'required_materials',
        'estimated_duration',
        'location',
        'is_active',
        'learning_objectives',
        'outcomes',
        'completed_at',
        'notes',
    ];

    protected $casts = [
        'scheduled_date' => 'datetime',
        'required_materials' => 'array',
        'estimated_duration' => 'integer',
        'is_active' => 'boolean',
        'learning_objectives' => 'array',
        'outcomes' => 'array',
        'completed_at' => 'datetime',
        'max_participants' => 'integer',
        'deleted_at' => 'datetime',
    ];

    protected $dates = [
        'completed_at',
    ];

    protected $appends = [
        'slug',
        'participant_count',
        'is_full',
    ];

    // Model Events
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($activity) {
            $activity->is_active = $activity->is_active ?? true;
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

    public function curriculum(): BelongsTo
    {
        return $this->belongsTo(Curriculum::class, 'curriculum_id');
    }

    public function children(): BelongsToMany
    {
        return $this->belongsToMany(Children::class, 'activity_child', 'activity_id', 'child_id')
            ->withTimestamps();
    }

    // Accessors
    public function getSlugAttribute(): string
    {
        return Str::slug($this->title);
    }

    public function getParticipantCountAttribute(): int
    {
        return $this->children()->count();
    }

    public function getIsFullAttribute(): bool
    {
        return $this->max_participants && $this->participant_count >= $this->max_participants;
    }

    // Mutators
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucwords(strtolower($value));
    }


}
