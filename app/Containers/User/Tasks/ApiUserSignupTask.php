<?php

namespace App\Containers\User\Tasks;

use App\Containers\User\Models\Country;
use App\Containers\User\Models\UserDetail;
use App\Containers\Zone\Models\CurrencyModel;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use App\Containers\User\Models\UserTableModel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Ship\Exceptions\CommonException;
use Illuminate\Support\Facades\Hash;
use App\Containers\User\Tasks\ApiOtpTask;
use App\Containers\Admin\Tasks\SessionKeyTask;

/**

 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class ApiUserSignupTask extends Task
{
    /**
     * Save User Detail
     * @param Object $request
     * @param String $token
     *
     * @return  Object
     */
    public function run($request,$token)
    {

        //get country

        $countryTable = Country::where('code',$request->country)->first();

        if($countryTable)
        {
            $country = $countryTable->name;

            $currencyTable = CurrencyModel::where('country',$country)->first();

            if($currencyTable){

                $currency_code = $currencyTable->code;
                $currency_symbol = $currencyTable->symbol;

            }else{

                throw (new CommonException())->setValue('737',trans('localization::errors.737'));
            }

        }else{

            throw (new CommonException())->setValue('737',trans('localization::errors.737'));
        }

        $newUser = new  UserTableModel;
        $newUser->firstname             = $request->firstname;
        $newUser->lastname              = $request->lastname;
        $newUser->email                 = $request->email;
        $newUser->country               = $country;
        $newUser->currency_code = $currency_code;
        $newUser->currency_symbol = $currency_symbol;
        $newUser->phone_number          = $request->phone_number;
        $newUser->login_method          = $request->login_method;
        $newUser->login_by              = $request->login_by;
        $newUser->device_token          = $request->device_token;
        $newUser->password              = Hash::make($request->password);
        $newUser->social_unique_id      = $request->social_unique_id;
        $newUser->timezone             = $request->time_zone;
        $newUser->token                 = $token;
        $newUser->is_active             = 1;
        $newUser->token_expiry          = date("Y-m-d h:i:s", strtotime("+2 day"));
        $newUser->save();

        $newUserDetail = new UserDetail();
        $newUserDetail->latitude=0.0000;
        $newUserDetail->longitude=0.0000;
        $newUserDetail->user_id=$newUser->id;
        $newUserDetail->save();

        if(!$newUser->save())
        {
            throw (new CommonException())->setValue('602',trans('localization::errors.602'));
        }

        return $newUser;
    }

}
