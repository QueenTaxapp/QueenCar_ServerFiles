<?php

namespace App\Containers\Email\Webtasks;

use App\Containers\Email\Webtasks\GetData;
use App\Ship\Parents\Actions\Action;
use Config;

/**
 * Class EmailAction
 * @package App\Containers\Email\Actions
 */
class EmailTask 
{


    /**
     * to validate user
     * @param null $id
     * @return mixed
     */
    public function run($id=null)
    {

        $obj = new GetData;

        $emails =  $obj->run($id,'*','App\Containers\Email\Models\EmailSettingsModel');
       
        return $emails;
    }
}