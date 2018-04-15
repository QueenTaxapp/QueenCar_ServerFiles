<?php

namespace App\Containers\Drivers\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Tasks\Task;
use App\Containers\Drivers\Tasks\HeroSearchTask;
use App\Containers\Drivers\Tasks\DownloadReportTask;
use App\Ship\Parents\Requests\Request;

/**
 * Class WebAdminLoginAction.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class HeroSearchAction extends Action
{

    /**
     * @param \App\Ship\Parents\Requests\Request $request
     *
     * @return  mixed
     * @throws \App\Containers\Authorization\Exceptions\UserNotAdminException
     */
    public function run($request)
    {

        $user = $this->call(HeroSearchTask::class,[$request]);

        $user = $this->call(DownloadReportTask::class,[$request,$user]);

        return $user;

    }
}