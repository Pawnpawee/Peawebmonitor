<?php

namespace PEA\Account\Domain;

use PEA\Account\Domain\Ban;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;
use PEA\Account\Enum\RoleEnum;
use PEA\Http\Models\StatusTrait;
use PEA\Business\Domain\AdAccount;
use Cartalyst\Sentinel\Users\EloquentUser;
use PEA\Http\Support\Facades\Adapter;
use Illuminate\Contracts\Auth\Authenticatable;
use PEA\Business\Domain\BusinessAccount;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class Account extends BaseModel implements Authenticatable
{
    use StatusTrait;
    use SoftDeletes;

    protected $table = 'account_users';

    public $dates = ['last_login'];

	protected $fillable = [
        'email',
        'password',
        'permissions',
        'first_name',
        'last_name',
        'ad_account_id',
        'admin',
        'status',
    ];

    protected $guarded = [ 'password'];

    protected $hidden = ['password'];

    protected $loginNames = ['email'];

    /**
     * The Eloquent roles model name.
     *
     * @var string
     */
    protected static $rolesModel = Role::class;

    /**
     * The Eloquent persistences model name.
     *
     * @var string
     */
    protected static $persistencesModel = Persistence::class;

    /**
     * The Eloquent activations model name.
     *
     * @var string
     */
    protected static $activationsModel = Activation::class;

    /**
     * The Eloquent reminders model name.
     *
     * @var string
     */
    protected static $remindersModel = Reminder::class;

    /**
     * The Eloquent throttling model name.
     *
     * @var string
     */
    protected static $throttlingModel = Throttle::class;

	/**
     * Returns the roles relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(static::$rolesModel, 'account_role_users', 'business_account_id', 'role_id')
            ->withTimestamps();
    }

    public function businesses()
    {
        return $this->hasMany(BusinessAccount::class, 'account_id');
    }

	public function adAccount()
	{
		return $this->belongsTo(AdAccount::class, 'ad_account_id');
	}

    public function getFullNameAttribute()
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }

    public function getNameTagAttribute()
    {
        $pattern = "%s &#8249;%s&#8250;";

        return sprintf($pattern, $this->full_name, $this->attributes['email']);
    }

    public function isActive()
    {
    	return $this->status == 'Active';
    }
//    public function isActivated()
//    {
//        if (empty($this->activations)) {
//            return false;
//        }
//        $activation = $this->activations->filter(function ($activation) {
//            return $activation->completed;
//        });
//
//        return !$activation->isEmpty();
//    }

    public function isAdmin()
    {
        return $this->attributes['admin'] == 1;
    }

    public function promoteToSuper()
    {
        $this->attributes['admin'] = 1;
        $this->save();
    }


    public function demoteFromSuper()
    {
        $this->attributes['admin'] = 0;
        $this->save();
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return $this->getKeyName();
    }


    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }


    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }


    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        // not implemented for sentinel
    }


    /**
     * Set the token value for the "remember me" session.
     *
     * @param string $value
     *
     * @return void
     */
    public function setRememberToken($value)
    {
        // not implemented for sentinel
    }


    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        // not implemented for sentinel
    }

    public function assignAdAccount($assign)
    {
        if($this->ad_account_id !== $assign) {
            $this->ad_account_id = $assign;
            $this->save();
        }
    }

    public function inRole($role): bool
    {
        if(Sentinel::getUser()->isAdmin()) {
            return true;
        }

        return $role == Adapter::role();
        // if ($role instanceof RoleInterface) {
        //     $roleId = $role->getRoleId();
        // }

        // foreach ($this->roles as $instance) {
        //     if ($role instanceof RoleInterface) {
        //         if ($instance->getRoleId() === $roleId) {
        //             return true;
        //         }
        //     } else {
        //         if ($instance->getRoleId() == $role || $instance->getRoleSlug() == $role) {
        //             return true;
        //         }
        //     }
        // }

        // return false;
    }

    public function hasAccess($permission): bool
    {
        if(Sentinel::getUser()->isAdmin() || Adapter::role() == RoleEnum::BUSINESS_OWNER->value) {
            return true;
        }

        $permissions = json_decode(Adapter::permissions(), true);

		if (array_key_exists($permission, $permissions)) {
			return $permissions[$permission];
		}

        return false;
    }


    public function ban()
    {
        return $this->hasOne(Ban::class, 'user_id')
            ->effective();
    }

    public function scopeFilters($q, $filters = [])
    {
        if ($arg = Arr::get($filters, 'email')) {
            $q->where('email','LIKE',"%{$arg}%");
        }
	    if ($arg = Arr::get($filters, 'name')) {
		    $q->where('first_name', 'LIKE', "%{$arg}%")
		      ->orWhere('last_name', 'LIKE', "%{$arg}%");
	    }
	    if ($arg = Arr::get($filters, 'status')) {
		    $q->where('status', $arg);
	    }

//        if ($arg = Arr::get($filters, 'status')) {
//            switch ($arg) {
//                case 'BANNED':
//                    $q->whereHas('bans', function ($q) {
//                        $q->effective();
//                    });
//                    break;
//                case 'ACTIVATED':
//                    $q->whereHas('activations', function ($q) {
//                        $q->where('completed', 1);
//                    });
//                    break;
//                case 'PENDING':
//                    $q->whereHas('activations', function ($q) {
//                        $q->where('completed', 0);
//                    });
//                    break;
//            }
//        }

        return $q;
    }

//    public function getStatusAttribute()
//    {
//        if ($this->ban) {
//            return 'Banned';
//        } else {
//            return $this->isActivated() ? 'Activated' : 'Pending';
//        }
//    }

	public function scopeByEmail($q, $email)
	{
		return $q->where('email', $email);
	}

	public function scopeByActive($q)
	{
		return $q->where('status', 'Active');
	}

    public function getAuthPasswordName()
    {
        // TODO: Implement getAuthPasswordName() method.
    }
}
