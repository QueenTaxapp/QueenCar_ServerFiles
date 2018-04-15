<?php
namespace App\Containers\Common;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;

/**
 *Configs_Class
 */
class Configs_Class
{

    /**
     *
     */

    private static $custom_helper;

    public static function getInstance()
    {
        return new Configs_Class();
    }

    public static function helper()
    {
        if(!Configs_Class::$custom_helper)
        {
            Configs_Class::$custom_helper = new ApiHelper();
        }

        return Configs_Class::$custom_helper;
    }



    /**
     *
     */
    public static function getValue()
    {

        $array_config_value = json_decode(file_get_contents(public_path().'/config.json'),true);

        Cache::put("Config_cache", "yes",120);

        foreach($array_config_value as $key => $value)
        {
            if(is_array($value))
            {
                foreach($value as $v)
                {
                    Cache::put($v['title'], $v['value'],120);
                }
            }
        }

        return $array_config_value;
    }


    public static function getCurrency()
    {
        $endpoint = 'live';
        $access_key = 'bf2ce041ad76f21bf70835b4840f6a67';

        $source = 'USD';
        $currencies = 'INR';
        $amount = 10;

// initialize CURL:
        $ch = curl_init('http://apilayer.net/api/'.$endpoint.'?access_key='.$access_key.'&source='.$source.'&format=1');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// get the (still encoded) JSON data:
        $json = curl_exec($ch);
        curl_close($ch);

// Decode JSON response:
        $currency_lists = json_decode($json, true);

        // echo "<pre>";print_r();die();
        $currency_array = $currency_lists['quotes'];

        Cache::put("currency_cache", "yes",1440);

        foreach($currency_array as $key => $value)
        {
            $key = str_replace("USD","",$key);
            Cache::put($key, $value,1440);

        }

        return $currency_array;
    }

}

