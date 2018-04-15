<?php

namespace App\Containers\Authentication\Middlewares;


use App\Containers\Admin\Models\AdminModel;
use App\Containers\Common\ApiHelper;
use App\Ship\Engine\Butlers\Facades\ContainersButler;
use App\Ship\Exceptions\CommonException;
use App\Ship\Parents\Middlewares\Middleware;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Containers\Hero\Models\HeroModel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;



class SuperAdminRoleCheck extends Middleware
{
    public function handle(Request $request, Closure $next)
    {

        $role = Session::get('role');


        if($role !=0)
        {

            $error_message = trans('localization::errors.you_does_have_privilege_to_do_this_ation');

            return Redirect::back()->withErrors($error_message);
        }




        return $next($request);
    }


}