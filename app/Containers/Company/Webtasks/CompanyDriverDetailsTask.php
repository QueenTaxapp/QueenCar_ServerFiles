<?php

namespace App\Containers\Company\Webtasks;

use App\Containers\Admin\Models\DriversModel;

use App\Ship\Parents\Exceptions\Exception;

use App\Containers\Drivers\Models\DriverDetailModel;
use App\Containers\Drivers\Models\DriverModel;

use App\Containers\Common\GetConfigs;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class CompanyDriverDetailsTask
{

    public function run($request)
    {

        $companyId = Session::get('company_id');
        $page = GetConfigs::getConfigs('paginate');
        $value = $request->filter_value;
        $type = $request->filter_type;
        $request->session()->put('filter_value', $value);
        $request->session()->put('filter_type', $type);



        $query = DriverModel::join('Driver_Details', 'Driver_Details.driver_id', '=', 'Drivers.id')
            ->select(DB::raw("CONCAT(tab_Drivers.firstname,' ',tab_Drivers.lastname) as driver_name"),'Drivers.id','Drivers.registration_code','Drivers.email','Drivers.phone_number', 'Drivers.is_approve','Driver_Details.company','Drivers.type','Drivers.account_present')
            ->where('Driver_Details.company',$companyId);





        if ($type == 'registration_code')
        {

            if ($request->submit && $request->submit == 'Download_Report')
            {

                $drivers = $query->where('registration_code',$value)->get();

            }
            else
            {

                $drivers = $query->where('registration_code', $value)->paginate($page);

            }
        }
        elseif ($type == 'name')
        {

            if ($request->submit && $request->submit == 'Download_Report')
            {

                $drivers = $query->where(DB::raw('CONCAT_WS(" ", tab_Drivers.firstname, tab_Drivers.lastname)'),'like','%'.$value.'%')->get();
            }
            else
            {
                $drivers = $query->where(DB::raw('CONCAT_WS(" ", tab_Drivers.firstname, tab_Drivers.lastname)'),'like','%'.$value.'%')->paginate($page);
            }
        }
        elseif ($type == 'email')
        {

            if ($request->submit && $request->submit == 'Download_Report')
            {

                $drivers = $query->where('email', 'like', '%' . $value . '%')->get();

            }
            else
            {

                $drivers = $query->where('email', 'like', '%' . $value . '%')->paginate($page);

            }
        }
        elseif ($type == 'phone')
        {

            if ($request->submit && $request->submit == 'Download_Report')
            {

                $drivers = $query->where('phone_number',$value)->get();

            }
            else
            {

                $drivers = $query->where('phone_number',$value)->paginate($page);
            }
        }
        else
        {
            return $query->paginate($page);
        }

        return $drivers;


    }
}


