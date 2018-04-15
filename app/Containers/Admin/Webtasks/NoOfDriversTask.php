<?php

namespace App\Containers\Admin\Webtasks;

use App\Containers\Admin\Models\DriversModel;
use App\Containers\Common\ApiHelper;
use Illuminate\Support\Facades\Session;


class NoOfDriversTask
{
  
    public function run()
    {
        $driverCount = array();

        $query = DriversModel::select('id');
        $reterive_key =  ApiHelper::reterive_key();

        if($reterive_key != 0 )
        {

            $query = $query->where('admin_reference',$reterive_key);

//            if(Session::get('role') == 99999)
//            {
//
//                $query= $query->where('admin_reference',Session::get('admin_key'));
//
//            }
//            else
//            {
//
//                $query= $query->where('admin_reference',Session::get('admin_reference'));
//
//            }
        }

        $query = $query->count();
        $driverCount['value']     = $query;
        $driverCount['icon']      = 'local_taxi';
        $driverCount['subvalue']  = 'new';
        return $driverCount;
    }
}