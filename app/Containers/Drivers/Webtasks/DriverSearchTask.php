<?php

namespace App\Containers\Drivers\Webtasks;

use App\Containers\Common\ApiHelper;
use App\Containers\Common\GetConfigs;
use App\Containers\Drivers\Models\DriverModel;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class DriverSearchTask extends Task
{
    /**
     * Save User Detail
     * @param Object $request
     * @param String $token
     *
     * @return  Object
     */
    public function run($request)
    {
        $page = GetConfigs::getConfigs('paginate');
        $value = $request->filter_value;
        $type = $request->filter_type;
        $request->session()->put('filter_value', $value);
        $request->session()->put('filter_type', $type);


        $select = array('id','registration_code','firstname','lastname','email','phone_number','is_approve','admin_reference');
        $query=DriverModel::select($select);


        $reterive_key =  ApiHelper::reterive_key();

        if($reterive_key != 0 ) {

            $query = $query->where('admin_reference', $reterive_key);
        }



          if ($type == 'registration_code')
          {

              $drivers = $query->where('registration_code', 'like', $value . '%');

          }
          elseif ($type == 'name')
          {

              $drivers= $query->where(DB::raw('CONCAT_WS(" ", tab_Drivers.firstname, tab_Drivers.lastname)'), 'like','%'.$value.'%');

          }
          elseif ($type == 'email')
          {

              $drivers = $query->where('email', 'like', '%' . $value . '%');

          }
          elseif ($type == 'phone')
          {
              $drivers = $query->where('phone_number', 'like', '%' . $value . '%');

          }


        if ($request->submit && $request->submit == 'Download_Report')
        {

            $drivers = $drivers->orderBy('id','desc')->get();

        }
        else
        {
            $drivers = $drivers->orderBy('id','desc')->paginate($page);
        }


        return $drivers;

    }

}
