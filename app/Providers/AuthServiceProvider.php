<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        Gate::define("has-post",function (User $user, Post $post){
            $hasPost = $user->id === $post->user_id;
            return $hasPost ? Response::allow() : Response::deny("You don't have post");
        });
    }
}
