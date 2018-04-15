<?php

namespace App\Jobs;

use Apiato\Core\Abstracts\Exceptions\Exception;
use App\Containers\Common\GetConfigs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendReminderEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */


    public $viewPage;
    public $array;
    public $toEmail;
    public $subject;
    public $status;

    public function __construct($viewPage,$array=null,$toEmail,$subject,$status)
    {

        $this->subject  = $subject;
        $this->array    = (object) $array;
        $this->viewPage = $viewPage;
        $this->toEmail  = $toEmail;
        $this->status   = $status;


    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mail)
    {

        if (is_bool($this->status) === true)
        {
            if($this->status)
            {
                goto sendMail;
            }
        }

        if($this->status == 1)
        {

            if(GetConfigs::getConfigs('send_email') !=  0)
            {


                sendMail:


                $to=$this->toEmail;
                $sub=$this->subject;


                $url = base_path('app/Containers/Email/UI/WEB/Views/UserNewRegister.blade.php');


                $myString = $this->viewPage;


                $fh=fopen($url,"w");
                fwrite($fh, str_replace("-&gt;","->",$myString));
                fclose($fh);


                try
                {
                    // Validate the value...
                    // Mail::send('email::UserNewRegister',['value'=>$this->array],function($message)  use ($to, $sub)


                    $mail->send('email::UserNewRegister',['value'=>$this->array],function($message)  use ($to, $sub)
                        // Mail::send('email::UserNewRegister',['value'=>$this->array],function($message)  use ($to, $sub)
                    {

                        $message->from(GetConfigs::getConfigs('help_email'),GetConfigs::getConfigs('application_name') );
                        $message->to($to)->subject($sub);
                    });

                } catch (Exception $e)
                {


                    report($e);


                }




            }
        }



    }
}
