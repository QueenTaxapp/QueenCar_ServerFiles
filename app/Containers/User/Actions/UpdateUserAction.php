<?php

namespace App\Containers\User\Actions;


use App\Containers\User\UI\WEB\Requests\ValidateRequest;
use App\Ship\Parents\Actions\Action;
use App\Containers\User\Models\UserTableModel;

use Illuminate\Validation\ValidationException;
use App\Containers\Admin\Tasks\Message;
use App\Containers\User\Tasks\ValidateEmailTask;
use App\Containers\User\Tasks\UpdateUserTask;
/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class UpdateUserAction extends Action
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {

        $user = $this->call(UpdateUserTask::class,[$request]);

        return $user;
 
    }

}