<?php

namespace App\Containers\Drivers\ApiTask;
use App\Containers\Common\ApiHelper;
use App\Containers\Common\Configs_Class;
use App\Containers\Common\GetConfigs;
use App\Containers\Drivers\Models\DriverCancelModel;
use App\Containers\Drivers\Models\DriverModel;
use App\Containers\Jobs\AndroidPushNotificationJob;
use App\Containers\Jobs\SendEmailJob;
use App\Containers\Jobs\SendSmsJob;
use App\Containers\Request\Models\RequestMetaModel;
use App\Containers\Request\Models\RequestModel;
use App\Containers\User\Models\Fav;
use App\Containers\User\Models\UserTableModel;
use App\Ship\Exceptions\CommonException;
use Illuminate\Support\Facades\DB;


/**
 * Class DriverResponseRequestTask
 * @package App\Containers\Drivers\ApiTask
 */
class DriverResponseRequestTask
{

    private $request;

    /**
     * @param $data
     * @param $custom_parameter
     * @return mixed
     */
    public function run($data, $custom_parameter)
    {
        $this->GetRequestDetail($data);


        if($data['request']->is_response == 1)
        {
            $request = $data['request'];
            $this->SaveDriver($data);
            $this->deleteMeta($data);
            $this->availableUpdate($data['request']->id);
            $user=UserTableModel::leftjoin('User_detail','User_detail.user_id','=','User.id')->where('User.id',$this->request->user_id)->first();
            $driver=DriverModel::leftjoin('Driver_Details','Driver_Details.driver_id','=','Drivers.id')->where('Drivers.id',$data['request']->id)->first();


            $data['response']= $this->setResponse($user);

            $notification_message = $this->setPushResponse($driver);
            Configs_Class::helper()->send_push($notification_message,"",$user->device_token,$user->login_by,"user");

            $structure = Configs_Class::helper()->php_to_node_structure($this->request->user_id,'user',json_decode($notification_message),'trip_status');
            Configs_Class::helper()->php_to_node('transfer_msg',$structure);


            $details = Configs_Class::helper()->request_user_driver($data['request']->request_id);

            $requestId =  $details->request_id;
            $userPhoneNumber = $details->userPhoneNumber;
            $userEmailAddress =$details->userEmail;
            $userName = $details->userName;
            $driverName = $details->driverName;
            $driverPhoneNumber =$details->driverPhoneNumber;
            $driverEmailAddress =$details->driverEmail;

            //sms


                    //driver
                    $sms =Configs_Class::helper()->sms(6);
                    $message = $this->requestAcceptSms($details,$sms->message);
                    dispatch(new SendSmsJob($driverPhoneNumber,$message,$sms->status));

                //user
                    $sms =Configs_Class::helper()->sms(4);
                    $message = $this->requestAcceptSms($details,$sms->message);
                    dispatch(new SendSmsJob($userPhoneNumber,$message,$sms->status));

            //email

            $value = Configs_Class::helper()->Constant_email_data();
            $value['requestId'] = $requestId;
            $value['userName'] = $userName;
            $value['driverName'] = $driverName;
            $value['userPhoneNumber'] = $userPhoneNumber;
            $value['driverPhoneNumber'] = $driverPhoneNumber;
            $value['userEmailAddress'] = $userEmailAddress;
            $value['driverEmailAddress'] = $driverEmailAddress;

            $subject = trans('localization::lang_view.request_accepted_successfully');

            if(get_class($data['request']) != "stdClass")
            {
                $lang = $data['request']->header('Content-Language');
            }
            else{
                $lang="en";
            }

            $lang = ApiHelper::api_user_language();

                //user
                    $email =Configs_Class::helper()->email(5,$lang);
                    dispatch(new SendEmailJob($email->message,$value,$userEmailAddress,$subject,$email->status));

                //driver
                    $email =Configs_Class::helper()->email(7,$lang);
                    dispatch(new SendEmailJob($email->message,$value,$driverEmailAddress,$subject,$email->status));


        }
        else
        {

            $this->deleteSingleMeta($data);
            $this->saveCancelMessage($data);
            $this->changeToNextPerson($data);
            $obj = new \stdClass();
            $obj->message = "Rejected_Successfully";
            $data['response']=$obj;
            $data['change_transform']='reject';

        }

        return $data;
    }

    public function requestAcceptSms($details,$message)
    {
        $requestId =  $details->request_id;
        $userPhoneNumber = $details->userPhoneNumber;
        $userEmailAddress =$details->userEmail;
        $userName = $details->userName;
        $driverName = $details->driverName;
        $driverPhoneNumber =$details->driverPhoneNumber;
        $driverEmailAddress =$details->driverEmail;


        $smsMessage = $message;

        if (strpos($smsMessage, '%requestId%') !== false)
        {
            $smsMessage =  str_replace("%requestId%",$requestId,$smsMessage);
        }

        if (strpos($smsMessage, '%userName%') !== false)
        {
            $smsMessage =  str_replace("%userName%",$userName,$smsMessage);
        }

        if (strpos($smsMessage, '%userPhoneNumber%') !== false)
        {
            $smsMessage =  str_replace("%userPhoneNumber%",$userPhoneNumber,$smsMessage);
        }

        if (strpos($smsMessage, '%userEmailAddress%') !== false)
        {
            $smsMessage =  str_replace("%userEmailAddress%",$userEmailAddress,$smsMessage);
        }
        if (strpos($smsMessage, '%driverName%') !== false)
        {
            $smsMessage =  str_replace("%driverName%",$driverName,$smsMessage);
        }

        if (strpos($smsMessage, '%driverPhoneNumber%') !== false)
        {
            $smsMessage =  str_replace("%driverPhoneNumber%",$driverPhoneNumber,$smsMessage);
        }

        if (strpos($smsMessage, '%driverEmailAddress%') !== false)
        {
            $smsMessage =  str_replace("%driverEmailAddress%",$driverEmailAddress,$smsMessage);
        }

        return $smsMessage;
    }
    public function changeToNextPerson($data)
    {


        if(GetConfigs::getConfigs('assign_method') == 1)
        {

            $meta = RequestMetaModel::where('request_id',$data['request']->request_id)->first();
            if($meta)
            {
                $meta->is_active = 1;
                $meta->save();
            }
            else
            {
                RequestModel::where('id',$data['request']->request_id)
                    ->update(['is_cancelled'=>1,'cancel_method'=>3]);

                $array = array();

                $array['success'] = true;
                $array['success_message'] = "no_driver_found";
                $array['is_cancelled'] = 1;

                $message = (object)$array;

                $structure = Configs_Class::helper()->php_to_node_structure($data['request']->id,'user', $message,'cancelled_request');

                Configs_Class::helper()->php_to_node('transfer_msg',$structure);

                $user = UserTableModel::join('request','request.user_id','=','User.id')->select('User.device_token','User.login_by')
                    ->where('request.id',$data['request']->request_id)->first();

                $title = trans('localization::lang_view.no_driver_respond');

                if($user->login_by == 'android')
                {
                   // dispatch(new AndroidPushNotificationJob($user->device_token,$message,$title));
                    Configs_Class::helper()->send_push($message,$title,$user->device_token,"android","user");

                }
                else if($user->login_by == 'ios')
                {
                    // dispatch(new IosPushNotificationJob($request->device_token,$message,'hero'));
                    Configs_Class::helper()->send_push($message,$title,$user->device_token,"ios","user");

                }
            }

        }
    }

    public function saveCancelMessage($data)
    {
        $cancel = new DriverCancelModel();
        $cancel->driver_id = $data['request']->id;
        $cancel->reason = $data['request']->reason;
        $cancel->type = 1;
        $cancel->save();
    }


    public function deleteSingleMeta($data)
    {
        RequestMetaModel::where('request_id',$data['request']->request_id)->where('driver_id',$data['request']->id)->delete();
    }


    public function SaveDriver($data)
    {
        $trip=RequestModel::where('id',$data["request"]->request_id)->first();
        $trip->driver_id = $data['request']->id;
        $trip->trip_start_time = date('Y-m-d h:i:s');
        $trip->is_driver_started = 1;
        $trip->save();
        $this->request->trip_start_time= date('Y-m-d h:i:s');
        $this->request->is_driver_started= 1;

    }

    /**
     * @param $data
     */
    public function GetRequestDetail($data)
    {
        $this->request = RequestModel::leftjoin('request_meta','request_meta.request_id','=','request.id')->leftjoin('request_place','request_place.request_id','=','request.id')->where('request.driver_id','=',0)->where('request.is_cancelled','=',0)->where('request.id',$data['request']->request_id)->select('request.*','request_place.pick_latitude as pick_latitude','request_place.pick_longitude as pick_longitude','request_place.drop_latitude as drop_latitude','request_place.drop_longitude as drop_longitude','request_place.pick_location as pick_location','request_place.drop_location as drop_location')->first();


        if(!$this->request)
        {
            $this->deleteMeta($data);
            throw (new CommonException())->setValue('727',trans('localization::errors.727'));
        }
    }

    public function deleteMeta($data)
    {
        RequestMetaModel::where('request_id',$data['request']->request_id)->delete();
    }

    public function setResponse($user)
    {
        $obj = new \stdClass();
        $obj->success_message="Accepted";
        $obj->request = new \stdClass();
        $obj->request->id = $this->request->id;
        $obj->request->trip_start_time = $this->request->trip_start_time;
        $obj->request->is_driver_started = $this->request->is_driver_started;
        $obj->request->is_driver_arrived = $this->request->is_driver_arrived;
        $obj->request->is_trip_start = $this->request->is_trip_start;
        $obj->request->is_completed = $this->request->is_completed;
        $obj->request->payment_opt = $this->request->payment_opt;
        $obj->request->type = $this->request->type;
        $obj->request->pick_latitude = $this->request->pick_latitude;
        $obj->request->pick_longitude = $this->request->pick_longitude;
        $obj->request->drop_latitude = $this->request->drop_latitude;
        $obj->request->drop_longitude = $this->request->drop_longitude;
        $obj->request->pick_location = $this->request->pick_location;
        $obj->request->drop_location = $this->request->drop_location;
        $obj->user = new \stdClass();
        $obj->user->id=$user->user_id;
        $obj->user->firstname=$user->firstname;
        $obj->user->lastname=$user->lastname;
        $obj->user->email=$user->email;
        $obj->user->phone_number=$user->phone_number;
        $obj->user->profile_pic=$user->profile_pic;

        $obj->user->review=$user->review?:0;

        return $obj;
    }

    public function setPushResponse($driver)
    {
        $obj = new \stdClass();
        $obj->success_message="Accepted";
        $obj->request = new \stdClass();
        $obj->request->id = $this->request->id;
        $obj->request->trip_start_time = $this->request->trip_start_time;
        $obj->request->is_driver_started = $this->request->is_driver_started;
        $obj->request->is_driver_arrived = $this->request->is_driver_arrived;
        $obj->request->is_trip_start = $this->request->is_trip_start;
        $obj->request->is_completed = $this->request->is_completed;
        $obj->request->payment_opt = $this->request->payment_opt;
        $obj->request->type = $this->request->type;
        $obj->request->pick_latitude = $this->request->pick_latitude;
        $obj->request->pick_longitude = $this->request->pick_longitude;
        $obj->request->drop_latitude = $this->request->drop_latitude;
        $obj->request->drop_longitude = $this->request->drop_longitude;
        $obj->request->pick_location = $this->request->pick_location;
        $obj->request->drop_location = $this->request->drop_location;

        $obj->request->driver = new \stdClass();
        $obj->request->driver->id=$driver->driver_id;
        $obj->request->driver->firstname=$driver->firstname;
        $obj->request->driver->lastname=$driver->lastname;
        $obj->request->driver->email=$driver->email;
        $obj->request->driver->phone_number=$driver->phone_number;
        $obj->request->driver->profile_pic=$driver->profile_pic;
        $obj->request->driver->latitude=$driver->latitude;
        $obj->request->driver->longitude=$driver->longitude;
        $obj->request->driver->car_model=$driver->car_model;
        $obj->request->driver->car_number=$driver->car_number;
        $obj->request->driver->review=$driver->review?:0;

        return json_encode($obj);
    }

    public function availableUpdate($id)
    {
        DriverModel::where('id',$id)->update(['is_available'=>0]);

    }

}
