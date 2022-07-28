<?php

namespace App\Listeners;

use App\Events\TransactionCreated;
use App\Notifications\TransactionCreated as NotificationsTransactionCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class HandleTransactionCreated
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
     * @param  \App\Events\TransactionCreated  $event
     * @return void
     */
    public function handle(TransactionCreated $event)
    {
        $users = [$event->transaction->user];

        Notification::send($users, new NotificationsTransactionCreated($event->transaction));
    }
}
