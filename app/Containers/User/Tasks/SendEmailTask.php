<?php

namespace App\Containers\User\Tasks;

use App\Ship\Parents\Tasks\Task;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use App\Containers\User\Models\UserTableModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use App\Ship\Exceptions\CommonException;
use Illuminate\Support\Facades\Hash;
use App\Containers\User\Tasks\ApiOtpTask;
use Illuminate\Support\Facades\Log;
use Twilio\Rest\Client;
use App\Containers\User\Tasks\ApiSendOptTask;
//use Mail;
/**

 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class SendEmailTask extends Task
{
    /**
     * used to check if the email address is present or not
     * @param  $email string 
     * 
     * @return  array 
     */
     
     
    public function run($viewPage,$name=null,$toEmail,$subject)
    {                          
        Mail::send($viewPage,['name'=>$name],function($message)  use ($toEmail, $subject)
        {
            $message->to($toEmail)->subject($subject);
        });

    }

}
