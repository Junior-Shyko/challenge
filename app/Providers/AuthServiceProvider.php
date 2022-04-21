<?php

namespace App\Providers;

use App\Models\Team;
use App\Models\User;
use App\Models\Profile;
use App\Models\Discipline;
use App\Policies\TeamPolicy;
use App\Policies\DisciplinePolicy;
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
        Team::class => TeamPolicy::class,
        Discipline::class => DisciplinePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //PARA VERIFICAR SE O USUARIO É UM SUPER ADMIN
        Gate::define('saasAdmin', [DisciplinePolicy::class, 'is_saasAdmin']);

        Gate::define('admin', function (User $user) {
            $profile = Profile::where('name', 'admin')->get();
            return $profile[0]->id === $user->profile_id ? true : false;
        });

        Gate::define('student', function (User $user) {
            $profile = Profile::where('name', 'student')->get();
            return $profile[0]->id === $user->profile_id ? true : false;
        });
    }
}
