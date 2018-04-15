<?php
namespace App\Containers\User\ApiTask;
use App\Containers\User\Models\Fav;
use App\Ship\Exceptions\CommonException;



class UserLogoutTask
{


    public function run($data, $custom_parameter)
    {

        $tableNameSpace = 'App\Containers\User\Models\UserTableModel';

        $request = $data['request'];
        $id = $request->id;

        $update = $tableNameSpace::where('id',$id)
            ->update(['token'=> 0,'token_expiry'=> '1900-12-12 00:00:00']);


        if(!$update)
        {
            throw (new CommonException())->setValue('',trans('localization::errors.721'));
        }
        else
        {
            $message = trans('localization::errors.logged_out_successfully');
            $obj = new \stdClass();
            $obj->message = $message;

            $data['response']=$obj;
            return $data;

        }

    }
}