<?php

namespace App\Containers\User\Tasks;

use App\Ship\Parents\Tasks\Task;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use App\Containers\Admin\Models\UserTableModel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Ship\Exceptions\CommonException;

/**

 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class ApiCheckPasswordTask extends Task
{

    /**
     * used to check if the email address is present or not
     * @param  $email string 
     * 
     * @return  array 
     */
    public function run($userEnter,$onDatabase,$errorCode = '601')
    {                          

        if (Hash::check($userEnter, $onDatabase)) 
        {
            return True;
        }
        else
        {
            $errorMessage = trans("localization::errors.$errorCode");
            throw (new CommonException())->setValue($errorCode,$errorMessage);
        }

    }

}