<?php

namespace App\Containers\User\Tasks;

use App\Ship\Parents\Tasks\Task;
use App\Containers\User\Models\UserTableModel;


/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class UserSearchTask extends Task
{
    /**
     * @param   object
     *
     * @return  object
     */
    public function run($request)
    {
        $userType = $request->UserType;
        
        if($request->UserType == 'name')
        {
            $userType = 'firstname';
        }

            
        $result = UserTableModel::orderBy($userType,$request->UserValue);

        $request->session()->put('UserType',$userType);

        $request->session()->put('UserValue',$request->UserValue);

        return $result;
    }

}