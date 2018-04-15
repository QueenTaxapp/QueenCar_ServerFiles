<?php

namespace App\Containers\User\Webtasks;

use App\Containers\Common\GetConfigs;
use App\Ship\Parents\Tasks\Task;
use App\Containers\User\Models\UserTableModel;
use Illuminate\Support\Facades\DB;


/**

 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class UserSearchTask extends Task
{
    /**
     * Save User Detail
     * @param Object $request
     * @param String $token
     *
     * @return  Object
     */
    public function run($request)
    {
        $page = GetConfigs::getConfigs('paginate');


        $value = $request->filter_value;
        $type = $request->filter_type;
        $request->session()->put('filter_value', $value);
        $request->session()->put('filter_type', $type);

        $query=UserTableModel::leftJoin('referral','User.id','=','referral.user_id')->select('User.*','referral.code');


        if ($type == 'id')
        {

            if ($request->submit && $request->submit == 'Download_Report')
            {

                $users = $query->where('id', $value)->get();

            }
            else
            {

                $users = $query->where('id', $value)->paginate($page);

            }
        }
        elseif ($type == 'name')
        {

            if ($request->submit && $request->submit == 'Download_Report')
            {
                $users= $query->where(DB::raw('CONCAT_WS(" ", tab_User.firstname, tab_User.lastname)'), 'like','%'.$value.'%')->get();


              //  $users = $query->where('firstname', 'like', '%' . $value . '%')->orWhere('lastname', 'like', '%' . $value . '%')->get();


            }
            else
            {
                $users= $query->where(DB::raw('CONCAT_WS(" ", tab_User.firstname, tab_User.lastname)'), 'like','%'.$value.'%')->paginate($page);



               // $users = $query->where('firstname', 'like', '%' . $value . '%')->orWhere('lastname', 'like', '%' . $value . '%')->paginate($page);


            }
        }
        elseif ($type == 'email')
        {

            if ($request->submit && $request->submit == 'Download_Report')
            {

                $users = $query->where('email', 'like', '%' . $value . '%')->get();

            }
            else
            {

                $users = $query->where('email', 'like', '%' . $value . '%')->paginate($page);

            }
        }
        elseif ($type == 'phone')
        {

            if ($request->submit && $request->submit == 'Download_Report')
            {

                $users = $query->where('phone_number', 'like', '%' . $value . '%')->get();

            }
            else
            {

                $users = $query->where('phone_number', 'like', '%' . $value . '%')->paginate($page);
            }
        }

        return $users;

    }

}
