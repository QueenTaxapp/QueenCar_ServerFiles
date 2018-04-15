<?php


namespace App\Containers\Sos\ApiTask;
use App\Containers\Common\ApiHelper;
use App\Containers\Common\Configs_Class;
use App\Containers\Eta\Models\Zone;
use App\Containers\Sos\Models\SosModel;
use App\Containers\Sos\Models\UserSosModel;
use Illuminate\Support\Facades\DB;

/**
 * Class ApiEta
 * @package App\Containers\eta\ApiTask
 */
class UserZoneSosFindTask
{

    public function run($data, $custom_parameter)
    {

        $lat = $data['request']->latitude;
        $lng = $data['request']->longitude;


        $zone = Configs_Class::helper()->find_zone($lat,$lng);


        //echo "<pre>";print_r($query);die();

        $userSos = UserSosModel::where('user_id',$data['request']->id)->first();

        /*if(count($userSos)==0){

            $userSos = new UserSosModel();
            $userSos->user_id = $data['request']->id;
            $userSos->name = $data['request']->name;
            $userSos->phone_number = $data['request']->phone_number;
            $userSos->save();

        }else{

            $userSos->name = $data['request']->name;
            $userSos->phone_number = $data['request']->phone_number;
            $userSos->save();

        }*/

        if($userSos){
            $user_sos[] = array('name'=> $userSos->name,'number'=> $userSos->phone_number);
        }else{
            $user_sos = array();
        }


        $sos_array = array();

        if($zone){

            $sos = SosModel::where('admin_reference',$zone->admin_reference)->where('status',1)->get();

            foreach ($sos as $key=>$value)
            {
                $obj = new \stdClass; // Instantiate stdClass object
                $obj->id = $value->id;
                $obj->name = $value->name;
                $obj->number = $value->number;


                $sos_array[] = $obj;
            }

        }


        $obj = new \stdClass();
        $obj->message="user sos details";
        $obj->user_sos=$user_sos;
        $obj->sos=$sos_array;
        $data['response']=$obj;
        return $data;


    }

}