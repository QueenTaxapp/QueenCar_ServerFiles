<?php

namespace App\Containers\Jobs;


use App\Containers\Common\Configs_Class;
use App\Containers\Common\GetConfigs;
use App\Ship\Parents\Jobs\Job;
use Mail;
use DB;


/**
 * Class SendEmailJob
 * to send email
 * @package App\Containers\Jobs
 */
class AndroidPushNotificationJob extends Job
{

    private $device_token;
    private $message;
    private $title;


   

    public function __construct($device_token, $message, $title)
    {

        $this->device_token  = $device_token;
        $this->message    = $message;
        $this->title    = $title;

    }


    public function handle()
    {

        $API_ACCESS_KEY= GetConfigs::getConfigs('google_browser_key');


        if(is_array($this->device_token))
        {
            $registrationIds = $this->device_token;
        }
        else
        {
            $registrationIds = array($this->device_token);
        }

        // prep the bundle
        $msg = array
        (
            'message' 	=> $this->message,
            'title'		=> $this->title,
            'vibrate'	=> 1,
            'sound'		=> 1,
            'largeIcon'	=> 'large_icon',
            'smallIcon'	=> 'small_icon'
        );
        $fields = array
        (
            'registration_ids' 	=> $registrationIds,
            'data'			=> $msg
        );

        $headers = array
        (
            'Authorization: key=' . $API_ACCESS_KEY,
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );

        return $result;
    }
}