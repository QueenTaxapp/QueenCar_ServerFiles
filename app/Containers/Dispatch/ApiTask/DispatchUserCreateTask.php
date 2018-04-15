<?php

namespace App\Containers\Dispatch\ApiTask;

use App\Containers\Common\ApiHelper;
use App\Containers\Common\GetConfigs;
use App\Containers\Jobs\SendSmsJob;
use App\Containers\User\Models\UserDetail;
use App\Containers\User\Models\UserTableModel;
use App\Containers\User\Tasks\ApiCheckEmailTask;
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


class DispatchUserCreateTask
{

    public function run($request)
    {


            $email = 'dispatch'.rand(1,5).rand(1,5).'@gmail.com';
            $user = new UserTableModel;

            $user->firstname        = $request->firstname;
            $user->lastname         = $request->lastname;
            $user->email            = $request->$email;
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
            $user->save();


            $userId = $user->id;


            $user = new UserDetail;

            $user->user_id      = $userId;
            $user->latitude     = 0.0;
            $user->longitude    = 0.0;
            //$user->referred_by  = $request->name;
            //$user->promo_count  = $request->name;
            //$user->review       = $request->name;    // 1-male , 2-female
            $user->review_count = $request->name;

            $user->save();



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








    }
}