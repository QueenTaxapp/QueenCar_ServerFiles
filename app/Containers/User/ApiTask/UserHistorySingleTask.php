<?php

namespace App\Containers\User\ApiTask;

use App\Containers\Common\GetConfigs;
use App\Containers\Request\Models\RequestModel;
use App\Containers\Sos\Models\SosModel;
use App\Containers\Sos\Models\UserSosModel;
use Carbon\Carbon;

/**
 * Class DriverResponseRequestTask
 * @package App\Containers\Drivers\ApiTask
 */
class UserHistorySingleTask
{
    /**
     * @param $data
     * @param $custom_parameter
     * @return mixed
     */
    public function run($data, $custom_parameter)
    {
       // die("wrks");

        $take = GetConfigs::getConfigs('paginate');
        $time_zone = GetConfigs::getConfigs('time_zone');

        if($data['request']->has('page')){

            $skip=($data['request']->page * $take);

        }else{
            $skip=0;
        }


        $history  = RequestModel::leftjoin('request_place','request_place.request_id','=','request.id')
            //->leftjoin('request_bill','request_bill.request_id','=','request.id')
            ->leftjoin('Drivers','request.driver_id','=','Drivers.id')
            ->leftjoin('Driver_Details','request.driver_id','=','Driver_Details.driver_id')
            ->leftjoin('zone_type','zone_type.id','=','request.type')
            ->leftjoin('Types','zone_type.type_id','=','Types.id')
            ->leftjoin('request_bill','request_bill.request_id','=','request.id')

            ->where('request.id',$data['request']->request_id)
           // ->where('request.driver_id','!=',0)
            // ->where('request.is_cancelled',1)
            //->orWhere('request.is_completed',1)
            // ->where('request.driver_id','!=',0)->where('request.is_cancelled',0)
            //->where('request.is_paid',0)->where('request.user_rated',0)
            ->select(
                'request_place.pick_latitude as platitude',
                'request_place.pick_longitude as plongitude',
                'request_place.drop_latitude as dlatitude',
                'request_place.drop_longitude as dlongitude',
                'request_place.pick_location as plocation',
                'request_place.drop_location as dlocation',

                'request.id as request_id',
                'request.unit',
                'request.request_id as req_cus_id',
                'request.user_id as user_id',
                'request.trip_start_time as trip_start_time',
                'request.is_completed',
                'request.is_cancelled',
                'request.payment_opt',
                'request.later',

                'zone_type.currency',
                'zone_type.show_bill',

                'request.distance',
                'request.time',

                'Drivers.id as driver_id',
                'Drivers.firstname as dfname',
                'Drivers.lastname as dlname',
                'Drivers.car_model',
                'Drivers.car_number',
                'Drivers.type as driver_type',
                'Drivers.profile_pic',
                'Drivers.email',
                'Drivers.phone_number',

                'Driver_Details.review',

                'Types.icon',
                'Types.name',

                'request_bill.base_price',
                'request_bill.base_distance',
                'request_bill.price_per_distance',
                'request_bill.price_per_time',
                'request_bill.distance_price',
                'request_bill.time_price',
                'request_bill.waiting_price',
                'request_bill.service_tax',
                'request_bill.service_tax_percentage',
                'request_bill.promo_amount',
                'request_bill.referral_amount',
                'request_bill.wallet_amount',
                'request_bill.service_fee',
                'request_bill.driver_amount',
                'request_bill.total'


            )->first();

       // echo"<pre>";print_r($history);die();



        $result = new \stdClass();

        if(count($history) == 0 || $history == "")
        {
            $message = "user_single_history_not_found";
        }
        else
        {
            $message = "user_single_history";

            $value = $history;

            if($value->trip_start_time != "")
            {
                $dates =Carbon::createFromFormat('Y-m-d H:i:s', $value->trip_start_time)->timezone($time_zone)->toDateTimeString();
               // $dates = $value->trip_start_time;

            }
            else
            {
                $dates = "";
            }


            $unitArray = array('mile','km');
            $unitWithLang = trans('localization::lang_view.'.$unitArray[$history->unit]);

            $result = array(

                    "request_id" => $value->req_cus_id,
                    "id" => $value->request_id,
                    "later" => $value->later,
                    "user_id" => $value->user_id,
                    "pick_latitude" => $value->platitude,
                    "pick_longitude" => $value->plongitude,
                    "drop_latitude" => $value->dlatitude,
                    "drop_longitude" => $value->dlongitude,
                    "pick_location" => $value->plocation,
                    "drop_location" => $value->dlocation,
                    "trip_start_time" => $dates,
                    "is_completed" => $value->is_completed,
                    "is_cancelled" => $value->is_cancelled,
                    "payment_opt" => $value->payment_opt,
                    "driver_type" => $value->driver_type,
                    "type_icon" => $value->icon,
                    "type_name " => $value->name,
                    "distance" => $value->distance,
                    "time" => $value->time,
                    "driver" => array(
                        "id" => $value->driver_id,
                        "firstname" => $value->dfname,
                        "lastname" => $value->dlname,
                        "email" => $value->email,
                        "phone_number" => $value->phone_number,
                        "profile_pic" => $value->profile_pic,
                        "car_model" => $value->car_model,
                        "car_number" => $value->car_number,
                        "review" => $value->review?:'0',
                    ),
                    "bill" => array(
                        "base_price" => $value->base_price,
                        "base_distance" => $value->base_distance,
                        "price_per_distance" => $value->price_per_distance,
                        "price_per_time" => $value->price_per_time,
                        "distance_price" => $value->distance_price,
                        "time_price" => $value->time_price,
                        "waiting_price" => $value->waiting_price,
                        "service_tax" => $value->service_tax,
                        "service_tax_percentage" => $value->service_tax_percentage,
                        "promo_amount" => $value->promo_amount,
                        "referral_amount" => $value->referral_amount,
                        "wallet_amount" => $value->wallet_amount,
                        "service_fee" => $value->service_fee,
                        "driver_amount" => $value->driver_amount,
                        "total" => $value->total,
                        "currency" => $value->currency,
                        "show_bill" => $value->show_bill,
                        "unit"      => $value->unit,
                        "unit_in_words_without_lang" => $unitArray[$value->unit],
                        "unit_in_words"=> $unitWithLang,
                    )
                );

        }






        $obj = new \stdClass();
        $obj->message = $message;
        $obj->request = $result;
        $data['response']=$obj;
        //echo"<pre>";print_r($data['response']);die();
        return $data;


    }
}
