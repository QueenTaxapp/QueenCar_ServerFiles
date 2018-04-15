<?php

namespace App\Containers\Drivers\Actions;

use App\Ship\Parents\Actions\Action;

use App\Containers\Drivers\Tasks\ApiHeroUpdateLocationTask;

/**
 * Class LoginValidationAction
 *
 * @author vicky
 */
class ApiHeroUpdateLocationAction extends Action
{

    /**
     * @method run used to validate if the user is Valid or invalid or blocked
     * @param \App\Ship\Parents\Requests\Request $request
     *
     * @return  array
     */
    public function run($request)
    {
        $hero = $this->call(ApiHeroUpdateLocationTask::class, [$request]);

        return $hero;

    }
}