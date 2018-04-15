<?php

namespace App\Containers\Dispatch\ApiTask;

use App\Containers\Admin\Models\AdminDetailsModel;
use App\Containers\Common\ApiHelper;
use App\Containers\Drivers\ApiTask\DriverResponseRequestTask;
use App\Containers\Request\Models\RequestPlaceModel;
use App\Containers\User\ApiTask\CreateRequest;
use App\Containers\User\Models\UserTableModel;
use App\Containers\User\Tasks\ApiCheckEmailTask;
use App\Containers\User\Webtasks\ApiInsertImageTask;
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
use Illuminate\Support\Facades\Hash;
use App\Containers\Common\Configs_Class;

class ManuallyCreateRequestTask
{

    public function run($data, $custom_parameter)
    {



        $ifDriverAvailable = DriverModel::select('id','device_token','login_by')
            ->where('is_active',1)
            ->where('is_approve',1)
            ->where('is_available',1)
            ->where('id',$data['request']->driver_id)
            ->first();

        if( count($ifDriverAvailable) == 0)
        {
            $erorCode = 901;
            throw (new CommonException())->setValue($erorCode,trans("localization::errors.$erorCode"));
        }





        $obj = new CreateRequest;

        $obj->checkUserState($data);
        $obj->checkExistsTrip($data);
        $obj->checkPaymentOption($data);



        $obj->checkUserAlreadyOnTrip($data['request']->id);

        $newRequestId = $obj->generateRequestCode();


        $obj = new ApiHelper;
        $unit = $obj->find_zone($data['request']->platitude,$data['request']->plongitude);
        $unit = $unit->unit;

            // request
        $request = new RequestModel();

        $request->user_id            = $data['request']->id;
        $request->request_id         = $newRequestId;
        $request->type               = $data['request']->type;
        $request->payment_opt        = $data['request']->paymentOpt;
        $request->if_dispatch        = 1;
        $request->dispatch_reference = $data['request']->dispatchId;
        $request->unit = $unit;

        $request->save();

        $currentRequestId = $request->id;



            // request place
        $request_place = new RequestPlaceModel();
        $request_place->pick_latitude = $data['request']->platitude;
        $request_place->pick_longitude = $data['request']->plongitude;
        $request_place->drop_longitude = $data['request']->dlongitude;
        $request_place->drop_latitude = $data['request']->dlatitude;
        $request_place->drop_location = $data['request']->dlocation;
        $request_place->pick_location = $data['request']->plocation;
        $request_place->request_id = $request->id;
        $request_place->save();


//        $drivers = DriverModel::select('id','status')
//            ->where('id',$data['request']->driver_id)
//            ->first();

        $driverAcceptRequestInputObject  = new \stdClass;

        $driverAcceptRequestInputObject->id     = $data['request']->driver_id;
        $driverAcceptRequestInputObject->token          = $data['request']->token;
        $driverAcceptRequestInputObject->request_id     = $currentRequestId;
        $driverAcceptRequestInputObject->is_response    = 1;

        $obj = new DriverResponseRequestTask;

        $driverAcceptRequestInputArray = array('request'=>$driverAcceptRequestInputObject);


        $requestAcceptResult = $obj->run($driverAcceptRequestInputArray,NULL);

        $data = new \stdClass;
        $data->success = true;
        $data->success_message = "dispatch_user_successfully";
        $data->dispatch = 1;
        $notification_message = json_encode($data);

        Configs_Class::helper()->send_push($notification_message,"",$ifDriverAvailable->device_token,$ifDriverAvailable->login_by,"driver");



        return $requestAcceptResult;

    }
}