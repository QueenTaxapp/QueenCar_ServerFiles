<?php

namespace App\Containers\User\Actions;



use App\Containers\Common\Configs_Class;
use App\Containers\Jobs\SendSmsJob;
use App\Containers\Sms\Tasks\MakeMessage;
use App\Containers\Sms\Tasks\SendSmsWithPermissionTask;
use App\Containers\Sms\Tasks\SmsInterface;
use App\Containers\User\Tasks\MobileCheckTask;
use App\Containers\User\Tasks\TempTokenCheck;
use App\Ship\Exceptions\CommonException;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\DB;




class SendOtpAction extends Action
{

    /**
     * Send Otp
     * @param \App\Ship\Parents\Requests\Request $request
     *
     * @return  String
     */

    public $otp;

    public function run($request)
    {
        $temp = $this->call(TempTokenCheck::class, [$request]);
        $status = $this->call(MobileCheckTask::class, [$request]);
        switch ($status['StatusCode'])
        {
            case 1: //old temp number
                $this->delete_token($status['data']['token']);
                $this->run_flow($temp,$request);
                $this->send_sms($request);
                throw (new CommonException())->setValue('702',trans('localization::errors.702'));
                break;

            case 2: //already a user
                $this->delete_token($temp->token);
                return ;
                break;
            case 3: //new user
                $this->run_flow($temp,$request);
                $this->send_sms($request);
                return $temp->token;
        }

    }


    public function send_sms($request)
    {
        dispatch(new SendSmsJob($request->phone_number,$this->format_otp_message(),true));
    }


    public function delete_token($token)
    {

        DB::table('tempOtp')->where('token',$token)->delete();

    }


    public function generate_otp()
    {
        $this->otp=rand(1111,9999);
        return $this->otp;
    }

    public function run_flow($temp,$request)
    {
        $this->update_otp($temp,$this->generate_otp(),$request);
    }

    public function format_otp_message()
    {
            $sms  = Configs_Class::helper()->sms(1);

            $smsMessage = $sms->message;

            if (strpos($smsMessage, '%otpNumber%') !== false)
            {
                $smsMessage =  str_replace("%otpNumber%",$this->otp,$smsMessage);
            }
            if (strpos($smsMessage, '%otpExpireTime%') !== false)
            {
                $smsMessage =  str_replace("%otpExpireTime%",date("Y-m-d h:i:s", strtotime("+15 minutes")),$smsMessage);
            }

            return $smsMessage;
    }

    public function update_otp($temp,$otp,$request)
    {
        $temp->phone_number=$request->phone_number;
        $temp->otp=$otp;
        $temp->otp_time=date("Y-m-d h:i:s", strtotime("+15 minutes"));
        $temp->save();
    }
}
