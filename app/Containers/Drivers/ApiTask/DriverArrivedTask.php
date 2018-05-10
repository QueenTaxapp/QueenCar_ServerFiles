<?php
namespace App\Containers\Drivers\ApiTask;
use App\Containers\Admin\Tasks\SessionKeyTask;

use App\Containers\Common\Configs_Class;
use App\Containers\Drivers\Models\DriverModel;
use App\Containers\Jobs\AndroidPushNotificationJob;
use App\Ship\Exceptions\CommonException;
use Illuminate\Support\Facades\Hash;
use App\Containers\Sos\Models\SosModel;
use App\Containers\Request\Models\RequestModel;

use App\Containers\Drivers\ApiTask\DriverResponseRequestTask;

class DriverArrivedTask
{

    public function run($data, $custom_parameter)
    {

        $request   = $data['request'];

        $requestId = $request->request_id;


        $request = $this->requestFullDetails($requestId);


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
            if($request->is_driver_started == 0)
            {
                throw(new CommonException())->setValue("804", trans('localization::errors.804'));

            }


            if($request->is_driver_arrived == 1)
            {
                throw(new CommonException())->setValue("810", trans('localization::errors.810'));

            }

            RequestModel::where('id',$requestId)
                ->update(['is_driver_arrived'=>1]);

            $request = $this->requestFullDetails($requestId);



            $message = trans('localization::errors.driver_arrived');
            $message = $this->requestFullDetailsStructure($request,$message);

            $title = trans('localization::errors.driver_arrived');


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
        }

            $message = 'driver arrived';
            $obj = new \stdClass();
            $obj->message = $message;
            $data['response']=$obj;
            return $data;

    }



    public function requestFullDetails($requestId)
    {

        $request = RequestModel::join('User', 'User.id', '=', 'request.user_id')

            ->leftJoin('User_detail','request.user_id','=','User_detail.user_id')
            ->leftJoin('request_place','request.id','=','request_place.request_id')
            //->select('request.id','request.is_driver_started','request.is_cancelled','request.is_driver_arrived','request.user_id','User.phone_number','User.device_token','User.login_by')
            -> select('request.id','request.trip_start_time','request.is_driver_started','request.is_driver_arrived','request.is_trip_start',
                'request.is_cancelled','request.is_completed','request.payment_opt','request.type','request_place.pick_latitude',
                'request_place.pick_longitude','request_place.drop_latitude','request_place.drop_longitude','request_place.pick_location',
                'request_place.drop_location','User.id AS user_id','User.firstname','User.lastname','User.email',
                'User.phone_number','User.profile_pic','User.device_token',
                'User.login_by','User_detail.review'
            )
            ->where('request.id',$requestId)
            ->first();

        return $request;
    }

        public function requestFullDetailsStructure($result,$message)
        {
        $obj = new \stdClass();
        $obj->success = true;
        $obj->success_message= $message;
        $obj->request = new \stdClass();
        $obj->request->id = $result->id;
        $obj->request->trip_start_time = $result->trip_start_time;
        $obj->request->is_driver_started = $result->is_driver_started;
        $obj->request->is_driver_arrived = $result->is_driver_arrived;
        $obj->request->is_trip_start = $result->is_trip_start;
        $obj->request->is_completed = $result->is_completed;
        $obj->request->payment_opt = $result->payment_opt;
        $obj->request->type = $result->type;
        $obj->request->pick_latitude = $result->pick_latitude;
        $obj->request->pick_longitude = $result->pick_longitude;
        $obj->request->drop_latitude = $result->drop_latitude;
        $obj->request->drop_longitude = $result->drop_longitude;
        $obj->request->pick_location = $result->pick_location;
        $obj->request->drop_location = $result->drop_location;
        $obj->user = new \stdClass();
        $obj->user->id = $result->user_id;
        $obj->user->firstname=$result->firstname;
        $obj->user->lastname=$result->lastname;
        $obj->user->email=$result->email;
        $obj->user->phone_number =$result->phone_number;
        $obj->user->profile_pic = $result->profile_pic;
        $obj->user->review = $result->review?:'0';

            return $obj;
        }
}