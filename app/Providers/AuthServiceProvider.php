<?php

namespace App\Providers;

use App\User;
use App\Cours;
use App\DemandeProfesseur;
use App\Policies\CoursPolicy;
use Illuminate\Support\Facades\Gate;
use App\Policies\DemandeProfesseurPolicy;
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
        DemandeProfesseur::class=>DemandeProfesseurPolicy::class,
        Cours::class=>CoursPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

    }
}
