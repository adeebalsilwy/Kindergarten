<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;
use App\Traits\Filterable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, HasRoles, Notifiable, SoftDeletes, Filterable;

    protected $searchable = ['name', 'email'];

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
        'password' => 'hashed',
        'deleted_at' => 'datetime',
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

    // Accessors
    public function getSlugAttribute(): string
    {
        return \Str::slug($this->name);
    }

    // Roles and Permissions are handled by HasRoles trait

    public function accountingEntries()
    {
        return $this->hasMany(AccountingEntry::class);
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
