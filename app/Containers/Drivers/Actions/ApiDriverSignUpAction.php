<?php

namespace App\Containers\Drivers\Actions;

use App\Containers\Drivers\Models\HeroModel;
use App\Containers\Drivers\Tasks\ApiDriverDocumentTask;
use App\Containers\Drivers\Tasks\ApiDriverSignUpTask;
use App\Ship\Parents\Actions\Action;

/**
 * Class LoginValidationAction
 *
 * @author vicky
 */
class ApiDriverSignUpAction extends Action
{

    /**
     * @method run used to validate if the user is Valid or invalid or blocked
     * @param \App\Ship\Parents\Requests\Request $request
     *
     * @return  array
     */
    public function run($request)
    {

            $driver = $this->call(ApiDriverSignUpTask::class, [$request]);
            $this->call(ApiDriverDocumentTask::class, [$request,$driver]);

            return $driver;


    }
}