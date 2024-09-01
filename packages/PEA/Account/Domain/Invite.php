<?php

namespace PEA\Account\Domain;

use PEA\Business\Domain\AdAccount;
use PEA\Business\Domain\Business;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class Invite extends BaseModel
{

	protected $table = 'account_invites';

	protected $fillable = [
		'email',
		'business_id',
		'ad_account_id',
		'token',
		'payload',
		'invite_by'
	];

	protected $guarded = [
		'email',
		'token'
	];

	protected $hidden = [
		'email',
		'token',
		'payload'
	];

	protected $dates = [
		'accepted_at'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function (Invite $invite) {
			$invite->refreshToken(false);
		});
	}

	public function business()
	{
		return $this->belongsTo(Business::class, 'business_id');
	}

	public function adAccount()
	{
		return $this->belongsTo(AdAccount::class, 'ad_account_id');
	}

	public function account()
	{
		return $this->belongsTo(Account::class, 'invite_by');
	}

	public function refreshToken($save = true)
	{
		$this->attributes['token'] = $this->generateToken();
		if ($save) {
			$this->save();
		}
	}

	private function generateToken()
	{
		do {
			$token = Str::random(40);
			$exists = static::where('token', $token)
			                ->count();
		} while ($exists > 0);

		return $token;
	}

	public function scopeFilter($q, $filters=[])
	{
		return $q->when($email = Arr::get($filters,'email'), function($q) use($email) {
			$q->where('email', 'LIKE', "'%".$email."%'");
		})->when($role = Arr::get($filters,'role'), function ($q) use($role) {
			$q->where('play_role', $role);
		});
	}

	public function scopeAccepted($q)
	{
		return $q->whereNotNull('accepted_at');
	}

	public function scopeByToken($q, $token)
	{
		return $q->where('token', $token);
	}

	public function scopeByBusiness($q, $business_id)
	{
		return $q->where('business_id', $business_id);
	}

	public function scopeByAdAccount($q, $adaccount_id)
	{
		return $q->where('ad_account_id', $adaccount_id);
	}

	public function getRoleTagAttribute()
	{
		$role = json_decode($this->payload, true)['role'];
		$permission = json_decode($this->payload, true)['permissions'];

		if($permission['full_control']) {
			$role_access = ($role == 'BUSINESS_ADMIN') ? 'Admin access' : 'Full control';
		} else {
			$role_access = ($role == 'BUSINESS_ADMIN') ? 'User access' : 'View report';
		}

		return  $role_access;
	}

	public function getPermissionNameAttribute()
	{
		$text = 'VIEW REPORT';
		$permissions = 	json_decode($this->payload, true)['permissions']['full_control'];
		if($permissions) {
			$text = 'FULL CONTROL';
		}

		return $text;
	}

	public function isTeamType()
	{
		return !empty($this->ad_account_id);
	}

	public function hasExpired()
	{
		$now = Carbon::now()->format('Y-m-d');
		$created_date = $this->created_at->format('Y-m-d');
		$expried_date = date('Y-m-d', strtotime($created_date. ' + 7 days'));

		if($expried_date < $now) {
			return true;
		}

		return false;

	}
}
