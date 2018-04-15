<?php

namespace App\Containers\Sms\Tasks;

use App\Containers\Admin\Tasks\Message;
use App\Containers\Sms\Models\SmsModel;
use App\Containers\Sms\Models\SmsSettingModel;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Validation\ValidationException;

/**
 * Class SmsUpdateTask
 * @package App\Containers\Sms\Tasks
 */
class SmsUpdateTask extends Task
{
    /**
     * used to update details of sms
     * @param $request
     * @return array
     * @throws ValidationException
     */
    public function run($request)
    {
       // echo "<pre>";print_r($request->all());print_r($request->lang);print_r($request->table);die();

        $id = $request->id;
        $lang = $request->lang;
        $table = $request->table;

        if($table=="sms"){

            $smsTable = SmsModel::where('id','=',$id)->first();

            $use = new SmsSettingModel();
            $use->lang = $lang;
            $use->title = $smsTable->title;
            $use->hint = $smsTable->hint;
            $use->revert = $smsTable->revert;
            $use->is_active = $smsTable->is_active;
        }else{

            $use= SmsSettingModel::find($id);
        }
        //die();

        $use->message = $request->message;
        $use->save();

        if ( ! $use->save())
        {
            throw new ValidationException((new Message()),redirect()->to('admin/sms/edit/'.$id)
                ->withErrors([trans('localization::errors.details_could_not_saved_in')].$use, 'default'));

            return array('success'=>"False",'message'=>"Details Couldn't Saved in".$use);

        }

        return array('success'=>"TRUE",'message'=>trans('localization::errors.sms_updated_successfully'));
    }

}