<?php

namespace PEA\Account\Domain;

use Cartalyst\Sentinel\Activations\EloquentActivation;

class Activation extends EloquentActivation
{

    protected $table = 'account_activations';
}