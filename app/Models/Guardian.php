<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Guardian extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'relationship',
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
        'notes',
    ];

    protected $casts = [
        'is_primary_guardian' => 'boolean',
        'is_primary_emergency_contact' => 'boolean',
        'receives_sms_notifications' => 'boolean',
        'receives_email_notifications' => 'boolean',
        'is_active' => 'boolean',
        'date_of_birth' => 'date',
        'last_login_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected $appends = [
        'slug',
        'full_address',
        'children_count',
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
        $this->attributes['phone'] = preg_replace('/[^0-9]/', '', $value);
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower(trim($value));
    }
}
