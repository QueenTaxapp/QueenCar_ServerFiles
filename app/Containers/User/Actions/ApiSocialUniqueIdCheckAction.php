<?php

namespace App\Containers\User\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Tasks\Task;
use App\Containers\Admin\Tasks\AdminAddTask;
use App\Ship\Parents\Requests\Request;
use App\Containers\User\Models\UserTableModel;
use Config;
use App\Containers\User\Tasks\UserSearchTask;
use App\Containers\User\Tasks\UserFilterTask;
use App\Containers\User\Tasks\UserDownloadReportTask;
use App\Containers\User\Tasks\ApiCheckEmailTask;
use App\Containers\User\Tasks\ApiCheckPasswordTask;
use App\Containers\Admin\Tasks\SessionKeyTask;
use App\Containers\User\Tasks\ApiRegisterLoginTask;
use App\Containers\User\Tasks\ApiSocialUniqueIdCheckTask;
use App\Containers\User\Tasks\ApiUserDetailsTask;
use App\Containers\User\Tasks\ApiSocialUniqueIdCheckExistTask;


/**
 * Class WebAdminLoginAction.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
 
class ApiSocialUniqueIdCheckAction extends Action
{

    /**
     * to check if the social unique id is present or not
     * @param object $request
     *
     * @return  object $result
     */
    public function run($request)
    {

        $result = $this->call(ApiSocialUniqueIdCheckExistTask::class,[$request->social_unique_id]);

        $result = (object)$result;

        return $result;
    }
}