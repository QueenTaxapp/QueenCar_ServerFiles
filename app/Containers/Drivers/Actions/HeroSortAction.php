<?php

namespace App\Containers\Drivers\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Tasks\Task;
use App\Containers\Drivers\Tasks\HeroSortTask;
use App\Containers\Drivers\Tasks\DownloadReportTask;
use App\Ship\Parents\Requests\Request;

/**
 * Class WebAdminLoginAction.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class HeroSortAction extends Action
{

    /**
     * @param \App\Ship\Parents\Requests\Request $request
     *
     * @return  mixed
     * @throws \App\Containers\Authorization\Exceptions\UserNotAdminException
     */
    public function run($request)
    {

        $user = $this->call(HeroSortTask::class,[$request]);

        $user = $this->call(DownloadReportTask::class,[$request,$user]);

        return $user;

    }
}