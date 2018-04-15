<?php

namespace App\Containers\Authentication\Middlewares;


use App\Ship\Engine\Butlers\Facades\ContainersButler;
use App\Ship\Parents\Middlewares\Middleware;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


/**
 * Class AccessAvailableCheck
 * @package App\Containers\Authentication\Middlewares
 */
class AccessAvailableCheck extends Middleware
{

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;


    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {


        // $id = $request->session()->get('sessionMemory')['adminId'];

        $id = Session::get('id');
    
        $role = session::get('role');

        if($role == 0)
        {
            //$role = 'super_admin';
            goto last;
        }
       


        $route = $request->route()->action;


        $path1 = asset('privileges/admins');

        $fileName1 = '/admin'.$id.'.json';

        $header1 = $path1.$fileName1;

        $specificAdmin = @get_headers($header1);

        $path2 = asset('privileges');

        $fileName2 = '/type'.$role.'.json';



        $header2 = $path2.$fileName2;

        $specificType = @get_headers($header2);


        $currentUrl =  $request->route()->action['as'];

       /* $currentUrl = explode("/public/", $currentUrl);

        $currentUrl = $currentUrl[1];*/
        $error = trans('localization::errors.access_denied');

        
        if($specificAdmin[0] == 'HTTP/1.1 200 OK')
        {
            
            $file = file_get_contents($header1);


            $fileValue = json_decode($file);

            if(count($fileValue->module) == 0  && count($fileValue->sub_module) == 0 )
            {
                goto next;
            }

            Session::put('layout',$fileValue);

            if(in_array($route['module'],$fileValue->module) || in_array($currentUrl,$fileValue->sub_module))
            {

                return redirect()->back()->withErrors($error,'default');
            }


        }
        elseif ($specificType[0] == 'HTTP/1.1 200 OK')
        {

            next:

            $file = file_get_contents($header2);

            $fileValue = json_decode($file);

            Session::put('layout',$fileValue);


         /*   var_dump($currentUrl);
//
            */


            if(in_array($route['module'],$fileValue->module) || in_array($currentUrl,$fileValue->sub_module))
            {
                return redirect()->back()->withErrors($error,'default');
            }


        }
        else
        {
           // die('qicedr');
            return redirect()->back()->withErrors($error,'default');
        }

        last:

        return $next($request);
    }

}
