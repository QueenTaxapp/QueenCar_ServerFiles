<?php

namespace App\Containers\Dispatch\ApiTask;

use App\Containers\User\Models\UserTableModel;
use App\Containers\User\Tasks\ApiCheckEmailTask;
use App\Ship\Exceptions\CommonException;

use App\Containers\Compliant\Models\UserCompliantModel;

use App\Containers\Promocode\Models\PromocodeModel;
use Carbon\Carbon;
use App\Containers\Promocode\Models\PromoCodeHistoryModel;
use App\Containers\Request\Models\RequestModel;

use App\Containers\Admin\Models\AdminModel;
use App\Containers\Admin\Tasks\DynamicApiEmailCheckTask;
use App\Containers\User\Tasks\ApiCheckPasswordTask;

/**
 * Class UserDetailTask
 * @package App\Containers\Promocode\ApiTask
 */
class DispatchLoginValidationTask
{

    /**
     * @param $data
     * @param $custom_parameter
     * @return mixed
     */
    public function run($data, $custom_parameter)
    {


        $emailAddress = $data['request']->email_address;

        $userEnteredpassword = $data['request']->password;




        // check  email address

        $tableNameSpace = 'App\Containers\Admin\Models\AdminModel';


        $emailObject = new ApiCheckEmailTask();

        $emailCheckObject = new DynamicApiEmailCheckTask();

        $erorCode = '730';


        $select = array( 'id' , 'firstname' , 'lastname' ,'registration_code' , 'email' ,'password' , 'phone_number' , 'emergency_number'  , 'is_active' , 'role' , 'profile_pic');


        $emailCheckResult  = $emailCheckObject->run($emailAddress,$tableNameSpace,$select,$erorCode);


        // check role



        if($emailCheckResult->role != 100000)
        {
            throw (new CommonException())->setValue($erorCode,trans("localization::errors.$erorCode"));
        }

        // check password
        $passwordObject = new ApiCheckPasswordTask();


        $databasePassword = $emailCheckResult->password;


        $passwordObject->run($userEnteredpassword,$databasePassword,$erorCode);


        // success transformer message

        $response = new \stdClass();

        $response->success = 'true';

        $response->success_message = "dispatcher_logged_in_successfully";

        $response->key = 'dispatcher';



        $dispatcher = new \stdClass();


        $token  = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 15);
        $token  = $token . substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 15);



        $tableNameSpace::where('id', '=',$emailCheckResult->id )
            ->update(array('remember_token' =>$token ));

        $select = array( 'id' , 'firstname' , 'lastname' ,'registration_code' , 'email'  , 'phone_number' , 'emergency_number'  , 'is_active' , 'role' , 'profile_pic');



        foreach ($select as $value)
        {
            $dispatcher->$value = $emailCheckResult->$value;
        }
        $dispatcher->token = $token;



        $response->dispatcher =  $dispatcher;



        $data['response']= $response;


        return $data;

    }
}