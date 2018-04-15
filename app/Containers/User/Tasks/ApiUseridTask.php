<?php

namespace App\Containers\User\Tasks;

use App\Ship\Parents\Tasks\Task;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use App\Containers\User\Models\UserTableModel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Ship\Exceptions\CommonException;
use Illuminate\Support\Facades\Hash;


/**

 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class ApiUseridTask extends Task
{
    /**
     * used to check if the email address is present or not
     * @param  $username string 
     * 
     * @return  string
     */
    public function run($username)
    {        
                        
       $value = UserTableModel::select('id')->where('username','=',$username)->get();  
       return $value[0]['id'];
    }

}
