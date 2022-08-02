<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Talk;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('create-talk', function (User $user, Post $post) {
            return $user->id !== $post->user_id
                && $post->accepted === false;
        });

        Gate::define('accept-talk', function (User $user, Talk $talk) {
            return $user->id === $talk->post->user_id
                && $user->balance >= $talk->post->amount
                && $talk->post->accepted === false;
        });

        Gate::define('conclude-talk', function (User $user, Talk $talk) {
            return ($user->id === $talk->user_id || $user->id === $talk->post->user_id)
                && $talk->post->accepted === true;
        });
    }
}
