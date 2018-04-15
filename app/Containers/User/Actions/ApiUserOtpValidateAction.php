<?php

namespace App\Containers\User\Actions;

use App\Containers\User\Tasks\TempTokenCheck;
use App\Ship\Parents\Actions\Action;
use App\Containers\User\Tasks\ApiOtpValueTask;
use App\Containers\User\Tasks\ApiOtpValidateTask;
use App\Containers\User\Tasks\ApiResponseTask;

/**
 * Class WebAdminLoginAction.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
 
class ApiUserOtpValidateAction extends Action
{

    /**
     * to validate user otp
     * @param object $request
     *
     * @return  array
     */
    public function run($request)
    {
        $temp = $this->call(TempTokenCheck::class, [$request,$request->phone_number]);

        $this->call(ApiOtpValidateTask::class,[$request,$temp]);

        return $temp->token;

    }
}