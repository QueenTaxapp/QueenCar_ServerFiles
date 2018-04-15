<?php

namespace App\Containers\Drivers\Actions;

use App\Containers\Drivers\Models\HeroModel;
use App\Containers\Drivers\Tasks\ApiDriverManualLoginTask;
use App\Ship\Exceptions\CommonException;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Tasks\Task;

use App\Ship\Parents\Requests\Request;

use App\Containers\Drivers\Tasks\ApiHeroManualLoginTask;
use App\Containers\Drivers\Tasks\ApiHeroSocialLoginTask;
use App\Containers\Drivers\Tasks\ApiHeroLoginDetailsTask;


use \Cache;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

use App\Containers\Admin\Tasks\Message;

/**
 * Class LoginValidationAction
 *
 * @author vicky
 */
class ApiDriverLoginAction extends Action
{

    /**
     * @method run used to validate if the user is Valid or invalid or blocked
     * @param \App\Ship\Parents\Requests\Request $request
     *
     * @return  array
     */
    public function run($request)
    {

            $hero = $this->call(ApiDriverManualLoginTask::class, [$request]);

            return $hero;


    }
}