<?php

namespace App\Containers\Company\UI\WEB\Controllers;

use App\Containers\Common\ApiHelper;
use App\Containers\Admin\Models\AdminModel;
use App\Containers\Admin\Webtasks\Message;
use App\Containers\Company\Models\CompanyAccountModel;
use App\Containers\Common\Configs_Class;
use App\Containers\Drivers\Models\DriverDetailModel;
use App\Containers\Drivers\Models\DriverPaidModel;
use App\Containers\Jobs\SendEmailJob;
use App\Containers\Types\Models\Types;
use App\Ship\Parents\Controllers\WebController;

use Braintree\MerchantAccount;
use Illuminate\Http\Request;
use App\Containers\Company\Webtasks\CompanyLoginEmailValidationTask;
use App\Containers\Email\Actions\ToggleStatusAction;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Containers\Company\Models\CompanyModel;

use App\Containers\Company\Webtasks\ToggleStatusTask;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Containers\Company\Webtasks\ReportDownloadTask;

use App\Containers\Company\Webtasks\StatusConvertTask;

use App\Containers\Company\UI\WEB\Requests\CompanyAddRequest;

// use Illuminate\Support\Facades\Hash;

use App\Containers\Common\GetConfigs;

use App\Containers\Company\Webtasks\UploadDocumentTask;

use App\Containers\Company\Webtasks\DynamicEmailValidationTask;

use App\Containers\Company\Webtasks\SessionBulkTask;

use App\Containers\Company\Webtasks\DynamicPasswordValidationTask;

use App\Containers\Company\Webtasks\CompanyDriverDetailsTask;

use App\Containers\Admin\Webtasks\SessionKeyTask;


use Illuminate\Support\Facades\Cache;

use App\Containers\Company\Webtasks\SaveLoginIpTask;

use App\Containers\Drivers\Models\DriverModel;
use App\Containers\Request\Models\RequestModel;

use App\Containers\User\Models\Country;

use App\Containers\Drivers\Models\DriverTypeModel;

use App\Containers\Drivers\Models\DriverDocument;

use App\Containers\Company\Webtasks\IsActiveTask;
use Illuminate\Validation\ValidationException;
use App\Containers\Drivers\Webtasks\DriverIncomeTask;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Containers\Drivers\Models\DriverAccountModel;





/**
 *
 */
class Controller extends WebController
{
    use SoftDeletes;

    //company

    public function createCompanyAccount(Request $request)
    {
        // echo "<pre>";print_r($request->driver_id);die();
        $title = trans('localization::title.company');
        $page = "company_module";
        $country=Country::select('*')->get();

        return view('company::CompanyAddAccount',['request'=>$request ,'country_array' => $country, 'title'=>$title, 'page'=> $page]);


    }

    public function saveCompanyAccount(Request $request)
    {
        //echo "<pre>";print_r($request->all());die();
        $company_accId = "company".rand(111,999).date('md').$request->company_id;

        Cache::put('acc_firstname',$request->firstName,1);
        Cache::put('acc_lastname',$request->lastName,1);
        Cache::put('acc_email',$request->email,1);
        Cache::put('acc_phone',$request->phone_number,1);
        Cache::put('acc_dob',$request->dob,1);
        Cache::put('acc_ssn',$request->ssn,1);
        Cache::put('acc_address',$request->address,1);
        Cache::put('acc_city',$request->city,1);
        Cache::put('acc_region',$request->region,1);
        Cache::put('acc_postalCode',$request->postal_code,1);
        Cache::put('acc_accountNumber',$request->acc_number,1);
        Cache::put('acc_routingNumber',$request->ifsc,1);


        if($request->tos == "on"){
            $tos = true;
        }else{
            $tos = false;
        }

        $merchantAccountParams = [
            'individual' => [
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'email' => $request->email,
                'phone' => $request->phone_number,
                'dateOfBirth' => $request->dob,
                'ssn' => $request->ssn,
                'address' => [
                    'streetAddress' => $request->address,
                    'locality' => $request->city,
                    'region' => $request->region,
                    'postalCode' => $request->postal_code
                ]
            ],
//              'business' => [
//                  'legalName' => 'Jane\'s Ladders',
//                  'dbaName' => 'Jane\'s Ladders',
//                  'taxId' => '98-7654321',
//                  'address' => [
//                      'streetAddress' => '111 Main St',
//                      'locality' => 'Chicago',
//                      'region' => 'IND',
//                      'postalCode' => '60622'
//                  ]
//              ],
            'funding' => [
                'descriptor' => 'Blue Ladders',
                'destination' => MerchantAccount::FUNDING_DESTINATION_BANK,
                'email' => $request->email,
                'mobilePhone' => $request->phone_number,
                'accountNumber' => $request->acc_number,
                'routingNumber' => $request->ifsc
            ],
            'tosAccepted' => $tos,
            'masterMerchantAccountId' => "ganeshOwner",
            'id' => $company_accId
        ];
        $result = MerchantAccount::create($merchantAccountParams);


        if($result->success==true)
        {
            //echo "<pre>";print_r($result);die();
            $companyAcc = new CompanyAccountModel();

            $companyAcc->company_id = $request->company_id;
            $companyAcc->company_acc_id = $company_accId;
            $companyAcc->firstname = $request->firstName;
            $companyAcc->lastname = $request->lastName;
            $companyAcc->email = $request->email;
            $companyAcc->phone = $request->phone_number;
            $companyAcc->dob = $request->dob;
            $companyAcc->ssn = $request->ssn;
            $companyAcc->streetAddress = $request->address;
            $companyAcc->locality = $request->city;
            $companyAcc->region = $request->region;
            $companyAcc->postalCode = $request->postal_code;
            $companyAcc->tosAccepted = $tos;
            $companyAcc->account_number = $request->acc_number;
            $companyAcc->routing_number = $request->ifsc;

            $companyAcc->save();

            $company = CompanyModel::where('id',$request->company_id)->update(['account_present'=>1]);

            $response= array('success'=>"TRUE",'message'=>trans('localization::errors.company_account_added_successfully'));
            $request->session()->flash('success',$response);

            return Redirect::to("/admin/company/view");
        }else{
            //echo "<pre>";print_r($result);die();
            $errors = explode("\n",$result->message);

            throw new ValidationException((new Message()),redirect()->to('admin/company/addAccount/'.$request->company_id)
                ->withErrors([$errors[0]], 'default'));
        }


    }

    public function adminCompanyDeleteAccount(Request $request)
    {
        CompanyAccountModel::where('company_id',$request->company_id)->delete();

        $company=CompanyModel::where('id',$request->company_id)->update(['account_present' => 0]);

        $result= array('success'=>"TRUE",'message'=>trans('localization::errors.company_account_deleted_successfully'));

        $request->session()->flash('success', $result);

        return Redirect::to("/admin/company/view");
    }




    public function companyLoginPage(Request $request)
    {
        Session::forget('company_id');
        Session::forget('company_registration_code');
        Session::forget('company_name');
        Session::forget('company_owner_name');
        Session::forget('company_email');
        Session::forget('company_status');
        Session::forget('company_profile_pic');
        Session::forget('companySessionMemory');
        Session::forget('company_remember_token');

        return view('company::Login',['request' => $request]);
    }

    public function companyLoginValidation(Request $request)
    {

        $emailAddress = $request['emailAddress'];
        $userTypedPassword = $request['password'];

        $tableNameSpace = 'App\Containers\Company\Models\CompanyModel';
        $select = array('id','registration_code','company_name','name','email','status','password','profile_pic','block','login_attempt');
        $where = "`email` = '$emailAddress'";

        $routeName = 'company/login';
        $value = $this->call(DynamicEmailValidationTask::class, [$emailAddress,$tableNameSpace,$select,$where,$routeName]);

        $this->call(IsActiveTask::class, [$value->block,0,'company/login','your are blocked']);

        $this->call(IsActiveTask::class, [$value->status,1,'company/login','you are inactive']);

        $hashedPassword = $value->password;

        $failedRoute = 'company/login';
        // password validation

        $block = array('App\Containers\Company\Models\CompanyModel',$value['login_attempt'],$value->id);
        $this->call(DynamicPasswordValidationTask::class, [$userTypedPassword,$hashedPassword,$failedRoute,$block]);

        //    Session::flush();
        // session
        $names = array('company_id','company_registration_code','company_name','company_owner_name','company_email','company_status','company_profile_pic');

        $keys = array('id','registration_code','company_name','name','email','status','profile_pic');

        $this->call(SessionBulkTask::class, [$value,$keys,$names]);

        $tablename  = 'App\Containers\Company\Models\CompanyModel';
        $columnName = 'last_login_ip_address';

        $this->call(SaveLoginIpTask::class,[$tablename,$columnName]);

        $sessionKey  = $this->call(SessionKeyTask::class);
        $key = rand(111,999);
        $key .= $value->id;
        $array = array('key'=> $key,'hash'=>$sessionKey);



        Cache::forget('companyCacheMemory'.$value->id);
        Session::put('companySessionMemory',$array);


        if($request->has('rememberMe'))
        {
            CompanyModel::where('id', '=', $value->id)->update(['remember_token' => $sessionKey]);

        }
        else
        {
            Cache::put('companyCacheMemory'.$value->id,$array, 60);
        }


        if(Session::has('company_link'))
        {
            $path = Session::get('company_link');
            Session::forget('company_link');
            header("Location: $path");
            die();
        }
        else
        {
            //redirect to dashboard
            return redirect()->route('companyDashboard');
        }


    }

    public function companyDashboard(Request $request)
    {



        //die("dashboard");
        $companyID = Session::get('company_id');

        $totalDrivers = DriverDetailModel::where('company',$companyID)->count();

        $query = RequestModel::join('Driver_Details','request.driver_id','=','Driver_Details.driver_id')
            ->select('request.id','request.is_completed','request.is_cancelled')
            ->where('Driver_Details.company',$companyID);

        $query1 = RequestModel::join('Driver_Details','request.driver_id','=','Driver_Details.driver_id')
            ->select('request.id','request.is_completed','request.is_cancelled')
            ->where('Driver_Details.company',$companyID);

        $totalRequest = $query->count();

        $completedRequest = $query->where('request.is_completed',1)->count();

        $cancelledRequest = $query1->where('request.is_cancelled',1)->count();

        $inProgressRequest = $totalRequest - ($completedRequest+$cancelledRequest);

        $result = array('totalDriver'=>$totalDrivers,'totalRequest'=>$totalRequest,'completed'=>$completedRequest,'cancelled'=>$cancelledRequest,'pending'=>$inProgressRequest);
        //$inProgressRequest = count($query->where('request.is_completed',0)->where('request.is_cancelled',0)->get());
        /*
                   echo "<pre>";
                   print_r('total : '.$totalRequest);
                   print_r('<br>complete : '.$completedRequest);
                   print_r('<br>cancel : '.$cancelledRequest);
                  // print_r('<br>pending : '.$inProgressRequest);

                   die();*/

        return view('company::CompanyDashboard',['request' => $request,'result' => $result,'page' => "dashboard_module"]);


    }


    public function companyBlockToogle(Request $request)
    {
        CompanyModel::where('id',$request->id)
            ->update(['block'=>1]);

        $array = array('success'=>'false','message'=>trans("localization::lang_view.unblocked_successfully"));

        $request->session()->flash('success', $array);

        return redirect()->route('companyView');



    }


    public function companyDriverView(Request $request)
    {

        $page = GetConfigs::getConfigs('paginate');

        $request->session()->put('filter_type',"");
        $request->session()->put('filter_value',"");
        $user="";

        if($request->has('filter_type') && $request->has('filter_type'))
        {

            $user = $this->call(CompanyDriverDetailsTask::class, [$request]);

            if($request->submit && $request->submit == 'Download_Report')
            {

                $heading = array(
                    trans('localization::lang_view.driver_name'),

                    trans('localization::lang_view.email'),
                    trans('localization::lang_view.phone_number'),
                    trans('localization::lang_view.type'),
                    trans('localization::lang_view.status'));

                $key = array('driver_name','email','phone_number','type','is_approve');

                $title = trans('localization::lang_view.driver_report');

                $value = $user;

                // echo "<pre>";
                // print_r($value);
                // die();
                $this->call(ReportDownloadTask::class, [$heading,$value,$key,$title]);


            }
        }
        else
        {
            $user = $this->call(CompanyDriverDetailsTask::class, [$request]);
        }


        $title = trans('localization::title.driver');
        $page = "driver_module";

        return view('company::CompanyDriverView',['result'=>$user,'request'=>$request, 'title'=>$title, 'page'=> $page]);
    }


    public function companyDriverToogleStatus(Request $request)
    {

        $id = $request->id;

        $status = $request->status;

        $tableName = 'App\Containers\Drivers\Models\DriverModel';
        $columnName = 'is_approve';
        $value = $request->status;
        $whereId = $request->id;
        $company = true;
        $this->call(ToggleStatusTask::class, [$tableName,$columnName,$value,$whereId,$company]);

        // $this->call(ToggleStatusTask::class, [$tableName,$columnName,$value,$whereId]);


        return redirect()->route('companyDriverView');


    }

    public function deleteCompanyDriver(Request $request)
    {
        DriverModel::where('id',$request->id)->delete();

        return redirect()->route('companyDriverView');
    }

    public function addCompanyDriver(Request $request)
    {


        $title = trans('localization::title.driver');

        $page = "driver_module";

        $driver_types = DriverTypeModel::select('*')->get();

        $country=Country::select('*')->get();

        return view('company::CompanyDriverAdd', ['request' => $request, 'country_array' => $country, 'types' => $driver_types, 'title' => $title, 'page' => $page]);

    }

    public function editCompanyDriver(Request $request)
    {

        $title = trans('localization::title.driver');

        $page = "driver_module";

        $driver = DriverModel::leftJoin('Driver_Details', 'Drivers.id', '=', 'Driver_Details.driver_id')->where('driver_id',$request->id)->first();

        $driver_documents = DriverDocument::where('driver_id',$request->id)->get();

        $driver_types = DriverTypeModel::select('*')->get();

        $country=Country::select('*')->get();

        return view('company::CompanyDriverEdit', ['request' => $request,'driver' => $driver,'driver_documents' => $driver_documents, 'country_array' => $country, 'types' => $driver_types, 'title' => $title, 'page' => $page]);

    }


    // admin
    public function companyView(Request $request)
    {

        $page = GetConfigs::getConfigs('paginate');

        $request->session()->put('filter_type',"");
        $request->session()->put('filter_value',"");
        $request->session()->put('status_value',"");

        $type = CompanyModel::select('id','account_present','admin_reference','company_name','name','status','block');//

        $reterive_key =  ApiHelper::reterive_key();

        if($reterive_key != 0 )
        {

            $type= $type->where('admin_reference',$reterive_key);

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

        if(($request->has('filter_value1')  || $request->has('filter_value2') ) && $request->has('filter_type'))
        {


            $filter_type =  $request['filter_type'];

            if($filter_type == 'status')
            {
                $types = $types->where($filter_type,$request['filter_value']);

                $request->session()->put('status_value',$request['filter_value']);

            }
            else
            {
                $types = $types->where($filter_type,'like','%'.$request['filter_value'].'%');
            }

            $request->session()->put('filter_type',$request['filter_type']);

            $request->session()->put('filter_value',$request['filter_value']);


            if($request->submit && $request->submit == 'Download_Report')
            {
                if($request->filter_type == 'company_name' && $request->filter_value == 0)
                {
                    $value = $reportValue;
                }
                else
                {
                    $value = $types->orderBy('id','desc')->get();
                }


                $heading = array(
                    trans('localization::lang_view.company_name'),
                    trans('localization::lang_view.name'),
                    trans('localization::lang_view.status'),
                    trans('localization::lang_view.blocked/unblocked'));

                $key = array('company_name','name','status','block');

                $title = 'Company_report';


                $this->call(ReportDownloadTask::class, [$heading,$value,$key,$title]);

            }
        }
        else if($request['filter_value'] == '' && $request->has('filter_type'))
        {
            $filter_type =  $request['filter_type'];

            $types = $types->where($filter_type,$request['filter_value'])->orderBy($filter_type,'desc');

        }
        else
        {
            $types = $types->orderBy('id','desc');

        }

        $types = $types->paginate($page);


        $user = (object)$types;

        $title = trans('localization::title.company');
        $page="company_module";
        return view('company::CompanyView',['result'=>$user,'types' =>$types,'request'=>$request, 'title'=>$title,'page'=>$page]);

    }

    public function companyStatusToogle(Request $request)
    {
        $tableName = 'App\Containers\Company\Models\CompanyModel';
        $columnName = 'status';
        $value = $request->status;
        $whereId = $request->id;
        $company = true;
        $this->call(ToggleStatusTask::class, [$tableName,$columnName,$value,$whereId,$company]);

        return redirect()->route('companyView');
    }

    public function deleteCompany(Request $request)
    {

        CompanyModel::where('id',$request->id)->delete();

        return redirect()->route('companyView');
    }

    public function editCompany(Request $request)
    {
        $company_admins = AdminModel::where('role',99999)->where('is_active',1)->get();

        $reterive_key =  ApiHelper::reterive_key();

        if($reterive_key != 0 )
        {
            $company_admin_key = $reterive_key;
        }else{
            $company_admin_key = 0;
        }

        $array = array('id','company_name','admin_reference','document_name','document_url','name','email','address','phone_number','landline_number','vat','state','zipcode','country','profile_pic');

        $value = CompanyModel::select($array)->where('id',$request->id)->first();

        $title = trans('localization::title.company');
        $page="company_module";

        return view('company::CompanyEdit',['company_admins' => $company_admins,'company_admin_key' => $company_admin_key,'request'=>$request,'title'=>$title,'value'=>$value, 'page'=>$page]);

    }


    public function editCompanyProfile(Request $request)
    {
        $array = array('id','company_name','document_name','document_url','name','email','address','phone_number','landline_number','vat','state','zipcode','country','profile_pic');

        $value = CompanyModel::select($array)->where('id',$request->id)->first();

        $title = trans('localization::title.company');
        $page="company_module";

        return view('company::CompanyProfileEdit',['request'=>$request,'title'=>$title,'value'=>$value, 'page'=>$page]);
    }

    public function companyUpdate(CompanyAddRequest $request)
    {


        $columnName =  array('document_name'=>$request['document_name'],'vat'=>$request['vat'],'landline_number'=>$request['landline_number'],'company_name'=>$request['company_name'],'name'=>$request['name'],'email'=>$request['email'],'address'=>$request['address'],'phone_number'=>$request['phone_number'],'state'=>$request['state'],'zipcode'=>$request['pincode'],'country'=>$request['country']);

        CompanyModel::where('id',$request->id)
            ->update($columnName);

        $id = $request->id;
        if ($request->hasFile('document'))
        {
            $tableName = 'App\Containers\Company\Models\CompanyModel';

            $uploadColumnName = 'document_url';
            $redirectPath = 'companyView';
            $fileName = 'document';
            $this->call(UploadDocumentTask::class,[$request,$fileName,$tableName,$id,$uploadColumnName,$redirectPath]);

        }

        if ($request->hasFile('profile_pic'))
        {

            $tableName = 'App\Containers\Company\Models\CompanyModel';
            $uploadColumnName = 'profile_pic';
            $redirectPath = 'companyView';
            $this->call(UploadDocumentTask::class,[$request,'profile_pic',$tableName,$id,$uploadColumnName,$redirectPath]);
        }


        $array = array('success'=>'false','message'=>trans("localization::lang_view.updated_successfully"));

        $request->session()->flash('success', $array);

        return redirect()->route('companyView');
    }

    public function updateCompanyProfile(CompanyAddRequest $request)
    {
        //die("test");
        $columnName =  array('vat'=>$request['vat'],'landline_number'=>$request['landline_number'],'company_name'=>$request['company_name'],'name'=>$request['name'],'email'=>$request['email'],'address'=>$request['address'],'phone_number'=>$request['phone_number'],'state'=>$request['state'],'zipcode'=>$request['pincode'],'country'=>$request['country']);

        CompanyModel::where('id',$request->id)
            ->update($columnName);

        $id = $request->id;

        if ($request->hasFile('profile_pic'))
        {

            $tableName = 'App\Containers\Company\Models\CompanyModel';
            $uploadColumnName = 'profile_pic';
            $redirectPath = 'companyView';
            $this->call(UploadDocumentTask::class,[$request,'profile_pic',$tableName,$id,$uploadColumnName,$redirectPath]);
        }
        Session::forget('company_profile_pic');
        $companyDetails = CompanyModel::where('id',$request->id)->first();
        Session::put('company_profile_pic',$companyDetails->profile_pic);

        $array = array('success'=>'false','message'=>trans("localization::errors.profile_updated_successfully"));

        $request->session()->flash('success', $array);

        return redirect()->route('companyDashboard');
    }

    public function addCompanyPage(Request $request)
    {
        $company_admins = AdminModel::where('role',99999)->where('is_active',1)->get();

        $reterive_key =  ApiHelper::reterive_key();

        if($reterive_key != 0 )
        {
            $company_admin_key = $reterive_key;
        }else{
            $company_admin_key = 0;
        }

        $array = array('id','company_name','email','address','phone_number','state','zipcode','country','admin_reference');

        $value = CompanyModel::select($array)->where('id',$request->id)->first();

        $title = trans('localization::title.company');
        $page="company_module";

        return view('company::CompanyAdd',['company_admins' => $company_admins,'company_admin_key' => $company_admin_key,'request'=>$request,'title'=>$title,'value'=>$value, 'page'=>$page]);


    }

    public function registerCompany(CompanyAddRequest $request)
    {

        re:
        $year =  date("Y");
        $fourDigitNo = rand ( 1000 , 9999 );
        $registrationCode =  $year. $fourDigitNo;

        $toCount = CompanyModel::select('registration_code')
            ->where('registration_code',$registrationCode)->first();

        if( count($toCount) >= 1 )
        {
            goto re;
        }



        $flight = new CompanyModel;
        $flight->company_name       =   $request['company_name'];
        $flight->admin_reference    =   $request['companyAdmin'];
        $flight->registration_code  =   $registrationCode;
        $flight->name               =   $request['name'];
        $flight->email              =   $request['email'];
        $flight->phone_number       =   $request['phone_number'];
        $flight->landline_number    =   $request['landline_number'];
        $flight->vat                =   $request['vat'];
        $flight->password           =   Hash::make($request['password']);
        $flight->status             =   0;
        $flight->document_name      =   $request['document_name'];
        $flight->address            =   $request['address'];
        $flight->state              =   $request['state'];
        $flight->country            =   $request['country'];
        $flight->zipcode            =   $request['pincode'];
        $flight->save();

        $id = $flight->id;

        if ($request->hasFile('document'))
        {
            $tableName = 'App\Containers\Company\Models\CompanyModel';

            $uploadColumnName = 'document_url';
            $redirectPath = 'companyView';
            $fileName = 'document';
            $this->call(UploadDocumentTask::class,[$request,$fileName,$tableName,$id,$uploadColumnName,$redirectPath]);
        }

        if ($request->hasFile('profile_pic'))
        {
            $tableName = 'App\Containers\Company\Models\CompanyModel';
            $uploadColumnName = 'profile_pic';
            $redirectPath = 'companyView';
            $this->call(UploadDocumentTask::class,[$request,'profile_pic',$tableName,$id,$uploadColumnName,$redirectPath]);
        }

        $array = array('success'=>'false','message'=>trans("localization::lang_view.registered_successfully"));


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


        $email = Configs_Class::helper()->email(9,$lang);

        $company = Configs_Class::helper()->Constant_email_data();
        $company['name'] = $request['company_name'];
        $company['registrationCode'] = $registrationCode;
        $company['ownerName'] = $request['name'];
        $company['emailAddress'] = $request['email'];
        $company['landlineNumber'] = $request['landline_number'];
        $company['vatNumber'] = $request['vat'];


        $subject = trans('localization::lang_view.welcome_to') .$company['appName'];
        $company = (object)$company;
        dispatch(new SendEmailJob($email->message,$company,$request['email'],$subject,$email->status));



        $request->session()->flash('success', $array);

        return redirect()->route('companyView');

    }

    /*
    public function toogleStatus(Request $request)
    {
         $result = $this->call(ToggleStatusAction::class,[$request->id]);

          return redirect()->route('email');
    }
    */

    public function companyLogout(Request $request)
    {
        //echo "<pre>";print_r(Session::all());die();

        $id = Session::get('company_id');

        Cache::put('lock'.$id,$id, 60);
        Session::forget('company_id');
        Session::forget('company_registration_code');
        Session::forget('company_name');
        Session::forget('company_owner_name');
        Session::forget('company_email');
        Session::forget('company_status');
        Session::forget('company_profile_pic');
        Session::forget('companySessionMemory');
        Session::forget('company_remember_token');

        Session::put('logout','logout');
        return redirect()->route('companyLoginPage');
    }

    public function companyLockScreen(Request $request)
    {
        //echo "<pre>";print_r(Session::all());die();

        Cache::put('lockScreen'.$request->id,$request->id, 300);

        $emailAddress = Session::get('company_email');
        $id = Session::get('company_id');
        $name = Session::get('company_name');
        $profilePicture = Session::get('company_profile_pic');

        $array = array('id'=>$id,'name'=>$name,'emailAddress'=>$emailAddress,'profilePicture'=>$profilePicture);

        $result = (object)$array;

        return view('company::LockScreen',['result' => $result]);
    }

    public function companyLockScreenValidation(Request $request)
    {
        // echo "<pre>";print_r($request->all());die();
        $id = Session::get('company_id');

        Cache::forget('lockScreen'.$id);

        Session::forget('companySessionMemory');

        $emailCheckNameSpace = 'App\Containers\Company\Webtasks\CompanyLoginEmailValidationTask';
        $adminDetails = $this->call($emailCheckNameSpace, [$request['emailAddress'],$request['password'],$request['rememberMe']]);


        if($adminDetails['success'] == 1)
        {
            //echo "<pre>";print_r($adminDetails['adminDetails']);die();

            $id = $adminDetails['adminDetails']->id;

            if($adminDetails['adminDetails']->block == 0)
            {

                throw new ValidationException((new Message()),redirect()->to('company/login')
                    ->withErrors([trans('localization::errors.you are blocked')], 'default'));
            }

            Cache::put('lockScreen'.$id,$adminDetails['adminDetails'], 60);
            return redirect()->route('companyDashboard',$id);
        }
        else
        {
            return redirect()->route('companyLockScreen',Session::get('company_id'));
        }

    }



    public function companyDriverIncomeValue(Request $request)
    {

        $url =  "company/driver/income/$request->id/$request->filter_type";

        return redirect($url);

    }

    public function companyDriverIncome(Request $request)
    {

        $driverId = $request->id;
        $days = $request->days;

        $taskResult = $this->call(DriverIncomeTask::class, [$driverId,$days]);

        $result = $taskResult['result'];
        $tableResult = $taskResult['tableResult'];

        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $tableResult = (array)$tableResult;
        $col = new Collection($tableResult);
        $perPage = GetConfigs::getConfigs('paginate');
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $entries = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);
        $entries->setPath($request->url());

        $title = 'Driver Income';
        $page  = 'driver_module';




        return view('company::CompanyDriverDashboard', ['request' => $request,'result' => $result, 'tableResult'=>$entries, 'title' => $title, 'page' => $page,'id'=>$driverId ,'days'=>$days]);



    }

    public function companyCreateDriverAccount(Request $request)
    {

        $title = trans('localization::title.driver');
        $page = "driver_module";
        $country=Country::select('*')->get();


        return view('company::CompanyDriverAddAccount',['request'=>$request ,'country_array' => $country, 'title'=>$title, 'page'=> $page]);


    }

    public function CompanySaveDriverAccount(Request $request)
    {



        $driver_accId = "driver".rand(111,999).date('md').$request->driver_id;

        if($request->tos == "on"){
            $tos = true;
        }else{
            $tos = false;
        }

        $merchantAccountParams = [
            'individual' => [
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'email' => $request->email,
                'phone' => $request->phone_number,
                'dateOfBirth' => $request->dob,
                'ssn' => $request->ssn,
                'address' => [
                    'streetAddress' => $request->address,
                    'locality' => $request->city,
                    'region' => $request->region,
                    'postalCode' => $request->postal_code
                ]
            ],
//              'business' => [
//                  'legalName' => 'Jane\'s Ladders',
//                  'dbaName' => 'Jane\'s Ladders',
//                  'taxId' => '98-7654321',
//                  'address' => [
//                      'streetAddress' => '111 Main St',
//                      'locality' => 'Chicago',
//                      'region' => 'IND',
//                      'postalCode' => '60622'
//                  ]
//              ],
            'funding' => [
                'descriptor' => 'Blue Ladders',
                'destination' => MerchantAccount::FUNDING_DESTINATION_BANK,
                'email' => $request->email,
                'mobilePhone' => $request->phone_number,
                'accountNumber' => $request->acc_number,
                'routingNumber' => $request->ifsc
            ],
            'tosAccepted' => $tos,
            'masterMerchantAccountId' => "ganeshOwner",
            'id' => $driver_accId
        ];
        $result = MerchantAccount::create($merchantAccountParams);


        if($result->success==true)
        {
            $driverAcc = new DriverAccountModel();

            $driverAcc->driver_id = $request->driver_id;
            $driverAcc->driver_acc_id = $driver_accId;
            $driverAcc->firstname = $request->firstName;
            $driverAcc->lastname = $request->lastName;
            $driverAcc->email = $request->email;
            $driverAcc->phone = $request->phone_number;
            $driverAcc->dob = $request->dob;
            $driverAcc->ssn = $request->ssn;
            $driverAcc->streetAddress = $request->address;
            $driverAcc->locality = $request->city;
            $driverAcc->region = $request->region;
            $driverAcc->postalCode = $request->postal_code;
            $driverAcc->tosAccepted = $tos;
            $driverAcc->account_number = $request->acc_number;
            $driverAcc->routing_number = $request->ifsc;

            $driverAcc->save();

            $driver = DriverModel::where('id',$request->driver_id)->update(['account_present'=>1]);

            $response= array('success'=>"TRUE",'message'=>trans('localization::errors.driver_account_added_successfully'));
            $request->session()->flash('success',$response);

            return Redirect::to("/company/driver/view");
        }else{

            $errors = explode("\n",$result->message);



            throw new ValidationException((new Message()),redirect()->to('company/driver/addAccount/'.$request->driver_id)
                ->withErrors([$errors[0]], 'default'));
        }
    }


    public function companyDriverDeleteAccount(Request $request)
    {
        DriverAccountModel::where('driver_id',$request->driver_id)->delete();

        $data=DriverModel::where('id',$request->driver_id)->update(['account_present' => 0]);

        $result= array('success'=>"TRUE",'message'=>trans('localization::errors.driver_account_deleted_successfully'));

        $request->session()->flash('success', $result);

        return Redirect::to("/company/driver/view");
    }


    public function companyPaymentViewPage(Request $request)
    {
        // echo "<pre>";print_r("welcome payment");die();
        $company_id = Session::get('company_id');

        $paginate = GetConfigs::getConfigs('paginate');

        $title = trans('localization::lang_view.payment');

        $requestData = RequestModel::leftjoin('Drivers','request.driver_id','=','Drivers.id')
            ->join('Driver_Details','request.driver_id','=','Driver_Details.driver_id')
            ->leftjoin('User','request.user_id','=','User.id')
            ->leftJoin('request_bill','request.id','=','request_bill.request_id')
            ->select(
                'request.*',
                'User.firstname as ufname',
                'User.lastname as ulname',
                'Drivers.firstname as dfname',
                'Drivers.lastname as dlname',
                'request_bill.wallet_amount',
                'request_bill.driver_amount'

            )
            ->where('request.is_completed',1)->where('Driver_Details.company',$company_id)->paginate($paginate);

        $total = RequestModel::join('Driver_Details','request.driver_id','=','Driver_Details.driver_id')->join('request_bill','request.id','=','request_bill.request_id')->where('Driver_Details.company',$company_id)->where('request.is_paid',1)->sum('request.total');
        $promo = RequestModel::join('Driver_Details','request.driver_id','=','Driver_Details.driver_id')->join('request_bill','request.id','=','request_bill.request_id')->where('Driver_Details.company',$company_id)->where('request.is_paid',1)->sum('request_bill.promo_amount');
        $referral = RequestModel::join('Driver_Details','request.driver_id','=','Driver_Details.driver_id')->join('request_bill','request.id','=','request_bill.request_id')->where('Driver_Details.company',$company_id)->where('request.is_paid',1)->sum('request_bill.referral_amount');
        $wallet = RequestModel::join('Driver_Details','request.driver_id','=','Driver_Details.driver_id')->join('request_bill','request.id','=','request_bill.request_id')->where('Driver_Details.company',$company_id)->where('request.is_paid',1)->sum('request_bill.wallet_amount');

        $total_payment = $total+$promo+$referral;

        $card_payment = RequestModel::join('Driver_Details','request.driver_id','=','Driver_Details.driver_id')->where('is_paid',1)->where('Driver_Details.company',$company_id)->where('payment_opt',0)->sum('total');
        $cash_payment = RequestModel::join('Driver_Details','request.driver_id','=','Driver_Details.driver_id')->where('is_paid',1)->where('Driver_Details.company',$company_id)->where('payment_opt',1)->orWhere('payment_opt',3)->sum('total');
        $wallet_payment = $wallet;

        $payment_array = array('total'=>$total_payment,'card'=>$card_payment,'cash'=>$cash_payment,'wallet'=>$wallet_payment,);


        return view('company::CompanyPaymentView',['result' => $requestData,'payment_array' => $payment_array,'request' => $request,'page'=>"payment_module",'title'=>$title]);
    }

    public function companyMapViewPage(Request $request)
    {
        $companyDrivers = $this->call('App\Containers\Company\Webtasks\CompanyDriverMapTask',[$request]);

        //echo "<pre>";print_r($companyDrivers);die();

        $title = trans('localization::lang_view.map_view');

        $page = "map";
        return view('company::CompanyMapView',['value'=>$companyDrivers,'title'=>$title,'page'=>$page]);
    }

    public function companyMapAjax(Request $request)
    {
        $companyDrivers = $this->call('App\Containers\Company\Webtasks\CompanyDriverMapTask',[$request]);

        $types = Types::select('*')->get();

        $array = array();
        $array2 = array();

        foreach($companyDrivers as $value)
        {
            $array2['name']         = $value->firstname;
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

    public function CompanydriverIncomePaid(Request $request)
    {

        $requestId = $request->id;


        $tableResult = RequestModel::leftjoin('request_bill','request.id','request_bill.request_id')
            ->leftjoin('DriverPaid','DriverPaid.request_id','request.id')
            ->leftjoin('DriverAccounts','DriverAccounts.driver_id','request.driver_id')
            ->leftjoin('Driver_Details','Driver_Details.driver_id','request.driver_id')
            ->select('request.id','DriverPaid.transfer_id as isPaid','request.driver_id','DriverAccounts.driver_acc_id','request.payment_opt','request_bill.driver_amount','DriverPaid.payment_type as paymentType')
            ->where('request.id', $requestId)
            ->first();




        //payment_opt
        //        0-card,
        //        1-cash,
        //        2-wallet,
        //        3-wallet/cash


        if($tableResult->payment_opt == 0 )
        {



            if($tableResult->driver_acc_id == null)
            {

                $response = array('requestId'=>$requestId,'message'=>trans('localization::lang_view.driver_does_not_has_card'));


                $request->session()->flash('prompt_alert', $response);

            }
            else
            {

//                    $fromAccId = env('BT_DEFAULT_MERCHANT');
                $toAccId   = $tableResult->driver_acc_id;
                $amount    = $tableResult->driver_amount;
                $moneyTransferredStatus = ApiHelper::brainTree($toAccId,$amount);



                if(!$moneyTransferredStatus)
                {
                    $response = array('requestId'=>$requestId,'message'=>trans('localization::lang_view.transaction_failed').'. '.trans('localization::lang_view.please_pay_through_cash'));


                    $request->session()->flash('prompt_alert', $response);


                }
                else
                {



                    DriverPaidModel::where('request_id', $requestId )
                        ->update(['transfer_id' => 1, 'driver_id' => 1,'payment_type'=>0]);


                    $response = array('success'=>'TRUE','message'=>trans('localization::lang_view.amount_paid_to_driver'));

                    $request->session()->flash('success', $response);
                }


            }
        }
        else
        {

            echo "$requestId";

            DriverPaidModel::where('request_id', $requestId )
                ->update(['transfer_id' => 1, 'driver_id' => 1,'payment_type'=>1]);



            $response = array('success'=>'TRUE','message'=>trans('localization::lang_view.amount_paid_to_driver'));

            $request->session()->flash('success', $response);
        }

        return back();


    }

    public function companyDriverIncomePaidCash(Request $request)
    {
        $requestId = $request->id;

        DriverPaidModel::where('request_id', $requestId )
            ->update(['transfer_id' => 1, 'driver_id' => 1,'payment_type'=>1
            ]);

        $response = array('success'=>'TRUE','message'=>trans('localization::lang_view.amount_paid_to_driver'));

        $request->session()->flash('success', $response);

        return back();
    }


}
