<?php

namespace App\Containers\Drivers\Actions;

use App\Containers\Common\Configs_Class;
use App\Containers\Drivers\Models\DriverModel;
use App\Containers\Drivers\Tasks\ApiDriverSignUpTask;
use App\Containers\Jobs\SendSmsJob;
use App\Containers\Sms\Tasks\MakeMessage;
use App\Containers\Sms\Tasks\SendSmsWithPermissionTask;
use App\Containers\Sms\Tasks\SmsInterface;
use App\Containers\User\Tasks\GetRandomCode;
use App\Containers\User\Tasks\TempTokenCheck;
use App\Containers\User\Tasks\UserMobileCheckTask;
use App\Ship\Exceptions\CommonException;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Class LoginValidationAction
 *
 * @author vicky
 */
class ApiDriverForgotPasswordAction extends Action
{

    /**
     * @method run used to validate if the user is Valid or invalid or blocked
     * @param \App\Ship\Parents\Requests\Request $request
     *
     * @return  array
     */
    public function run($request)
    {


        $temp = $this->call(TempTokenCheck::class, [$request]);

        $user = $this->call(UserMobileCheckTask::class, [$request,'App\Containers\Drivers\Models\DriverModel']);

        $smsObject  = Configs_Class::helper()->sms(2);

        if($smsObject)
        {
            $password=$this->call(GetRandomCode::class, [8]);
            $smsObject->password=$password;
            //$message = $this->call(MakeMessage::class, [$smsObject,"forgot_pasword"]);
            //$this->call(SendSmsWithPermissionTask::class, [$request->phone_number,$message,true]);
            $temp->phone_number=$request->phone_number;
            $user->password=Hash::make($password);
            $user->save();

            $smsMessage = $smsObject->message;
            if (strpos($smsMessage, '%password%') !== false)
            {
                $smsMessage =  str_replace("%password%",$password,$smsMessage);
            }
            dispatch(new SendSmsJob($request->phone_number,$smsMessage,true));

            DB::table('tempOtp')->where('token',$request->token)->delete();
        }
        else{
            throw (new CommonException())->setValue('703',trans('localization::errors.703'));
        }
        return ;

    }
}