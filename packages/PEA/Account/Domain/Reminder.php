<?php
namespace PEA\Account\Domain;

use Cartalyst\Sentinel\Reminders\EloquentReminder;

class Reminder extends EloquentReminder
{
    protected $table = 'account_reminders';
}