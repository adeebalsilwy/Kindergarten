<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Filterable;

class Children extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = 'children';

    protected $searchable = [
        'name',
        'emergency_contact_name',
        'emergency_contact_phone',
        'nationality',
    ];

    protected $fillable = [
        'name',
        'dob',
        'gender',
        'class_id',
        'parent_id',
        'second_parent_id',
        'photo_path',
        'fees_required',
        'fees_paid',
        'emergency_contact_name',
        'emergency_contact_phone',
        'emergency_contact_relation',
        'medical_conditions',
        'allergies',
        'medications',
        'blood_type',
        'enrollment_date',
        'expected_graduation_date',
        'enrollment_status',
        'nationality',
        'religion',
        'special_needs',
        'last_attended_at',
    ];

    protected $casts = [
        'dob' => 'datetime',
        'enrollment_date' => 'datetime',
        'expected_graduation_date' => 'datetime',
        'last_attended_at' => 'datetime',
        'fees_required' => 'decimal:2',
        'fees_paid' => 'decimal:2',
    ];

    protected $appends = [
        'slug',
        'age',
        'balance',
        'is_active',
    ];

    // Model Events
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($child) {
            $child->enrollment_date = $child->enrollment_date ?? now();
            $child->enrollment_status = $child->enrollment_status ?? 'active';
        });
    }

    // Relationships
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Guardian::class, 'parent_id');
    }

    public function secondParent(): BelongsTo
    {
        return $this->belongsTo(Guardian::class, 'second_parent_id');
    }

    public function class(): BelongsTo
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class, 'child_id');
    }

    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class, 'child_id');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'child_id');
    }

    public function activities(): BelongsToMany
    {
        return $this->belongsToMany(Activity::class, 'activity_child', 'child_id', 'activity_id')
            ->withTimestamps();
    }

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, 'event_child', 'child_id', 'event_id')
            ->withTimestamps();
    }

    // Accessors
    public function getSlugAttribute(): string
    {
        return \Illuminate\Support\Str::slug($this->name);
    }

    public function getAgeAttribute(): int
    {
        return $this->dob ? $this->dob->age : 0;
    }

    public function getBalanceAttribute(): float
    {
        return $this->fees_required - $this->fees_paid;
    }

    public function getIsActiveAttribute(): bool
    {
        return $this->enrollment_status === 'active';
    }

    // Mutators
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst(strtolower($value));
    }

    public function setEmergencyContactPhoneAttribute($value)
    {
        $this->attributes['emergency_contact_phone'] = preg_replace('/[^0-9]/', '', $value);
    }

    public function setEnrollmentStatusAttribute($value)
    {
        $this->attributes['enrollment_status'] = strtolower($value);
    }
}
