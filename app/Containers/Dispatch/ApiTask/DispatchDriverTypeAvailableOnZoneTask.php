<?php

namespace App\Containers\Dispatch\ApiTask;

use App\Containers\User\Models\UserTableModel;
use App\Containers\User\Tasks\ApiCheckEmailTask;
use App\Containers\Zone\Models\ZoneModel;
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
use DB;
use App\Containers\Zone\Models\ZoneTypeModel;

/**
 * Class UserDetailTask
 * @package App\Containers\Promocode\ApiTask
 */
class DispatchDriverTypeAvailableOnZoneTask
{

    /**
     * @param $data
     * @param $custom_parameter
     * @return mixed
     */
    public function run($data, $custom_parameter)
    {
        $latitude = $data['request']->latitude;

        $longitude =   $data['request']->longitude;

        //        $query =  "SELECT zone_type.id as zone_type_id,type.name,type.icon,zone_type.payment_type, (SELECT CONCAT_WS(',',latitude,longitude) FROM tab_Driver_Details detail WHERE detail.driver_id IN (SELECT GROUP_CONCAT(id) FROM tab_Drivers d WHERE d.type=zone_type.type_id) AND   ROUND(1 * 3956 * acos( cos( radians($latitude) ) * cos( radians(detail.latitude) ) * cos( radians(detail.longitude) - radians($longitude) ) + sin( radians($latitude) ) * sin( radians(detail.latitude) ) ) ,8) < 8 ORDER BY  ROUND(1 * 3956 * acos( cos( radians($latitude) ) * cos( radians(detail.latitude) ) * cos( radians(detail.longitude) - radians($longitude) ) + sin( radians($longitude) ) * sin( radians(detail.latitude) ) ) ,8) desc LIMIT 1) as coordinate  FROM tab_zone_type zone_type LEFT JOIN tab_Types type ON type.id=zone_type.type_id WHERE zone_type.zone_id=".$id." AND zone_type.is_active=1 LIMIT 20";

//        $query =  "SELECT a.id,a.name FROM tab_zone a,tab_zone_bound b WHERE a.id = b.zone_id AND b.north >= '".$latitude."' AND b.south <= '".$latitude."' AND b.east >= '".$longitude."' AND b.west <= '".$longitude."' AND a.is_active=1 AND a.deleted_at IS NULL LIMIT 1";

        $query =  "SELECT a.id,a.name FROM tab_zone a,tab_zone_bound b WHERE a.id = b.zone_id AND b.north >= '".$latitude."' AND b.south <= '".$latitude."' AND b.east >= '".$longitude."' AND b.west <= '".$longitude."' AND a.is_active=1 AND a.deleted_at IS NULL LIMIT 1";

        $zoneId = DB::select("$query");


        if( count($zoneId) == 0)
        {
            $erorCode = 734;
            throw (new CommonException())->setValue($erorCode,trans("localization::errors.$erorCode"));

        }

       $zoneId = $zoneId[0]->id;


//        $typesList = ZoneTypeModel::leftjoin('Types','Types.id','zone_type.type_id')
//                                ->select('Types.id as driver_type_id','Types.name as driver_type_name','Types.icon as driver_type_icon')
//                                ->where('zone_type.zone_id',$zoneId)
//                                ->get();

        $typesList = ZoneModel::leftjoin('zone_type','zone_type.zone_id','zone.id')
            ->leftjoin('Types','Types.id','zone_type.type_id')
            ->select('zone_type.id as driver_type_id','Types.name as driver_type_name')
            ->where('zone.id',$zoneId)
            ->where('zone.is_active',1)
            ->where('zone_type.is_active',1)
            ->where('Types.deleted_at',null)
            ->where('zone_type.deleted_at',null)
            ->get();

        $select = array('driver_type_id','driver_type_name','driver_type_icon');

        if( count($typesList) == 0)
        {
            $erorCode = 735;
            throw (new CommonException())->setValue($erorCode,trans("localization::errors.$erorCode"));

        }


        // success transformer message

        $response = new \stdClass();

        $response->success = 'true';

        $response->success_message = "Driver Types  available";

        $response->key = 'driver_types_available_on_zone';



        $driver = new \stdClass();


        $tempArray = array();

        foreach ($typesList as $value)
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