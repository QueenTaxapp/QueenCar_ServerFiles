<?php

namespace App\Containers\Admin\fileExists;

use Illuminate\Support\Facades\Route;


/**
 *
 */
class fileExists{

    public static function fileCreate()
    {
        $array=[];
        $routes = Route::getRoutes();
        foreach ($routes as $route) {
            // print_r(strpos($route->uri,"dm"));die();
            if(strpos($route->uri,"dmin"))
            {
                ////die();

                if(array_key_exists("module",$route->action) && array_key_exists("as",$route->action) && array_key_exists("privilege",$route->action) && $route->action["privilege"] == true)
                {
                    //echo "<pre>"; print_r($route->action['module']);
                    if(array_key_exists("path",$route->action))
                    {
                        $array[$route->action['module']]['path']=$route->action['path'];
                    }
                    if(array_key_exists("icon",$route->action))
                    {
                        $array[$route->action['module']]['icon']=$route->action['icon'];
                    }
                    if(array_key_exists("order",$route->action))
                    {
                        $array[$route->action['module']]['sort']=$route->action['order'];
                    }
                    if(array_key_exists("name",$route->action))
                    {
                        $array[$route->action['module']]['name']=$route->action['name'];
                    }
                    if(array_key_exists("head_icon",$route->action))
                    {
                        $array[$route->action['module']]['head_icon']=$route->action['head_icon'];
                    }
                    if(array_key_exists("head_name",$route->action))
                    {
                        $array[$route->action['module']]['head_name']=$route->action['head_name'];
                    }

                    if(array_key_exists($route->action['module'],$array))
                    {

                        $array[$route->action['module']]['sub_module'][$route->uri] = $route->action['as'];

                    }
                    else
                    {
                        // $array[$route->action['module']]="";
                        $array[$route->action['module']]['sub_module'][$route->uri] = $route->action['as'];

                    }



                }
            }
        }
        file_put_contents(public_path('/privileges/layout.json'),json_encode($array));

    }

}