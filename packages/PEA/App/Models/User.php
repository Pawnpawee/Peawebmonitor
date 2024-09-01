<?php


namespace PEA\App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $fillable = [
        'provider_id',
        'provider_type',
        'first_name',
        'last_name',
        'email',
        'email_verified_at',
        'last_login',
        'employee_id',
        'department',
        'position',
        'business_area',
        'mobile_phone',
        'state',
        'role_id'
    ];

    protected $guarded = [
        'provider_id',
        'provider_type'
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'last_login' => 'datetime'
        ];
    }
}