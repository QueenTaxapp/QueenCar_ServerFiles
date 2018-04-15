<?php

namespace App\Containers\Types\UI\WEB\Controllers;
use Illuminate\Http\Request;
use App\Containers\Common\ApiHelper;
use App\Containers\Common\GetConfigs;
use App\Containers\Types\Models\Types;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Containers\Admin\Models\AdminModel;
use App\Containers\Zone\Models\ZoneTypeModel;
use App\Ship\Parents\Controllers\WebController;
use App\Containers\Types\Webtasks\DriverTypeSaveTask;
use App\Containers\Types\Webtasks\DriverTypeUpdateTask;

/**
 * Class Controller
 * @package App\Containers\Admin\UI\WEB\Controllers
 */
class Controller extends WebController
{

    public function adminDriverTypeViewPage(Request $request)
    {
        $paginate = GetConfigs::getConfigs('paginate');

        $title = trans('localization::lang_view.types');

        $types = Types::select('id','name','icon','is_active');

        $referenceKey = ApiHelper::reterive_key();

        if($referenceKey != 0)
        {
            $types = $types->where('admin_reference',$referenceKey);
        }

        $types = $types->orderBy('id','desc')->paginate($paginate);


        return view('types::DriverTypeView',['result' => $types,'request' => $request,'page'=>"type_module",'title'=>$title]);
    }


    public function adminDriverTypeAdd(Request $request)
    {
        $type_admins = AdminModel::where('role',99999)->where('is_active',1)->get();

        $referenceKey = ApiHelper::reterive_key();

        if($referenceKey != 0)
        {
            $type_admin_key = $referenceKey;

        }else{
            $type_admin_key = 0;
        }


        $title = trans('localization::lang_view.types');

        return view('types::DriverTypeAdd',['type_admins' => $type_admins,'type_admin_key' => $type_admin_key,'request' => $request,'page'=>"type_module",'title'=>$title]);
    }


    public function adminDriverTypeSave(Request $request){

        $user = $this->call(DriverTypeSaveTask::class, [$request]);

        $request->session()->flash('success', $user);

        return Redirect::to("/admin/driverTypeView");
    }


    public function adminDriverTypeEdit(Request $request)
    {
        $type_admins = AdminModel::where('role',99999)->where('is_active',1)->get();

        $referenceKey = ApiHelper::reterive_key();

        if($referenceKey != 0)
        {
            $type_admin_key = $referenceKey;

        }else{
            $type_admin_key = 0;
        }

        $title = trans('localization::lang_view.types');

        $type = Types::where('id',$request->id)->first();

        return view('types::DriverTypeEdit',['type_admins' => $type_admins,'type_admin_key' => $type_admin_key,'request' => $request,'type'=>$type,'page'=>"type_module",'title'=>$title]);

    }


    public function adminDriverTypeUpdate(Request $request){

        $user = $this->call(DriverTypeUpdateTask::class, [$request]);

        $request->session()->flash('success', $user);

        return Redirect::to("/admin/driverTypeView");

    }


    public function adminDriverTypeDelete(Request $request){

        $type = Types::where('id',$request->id)->delete();

        $type_array = array('success'=>"TRUE",'message'=>trans('localization::errors.type_deleted_successfully'));

        $request->session()->flash('success', $type_array);

        return Redirect::to("/admin/driverTypeView");

    }


    public function adminDriverTypeStatusToggle(Request $request){

        $type = Types::where('id',$request->id)->first();


        $old_state=$type->is_active;

        if($old_state==0){

            $type->is_active=1;
            $zoneType = ZoneTypeModel::where('type_id',$request->id)->update(array('is_active'=>1));

            $type_array = array('success'=>"TRUE",'message'=>trans('localization::errors.type_active_successfully'));
        }
        elseif($old_state==1)
        {
            $type->is_active=0;
            $zoneType = ZoneTypeModel::where('type_id',$request->id)->update(array('is_active'=>0));

            $type_array = array('success'=>"TRUE",'message'=>trans('localization::errors.type_inactive_successfully'));
        }
        $type->save();

        $request->session()->flash('success', $type_array);

        return Redirect::to("/admin/driverTypeView");

    }



}

