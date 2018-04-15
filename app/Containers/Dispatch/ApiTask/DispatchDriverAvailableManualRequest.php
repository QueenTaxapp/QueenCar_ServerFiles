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
use App\Containers\User\ApiTask\CreateRequest;


class DispatchDriverAvailableManualRequest
{


    public function run($data, $custom_parameter)
    {
        $ifUserAlreadyPresent = UserTableModel::select('id')
            ->where('id',$data['request']->user_id)
            ->first();

        if(count($ifUserAlreadyPresent) == 0)
        {

            $obj = new DispatchCreateUserTask;
            $userId = $obj->run($data['request']);

        }
        else
        {
            $userId = $data['request']->user_id;
        }


        $createRequestInputObject  = new \stdClass;
        $createRequestInputObject->id = $userId;
        $createRequestInputObject->token = $data['request']->token;
        $createRequestInputObject->platitude = $data['request']->platitude;
        $createRequestInputObject->plongitude = $data['request']->plongitude;
        $createRequestInputObject->dlatitude = $data['request']->dlatitude;
        $createRequestInputObject->dlongitude = $data['request']->plongitude;
        $createRequestInputObject->type = $data['request']->type;
        $createRequestInputObject->paymentOpt = $data['request']->payment_opt;
        $createRequestInputObject->dlocation = $data['request']->dlongitude;
        $createRequestInputObject->plocation = $data['request']->token;

        $data =  array('request'=>$createRequestInputObject);



        $obj = new CreateRequest;

        $obj->checkUserState($data);
        $obj->checkExistsTrip($data);
        //$obj->checkPaymentOption($data);

        $drivers = $obj->getDrivers($data);


        $overall = array();


        foreach ($drivers as $value)
        {

            $tempArray = array();

            $tempArray['id'] = $value->id;
            $tempArray['firstname'] = $value->firstname;
            $tempArray['lastname'] = $value->lastname;



            $overall[] = $tempArray;

        }


        // success transformer message

        $response = new \stdClass();

        $response->success = 'true';

        $response->success_message = "available_drivers";

        $response->is_automatic = 1;

        $tempArray = $overall;



        $response->dispatcher =$tempArray;



        $data['response']= $response;


        return $data;

    }
}