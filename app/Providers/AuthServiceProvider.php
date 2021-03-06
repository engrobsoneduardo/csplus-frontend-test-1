<?php

namespace Spa\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'Spa\Model' => 'Spa\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('see-post', function($user, $post)
        {
            return $user->id == $post->user_id;
        });

        Gate::define('update-post', function($user, $post)
        {
            return $user->id == $post->user_id;
        });

        Gate::define('delete-post', function($user, $post)
        {
            return $user->id == $post->user_id;
        });
    }
}
