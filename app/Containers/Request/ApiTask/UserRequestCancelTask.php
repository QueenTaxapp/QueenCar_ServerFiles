<?php


namespace App\Containers\Request\ApiTask;

use App\Containers\Jobs\SendSmsJob;
use App\Containers\Common\Configs_Class;

use App\Containers\Jobs\AndroidPushNotificationJob;
use App\Containers\Jobs\IosPushNotificationJob;

use App\Containers\Request\Models\RequestModel;
use App\Ship\Exceptions\CommonException;
use App\Containers\Drivers\Models\DriverModel;





/**
 * Class ApiEta$createrequest=new CreateRequest();
        $request = new RequestModel();
        $request->request_id =$createrequest->generateRequestCode();
        $request->later = 1;
        $request->user_id = ;
        return $data;
 * @package App\Containers\eta\ApiTask
 */
class UserRequestCancelTask
{
    public function run($data, $custom_parameter)
    {
        $request = $data['request'];

        $requestModel = RequestModel::select('driver_id','is_completed','is_cancelled','is_trip_start')->where('id',$request->request_id)->first();


        if(count($requestModel) == 0)
        {
            throw (new CommonException())->setValue('803',trans('localization::errors.803'));
        }

        if($requestModel->is_cancelled == 1)
        {
            throw (new CommonException())->setValue('808',trans('localization::errors.808'));

        }

        if($requestModel->is_completed == 1)
        {
            throw (new CommonException())->setValue('807',trans('localization::errors.807'));

        }

        if($requestModel->is_trip_start == 1)
        {
            throw (new CommonException())->setValue('815',trans('localization::errors.815'));

        }

        RequestModel::where('id',$request->request_id)->update(['is_cancelled'=>1,'cancel_method'=>1,'reason'=>$request->reason]);

        if($requestModel->driver_id > 0)
        {
           // DriverModel::where('id',$requestModel->driver_id)->update(['is_available'=>1]);

            $driver = DriverModel::where('id',$requestModel->driver_id)->first();

            $driver->is_available=1;
            $driver->save();


            $sms =Configs_Class::helper()->sms(9);
            $message = $sms->message;
            dispatch(new SendSmsJob($driver->phone_number ,$message,$sms->status));


            $array = array();
            $array['success']= true;
            $array['is_cancelled'] = 1;
            $array['message'] = trans('localization::errors.805');
//            $message = trans('localization::errors.805');
            $title = trans('localization::errors.805');

            $message = (object)$array;

            if($driver->login_by == 'android')
            {
               // dispatch(new AndroidPushNotificationJob($driver->device_token,$message,$title));
                Configs_Class::helper()->send_push($message,$title,$driver->device_token,"android","driver");

                $structure = Configs_Class::helper()->php_to_node_structure($requestModel->driver_id,'driver',$message,'request_handler');


                Configs_Class::helper()->php_to_node('transfer_msg',$structure);


            }
            elseif($driver->login_by == 'ios')
            {
                // dispatch(new IosPushNotificationJob($driver->device_token,$message,'hero'));
                Configs_Class::helper()->send_push($message,$title,$driver->device_token,"ios","driver");

                $structure = Configs_Class::helper()->php_to_node_structure($requestModel->driver_id,'driver',$message,'request_handler');

                Configs_Class::helper()->php_to_node('transfer_msg',$structure);
            }

            $sms =Configs_Class::helper()->sms(9);
            $message = $sms->message;
            dispatch(new SendSmsJob($driver->phone_number ,$message,$sms->status));
        }





        $obj = new \stdClass();
        $obj->message="Trip cancelled";
        $data['response']=$obj;
        return $data;




    }

}
