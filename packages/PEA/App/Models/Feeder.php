<?php

namespace PEA\App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Feeder extends Model
{
    use SoftDeletes;
    
    protected $table = 'feeders';

    protected $fillable = [
        'name',
        'description',
        'state',
    ];

}
