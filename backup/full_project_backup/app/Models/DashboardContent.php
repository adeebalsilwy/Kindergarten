<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardContent extends Model
{
    use HasFactory;

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

    ];
}
