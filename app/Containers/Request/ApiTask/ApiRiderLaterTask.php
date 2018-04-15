<?php


namespace App\Containers\Request\ApiTask;

use App\Containers\Common\ApiHelper;
use App\Containers\Common\Configs_Class;
use App\Ship\Exceptions\CommonException;
use App\Containers\Drivers\Models\DriverModel;
use App\Containers\User\ApiTask\CreateRequest;
use App\Containers\Jobs\IosPushNotificationJob;
use App\Containers\Request\Models\RequestModel;
use App\Containers\Jobs\AndroidPushNotificationJob;
use App\Containers\Request\Models\RequestPlaceModel;


class ApiRiderLaterTask
{
    public function run($data, $custom_parameter)
    {
        $createrequest  =new CreateRequest();


        $obj = new ApiHelper;
        $unit = $obj->find_zone($data['request']->platitude,$data['request']->plongitude);
        $unit = $unit->unit;



        $request = new RequestModel();
        $request->request_id = $createrequest->generateRequestCode();
        $request->later = 1;
        $request->user_id = $data['request']->id;
        $request->trip_start_time = $data['request']->datetime;
        $request->payment_opt = $data['request']->paymentOpt;
        $request->timezone = $data['request']->timezone;
        $request->type = $data['request']->type;
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
