<?php

namespace App\Containers\Sms\Actions;

use App\Ship\Parents\Actions\Action;
use App\Containers\Sms\Tasks\SmsEditTask;
use App\Ship\Parents\Requests\Request;

/**
 * Class SmsEditAction
 * @package App\Containers\Sms\Actions
 */
class SmsEditAction extends Action
{
    /**
     * used to return a data for sms edit page
     * @param $request
     * @return mixed
     */
    public function run($request)
    {
        $user = $this->call(SmsEditTask::class,[$request]);

        return $user;

    }
}