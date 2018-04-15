<?php

namespace App\Containers\Sms\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Tasks\Task;
use App\Containers\Sms\Tasks\SmsActiveTask;
use App\Ship\Parents\Requests\Request;

/**
 * Class SmsActiveAction
 * @package App\Containers\Sms\Actions
 */
class SmsActiveAction extends Action
{
    /**
     * used to activate a sms settings
     * @param $request
     * @return mixed
     */
    public function run($request)
    {

        $user = $this->call(SmsActiveTask::class,[$request]);

        return $user;

    }
}