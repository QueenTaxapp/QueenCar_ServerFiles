<?php

namespace App\Containers\User\Tasks;

use App\Ship\Parents\Tasks\Task;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use App\Containers\User\Models\UserTableModel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Ship\Exceptions\CommonException;

/**

 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class ApiUserDetailsTask extends Task
{
    /**
     * used to check if the email address is present or not
     * @param  $email string 
     * 
     * @return  array 
     */
    public function run($id)
    {                          
       
       $result = UserTableModel::select('id','firstname','lastname','email','phone_number','login_by','login_method','token')->where('id', '=', $id)
                                ->first();

        

       if(!$result)
       {
         throw (new CommonException())->setValue('601',trans('localization::errors.601'));
       }

       return $result;
    }

}