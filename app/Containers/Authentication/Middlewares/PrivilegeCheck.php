<?php

namespace App\Containers\Authentication\Middlewares;


use App\Containers\Admin\Models\AdminModel;
use App\Containers\Common\ApiHelper;
use App\Ship\Exceptions\CommonException;
use App\Ship\Parents\Middlewares\Middleware;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;



class PrivilegeCheck extends Middleware
{
    public function handle(Request $request, Closure $next)
    {

        $role = Session::get('role');

        if($role !=0)
        {
            $currentPath = Route::currentRouteName();

            $condition = array('adminDriverAddAccount','adminDriverSaveAccount','adminDriverDeleteAccount',
                'adminDriverEdit','adminDriverUpdate','adminDriverDelete','',
                'adminDriverApprove','adminDriverIncome','adminDriverIncomePaid','adminDriverIncomePaidCash');


            foreach ($condition as $value)
            {
                if($currentPath == $value )
                {

                    $tableName = 'App\Containers\Drivers\Models\DriverModel';

                    $columnName = 'admin_reference';
                }

                $parameterValue = Route::current()->parameters();
                $parameterValueKeys = array_keys($parameterValue);

                $parameterValue = $parameterValue[$parameterValueKeys[0]];



            }

            $adminKey = Session::get('admin_key');


            $toAdminKey = ApiHelper::to_admin_key($parameterValue,$tableName,$columnName);

            $error_message = trans('localization::errors.you_does_have_privilege_to_do_this_ation');

            if($toAdminKey != $adminKey)
            {


                return Redirect::back()->withErrors($error_message);
            }
        }

        return $next($request);
    }


}
