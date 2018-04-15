<?php

namespace App\Containers\Authentication\Middlewares;


use App\Containers\Drivers\Models\DriverModel;
use App\Ship\Engine\Butlers\Facades\ContainersButler;
use App\Ship\Exceptions\CommonException;
use App\Ship\Parents\Middlewares\Middleware;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Containers\Hero\Models\HeroModel;
use SebastianBergmann\CodeCoverage\Driver\Driver;


/**
 * Class WebAuthentication
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class DriverTokenCheck extends Middleware
{
    public function handle(Request $request, Closure $next)
    {
        $obj = new DriverTokenCheck();

        $obj->check($request);


        return $next($request);
    }

    public function check(Request $request)
    {

        if(!$request->has('id'))
        {
            throw (new CommonException())->setValue('610',trans('localization::errors.610'));
        }

        if(!$request->has('token'))
        {
            throw (new CommonException())->setValue('611',trans('localization::errors.611'));
        }


        $id =  $request->id;

        $token = $request->token;

        $DriverToken = DriverModel::select('token','token_expiry')->where('id',$id)->first();

        $CurrentOtpDate = date("Y-m-d h:i:s");


        if(count($DriverToken) == 0)
        {
            throw (new CommonException())->setValue('603',trans('localization::errors.603'));
        }
        else
        {
            if(strtotime($CurrentOtpDate) > strtotime($DriverToken->token_expiry))
            {
                throw (new CommonException())->setValue('609',trans('localization::errors.609'));
            }

            if($token != $DriverToken->token)
            {
                throw (new CommonException())->setValue('606',trans('localization::errors.606'));
            }
        }
    }
}