<?php

namespace App\Containers\Sms\Tasks;

use App\Containers\Admin\Tasks\Message;
use App\Containers\Sms\Models\SmsModel;
use App\Containers\Sms\Models\SmsSettingModel;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Validation\ValidationException;

/**
 * Class SmsInactiveTask
 * @package App\Containers\Sms\Tasks
 */
class SmsInactiveTask extends Task
{
    /**
     * used to deactive a sms setting
     * @param $request
     * @return array
     * @throws ValidationException
     */
    public function run($request)
    {
        $id = $request->id;
        $lang = $request->lang;
        $table = $request->table;

        if($table=="sms"){
//echo "sms";die();
            $smsTable =SmsModel::find($id);

            $use= new SmsSettingModel();
            $use->lang= $lang;
            $use->message= $smsTable->message;
            $use->title= $smsTable->title;
            $use->hint= $smsTable->hint;
            $use->revert= $smsTable->revert;

        }else{
//echo "en";die();
            $use= SmsSettingModel::find($id);
        }

        $use->is_active = 0;
        $use->save();

        if ( ! $use->save())
        {
            throw new ValidationException((new Message()),redirect()->to('admin/sms/view')
                ->withErrors([trans('localization::errors.details_could_not_saved_in')].$use, 'default'));

            return array('success'=>"False",'message'=>"Details Couldn't Saved in".$use);

        }

        return array('success'=>"TRUE",'message'=>trans('localization::errors.sms_inactive_successfully'));
    }

}