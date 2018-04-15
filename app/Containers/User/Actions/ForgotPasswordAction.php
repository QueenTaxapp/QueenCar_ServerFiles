<?php

namespace App\Containers\User\Actions;



use App\Containers\Common\Configs_Class;
use App\Containers\Jobs\SendSmsJob;
use App\Containers\User\Tasks\GetRandomCode;
use App\Containers\User\Tasks\TempTokenCheck;
use App\Containers\User\Tasks\UserMobileCheckTask;
use App\Ship\Exceptions\CommonException;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class ForgotPasswordAction extends Action
{

    /**
     * Send Otp
     * @param \App\Ship\Parents\Requests\Request $request
     *
     * @return  String
     */
    public function run($request)
    {

        $temp = $this->call(TempTokenCheck::class, [$request]);
        $user = $this->call(UserMobileCheckTask::class, [$request,'App\Containers\User\Models\UserTableModel']);

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