<?php

namespace App\Containers\User\ApiTask;

use App\Containers\Request\Models\RequestModel;
use App\Containers\Sos\Models\SosModel;
use App\Containers\Sos\Models\UserSosModel;

/**
 * Class DriverResponseRequestTask
 * @package App\Containers\Drivers\ApiTask
 */
class UserRequestInprogressTask
{
    /**
     * @param $data
     * @param $custom_parameter
     * @return mixed
     */
    public function run($data, $custom_parameter)
    {

        $onTrip  = RequestModel::leftjoin('request_place','request_place.request_id','=','request.id')
            ->leftjoin('request_bill','request_bill.request_id','=','request.id')
            ->leftjoin('Drivers','request.driver_id','=','Drivers.id')
            ->leftjoin('Driver_Details','Driver_Details.driver_id','=','Drivers.id')
            ->leftjoin('zone_type','zone_type.id','=','request.type')
            ->where('request.driver_id','!=',0)->where('request.is_cancelled',0)
            ->where('request.user_rated',0)
            ->where('request.user_id',$data['request']->id)
            ->select('request_place.pick_latitude as platitude','request_place.pick_longitude as plongitude','request_place.drop_latitude as dlatitude'
                ,'request_place.drop_longitude as dlongitude','request_place.drop_location as dlocation','request.id as request_id'
                ,'request.request_id as request_user_id','request.trip_start_time as trip_start_time','request.user_rated as is_user_rated','request.is_driver_started','request.is_driver_arrived'
                ,'request.is_trip_start','request.is_completed','request.distance as request_distance','request.payment_opt','request.promo_id'
                ,'request_bill.base_price','request_bill.base_distance','request_bill.price_per_distance','request_bill.price_per_time','request_bill.distance_price'
                ,'request_bill.time_price','request_bill.waiting_price','request_bill.service_tax','request_bill.service_tax_percentage','request_bill.promo_amount','request_bill.referral_amount','request_bill.wallet_amount','request_bill.service_fee'
                ,'request_bill.total','Drivers.id as driver_id','Drivers.firstname','Drivers.lastname','Drivers.email','Drivers.phone_number','Drivers.type as driver_type'
                ,'Drivers.profile_pic','Drivers.car_model','Drivers.car_number','Driver_Details.latitude','Driver_Details.longitude','Driver_Details.bearing'
                ,'Driver_Details.review','request.time as request_time','request_place.pick_location as plocation','zone_type.show_bill','zone_type.currency'
                ,'request_place.drop_latitude as dlatitude','request.is_paid')
            ->first();

        //echo"<pre>";print_r($onTrip);die();

        $userSos = UserSosModel::where('user_id',$data['request']->id)->first();

        if(count($userSos)==0){
            $user_sos = array();
        }else{
            $user_sos[] = array('name'=>$userSos->name,'number'=>$userSos->phone_number);
        }


        //$sos = SosModel::select('id','name','number')->get();

        $sos_array = array();

        $requestResponse=array();

        if($onTrip)
        {
            $requestResponse =
                array(

                    "id" => $onTrip->request_id,
                    "request_id" => $onTrip->request_user_id,
                    "pick_latitude" => $onTrip->platitude,
                    "pick_longitude" => $onTrip->plongitude,
                    "drop_latitude" => $onTrip->dlatitude,
                    "drop_longitude" => $onTrip->dlongitude,
                    "drop_location" => $onTrip->dlocation,
                    "pick_location" => $onTrip->plocation,
                    "trip_start_time" => $onTrip->trip_start_time,
                    "is_driver_started" => $onTrip->is_driver_started,
                    "is_driver_arrived" => $onTrip->is_driver_arrived,
                    "is_trip_start" => $onTrip->is_trip_start,
                    "is_completed" => $onTrip->is_completed,
                    "is_cancelled" => $onTrip->is_cancelled?:0,
                    "is_user_rated" => $onTrip->is_user_rated,
                    "payment_opt" => $onTrip->payment_opt,
                    "is_paid" => $onTrip->is_paid,
                    "distance" => $onTrip->request_distance,
                    "time" => $onTrip->request_time,
                    "promo_id" => $onTrip->promo_id,
                    "bill" =>
                        array(
                            "base_price" => $onTrip->base_price,
                            "base_distance" => $onTrip->base_distance,
                            "price_per_distance" => $onTrip->price_per_distance,
                            "price_per_time" => $onTrip->price_per_time,
                            "distance_price" => $onTrip->distance_price,
                            "time_price" => $onTrip->time_price,
                            "waiting_price" => $onTrip->waiting_price,
                            "service_tax" => $onTrip->service_tax,
                            "promo_amount" => $onTrip->promo_amount,
                            "referral_amount" => $onTrip->referral_amount,
                            "wallet_amount" => $onTrip->wallet_amount,
                            "service_fee" => $onTrip->service_fee,
                            "service_tax_percentage" => $onTrip->service_tax_percentage,
                            "total" => $onTrip->total,
                            "show_bill" => $onTrip->show_bill,
                            "currency" => $onTrip->currency,
                        ),
                    "driver" => array(
                        "id" => $onTrip->driver_id,
                        "firstname" => $onTrip->firstname,
                        "lastname" => $onTrip->lastname,
                        "email" => $onTrip->email,
                        "phone_number" => $onTrip->phone_number,
                        "profile_pic" => $onTrip->profile_pic,
                        "car_model" => $onTrip->car_model,
                        "car_number" => $onTrip->car_number,
                        "latitude" => $onTrip->latitude,
                        "longitude" => $onTrip->longitude,
                        "bearing" => $onTrip->bearing,
                        "review" => $onTrip->review?:'0',
                    )
                );
        }




        $obj = new \stdClass();
        $obj->message = "user request inprogress";
        $obj->request = (object)$requestResponse;
        $obj->sos = $sos_array;
        $obj->user_sos = $user_sos;
        $data['response']=$obj;
        return $data;


        //echo"<pre>";print_r($data['response']);die();
    }
}