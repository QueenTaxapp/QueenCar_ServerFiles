<?php

namespace App\Containers\Drivers\Tasks;

use App\Containers\Admin\Tasks\Message;
use App\Containers\Admin\Tasks\SessionKeyTask;
use App\Containers\Drivers\Models\DriverDetailModel;
use App\Containers\Drivers\Models\DriverModel;
use App\Containers\User\Tasks\ApiInsertUserImageTask;
use App\Ship\Exceptions\CommonException;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;
use App\Containers\Drivers\Models\HeroModel;
use App\Containers\Drivers\Models\HeroDetailsModel;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Twilio\Rest\Client;
use App\Containers\User911\Tasks\ApiSendOptTask;
/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class ApiDriverSignUpTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {
        $driver = new DriverModel();

        $firstName = $request->firstname;
        $lastName = $request->lastname;
        $email = $request->email;
        $phone = $request->phone;
        $password = $request->password?Hash::make($request->password):null;
        $login_method = $request->login_method;
        $login_by = $request->login_by;
        $device_token = $request->device_token;
        $type =  $request->type;


        $driver->firstname = $firstName;
        $driver->lastname = $lastName;
        $driver->email = $email;
        $driver->phone_number =$phone;
        $driver->password = $password;
        $driver->login_method = $login_method;
        $driver->login_by = $login_by;
        $driver->device_token = $device_token;
        $driver->social_unique_id = $request->social_unique_id;
        $driver->car_model = $request->car_model;
        $driver->car_number = $request->car_number;
        $picture="";
        if($request->hasFile('profile_pic'))    {

            $picture = (new ApiInsertUserImageTask())->run($request,'profile_pic');
        }
        $driver->profile_pic = $picture;


        $driver->token = (new SessionKeyTask())->run();
        $driver->token_expiry = date("Y-m-d h:i:s", strtotime("+2 day"));
        $driver->is_active = 0;
        $driver->is_approve = 0;
        $driver->is_available = 1;
        $driver->type = $type;

        $driver->save();


        $company = ($request->has('company')?  0 : $request->company);


        $driver_detail = new DriverDetailModel();
        $driver_detail->driver_id=$driver->id;
        $driver_detail->latitude=0.00;
        $driver_detail->longitude=0.00;
        $driver_detail->company = $company;
        $driver_detail->bearing = 0.00;
        $driver_detail->save();




        return $driver;
    }

}