<?php

namespace App\Containers\Drivers\ApiTask;

use App\Containers\Common\GetConfigs;
use App\Containers\Request\Models\RequestModel;

/**
 * Class DriverResponseRequestTask
 * @package App\Containers\Drivers\ApiTask
 */
class DriverHistoryListTask
{
    /**
     * @param $data
     * @param $custom_parameter
     * @return mixed
     */
    public function run($data, $custom_parameter)
    {
        //echo"<pre>";print_r($data['request']->all());die();

        $take = GetConfigs::getConfigs('paginate');

        if($data['request']->has('page')){

            $skip=(($data['request']->page-1) * $take);

        }else{
            $skip=0;
        }


        $history  = RequestModel::leftjoin('request_place','request_place.request_id','=','request.id')
            ->leftjoin('User','request.user_id','=','User.id')
            ->leftjoin('Drivers','request.driver_id','=','Drivers.id')
            ->leftjoin('zone_type','zone_type.id','=','request.type')
            ->leftjoin('Types','Types.id','=','Drivers.type')
            ->where('request.driver_id',$data['request']->id)
           // ->whereRaw('(('.env("DB_PREFIX").'request.later = 1) OR ('.env("DB_PREFIX").'request.later = 0 AND ('.env("DB_PREFIX").'request.is_cancelled = 0 or '.env("DB_PREFIX").'request.is_completed = 0)))')
            ->where(function ($history) {
                $history->where('request.is_cancelled', 1)
                    ->orWhere('request.is_completed', 1);
            })
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
                'request.request_id as req_cus_id',
                'request.user_id as user_id',
                'request.trip_start_time as trip_start_time',
                'request.is_completed',
                'request.is_cancelled',
                'request.total',

                'zone_type.currency',

                'Drivers.id as driver_id',
                'Drivers.car_model',
                'Drivers.car_number',
                'Drivers.type as driver_type',
                'User.profile_pic',
                'Types.icon',
                'Types.name'

            )->skip($skip)->take($take)->orderBy('request.id','desc')->get();

        //echo"<pre>";print_r($history);die();

        $result=[];

        if(count($history) == 0 || $history == ""){
            $message = "driver_history_not_found";
        }else{
            $message = "driver_history_lists";

            foreach($history as $value){

                $result[] = array(
                    "request_id" => $value->req_cus_id,
                    "id" => $value->request_id,
                    "user_id" => $value->user_id,
                    "pick_latitude" => $value->platitude,
                    "pick_longitude" => $value->plongitude,
                    "drop_latitude" => $value->dlatitude,
                    "drop_longitude" => $value->dlongitude,
                    "pick_location" => $value->plocation,
                    "drop_location" => $value->dlocation,
                    "trip_start_time" => $value->trip_start_time,
                    "is_completed" => $value->is_completed,
                    "is_cancelled" => $value->is_cancelled,
                    "driver_id" => $value->driver_id,
                    "car_model" => $value->car_model,
                    "car_number" => $value->car_number,
                    "driver_type" => $value->driver_type,
                    "user_profile_pic" => $value->profile_pic,
                    "type_icon" => $value->icon,
                    "type_name" => $value->name,
                    "total" => $value->total,
                    "currency" => $value->currency
                );
            }
        }





        $obj = new \stdClass();
        $obj->message = $message;
        $obj->request = $result;
        $data['response']=$obj;
        return $data;


        //echo"<pre>";print_r($data['response']);die();
    }
}