<?php

namespace PEA\Event\Models\Event;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PEA\Event\Database\Factories\Event;
use PEA\Event\Database\Factories\Event\EventNotificationFactory;

class EventNotification extends Model
{
    use HasFactory;

    protected $table = 'event_notifications';

    protected $fillable = [
        'template_id',
        'event_id',
        'type',
    ];

    public $timestamps = false;

    public function template()
    {
        return $this->belongsTo(Template::class, 'template_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function responses()
    {
        return $this->hasMany(EventResponse::class);
    }

    protected static function newFactory()
    {
        return EventNotificationFactory::new();
    }
}
