<?php

namespace App\Containers\Sms\Actions;

use App\Ship\Parents\Actions\Action;
use App\Containers\Sms\Tasks\SmsUpdateTask;

/**
 * Class SmsUpdateAction
 * @package App\Containers\Sms\Actions
 */
class SmsUpdateAction extends Action
{
    /**
     * used to update details of sms
     * @param $data
     * @return mixed
     */
    public function run($data)
    {

        $user = $this->call(SmsUpdateTask::class, [$data]);

        return $user;

    }
}