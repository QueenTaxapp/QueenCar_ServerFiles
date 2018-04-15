<?php

namespace App\Containers\Drivers\Webtasks;

use App\Containers\Drivers\Models\DriverDetailModel;
use App\Containers\Drivers\Models\DriverModel;
use App\Containers\User\Models\Country;
use App\Ship\Parents\Tasks\Task;
use App\Ship\Exceptions\CommonException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

/**

 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class DriverSaveTask extends Task
{
    /**
     * Save User Detail
     * @param Object $request
     * @param String $token
     *
     * @return  Object
     */
    public function run($request,$token)
    {
        $reg_code=date('y').rand(100000,999999);

        $country = $request->country_code;


        $newDriver = new  DriverModel();
        $newDriver->admin_reference = $request->driverAdmin;

        $newDriver->firstname = $request->firstName;
        $newDriver->lastname  = $request->lastName;
        $newDriver->registration_code  = $reg_code;
        $newDriver->email  = $request->email;
        $newDriver->phone_number  = $request->phone_number;
        $newDriver->address  = $request->address;
        $newDriver->city  = $request->city;
        $newDriver->state  = $request->state;
        $newDriver->country  = $country;
        $newDriver->gender  = $request->gender;
        $newDriver->login_method  = "manual";
        $newDriver->password  = Hash::make($request->password);
        $newDriver->token = $token;
        $newDriver->is_active = 0;
        $newDriver->is_approve = 0;
        $newDriver->is_available = 1;
        $newDriver->type = $request->type;
        $newDriver->token_expiry = date("Y-m-d h:i:s", strtotime("+2 day"));
        $newDriver->car_model = $request->car_model;
        $newDriver->car_number = $request->car_number;
        $newDriver->save();

        $newDriverDetail = new DriverDetailModel();
        $newDriverDetail->latitude=0.0000;
        $newDriverDetail->longitude=0.0000;
        $newDriverDetail->driver_id=$newDriver->id;
        $newDriverDetail->company=$request->company;
        $newDriverDetail->save();

        if(!$newDriver->save())
        {
            throw (new CommonException())->setValue('602',trans('localization::errors.602'));
        }

        return $newDriver;
    }

}
