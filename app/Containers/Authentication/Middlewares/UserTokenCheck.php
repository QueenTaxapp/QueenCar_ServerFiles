<?php

namespace App\Containers\Authentication\Middlewares;


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
class UserTokenCheck extends Middleware
{
    public function handle(Request $request, Closure $next)
    {     

        $obj = new UserTokenCheck();

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

        $userToken = UserTableModel::select('token','token_expiry')->where('id',$id)->first();


        $CurrentOtpDate = date("Y-m-d h:i:s");                    


        if(count($userToken) == 0)
        {
            throw (new CommonException())->setValue('603',trans('localization::errors.603'));
        }
        else
        {
            if(strtotime($CurrentOtpDate) > strtotime($userToken->token_expiry))
            {
                throw (new CommonException())->setValue('609',trans('localization::errors.609'));
            }

            if($token != $userToken->token)
            {
                throw (new CommonException())->setValue('606',trans('localization::errors.606'));
            }
        }
    }
}