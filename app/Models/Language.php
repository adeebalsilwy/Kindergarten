<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'is_rtl',
        'is_active',
    ];

    protected $casts = [
        'is_rtl' => 'boolean',
        'is_active' => 'boolean',
        'deleted_at' => 'datetime',
    ];

    protected $appends = [
        'slug',
        'display_name',
        'direction',
    ];

    // Accessors
    public function getSlugAttribute(): string
    {
        return \Illuminate\Support\Str::slug($this->name);
    }

    public function getDisplayNameAttribute(): string
    {
        return $this->name;
    }

    public function getDirectionAttribute(): string
    {
        return $this->is_rtl ? 'rtl' : 'ltr';
    }
}
