<?php

namespace App\Containers\Drivers\Tasks;

use App\Ship\Parents\Tasks\Task;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use App\Containers\User911\Models\UserTableModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use App\Ship\Exceptions\CommonException;
use Illuminate\Support\Facades\Hash;
use App\Containers\User911\Tasks\ApiOtpTask;
use Illuminate\Support\Facades\Log;
use Twilio\Rest\Client;
/**

 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class ApiSendEmailTask extends Task
{
    /**
     * used to check if the email address is present or not
     * @param  $email string
     *
     * @return  array
     */
    public function run($email, $mess)
    {
        $em=$email;
        Mail::send(['test'=>'mail'],['name'=>'vicky','email'=>$email],function($message)
        {

            $message->to('ganesh.nplus@gmail.com','to ganesh')->subject('911 test email');
            $message->from('vickycodename007@gmail.com','911');
        });


        return $responce = array('success'=>"True",'message'=>"Email send Success");

    }

}
