<?php

namespace App\Containers\Sms\Tasks;

//use Illuminate\Http\Request;
use App\Containers\Admin\Tasks\Message;
use App\Containers\Sms\Models\SmsModel;
use App\Containers\Sms\Models\SmsSettingModel;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Validation\ValidationException;

/**
 * Class SmsEditTask
 * @package App\Containers\Sms\Tasks
 */
class SmsEditTask extends Task
{
    /**
     * used to return data to sms edit page
     * @param $request
     * @return array|\Illuminate\Database\Eloquent\Model|null|static
     * @throws ValidationException
     */
    public function run($request)
    {
        $id = $request->id;
        $lang = $request->lang;
        $table = $request->table;
        //echo "<pre>";print_r($request->table);die();

        if($table=="sms"){
            $data= SmsModel::where('id','=',$id)->first();
        }else{
            $data= SmsSettingModel::where('id','=',$id)->first();
        }

        //echo "<pre>";print_r($data);die();


        if (!$data)
        {
            throw new ValidationException((new Message()),redirect()->to('admin/sms/view')
                ->withErrors([trans('localization::errors.error_in_sql_statement')], 'default'));

            return array('success'=>"False",'message'=>"Error In SQL Statement..!");
        }

        return $data;
    }

}