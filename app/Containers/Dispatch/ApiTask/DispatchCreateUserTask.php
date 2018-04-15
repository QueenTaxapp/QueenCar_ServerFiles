<?php

namespace App\Containers\Dispatch\ApiTask;

use App\Containers\Common\ApiHelper;
use App\Containers\Jobs\SendSmsJob;
use App\Containers\User\Models\Refferal;
use App\Containers\User\Models\UserDetail;
use App\Containers\User\Models\UserTableModel;
use App\Containers\User\Tasks\ApiCheckEmailTask;
use App\Containers\User\Tasks\GetRandomCode;
use App\Ship\Exceptions\CommonException;

use App\Containers\Compliant\Models\UserCompliantModel;

use App\Containers\Promocode\Models\PromocodeModel;
use Carbon\Carbon;
use App\Containers\Promocode\Models\PromoCodeHistoryModel;
use App\Containers\Request\Models\RequestModel;

use App\Containers\Admin\Models\AdminModel;
use App\Containers\Admin\Tasks\DynamicApiEmailCheckTask;
use App\Containers\User\Tasks\ApiCheckPasswordTask;
use App\Containers\Drivers\Models\DriverModel;
use Illuminate\Support\Facades\DB;
use App\Containers\User\ApiTask\CreateRequest;
use Illuminate\Support\Facades\Hash;


class DispatchCreateUserTask
{

    public function run($request)
    {




        $alreadyRegisteredPhoneNumber = UserTableModel::select('id')
            ->where('phone_number',$request->phone_number)
            ->first();

            if( count( $alreadyRegisteredPhoneNumber ) != 0 )
            {
                throw (new CommonException())->setValue(819,trans("localization::errors.819"));
            }

            $email = 'dispatch'.rand(1,9999).rand(1,999999).'@gmail.com';
            $user = new UserTableModel;

            $user->firstname        = $request->firstname;
            $user->lastname         = $request->lastname;
            $user->email            = $email;
            $user->phone_number     = $request->phone_number;
            $user->password         = Hash::make($request->phone_number);
            $user->gender           = 1;   // 1-male , 2-female
            $user->address          = null;
            $user->city             = null;
            $user->state            = null;
            $user->country          = null;
            $user->is_active        = 1;// if 1 active user or 0 is inactive user
            $user->profile_pic      = null;
            $user->token            = null;
            $user->token_expiry     = null;
            $user->device_token     = null;
            $user->login_by         = null;
            $user->login_method     = null;
            $user->social_unique_id = null;
            $user->if_dispatch      = 1;
            $user->timezone         = $request->timezone;
            $user->save();


            $userId = $user->id;


            $userDetails = new UserDetail;

        $userDetails->user_id      = $userId;
        $userDetails->latitude     = 0.0;
        $userDetails->longitude    = 0.0;
            //$user->referred_by  = $request->name;
            //$user->promo_count  = $request->name;
            //$user->review       = $request->name;    // 1-male , 2-female

        $userDetails->review_count = 0;


        $userDetails->save();

        $codeObject = new GetRandomCode();

        $code = $codeObject->run(5);
        
        $refferal = new Refferal();
        $refferal->user_id=$userId;
        $refferal->amount_earned=0;
        $refferal->amount_spent=0;
        $refferal->amount_balance=0;
        $refferal->code= $code;
        $refferal->save();


        $result  = new \stdClass;

        $result->id = $user->id;
        $result->firstname = $user->firstname;
        $result->lastname = $user->lastname;
        $result->email = $user->email;
        $result->phone_number = $user->phone_number;
        $result->profile_pic = $user->profile_pic;
        $result->latitude = $userDetails->latitude;
        $result->longitude = $userDetails->longitude;
        $result->review = $userDetails->review;


        $messageObj = new ApiHelper;

        $message = $messageObj->sms('10');

        $messageStatus = $message->status;
        $textMessage       = $message->message;

        if (strpos($textMessage, '%userName%') !== false)
        {
            $textMessage =  str_replace("%userName%",$request->phone_number,$textMessage);
        }

        if (strpos($textMessage, '%password%') !== false)
        {
            $textMessage =  str_replace("%password%",$request->phone_number,$textMessage);
        }


        dispatch(new SendSmsJob($request->phone_number,$textMessage,$messageStatus));


        return $result;




    }
}
