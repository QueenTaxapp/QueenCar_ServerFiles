<?php

namespace App\Containers\Sms\Tasks;

use App\Containers\Admin\Models\SettingsModel;
use App\Containers\Admin\Tasks\Message;
use App\Containers\Jobs\SendSmsJob;
use App\Containers\Sms\Models\SmsModel;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Validation\ValidationException;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class SendSmsWithPermissionTask extends Task
{
    /**
     * Send Sms from Twilio
     *
     * @param     String $phone
     * @param     String $message
     * @param     Boolean $imp
     *
     */
    public function run($phone,$message,$imp=false)
    {
           // $setting = SettingsModel::where('title',"sms_notification_title")->first();
            if(1 == 1 || $imp)
            {
                dispatch(new SendSmsJob($phone,$message,true));
            }
    }

}