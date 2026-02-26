<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DashboardContent extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'section',
        'key',
        'content',
        'is_active',
        'order',
        'metadata',
    ];

    protected $casts = [
        'content' => 'array',
        'is_active' => 'boolean',
        'order' => 'integer',
        'metadata' => 'array',
        'deleted_at' => 'datetime',
    ];
}
