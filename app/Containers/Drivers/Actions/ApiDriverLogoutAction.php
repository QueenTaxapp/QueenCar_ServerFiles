<?php

namespace App\Containers\Drivers\Actions;

use App\Containers\Drivers\Models\DriverModel;
use App\Containers\Drivers\Tasks\ApiDriverLogoutTask;
use App\Containers\Drivers\Tasks\ApiDriverSignUpTask;
use App\Containers\Sms\Tasks\MakeMessage;
use App\Containers\Sms\Tasks\SendSmsWithPermissionTask;
use App\Containers\Sms\Tasks\SmsInterface;
use App\Containers\User\Tasks\GetRandomCode;
use App\Containers\User\Tasks\TempTokenCheck;
use App\Containers\User\Tasks\UserMobileCheckTask;
use App\Ship\Exceptions\CommonException;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Class LoginValidationAction
 *
 * @author vicky
 */
class ApiDriverLogoutAction extends Action
{

    /**
     * @method Logout user
     * @param \App\Ship\Parents\Requests\Request $request
     *
     * @return  array
     */
    public function run($request)
    {
         $this->call(ApiDriverLogoutTask::class, [$request,"App\\Containers\\Drivers\\Models\\DriverModel"]);
         return ;

    }
}