<?php
namespace App\Containers\Drivers\ApiTask;
use App\Containers\User\Models\Fav;
use App\Ship\Exceptions\CommonException;


/**
 * Class DriverLogoutTask
 * @package App\Containers\Drivers\ApiTask
 */
class DriverLogoutTask
{


    /**
     * @param $data
     * @param $custom_parameter
     * @return mixed
     */
    public function run($data, $custom_parameter)
    {

        $tableNameSpace = 'App\Containers\Drivers\Models\DriverModel';

        $request = $data['request'];
        $id = $request->id;

        $update = $tableNameSpace::find($id);

        if($update->is_available==0){
            $update->token = 0;
            $update->token_expiry = '1900-12-12 00:00:00';
        }else{
            $update->is_active = 0;
            $update->token = 0;
            $update->token_expiry = '1900-12-12 00:00:00';
        }

        $update->save();

        /* $update = $tableNameSpace::where('id',$id)
            ->update(['is_active'=>0,'token'=> 0,'token_expiry'=> '1900-12-12 00:00:00']);*/



            $message = trans('localization::errors.logged_out_successfully');
            $obj = new \stdClass();
            $obj->message = $message;

            $data['response']=$obj;
            return $data;



    }
}