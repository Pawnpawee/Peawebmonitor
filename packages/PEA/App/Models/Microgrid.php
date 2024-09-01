<?php

namespace PEA\App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Microgrid extends Model
{
    use SoftDeletes;
    
    protected $table = 'microgrids';

    protected $fillable = [
        'name',
        'description',
        'latitude',
        'longitude',
        'state',
    ];

    public function transformers(){
        return $this->hasMany(Transformer::class, 'id');
    }
}
