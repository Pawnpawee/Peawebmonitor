<?php

namespace PEA\Account\Domain;

use Cartalyst\Sentinel\Persistences\EloquentPersistence;

class Persistence extends EloquentPersistence
{

    protected $table = 'account_persistences';

    protected static $accountModel = 'PEA\Account\Domain\Account';

}