<?php

namespace App\Containers\Drivers\Tasks;

use App\Containers\Admin\Tasks\Message;
use App\Containers\Admin\Tasks\SessionKeyTask;
use App\Containers\Drivers\Models\DriverModel;
use App\Containers\Types\Models\Types;
use App\Ship\Exceptions\CommonException;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;
use App\Containers\Drivers\Models\HeroModel;
use App\Containers\Drivers\Models\HeroDetailsModel;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Containers\Sos\Models\SosModel;
/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class ApiDriverManualLoginTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {


        if ($request->login_method == "manual")
        {
            $driver = DriverModel::where('email', $request->username)->orWhere('phone_number', $request->username)->first();

        }
        else {
            $driver = DriverModel::where('social_unique_id', $request->social_unique_id)->first();
        }

        if (!$driver)
        {

            throw(new CommonException())->setValue("601", trans('localization::errors.601'));

        } else {

            if ($request->login_method == "manual") {
                $hashed_password = $driver->password;
                if (!Hash::check($request->password, $hashed_password)) {
                    throw(new CommonException())->setValue("601", trans('localization::errors.601'));
                }
            }
        }

            if ($driver->device_token != $request->device_token) {
                $driver->device_token = $request->device_token;
            }

            if ($driver->login_by != $request->login_by) {
                $driver->login_by = $request->login_by;
            }
            $driver->token = (new SessionKeyTask())->run();
            $driver->token_expiry = date("Y-m-d h:i:s", strtotime("+2 day"));

            $type_detail = Types::where('id',$driver->type)->first();



            $sos = SosModel::select('id','name','number')->get();

            $array = array();
            foreach ($sos as $key=>$value)
            {
                $obj = new \stdClass; // Instantiate stdClass object
                $obj->id = $value->id;
                $obj->name = $value->name;
                $obj->number = $value->number;


                $array[] = $obj;
            }

            return array('driver'=>$driver,'sos'=>$array,'type_detail' => $type_detail);




    }

}