<?php

namespace App\Containers\User\Actions;

use App\Ship\Parents\Actions\Action;
use App\Containers\User\Models\UserTableModel;
use Config;
use App\Containers\User\Tasks\UserSearchTask;
use App\Containers\User\Tasks\UserFilterTask;
use App\Containers\User\Tasks\UserDownloadReportTask;
/**
 * Class WebAdminLoginAction.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class UserViewAction extends Action
{

    /**
     * @param \App\Ship\Parents\Requests\Request $request
     *
     * @return  array
     * @throws \App\Containers\Authorization\Exceptions\UserNotAdminException
     */
    public function run($request)
    {
        $result = UserTableModel::select('*')->orderBy('id','DESC');
        $request->session()->put('UserType',"");
        $request->session()->put('UserValue',"");
        $request->session()->put('filter_type',"");
        $request->session()->put('filter_value',"");

        if($request->has('UserType') && $request->has('UserValue'))
        {
            $result = $this->call(UserSearchTask::class,[$request]);
        }
        elseif($request->has('filter_type') && $request->has('filter_value'))
        {
            $result = $this->call(UserFilterTask::class,[$request]);
        }

        if($request->has('submit') && $request->submit == 'Download_Report')
        {
            $result1 = $result->get(); 
             $result = $this->call(UserDownloadReportTask::class,[$result1]);

        }

        $number = Config::get('app.paginate'); 
        $result = $result->paginate($number);
        return $result;

    }
}