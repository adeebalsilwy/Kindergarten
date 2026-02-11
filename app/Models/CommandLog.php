<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'command',
        'parameters',
        'output',
        'status',
        'error_message',
    ];

    protected $casts = [
        'parameters' => 'array',
    ];
}
