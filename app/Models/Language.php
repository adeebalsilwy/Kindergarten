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

    public function getDisplayNameAttribute()
    {
        return $this->name;
    }

    public function getDirectionAttribute()
    {
        return $this->is_rtl ? 'rtl' : 'ltr';
    }

    public function getSlugAttribute()
    {
        return strtolower(str_replace(' ', '-', $this->name));
    }
}
