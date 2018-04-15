<?php

namespace App\Containers\Dispatch\ApiTask;

use App\Containers\Request\Models\RequestModel;
use App\Containers\Request\Models\RequestPlaceModel;
use App\Containers\User\Models\UserTableModel;
use App\Containers\User\Tasks\ApiCheckEmailTask;
use App\Ship\Exceptions\CommonException;

use App\Containers\Admin\Tasks\DynamicApiEmailCheckTask;
use App\Containers\User\Tasks\ApiCheckPasswordTask;
use App\Containers\Dispatch\ApiTask\DispatchCreateUserTask;

use App\Containers\Dispatch\ApiTask\DispatchSpecificRequestDetailsTask;


class DispatchEditRequestUpdateTask
{

    public function run($data, $custom_parameter)
    {


        $userPhoneNumber = $data['request']->user_phone_number;

        $userExist = UserTableModel::select('id')->where('phone_number',$userPhoneNumber)->first();


        if( count($userExist) == 0)
        {

            $input = (array) $data['request']->all();
            $input['phone_number'] = $input['user_phone_number'];
            $input['firstname'] = $input['user_first_name'];
            $input['lastname'] = $input['user_last_name'];


            $input = (object) $input;
            $obj = new DispatchCreateUserTask;

            $ifUserAlreadyPresent = $obj->run($input);
            $userId = $ifUserAlreadyPresent->id;
        }
        else
        {
            $userId = $userExist->id;
        }




        $requestId = $data['request']->request_id;

        $requestUpdateArray = array (
            'user_id'=>$userId,
            'trip_start_time'=> $data['request']->trip_start_time,
            'type'=>$data['request']->type,
            'is_cancelled'=>$data['request']->is_cancelled,
            'is_driver_started'=>0,
            'is_driver_arrived'=>0,
            'is_trip_start'=>0,
            'is_completed'=>0,
            'cancel_method'=>0,
            'distance'=>0,
            'time'=>0,
            'total'=>0,


               );

       RequestModel::where('id', '=',$requestId )
            ->update($requestUpdateArray);

       $requestUpdateArray = array (
           'pick_latitude'=>$data['request']->pick_latitude,
           'pick_longitude'=>$data['request']->pick_longitude,
           'drop_latitude'=>$data['request']->drop_latitude,
           'drop_longitude'=>$data['request']->drop_longitude,
           'pick_location'=>$data['request']->pick_location,
           'drop_location'=>$data['request']->drop_location,
                       );

        RequestPlaceModel::where('request_id', '=',$requestId )
            ->update($requestUpdateArray);



        $selectArray = array('request.id','request.later','zone_type.zone_id','request.trip_start_time','request.created_at','request.request_id','request.is_completed','request.is_cancelled','request.payment_opt',
            'request.request_id','request.is_paid','request.is_trip_start','request.total as trip_bill',
            'request_place.pick_latitude','request_place.pick_longitude','request_place.drop_latitude','request_place.drop_longitude','request_place.pick_location','request_place.drop_location',
            'User.firstname as user_first_name','User.lastname as user_last_name','User.id as user_id',
            'Drivers.firstname as driver_first_name','Drivers.lastname as driver_last_name',

        );

        $obj = new DispatchSpecificRequestDetailsTask;
        $specificRequestDetails = $obj->SpecificRequestDetails($requestId,$selectArray , $ifGet=false, $skip = null , $take = null ,$wantToSearch = false,$inputRequest = null);



        if( count($specificRequestDetails) == 0)
        {
            throw (new CommonException())->setValue('803',trans('localization::errors.803'));
        }

//        echo "<pre>";
//        print_r($specificRequestDetails);
//
//        die();

        $response = new \stdClass();

        $response->success = 'true';

        $response->success_message = trans('localization::errors.request_edited_successfully');

        $response->key = 'dispatcher';

        $response->dispatcher =  $specificRequestDetails;


        $data['response']= $response;


        return $data;
    }
}