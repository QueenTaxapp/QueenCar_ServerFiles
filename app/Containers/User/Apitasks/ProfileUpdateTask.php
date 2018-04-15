<?php

namespace App\Containers\User\Webtasks;

use App\Containers\Admin\Webtasks\Message;
use App\Containers\Common\GetConfigs;
use App\Ship\Parents\Tasks\Task;
use App\Containers\User\Models\UserTableModel;
use Illuminate\Validation\ValidationException;
use App\Containers\Company\Webtasks\DynamicPasswordValidationTask;

class ProfileUpdateTask extends Task
{
 
    public function run($request,$tableNameSpace)
    {
        $this->call(DynamicPasswordValidationTask::class, [$plainText,$hashedPassword,$routeName,$block = null,$errorMessage='username or password invalid']);

        $tableNameSpace::where('id',$request->id);
                        update([''=>$request->firstName,$request->lastName,]);

        if ( ! $data)
        {
            throw new ValidationException((new Message()),redirect()->to('admin/user/add')
                ->withErrors([trans('localization::errors.internal_server_error')], 'default'));

        }

        return $data;



    }

}
