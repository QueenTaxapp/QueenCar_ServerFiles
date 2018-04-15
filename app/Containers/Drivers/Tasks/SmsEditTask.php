<?php

namespace App\Containers\Drivers\Tasks;

//use Illuminate\Http\Request;
use App\Containers\Admin\Tasks\Message;
use App\Containers\Drivers\Models\SmsModel;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Validation\ValidationException;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class SmsEditTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {
        $id=$request->id;

        $data= SmsModel::where('id','=',$id)->first();

        if (!$data)
        {
            throw new ValidationException((new Message()),redirect()->to('admin/sms/view')
                ->withErrors([trans('localization::errors.error_in_sql_statement')], 'default'));

            return array('success'=>"False",'message'=>"Error In SQL Statement..!");
        }

        return $data;
    }

}