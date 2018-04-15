<?php

namespace App\Containers\Cron\UI\API\Controllers;

use App\Containers\Common\GetConfigs;
use App\Containers\Drivers\Models\DriverModel;
use App\Containers\Request\Models\RequestMetaModel;
use App\Containers\Request\Models\RequestModel;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Containers\Common\ApiHelper;
use App\Containers\Common\Configs_Class;
use Illuminate\Support\Facades\DB;


/**
 * Class Controller
 * @package App\Containers\Cron\UI\API\Controllers
 */
class Controller extends ApiController
{


    /**
     * @param Request $request
     */
    public function waiting(Request $request)
    {

       $request =  RequestMetaModel::whereRaw('TIME_TO_SEC(TIMEDIFF("'.date('Y-m-d H:i:s').'", updated_at)) > '.GetConfigs::getConfigs('driver_time_out')." AND is_active=1")->select('id','request_id','assign_method','user_id','notification')->get();


        if(!empty($request))
        {
            $id=[];
            $request_id=[];
            $user_id=[];
            $custom_user=[];
            foreach ($request as $req)
            {
                $id[]=$req->id;
                if($req->assign_method == 1)
                {
                    $request_id[]=$req->request_id;
                    $custom_user[]=$req->user_id;
                }
                else {
                    if (!in_array($req->user_id, $user_id))
                    {
                        $user_id[]=$req->user_id;
                        //elephant

                        if($req->notification == 1)
                        {
                            $structure = Configs_Class::helper()->php_to_node_structure($req->user_id,'user', trans('localization::lang_view.no_driver_respond'),'dummy');

                            // Configs_Class::helper()->php_to_node('transfer_msg',$structure);
                        }


                    }

                }
            }

            RequestMetaModel::whereIn('id',$id)->delete();

            RequestMetaModel::whereIn('request_id',$request_id)->limit(1)->update(['is_active' => 1]);

            $request=RequestMetaModel::select('user_id','request_id')->whereIn('request_id',$request_id)->get();
            $last_driver=[];
            foreach ($request as $req)
            {
                 if(in_array($req->request_id,$request_id))
                 {
                     unset($request_id[array_search($req->request_id,$request_id)]);
                     unset($custom_user[array_search($req->user_id,$custom_user)]);
                 }
            }
            foreach ($custom_user as $user)
            {
                //elephant

                if($req->notification == 1)
                {
                    $structure = Configs_Class::helper()->php_to_node_structure($user,'user', trans('localization::lang_view.no_driver_respond'),'dummy');

                    //  Configs_Class::helper()->php_to_node('transfer_msg',$structure);
                }



            }


            print_r($custom_user);die();





        }




    }


    public function set_later_ride(Request $request)
    {
        $readyTrips = RequestModel::leftjoin('request_place','request_place.request_id','=','request.id')
            ->leftjoin('later_attempt','later_attempt.request_id','=','request.id')
            ->leftjoin('User','User.id','=','request.user_id')
            ->leftjoin('User_detail','User.id','=','User_detail.user_id')
            ->where('later',1)
            ->where('driver_id','=',0)
            ->where('is_cancelled','=',0)
            ->whereRaw("DATE_FORMAT(".env('DB_PREFIX')."request.trip_start_time,'%m-%d-%Y %h:%i') BETWEEN
                DATE_FORMAT(DATE_SUB(CONVERT_TZ(NOW(),@@session.time_zone,".env('DB_PREFIX')."request.timezone), INTERVAL 30 MINUTE),'%m-%d-%Y %h:%i')
                AND  
                DATE_FORMAT(DATE_ADD(CONVERT_TZ(NOW(),@@session.time_zone,".env('DB_PREFIX')."request.timezone), INTERVAL 30 MINUTE),'%m-%d-%Y %h:%i')")
            ->select('request.id as request_id','request.request_id as request_cus_id','request_place.pick_latitude','request_place.pick_longitude'
            ,'request_place.drop_longitude','request_place.drop_latitude','request_place.drop_location','request_place.pick_location'
            ,'User.id as user_id','User.firstname','User.lastname','User.email','User.phone_number','User.profile_pic','User_detail.latitude'
            ,'User_detail.longitude','User_detail.review','request.type','later_attempt.attempt_count')
            ->get();



                foreach ($readyTrips  as $readyTrip)
                {


                        if(!$ontrip = RequestMetaModel::where('request_id',$readyTrip->request_id)->count())
                        {

                            if(!$inTrip = RequestModel::where('is_cancelled',0)->where('is_completed',0)->count())
                            {
                                //high alert for request
                                RequestModel::where('id',$readyTrip->request_id)->update(['is_cancelled' => 1]);

                                //already push for cancelled


                            }

                            $drivers = DB::select(DB::Raw("select DISTINCT driver.id,company.status,IF(meta.id,true,false) as meta, ROUND(1 * 3956 * acos( cos( radians('".$readyTrip->pick_latitude."') ) * cos( radians(ddetail.latitude) ) * cos( radians(ddetail.longitude) - radians('".$readyTrip->pick_longitude."') ) + sin( radians('".$readyTrip->pick_latitude."') ) * sin( radians(ddetail.latitude) ) ) ,8) as distance from ".env('DB_PREFIX', '')."Drivers driver left join ".env('DB_PREFIX', '')."request_meta meta on meta.driver_id=driver.id and meta.is_active=1,".env('DB_PREFIX', '')."zone_type zone_type,".env('DB_PREFIX', '')."Driver_Details ddetail left join ".env('DB_PREFIX', '')."Company company on company.id=ddetail.company where driver.is_active =1 and driver.is_approve =1 and driver.is_available=1 and zone_type.id = ".$readyTrip->type." and zone_type.type_id = driver.type and zone_type.zone_id = ddetail.cur_zone and driver.id = ddetail.driver_id  ORDER BY distance ASC LIMIT 20"));
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

                                    $drivers = DriverModel::leftjoin('Driver_Details','Driver_Details.driver_id','=','Drivers.id')->whereIn('Drivers.id',$driver_id)->get();

                                }
                                else{
                                    goto no_driver;
                                }

                            }
                            else{
                                no_driver:

                                //set attempt


                                $this->updateattempt($readyTrip->attempt_count,$readyTrip->request_id);


                            }



                            //assign trip

                            $save_driver=[];
                            $notification_android=[];
                            $notification_ios=[];
                            $waiting_drivers=[];

                            if(GetConfigs::getConfigs('assign_method') == null || GetConfigs::getConfigs('assign_method') == 1)
                            {

                                $i=0;
                                foreach ($drivers as $driver)
                                {
                                    $save_driver[$i]["request_id"]=$readyTrip->request_id;
                                    $save_driver[$i]["user_id"]=$readyTrip->user_id;
                                    $save_driver[$i]["driver_id"]=$driver->driver_id;
                                    $save_driver[$i]["is_active"]=$i==0?1:0;
                                    $save_driver[$i]["assign_method"]=GetConfigs::getConfigs('assign_method');
                                    $save_driver[$i]["notification"]=1;
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
                                    $save_driver[$i]["request_id"]=$readyTrip->request_id;
                                    $save_driver[$i]["user_id"]=$readyTrip->user_id;
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

                            $response_driver = array();
                            $response_driver['success']=true;
                            $response_driver['success_message']="Create_Request_successfully";
                            $response_driver['request']=[];
                            $response_driver['request']['id']=$readyTrip->request_id;
                            $response_driver['request']['request_id']=$readyTrip->request_cus_id;
                            $response_driver['request']['time_left']=GetConfigs::getConfigs('driver_time_out');
                            $response_driver['request']["pick_latitude"]=$readyTrip->pick_latitude;
                            $response_driver['request']["pick_longitude"]=$readyTrip->pick_longitude;
                            $response_driver['request']["drop_longitude"]=$readyTrip->drop_longitude;
                            $response_driver['request']["drop_latitude"]=$readyTrip->drop_latitude;
                            $response_driver['request']["drop_location"]=$readyTrip->drop_location;
                            $response_driver['request']["pick_location"]=$readyTrip->pick_location;
                            $response_driver['request']['user']=[];
                            $response_driver['request']['user']['id']=$readyTrip->user_id;
                            $response_driver['request']['user']['firstname']=$readyTrip->firstname;
                            $response_driver['request']['user']['lastname']=$readyTrip->lastname;
                            $response_driver['request']['user']['email']=$readyTrip->email;
                            $response_driver['request']['user']['phone_number']=$readyTrip->phone_number;
                            $response_driver['request']['user']['profile_pic']=$readyTrip->profile_pic;
                            $response_driver['request']['user']['latitude']=$readyTrip->latitude;
                            $response_driver['request']['user']['longitude']=$readyTrip->longitude;
                            $response_driver['request']['user']['review']=$readyTrip->review;
                            $obj = new \stdClass();
                            $obj->driver_response= (object) $response_driver;


                            $data['response']=$obj;
                            $title = trans('localization::push_message.new_request');


                            if(!empty($notification_android))
                            {
                                Configs_Class::helper()->send_push(json_encode($response_driver),$title,$notification_android,"android","driver");
                            }
                            else
                            {
                                Configs_Class::helper()->send_push(json_encode($response_driver),$title,$notification_ios,"android","driver");
                            }


                        }


                }
                print_r('end');die();



    }





}

