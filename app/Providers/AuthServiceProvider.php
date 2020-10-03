<?php

namespace App\Providers;

use App\Camera;
use App\Policies\CameraPolicy;
use App\Policies\PrenotazionePolicy;
use App\Prenotazioni;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Silvanite\Brandenburg\Traits\ValidatesPermissions;

class AuthServiceProvider extends ServiceProvider
{
    use ValidatesPermissions;

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Prenotazioni::class => PrenotazionePolicy::class,
        Camera::class => CameraPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        collect([
            'root',
            'manageBlog',
            'manageStanze',
            'viewOwnStanza',
            'managePrenotazioni',
        ])->each(function ($permission) {
            Gate::define($permission, function ($user) use ($permission) {
                if ($this->nobodyHasAccess($permission)) {
                    return true;
                }

                return $user->hasRoleWithPermission($permission);
            });
        });

        $this->registerPolicies();
    }

}
