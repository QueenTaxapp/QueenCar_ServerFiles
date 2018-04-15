<?php

namespace App\Containers\User\Actions;

use App\Containers\Drivers\Tasks\ApiDriverLogoutTask;
use App\Containers\User\Models\UserTableModel;
use App\Ship\Exceptions\CommonException;
use App\Ship\Parents\Actions\Action;



/**
 * Class WebAdminLoginAction.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
 
class ApiLogoutAction extends Action
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

        $this->call(ApiDriverLogoutTask::class,[$request,'App\Containers\User\Models\UserTableModel']);
        return ;
    }
}