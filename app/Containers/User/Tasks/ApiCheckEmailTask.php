<?php

namespace App\Containers\User\Tasks;

use App\Ship\Parents\Tasks\Task;
use App\Containers\User\Models\UserTableModel;
use App\Ship\Exceptions\CommonException;

/**

 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class ApiCheckEmailTask extends Task
{
    /**
     * used to check if the email address/username is present or not
     * @param   string $email
     * 
     * @return  array
     * @throw   CommonException ('email address not found')
     */
    public function run($email,$tableName)
    {                          
       
       $email = $tableName::where('email', '=', $email)
                                ->orWhere('phone_number','=', $email)
                                ->first();

       if(count($email) == 1)
       {
           return $email;
       }
       else
       {
          throw (new CommonException())->setValue('601',trans('localization::errors.601'));
       }
    }

}