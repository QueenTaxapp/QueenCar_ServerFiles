<?php

namespace App\Containers\Drivers\Tasks;

use App\Containers\Admin\Tasks\Message;
use App\Containers\Drivers\Models\SmsModel;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Validation\ValidationException;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class SmsUpdateTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {
        $id=$request->id;

        $use =SmsModel::find($id);
        $use->message = $request->message;
        $use->hint = $request->hint;
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