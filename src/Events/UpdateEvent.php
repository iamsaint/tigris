<?php
/**
 * @author Alexey Samoylov <alexey.samoylov@gmail.com>
 */
namespace Tigris\Events;

use Tigris\Telegram\Types\Updates\Update;

class UpdateEvent extends AbstractEvent
{
    const EVENT_UPDATE_RECEIVED = 'onUpdateReceived';

    /** @var Update */
    public $update;

    /**
     * @param Update $update
     * @return static
     */
    public static function create(Update $update)
    {
        $event = new static();
        $event->update = $update;
        return $event;
    }
}