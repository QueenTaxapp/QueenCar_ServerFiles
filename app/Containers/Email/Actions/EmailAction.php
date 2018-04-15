<?php

namespace App\Containers\Email\Actions;

use App\Containers\Email\Tasks\GetData;
use App\Ship\Parents\Actions\Action;
use Config;


/**
 * Class EmailAction
 * @package App\Containers\Email\Actions
 */
class EmailAction extends Action
{


    /**
     * to validate user
     * @param null $id
     * @return mixed
     */
    public function run($id=null)
    {
        //$emails = $this->call(ReturnFieldTask::class,[$id,'*','App\Containers\User911\Models\EmailSettingsModel']);
        $emails = $this->call(GetData::class,[$id,'*','App\Containers\Email\Models\EmailSettingsModel']);     
       
        return $emails;
    }
}