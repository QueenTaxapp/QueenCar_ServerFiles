<?php

namespace App\Containers\Authentication\Middlewares;


use App\Containers\Admin\Models\AdminModel;
use App\Containers\Drivers\Models\DriverModel;
use App\Ship\Engine\Butlers\Facades\ContainersButler;
use App\Ship\Exceptions\CommonException;
use App\Ship\Parents\Middlewares\Middleware;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Containers\Hero\Models\HeroModel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use SebastianBergmann\CodeCoverage\Driver\Driver;


/**
 * Class WebAuthentication
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class RoleCheck extends Middleware
{
    public function handle(Request $request, Closure $next)
    {
        $AdminRole = Session::get('role');


        $toRole = AdminModel::select('id','role')->where('id',$request->id)->first();


        $toRoleId = $toRole->id;

        $toRole = $toRole->role;

        $error_message = trans('localization::errors.you_does_have_privilege_to_do_this_ation');

        if($AdminRole == $toRole)
        {
            $adminId = Session::get('id');


            if( $adminId == $toRoleId)
            {
                return Redirect::back()->withErrors($error_message);
            }


        }

        if($AdminRole != 0 )
        {


            if($toRole == 0)
            {


                return Redirect::back()->withErrors($error_message);
            }

            if($AdminRole != 99999 )
            {

                return Redirect::back()->withErrors($error_message);
            }




        }



        return $next($request);
    }


}