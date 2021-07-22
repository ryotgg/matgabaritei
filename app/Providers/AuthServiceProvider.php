<?php

namespace App\Providers;

use App\Models\Team;
use App\Models\Curso;
use App\Models\Modulo;
use App\Models\Aula;
use App\Models\Lista;
use App\Models\Exercicio;
use App\Models\User;
use App\Policies\TeamPolicy;
use App\Policies\EditorPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
        Curso::class => EditorPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('edit-aulas', function (User $user) {
            return Auth::check();
            //return $user->isAdmin;
        });
    }
}
