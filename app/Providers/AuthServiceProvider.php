<?php

namespace App\Providers;

use App\Models\Opportunity;
use App\Models\Post;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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

        Gate::define('admin', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('alter-opportunity', function (User $user, Opportunity $opportunity) {
            return Gate::allows('admin') || $opportunity->user_id == $user->id;
        });

        Gate::define('alter-post', function (User $user, Post $post) {
            return Gate::allows('admin') || $post->user_id == $user->id;
        });

        Gate::define('alter-profile', function (User $user, User $profile) {
            return $user->id == $profile->id;
        });
    }
}
