<?php


namespace App\Containers\Sos\ApiTask;
use App\Containers\Sos\Models\SosModel;
use App\Containers\Sos\Models\UserSosModel;

/**
 * Class ApiEta
 * @package App\Containers\eta\ApiTask
 */
class UserSosSaveTask
{

    public function run($data, $custom_parameter)
    {
        // echo "<pre>";print_r($data['request']->all());die();
        $userSos = UserSosModel::where('user_id',$data['request']->id)->first();

        if(count($userSos)==0){

            $userSos = new UserSosModel();
            $userSos->user_id = $data['request']->id;
            $userSos->name = $data['request']->name;
            $userSos->phone_number = $data['request']->phone_number;
            $userSos->save();

        }else{

            $userSos->name = $data['request']->name;
            $userSos->phone_number = $data['request']->phone_number;
            $userSos->save();

        }

        $user_sos = array('name'=>$userSos->name,'number'=>$userSos->phone_number);


       // $sos = SosModel::select('id','name','number')->get();

        $sos_array = array();

      /*  foreach ($sos as $key=>$value)
        {
            $obj = new \stdClass; // Instantiate stdClass object
            $obj->id = $value->id;
            $obj->name = $value->name;
            $obj->number = $value->number;

            $sos_array[] = $obj;
        }*/



        $obj = new \stdClass();
        $obj->message="user sos details save successfully";
        $obj->user_sos=$user_sos;
        $obj->sos=$sos_array;
        $data['response']=$obj;
        return $data;

        //echo "<pre>";print_r($userSos);die();


    }

}