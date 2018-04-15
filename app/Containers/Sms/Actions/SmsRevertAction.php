<?php

namespace App\Containers\Sms\Actions;

use App\Containers\Sms\Models\SmsModel;
use App\Containers\Sms\Models\SmsSettingModel;
use App\Ship\Parents\Actions\Action;

/**
 * Class SmsRevertAction
 * @package App\Containers\Sms\Actions
 */
class SmsRevertAction extends Action
{
    /**
     * used to revert a sms
     * @param $id
     * @return mixed
     */
    public function run($request)
    {
        //echo "<pre>";print_r($request->all());print_r($request->lang);print_r($request->table);die();

        $id = $request->id;
        $lang = $request->lang;
        $table = $request->table;

        $return_value=array();

        if($table=="sms"){

            $smsTable = SmsModel::where('id','=',$id)->first();

            $use= new SmsSettingModel();
            $use->lang= $lang;
            $use->title= $smsTable->title;
            $use->message= $smsTable->revert;
            $use->hint= $smsTable->hint;
            $use->revert= $smsTable->revert;
            $use->is_active= $smsTable->is_active;
            $use->save();

            $return_value['id'] = $use->id;
            //echo "<pre>";print_r($use->id);die();

        }else{

            $revert= SmsSettingModel::find($id);
            $revert_value = $revert->revert;
            $revert->message = $revert_value;
            $revert->save();

            $return_value['id'] = $id;

        }

        $return_value['lang'] = $lang;
        $return_value['table'] = "sms_lang";


        return $return_value;

    }
}