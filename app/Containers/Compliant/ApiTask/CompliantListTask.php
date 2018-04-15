<?php

namespace App\Containers\Compliant\ApiTask;

use App\Containers\Common\ApiHelper;
use App\Containers\Common\Configs_Class;
use App\Containers\Common\GetConfigs;
use App\Containers\Drivers\Models\DriverModel;
use App\Ship\Exceptions\CommonException;



class CompliantListTask
{

    public function run($data, $custom_parameter)
    {


        $type = $data['request']->type;

        if($type==2){

            $driver_id = $data['request']->id;

            $driverTable = DriverModel::select('admin_reference')->where('id',$driver_id)->first();

            $admin_refer = $driverTable->admin_reference;
            //print_r($driverTable);die();
        }elseif($type==1){

            $lat = $data['request']->latitude;
            $lng = $data['request']->longitude;

            $zone = Configs_Class::helper()->find_zone($lat ,$lng);

            if($zone){
                $admin_refer = $zone->admin_reference;
                //print_r($zone);die();
            }else{
                $admin_refer = null;
               //echo "null"; print_r($zone);die();

            }



        }


        if($admin_refer == null){

            $companyList = array();

        }else{

            $tableNameSpace = 'App\Containers\Compliant\Models\CompliantModel';

            $companyList = $tableNameSpace::select('id','title')->where('status',1)->where('admin_reference',$admin_refer)->where('type',$type)->get();

        }



        $message = 'complaint_list';
        $obj = new \stdClass();
        $obj->message = $message;
        $obj->admin_key = $admin_refer;
        $obj->data = $companyList;
        $obj->fieldname = 'complaint_list';

        $data['response']=$obj;

        return $data;

    }
}