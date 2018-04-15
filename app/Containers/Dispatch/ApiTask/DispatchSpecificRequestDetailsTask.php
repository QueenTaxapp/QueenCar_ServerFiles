<?php

namespace App\Containers\Dispatch\ApiTask;

use App\Containers\Request\Models\RequestModel;
use App\Containers\Zone\Models\ZoneModel;
use Illuminate\Support\Facades\DB;
use App\Containers\Common\RequestOutputFormat;
use App\Containers\Dispatch\ApiTask\DispatchSpecificAdminRequestList;
use App\Ship\Exceptions\CommonException;

/**
 * Class DispatchSpecificRequestDetailsTask
 *
 * @author Vignesh R
 */
class DispatchSpecificRequestDetailsTask
{

    public function run($data)
    {


        $requestId = $data['request']->request_id;
        $selectArray = array('request.id','request.later','request.type as current_type','zone_type.zone_id','request.trip_start_time','request.created_at','request.request_id','request.is_completed','request.is_cancelled','request.payment_opt',
            'request.request_id','request.is_paid','request.is_trip_start','request.total as trip_bill',
            'request_place.pick_latitude','request_place.pick_longitude','request_place.drop_latitude','request_place.drop_longitude','request_place.pick_location','request_place.drop_location',
            'User.firstname as user_first_name','User.lastname as user_last_name','User.id as user_id','User.phone_number as user_phone_number',
            'Drivers.firstname as driver_first_name','Drivers.lastname as driver_last_name','User.timezone',

        );


        $inputRequest =  $data['request'];

        $specificRequestDetails = $this->SpecificRequestDetails($requestId,$selectArray , $ifGet=false, $skip = null , $take = null ,$wantToSearch = false,$inputRequest);

        if( count($specificRequestDetails) == 0)
        {
            throw (new CommonException())->setValue('803',trans('localization::errors.803'));
        }

        $specificRequestDetailsArray = $specificRequestDetails->toArray();
        $specificRequestDetailsObject = (object) $specificRequestDetailsArray;

        $zoneId = $specificRequestDetails->zone_id;
        $zoneList = $this->Zone($zoneId);


        $response = new \stdClass();
        $response->success = true;


        $response->success_message = "Request_details";

        $response->key1 = 'request';
        $response->key2 = 'driver_types_available_on_zone';
        $response->value1 = $specificRequestDetailsObject;
        $response->value2 = $zoneList;


        $data['response'] = $response;

        return $data;

    }


    public function SpecificRequestDetails($request_id,$selectArray = '*',$ifGet=true,$skip = null,$take = null,$wantToSearch = false,$inputRequest = null)
    {

        $specificRequestDetails = RequestModel::leftJoin('User', 'User.id', '=', 'request.user_id')
                                              ->leftJoin('Drivers', 'Drivers.id', '=', 'request.driver_id')
                                              ->leftJoin('request_place', 'request_place.request_id', '=', 'request.id')
                                              ->leftJoin('zone_type', 'zone_type.id', '=', 'request.type')
                                              ->select($selectArray)
                                              ->where('request.id',$request_id)
                                              ->orderBy('request.id','desc');


        if($skip != null)
        {
            $specificRequestDetails = $specificRequestDetails->skip($skip);
        }

        if($take != null)
        {
            $specificRequestDetails = $specificRequestDetails->take($take);
        }

        if(($wantToSearch != false) && ($inputRequest != null))
        {

            $this->wantToSearch($inputRequest,$specificRequestDetails);
        }


        if($ifGet == true)
        {
            $specificRequestDetails = $specificRequestDetails->get();
        }
        else
        {
            $specificRequestDetails = $specificRequestDetails->first();
        }




        return $specificRequestDetails;

    }

    public function wantToSearch($inputRequest,$specificRequestDetails)
    {

        $obj = new DispatchSpecificAdminRequestList;

        $searchKey = 'user';
        $searchValue = $inputRequest->search_key_user;
        $obj->callGoToSearchIfSearchValueNotNull($searchKey,$searchValue,$specificRequestDetails);

        $searchKey = 'driver';
        $searchValue = $inputRequest->search_key_driver;
        $obj->callGoToSearchIfSearchValueNotNull($searchKey,$searchValue,$specificRequestDetails);

        $searchKey = 'trip_status';
        $searchValue = $inputRequest->search_key_trip_status;
        $obj->callGoToSearchIfSearchValueNotNull($searchKey,$searchValue,$specificRequestDetails);


//        $searchKey = 'payment_type';
//        $searchValue = $inputRequest->search_key_payment_type;
//        $obj->callGoToSearchIfSearchValueNotNull($searchKey,$searchValue,$specificRequestDetails);
//
//        $searchKey = 'payment_status';
//        $searchValue = $inputRequest->search_key_payment_status;

        $obj->callGoToSearchIfSearchValueNotNull($searchKey,$searchValue,$specificRequestDetails);

        $searchKey = 'between_date';
        $searchValue = array();
        $searchValue[] = $inputRequest->search_key_from_date;
        $searchValue[] = $inputRequest->search_key_to_date;
        $obj->callGoToSearchIfSearchValueNotNull($searchKey,$searchValue,$specificRequestDetails);
    }

    public function Zone($zoneId)
    {


        //$select = array('driver_type_id','driver_type_name','driver_type_icon');

        $typesList = ZoneModel::leftjoin('zone_type','zone_type.zone_id','zone.id')
            ->leftjoin('Types','Types.id','zone_type.type_id')
            ->select('zone_type.id as driver_type_id','Types.name as driver_type_name')
            ->where('zone.id',$zoneId)
            ->where('zone.is_active',1)
            ->where('zone_type.is_active',1)
            ->where('Types.deleted_at',null)
            ->get();


        if( count($typesList) == 0)
        {
            $erorCode = 735;
            throw (new CommonException())->setValue($erorCode,trans("localization::errors.$erorCode"));

        }
        return $typesList;
    }


}

