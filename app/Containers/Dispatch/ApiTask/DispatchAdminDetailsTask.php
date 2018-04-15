<?php

namespace App\Containers\Dispatch\ApiTask;

use App\Containers\Admin\Models\AdminDetailsModel;
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



class DispatchAdminDetailsTask
{

    public function run($data, $custom_parameter)
    {


        $select = array('Admin.id','Admin.firstname','Admin.lastname'
        ,'Admin.registration_code','Admin.email','Admin.phone_number','Admin.emergency_number'
        ,'Admin.role','Admin.profile_pic','Admin_details.address','Admin_details.city'
        ,'Admin_details.country','Admin_details.postalcode','Admin_details.timezone');

        $admin = AdminModel::leftjoin('Admin_details','Admin.id','Admin_details.admin_id')
                            ->select($select)
                            ->where('Admin.id',$data['request']->id)
                            ->first();



        $select = array ('id','firstname','lastname','registration_code',
        'email','phone_number','emergency_number','role','profile_pic','address',
            'city','country','postalcode','timezone');

        $resultArray = array();
        foreach ($select as $value)
        {
            $resultArray[$value] = $admin->$value;

        }


        // success transformer message

        $response = new \stdClass();

        $response->success = 'true';

        $response->success_message = "admin_values";

        $response->key = 'admin';


        $tempArray = $resultArray;



        $response->dispatcher =$tempArray;



        $data['response']= $response;


        return $data;

    }
}