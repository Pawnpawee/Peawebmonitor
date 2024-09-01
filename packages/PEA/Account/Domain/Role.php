<?php

namespace PEA\Account\Domain;

use PEA\Account\Enum\RoleEnum;
use PEA\Business\Domain\BusinessAccount;
use Cartalyst\Sentinel\Roles\EloquentRole;

class Role extends
    EloquentRole
{
    protected $table = 'account_roles';

    protected $fillable = ['name', 'slug'];


    public function businesses(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(BusinessAccount::class, 'account_role_users', 'role_id', 'business_account_id')
            ->withTimestamps();
    }


    public function getName()
    {
        return $this->attributes['name'];
    }

    public function scopeFilters($q, $filters = [])
    {
        if ($arg = array_get($filters, 'role')) {
            $q->where('name', 'LIKE', "%{$arg}$");
        }

        return $q;
    }

    public function isOwner()
    {
        return $this->slug == RoleEnum::BUSINESS_OWNER->value ?? false;
    }

    public function isAdmin()
    {
        return $this->slug == RoleEnum::BUSINESS_ADMIN->value ?? false;
    }

    public function isUser()
    {
        return $this->slug == RoleEnum::BUSINESS_USER->value ?? false;
    }
}
