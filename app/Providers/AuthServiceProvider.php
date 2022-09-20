<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
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

        Gate::define('create', function (User $user, $model) {

            $userPermissions = $user->permissions($user->id);

            return $userPermissions->contains("create$model");
        });

        Gate::define('read', function (User $user, $model) {

            $userPermissions = $user->permissions($user->id);

            return $userPermissions->contains("read$model");
        });

        Gate::define('update', function (User $user, $model) {

            $userPermissions = $user->permissions($user->id);

            return $userPermissions->contains("update$model");
        });

        Gate::define('delete', function (User $user, $model) {

            $userPermissions = $user->permissions($user->id);

            return $userPermissions->contains("delete$model");
        });
    }
}
