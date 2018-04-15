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
class ApiRegisterLoginTask extends Task
{
    /**
     * used to check if the email address is present or not
     * @param  $email string 
     * 
     * @return  array 
     */
    public function run($id,$token,$deviceToken,$loginBy)
    {                          
        $update = UserTableModel::where('id',$id)
                        ->update(['token'=>$token,
                        'device_token' => $deviceToken,
                        'token_expiry'=> date("Y-m-d h:i:s", strtotime("+2 day")),
                        'login_by' => $loginBy]);

       if(!$update)
       {
            throw (new CommonException())->setValue('602',trans('localization::errors.602'));          
       }

       return true;
    }

}