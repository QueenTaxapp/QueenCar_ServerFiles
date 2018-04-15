<?php
namespace App\Containers\Drivers\ApiTask;


use App\Containers\Jobs\AndroidPushNotificationJob;
use App\Containers\Jobs\IosPushNotificationJob;
use App\Containers\Jobs\SendSmsJob;
use App\Ship\Exceptions\CommonException;
use App\Containers\Common\Configs_Class;
use App\Containers\Drivers\Models\DriverModel;
use App\Containers\Request\Models\RequestModel;
use App\Containers\Drivers\Models\DriverCancelModel;

class DriverTripCancelledTask
{
    public function run($data, $custom_parameter)
    {

        $request = $data['request'];

        $requestId = $request->request_id;

        $id = $request->id;

        $reason = $request->reason;

        $request = RequestModel::join('User', 'User.id', '=', 'request.user_id')
                   ->select('request.id','request.is_cancelled','request.is_completed','request.user_id','User.phone_number','User.device_token','User.login_by')
                   ->where('request.id',$requestId)
                   ->first();

        if(count($request) == 0)
        {
            throw(new CommonException())->setValue("803", trans('localization::errors.803'));
        }
        else
        {

            if($request->is_completed == 1)
            {
                throw(new CommonException())->setValue("807", trans('localization::errors.807'));
            }


            if($request->is_cancelled == 1)
            {
                throw (new CommonException())->setValue('808',trans('localization::errors.808'));

            }

            RequestModel::where('id',$requestId)
                ->update(['is_cancelled'=>1,'cancel_method'=>2]);

//
//            print_r($id);
//            die();
            DriverModel::where('id',$id)
                ->update(['is_available'=>1]);


            $flight = new DriverCancelModel;

            $flight->request_id = $requestId;
            $flight->driver_id = $id;
            $flight->reason = $reason;
            $flight->type = 2;
            $flight->save();


            $array = array();
            $array['success']= true;
            $array['is_cancelled'] = 1;
            $array['success_message'] = "Trip cancelled";
            $message = (object)$array;

            $title = trans('localization::errors.805');



            if($request->login_by == 'android')
            {
                //dispatch(new AndroidPushNotificationJob($request->device_token,$message,$title));
                Configs_Class::helper()->send_push($message,$title,$request->device_token,"android","user");

            }
            else if($request->login_by == 'ios')
            {
                 //dispatch(new IosPushNotificationJob($request->device_token,$message,$title,'hero'));
                Configs_Class::helper()->send_push($message,$title,$request->device_token,"ios","user");

            }

            $structure = Configs_Class::helper()->php_to_node_structure($request->user_id,'user',$message,'request_handler');


            Configs_Class::helper()->php_to_node('transfer_msg',$structure);


            $sms = Configs_Class::helper()->sms(9);
            $message = $sms->message;
            dispatch(new SendSmsJob($request->phone_number,$message,$sms->status));

            $message = "Trip cancelled";
            $obj = new \stdClass();
            $obj->message = $message;
            $data['response']=$obj;
            return $data;
        }


    }
}
