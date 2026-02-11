<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Traits\Filterable;

class Guardian extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $searchable = ['name', 'phone', 'email', 'national_id'];

    protected $fillable = [
        'name',
        'phone',
        'address',
        'relationship',
        'email',
        'secondary_phone',
        'occupation',
        'workplace',
        'is_primary_emergency_contact',
        'is_primary_guardian',
        'bank_account_number',
        'bank_name',
        'preferred_language',
        'receives_sms_notifications',
        'receives_email_notifications',
        'date_of_birth',
        'national_id',
        'passport_number',
        'is_active',
        'last_login_at',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'last_login_at' => 'datetime',
        'is_primary_emergency_contact' => 'boolean',
        'is_primary_guardian' => 'boolean',
        'is_active' => 'boolean',
        'receives_sms_notifications' => 'boolean',
        'receives_email_notifications' => 'boolean',
        'deleted_at' => 'datetime',
    ];

    protected $appends = [
        'slug',
        'full_name',
    ];

    // Model Events
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($guardian) {
            $guardian->is_primary_guardian = $guardian->is_primary_guardian ?? false;
        });
    }

    // Relationships
    public function children(): HasMany
    {
        return $this->hasMany(Children::class, 'parent_id');
    }

    public function secondChildren(): HasMany
    {
        return $this->hasMany(Children::class, 'second_parent_id');
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

    public function getFullAddressAttribute(): string
    {
        return trim($this->address ?? '');
    }

    public function getChildrenCountAttribute(): int
    {
        return $this->children()->count() + $this->secondChildren()->count();
    }

    // Mutators
    public function setPhoneAttribute($value)
    {
        // Add '+' prefix if not already present
        if ($value && !str_starts_with($value, '+')) {
            $value = '+' . $value;
        }
        $this->attributes['phone'] = $value;
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower(trim($value));
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords(strtolower($value));
    }
}
