<?php

namespace App\Containers\Company\Webtasks;

use App\Containers\Admin\Models\DriversModel;

use App\Containers\Common\GetConfigs;
use Illuminate\Support\Facades\Session;


class CompanyDriverMapTask
{

    public function run($request)
    {
        $company_id = Session::get('company_id');

        $tableNameSpace ='App\Containers\Drivers\Models\DriverModel';
        $array = array('Drivers.id','Drivers.firstname','is_available','Driver_Details.latitude','Driver_Details.longitude','Driver_Details.company','Drivers.phone_number','Drivers.type');

        $result = $tableNameSpace::join('Driver_Details', 'Driver_Details.driver_id', '=', 'Drivers.id')
            ->select($array)
            ->where('Driver_Details.company',$company_id)
            ->where('Drivers.is_active','1')
            ->where('Drivers.is_approve','1')
            ->get();

        return $result;
    }
}


