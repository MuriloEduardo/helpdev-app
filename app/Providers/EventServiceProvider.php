<?php

namespace App\Providers;

use App\Events\PostCreated;
use App\Events\TalksAccepted;
use App\Events\TransactionCreated;
use App\Listeners\HandleTalksAccepted;
use App\Listeners\HandleTransactionCreated;
use App\Listeners\SendPostCreatedNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        PostCreated::class => [
            SendPostCreatedNotification::class,
        ],
        TransactionCreated::class => [
            HandleTransactionCreated::class,
        ],
        TalksAccepted::class => [
            HandleTalksAccepted::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
