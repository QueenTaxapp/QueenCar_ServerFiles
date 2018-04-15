<?php

namespace App\Containers\Admin\Webtasks;


use App\Ship\Parents\Tasks\Task;
use App\Containers\Admin\Models\AdminModel;
use Illuminate\Validation\ValidationException;


/**
 * Class AdminUpdateEmailTask
 * @package App\Containers\Admin\Tasks
 */
class PhoneCheckTask extends Task
{

    /**
     * used to check if email is already present or not
     * @param $request
     * @return array|int
     * @throws ValidationException
     */
    public function run($model,$request_id,$request_phone,$field_name,$redirect_url)
    {

        if($field_name=="phone_number"){
            $error="phone_already_exits";
        }else if($field_name=="emergency_number"){
            $error="emergency_number_already_exits";
        }
        $old= $model::where('id','=',$request_id)->first();
        if ( ! $old)
        {
            throw new ValidationException((new Message()),redirect()->to($redirect_url.$request_id)
                ->withErrors([trans('localization::errors.internal_server_error')], 'default'));

            return array('success'=>"False",'message'=>"Error In SQL Statement..!");
        }
        else
            {
                $oldemail=$old->$field_name;

                if($oldemail == $request_phone)
                {
                    $count=0;
                }
                else
                {
                    $use = $model::where($field_name,'=',$request_phone)->first();

                    $count=count($use);

                    if($count>0){
                        throw new ValidationException((new Message()),redirect()->to($redirect_url.$request_id)
                            ->withErrors([trans('localization::errors.'.$error)], 'default'));
                    }

                }

            }

    return $count;

    }

}