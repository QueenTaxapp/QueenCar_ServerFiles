<?php

namespace App\Containers\Jobs;


use App\Ship\Parents\Jobs\Job;
use Mail;
use DB;


/**
 * Class SendEmailJob
 * to send email
 * @package App\Containers\Jobs
 */
class IosPushNotificationJob extends Job
{

    private $device_token;
    private $message;
    private $type;
    private $title;


   

    public function __construct($device_token, $message ,$title,$user_type)
    {

        $this->device_token  = $device_token;
        $this->message    = $message;
        $this->title = $title;
        $this->type    = $user_type;


    }


    public function handle()
    {

        if(is_array($this->device_token))
        {
            $deviceToken = $this->device_token;
        }
        else
        {
            $deviceToken = array($this->device_token);
        }


        $ctx = stream_context_create();
        // ck.pem is your certificate file

        if($this->type == "user")
        {
            //$file = public_path('assets/TaxiappzCustomerDevPush.pem');
            $file = public_path('assets/AwamiDemoCustomerProdPush.pem');
        }
        else
        {

           $file = public_path('assets/TaxiappzCustomerDevPush.pem');
        }


        stream_context_set_option($ctx, 'ssl', 'local_cert',$file);

        stream_context_set_option($ctx, 'ssl', 'passphrase','nPlus@2014');
        // Open a connection to the APNS server  'ssl://gateway.sandbox.push.apple.com:2195'
        $fp = stream_socket_client(
            //'ssl://gateway.sandbox.push.apple.com:2195', $err,
            'ssl://gateway.push.apple.com:2195', $err,
            $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
        if (!$fp){
            exit("Failed to connect: $err $errstr" . PHP_EOL);}
        // Create the payload body
        $body['aps'] = array(
            'alert' => array(
                'title' =>$this->title,
                'body' =>$this->message,
            ),
            'sound' => 'default'
        );
        // Encode the payload as JSON
        $payload = json_encode($body);
        // Build the binary notification
        foreach ($deviceToken as $value)
        {
            $msg = chr(0) . pack('n', 32) . pack('H*', $value) . pack('n', strlen($payload)) . $payload;
            // Send it to the server
            $result = fwrite($fp, $msg, strlen($msg));
        }


        // Close the connection to the server
        fclose($fp);
        if (!$result) {
            echo 'Message not delivered' . PHP_EOL;
        }
        else {
            echo 'Message successfully delivered' . PHP_EOL;
        }
//die('die');
    }
}