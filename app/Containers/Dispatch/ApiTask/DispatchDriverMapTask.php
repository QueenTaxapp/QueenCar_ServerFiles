<?php

namespace App\Containers\Dispatch\ApiTask;

use App\Containers\User\Models\UserTableModel;
use App\Containers\User\Tasks\ApiCheckEmailTask;
use App\Ship\Exceptions\CommonException;

use App\Containers\Compliant\Models\UserCompliantModel;

use App\Containers\Promocode\Models\PromocodeModel;
use Carbon\Carbon;
use App\Containers\Promocode\Models\PromoCodeHistoryModel;
use App\Containers\Request\Models\RequestModel;

use App\Containers\Admin\Models\AdminModel;
use App\Containers\Admin\Tasks\DynamicApiEmailCheckTask;
use App\Containers\User\Tasks\ApiCheckPasswordTask;
use App\Containers\Drivers\Models\DriverModel;
use Illuminate\Support\Facades\DB;


class DispatchDriverMapTask
{

    public function run($data, $custom_parameter)
    {


        $selectArray = array('Drivers.id',DB::raw('CONCAT(tab_Drivers.firstname, " ",tab_Drivers.lastname) AS driver_name'),'Types.name as type_name',

                        'Driver_Details.latitude','Driver_Details.longitude','Drivers.is_available','Types.id as type_id');

        $driverAvailable = DriverModel::join('Driver_Details','Drivers.id','Driver_Details.driver_id')
                                        ->leftjoin('Types','Drivers.type','Types.id')
                                        ->select($selectArray)
                                        ->where('Drivers.is_active',1)
                                        ->where('is_approve',1);





        if($data['request']->has('driver_type'))
        {
            $driverAvailable = $driverAvailable->where('Drivers.type',$data['request']->has('driver_type'));
        }

        $driverAvailable =  $driverAvailable->get();

        $select = array('id' ,'firstname' , 'lastname' ,'phone_number' , 'email' , 'latitude' , 'longitude' ,'type_name','is_available');


        $select = array('id' ,'driver_name' , 'type_name' ,'type_id' , 'latitude' , 'longitude' , 'is_available' );

        if( count($driverAvailable) == 0 )
        {
            $errorCode = 731;
            throw (new CommonException())->setValue($errorCode,trans("localization::errors.$errorCode"));

        }


        // success transformer message

        $response = new \stdClass();

        $response->success = 'true';


        $response->success_message = "driver available";

        $response->key = 'driver';



        $driver = new \stdClass();


        $tempArray = array();

        foreach ($driverAvailable as $value)
        {


            $tempArray2 = array();
            foreach ($select as $selectKey)
            {

                $tempArray2[$selectKey] = $value->$selectKey;

            }


            if($tempArray2['is_available'] == 0)
            {
                $tempArray2['status']= trans('localization::lang_view.on_trip');
            }
            else
            {
                $tempArray2['status']= trans('localization::lang_view.available');
            }

            $tempArray[] = $tempArray2;

        }
        // $response->driver =$tempArray;

        $response->dispatcher =$tempArray;

        $data['response']= $response;


        return $data;

    }
}