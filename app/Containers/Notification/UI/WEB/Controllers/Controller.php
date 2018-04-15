<?php

namespace App\Containers\Notification\UI\WEB\Controllers;

use App\Containers\Drivers\Models\DriverModel;
use App\Containers\Jobs\AndroidPushNotificationJob;
use App\Containers\Jobs\IosPushNotificationJob;
use App\Containers\User\Models\UserTableModel;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

/**
 * Class Controller
 * @package App\Containers\Admin\UI\WEB\Controllers
 */
class Controller extends WebController
{

    /**
     *
     */
    public function adminNotification(Request $request)
    {
        $title = trans('localization::lang_view.notification');

        $users = UserTableModel::select('*')->get();

        $drivers = DriverModel::select('*')->get();

        return view('notification::Notification',['users' => $users,'drivers' => $drivers,'request' => $request,'page'=>"notification_module",'title'=>$title]);
    }


    public function adminNotificationSend(Request $request)
    {
        //echo "<pre>";print_r($request->all());die();


        if($request->has('users')){
            foreach($request->users as $user){

                $users[] = UserTableModel::select('id','device_token','login_by')->where('id',$user)->first();
            }

            $user_id_array =[];

            foreach($users as $key=>$value){

                $user_id_array[] = $value->id;
                //Push Notification
                $user_device_token=$value->device_token;

                $title = 'general notification';

                $message = $request->message;

                $user_device_type=$value->login_by;

                if($user_device_type=="android"){
                    dispatch(new AndroidPushNotificationJob($user_device_token,$message,$title));
                }
                elseif($user_device_type=="ios"){
                    dispatch(new IosPushNotificationJob($user_device_token,$message,$title,'user'));
                }

            }

        }


        if($request->has('drivers')){

            foreach($request->drivers as $driver){

                $drivers[] = DriverModel::select('id','device_token','login_by')->where('id',$driver)->first();
            }

            $driver_id_array =[];

            foreach($drivers as $key=>$value){

                $driver_id_array[] = $value->id;
                //Push Notification
                $driver_device_token=$value->device_token;

                $title = 'general notification';

                $message = $request->message;

                $driver_device_type=$value->login_by;

                if($driver_device_type=="android"){
                    dispatch(new AndroidPushNotificationJob($driver_device_token,$message,$title));
                }
                elseif($driver_device_type=="ios"){
                    dispatch(new IosPushNotificationJob($driver_device_token,$message,$title,'hero'));
                }

            }

        }

        $result_array = array('success'=>"TRUE",'message'=>trans('localization::errors.notification_send_successfully'));

        $request->session()->flash('success', $result_array);

        return Redirect::to("/admin/notification");

    }




}

