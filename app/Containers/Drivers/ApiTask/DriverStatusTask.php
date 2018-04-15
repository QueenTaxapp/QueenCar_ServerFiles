<?php

namespace App\Containers\Drivers\ApiTask;
use App\Containers\User\Models\Fav;
use App\Ship\Exceptions\CommonException;



class DriverStatusTask
{


    public function run($data, $custom_parameter)
    {
        $tableNameSpace = 'App\Containers\Drivers\Models\DriverModel';

        $request = $data['request'];
        $id = $request->id;


        $details = $tableNameSpace::select('is_active','is_approve','is_available')->where('id',$id)->first();

        $isActive = $details->is_active;
        $isApprove   = $details->is_approve;
        $isAvailable = $details->is_available;


        $obj1 = new \stdClass();
        $obj1->is_active    = $isActive;
        $obj1->is_approve   = $isApprove;
        $obj1->is_available = $isAvailable;


            $message = 'driver status';
            $obj = new \stdClass();
            $obj->message = $message;
            $obj->heading = 'driver_status';
            $obj->data    = $obj1;
            $data['response']=$obj;
            return $data;


    }
}