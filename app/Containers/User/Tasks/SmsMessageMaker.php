<?php

namespace App\Containers\User\Tasks;

use App\Containers\InterfaceSms\WelcomeSms;
use App\Ship\Parents\Tasks\Task;
use App\Containers\User\Models\UserTableModel;
use App\Ship\Exceptions\CommonException;

/**

 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class SmsMessageMaker extends Task
{
    /**
     * used to form a sms message here
     * @param   $object WelcomeSms
     * @param   String $title
     * 
     * @return  String
     */

    public function run($sms,$title)
    {                          

    }

}