<?php

namespace App\Containers\User\Actions;

use App\Containers\User\Tasks\UserSearchTask;
use App\Ship\Parents\Actions\Action;
use App\Containers\Admin\Tasks\AdminSearchTask;
use App\Containers\Admin\Tasks\DownloadReportTask;


/**
 * Class WebAdminLoginAction.
 *
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class UserSearchAction extends Action
{

    /**
     * @param \App\Ship\Parents\Requests\Request $request
     *
     * @return  mixed
     * @throws \App\Containers\Authorization\Exceptions\UserNotAdminException
     */
    public function run($request)
    {

        $user = $this->call(UserSearchTask::class,[$request]);

        $user = $this->call(DownloadReportTask::class,[$request,$user]);

        return $user;

    }
}