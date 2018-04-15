<?php

namespace App\Containers\User\Actions;


use App\Containers\Admin\Tasks\SessionKeyTask;
use App\Containers\User\Models\TempOtp;
use App\Ship\Parents\Actions\Action;


/**
 * Class WebAdminLoginAction.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
 
class TempTokenAction extends Action
{

    /**
     * to validate user 
     * @param \App\Ship\Parents\Requests\Request $request
     *
     * @return  String
     */
    public function run($request)
    {

        $token=$this->call(SessionKeyTask::class, [$request]);
        $temp = new TempOtp();
        $temp->token=$token;
        $temp->save();
        return $token;

    }
}