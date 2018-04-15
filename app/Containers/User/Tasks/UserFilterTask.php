<?php

namespace App\Containers\User\Tasks;

use App\Ship\Parents\Tasks\Task;
use App\Containers\User\Models\UserTableModel;


/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class UserFilterTask extends Task
{
    /**
     * @param      object
     *
     * @return  object
     */
    public function run($request)
    {
            $filter_type = $request->filter_type;

            if($request->filter_type == 'name')
            {
                $filter_type = 'firstname';
            }

            $result = UserTableModel::Where($filter_type,'like','%'.$request->filter_value.'%');

            $request->session()->put('filter_type',$filter_type);

            $request->session()->put('filter_value',$request->filter_value);

        return $result;
    }

}