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
class ApiSocialUniqueIdCheckTask extends Task
{
    /**
     * used to select id using Social unique id
     * @param  $email string 
     * 
     * @return  array 
     */
    public function run($socialUniqueId)
    {                          
       
       $result = UserTableModel::where('social_unique_id', '=', $socialUniqueId)->first();

       if(count($result) == 1)
       {

           return $result;           
       }
       else
       {
          throw (new CommonException())->setValue('601',trans('localization::errors.603'));
       }      
    }

}