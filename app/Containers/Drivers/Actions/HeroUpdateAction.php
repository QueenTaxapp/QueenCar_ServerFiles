<?php

namespace App\Containers\Drivers\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Tasks\Task;
use App\Containers\Drivers\Tasks\HeroUpdateTask;
use App\Containers\Drivers\Tasks\HeroUpdateEmailTask;
use App\Ship\Parents\Requests\Request;
use Illuminate\Validation\ValidationException;

/**
 * Class WebAdminLoginAction.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class HeroUpdateAction extends Action
{

    /**
     * @param \App\Ship\Parents\Requests\Request $request
     *
     * @return  mixed
     * @throws \App\Containers\Authorization\Exceptions\UserNotAdminException
     */
    public function run($data)
    {
        $use = $this->call(HeroUpdateEmailTask::class, [$data]);

        if($use==0) {
            $user = $this->call(HeroUpdateTask::class, [$data]);
        }

        return $user;

    }
}