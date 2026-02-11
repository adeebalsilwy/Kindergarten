<?php

namespace App\Models;

use App\Traits\HasPermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, HasPermissions, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'email_verified_at',
        'password',
        'remember_token',
        'user_id',
        'ip_address',
        'user_agent',
        'payload',
        'last_activity',

    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_activity' => 'integer',

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
