<?php
namespace App\Containers\Drivers\ApiTask;
use App\Containers\Admin\Models\AdminModel;
use App\Containers\Admin\Tasks\SessionKeyTask;
use App\Containers\Common\Configs_Class;
use App\Containers\Drivers\Models\DriverDetailModel;
use App\Containers\Drivers\Models\DriverModel;
use App\Containers\Drivers\Tasks\ApiDriverDocumentTask;
use App\Containers\Types\Models\Types;
use App\Containers\User\Models\Country;
use App\Containers\Jobs\SendEmailJob;
use App\Containers\User\Tasks\ApiInsertUserImageTask;
use App\Ship\Exceptions\CommonException;
use Illuminate\Support\Facades\Hash;
use App\Containers\Sos\Models\SosModel;

class DriverSignUpTask
{


    /**
     * @param $data
     * @param $custom_parameter
     * @return mixed
     */
    public function run($data, $custom_parameter)
    {

        $request = $data['request'];

        $reg_code=date('y').rand(100000,999999);

        $countryTable = Country::where('code',$request->country)->first();

        if($countryTable)
        {
            $country = $countryTable->name;

        }else{

            throw (new CommonException())->setValue('737',trans('localization::errors.737'));
        }



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

        $typeTable = Types::where('id',$type)->first();


        $adminTable = AdminModel::where('id',$request->admin_id)->first();


        if( count ($adminTable) == 0)
        {
            throw (new CommonException())->setValue('903',trans('localization::errors.903'));
        }


        $driver->admin_reference = $adminTable->admin_key;

        $driver->firstname = $firstName;
        $driver->lastname = $lastName;
        $driver->registration_code = $reg_code;
        $driver->email = $email;
        $driver->phone_number =$phone;
        $driver->password = $password;
        $driver->country = $country;
        $driver->login_by = $login_by;
        $driver->login_method = $login_method;
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


        $company = ($request->has('company')?  $request->company : 0 );


        $driver_detail = new DriverDetailModel();
        $driver_detail->driver_id=$driver->id;
        $driver_detail->company = $company;
        $driver_detail->latitude=0.00;
        $driver_detail->longitude=0.00;

        $driver_detail->bearing = 0.00;
        $driver_detail->save();


        $object = new ApiDriverDocumentTask();


        $object->run($request,$driver);


        $sos = SosModel::select('id','name','number')->where('admin_reference',$adminTable->admin_key)->get();

        //email

        $driverValue = Configs_Class::helper()->Constant_email_data();


        $driverValue['firstName']    = $firstName;
        $driverValue['lastName']     = $lastName;
        $driverValue['emailAddress'] = $email;
        $driverValue['phoneNumber']  = $phone;

        $lang = $data['request']->header('Content-Language');

        $email = Configs_Class::helper()->email(1,$lang);



        $subject = trans('localization::lang_view.welcome_to') .$driver['appName'];
        $driverValue = (object)$driverValue;

        dispatch(new SendEmailJob($email->message,$driverValue,$request->email,$subject,$email->status));


        //email


        $array = array();
        foreach ($sos as $key=>$value)
        {
            $obj = new \stdClass; // Instantiate stdClass object
            $obj->id = $value->id;
            $obj->name = $value->name;
            $obj->number = $value->number;


            $array[] = $obj;
        }


        $message = trans('driver_added');
        $obj = new \stdClass();
        $obj->message = $message;
        $obj->data = (object)array('driver'=>$driver,'sos'=>$array,'type_detail'=>$typeTable);
        $data['response']=$obj;
        return $data;



    }
}
