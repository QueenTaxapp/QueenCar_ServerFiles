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
class ApiSocialUniqueIdCheckExistTask extends Task
{
    /**
     * used to check if the social unique id is present or not
     * @param  String $social_unique_id
     * 
     * @return  array 
     */
    public function run($social_unique_id)
    {                          
       
        $socialUniqueId = UserTableModel::select('social_unique_id')->where('social_unique_id', '=', $social_unique_id)
                                 ->first();


       if(count($socialUniqueId) == 1)
       {
            $array =array('success'=>'true');
           return $array;           
       }
       else
       {
           $array =array('success'=>'false');
          return $array; 
       }
    }

}