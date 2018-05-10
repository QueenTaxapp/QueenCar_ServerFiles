<?php
/**
 * Created by PhpStorm.
 * User: server-team-1
 * Date: 11/3/17
 * Time: 7:28 PM
 */

namespace App\Containers\User\ApiTask;

use Carbon\Carbon;
use App\Jobs\SendReminderSms;
use Illuminate\Support\Facades\DB;
use App\Containers\Jobs\SendSmsJob;
use App\Containers\Common\ApiHelper;
use Illuminate\Support\Facades\Lang;
use App\Containers\Common\Configs_Class;
use App\Containers\Common\GetConfigs;
use App\Containers\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Cache;
use App\Ship\Parents\Models\UserModel;
use Illuminate\Support\Facades\Schema;
use App\Containers\Wallet\Models\Wallet;
use App\Ship\Exceptions\CommonException;
use Illuminate\Database\Schema\Blueprint;
use App\Containers\Payment\Models\Payment;
use App\Containers\Drivers\Models\DriverModel;
use App\Containers\User\Models\UserTableModel;
use App\Containers\Request\Models\RequestModel;
use App\Containers\Referral\Models\ReferralModel;
use App\Containers\Request\Models\RequestMetaModel;
use App\Containers\Request\Models\RequestPlaceModel;


/**
 * Class CreateRequest
 * @package App\Containers\User\ApiTask
 */
class CreateRequest
{

    /**
     * @param $data
     * @param $custom_parameter
     */
    public function run($data, $custom_parameter)
    {

            $this->checkUserAlreadyOnTrip($data['request']->id);
            $this->checkUserState($data);
            $this->checkExistsTrip($data);
            $this->checkPaymentOption($data);
            $drivers = $this->getDrivers($data);
            $newRequestId = $this->generateRequestCode();

            $obj = new ApiHelper;
            $unit = $obj->find_zone($data['request']->platitude,$data['request']->plongitude);
            $unit = $unit->unit;

            if($unit == null)
            {
                $unit = 1;
            }

            $userdatail = UserTableModel::leftjoin('User_detail',"User_detail.user_id","=","User.id")->where('User.id',$data['request']->id)->first();

            $request = new RequestModel();
            $request->user_id = $data['request']->id;
            $request->request_id = $newRequestId;
            $request->type = $data['request']->type;
            $request->payment_opt = $data['request']->paymentOpt;
            $request->unit = $unit;


            if(isset($data['request']->ifDispatch))
            {
                $request->if_dispatch = $data['request']->ifDispatch;

                $request->dispatch_reference = $data['request']->dispatchId;
            }


            $request->save();
            $request_place = new RequestPlaceModel();
            $request_place->pick_latitude = $data['request']->platitude;
            $request_place->pick_longitude = $data['request']->plongitude;
            $request_place->drop_longitude = $data['request']->dlongitude;
            $request_place->drop_latitude = $data['request']->dlatitude;
            $request_place->drop_location = $data['request']->dlocation;
            $request_place->pick_location = $data['request']->plocation;
            $request_place->request_id = $request->id;
            $request_place->save();
            $save_driver=[];
            $notification_android=[];
            $notification_ios=[];

            $waiting_drivers=[];

            if(GetConfigs::getConfigs('assign_method') == null || GetConfigs::getConfigs('assign_method') == 1)
            {
                $i=0;
                foreach ($drivers as $driver)
                {
                    $save_driver[$i]["request_id"]=$request->id;
                    $save_driver[$i]["user_id"]=$data['request']->id;
                    $save_driver[$i]["driver_id"]=$driver->driver_id;
                    $save_driver[$i]["is_active"]=$i==0?1:0;
                    $save_driver[$i]["assign_method"]=GetConfigs::getConfigs('assign_method');
                    $save_driver[$i]["created_at"]=date('Y-m-d H:i:s');
                    $save_driver[$i]["updated_at"]=date('Y-m-d H:i:s');
                    $waiting_drivers[]=$driver->driver_id;
                    if($i == 0)
                    {
                        if($driver->login_by == "android")
                        {
                            $notification_android[]=$driver->device_token;
                        }
                        else{
                            $notification_ios[]=$driver->device_token;
                        }

                    }
                    $i++;
                }
            }
            else
            {
                $i=0;
                foreach ($drivers as $driver)
                {
                    $save_driver[$i]["request_id"]=$request->id;
                    $save_driver[$i]["user_id"]=$data['request']->id;
                    $save_driver[$i]["driver_id"]=$driver->driver_id;
                    $save_driver[$i]["is_active"]=1;
                    $save_driver[$i]["assign_method"]=GetConfigs::getConfigs('assign_method');
                    $save_driver[$i]["created_at"]=date('Y-m-d H:i:s');
                    $save_driver[$i]["updated_at"]=date('Y-m-d H:i:s');
                    $waiting_drivers[]=$driver->driver_id;

                    if($driver->login_by == "android")
                    {
                        $notification_android[]=$driver->device_token;
                    }
                    else{
                        $notification_ios[]=$driver->device_token;
                    }
                    $i++;
                }
            }
            RequestMetaModel::insert($save_driver);


           /* $time_out = GetConfigs::getConfigs("driver_time_out");
            $time_out = round(($time_out+$time_out+60)/60);
            $expiresAt = Carbon::now()->addMinutes($time_out);
            Cache::put('request_id_'.$request->id, $request->id, $expiresAt);
            $assign_method = GetConfigs::getConfigs("assign_method");
            $expiresAt = Carbon::now()->addMinutes(200);
            Cache::put('request_id_'.$request->id, array("assign" =>$assign_method,"drivers" => $waiting_drivers), $expiresAt);*/


            $response_driver = array();
            $response_driver['success']=true;
            $response_driver['success_message']="Create_Request_successfully";
            $response_driver['request']=[];
            $response_driver['request']['id']=$request->id;
            $response_driver['request']['request_id']=$request->request_id;

            $response_driver['request']['time_left']=GetConfigs::getConfigs('driver_time_out');
            $response_driver['request']["pick_latitude"]=$request_place->pick_latitude;
            $response_driver['request']["pick_longitude"]=$request_place->pick_longitude;
            $response_driver['request']["drop_longitude"]=$request_place->drop_longitude;
            $response_driver['request']["drop_latitude"]=$request_place->drop_latitude;
            $response_driver['request']["drop_location"]=$request_place->drop_location;
            $response_driver['request']["pick_location"]=$request_place->pick_location;

            $response_driver['request']['user']=[];
            $response_driver['request']['user']['id']=$userdatail->user_id;
            $response_driver['request']['user']['firstname']=$userdatail->firstname;
            $response_driver['request']['user']['lastname']=$userdatail->lastname;
            $response_driver['request']['user']['email']=$userdatail->email;
            $response_driver['request']['user']['phone_number']=$userdatail->phone_number;
            $response_driver['request']['user']['profile_pic']=$userdatail->profile_pic;
            $response_driver['request']['user']['latitude']=$userdatail->latitude;
            $response_driver['request']['user']['longitude']=$userdatail->longitude;
            $response_driver['request']['user']['review']=$userdatail->review;
            $obj = new \stdClass();
            $obj->driver_response= (object) $response_driver;


            $data['response']=$obj;
            $title = trans('localization::push_message.new_request');


            if(!empty($notification_android))
            {
                Configs_Class::helper()->send_push((object)$response_driver,$title,$notification_android,"android","driver");
            }
            else
            {
                Configs_Class::helper()->send_push((object)$response_driver,$title,$notification_ios,"ios","driver");
            }


        $userEmailNumber = Configs_Class::helper()->user_email_number($data['request']->id);

        $userEmail =   $userEmailNumber->email;
        $userPhoneNumber = $userEmailNumber->phone_number;
        $user = Configs_Class::helper()->Constant_email_data();

        //sms

        $sms = Configs_Class::helper()->sms(3);

        $smsMessage = $sms->message;

        if (strpos($smsMessage, '%requestId%') !== false)
        {
            $smsMessage =  str_replace("%requestId%",$newRequestId,$smsMessage);
        }
        if (strpos($smsMessage, '%pickupLocation%') !== false)
        {
            $smsMessage =  str_replace("%pickupLocation%",$data['request']->plocation,$smsMessage);
        }
        if (strpos($smsMessage, '%dropLocation%') !== false)
        {
            $smsMessage =  str_replace("%dropLocation%",$data['request']->dlocation,$smsMessage);
        }

        dispatch(new SendSmsJob($userPhoneNumber,$smsMessage,$sms->status));

        //email
        $user['requestId'] =  $newRequestId;
        $user['pickupLocation'] =  $data['request']->plocation;
        $user['dropLocation']  = $data['request']->dlocation;

        $lang = ApiHelper::api_user_language();

        $email = Configs_Class::helper()->email(2,$lang);

        $subject = trans('localization::lang_view.request_register_successfully');
        $user = (object)$user;


        dispatch(new SendEmailJob($email->message,$user,$userEmail,$subject,$email->status));

        return $data;
    }



    public function checkUserState($data)
    {

         if(!UserTableModel::where('id',$data['request']->id)->where('is_active',1)->first())
         {
             throw (new CommonException())->setValue('729',trans('localization::errors.729'));
         }
    }


    /**
     * @param $UserId int
     * it is used to check if the user already has request which is not either complete or cancelled
     */
    public function checkUserAlreadyOnTrip($UserId)
    {


        $noOfRequestUserInprogress = RequestModel::select('id')
                        ->where('is_completed',0)
                        ->where('is_cancelled',0)
                        ->where('user_id',$UserId)
                        ->where('driver_id','!=',0)
                        ->count();
        if($noOfRequestUserInprogress != 0)
        {
            throw (new CommonException())->setValue('902',trans('localization::errors.902'));

        }

    }

    public function generateRequestCode()
    {

        $prefix = "RES_";
        $rand = rand(9999,99999);
        return $prefix.$rand;

    }


    public function getDrivers($data)
    {
        $drivers = DB::select(DB::Raw("select DISTINCT driver.id,company.status,IF(meta.id,true,false) as meta, ROUND(1 * 3956 * acos( cos( radians('".$data['request']->platitude."') ) * cos( radians(ddetail.latitude) ) * cos( radians(ddetail.longitude) - radians('".$data['request']->plongitude."') ) + sin( radians('".$data['request']->platitude."') ) * sin( radians(ddetail.latitude) ) ) ,8) as distance from ".env('DB_PREFIX', '')."Drivers driver left join ".env('DB_PREFIX', '')."request_meta meta on meta.driver_id=driver.id and meta.is_active=1,".env('DB_PREFIX', '')."zone_type zone_type,".env('DB_PREFIX', '')."Driver_Details ddetail left join ".env('DB_PREFIX', '')."Company company on company.id=ddetail.company where driver.is_active =1 and driver.is_approve =1 and driver.is_available=1 and zone_type.id = ".$data['request']->type." and zone_type.type_id = driver.type and zone_type.zone_id = ddetail.cur_zone and driver.id = ddetail.driver_id ORDER BY distance DESC LIMIT 20"));



        return $this->checkdrivers($drivers,$data);
    }


    public function checkdrivers($drivers,$data)
    {

        $driver_id = [];
        if($drivers)
        {

           foreach($drivers as $driver)
           {
               if(($driver->status == null || $driver->status != 0) && $driver->meta == 0)
               {
                   $driver_id[]=$driver->id;
                   if(count($driver_id) == 5)
                   {
                       break;
                   }
               }
           }

           if(count($driver_id) != 0)
           {

               $drivers = DriverModel::leftjoin('Driver_Details','Driver_Details.driver_id','=','Drivers.id')->select('Drivers.*','Driver_Details.*')->selectRaw("ROUND(1 * 3956 * acos( cos( radians('".$data['request']->platitude."') ) * cos( radians(".env('DB_PREFIX')."Driver_Details.latitude) ) * cos( radians(".env('DB_PREFIX')."Driver_Details.longitude) - radians('".$data['request']->plongitude."') ) + sin( radians('".$data['request']->platitude."') ) * sin( radians(".env('DB_PREFIX')."Driver_Details.latitude) ) ) ,8) as distance")->whereIn('Drivers.id',$driver_id)->orderBy('distance','asc')->get();

               return $drivers;
           }
           else{
               goto no_driver;
           }

        }
        else{
            no_driver:
            throw (new CommonException())->setValue('725',trans('localization::errors.725'));
        }

    }

    public function checkExistsTrip($data)
    {
        $res = RequestMetaModel::where('user_id', $data['request']->id);
        $request = $res->distinct('request_id')->get();
        if ($request) {
            $request = $res->first();
            if (count($request) != 0) {

                RequestModel::where('id', $request->request_id)->update([
                    'is_cancelled' => 1,
                    'cancel_method' => 1
                ]);
                $res->delete();
            }

        }
    }




    public function checkPaymentOption($data)
    {

        switch ($data['request']->paymentOpt)
        {


            case 0:
                $this->checkcard($data);
                break;

            case 1:
                $this->checkcash($data);
                break;

            case 2:
                $this->checkwallet($data);

        }
    }

    public function checkwallet($data)
    {
        $wallet = Wallet::where('user_id',$data['request']->id)->first();

        if($wallet == null || $wallet->amount_balance < GetConfigs::getConfigs('wallet_min_amount_for_trip'))
        {

            throw (new CommonException())->setValue('723',trans('localization::errors.723'));
        }
    }

    public function checkcard($data)
    {
        $payment = Payment::where('user_id',$data['request']->id)->count();
        if($payment == 0)
        {
            throw (new CommonException())->setValue('722',trans('localization::errors.722'));
        }
    }

    public function checkcash($data)
    {
        return true;
    }
}
