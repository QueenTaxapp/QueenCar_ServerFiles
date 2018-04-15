<?php

namespace App\Containers\Dispatch\ApiTask;

use App\Containers\Common\ApiHelper;
use App\Containers\Jobs\SendSmsJob;
use App\Containers\Request\Models\RequestPlaceModel;
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
use App\Containers\Request\ApiTask\ApiRiderLaterTask;


class DispatchRideLaterTask
{

    public function run($data, $custom_parameter)
    {

        $ifUserAlreadyPresent = UserTableModel::select('id')->where('id',$data['request']->user_id)
            ->orWhere('User.phone_number',$data['request']->phone_number)->first();



        if(count($ifUserAlreadyPresent) == 0)
        {

            $obj = new DispatchCreateUserTask;

            $userId = $obj ->run( $data['request'],null);

            $userId = $userId->id;


        }
        else
        {
            $userId = $ifUserAlreadyPresent->id;
        }




        $createRequestInputObject  = new \stdClass;
        $createRequestInputObject->id = $userId;
        $createRequestInputObject->token = $data['request']->token;
        $createRequestInputObject->platitude = $data['request']->platitude;
        $createRequestInputObject->plongitude = $data['request']->plongitude;
        $createRequestInputObject->dlatitude = $data['request']->dlatitude;
        $createRequestInputObject->dlongitude = $data['request']->dlongitude;
        $createRequestInputObject->type = $data['request']->type;
        $createRequestInputObject->paymentOpt = $data['request']->payment_opt;
        $createRequestInputObject->plocation = $data['request']->pick_location;
        $createRequestInputObject->dlocation = $data['request']->drop_location;


        $createRequestInputObject->dispatch_id = $data['request']->id;

        $createRequestInputObject->timezone = $data['request']->timezone;
        $createRequestInputObject->datetime = $data['request']->datetime;

        $createRequestInputArray =  array('request'=>$createRequestInputObject);

//        echo "<pre>";
//        print_r($createRequestInputArray);
//        die();

        //$obj = new ApiRiderLaterTask;


        //$result = $obj->run($createRequestInputArray,null);

        $result = $this->RideLaterTask($createRequestInputArray,null);



        //return $result;


        $response = new \stdClass();

        $response->success = 'true';

        $response->message = $result['response']->message;


        $data['response']= $response;


        return $data;

    }

    public function RideLaterTask($data, $custom_parameter)
    {
        $obj = new ApiHelper();
        $zone = $obj->find_zone($data['request']->platitude , $data['request']->plongitude);
        $unit = $zone->unit;

        $createrequest  =new CreateRequest();

        $request = new RequestModel();
        $request->request_id = $createrequest->generateRequestCode();
        $request->later = 1;
        $request->user_id = $data['request']->id;
        $request->trip_start_time = $data['request']->datetime;
        $request->payment_opt = $data['request']->paymentOpt;
        $request->timezone = $data['request']->timezone;
        $request->type = $data['request']->type;
        $request->if_dispatch = 1;
        $request->dispatch_reference = $data['request']->dispatch_id;
        $request->unit = $unit;

        $request->save();
        $request_place = new RequestPlaceModel();
        $request_place->pick_latitude = $data['request']->platitude;
        $request_place->pick_longitude = $data['request']->plongitude;
        $request_place->drop_latitude = $data['request']->dlatitude;
        $request_place->drop_longitude = $data['request']->dlongitude;
        $request_place->pick_location = $data['request']->plocation;
        $request_place->drop_location = $data['request']->dlocation;
        $request_place->request_id = $request->id;
        $request_place->save();
        $obj = new \stdClass();
        $obj->message="Trip_registered_successfully";
        $data['response']=$obj;
        return $data;

    }


}