<?php

namespace App\Containers\Sos\UI\WEB\Controllers;

use App\Containers\Admin\Models\AdminModel;
use App\Containers\Common\ApiHelper;
use App\Containers\Common\GetConfigs;
use App\Containers\Company\Webtasks\ReportDownloadTask;
use App\Ship\Parents\Controllers\WebController;

use Illuminate\Http\Request;
use App\Containers\Sos\Models\SosModel;
use App\Containers\Sos\UI\WEB\Requests\AddSosRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class Controller extends WebController
{
    use SoftDeletes;
    public function adminSosView(Request $request)
    {


        $page = GetConfigs::getConfigs('paginate');

        $request->session()->put('filter_type',"");
        $request->session()->put('filter_value',"");


        // $user = SosModel::select('id','name','number','status','');

        $user = SosModel::leftjoin('Admin','Admin.admin_key','Sos.admin_reference')
            ->select('Sos.id','Sos.name','Sos.number','Sos.status','Sos.id','Admin.area_name');



        $reterive_key = ApiHelper::reterive_key();


        if($reterive_key != 0)
        {
            $user = $user->where('Sos.admin_reference',$reterive_key);
        }


        $user = $user->orderBy('Sos.id','desc')->paginate($page);

        $title = trans('localization::title.sos');
        $page = "sos_module";


        return view('sos::SosView',['result'=>$user,'request'=>$request, 'title'=>$title, 'page'=> $page]);

    }

    public function adminSosAdd(Request $request)
    {
        $title = trans('localization::title.sos');
        $page = "sos_module";

        $sos_admins = AdminModel::where('role',99999)->where('is_active',1)->get();

        $reterive_key = ApiHelper::reterive_key();

        if($reterive_key != 0)
        {
            $sos_admin_key = $reterive_key;
        }else{
            $sos_admin_key = 0;
        }

        return view('sos::SosAddView',['request'=>$request,'sos_admins'=>$sos_admins,'sos_admin_key'=>$sos_admin_key, 'title'=>$title, 'page'=> $page]);
    }


    public function registerAdminSos(AddSosRequest $request)
    {

        $flight = new SosModel;

        $flight->name = $request->name;
        $flight->admin_reference = $request->sosAdmin;
        $flight->number = $request->number;
        $flight->status = 1;

        $flight->save();


        $response=array('success'=>"TRUE",'message'=>trans('localization::errors.registered_successfully'));
        $request->session()->flash('success',$response);

        return Redirect::to('/admin/sos/view');

    }

    public function adminEditSos(Request $request)
    {
        $id = $request->id;

        $value = SosModel::select('id','name','number','admin_reference')->where('id',$id)->first();


        $title = trans('localization::title.sos');
        $page = "sos_module";


        return view('sos::SosEditView',['value'=>$value,'request'=>$request, 'title'=>$title, 'page'=> $page]);


    }

    public function modifyAdminSos(AddSosRequest $request)
    {

        $id     = $request->id;
        $name   = $request->name;
        $number = $request->number;



        SosModel::where('id',$id)
            ->update(['name'=>$name,'number'=>$number]);

        $response=array('success'=>"TRUE",'message'=>trans('localization::errors.modified_successfully'));
        $request->session()->flash('success',$response);

        return Redirect::to('/admin/sos/view');

    }
    public function sosDelete(Request $request)
    {

        $id     = $request->id;
        SosModel::where('id',$id)->delete();
        $response=array('success'=>"TRUE",'message'=>trans('localization::errors.deleted_successfully'));
        $request->session()->flash('success',$response);

        return Redirect::to('/admin/sos/view');

    }


    public function sosDecline(Request $request)
    {
        $id     = $request->id;
        SosModel::where('id',$id)->update(['status'=>0]);
        $response=array('success'=>"TRUE",'message'=>trans('localization::errors.declined_successfully'));
        $request->session()->flash('success',$response);

        return Redirect::to('/admin/sos/view');

    }
    public function sosAccept(Request $request)
    {
        $id     = $request->id;
        SosModel::where('id',$id)->update(['status'=>1]);
        $response=array('success'=>"TRUE",'message'=>trans('localization::errors.approved_successfully'));
        $request->session()->flash('success',$response);

        return Redirect::to('/admin/sos/view');

    }
}

