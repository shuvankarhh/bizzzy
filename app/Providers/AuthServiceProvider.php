<?php

namespace App\Providers;

use App\Models\Contract;
use App\Models\JobProposal;
use App\Models\UserEducation;
use App\Policies\JobPolicy;
use App\Policies\ContractPolicy;
use App\Policies\EducationPolicy;
use App\Policies\JobProposalPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Job::class => JobPolicy::class,
        Contract::class => ContractPolicy::class,
        UserEducation::class => EducationPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Implicitly grant "Super Admin" role all permissions
        // This works in the app by using gate-related functions like auth()->user->can() and @can()
        Gate::before(function ($user, $ability) {
            return $user->hasRole('Super Admin') ? true : null;
        });
    }
}
