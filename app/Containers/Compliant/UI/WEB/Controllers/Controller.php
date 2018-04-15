<?php

namespace App\Containers\Compliant\UI\WEB\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Containers\Common\ApiHelper;
use App\Containers\Common\GetConfigs;
use App\Containers\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Session;

use App\Containers\Common\Configs_Class;
use Illuminate\Support\Facades\Redirect;
use App\Containers\Admin\Models\AdminModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Ship\Parents\Controllers\WebController;
use App\Containers\Compliant\Models\CompliantModel;
use App\Containers\Company\Webtasks\ReportDownloadTask;
use App\Containers\Compliant\Models\UserCompliantModel;
use App\Containers\Compliant\Models\DriverCompliantModel;
use App\Containers\Compliant\UI\WEB\Requests\CompliantEditRequest;
use Illuminate\Validation\ValidationException;
use App\Containers\Admin\Webtasks\Message;

class Controller extends WebController
{
    use SoftDeletes;

    public function userCompliantView(Request $request)
    {

        $paginate = GetConfigs::getConfigs('paginate');

        $request->session()->put('filter_type',"");
        $request->session()->put('filter_value',"");
        $request->session()->put('status_value',"");

        $tableNameSpace = 'App\Containers\Compliant\Models\UserCompliantModel';


        $type = $tableNameSpace::join('Compliant', 'Compliant.id', '=', 'User_Compliant.title')
            ->join('User', 'User.id', '=', 'User_Compliant.userid')
            ->select('User_Compliant.id','Compliant.title AS compliant_title','User_Compliant.description','User_Compliant.status AS compliant_status',DB::raw('CONCAT(tab_User.firstname, " ",tab_User.lastname) AS username'));


        $reterive_key =  ApiHelper::reterive_key();

         if($reterive_key != 0)
         {
             $type = $type->where('User_Compliant.admin_reference',$reterive_key);
         }


        $reportValue = $type->orderBy('id','desc')->get();
        $types = $type;

        if($request->has('filter_value1')  || $request->has('filter_value2') )
        {

            if($request->get('filter_type') == 'status')
            {

                $request->merge(array('filter_value' => $request->get('filter_value2')));
            }
            else
            {
                $request->merge(array('filter_value' => $request->get('filter_value1')));

            }

        }

        if(($request->has('filter_value1') || $request->has('filter_value2') ) && $request->has('filter_type'))
        {


            $filter_type =  $request['filter_type'];



            if($filter_type == 'status')
            {


                $types= $types->where('User_Compliant.status',$request['filter_value'])->orderBy('id','desc');


//                $types = $tableNameSpace::join('Compliant', 'Compliant.id', '=', 'User_Compliant.title')
//                    ->join('User', 'User.id', '=', 'User_Compliant.userid')
//                    ->select('User_Compliant.id','Compliant.title AS compliant_title','User_Compliant.description','User_Compliant.status',DB::raw('CONCAT(tab_User.firstname, " ",tab_User.lastname) AS username'))
//                    ->where('User_Compliant.status',$request['filter_value'])
//                    ->orderBy('id','desc');

                $request->session()->put('status_value',$request['filter_value']);

            }
            else
            {
                $types= $types->where(DB::raw('CONCAT_WS(" ", tab_User.firstname, tab_User.lastname)'), 'like','%'.$request['filter_value'].'%');

            }

            $request->session()->put('filter_type',$request['filter_type']);

            $request->session()->put('filter_value',$request['filter_value']);


            if($request->submit && $request->submit == 'Download_Report')
            {
                if($request->filter_type == 'username' && $request->filter_value == 0)
                {
                    $value = $reportValue;
                }
                else
                {
                    $value = $types->orderBy('id','desc')->get();
                }


                $heading = array(
                    trans('localization::lang_view.compliants_title'),
                    trans('localization::lang_view.description'),
                    trans('localization::lang_view.status'),
                    trans('localization::lang_view.customer_name'));

                $key = array('compliant_title','description','compliant_status','username');

                $title = trans('localization::lang_view.compliants_report');


                $this->call(ReportDownloadTask::class, [$heading,$value,$key,$title]);

            }
        }
        else if($request['filter_value'] == '' && $request->has('filter_type'))
        {
            //$filter_type =  $request['filter_type'];

            //$types = $types->where($filter_type,$request['filter_value'])->orderBy($filter_type,'desc');

        }
        else
        {
            $types = $types->orderBy('id','desc');

        }


//        $reterive_key = ApiHelper::reterive_key();
//
//
//        if($reterive_key != 0)
//        {
//
//            $types = $types->where('Sos.admin_reference',$reterive_key);
//
//        }

        $types = $types->paginate($paginate);

        $user = (object)$types;

        $title = trans('localization::title.user_compliants');
        $page= 'compliant_module';

        return view('compliant::UserCompliantView',['result'=>$user,'types' =>$types,'request'=>$request, 'title'=>$title,'page'=>$page]);



    }


    public function userCompliantEditPage(Request $request)
    {
        $id = $request->id;

        $values = UserCompliantModel::select('id','title','description')->where('id',$id)->first();

        $titles = CompliantModel::select('id','title')->where('status',1)->get();

        $title = trans('localization::title.sos');
        $page = "compliant_module";


        return view('compliant::UserCompliantEditView',['value'=>$values,'titles'=>$titles,'request'=>$request, 'title'=>$title, 'page'=> $page]);


    }

    public function userCompliantModify(CompliantEditRequest $request)
    {
        UserCompliantModel::where('id',$request['id'])
            ->update(['title'=>$request['title'],'description'=>$request['description']]);


        $response=array('success'=>"TRUE",'message'=>trans('localization::errors.modified_successfully'));
        $request->session()->flash('success',$response);

        return Redirect::to('/admin/user/compliant/view');

    }

    public function taken(Request $request)
    {
        $id = $request->id;
        UserCompliantModel::where('id',$id)
            ->update(['status'=>2]);

        $response=array('success'=>"TRUE",'message'=>trans('localization::errors.status_updated'));
        $request->session()->flash('success',$response);


        $data = Configs_Class::helper()->user_compliant($id);

        $compliant = Configs_Class::helper()->Constant_email_data();

        $compliant['title'] = $data['title'];
        $compliant['description']  = $data['description'];
        $compliant['userName'] = $data['userName'];
        $compliant['status'] = trans('localization::lang_view.taken');



        $email = $this->statusEmail();

        $subject = trans('localization::lang_view.compliant_status');
        $compliant = (object)$compliant;
        dispatch(new SendEmailJob($email->message,$compliant,$data['email'],$subject,$email->status));

        return Redirect::to('/admin/user/compliant/view');

    }

    public function statusEmail()
    {
        //language_change
        if(Session::has('lang'))
        {
            $lang = Session::get('lang');
        }
        else
        {
            $lang = 'en';
        }
        //language_change


        $email = Configs_Class::helper()->email(11,$lang);

        return $email;
    }

    public function solved(Request $request)
    {
        $id = $request->id;
        UserCompliantModel::where('id',$id)
            ->update(['status'=>3]);


        $data = Configs_Class::helper()->user_compliant($id);

        $compliant = Configs_Class::helper()->Constant_email_data();

        $compliant['title'] = $data['title'];
        $compliant['description']  = $data['description'];
        $compliant['userName'] = $data['userName'];
        $compliant['status'] = trans('localization::lang_view.solved');

        $email = $this->statusEmail();

        $subject = trans('localization::lang_view.compliant_status');
        $compliant = (object)$compliant;
        dispatch(new SendEmailJob($email->message,$compliant,$data['email'],$subject,$email->status));

        $response=array('success'=>"TRUE",'message'=>trans('localization::errors.status_updated'));
        $request->session()->flash('success',$response);

        return Redirect::to('/admin/user/compliant/view');

    }

    public function compliantView(Request $request)
    {

        $paginate = GetConfigs::getConfigs('paginate');
        $title = trans('localization::title.compliants');
        $page = "compliant_module";

        $values = CompliantModel::select('id','title','status','type');

        $reterive_key =  ApiHelper::reterive_key();

        if($reterive_key != 0){

            $values = $values->where('admin_reference',$reterive_key);
        }

        $values = $values->orderBy('id','desc')->paginate($paginate);


        return view('compliant::CompliantView',['value'=>$values,'request'=>$request, 'title'=>$title, 'page'=> $page]);

    }

    public function addCompliant(Request $request)
    {

        $complaint_admins = AdminModel::where('role',99999)->where('is_active',1)->get();

        $reterive_key =  ApiHelper::reterive_key();

         if($reterive_key != 0){

             $complaint_admin_key = $reterive_key;

         }else{
             $complaint_admin_key = 0;
         }


        $title = trans('localization::lang_view.add_compliant');
        $page = "compliant_module";

        return view('compliant::CompliantAdd',['request'=>$request,'complaint_admins'=>$complaint_admins,'complaint_admin_key'=>$complaint_admin_key, 'title'=>$title, 'page'=> $page]);

    }



    public function editCompliant(Request $request)
    {

        $id = $request->id;

        $value = CompliantModel::select('id','title','status','type')->where('id',$id)->first();
        $title = trans('localization::lang_view.edit_compliant');
        $page = "compliant_module";

        return view('compliant::CompliantEditView',['value'=>$value,'request'=>$request, 'title'=>$title, 'page'=> $page]);

    }


    public function registerCompliants(Request $request)
    {
        $routeUrl = '/admin/compliant/add';
        $this->alreadyCompliantRegistered($request['title'],$request['complaintAdmin'],$request['type'],$routeUrl,null,$request);

        $flight = new CompliantModel;

        $flight->admin_reference = $request['complaintAdmin'];
        $flight->title = $request['title'];
        $flight->status = 1;
        $flight->type = $request['type'];
        $flight->save();

        $response=array('success'=>"TRUE",'message'=>trans('localization::errors.registered_successfully'));
        $request->session()->flash('success',$response);

        return Redirect::to('/admin/compliant/view');

    }

    public function alreadyCompliantRegistered($title,$adminReference,$type,$routeUrl,$id=null,$request)
    {
        $alreadyRegistered =  CompliantModel::select('id','admin_reference')
        ->where('title',$title)
        ->where('type',$type);

        if($adminReference != null)
        {
            $alreadyRegistered = $alreadyRegistered->where('admin_reference',$adminReference);
        }

        $alreadyRegistered = $alreadyRegistered ->first();
        
        
    
        if( count($alreadyRegistered) != 0)
        {
            if($id == null || $alreadyRegistered->id != $id)
            {
                $input = array('title'=>$title,'admin_reference'=>$adminReference,'type'=>$type);

                $request->session()->flash('input',$input);
                
                throw new ValidationException((new Message()),redirect()->to($routeUrl)
                    ->withErrors([trans('localization::errors.already_compliant_registered')], 'default'));
            
            }    
        }   
    }
    public function modifyCompliants(Request $request)
    {
 
        $routeUrl = '/admin/compliant/edit/'.$request['id'];
        $this->alreadyCompliantRegistered($request['title'],null,$request['type'],$routeUrl,$request['id'],$request);

        $routeUrl = '/admin/compliant/edit/'.$request['id'];
        $this->alreadyCompliantRegistered($request['title'],null,$request['type'],$routeUrl,$request['id'],$request);

        CompliantModel::where('id',$request['id'])
            ->update(['title'=>$request['title'],'type'=>$request['type']]);
        $response=array('success'=>"TRUE",'message'=>trans('localization::errors.modified_successfully'));
        $request->session()->flash('success',$response);

        return Redirect::to('/admin/compliant/view');

    }

    public function deleteCompliant(Request $request)
    {
        $id=$request->id;

        CompliantModel::where('id',$id)->delete();
        $response=array('success'=>"TRUE",'message'=>trans('localization::errors.successfully_deleted'));
        $request->session()->flash('success',$response);

        return Redirect::to('/admin/compliant/view');
    }



    public function acceptCompliant(Request $request)
    {
        $id=$request->id;

        CompliantModel::where('id',$id)->update(['status'=>1]);
        $response=array('success'=>"TRUE",'message'=>trans('localization::errors.status_updated'));
        $request->session()->flash('success',$response);

        return Redirect::to('/admin/compliant/view');
    }

    public function declineCompliant(Request $request)
    {
        $id=$request->id;

        CompliantModel::where('id',$id)->update(['status'=>0]);
        $response=array('success'=>"TRUE",'message'=>trans('localization::errors.status_updated'));
        $request->session()->flash('success',$response);

        return Redirect::to('/admin/compliant/view');
    }


    public function driverCompliantView(Request $request)
    {

        $paginate = GetConfigs::getConfigs('paginate');

        $request->session()->put('filter_type',"");
        $request->session()->put('filter_value',"");
        $request->session()->put('status_value',"");

        $tableNameSpace = 'App\Containers\Compliant\Models\DriverCompliantModel';


        $type = $tableNameSpace::join('Compliant', 'Compliant.id', '=', 'Driver_Compliant.title')
            ->join('Drivers', 'Drivers.id', '=', 'Driver_Compliant.driverrid')
            ->select('Driver_Compliant.id','Compliant.title AS compliant_title','Driver_Compliant.description','Driver_Compliant.status AS compliant_status',DB::raw('CONCAT(tab_Drivers.firstname, " ",tab_Drivers.lastname) AS username'));


         $reterive_key =  ApiHelper::reterive_key();

          if($reterive_key != 0){

              $type = $type->where('Driver_Compliant.admin_reference',$reterive_key);
          }



        $reportValue = $type->orderBy('id','desc')->get();
        $types = $type;

        if($request->has('filter_value1')  || $request->has('filter_value2') )
        {

            if($request->get('filter_type') == 'status')
            {

                $request->merge(array('filter_value' => $request->get('filter_value2')));
            }
            else
            {
                $request->merge(array('filter_value' => $request->get('filter_value1')));

            }

        }

        if(($request->has('filter_value1') || $request->has('filter_value2') ) && $request->has('filter_type'))
        {


            $filter_type =  $request['filter_type'];



            if($filter_type == 'status')
            {


                $types= $types->where('Driver_Compliant.status',$request['filter_value'])->orderBy('id','desc');


//                $types = $tableNameSpace::join('Compliant', 'Compliant.id', '=', 'User_Compliant.title')
//                    ->join('User', 'User.id', '=', 'User_Compliant.userid')
//                    ->select('User_Compliant.id','Compliant.title AS compliant_title','User_Compliant.description','User_Compliant.status',DB::raw('CONCAT(tab_User.firstname, " ",tab_User.lastname) AS username'))
//                    ->where('User_Compliant.status',$request['filter_value'])
//                    ->orderBy('id','desc');

                $request->session()->put('status_value',$request['filter_value']);

            }
            else
            {


                $types= $types->where(DB::raw('CONCAT_WS(" ", tab_Drivers.firstname, tab_Drivers.lastname)'), 'like','%'.$request['filter_value'].'%');



            }

            $request->session()->put('filter_type',$request['filter_type']);

            $request->session()->put('filter_value',$request['filter_value']);


            if($request->submit && $request->submit == 'Download_Report')
            {
                if($request->filter_type == 'username' && $request->filter_value == 0)
                {
                    $value = $reportValue;
                }
                else
                {
                    $value = $types->orderBy('id','desc')->get();
                }


                $heading = array(
                    trans('localization::lang_view.compliants_title'),
                    trans('localization::lang_view.description'),
                    trans('localization::lang_view.status'),
                    trans('localization::lang_view.driver_name'));

                $key = array('compliant_title','description','compliant_status','username');

                $title = trans('localization::lang_view.compliants_report');


                $this->call(ReportDownloadTask::class, [$heading,$value,$key,$title]);

            }
        }
        else if($request['filter_value'] == '' && $request->has('filter_type'))
        {
            //$filter_type =  $request['filter_type'];

            //$types = $types->where($filter_type,$request['filter_value'])->orderBy($filter_type,'desc');

        }
        else
        {
            $types = $types->orderBy('id','desc');

        }


        //$reterive_key = ApiHelper::reterive_key();


       // if($reterive_key != 0)
       // {
       //     $types = $types->where('Drivers.admin_reference',$reterive_key);
       // }


        $types = $types->paginate($paginate);

        $user = (object)$types;

        $title = trans('localization::title.driver_compliants');
        $page= 'compliant_module';

        return view('compliant::DriverCompliantView',['result'=>$user,'types' =>$types,'request'=>$request, 'title'=>$title,'page'=>$page]);



    }


    public function driverCompliantEditPage(Request $request)
    {

        $id = $request->id;

        $values = DriverCompliantModel::select('id','title','description')->where('id',$id)->first();

        $titles = CompliantModel::select('id','title')->where('status',1)->get();

        $title = trans('localization::title.sos');
        $page = "compliant_module";


        return view('compliant::DriverCompliantEditView',['value'=>$values,'titles'=>$titles,'request'=>$request, 'title'=>$title, 'page'=> $page]);


    }
    public function driverCompliantModify(CompliantEditRequest $request)
    {
        DriverCompliantModel::where('id',$request['id'])
            ->update(['title'=>$request['title'],'description'=>$request['description']]);


        $response=array('success'=>"TRUE",'message'=>trans('localization::errors.modified_successfully'));
        $request->session()->flash('success',$response);

        return Redirect::to('/admin/driver/compliant/view');

    }

    public function driverTaken(Request $request)
    {


        $id = $request->id;
        DriverCompliantModel::where('id',$id)
            ->update(['status'=>2]);

        $data = Configs_Class::helper()->driver_compliant($id);

        $compliant = Configs_Class::helper()->Constant_email_data();

        $compliant['title'] = $data['title'];
        $compliant['description']  = $data['description'];
        $compliant['userName'] = $data['driverName'];
        $compliant['status'] = trans('localization::lang_view.taken');

        $email = $this->statusEmail();

        $subject = trans('localization::lang_view.compliant_status');
        $compliant = (object)$compliant;
        dispatch(new SendEmailJob($email->message,$compliant,$data['email'],$subject,$email->status));


        $response=array('success'=>"TRUE",'message'=>trans('localization::errors.status_updated'));
        $request->session()->flash('success',$response);

        return Redirect::to('/admin/driver/compliant/view');

    }

    public function driverSolved(Request $request)
    {
        $id = $request->id;
        DriverCompliantModel::where('id',$id)
            ->update(['status'=>3]);

        $data = Configs_Class::helper()->driver_compliant($id);

        $compliant = Configs_Class::helper()->Constant_email_data();

        $compliant['title'] = $data['title'];
        $compliant['description']  = $data['description'];
        $compliant['userName'] = $data['driverName'];
        $compliant['status'] = trans('localization::lang_view.solved');

        $email = $this->statusEmail();

        $subject = trans('localization::lang_view.compliant_status');
        $compliant = (object)$compliant;
        dispatch(new SendEmailJob($email->message,$compliant,$data['email'],$subject,$email->status));

        $response=array('success'=>"TRUE",'message'=>trans('localization::errors.status_updated'));
        $request->session()->flash('success',$response);

        return Redirect::to('/admin/driver/compliant/view');

    }

  
}

