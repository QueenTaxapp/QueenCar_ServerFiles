<?php

namespace App\Containers\Email\Actions;

use App\Containers\Email\Tasks\GetData;
use App\Ship\Parents\Actions\Action;
use Config;

use DB;
use App\Containers\Email\Tasks\ToggleStatusTask;

/**
 * Class WebAdminLoginAction.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
 
class ToggleStatusAction extends Action
{


    /**
     * toogle email setting action
     * @param $id
     */
    public function run($id)
    { 
        $this->call(ToggleStatusTask::class,[$id,'status','App\Containers\Email\Models\EmailSettingsModel']);         
    }
}