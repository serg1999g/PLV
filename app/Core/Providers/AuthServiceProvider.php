<?php

namespace App\Core\Providers;

use App\Modules\Post\Models\Post;
use App\Modules\Post\Policies\PostPolicy;
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
//         'App\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Implicitly grant "admin" role all permission checks using can()
        Gate::before(function ($user) {
            if ($user->hasRole('admin')) {
                return true;
            }
            return null;
        });
    }
}
