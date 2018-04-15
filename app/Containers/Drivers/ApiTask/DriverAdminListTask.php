<?php
namespace App\Containers\Drivers\ApiTask;

use App\Containers\Admin\Models\AdminModel;
use App\Containers\Common\Configs_Class;
use App\Containers\Jobs\AndroidPushNotificationJob;
use App\Ship\Exceptions\CommonException;
use App\Containers\Request\Models\RequestModel;
use Illuminate\Support\Facades\DB;


class DriverAdminListTask
{

    public function run($data, $custom_parameter)
    {

        $request   = $data['request'];

        $driverId = $request->id;

        $admins = AdminModel::select('id',DB::raw('CONCAT(firstname," ",lastname) as admin_name'),'area_name')->where('role',99999)->where('is_active',1)->get();

        //print_r($admins);die();
        /*if(count($request) == 0)
        {
            throw(new CommonException())->setValue("803", trans('localization::errors.803'));
        }*/
/*
        $structure = Configs_Class::helper()->php_to_node_structure($request->user_id,'user',$message,'trip_status');

        Configs_Class::helper()->php_to_node('transfer_msg',$structure);*/


            $message = 'driver admin list';
            $obj = new \stdClass();
            $obj->message = $message;
            $obj->admin = (object)$admins;
            $data['response']=$obj;
            return $data;

    }


}