<?php

namespace App\Containers\Admin\UI\WEB\Controllers;

use App\Containers\Admin\fileExists\fileExists;
use App\Containers\Admin\Models\AdminDetailsModel;
use App\Containers\Admin\Models\AdminModel;
use App\Containers\Admin\Models\AdminTypesModel;
use App\Containers\Admin\Models\CommonLanguageModel;
use App\Containers\Admin\UI\WEB\Requests\AdminAddRequest;
use App\Containers\Admin\UI\WEB\Requests\AdminProfileUpdateRequest;
use App\Containers\Admin\Webtasks\Message;


use App\Containers\Common\ApiHelper;
use App\Containers\Common\Configs_Class;

use App\Containers\Admin\UI\WEB\Requests\AdminPrivilegeNameEditRequest;
use App\Containers\Admin\Webtasks\AdminAddSaveTask;
use App\Containers\Admin\Webtasks\AdminUpdateTask;
use App\Containers\Admin\Webtasks\AdminProfileUpdateTask;
use App\Containers\Admin\Webtasks\AdminViewTask;
use App\Containers\Admin\Webtasks\EmailCheckTask;
use App\Containers\Admin\Webtasks\PhoneCheckTask;
use App\Containers\Admin\Webtasks\SearchTask;
use App\Containers\Common\GetConfigs;
use App\Containers\Drivers\Models\DriverModel;
use App\Containers\Drivers\Tasks\DownloadReportTask;
use App\Containers\Types\Models\Types;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Containers\Admin\Actions\FileDecodeAction;
use App\Containers\Admin\Actions\DragDropUnselectedAction;
use Illuminate\Validation\ValidationException;
use App\Containers\Company\Webtasks\ReportDownloadTask;
use App\Containers\Drivers\Webtasks\DriverDetailsMapTask;

use ElephantIO\Client,
    ElephantIO\Engine\SocketIO\Version2X;

use Illuminate\Filesystem\File;

//require __DIR__ . '/../../../../vendor/autoload.php';

/**
 * Class Controller
 * @package App\Containers\Admin\UI\WEB\Controllers
 */
class Controller extends WebController
{


    public function admintest(Request $request)
    {
        $path2 = base_path('/vendor/autoload.php');
        include("$path2");

        $message = ['test' => 'test','test1'=>'test1'];
        $structure = Configs_Class::helper()->php_to_node_structure(1,'driver',$message,'driver_request');

        $client = new Client(new Version2X('http://localhost:3001'));
        $client->initialize();
        $client->of('/php/user');
        $client->emit('transfer_msg', $structure);
        $client->close();

    }


    public function adminLoginPage(Request $request)
    {

        return view('layout::Login',['request' => $request]);

    }


    public function adminLockscreenPage(Request $request)
    {

        Cache::put('lockscreen'.$request->id,$request->id, 300);

        $emailAddress = session::get('emailAddress');
        $id = session::get('id');
        $name = session::get('name');
        $profilePicture = session::get('profilePicture');

        $array = array('id'=>$id,'name'=>$name,'emailAddress'=>$emailAddress,'profilePicture'=>$profilePicture);

        $result = (object)$array;


        return view('layout::Lock_screen',['result' => $result,'request' => $request]);


    }


    public function adminLoginValidation(Request $request)
    {

        $emailCheckNameSpace = 'App\Containers\Admin\Webtasks\LoginEmailValidationTask';

        $adminDetails = $this->call($emailCheckNameSpace, [$request['emailAddress'],$request['password'],$request['rememberMe']]);


        $id = $adminDetails['adminDetails']->id;

        $reteriveTaskNameSpace = 'App\Containers\Admin\Webtasks\ReteriveTask';

        $selectArray = array('block','login_attempt');

        $where = 'admin_id = '.$id;

        $AdminDetailsNameSpace = 'App\Containers\Admin\Models\AdminDetailsModel';

        $adminDetail = $this->call($reteriveTaskNameSpace, [$AdminDetailsNameSpace,$selectArray,$where]);

        if($adminDetail->block == 0)
        {

            throw new ValidationException((new Message()),redirect()->to('admin/login')
                ->withErrors([trans('localization::errors.you are blocked')], 'default'));
        }
        if($adminDetails['success'] == false )
        {

            $loginAttempt = $adminDetail->login_attempt;

            if( $loginAttempt == 5 )
            {
                $AdminDetailsNameSpace::where('admin_id',$id)->update(['block' => 0]);

            }
            else
            {
                $AdminDetailsNameSpace::where('admin_id',$id)->update(['login_attempt' => $loginAttempt+1 ]);

            }



            throw new ValidationException((new Message()),redirect()->to('admin/login')
                ->withErrors([trans('localization::errors.username or password invalid')], 'default'));

        }
        else if($adminDetails['success'] == true)
        {
            Cache::forget('lockscreen'.$id);
            Cache::put('lock'.$id,$adminDetails, 60);
            $AdminDetailsNameSpace::where('admin_id',$id)->update(['login_attempt' => 0 ]);



            return redirect()->route('dashboard',$id);

        }

    }



    public function dragdrop(Request $request)
    {

        $path = asset('privileges/dashboardMain.json');

        $all = $this->call(FileDecodeAction::class, [$path]);

        $path = asset('privileges/admin/admin' . $request->id . '.json');

        $selected = $this->call(FileDecodeAction::class, [$path]);


        if (!array_key_exists("dashboard", $selected)) {
            $selected['dashboard'] = null;
        }

        $unselected = $this->call(DragDropUnselectedAction::class, [$selected['dashboard'], $all]);



        return view('layout::DashboardDragDrop',['id' => $request->id, 'selected' => $selected, 'unselected' => $unselected, 'all' => $all]);
    }






    public function dashboard(Request $request)
    {


        $id = Session::get('id');


        $path = asset('privileges/dashboardMain.json');

        $all = $this->call(FileDecodeAction::class, [$path]);



        $adminspath = asset('privileges/admins/admin'.$id.'.json');

        $selected = $this->call(FileDecodeAction::class, [$adminspath]);

//        echo "<pre>";
//        print_r($all);
//
//        echo "<pre>";
//        print_r($selected);
//
//        die();



        if (!array_key_exists("dashboard", $selected) || $selected['dashboard'] == null)
        {

            $onlyNames = array();

            foreach ($all as $value)
            {
                $name = $value['name'];
                $onlyNames[$name] = $value['path'];
            }

            $selected = $onlyNames;
        }
        else
        {

            $selected = $selected['dashboard'];

            foreach ($all as $value)
            {

                foreach ($selected as $value2)
                {
                    if ($value2 == $value['name'])
                    {

                        $name = $value['name'];

                        $onlyNames[$name] = $value['path'];


                        // print_r($this->call('App\Containers\Admin\Webtasks\NoOfUsersTask',[]));

                    }
                }
            }

            $selected = $onlyNames;

        }
        $dashboardNameSpace = 'App\Containers\Admin\Webtasks\DashboardTask';
        $result = $this->call($dashboardNameSpace, [$selected]);



        //$path = asset('privileges/dashboardMain.json');

        //$all = $this->call(FileDecodeAction::class, [$path]);

        // $path = asset('privileges/type'.Session::get('role').'.json');

        //$selected = $this->call(FileDecodeAction::class, [$path]);

        if (!array_key_exists("dashboard", $selected))
        {
            // $selected['dashboard'] = $selected;
        }


        $unselected = $this->call(DragDropUnselectedAction::class, [$selected, $all]);

        // echo "<pre>";
        // print_r($all);
        // echo "<pre>";
        // print_r($selected);
        // echo "<pre>";
        // print_r($unselected);die();
        $page = "dashboard_module";

        $drivers=DriverModel::select('id','created_at')->orderBy('created_at','ASC')->get();

        $array=array();
        foreach($drivers as $key=>$value){

            $dates = date_create($value->created_at);
            $date=date_format($dates,"Y-m-d");

            $array[$date][]=$value->id;

        }





        $json=array();

        foreach($array as $akey=>$avalue) {

            $json[] = array('date'=>$akey,'count'=>count($avalue));
       }
//        echo "<pre>";
//        print_r($json);
       // $json = 1;


//        echo "<pre>";
//        print_r($result);die();

        return view('layout::Dashboard',['request'=>$request,'json'=>$json,'values'=>$result,'id' => $request->id, 'selected' => $selected, 'unselected' => $unselected, 'all' => $all,'page'=>$page]);
    }
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function adminViewPage(Request $request)
    {


        $page = GetConfigs::getConfigs('paginate');

        $request->session()->put('filter_type',"");
        $request->session()->put('filter_value',"");
        $user="";

        if($request->has('filter_type') && $request->has('filter_type'))
        {
            $user = $this->call(SearchTask::class, [$request]);

            if($request->submit && $request->submit == 'Download_Report')
            {
                // trans('localization::lang_view.s.no')

                $heading = array(
                    trans('localization::lang_view.firstname'),
                    trans('localization::lang_view.lastname'),
                    trans('localization::lang_view.email'),
                    trans('localization::lang_view.phone_number'),
                    trans('localization::lang_view.role'),
                    trans('localization::lang_view.status'));

                $key = array('firstname','lastname','email','phone_number','role','is_active');

                $title = trans('localization::lang_view.admin_report');

                $value = $user;
                $this->call(ReportDownloadTask::class, [$heading,$value,$key,$title]);


            }
        }
        else
        {
            $user = $this->call(AdminViewTask::class,[$request]);
        }

        $types =DB::table('AdminTypes')->paginate($page);
        $types =(object)$types;

        $title = trans('localization::title.admin');
        // $ =AdminModel::get();
        $page = "admin_module";
        return view('admin::AdminView',['result'=>$user,'types' =>$types,'request'=>$request, 'title'=>$title, 'page'=> $page]);

    }

    public function adminAddPage(Request $request)
    {
        $reterive_key =  ApiHelper::reterive_key();


        $types =DB::table('AdminTypes')->where('admin_reference',$reterive_key)->get();


        $timezone = json_decode(file_get_contents(public_path('timezones.json')),true);


        $language = CommonLanguageModel::select('id','short_lang','name')->get();



        $page = "admin_module";

        return view('admin::AdminAdd',['result'=>$timezone,'types' =>$types,'request'=>$request, 'page'=> $page ,'language'=>$language]);

    }


    public function adminAddSave(AdminAddRequest $request)
    {

        $user = $this->call(AdminAddSaveTask::class,[$request]);

        ApiHelper::put_area_name();

        $request->session()->flash('success', $user);

        return Redirect::to("/admin/view");

    }



    public function adminEdit(Request $request)
    {
        // echo "<pre>";print_r($request->id);die();
        $types =DB::table('AdminTypes')->get();

        $timezone = json_decode(file_get_contents(public_path('timezones.json')),true);

        $language = CommonLanguageModel::select('id','short_lang','name')->get();

        $admins =AdminModel::leftJoin('Admin_details', 'Admin.id', '=', 'Admin_details.admin_id')->where('admin_id',$request->id)->first();
        $page = "admin_module";
        return view('admin::AdminEdit',['request'=>$request,'result'=>$timezone,'types' =>$types,'admin'=>$admins, 'page'=> $page ,'language'=>$language]);

    }

    public function adminEditProfile(Request $request)
    {
        // echo "<pre>";print_r($request->id);die();



        $types =DB::table('AdminTypes')->get();

        $timezone = json_decode(file_get_contents(public_path('timezones.json')),true);

        $language = CommonLanguageModel::select('id','short_lang','name')->get();


        $admins =AdminModel::leftJoin('Admin_details', 'Admin.id', '=', 'Admin_details.admin_id')->where('admin_id',$request->id)->first();


        $page = "admin_module";
        return view('admin::AdminEditProfile',['request'=>$request,'result'=>$timezone,'types' =>$types,'admin'=>$admins,'page'=> $page ,'language'=>$language]);

    }


    public function adminProfileUpdate(AdminProfileUpdateRequest $request)
    {

        //echo "<pre>";print_r($request->all());die();

        Session::put('name',$request['firstName']." ".$request['lastName']);
        Session::put('emailAddress',$request['email']);


        $id=$request->id;
        $email=$request->email;
        $phone=$request->phone_number;

        $email_count = $this->call(EmailCheckTask::class, ["App\Containers\Admin\Models\AdminModel",$id,$email,'admin/edit/']);

        $phone_count = $this->call(PhoneCheckTask::class, ["App\Containers\Admin\Models\AdminModel",$id,$phone,"phone_number",'admin/edit/']);

        if($email_count==0 && $phone_count==0)
        {
            $user = $this->call(AdminProfileUpdateTask::class,[$request]);
        }


        $request->session()->flash('success', $user);

        return Redirect::to("/admin/dashboard");

    }
    public function adminUpdate(AdminAddRequest $request)
    {




        Session::put('name',$request['firstName']." ".$request['lastName']);
        Session::put('emailAddress',$request['email']);
        Session::put('role',$request['role']?$request['role']:Session::get('role'));

        $id=$request->id;
        $email=$request->email;
        $phone=$request->phone_number;
        $emergency=$request->emergency_number;

        $email_count = $this->call(EmailCheckTask::class, ["App\Containers\Admin\Models\AdminModel",$id,$email,'/admin/edit/']);

        $phone_count = $this->call(PhoneCheckTask::class, ["App\Containers\Admin\Models\AdminModel",$id,$phone,"phone_number",'/admin/edit/']);

        $emergency_count = $this->call(PhoneCheckTask::class, ["App\Containers\Admin\Models\AdminModel",$id,$emergency,"emergency_number",'/admin/edit/']);

        if($email_count==0 && $phone_count==0 && $emergency_count==0) {
            $user = $this->call(AdminUpdateTask::class,[$request]);
        }

        ApiHelper::put_area_name();

        $request->session()->flash('success', $user);

        return Redirect::to("/admin/view");

    }

    public function adminPasswordChange(Request $request)
    {
        $page = "admin_module";

        $title = trans('localization::title.admin');

        return view('admin::AdminPasswordEdit',['request'=>$request,'page'=> $page ,'title'=>$title]);

    }

    public function adminPasswordUpdate(Request $request)
    {
        //echo "<pre>";print_r($request->id);print_r($request->all());die();

        $use =AdminModel::where('id',$request->id)->first();

        $use->password = Hash::make($request->password);

        $use->save();

        $result= array('success'=>"TRUE",'message'=>trans('localization::errors.password_changed_successfully'));
        $request->session()->flash('success', $result);

        return Redirect::to("/admin/view");

    }

    public function adminDelete(Request $request)
    {
        $data=AdminModel::where('id',$request->id)->update(['deleted_at' => date("Y-m-d h:i:s")]);
        $data=AdminDetailsModel::where('id',$request->id)->update(['deleted_at' => date("Y-m-d h:i:s")]);
        //$user = $this->call(AdminUpdateTask::class,[$request]);
        $result= array('success'=>"TRUE",'message'=>trans('localization::errors.admin_deleted_successfully'));

        $request->session()->flash('success', $result);

        return Redirect::to("/admin/view");

    }

    public function adminActive(Request $request)
    {
        $data=AdminModel::where('id',$request->id)->update(['is_active' => 1]);

        Session::put('isActive',1);

        $result= array('success'=>"TRUE",'message'=>trans('localization::errors.admin_active_successfully'));

        $request->session()->flash('success', $result);

        return Redirect::to("/admin/view");

    }

    public function adminInactive(Request $request)
    {
        $data=AdminModel::where('id',$request->id)->update(['is_active' =>0]);

        Session::put('isActive',0);

        $result= array('success'=>"TRUE",'message'=>trans('localization::errors.admin_inactive_successfully'));

        $request->session()->flash('success', $result);

        return Redirect::to("/admin/view");

    }

    public function adminUserPrivilegesEdit(Request $request)
    {
        //echo "<pre>";print_r($request->id);die();
        $admin_id=$request->id;

        if(file_exists(public_path('/privileges/layout.json'))){
            $layout = json_decode(file_get_contents(public_path('/privileges/layout.json')),true);
        }else{
            $obj = fileExists::fileCreate();
            $layout = json_decode(file_get_contents(public_path('/privileges/layout.json')),true);
        }


        if(file_exists(public_path('/privileges/admins/admin'.$admin_id.'.json'))){

            $user_file = json_decode(file_get_contents(public_path('/privileges/admins/admin'.$admin_id.'.json')),true);


        }else{
            $user_file = [];
        }

        $page = "admin_module";
        return view('admin::AdminUserPrivilegesEdit',['id' =>$request->id,'request'=>$request,'array' => $layout ,'user_permissions' => $user_file, 'page'=> $page]);
    }


    public function adminUserPrivilegesUpdate(Request $request)
    {
        $type_privilege = (array)$request->all();

        //echo"<pre>"; print_r($type_privilege);die();

        $result = array();
        $result['module']= [];
        $result['sub_module']= [];
        foreach ($type_privilege as $key=>$value)
        {
            if(strpos($key,'_module'))
            {
                $result['module'][]= $key;
            }

            if (strpos($key,'dmin/'))
            {
                $result['sub_module'][]= $value;
            }

        }
        $admin_id=$request->id;
        file_put_contents(public_path('/privileges/admins/admin'.$admin_id.'.json'),json_encode($result));
        //echo"<pre>"; print_r(json_encode($result));die();

        $key = rand(111,999);
        $key .= $admin_id;
        $array = array('key'=> $key,'hash'=>$key);
        Cache::put('cacheMemory'.$admin_id,$array, 60);
        
        $success= array('success'=>"TRUE",'message'=>trans('localization::errors.admin_privilege_set_successfully'));

        $request->session()->flash('success', $success);

        return Redirect::to('/admin/view');

    }


    public function adminTypesView(Request $request)
    {
        $page = GetConfigs::getConfigs('paginate');

        $title = trans('localization::title.admin_role');

       // $role = Session::get('role');

       // $result =DB::table('AdminTypes')->paginate($page);


        $reterive_key =  ApiHelper::reterive_key();


        if($reterive_key == 0 )
        {
            $result =DB::table('AdminTypes')->orderBy('id','desc')->paginate($page);
        }
        else
        {

            $result = DB::table('AdminTypes')
                ->where('admin_reference',$reterive_key)->orderBy('id','desc')->paginate($page);

        }



        $page = "role_module";
        return view('admin::AdminTypesView',['request' => $request],['result' => $result,'title'=>$title, 'page'=> $page]);
    }

    /**
     *
     */
    public function adminTypesAdd(Request $request)
    {
        $page = "role_module";

        $role_admins = AdminModel::where('role',99999)->where('is_active',1)->get();

        $reterive_key =  ApiHelper::reterive_key();


        if($reterive_key != 0 )
        {
            $role_admin_key = $reterive_key;
        }
        else
        {
            $role_admin_key = 0;
        }

        return view('admin::AdminTypesAdd',['request' => $request,'role_admins'=>$role_admins,'role_admin_key'=>$role_admin_key, 'page'=> $page]);
    }

    /**
     *
     */
    public function adminTypesSave(AdminPrivilegeNameEditRequest $request)
    {
        //echo $request->type_name;

        $result =new AdminTypesModel();
        $result->types = $request->type_name;

        $admin_key = $request->roleAdmin;

        $result->admin_reference = $admin_key;
        $result->save();

        if($result->save()){
            $array=array('module'=>array(),'sub_module'=>array());
            file_put_contents(public_path('/privileges/type'.$result->id.'.json'),json_encode($array));
        }


        ApiHelper::putAreaName();




        $result= array('success'=>"TRUE",'message'=>trans('localization::errors.admin_role_added_successfully'));

        $request->session()->flash('success', $result);

        return Redirect::to('/admin/typesView');

    }


    public function adminTypesNameEdit(Request $request)
    {
        $result =DB::table('AdminTypes')->where('id',$request->id)->first();



        //print_r($result->types); die(" name_change");
        $result=(object)$result;
        $page = "role_module";
        return view('admin::AdminTypesNameEdit',['request'=>$request,'result' => $result, 'page'=> $page]);

    }


    public function adminTypesNameSave(AdminPrivilegeNameEditRequest $request)
    {

        $result = AdminTypesModel::where('id','=',$request->id)->first();

        // echo"<pre>";print_r($result);die();
        if($result->types == $request->type_name){
            $count=0;
        }else{
            $old =  AdminTypesModel::where('types','=',$request->type_name)->first();

            $count=count($old);

            if($count>0){
                throw new ValidationException((new \App\Containers\Admin\Webtasks\Message()),redirect()->to('/admin/typeNameEdit/'.$request->id)
                    ->withErrors([trans('localization::errors.role_name_already_exits')], 'default'));
            }

        }

        if($count == 0){
            $result->types = $request->type_name;
        }

        $result->save();
        //$result =DB::table('AdminTypes')->where('id',$request->id)->update(array('types' => $request->type_name));


        ApiHelper::putAreaName();

        $success= array('success'=>"TRUE",'message'=>trans('localization::errors.admin_role_updated_successfully'));

        $request->session()->flash('success', $success);

        return Redirect::to('/admin/typesView');//,['request' => $request],['result' => $result,'title'=>$title ]);
    }



    public function adminTypePrivilegesEdit(Request $request)
    {
        $result =DB::table('AdminTypes')->where('id',$request->id)->first();


        if(file_exists(public_path('/privileges/layout.json'))){
            $layout = json_decode(file_get_contents(public_path('/privileges/layout.json')),true);
        }else{
            $obj = fileExists::fileCreate();
            $layout = json_decode(file_get_contents(public_path('/privileges/layout.json')),true);
        }


        if(file_exists(public_path('/privileges/admins/admin'.$result->id.'.json'))){

            $user_file = json_decode(file_get_contents(public_path('/privileges/type'.$result->id.'.json')),true);

        }else{
            $user_file = "";
        }

        $page = "role_module";
        return view('admin::AdminTypesPrivilegeEdit',['request'=>$request, 'result' => $result,'array' => $layout ,'user_permissions' => $user_file, 'page'=> $page]);
    }




    public function adminTypePrivilegesSave(Request $request)
    {

        $type_privilege = (array)$request->all();



        $result = array();
        $result['module']=[];
        $result['sub_module']=[];
        foreach ($type_privilege as $key=>$value)
        {

            if(strpos($key,'_module'))
            {
                $result['module'][]= $key;
            }


            if (strpos($key,'dmin/'))
            {
                $result['sub_module'][]= $value;
            }


        }
        //echo"<pre>";print_r($result);die();

        file_put_contents(public_path('/privileges/type'.$type_privilege['admin_type'].'.json'),json_encode($result));
        //echo"<pre>"; print_r(json_encode($result));die();
        $result= array('success'=>"TRUE",'message'=>trans('localization::errors.admin_role_privilege_set_successfully'));

        $request->session()->flash('success', $result);

        return Redirect::to('/admin/typesView');//,['request' => $request],['result' => $result,'title'=>$title ]);
    }


    public function mapView()
    {

        $adminDetails = $this->call('App\Containers\Drivers\Webtasks\DriverDetailsMapTask');
        //echo "<pre>";print_r($adminDetails);die();

        $title = trans('localization::lang_view.map_view');

        $page = "map_module";
        return view('admin::MapView',['value'=>$adminDetails,'title'=>$title,'page'=>$page]);

    }

    public function mapView2()
    {

        $adminDetails = $this->call('App\Containers\Drivers\Webtasks\DriverDetailsMapTask');

        $title = trans('localization::lang_view.map_view');

        $page = "map";
        return view('admin::MapView2',['value'=>$adminDetails,'title'=>$title,'page'=>$page]);

    }


    public function mapAjax()
    {

        $adminDetails = $this->call('App\Containers\Drivers\Webtasks\DriverDetailsMapTask');

        $types = Types::select('*')->get();

        $array = array();
        $array2 = array();

        foreach($adminDetails as $value)
        {
            $array2['name']         = $value->firstname.' '.$value->lastname;
            $array2['latitude']     = $value->latitude;
            $array2['longitude']    = $value->longitude;
            $array2['is_available'] = $value->is_available;
            $array2['phone'] = $value->phone_number;

            foreach ($types as $names){
                if($value->type == $names['id']){
                    $type=$names['name'];
                }

            }

            $array2['type'] = $type;
            $array[] = $array2;
        }

        return $array;
    }
    public function mapAjax2()
    {

        $adminDetails = $this->call('App\Containers\Drivers\Webtasks\DriverDetailsMapTask');

        return $adminDetails;
    }

    public function dynamicLocalization()
    {
        $name = 'UserRegisterationMail';

        $fileName = $name.'.php';

        $filePath = base_path("app/Containers/Localization/Resources/Languages/en/$fileName");

        $myArray = include $filePath;



        header('Content-Type: text/csv; charset=utf-8');

        header("Content-Disposition: attachment; filename = $name.csv");

        $handle = fopen('php://output', 'w');


//        fputcsv($handle, array('id','name', 'email'));


        foreach ($myArray as $key=>$value)
        {

            fputcsv($handle,array($value));

        }
        fclose($handle);


        $headers = array(
            'Content-Type' => 'text/csv',
        );

        die();


    }


    public function excelToArray()
    {
        require_once 'PHPExcel/IOFactory.php';
        $file_info = pathinfo($_FILES["result_file"]["name"]);
        $file_directory = "assets/upload/";
        $new_file_name = date("dmY").time().$_FILES["result_file"]["name"];
        if(move_uploaded_file($_FILES["result_file"]["tmp_name"], $file_directory . $new_file_name))
        {
            $file_type	= PHPExcel_IOFactory::identify($file_directory . $new_file_name);
            $objReader	= PHPExcel_IOFactory::createReader($file_type);
            $objPHPExcel = $objReader->load($file_directory . $new_file_name);
            $sheet_data = $objPHPExcel->getActiveSheet()->toArray(null, True, True, True);
            print_r($sheet_data);
        }
    }
    public function reterive_key_change(Request $request)
    {

        $key = $request->key;

        Session::put('reterive_key',$key);
        $result= array('success'=>"TRUE",'message'=>trans('localization::errors.role_changed'));

        $request->session()->flash('success', $result);
        return redirect()->back();


    }
}

