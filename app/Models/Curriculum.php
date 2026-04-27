<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Curriculum extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'curricula';

    protected $fillable = [
        'name',
        'code',
        'description',
        'objectives',
        'learning_outcomes',
        'grade_level',
        'subject_area',
        'topics',
        'materials_needed',
        'curriculum_type',
        'duration_weeks',
        'assessment_methods',
        'is_active',
        'published_at',
        'created_by',
        'status',
        'prerequisites',
        'syllabus',
        'learning_objectives',
    ];

    protected $casts = [
        'topics' => 'array',
        'materials_needed' => 'array', // Keep for backward compatibility
        'duration_weeks' => 'integer',
        'assessment_methods' => 'array',
        'is_active' => 'boolean',
        'published_at' => 'datetime',
        'learning_outcomes' => 'array',
        'learning_objectives' => 'array',
        'objectives' => 'array',
        'prerequisites' => 'array',
        'deleted_at' => 'datetime',
    ];

    protected $dates = [
        'published_at',
    ];

    protected $appends = [
        'slug',
        'activity_count',
    ];

    // Model Events
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($curriculum) {
            $curriculum->status = $curriculum->status ?? 'active';
            $curriculum->is_active = $curriculum->is_active ?? false;
        });
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class, 'curriculum_id');
    }

    public function classes(): HasMany
    {
        return $this->hasMany(Classes::class, 'curriculum', 'name');
    }

    // New relationship for materials
    public function materials(): BelongsToMany
    {
        return $this->belongsToMany(Material::class, 'curriculum_materials')
                    ->withPivot(['quantity_required', 'usage_instructions'])
                    ->withTimestamps();
    }

    // Accessors
    public function getSlugAttribute(): string
    {
        return Str::slug($this->name);
    }

    public function getActivityCountAttribute(): int
    {
        return $this->activities()->count();
    }

    public function getMaterialsNeededListAttribute(): array
    {
        // Return materials from the relationship as well as legacy array
        $materials = $this->materials->pluck('name')->toArray();
        $legacyMaterials = $this->materials_needed ?? [];
        return array_merge($materials, $legacyMaterials);
    }

    // Mutators
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords(strtolower($value));
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = strtolower($value);
    }
}