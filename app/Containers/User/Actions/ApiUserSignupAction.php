<?php

namespace App\Containers\User\Actions;

use App\Containers\InterfaceSms\WelcomeSms;
use App\Containers\User\Models\Refferal;
use App\Containers\User\Tasks\GetRandomCode;
use App\Ship\Parents\Actions\Action;

use Config;
use App\Containers\User\Tasks\ApiUserSignupTask;
use App\Containers\User\Tasks\ApiInsertUserImageTask;

use App\Containers\Jobs\SendEmailJob;
use App\Containers\Jobs\SendSmsJob;




/**
 * Class WebAdminLoginAction.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
 
class ApiUserSignupAction extends Action
{
    /**
     * to sign up user
     * @param object $request
     *
     * @return  object $result
     */
    public function run($request)
    {


           //dispatch(new SendEmailJob($viewPage,$name,$email,$subject));
        

            return $user;


    }

}