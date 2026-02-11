<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount',
        'description',
        'is_active',

    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'is_active' => 'boolean',

    ];
}
