<?php
namespace App\Containers\Drivers\ApiTask;

use App\Containers\Common\Configs_Class;
use App\Containers\Jobs\AndroidPushNotificationJob;
use App\Ship\Exceptions\CommonException;
use App\Containers\Request\Models\RequestModel;
use Carbon\Carbon;
use App\Containers\Drivers\ApiTask\DriverArrivedTask;

class DriverTripStartedTask
{

    public function run($data, $custom_parameter)
    {

        $request = $data['request'];

        $requestId = $request->request_id;


//        $request = RequestModel::join('User', 'User.id', '=', 'request.user_id')
//            ->select('request.id','request.is_driver_arrived','request.is_cancelled','request.is_trip_start','request.user_id','User.device_token','User.login_by')
//            ->where('request.id',$requestId)
//            ->first();

        $obj = new DriverArrivedTask();
        $request  = $obj->requestFullDetails($requestId);



        if(count($request) == 0)
        {
            throw(new CommonException())->setValue("803", trans('localization::errors.803'));
        }
        else
        {
            if($request->is_cancelled == 1)
            {
                throw(new CommonException())->setValue("805", trans('localization::errors.805'));

            }
            if($request->is_driver_arrived == 0)
            {
                throw(new CommonException())->setValue("806", trans('localization::errors.806'));

            }

            if($request->is_trip_start == 1)
            {
                throw(new CommonException())->setValue("809", trans('localization::errors.809'));

            }

            $current = Carbon::now();
            $time = $current->toDateTimeString();

            RequestModel::where('id',$requestId)
                ->update(['is_trip_start'=>1,'trip_start_time'=>$time]);

            $request  = $obj->requestFullDetails($requestId);


            $title = 'trip started';

            $message = trans('localization::errors.trip_started');
            $message = $obj->requestFullDetailsStructure($request,$message);


            if($request->login_by == 'android')
            {
                //dispatch(new AndroidPushNotificationJob($request->device_token,$message,$title));
                Configs_Class::helper()->send_push($message,$title,$request->device_token,"android","user");

            }
            else if($request->login_by == 'ios')
            {
                // dispatch(new IosPushNotificationJob($request->device_token,$message,'hero'));
                Configs_Class::helper()->send_push($message,$title,$request->device_token,"ios","user");

            }

            $structure = Configs_Class::helper()->php_to_node_structure($request->user_id,'user',$message,'trip_status');

            Configs_Class::helper()->php_to_node('transfer_msg',$structure);

            $message = 'trip started';
            $obj = new \stdClass();
            $obj->message = $message;
            $data['response']=$obj;
            return $data;
        }


    }
}