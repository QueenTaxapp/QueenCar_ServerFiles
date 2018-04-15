<?php

namespace App\Containers\User\Webtasks;

use App\Containers\Admin\Webtasks\Message;
use App\Containers\Common\GetConfigs;
use App\Ship\Parents\Tasks\Task;
use App\Containers\User\Models\UserTableModel;
use Illuminate\Validation\ValidationException;

/**

 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class UserViewTask extends Task
{
    /**
     * Save User Detail
     * @param Object $request
     * @param String $token
     *
     * @return  Object
     */
    public function run()
    {
        $page = GetConfigs::getConfigs('paginate');

        $data=UserTableModel::leftJoin('referral','User.id','=','referral.user_id')->select('User.*','referral.code')->orderBy('id', 'desc')->paginate($page);


        if ( ! $data)
        {
            throw new ValidationException((new Message()),redirect()->to('admin/user/add')
                ->withErrors([trans('localization::errors.internal_server_error')], 'default'));

        }

        return $data;



    }

}
