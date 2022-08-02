<?php

namespace App\Events;

use App\Models\Talk;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TalksAccepted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The talk instance.
     *
     * @var \App\Models\Talk
     */
    public $talk;

    /**
     * Create a new event instance.
     *
     * @param  \App\Models\Talk  $talk
     * @return void
     */
    public function __construct(Talk $talk)
    {
        $this->talk = $talk;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('talks.' . $this->talk->id);
    }
}
