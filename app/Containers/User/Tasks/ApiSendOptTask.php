<?php

namespace App\Containers\User\Tasks;

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
/**

 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class ApiSendOptTask extends Task
{
    /**
     * used to check if the email address is present or not
     * @param  $email string 
     * 
     * @return  array 
     */
    public function run($to, $message)
    {        


$sid = "ACcefd35c49910c81951a203c68d3b82c4";
$token = "edbbd58aa24dc9e6a55a2adca29ca062";
$client = new Client($sid, $token);


$client->messages
    ->create(
        "+918056335103",
        array(
            "from" => "+1 385-282-6487",
            "body" => "TEST",
          //  "mediaUrl" => "http://www.example.com/hearts.png"
        )
    );
                 
        //  $accountSid = "ACcefd35c49910c81951a203c68d3b82c4";
        //  $authToken = "edbbd58aa24dc9e6a55a2adca29ca062";
        //  $twilioNumber = "+1 385-282-6487";     





        //     $client = new Client($accountSid, $authToken);
      

        //     $people = array(
        //         $to => $message,
        //     );

        //     echo "<pre>";
        //     print_r($people);

        //     die(); 
            
        //     foreach ($people as $number => $otp) 
        //     {

        //         $sms = $client->account->messages->create(

        //         $number,

        //         array(
        //             'from' => "$twilioNumber", 

        //             'body' => $otp,
        //             )
        //         );
        //     }

        //     if(!$sms)
        //     {
        //        throw (new CommonException())->setValue('605',trans('localization::errors.605'));
        //     }


    }

}
