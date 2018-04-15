<?php

namespace App\Containers\User\Tasks;

use App\Ship\Parents\Tasks\Task;
use App\Containers\User\Models\UserTableModel;
use App\Ship\Exceptions\CommonException;
use phpDocumentor\Reflection\Types\Boolean;


/**
 * Class ApiUserCheckTask
 * @package App\Containers\User\Tasks
 */
class ApiUserCheckTask extends Task
{


    /**
     * @param $request
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function run($request)
    {
        $user=UserTableModel::where('id',$request->id)->where('token',$request->token)->first();
        if($user)
        {
            return $user;
        }
        else
        {
            throw (new CommonException())->setValue('705',trans('localization::errors.705'));
        }
    }

}