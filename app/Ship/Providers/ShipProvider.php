<?php

namespace App\Ship\Providers;

use App\Ship\Parents\Providers\MainProvider;
use Illuminate\Support\Facades\Validator;

/**
 * Class ShipProvider
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class ShipProvider extends MainProvider
{

    /**
     * Register any Service Providers on the Ship layer (including third party packages).
     *
     * @var array
     */
    public $serviceProviders = [
        // ...
       // App\Containers\Authentication\Providers\AppServiceProvider::class


    ];

    /**
     * Register any Alias on the Ship layer (including third party packages).
     *
     * @var  array
     */
    protected $aliases = [
        // ...
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // ...
        parent::boot();


        Validator::extend('mobile_number', function ($attribute, $value, $parameters, $validator)
        {

            if(preg_match("/^[+][0-9]{10,14}$/", $value)) //Not allowed some of the special characters
            {
                return true;
            }
            else
            {
                return false;

            }

            //return $value == 'foo';
        });


        Validator::extend('land_line', function ($attribute, $value, $parameters, $validator)
        {

            if(preg_match("/^[0-9]{5,15}$/", $value)) //Not allowed some of the special characters
            {
                return true;
            }
            else
            {
                return false;

            }

            //return $value == 'foo';
        });


        Validator::extend('latitude', function ($attribute, $value, $parameters, $validator)
        {


            if (preg_match("/^-?[0-9]{1,3}(?:\.[0-9]{1,10})?$/", $value))
            {
                return true;
            }
            else
            {
                return false;
            }
        });


        Validator::extend('contact_number', function ($attribute, $value, $parameters, $validator)
        {

            if(preg_match("/^[+]?[0-9]{10,14}$/", $value)) //Not allowed some of the special characters
            {
                return true;
            }
            else
            {
                return false;

            }

            //return $value == 'foo';
        });

        Validator::extend('time_zone', function ($attribute, $value, $parameters, $validator)
        {

            $timeZoneList = array('Asia/Kolkata','America/New_York','America/Chicago',
                'America/Denver','America/Dominica','America/Phoenix','America/Los_Angeles',
                'America/Anchorage','America/Adak','Pacific/Honolulu','America/Araguaina',
                'America/Bahia','America/Belem','America/Boa_Vista','America/Campo_Grande',
                'America/Cuiaba','America/Eirunepe','America/Fortaleza','America/Maceio',
                'America/Manaus','America/Noronha','America/Porto_Velho','America/Recife',
                'America/Rio_Branco','America/Santarem','America/Sao_Paulo','America/Tijuana',
                'America/Mazatlan','America/Mexico_City','America/Cancun','Canada/Atlantic',
                'Canada/Central','Canada/Eastern','Canada/Mountain','Canada/Newfoundland',
                'Canada/Pacific','Canada/Yukon','Asia/Dubai');

            if (in_array($value, $timeZoneList))
            {
                return true;
            }
            else
            {
                return false;

            }

            //return $value == 'foo';
        });



        // ...
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // ...
        parent::register();
        // ...
    }

}
