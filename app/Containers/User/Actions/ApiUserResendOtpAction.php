<?php

namespace App\Containers\User\Actions;

use App\Containers\Jobs\SendSmsJob;
use App\Ship\Parents\Actions\Action;
use App\Containers\Common\Configs_Class;
use App\Containers\Sms\Tasks\MakeMessage;
use App\Containers\Sms\Tasks\SmsInterface;
use App\Containers\User\Tasks\TempTokenCheck;
use App\Containers\Sms\Tasks\SendSmsWithPermissionTask;




/**
 * Class WebAdminLoginAction.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */

class ApiUserResendOtpAction extends Action
{

    /**
     * to resend otp
     * @param \App\Ship\Parents\Requests\Request $request
     *
     * @return  String
     *
     */
    public function run($request)
    {

        $temp = $this->call(TempTokenCheck::class, [$request,$request->phone_number]);
        $otp = rand(1111,9999);

        dispatch(new SendSmsJob($request->phone_number,$this->format_otp_message($otp),true));

        $temp->otp=$otp;
        $temp->otp_time=date("Y-m-d h:i:s", strtotime("+15 minutes"));
        $temp->save();
        return $temp->token;



    }

    public function format_otp_message($otp)
    {
        $sms  = Configs_Class::helper()->sms(1);

        $smsMessage = $sms->message;

        if (strpos($smsMessage, '%otpNumber%') !== false)
        {
            $smsMessage =  str_replace("%otpNumber%",$otp,$smsMessage);
        }
        if (strpos($smsMessage, '%otpExpireTime%') !== false)
        {
            $smsMessage =  str_replace("%otpExpireTime%",date("Y-m-d h:i:s", strtotime("+15 minutes")),$smsMessage);
        }

        return $smsMessage;
    }
}




