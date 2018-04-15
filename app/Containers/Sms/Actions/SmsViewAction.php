<?php

namespace App\Containers\Sms\Actions;

use App\Ship\Parents\Actions\Action;
use App\Containers\Sms\Tasks\SmsViewTask;

/**
 * Class SmsViewAction
 * @package App\Containers\Sms\Actions
 */
class SmsViewAction extends Action
{
    /**
     * used to return a data for sms view page
     * @param $request
     * @return mixed
     */
    public function run($request)
    {

        $user = $this->call(SmsViewTask::class);

        return $user;

    }
}