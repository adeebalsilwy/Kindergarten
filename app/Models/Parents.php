<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Filterable;

class Parents extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = 'guardians';

    protected $searchable = ['name', 'phone', 'email', 'national_id', 'passport_number'];

    protected $fillable = [
        'name',
        'phone',
        'address',
        'relationship',
        'email',
        'secondary_phone',
        'occupation',
        'workplace',
        'is_primary_emergency_contact',
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
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    public function children()
    {
        return $this->hasMany(Children::class, 'parent_id');
    }

    public function guardian()
    {
        return $this->hasOne(Guardian::class, 'id', 'id');
    }
}
