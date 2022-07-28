<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Models\User;
use App\Notifications\PostCreated as NotificationsPostCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendPostCreatedNotification
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
     * @param  \App\Events\PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        $postTagsId = $event->post->tags->pluck('id');

        $users = User::whereHas('tags', function ($query) use ($postTagsId) {
            return $query->whereIn('id', $postTagsId);
        })
            ->whereNot('id', $event->post->user->id)
            ->get();

        Notification::send($users, new NotificationsPostCreated($event->post));
    }
}
