<?php

namespace PEA\Account\Domain;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ban extends BaseModel
{

    use SoftDeletes;

    protected $table = 'account_ban';

    protected $dates = ['effective_until'];

    protected $fillable = ['user_id', 'reason'];


    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }


    public function enforcer()
    {
        return $this->belongsTo(Account::class, 'enforcer_id');
    }


    public function scopeEffective($q)
    {
        $today = Carbon::today();

        return $q->where('effective_until', '>=', $today)->orWhereNull('effective_until');
    }


    public function getReasonAttribute()
    {
        return $this->attributes['reason']
            ? $this->attributes['reason']
            : 'no reason given';
    }


    public function active()
    {
        if($this->isForever()){
            return true;
        }

        $now = Carbon::now();

        return $now->lte($this->effective_until);
    }


    /**
     * Set effective_until by specified weeks number
     *
     * @param $weeks
     */
    public function until($weeks)
    {
        $date = Carbon::today();
        if ($weeks == 0) {
            $this->attributes['effective_until'] = '0000-00-00 00:00:00';
        } else {
            $date->addWeeks($weeks);
            $this->effective_until = $date;
        }

    }


    public function isForever ()
    {
        return $this->attributes['effective_until'] == '0000-00-00 00:00:00';
    }


//    public function getDeleteUrlAttribute()
//    {
//        return route('admin::account.ban.delete', $this->getKey());
//    }
}
