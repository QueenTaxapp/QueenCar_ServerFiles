<?php
/**
 * Created by PhpStorm.
 * User: server-team-1
 * Date: 11/3/17
 * Time: 7:28 PM
 */

namespace App\Containers\Drivers\ApiTask;
use App\Containers\Types\Models\Types;
use App\Containers\User\Models\Fav;
use App\Ship\Exceptions\CommonException;
use App\Containers\Common\ApiHelper;
use Illuminate\Support\Facades\Hash;
use App\Containers\Sos\Models\SosModel;

class DriverProfileUpdateTask
{


    public function run($data, $custom_parameter)
    {

        $tableNameSpace = 'App\Containers\Drivers\Models\DriverModel';

        $request = $data['request'];
        $id = $request->id;



        $driver = $tableNameSpace::select('id','password','profile_pic')->where('id',$id)->first();



        $imageName = $driver->profile_pic;

        $hashedPassword  = $driver->password;

        $plainText = $request->old_password;

        $obj = new ApiHelper();
        if($request->has('old_password'))
        {

            $obj->passwordCheck($plainText,$hashedPassword,'801');

            $password = Hash::make($request->new_password);
        }
        else
        {
            $password = $hashedPassword;
        }



        if( $request->hasFile('profile_pic') )
        {
            $imageName = $obj->insertImagePath($request,'profile_pic');
        }

        $update = $tableNameSpace::where('id',$id)
                    ->update(['firstname'=> $request->firstname,'lastname'=> $request->lastname,'password'=> $password,'profile_pic'=> $imageName]);


        if(!$update)
        {

            throw (new CommonException())->setValue('',trans('localization::errors.721'));
        }
        else
        {



            $sos = SosModel::select('id','name','number')->get();

            $array = array();

          /*  foreach ($sos as $key=>$value)
            {
                $obj = new \stdClass; // Instantiate stdClass object
                $obj->id = $value->id;
                $obj->name = $value->name;
                $obj->number = $value->number;


                $array[] = $obj;
            }*/

            $driver = $tableNameSpace::select('id','firstname','lastname','email','password','phone_number','is_active','is_approve','is_available','token','profile_pic','type')->where('id',$id)->first();
            $type_detail = Types::where('id',$driver->type)->first();
            $message = trans('localization::errors.profile_updated_successfully');
            $obj = new \stdClass();
            $obj->message = $message;
            $obj->data = (object)array('driver'=>$driver,'sos'=>$array,'type_detail' => $type_detail);
            $data['response']=$obj;
            return $data;
        }

    }
}