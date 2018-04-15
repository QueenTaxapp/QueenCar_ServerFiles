<?php
/**
 * Created by PhpStorm.
 * User: server-team-1
 * Date: 11/3/17
 * Time: 7:28 PM
 */

namespace App\Containers\Drivers\ApiTask;

use App\Containers\Common\GetConfigs;
use App\Containers\Drivers\Models\DriverModel;
use App\Containers\Sos\Models\SosModel;
use App\Containers\User\Models\UserTableModel;
use Illuminate\Support\Facades\DB;

/**
 * Class DriverResponseRequestTask
 * @package App\Containers\Drivers\ApiTask
 */
class DriverRequestInprogressTask
{

    private $request;

    /**
     * @param $data
     * @param $custom_parameter
     * @return mixed
     */

    public function run($data, $custom_parameter)
    {


        $response = $this->get_trip_status($data);



        $driver=DriverModel::find($data['request']->id);
        $driver_status = array('is_active'=>$driver->is_active,'is_approve'=>$driver->is_approve,'is_available'=>$driver->is_available);

        $sos_array = $this->sos($driver->admin_reference);

        $obj = new \stdClass();
        $obj->message = "driver request inprogress";
        $obj->request = $response;
        $obj->driver_status = $driver_status;
        $obj->sos = $sos_array;
        $data['response']=$obj;
        return $data;


        // echo"<pre>";print_r($data['response']);die();
    }


    public function sos($admin_key)
    {
        $sos = SosModel::select('id','name','number')->where('admin_reference',$admin_key)->get();
        $sos_array = array();
        foreach ($sos as $key=>$value)
        {
            $obj = new \stdClass; // Instantiate stdClass object
            $obj->id = $value->id;
            $obj->name = $value->name;
            $obj->number = $value->number;


            $sos_array[] = $obj;
        }
        return $sos_array;
    }

    public function get_trip_status($data)
    {


        $request=DriverModel::leftjoin('request_meta',function($join){
            $dateTime = date('Y-m-d h:i:s');
            $join->on('request_meta.driver_id', '=', 'Drivers.id')
                ->where('request_meta.is_active', '=', 1)
                ->whereRaw("TIME_TO_SEC(TIMEDIFF('".$dateTime."', ".env('DB_PREFIX')."request_meta.updated_at)) <= ".GetConfigs::getConfigs('driver_time_out'));
        })
            ->leftjoin('Driver_Details','Driver_Details.driver_id','=','Drivers.id')
            ->join('request',function($join)
            {

                $join->on('request.driver_id','=','Drivers.id');

            })
            ->leftjoin('request_place','request_place.request_id','=','request.id')
            ->leftjoin('zone_type','zone_type.id','=','request.type')
            ->leftjoin('request_bill','request_bill.request_id','=','request.id')
            ->where('Drivers.id',$data['request']->id)->where('request.driver_rated','=','0')->where('request.is_cancelled','=','0')

            ->select(
                'Drivers.id as id',
                'Drivers.is_active as is_active',
                'Drivers.is_approve as is_approve',
                'Drivers.is_available as is_available',
                'request.request_id as request_cus_id',
                'request.driver_id as request_driver_id',
                'request.id as request_id',
                'request.unit as unit',
                'request_meta.request_id as meta_request',
                'request_meta.user_id as meta_user',
                'request.user_id as user_id',
                'request.trip_start_time as trip_start_time',
                'request.is_driver_started as is_driver_started',
                'request.is_driver_arrived as is_driver_arrived',
                'request.is_trip_start as is_trip_start',
                'request.is_completed as is_completed',
                'request.is_cancelled as is_cancelled',
                'request.payment_opt as payment_opt',
                'request.is_paid as is_paid',
                'request.driver_rated as driver_rated',
                'request.type as type',
                'request.distance as distance',
                'request.time as time',
                'request.promo_id as promo_id',
                'request_place.pick_latitude as platitude',
                'request_place.pick_longitude as plongitude',
                'request_place.drop_latitude as dlatitude',
                'request_place.drop_longitude as dlongitude',
                'request_place.pick_location as plocation',
                'request_place.drop_location as dlocation',
                'request_place.drop_location as dlocation',
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
                'request_bill.service_fee',
                'request_bill.total',
                'zone_type.show_bill',
                'zone_type.currency'
            )
            ->selectRaw('IF('.env('DB_PREFIX').'request_meta.id = null,true,false) as meta_status')
            ->first();

        $this->request=$request;
        return $this->setRequestResponse($request);

    }

    public function setRequestResponse($request)
    {

        $requestResponse=[
            'trip' => false
        ];


        if(!empty($request) && $request->request_id != 0 && $request->request_id != null)
        {

            if($request->request_driver_id == 0)
            {
                return $this->setmeta($request);
            }
            else
            {
                return $this->setresponse($request);
            }

        }

        return $requestResponse;
    }

    public function setresponse($request)
    {

        $user = UserTableModel::leftjoin('User_detail','User_detail.user_id','=','User.id')->where('User.id',$request->user_id)->first();

//        echo "<pre>";
//        print_r($request->user_id);
//        die();
          $unitArray = array('mile','km');
          $unitWithLang = trans('localization::lang_view.'.$unitArray[$request->unit]);

        $requestResponse = array(
            'inprogress' => false,
            'trip' => true,
            'id' =>$request->request_id,
            'request_id' =>$request->request_cus_id,
            'trip_start_time' =>$request->trip_start_time,
            'is_driver_started' =>$request->is_driver_started,
            'is_driver_arrived' =>$request->is_driver_arrived,
            'is_trip_start' =>$request->is_trip_start,
            'is_completed' =>$request->is_completed,
            'is_cancelled' =>$request->is_cancelled,
            'payment_opt' =>$request->payment_opt,
            'is_paid' =>$request->is_paid,
            'driver_rated' =>$request->driver_rated,
            'pick_latitude' =>$request->platitude,
            'pick_longitude' =>$request->plongitude,
            'drop_latitude' =>$request->dlatitude,
            'drop_longitude' =>$request->dlongitude,
            'pick_location' =>$request->plocation,
            'drop_location' =>$request->dlocation,
            'time' =>$request->time,
            'distance' =>$request->distance,
            'bill' => array(
                "base_price"  => $request->base_price,
                "base_distance"  => $request->base_distance,
                "price_per_distance"  => $request->price_per_distance,
                "price_per_time"  => $request->price_per_time,
                "distance_price"  => $request->distance_price,
                "time_price"  => $request->time_price,
                "waiting_price"  => $request->waiting_price,
                "service_tax"  => $request->service_tax,
                "service_tax_percentage"  => $request->service_tax_percentage,
                "promo_amount"  => $request->promo_amount,
                "referral_amount"  => $request->referral_amount,
                "service_fee"  => $request->service_fee,
                "driver_amount"  => $request->driver_amount,
                "total"  => $request->total,
                "show_bill"  => $request->show_bill,
                "currency"  => $request->currency,
                "unit"      => $request->unit,
                "unit_in_words_without_lang" => $unitArray[$request->unit],
                "unit_in_words"=> $unitWithLang,
            ),
            'user'  => array(
                'id' => $user->user_id,
                'firstname' => $user->firstname,
                'lastname' => $user->lastname,
                'email' => $user->email,
                'phone_number' => $user->phone_number,
                'profile_pic' => $user->profile_pic,
                'review' => $user->review?:'0'
            )
        );

        return $requestResponse;
    }


    public function setmeta($request)
    {
        if($request->meta_status)
        {
            $user=UserTableModel::leftjoin('User_detail','User_detail.user_id','=','User.id')->where('User.id',$request->meta_user)->first();
            $requestResponse = array(
                'inprogress' => true,
                'trip' => true,
                'id' =>$request->request_id,
                'request_id' =>$request->request_cus_id,
                'pick_latitude' =>$request->platitude,
                'pick_longitude' =>$request->plongitude,
                'drop_latitude' =>$request->dlatitude,
                'drop_longitude' =>$request->dlongitude,
                'pick_location' =>$request->plocation,
                'drop_location' =>$request->dlocation,
                'time_left' =>GetConfigs::getConfigs('driver_time_out'),
                'user'  => array(
                    'id' => $user->user_id,
                    'firstname' => $user->firstname,
                    'lastname' => $user->lastname,
                    'email' => $user->email,
                    'phone_number' => $user->phone_number,
                    'profile_pic' => $user->profile_pic,
                    'review' => $user->review?:'0'
                )
            );
        }
        else{
            $requestResponse=[
                'trip' => false
            ];
        }


        return $requestResponse;

    }
}
