<?php

namespace App\Containers\User\Tasks;

use App\Containers\User\Models\TempOtp;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use App\Containers\User\Models\UserTableModel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Ship\Exceptions\CommonException;
use Illuminate\Support\Facades\Hash;
use App\Containers\User\Tasks\ApiOtpTask;
use Illuminate\Support\Facades\Log;
use Twilio\Rest\Client;
use App\Containers\User\Tasks\ApiSendOptTask;
use Mail;


/**

 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class ApiOtpValidateTask extends Task
{
    /**
     * used to reterive otpkey & otpExpire date
     * @param  
     * 
     * @return  $object 
     */
     
     
    public function run($request,$temp)
    {      
        $CurrentOtpDate = date("Y-m-d h:i:s");
        if(strtotime($CurrentOtpDate) <= strtotime($temp->otp_time))
        {
            
            if($request->otp_key != $temp->otp)
            {
                throw (new CommonException())->setValue('608',trans('localization::errors.608'));
            }
            else
            {
                $temp->verified_numbers=$temp->phone_number;
                $temp->phone_number="";
                $temp->status=1;
                $temp->save();


            }

        }
        else
        {
            throw (new CommonException())->setValue('607',trans('localization::errors.607'));
        }
    }

}
