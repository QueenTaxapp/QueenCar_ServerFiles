<?php
namespace App\Containers\Drivers\Webtasks;

use App\Containers\Admin\Tasks\Message;
use App\Containers\Common\ApiHelper;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Containers\Admin\Models\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Ship\Exceptions\CommonException;

class DriverDetailsMapTask extends Task
{

    public function run()
    {

        $tableNameSpace ='App\Containers\Drivers\Models\DriverModel';
        $array = array('Drivers.id','admin_reference','Drivers.firstname','Drivers.lastname','Drivers.is_available','Driver_Details.latitude','Driver_Details.longitude','Drivers.phone_number','Drivers.type');

        $result = $tableNameSpace::join('Driver_Details', 'Driver_Details.driver_id', '=', 'Drivers.id')
            ->select($array)
            ->where('Drivers.is_active','1')
            ->where('Drivers.is_approve','1');


        $reterive_key = ApiHelper::reterive_key();

        if($reterive_key != 0){

            $result = $result->where('Drivers.admin_reference',$reterive_key);

        }

        $result = $result->get();

        return $result;
    }

}


