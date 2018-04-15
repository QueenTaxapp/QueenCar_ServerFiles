<?php

namespace App\Containers\Sms\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Tasks\Task;
use App\Containers\Sms\Tasks\SmsInactiveTask;
use App\Ship\Parents\Requests\Request;

/**
 * Class SmsInactiveAction
 * @package App\Containers\Sms\Actions
 */
class SmsInactiveAction extends Action
{
    /**
     * used to deactivate a sms settings
     * @param $request
     * @return mixed
     */
    public function run($request)
    {

        $user = $this->call(SmsInactiveTask::class,[$request]);

        return $user;

    }
}