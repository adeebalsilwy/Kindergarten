<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, HasRoles, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'is_active',
        'token',
        'user_id',
        'ip_address',
        'user_agent',
        'payload',
        'last_activity',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
        'last_activity' => 'integer',
    ];

    protected $hidden = [
        'password',
        'token',
    ];

    protected $dates = [
        'email_verified_at',
    ];

    protected $appends = [
        'slug',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'deleted_at' => 'datetime',
        ];
    }

    // Roles and Permissions are handled by HasRoles trait

    public function accountingEntries()
    {
        return $this->hasMany(AccountingEntry::class, 'created_by');
    }

    public function expensesCreated()
    {
        return $this->hasMany(Expense::class, 'created_by');
    }

    public function expensesAssigned()
    {
        return $this->hasMany(Expense::class, 'assigned_to');
    }

    public function financialReports()
    {
        return $this->hasMany(FinancialReport::class, 'generated_by');
    }

    public function createdActivities()
    {
        return $this->hasMany(Activity::class, 'teacher_id');
    }

    public function createdEvents()
    {
        return $this->hasMany(Event::class, 'teacher_id');
    }

    public function createdClasses()
    {
        return $this->hasMany(Classes::class, 'teacher_id');
    }
}
