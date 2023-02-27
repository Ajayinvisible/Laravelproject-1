<?php

namespace App\Providers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class OldPasswordProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('old_password', function($attribute,$value,$parameters,$validator){
            return Hash::check($value, $parameters[0]);
        });
    }
}
