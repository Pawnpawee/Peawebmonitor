<?php

namespace PEA\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeederPhase extends Model
{
    use SoftDeletes;
    
    protected $table = 'feeder_phases';
    protected $primaryKey = 'id';
    protected $fillable = [
        'feeder_id',
        'name',
        'description',
        'lat_long_json',
        'state',
    ];
    
    protected $casts = [
        'lat_long_json' => 'array',
    ];
    
    public function feeder(): BelongsTo
    {
        return $this->belongsTo(Feeder::class, 'feeder_id');
    }
    
}
