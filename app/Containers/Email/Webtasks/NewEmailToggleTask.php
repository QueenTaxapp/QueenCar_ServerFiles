<?php

namespace App\Containers\Email\Webtasks;

use App\Containers\Email\Models\EmailLangModel;
use App\Containers\Email\Models\EmailSettingsModel;
use App\Containers\Email\Webtasks\GetData;
use App\Ship\Parents\Actions\Action;
use Config;

/**
 * Class EmailAction
 * @package App\Containers\Email\Actions
 */
class NewEmailToggleTask
{


    /**
     * to validate user
     * @param null $id
     * @return mixed
     */
    public function run($request)
    {

        $id = $request->id;
        $lang = $request->lang;
        $table = $request->table;

        if($table=="email"){
//echo "sms";die();
            $emailTable = EmailSettingsModel::find($id);

            if($emailTable->status==0){
                $status = 1;
            }else{
                $status = 0;
            }

            $use= new EmailLangModel();
            $use->lang= $lang;
            $use->message= $emailTable->message;
            $use->title= $emailTable->title;
            $use->hint= $emailTable->hint;
            $use->revert= $emailTable->revert;
            $use->trial_value= $emailTable->trial_value;
            $use->status = $status;

        }else{
//echo "en";die();
            $use= EmailLangModel::find($id);

            if($use->status==0){
                $status = 1;
            }else{
                $status = 0;
            }

            $use->status = $status;

        }

        $use->save();

        if($use->status==0){
            $result = array('success'=>"TRUE",'message'=>trans('localization::errors.email_inactive_successfully'));
        }else{
            $result = array('success'=>"TRUE",'message'=>trans('localization::errors.email_active_successfully'));
        }

        return $result;

    }
}