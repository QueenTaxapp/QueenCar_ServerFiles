<?php

namespace App\Containers\Admin\Webtasks;

use App\Containers\Admin\Models\DriversModel;
use App\Containers\Common\ApiHelper;
use App\Containers\Request\Models\RequestModel;
use Illuminate\Support\Facades\Session;


class NoOfDrivesCompletedTask
{

    public function run()
    {


        $query = DriversModel::select('id');

        $query = RequestModel::join('Drivers','request.driver_id','Drivers.id')
                                ->where('request.is_completed',1);





        $reterive_key =  ApiHelper::reterive_key();

        if($reterive_key != 0 )
        {
            $query= $query->where('Drivers.admin_reference', $reterive_key);

        }




        $query = $query->count();
        $driverCount['value']     = $query;
        $driverCount['icon']      = 'done_all';
        $driverCount['subvalue']  = 'new';
        return $driverCount;
    }
}