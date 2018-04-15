<?php

namespace App\Containers\Drivers\Webtasks;

use App\Containers\Drivers\Models\DriverDetailModel;
use App\Containers\Drivers\Models\DriverModel;
use App\Containers\User\Models\Country;
use App\Ship\Parents\Tasks\Task;
use App\Ship\Exceptions\CommonException;
use Illuminate\Support\Facades\Hash;

/**

 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class DriverUpdateTask extends Task
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
        $country = $request->country_code;


        $newDriver = DriverModel::where('id',$request->id)->first();
        $newDriver->admin_reference = $request->driverAdmin;

        $newDriver->firstname = $request->firstName;
        $newDriver->lastname  = $request->lastName;
        $newDriver->email  = $request->email;
        $newDriver->phone_number  = $request->phone_number;
        $newDriver->address  = $request->address;
        $newDriver->city  = $request->city;
        $newDriver->state  = $request->state;
        $newDriver->country  = $country;
        $newDriver->gender  = $request->gender;
        $newDriver->type = $request->type;
        $newDriver->car_model = $request->car_model;
        $newDriver->car_number = $request->car_number;
        $newDriver->save();

        $newDriverDetail = DriverDetailModel::where('driver_id',$request->id)->first();
        $newDriverDetail->company=$request->company;
        $newDriverDetail->save();

        if(!$newDriver->save())
        {
            throw (new CommonException())->setValue('602',trans('localization::errors.602'));
        }

        return $newDriver;
    }

}
