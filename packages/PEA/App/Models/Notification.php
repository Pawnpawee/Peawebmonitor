<?php

namespace PEA\App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Notification extends Model
{
    use SoftDeletes;
    
    protected $table = 'notifications';

    protected $fillable = [
        'name',
        'subject',
        'body',
        'sms',
        'type',
        'state',
        'code'
    ];

}
