<?php

namespace App\Jobs;

use Apiato\Core\Abstracts\Exceptions\Exception;
use App\Containers\Common\GetConfigs;
use App\Ship\Parents\Requests\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Twilio\Rest\Client;

class SendReminderSms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $to;

    public $message;

    public $status;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($to, $message,$status)
    {

        $this->to = $to;
        $this->message = $message;
        $this->status  = $status;

      /*  $url = base_path('app/Containers/Email/UI/WEB/Views/UserNewRegister.blade.php');


        $myString = $this->message;


        $fh = fopen($url, "w");
        fwrite($fh, $myString);
        fclose($fh);*/
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $url = base_path('app/Containers/Email/UI/WEB/Views/UserNewRegister.blade.php');


        $myString = $this->message;


        $accountSid     = GetConfigs::getConfigs('twillo_account_sid');

        $authToken      = GetConfigs::getConfigs('twillo_auth_token');

        $twilioNumber   = GetConfigs::getConfigs('twillo_number');


        if (is_bool($this->status) === true)
        {
            if($this->status)
            {
                goto sendSms;
            }
        }

        $a = GetConfigs::getConfigs('send_sms');

        if($this->status == 1)
        {


            if(GetConfigs::getConfigs('send_sms') !=  0)
            {

                sendSms:


                $client = new Client($accountSid, $authToken);

                try{

                    $client->account->messages->create($this->to,array(
                            'from' => $twilioNumber,

                            'body' => $this->message,
                        )
                    );

                    $fh = fopen($url, "w");
                    fwrite($fh, $twilioNumber);
                    fclose($fh);

                }catch (Exception $e)
                {
                    logger("sms send failed");
                }
            }
        }


    }

}
