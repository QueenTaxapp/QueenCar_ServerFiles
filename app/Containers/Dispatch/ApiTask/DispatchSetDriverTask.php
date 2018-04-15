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
use Illuminate\Support\Facades\Hash;


/**
 * Class DispatchSetDriverTask
 * @package App\Containers\Dispatch\ApiTask
 */
class DispatchSetDriverTask
{

    /**
     * @param $data
     */
    public function run($data)
    {

        $createRequest = new CreateRequest();
        $requestModel  = new RequestModel();
        $requestModel->request_id= $createRequest->generateRequestCode();
        $requestModel->user_id = $data['request']->user_id;
        $requestModel->driver_id = $data['request']->driver_id;
        $requestModel->trip_start_time = date('Y-m-d H:i:s');
        $requestModel->payment_opt = $data['request']->payment_opt;
        $requestModel->type = $data['request']->type;
        $requestModel->if_dispatch = 1;
        $requestModel->save();

        $request_place = new RequestPlaceModel();
        $request_place->pick_latitude = $data['request']->platitude;
        $request_place->pick_longitude = $data['request']->plongitude;
        $request_place->drop_latitude = $data['request']->dlatitude;
        $request_place->drop_longitude = $data['request']->dlongitude;
        $request_place->pick_location = $data['request']->pick_location;
        $request_place->drop_location = $data['request']->drop_location;
        $request_place->request_id = $requestModel->id;

        $response = new \stdClass();
        $response->success = true;
        $response->success_message = "driver_set_for_this_request";
         $data['response'] = $response;
        return $data;

    }
}