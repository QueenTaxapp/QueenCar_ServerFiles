<?php

namespace App\Containers\Email\Webtasks;

use App\Containers\Admin\Webtasks\Message;
use App\Containers\Common\ApiHelper;
use App\Containers\Common\GetConfigs;
use App\Containers\Email\Models\EmailLangModel;
use App\Containers\Email\Models\EmailSettingsModel;
use App\Containers\Jobs\SendEmailJob;
use App\Ship\Parents\Tasks\Task;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;


/**
 * Class ToggleStatusTask
 * @package App\Containers\Email\Tasks
 */
class TrailEmailTask
{

    /**
     * to toggle email settings
     * @param $id
     * @param $columnName
     * @param $tableName
     */
    public function run($id,$lang,$table = null)
    {

        if($table == 'email_lang')
        {

            $email = $this->email_settings_table($id,$lang,null);

            if(count($email) == 0)
            {
              goto emailTable;
            }
        }
        else
        {
          emailTable:

            $email = $this->email_table($id,$lang,null);


        }


//        if( count($email) == 0)
//        {
//            $email = $this->email_table($id,$lang,$nameArray);
//
//            if( count($email) == 0)
//            {
//                $this->email_not_found($id,$lang,$table);
//            }
//
//        }


        $subject = 'Sample Email '.$email->title;

        $message = $email->message;


        $trial_value = json_decode($email->trial_value);

        $obj = new ApiHelper();
        $additionValue = $obj->Constant_email_data();


        foreach($additionValue as $key => $value)
        {
            $trial_value->$key = $value;
        }



        $value = $trial_value;


        $toEmailAddress = GetConfigs::getConfigs('help_email');

        dispatch(new SendEmailJob($message,$value,$toEmailAddress,$subject,true));



    }

    public  function email_table($id,$lang,$nameArray,$selectArray = array('id','message','trial_value','title','hint'))
    {
        $email = EmailSettingsModel::select($selectArray)
            //->where('title',$nameArray[$id])
            //->where('lang',$lang)
            ->where('id',$id)
            ->first();

        return $email;
    }
    public  function email_settings_table($id,$lang,$nameArray,$selectArray = array('id','message','trial_value','title','hint'))
    {
        $email = EmailLangModel::select($selectArray)
           // ->where('title',$nameArray[$id])
            ->where('id',$id)
            ->where('lang',$lang)
            ->first();

        return $email;
    }


    public function email_not_found($id,$lang,$table)
    {
        $route = 'admin/email/edit/'.$id.'/'.$lang.'/'.$table;



        $this->email_not_found();
        throw new ValidationException((new Message()),redirect()->back('')
            ->withErrors([trans('localization::errors.details_could_not_saved_in')], 'default'));


    }
}
