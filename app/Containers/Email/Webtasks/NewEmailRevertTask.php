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
class NewEmailRevertTask
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

            $emailTable = EmailSettingsModel::where('id','=',$id)->first();

            $use= new EmailLangModel();
            $use->lang= $lang;
            $use->title= $emailTable->title;
            $use->message= $emailTable->revert;
            $use->hint= $emailTable->hint;
            $use->revert= $emailTable->revert;
            $use->status= $emailTable->status;
            $use->trial_value= $emailTable->trial_value;
            $use->save();

            $return_value = $use->id;
            //echo "<pre>";print_r($use->id);die();

        }else{

            $revert= EmailLangModel::find($id);
            $revert_value = $revert->revert;
            $revert->message = $revert_value;
            $revert->save();

            $return_value = $id;

        }

        $id_data['id'] = $return_value;
        $id_data['lang'] = $lang;
        $id_data['table'] = "email_lang";

        return $id_data;
    }
}