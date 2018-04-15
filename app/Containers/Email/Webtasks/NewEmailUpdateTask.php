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
class NewEmailUpdateTask
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
            $use->hint= $emailTable->hint;
            $use->revert= $emailTable->revert;
            $use->trial_value= $emailTable->trial_value;
            $use->status= $emailTable->status;
        }else{

            $use= EmailLangModel::find($id);
        }

        $use->message = html_entity_decode($request['editor'], ENT_QUOTES);
       // print_r($request['editor']);die();
        //print_r(html_entity_decode($request['editor'], ENT_QUOTES));die();
        $use->save();

        $id_data['id'] = $use->id;
        $id_data['lang'] = $lang;
        $id_data['table'] = "email_lang";

        return $id_data;
    }
}
