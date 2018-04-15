<?php

namespace App\Containers\User\Webtasks;

use App\Containers\Admin\Webtasks\Message;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\Hash;
use App\Containers\User\Models\Country;
use Illuminate\Support\Facades\Session;
use App\Ship\Exceptions\CommonException;
use App\Containers\User\Models\UserDetail;
use App\Containers\Zone\Models\CurrencyModel;
use App\Containers\User\Models\UserTableModel;
use Illuminate\Validation\ValidationException;

/**

 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class UserSaveTask extends Task
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

            $country = $request->country_code;

            $currencyTable = CurrencyModel::where('country',$country)->first();

            if(! $currencyTable){

                throw new ValidationException((new Message()),redirect()->to('admin/user/add')
                    ->withErrors([trans('localization::errors.737')], 'default'));
            }else{
                $currency_code = $currencyTable->code;
                $currency_symbol = $currencyTable->symbol;
            }

        $timezone = $request->timezone;
        $time = new \DateTime('now', new \DateTimeZone($timezone));
        $timezoneOffset = $time->format('P');


        $newUser = new  UserTableModel;
        $newUser->firstname             = $request->firstName;
        $newUser->lastname              = $request->lastName;
        $newUser->email                 = $request->email;
        $newUser->gender                = $request->gender;
        $newUser->address               = $request->address;
        $newUser->city                  = $request->city;
        $newUser->state                 = $request->state;
        $newUser->country               = $country;
        $newUser->currency_code         = $currency_code;
        $newUser->currency_symbol       = $currency_symbol;
        $newUser->phone_number          = $request->phone_number;
        $newUser->login_method          = "manual";
        //$newUser->login_by              = $request->login_by;
        //$newUser->device_token          = $request->device_token;
        $newUser->password              = Hash::make($request->password);
        // $newUser->social_unique_id      = $request->social_unique_id;
        $newUser->token                 = $token;
        $newUser->is_active             = 1;
        $newUser->token_expiry          = date("Y-m-d h:i:s", strtotime("+2 day"));

        $newUser->timezone = $timezoneOffset;

        $newUser->save();



        $id = $newUser->id;

        $newUserDetail = new UserDetail();


        $newUserDetail->latitude=0.0000;
        $newUserDetail->longitude=0.0000;
        $newUserDetail->user_id = $newUser->id;
        $newUserDetail->save();

        if(!$newUser->save())
        {
            throw (new CommonException())->setValue('602',trans('localization::errors.602'));
        }

        return $newUser;
    }

}
