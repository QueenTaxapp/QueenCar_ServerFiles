<?php

namespace App\Containers\Authentication\Middlewares;


use App\Containers\Admin\Models\AdminModel;
use App\Ship\Engine\Butlers\Facades\ContainersButler;
use App\Ship\Parents\Middlewares\Middleware;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Containers\User\Models\UserTableModel;

use App\Ship\Exceptions\CommonException;
use App\Containers\User\UI\API\Requests\ApiTokenValidateRequest;
/**
 * Class WebAuthentication
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class DispatchAuthentication extends Middleware
{
    public function handle(Request $request, Closure $next)
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


        $dispatchUser = AdminModel::select('remember_token','role')->where('id',$id)->first();

        if( count($dispatchUser) == 0 )
        {
            throw (new CommonException())->setValue('732',trans('localization::errors.732'));

        }

        if( $dispatchUser->role != 100000 )
        {
            throw (new CommonException())->setValue('732',trans('localization::errors.732'));

        }

        if( $dispatchUser->remember_token != $token )
        {
            throw (new CommonException())->setValue('732',trans('localization::errors.732'));

        }

//        $CurrentOtpDate = date("Y-m-d h:i:s");

//        if(strtotime($CurrentOtpDate) > strtotime($userToken->token_expiry))
//        {
//            throw (new CommonException())->setValue('609',trans('localization::errors.609'));
//        }



        return $next($request);
    }


}