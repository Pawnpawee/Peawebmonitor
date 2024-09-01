<?php

namespace PEA\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transformer extends Model
{
    use SoftDeletes;
    
    protected $table = 'transformers';
    protected $primaryKey = 'id';

    protected $fillable = [
        'microgrid_id',
        'name',
        'description',
        'latitude',
        'longitude',
        'state',
    ];
    
    public function microgrid(): BelongsTo
    {
        return $this->belongsTo(Microgrid::class, 'microgrid_id');
    }

}
