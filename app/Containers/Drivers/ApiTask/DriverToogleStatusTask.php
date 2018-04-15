<?php
/**
 * Created by PhpStorm.
 * User: server-team-1
 * Date: 11/3/17
 * Time: 7:28 PM
 */

namespace App\Containers\Drivers\ApiTask;
use App\Containers\User\Models\Fav;
use App\Ship\Exceptions\CommonException;



class DriverToogleStatusTask
{


    public function run($data, $custom_parameter)
    {
           $tableNameSpace = 'App\Containers\Drivers\Models\DriverModel';

           $request = $data['request'];
           $id = $request->id;


           $details = $tableNameSpace::select('is_active','is_approve','is_available')->where('id',$id)->first();

           if($details->is_active == 0)
           {
               $isActive = 1;
           }
           else if($details->is_active == 1)
           {
               $isActive = 0;
           }


           $isApprove   = $details->is_approve;
           $isAvailable = $details->is_available;


           $update = $tableNameSpace::where('id',$id)
               ->update(['is_active'=> $isActive]);

        $obj1 = new \stdClass();
        $obj1->is_active    = $isActive;
        $obj1->is_approve   = $isApprove;
        $obj1->is_available = $isAvailable;

           if(!$update)
           {
               throw (new CommonException())->setValue('',trans('localization::errors.721'));
           }
           else
           {
               $message = trans('localization::errors.status_updated');
               $obj = new \stdClass();
               $obj->message = $message;
               $obj->heading = 'driver';
               $obj->data    = $obj1;
               $data['response']=$obj;
               return $data;
           }

    }
}