<?php

namespace App\Containers\Admin\Providers;

use Illuminate\Support\ServiceProvider;

use Validator;

class AppServiceProvider extends ServiceProvider

{

    public function boot()

    {

        Validator::extend('is_odd_string', function($attribute, $value, $parameters, $validator)
        {

            if(!empty($value) && (strlen($value) % 2) == 0)
            {

                return true;

            }

            return false;

        });

    }

    public function register()

    {

    }

}