<?php

namespace App\Listeners;

use App\Events\TalksCompleted;
use App\Events\TransactionCreated;
use App\Notifications\TalkCompleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class HandleTalksCompleted
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
     * @param  \App\Events\TalksCompleted  $event
     * @return void
     */
    public function handle(TalksCompleted $event)
    {
        $transaction = $event->talk->user->transactions()->create([
            'confirmed' => true,
            'talk_id' => $event->talk->id,
            'amount' => $event->talk->post->amount,
        ]);

        TransactionCreated::dispatch($transaction);

        Notification::send($event->talk->post->user, new TalkCompleted($event->talk));
    }
}
