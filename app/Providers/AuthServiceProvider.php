<?php

namespace App\Providers;

use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *'
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        Gate::define('edit-settings', function ($user) {
            return ($user->role_id >= 2) ? Response::deny("UN-AUTHORIZED. ACCESS DENIED") : Response::allow();
        });
    }
}
