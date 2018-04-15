<?php

namespace App\Containers\Dispatch\ApiTask;

use App\Containers\User\Models\UserTableModel;
use App\Ship\Exceptions\CommonException;

use App\Containers\Compliant\Models\UserCompliantModel;

use App\Containers\Promocode\Models\PromocodeModel;
use Carbon\Carbon;
use App\Containers\Promocode\Models\PromoCodeHistoryModel;
use App\Containers\Request\Models\RequestModel;


/**
 * Class UserDetailTask
 * @package App\Containers\Promocode\ApiTask
 */
class UserDetailTask
{

    /**
     * @param $data
     * @param $custom_parameter
     * @return mixed
     */
    public function run($data, $custom_parameter)
    {
        $response = new \stdClass();

        $select = array('id' , 'firstname' , 'lastname' ,'email' );


        if($user = UserTableModel::select($select)->where('phone_number',$data['request']->phone_number)->first())
        {


            $response->success = true;
            $response->success_message = "User_detail";
            $response->user = new \stdClass();
            $response->user->id = $user->id;
            $response->user->first_name = $user->firstname;
            $response->user->last_name = $user->lastname;
            $response->user->email = $user->email;
            $response->user->phone_number = $data['request']->phone_number;

        }
        else
        {
            $response->success = false;
            $response->success_message = "User_detail_not_found";
            $response->user = null;
           // $data['change_transform']="";
        }
        $data['response']=$response;



        return $data;

    }
}