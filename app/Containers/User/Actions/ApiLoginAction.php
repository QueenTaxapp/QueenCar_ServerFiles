<?php

namespace App\Containers\User\Actions;

use App\Ship\Exceptions\CommonException;
use App\Ship\Parents\Actions\Action;

use App\Containers\User\Tasks\ApiCheckEmailTask;
use App\Containers\User\Tasks\ApiCheckPasswordTask;
use App\Containers\Admin\Tasks\SessionKeyTask;
use App\Containers\User\Tasks\ApiSocialUniqueIdCheckTask;


/**
 * Class WebAdminLoginAction.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
 
class ApiLoginAction extends Action
{

    /**
     * to User login
     * @param \App\Ship\Parents\Requests\Request $request
     *
     * @return  array
     * @throws \App\Containers\Authorization\Exceptions\UserNotAdminException
     */
    public function run($request)
    {

        $result='';
        if($request->login_method == 'manual')
        {
            
           $result = $this->call(ApiCheckEmailTask::class,[$request->username,'App\Containers\User\Models\UserTableModel']);
            
           $this->call(ApiCheckPasswordTask::class,[$request->password,$result['password']]);

        }
        else if($request->login_method == 'facebook' || $request->login_method == 'google')
        {
            $result = $this->call(ApiSocialUniqueIdCheckTask::class,[$request->social_unique_id]);
        }


        // common tasks


        if($result->is_active != 1)
        {
            throw (new CommonException())->setValue('704',trans('localization::errors.704'));
        }

        $token = $this->call(SessionKeyTask::class);
        if($result->device_token != $request->device_token)
        {
            $deviceToken = $request->device_token;
        }
        if($result->login_by != $request->login_by)
        {
            $loginBy = $request->login_by;
        }

        $result->token_expiry=date("Y-m-d h:i:s", strtotime("+2 day"));


        $result->save();

        return $result;

    }
}