<?php

namespace PEA\Account\Domain;

use Cartalyst\Sentinel\Throttling\EloquentThrottle;


class Throttle extends EloquentThrottle
{
    protected $table = 'account_throttle';


    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }
}