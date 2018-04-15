<?php
namespace App\Containers\Common;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;

/**
 *Configs_Class
 */
class GetConfigs
{

    /**
     *
     */
    public static function getInstance()
    {
        return new Configs_Class();
    }

    /**
     *
     */
    public static function getConfigs($key){


        if(Cache::has('Config_cache'))
        {
            return Cache::get($key)?:null;
        }
        else
        {
            $config = Configs_Class::getInstance();

            $array = $config->getValue();

            return Cache::get($key)?:null;

        }
    }

}