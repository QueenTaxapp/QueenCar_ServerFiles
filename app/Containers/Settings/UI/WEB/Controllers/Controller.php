<?php

namespace App\Containers\Settings\UI\WEB\Controllers;

use App\Containers\Settings\UI\WEB\Requests\SettingsRequest;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;

/**
 * Class Controller
 * @package App\Containers\Admin\UI\WEB\Controllers
 */
class Controller extends WebController
{


    public function adminSettingsPage(Request $request)
    {

        $settings = json_decode(file_get_contents(public_path('config.json')),true);
        $page = "settings_module";
        return view('settings::Settings',['request'=>$request,'result'=>$settings, 'page'=>$page]);

    }

    public function adminSettingsSave(SettingsRequest $request)
    {
  

        $array_config_value = json_decode(file_get_contents(public_path().'/config.json'),true);

        if($array_config_value[$request->type])
        {

            foreach($array_config_value[$request->type] as $key => $setting)
            {
                if(array_key_exists($setting['title'],$request->except(['_token','type'])))
                {
                    if($request->hasFile($setting['title'])) {

                        $destinationPath = public_path()."/assets/img/uploads";
                        $extension =  $request->file($setting['title'])->getClientOriginalExtension();
                        $fileName = rand(11111,99999).'.'.$extension; // renaming image
                        if(!$request->file($setting['title'])->move($destinationPath,$fileName))
                        {
                            die('failed upload');
                        }
                        $array_config_value[$request->type][$key]['value'] =asset("assets/img/uploads")."/".$fileName;

                    }else {
                        $array_config_value[$request->type][$key]['value'] = $request->{$setting['title']};
                    }
                }
            }
            

            file_put_contents(public_path().'/config.json',json_encode($array_config_value));
        }
        Cache::forget('Config_cache');

        return Redirect::to("/admin/settings");

    }
}

