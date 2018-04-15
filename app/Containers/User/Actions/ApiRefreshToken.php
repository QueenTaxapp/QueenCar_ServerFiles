<?php

namespace App\Containers\User\Actions;

use App\Containers\Admin\Tasks\SessionKeyTask;
use App\Containers\User\Tasks\ApiUserCheckTask;
use App\Ship\Exceptions\CommonException;
use App\Ship\Parents\Actions\Action;


/**
 * Class ApiRefreshToken
 * @package App\Containers\User\Actions
 */
class ApiRefreshToken extends Action
{


    /**
     * @param $request
     */
    public function run($request)
    {

        $user=$this->call(ApiUserCheckTask::class,[$request]);
        $token=$this->call(SessionKeyTask::class);
        $user->token=$token;
        $user->token_expiry=date("Y-m-d h:i:s", strtotime("+2 day"));
        $user->save();
        return $user;

    }
}