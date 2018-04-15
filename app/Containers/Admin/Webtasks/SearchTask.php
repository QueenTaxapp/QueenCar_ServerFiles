<?php

namespace App\Containers\Admin\Webtasks;

use App\Containers\Common\ApiHelper;
use App\Containers\Common\GetConfigs;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;
use App\Containers\Admin\Models\AdminModel;
use App\Containers\Admin\Models\AdminDetails;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class SearchTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {
        $page = GetConfigs::getConfigs('paginate');
        $request->session()->forget('value');
        $request->session()->forget('type');

        $value = $request->filter_value;
        $type = $request->filter_type;
        $request->session()->put('filter_value', $value);
        $request->session()->put('filter_type', $type);


        $query=AdminModel::leftJoin('Admin_details', 'Admin.id', '=', 'Admin_details.admin_id')->select('Admin.*', 'Admin_details.*');


        $reterive_key = ApiHelper::reterive_key();


        if($reterive_key != 0)
        {

            $query = $query->where(function($q) use ($reterive_key) {
                    $q->where('admin_reference',$reterive_key)
                        ->orWhere('admin_key',$reterive_key);
                });


        }





        if ($type == 'registration_code')
        {


                $heroes = $query->where('registration_code', 'like','%'. $value . '%')->orderBy('Admin.id','desc');

        } 
        elseif ($type == 'name') 
        {


            $heroes= $query->where(DB::raw('CONCAT_WS(" ", tab_Admin.firstname, tab_Admin.lastname)'), 'like','%'.$value.'%')->orderBy('Admin.id','desc');


        }
        elseif ($type == 'email') 
        {


                $heroes = $query->where('email', 'like', '%' . $value . '%')->orderBy('Admin.id','desc');


        }
        elseif ($type == 'phone') 
        {


                $heroes = $query->where('phone_number', 'like', '%' . $value . '%')->orderBy('Admin.id','desc');


        }
        elseif ($type == 'area_name')
        {


            $heroes = $query->where('area_name', 'like', '%' . $value . '%')->orderBy('Admin.id','desc');


        }



        if ($request->submit && $request->submit == 'Download_Report')
        {

            $heroes = $heroes->get();

        }
        else
        {

            $heroes = $heroes->paginate($page);

        }



        return $heroes;

    }

}