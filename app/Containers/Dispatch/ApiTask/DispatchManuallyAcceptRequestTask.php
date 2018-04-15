<?php

namespace App\Containers\Dispatch\ApiTask;

use App\Containers\Common\ApiHelper;
use App\Containers\Common\GetConfigs;
use App\Containers\Drivers\ApiTask\DriverResponseRequestTask;
use App\Containers\Jobs\SendSmsJob;
use App\Containers\User\Models\UserDetail;
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
use App\Containers\User\ApiTask\CreateRequest;
use App\Containers\Dispatch\ApiTask\DispatchCreateUserTask;
use App\Containers\Dispatch\ApiTask\ManuallyCreateRequestTask;


class DispatchManuallyAcceptRequestTask
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





        $isAutomatic = GetConfigs::getConfigs('dispatch_create_request');



        if( $isAutomatic == 0) // manually
        {

            $createRequestInputObject = new \stdClass;
            $createRequestInputObject->id = $userId;


            $createRequestInputObject->token = $data['request']->token;
            $createRequestInputObject->platitude = $data['request']->platitude;
            $createRequestInputObject->plongitude = $data['request']->plongitude;
            $createRequestInputObject->dlatitude = $data['request']->dlatitude;
            $createRequestInputObject->dlongitude = $data['request']->dlongitude;
            $createRequestInputObject->type = $data['request']->type;
            $createRequestInputObject->paymentOpt = $data['request']->payment_opt;
            $createRequestInputObject->dlocation = $data['request']->drop_location;
            $createRequestInputObject->plocation = $data['request']->pick_location;
            $createRequestInputObject->driver_id = $data['request']->driver_id;

            $createRequestInputObject->dispatchId = $data['request']->id;



            $createRequestInputArray = array('request' => $createRequestInputObject);


            $obj = new ManuallyCreateRequestTask;

            $result = $obj->run($createRequestInputArray, null);



            $result['response']->success_message = trans("localization::errors.driver_start_trip");




        $data['response']= $result['response'];

        return $data;

        }
        else
        {

            $erorCode = '900';

            throw (new CommonException())->setValue($erorCode,trans("localization::errors.$erorCode"));
        }


    }
}