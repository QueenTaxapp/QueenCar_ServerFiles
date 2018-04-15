<?php

namespace App\Containers\Drivers\Actions;

use App\Containers\Notification\Tasks\PushNotificationTask;
use App\Ship\Parents\Actions\Action;

use App\Containers\Drivers\Tasks\ApiHeroResponseAcceptedTask;
use App\Containers\Drivers\Tasks\ApiHeroResponseCanceledTask;
use Illuminate\Support\Facades\Config;

/**
 * Class LoginValidationAction
 *
 * @author vicky
 */
class ApiHeroResponseAction extends Action
{

    /**
     * @method run used to validate if the user is Valid or invalid or blocked
     * @param \App\Ship\Parents\Requests\Request $request
     *
     * @return  array
     */
    public function run($request)
    {

        $is_accepted = $request->is_accepted;

        //Push Notification
        $device_token = "dDuZKYAeCj0:APA91bFCXZWiKl50vaf6gi4eHFpp6LVaB3fKrLc-Upys5GjGkcDlznoxlXhymjtV-UUH0iFvSbrc_5iybfIsYvRzjfmJ-dyvJDlA-B0rm-H3K0bnsYPGvIlgFMVcdGThkkC999V-RvFv";
        $message = "hello user";
        $hero = $this->call(PushNotificationTask::class, [$device_token,$message]);


        if($is_accepted == 1)
        {
            $hero = $this->call(ApiHeroResponseAcceptedTask::class, [$request]);
        }
        else
        {
            $hero = $this->call(ApiHeroResponseCanceledTask::class, [$request]);
        }

        return $hero;

    }
}