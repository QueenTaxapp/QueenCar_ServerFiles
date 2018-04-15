<?php

namespace App\Containers\User\Actions;


use App\Ship\Parents\Actions\Action;
use App\Containers\User\Models\UserTableModel;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class RetriveUserAction extends Action
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {
        $id=$request->id;

        $userValue = UserTableModel::where('id','=',$id)->first();

        return $userValue;
    }

}