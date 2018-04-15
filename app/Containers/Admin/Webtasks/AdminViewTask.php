<?php

namespace App\Containers\Admin\Webtasks;

use App\Containers\Admin\Tasks\Message;
use App\Containers\Common\ApiHelper;
use App\Containers\Common\GetConfigs;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;
use App\Containers\Admin\Models\AdminModel;
use App\Containers\Admin\Models\AdminDetails;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class AdminViewTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run()
    {

        $page = GetConfigs::getConfigs('paginate');

        $data=AdminModel::leftJoin('Admin_details', 'Admin.id', '=', 'Admin_details.admin_id')->select('Admin.*', 'Admin_details.*');




        $reterive_key = ApiHelper::reterive_key();



        if($reterive_key != 0)
        {

            $data = $data->where('admin_reference',$reterive_key)->orWhere('admin_key',$reterive_key);
        }


//        if(!session::has('role'))
//        {
//            $id = Session::get('id');
//            $allDetails = Cache::get("adminDetails$id");
//            $role = $allDetails['role'];
//
//        }
//        else
//        {
//            $role = Session::get('role');
//
//        }

//        if($role != '0')
//        {
//            $adminKey = Session::get('admin_key');
//
//
//            $data = $data->where('admin_reference',$adminKey)->orWhere('admin_key',$adminKey);
//
//
//        }

        $data = $data->orderBy('Admin.id','desc')->paginate($page);

        if ( ! $data)
            {
                throw new ValidationException((new Message()),redirect()->to('admin/add')
                    ->withErrors([trans('localization::errors.error_in_sql_statement')], 'default'));

                return array('success'=>"False",'message'=>"Error In SQL Statement..!");
            }

        return $data;
    }

}