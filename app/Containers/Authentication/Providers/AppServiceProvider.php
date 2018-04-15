<?php

namespace App\Containers\Authentication\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        Validator::extend('test', function ($attribute, $value, $parameters, $validator) {
            return $value == 'foo';
        });
        Validator::extend('test', 'TestValidator@validate');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        //
    }
}