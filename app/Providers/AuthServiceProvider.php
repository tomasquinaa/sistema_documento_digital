<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
         'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('emails', function(User $user, $tipo){
            $form_id = 1; // tabela de emails
            return $user->temPermissao($form_id, $tipo);
        });

        Gate::define('setores', function(User $user, $tipo){
            $form_id = 2; // tabela de setores
            return $user->temPermissao($form_id, $tipo);
        });
        Gate::define('filials', function(User $user, $tipo){
            $form_id = 3; // tabela de filials
            return $user->temPermissao($form_id, $tipo);
        });
        Gate::define('formgrupos', function(User $user, $tipo){
            $form_id = 4; // tabela de formulariogrupo
            return $user->temPermissao($form_id, $tipo);
        });
        Gate::define('grupos', function(User $user, $tipo){
            $form_id = 5; // tabela de grupos
            return $user->temPermissao($form_id, $tipo);
        });
        Gate::define('tipodocumentos', function(User $user, $tipo){
            $form_id = 6; // tabela de tipo documento
            return $user->temPermissao($form_id, $tipo);
        });
        Gate::define('usuarios', function(User $user, $tipo){
            $form_id = 7; // tabela de usuarios
            return $user->temPermissao($form_id, $tipo);
        });
    }
}
