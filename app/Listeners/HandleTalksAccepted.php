<?php

namespace App\Listeners;

use App\Events\TalksAccepted;
use App\Events\TransactionCreated;
use App\Notifications\TalkAccepted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class HandleTalksAccepted
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
     * @param  \App\Events\TalksAccepted  $event
     * @return void
     */
    public function handle(TalksAccepted $event)
    {
        $transaction = $event->talk->post->user->transactions()->create([
            'confirmed' => true,
            'talk_id' => $event->talk->id,
            'amount' => -$event->talk->post->amount,
        ]);

        TransactionCreated::dispatch($transaction);

        Notification::send($event->talk->user, new TalkAccepted($event->talk));
    }
}
