<?php

namespace PEA\Event\Models\Event;

use Device;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;
use PEA\Event\Database\Factories\Event\EventFactory;
use User;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'events';

    protected $fillable = [
        'assignee_id',
        'device_id',
        'first_response_at',
        'token',
    ];

    protected $with = ['notifications', 'responses'];

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assignee_id');
    }

    public function device()
    {
        return $this->belongsTo(Device::class, 'device_id');
    }

    public function notifications()
    {
        return $this->hasMany(EventNotification::class);
    }

    public function responses()
    {
        return $this->hasManyThrough(
            EventResponse::class,
            EventNotification::class,
            'event_id',
            'event_notification_id',
            'id',
            'id'
        )
            ->orderBy('id');
    }

    public function scopeFilter($q, $filters = [])
    {
        $q->when($status = Arr::get($filters, 'status'), function ($q) use ($status) {
            $q->where('status', 'LIKE', "%{$status}%");
        });

        return $q;
    }

    public function getFullEventNameAttribute()
    {
        switch ($this->event) {
            case 'uca':
                return 'Under Capacity';
                break;
            case 'oca':
                return 'Over Capacity';
                break;
            case 'uv':
                return 'Under Voltage';
                break;
            case 'oc':
                return 'Over Current';
                break;
            case 'po':
                return 'Power Overage';
                break;
            default:
                return 'Unknown';
        }
    }

    protected static function newFactory()
    {
        return EventFactory::new();
    }
}
