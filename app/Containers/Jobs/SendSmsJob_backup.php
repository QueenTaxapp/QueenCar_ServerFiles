<?php

namespace App\Containers\Jobs;


use App\Containers\Common\GetConfigs;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Jobs\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Twilio\Rest\Client;
use Config;


/**
 * Class SendSmsJob
 * to send sms
 * @package App\Containers\Jobs
 */

class SendSmsJob1 implements ShouldQueue
{

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $to;

    private $message;

    public function __construct($to, $message,$status)
    {
        $this->to = $to;
        $this->message = $message;
        $this->status  = $status;
    }

    public function handle()
    {


        // $accountSid   = 'AC75a5048afaf14beaafec1a8c9e92e766';//Config::get('app.twillo_account_sid');
        // $authToken    = 'aa4ee49f01d5696716185597b6aaa1c0';//Config::get('app.twillo_auth_token');
        // $twilioNumber = '+12562779152';//Config::get('app.twillo_number');

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

        if($this->status == 1)
        {

            if(GetConfigs::getConfigs('send_sms') !=  0)
            {

                sendSms:

                
                $client = new Client($accountSid, $authToken);

                try{
                    $client->account->messages->create($this->to,array(
                        'from' => "$twilioNumber",

                        'body' => $this->message,
                    )
                                                        );

                    }catch (Exception $e)
                    {
                        logger("sms send failed");
                    }        
            }
        }

       
    }
}