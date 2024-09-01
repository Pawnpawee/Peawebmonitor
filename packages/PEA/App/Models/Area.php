<?php

namespace PEA\App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Area extends Model
{
    use SoftDeletes;
    
    protected $table = 'areas';

    protected $fillable = [
        'name',
        'state',
        'weight',
    ];

}
