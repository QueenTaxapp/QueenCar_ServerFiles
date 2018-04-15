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

/**
 * Class UserDetailTask
 * @package App\Containers\Promocode\ApiTask
 */
class DispatchDriverAvailableTask
{

    /**
     * @param $data
     * @param $custom_parameter
     * @return mixed
     */
    public function run($data, $custom_parameter)
    {




        $driverAvailable = DriverModel::join('Driver_Details','Drivers.id','Driver_Details.driver_id')
                            ->join('Types','Drivers.type','Types.id')
                            ->select('Drivers.id' , 'Drivers.firstname' ,'Drivers.lastname' , 'Drivers.type' , 'Drivers.phone_number' , 'Drivers.email', 'Driver_Details.latitude' ,'Driver_Details.longitude','Types.name as type_name')
                            ->where('Drivers.is_active',1)
                            ->where('is_approve',1)
                            ->where('is_available',1);


        if($data['request']->has('driver_type'))
        {
            $driverAvailable = $driverAvailable->where('Drivers.type',$data['request']->has('driver_type'));
        }

        $driverAvailable =  $driverAvailable->get();

        $select = array('id' ,'firstname' , 'lastname' ,'phone_number' , 'email' , 'latitude' , 'longitude' ,'type_name');

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
            $tempArray[] = $tempArray2;

        }
       // $response->driver =$tempArray;


         $response->dispatcher =$tempArray;

        $data['response']= $response;


        return $data;

    }
}