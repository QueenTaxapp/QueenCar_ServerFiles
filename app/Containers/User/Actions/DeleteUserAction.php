<?php

namespace App\Containers\User\Actions;

use App\Containers\User\Tasks\DeleteTask;
use App\Ship\Parents\Actions\Action;
use App\Containers\User\Models\UserTableModel;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class DeleteUserAction extends Action
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {

        $id=$request->id;

        $result = $this->call(DeleteTask::class,[$id]);

//        $result = array('success'=>'true','message'=>$user);

        return $result;
    }

}