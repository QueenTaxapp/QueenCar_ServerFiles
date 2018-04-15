<?php

namespace App\Containers\User\Tasks;

use App\Containers\Admin\Tasks\Message;
use App\Containers\User\Models\UserTableModel;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use App\Containers\Admin\Models\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


/**
 * Class DeleteTask
 * @package App\Containers\User\Tasks
 */
class DeleteTask extends Task
{

    /**
     * @param $id
     * @return array
     * @throws ValidationException
     */
    public function run($id)
    {


        $user = new UserTableModel();
        $deleteStatus = $user->where('id','=',$id)->delete();

        if(!$deleteStatus)
        {
            throw new ValidationException(new Message(),redirect()->to('viewUser')
                ->withErrors([trans('localization::errors.details_could_not_saved_in')].$use, 'default'));

        }

        $message = trans('localization::errors.user_delete_successfully');
        $result = array('success'=>'true','message'=>$message);

        return $result;
    }
}