<?php
namespace App\Containers\User\ApiTask;
use App\Containers\Admin\Tasks\SessionKeyTask;

use App\Containers\Sos\Models\SosModel;
use App\Containers\User\Tasks\ApiCheckEmailTask;
use App\Containers\User\Tasks\ApiCheckPasswordTask;
use App\Containers\User\Tasks\ApiSocialUniqueIdCheckTask;
use App\Ship\Exceptions\CommonException;

class UserLoginTask
{

    public function run($data, $custom_parameter)
    {


        $request = $data['request'];


        $result='';
        if($request->login_method == 'manual')
        {

            $emailObject = new ApiCheckEmailTask();

            $result = $emailObject->run($request->username,'App\Containers\User\Models\UserTableModel');


            $passwordObject = new ApiCheckPasswordTask();


            $passwordObject->run($request->password,$result['password']);


        }
        else if($request->login_method == 'facebook' || $request->login_method == 'google')
        {
            $socialObject = new ApiSocialUniqueIdCheckTask();

            $result = $socialObject->run($request->social_unique_id);

        }


        // common tasks


        if($result->is_active != 1)
        {
            throw (new CommonException())->setValue('704',trans('localization::errors.704'));
        }


        $SessionKeyTask = new SessionKeyTask();
        $token = $SessionKeyTask->run();


        if($result->device_token != $request->device_token)
        {
            $deviceToken = $request->device_token;
            $result->device_token = $deviceToken;
        }
        if($result->login_by != $request->login_by)
        {
            $loginBy = $request->login_by;
            $result->login_by = $loginBy;
        }

        $result->token_expiry=date("Y-m-d h:i:s", strtotime("+2 day"));

        $result->token = $token;



        $result->save();


        //$sos = SosModel::select('id','name','number')->get();

        $array = array();


        $message = "User_Logged";
        $obj = new \stdClass();
        $obj->message = $message;
        $obj->data = (object)array('driver'=>$result,'sos'=>$array);
        $data['response']=$obj;
        return $data;



    }
}