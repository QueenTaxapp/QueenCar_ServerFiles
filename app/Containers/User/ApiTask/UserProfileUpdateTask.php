<?php

namespace App\Containers\User\ApiTask;
use App\Containers\User\Models\Fav;
use App\Ship\Exceptions\CommonException;
use App\Containers\Common\ApiHelper;
use Illuminate\Support\Facades\Hash;
use App\Containers\Sos\Models\SosModel;


class UserProfileUpdateTask
{


    public function run($data, $custom_parameter)
    {

        $tableNameSpace = 'App\Containers\User\Models\UserTableModel';

        $request = $data['request'];
        $id = $request->id;



//        $driver = $tableNameSpace::select('password','profile_pic')->where('id',$id)->first();

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


            //$sos = SosModel::select('id','name','number')->get();

            $array = array();

            
            $driver = $tableNameSpace::where('id',$id)->first();


            $message = trans('localization::errors.profile_updated_successfully');
            $obj = new \stdClass();
            $obj->message = $message;
            $obj->data = (object)array('driver'=>$driver,'sos'=>$array);
            $data['response']=$obj;

//            echo "<pre>";
//            print_r($obj);die();

            return $data;

        }

    }
}