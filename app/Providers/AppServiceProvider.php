<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Blade::if('role', function ($role) {
        //     switch($role){
    
        //         case 3:
        //             return auth()->guard(session('role'))->check() && session('role')=='estudiante';
        //         default:
        //             return auth()->guard(session('role'))->check() && auth()->guard(session('role'))->user()->role == $role;
        //     }

        // });

        Blade::if('eachError', function ($campo, $errors) {
            if(!$errors->get($campo)){
                echo old($campo);
            }
        });


        Route::resourceVerbs([
            'create' => 'crear',
            'edit' => 'editar'
        ]); //Para que las url's queden completamente en español

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
