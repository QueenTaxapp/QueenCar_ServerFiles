<?php

namespace App\Containers\Dispatch\ApiTask;

use App\Containers\Common\ApiHelper;
use App\Containers\Jobs\SendSmsJob;
use App\Containers\Request\Models\RequestMetaModel;
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
use phpDocumentor\Reflection\Types\Null_;


class DispatchRequestDriverStatusTask
{

    public function run($data)
    {



        $result = RequestModel::leftjoin('Drivers','request.driver_id','Drivers.id')
                                ->select(DB::raw('CONCAT(tab_Drivers.firstname, " ",tab_Drivers.lastname) AS driver_name'),
                                         'Drivers.phone_number','Drivers.profile_pic',
                                         'request.id','request.user_id','request.driver_id','request.is_driver_started',
                                    'request.is_driver_arrived','request.is_trip_start','request.is_completed','request.is_cancelled'

                                        )
                                ->where('request.id',$data['request']->request_id)
                                ->first();


        if(count($result) == 0)
        {
            throw (new CommonException())->setValue(803,trans("localization::errors.803"));
        }





        $request =  new \stdClass();

        $request->id = $result->id;
        $request->user_id = $result->user_id;
        $request->driver_id = $result->driver_id;
        $request->is_driver_started = $result->is_driver_started;
        $request->is_driver_arrived = $result->is_driver_arrived;
        $request->is_trip_start = $result->is_trip_start;
        $request->is_completed = $result->is_completed;
        $request->is_cancelled = $result->is_cancelled;

        if($result->driver_id == 0)
        {

            $driver = new \stdClass();

            $requestMetaModel = RequestMetaModel::leftJoin('Drivers','Drivers.id','request_meta.driver_id')
                ->select(DB::raw('CONCAT(tab_Drivers.firstname, " ",tab_Drivers.lastname) AS driver_name'),
                                   'Drivers.phone_number', 'Drivers.profile_pic'
                        )
                            ->where('request_meta.is_active','1')
                            ->where('request_meta.request_id',$data['request']->request_id)
                            ->first();




            if( count($requestMetaModel) != 0)
            {
                $driver->driver_name = $requestMetaModel->driver_name;
                $driver->phone_number = $requestMetaModel->phone_number;



                if($requestMetaModel->profile_pic == Null)
                {
                    $driver->profile_pic = asset('images/driver_default.png');
                }
                else
                {
                    $driver->profile_pic = $requestMetaModel->profile_pic;
                }



            }

        }
        else
        {

            $driver =  new \stdClass();
            $driver->driver_name = $result->driver_name;
            $driver->phone_number = $result->phone_number;


            if($result->profile_pic == Null)
            {
                $driver->profile_pic = asset('images/driver_default.png');
            }
            else
            {
                $driver->profile_pic = $result->profile_pic;
            }



        }


        $response = new \stdClass();

        $response->success = 'true';

        $response->success_message = "request_status";

        $response->request = $request;
        $response->driver = $driver;



        $data['response']= $response;


        return $data;



    }
}