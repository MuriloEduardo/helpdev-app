<?php

namespace App\Listeners;

use App\Events\TalksCreated;
use App\Notifications\TalkCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class HandleTalksCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\TalksCreated  $event
     * @return void
     */
    public function handle(TalksCreated $event)
    {
        Notification::send($event->talk->post->user, new TalkCreated($event->talk));
    }
}
