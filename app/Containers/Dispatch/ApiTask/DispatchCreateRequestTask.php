<?php

namespace App\Containers\Dispatch\ApiTask;

use App\Containers\Common\ApiHelper;
use App\Containers\Common\GetConfigs;
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


class DispatchCreateRequestTask
{

    public function run($data, $custom_parameter)
    {



        $ifUserAlreadyPresent = UserTableModel::leftjoin('User_detail','User.id','User_detail.user_id')
            ->select('User.id','User.firstname','User.lastname','User.email','User.phone_number','User.profile_pic','User_detail.latitude','User_detail.longitude','User_detail.review')
            ->where('User.id',$data['request']->user_id)
            ->orWhere('User.phone_number',$data['request']->phone_number)
            ->first();




        if(count($ifUserAlreadyPresent) == 0)
        {


            $obj = new DispatchCreateUserTask;


            $ifUserAlreadyPresent = $obj->run($data['request']);
            $userId = $ifUserAlreadyPresent->id;

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
        $createRequestInputObject->dlocation = $data['request']->drop_location;
        $createRequestInputObject->plocation = $data['request']->pick_location;

        $createRequestInputObject->dispatchId = $data['request']->id;
        $createRequestInputObject->ifDispatch = 1;
       





        $isAutomatic = GetConfigs::getConfigs('dispatch_create_request');



        if( $isAutomatic == 1) // automatic
        {


            $createRequestInputArray =  array('request'=>$createRequestInputObject);
            $obj = new CreateRequest;


            $tempArray = array();
            $tempObject = (object) $tempArray;
            $result = $obj->run($createRequestInputArray,$tempObject);



            $temp = $result['response']->driver_response;




            $request = array ( 'id'=>$temp->request['id'],
                'request_id'=>$temp->request['request_id'],
                'time_left'=>$temp->request['time_left'],
                'pick_latitude'=>$temp->request['pick_latitude'],
                'pick_longitude'=>$temp->request['pick_longitude'],
                'drop_longitude'=>$temp->request['drop_longitude'],
                'drop_latitude'=>$temp->request['drop_latitude'],
                'drop_location'=>$temp->request['drop_location'],
                'pick_location'=>$temp->request['pick_location']);

            $user = $temp->request['user'];
            $driver = array();
            $successMessage = $temp->success_message;

        }
        else  // manual
        {


            $obj = new CreateRequest;




            $obj->checkUserAlreadyOnTrip($data['request']->user_id);

            $obj->checkUserState(array('request'=>$createRequestInputObject));

            $obj->checkExistsTrip(array('request'=>$createRequestInputObject));

            $obj->checkPaymentOption(array('request'=>$createRequestInputObject));

            $drivers = $obj->getDrivers(array('request'=>$createRequestInputObject));


            $overall = array();


            foreach ($drivers as $value)
            {

                $tempArray = array();

                $tempArray['id'] = $value->driver_id;
                $tempArray['driver_name'] = $value->firstname." ".$value->lastname;
                $tempArray['phone_number'] = $value->phone_number;

                if($value->profile_pic == Null)
                {
                    $tempArray['profile_pic'] = asset('images/driver_default.png');
                }
                else
                {
                    $tempArray['profile_pic'] = $value->profile_pic;
                }

                $overall[] = $tempArray;

            }

            $user = $ifUserAlreadyPresent;
            $driver = $overall;
            $request = array ();
            $successMessage = 'driver_list';

            $isAutomatic = 0;


        }

        // request_detail


        $request_detail  = new \stdClass;

        $request_detail->id = $data['request']->id;
        $request_detail->token = $data['request']->token;
        $request_detail->platitude = $data['request']->platitude;
        $request_detail->plongitude = $data['request']->plongitude;
        $request_detail->dlongitude =  $data['request']->dlongitude;
        $request_detail->dlatitude = $data['request']->dlatitude;
        $request_detail->payment_opt =  $data['request']->payment_opt;
        $request_detail->type = $data['request']->type;

        $request_detail->user_id =  $userId;
        $request_detail->drop_location = $data['request']->drop_location;
        $request_detail->pick_location =  $data['request']->pick_location;
        $request_detail->firstname = $ifUserAlreadyPresent->firstname;
        $request_detail->lastname = $ifUserAlreadyPresent->lastname;
        $request_detail->phone_number = $ifUserAlreadyPresent->phone_number;


        // success transformer message

        $response = new \stdClass();

        $response->success = 'true';

        $response->success_message = $successMessage;

        $response->is_automatic = $isAutomatic;

        $response->request = $request;
        $response->user = $ifUserAlreadyPresent;
        $response->driver = $driver;
        $response->request_detail = $request_detail;
        $data['response']=$response;
        return $data;

    }
}
