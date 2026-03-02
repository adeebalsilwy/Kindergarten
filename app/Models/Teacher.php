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

class Teacher extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $searchable = [
        'name',
        'email',
        'phone',
        'specialization',
    ];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'hire_date',
        'salary',
        'qualification',
        'experience_years',
        'bio',
        'user_id',
        'specialization',
        'is_active',
    ];

    protected $casts = [
        'hire_date' => 'datetime',
        'salary' => 'decimal:2',
        'experience_years' => 'integer',
    ];

    // Override to ensure salary returns as float for testing
    public function getSalaryAttribute($value)
    {
        return (float) $value;
    }

    protected $appends = [
        'slug',
    ];

    // Model Events
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($teacher) {
            if (! $teacher->hire_date) {
                $teacher->hire_date = now();
            }
        });
    }

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function classes(): HasMany
    {
        return $this->hasMany(Classes::class, 'teacher_id');
    }

    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function getCurriculumAttribute()
    {
        // A teacher's curricula are those created by their associated user
        if ($this->user_id) {
            return \App\Models\Curriculum::where('created_by', $this->user_id)->get();
        }
        return collect(); // Return empty collection
    }
    
    public function curriculum()
    {
        // If the relation is already loaded, return it
        if ($this->relationLoaded('curriculum')) {
            return $this->getRelation('curriculum');
        }
        
        // Otherwise return a query builder
        if ($this->user_id) {
            return \App\Models\Curriculum::where('created_by', $this->user_id);
        }
        return \App\Models\Curriculum::whereRaw('1 = 0'); // Empty result
    }

    // Temporarily comment out the relationship due to missing table
    // public function assignedChildren(): BelongsToMany
    // {
    //     return $this->belongsToMany(Children::class, 'teacher_child_assignments', 'teacher_id', 'child_id')
    //         ->withTimestamps();
    // }

    public function classChildren()
    {
        // Define the relationship between Teacher and Children through Classes
        $childrenIds = collect();
        foreach ($this->classes as $class) {
            $childrenIds = $childrenIds->concat($class->children->pluck('id')->toArray());
        }
        
        // Return a query that gets the children
        return \App\Models\Children::whereIn('id', $childrenIds->unique());
    }
    
    public function getClassChildrenAttribute()
    {
        // This accessor now calls the relationship method
        return $this->classChildren()->get();
    }
    
    public function getClassChildrenCountAttribute()
    {
        // Get count of all children from classes taught by this teacher
        $childrenIds = collect();
        foreach ($this->classes as $class) {
            $childrenIds = $childrenIds->concat($class->children->pluck('id')->toArray());
        }
        
        return \App\Models\Children::whereIn('id', $childrenIds->unique())->count();
    }
    
    // Alternative method that can be called directly without accessor convention
    public function getClassChildren()
    {
        return $this->getClassChildrenAttribute();
    }
    
    public function getClassChildrenCount()
    {
        return $this->getClassChildrenCountAttribute();
    }

    // Accessors
    public function getSlugAttribute(): string
    {
        return Str::slug($this->name);
    }

    public function getFullNameAttribute(): string
    {
        return $this->name;
    }

    public function getYearsOfServiceAttribute(): int
    {
        if (! $this->hire_date) {
            return 0;
        }

        return $this->hire_date->diffInYears(now());
    }

    // Mutators
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords(strtolower($value));
    }

    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = preg_replace('/[^0-9]/', '', $value);
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower(trim($value));
    }
}