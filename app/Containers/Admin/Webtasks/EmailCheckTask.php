<?php

namespace App\Containers\Admin\Webtasks;


use App\Ship\Parents\Tasks\Task;
use App\Containers\Admin\Models\AdminModel;
use Illuminate\Validation\ValidationException;


/**
 * Class AdminUpdateEmailTask
 * @package App\Containers\Admin\Tasks
 */
class EmailCheckTask extends Task
{

    /**
     * used to check if email is already present or not
     * @param $request
     * @return array|int
     * @throws ValidationException
     */
    public function run($model,$request_id,$request_email,$redirect_url)
    {

        $old= $model::where('id','=',$request_id)->first();
        if ( ! $old)
        {
            throw new ValidationException((new Message()),redirect()->to($redirect_url.$request_id)
                ->withErrors([trans('localization::errors.internal_server_error')], 'default'));

            return array('success'=>"False",'message'=>"Error In SQL Statement..!");
        }
        else
            {
                $oldemail=$old->email;

                if($oldemail == $request_email)
                {
                    $count=0;
                }
                else
                {
                    $use = $model::where('email','=',$request_email)->first();

                    $count=count($use);

                    if($count>0){
                        throw new ValidationException((new Message()),redirect()->to($redirect_url.$request_id)
                            ->withErrors([trans('localization::errors.email_already_exits')], 'default'));
                    }

                }

            }

    return $count;

    }

}