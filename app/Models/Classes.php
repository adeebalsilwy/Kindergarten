<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Traits\Filterable;

class Classes extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $searchable = ['name', 'code', 'description', 'room_number'];

    protected $fillable = [
        'name',
        'code',
        'description',
        'teacher_id',
        'grade_level_id',
        'age_group',
        'capacity',
        'current_students',
        'start_time',
        'end_time',
        'room_number',
        'monthly_fee',
        'is_active',
        'curriculum',
    ];

    protected $casts = [
        'capacity' => 'integer',
        'current_students' => 'integer',
        'monthly_fee' => 'decimal:2',
        'is_active' => 'boolean',
        'deleted_at' => 'datetime',
    ];

    protected $appends = [
        'slug',
        'enrollment_count',
        'available_spots',
        'is_full',
    ];

    // Model Events
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($class) {
            $class->is_active = $class->is_active ?? true;
        });
    }

    // Relationships
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function gradeLevel(): BelongsTo
    {
        return $this->belongsTo(GradeLevel::class, 'grade_level_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Children::class, 'class_id');
    }

    public function attendances(): HasManyThrough
    {
        return $this->hasManyThrough(Attendance::class, Children::class, 'class_id', 'child_id');
    }

    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class, 'class_id');
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class, 'class_id');
    }

    // public function curriculum(): BelongsTo
    // {
    //     return $this->belongsTo(Curriculum::class, 'curriculum_id');
    // }

    public function enrolledChildren(): BelongsToMany
    {
        return $this->belongsToMany(Children::class, 'class_enrollments', 'class_id', 'child_id')
            ->withTimestamps();
    }

    // Accessors
    public function getSlugAttribute(): string
    {
        return Str::slug($this->name);
    }

    public function getEnrollmentCountAttribute(): int
    {
        return $this->children()->count();
    }

    public function getAvailableSpotsAttribute(): int
    {
        return max(0, $this->capacity - $this->enrollment_count);
    }

    public function getIsFullAttribute(): bool
    {
        return $this->available_spots <= 0;
    }

    // Mutators
    public function setNameAttribute($value)
    {
        // Capitalize first letter of each word while preserving existing capitalization
        $this->attributes['name'] = ucwords($value);
    }

    public function getGradeLevelNameAttribute(): string
    {
        return $this->gradeLevel->name ?? '';
    }


}
