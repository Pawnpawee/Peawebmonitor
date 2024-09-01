<?php

namespace PEA\Event\Models\Event;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PEA\Event\Database\Factories\Event\EventResponseFactory;


class EventResponse extends
    Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'event_responses';
    protected $fillable = [
        'event_notification_id',
        'comment',
    ];

    public function notification()
    {
        return $this->belongsTo(EventNotification::class, 'event_notification_id');
    }


    protected static function newFactory()
    {
        return EventResponseFactory::new();
    }
}
