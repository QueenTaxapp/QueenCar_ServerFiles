<?php

namespace App\Containers\Drivers\UI\WEB\Controllers;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Braintree\MerchantAccount;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Containers\Jobs\SendSmsJob;
use Illuminate\Support\Facades\Lang;
use App\Containers\Common\ApiHelper;
use App\Containers\Common\GetConfigs;
use App\Containers\Jobs\SendEmailJob;
use App\Containers\Types\Models\Types;
use App\Containers\User\Models\Country;
use Illuminate\Support\Facades\Session;
use App\Containers\Sms\Models\SmsModel;
use App\Containers\Common\Configs_Class;
use Illuminate\Support\Facades\Redirect;
use App\Containers\Admin\Webtasks\Message;
use App\Containers\Admin\Models\AdminModel;
use Illuminate\Validation\ValidationException;
use App\Containers\Drivers\Models\DriverModel;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Containers\Request\Models\RequestModel;
use App\Ship\Parents\Controllers\WebController;
use App\Containers\Company\Models\CompanyModel;
use App\Containers\Admin\Webtasks\EmailCheckTask;
use App\Containers\Drivers\Models\DriverDocument;
use App\Containers\Admin\Webtasks\PhoneCheckTask;
use App\Containers\Drivers\Models\DriverTypeModel;
use App\Containers\Drivers\Models\DriverPaidModel;
use App\Containers\Drivers\Webtasks\DriverSaveTask;
use App\Containers\Drivers\Webtasks\DriverViewTask;
use App\Containers\Email\Models\EmailSettingsModel;
use App\Containers\User\Tasks\ApiInsertUserImageTask;
use App\Containers\Drivers\Webtasks\DriverUpdateTask;

use App\Containers\Drivers\Models\DriverAccountModel;
use App\Containers\Drivers\Webtasks\DriverSearchTask;

use App\Containers\Company\Webtasks\ReportDownloadTask;
use App\Containers\Drivers\Webtasks\DriverDocumentSaveTask;

use App\Containers\Drivers\UI\WEB\Requests\DriverAddRequest;
use App\Containers\Drivers\Webtasks\DriverDocumentUpdateTask;
use Illuminate\Database\Eloquent\Collection as NewCollection;



/**
 * Class Controller
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class Controller extends WebController
{

    public function DriverDocumentExpiry(Request $request)
    {
        $driver = DriverModel::leftJoin('DriverDocument', 'Drivers.id', '=', 'DriverDocument.driver_id')
            ->select('Drivers.firstname','Drivers.lastname','Drivers.email','Drivers.phone_number','Drivers.is_approve','DriverDocument.driver_id','DriverDocument.document_name','DriverDocument.document_ex_date')
            ->where('Drivers.is_approve', 1)
            ->where('DriverDocument.document_ex_date', date('Y-m-d',strtotime('-1 day')))->get();


        $subject = trans('localization::lang_view.document_expired');

        $value = Configs_Class::helper()->Constant_email_data();




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

        if (count($driver)>0 && $driver != ""){




            $email =Configs_Class::helper()->email(12,$lang);

            foreach($driver as $driver_value){

                DriverModel::where('id',$driver_value->driver_id)->update(['is_approve'=>0]);

                $value['firstName'] = $driver_value->firstname;
                $value['lastName'] = $driver_value->lastname;
                $value['emailAddress'] = $driver_value->email;
                $value['phoneNumber'] = $driver_value->phone_number;
                $value['documentName'] = $driver_value->document_name;
                $value['documentExpiry'] = $driver_value->document_ex_date;

                dispatch(new SendEmailJob($email->message,$value,$driver_value->email,$subject,$email->status));
            }
        }



        //intimation

        $driver_memo = DriverModel::leftJoin('DriverDocument', 'Drivers.id', '=', 'DriverDocument.driver_id')
            ->select('Drivers.firstname','Drivers.lastname','Drivers.email','Drivers.phone_number','Drivers.is_approve','DriverDocument.driver_id','DriverDocument.document_name','DriverDocument.document_ex_date')
            ->where('Drivers.is_approve', 1)
            ->where('DriverDocument.document_ex_date', date('Y-m-d',strtotime('+20 day')))->get();

        if (count($driver_memo)>0 && $driver_memo != ""){

            $email_memo =Configs_Class::helper()->email(13,$lang);

            foreach($driver_memo as $memo_value){

                $value['firstName'] = $memo_value->firstname;
                $value['lastName'] = $memo_value->lastname;
                $value['emailAddress'] = $memo_value->email;
                $value['phoneNumber'] = $memo_value->phone_number;
                $value['documentName'] = $memo_value->document_name;
                $value['documentExpiry'] = $memo_value->document_ex_date;

                dispatch(new SendEmailJob($email_memo->message,$value,$memo_value->email,$subject,$email_memo->status));
            }

        }


        //echo "<pre>";print_r($driver);die();
    }

    public function createDriverAccount(Request $request)
    {
        // echo "<pre>";print_r($request->driver_id);die();
        $title = trans('localization::title.driver');
        $page = "driver_module";
        $country=Country::select('*')->get();

        return view('drivers::DriverAddAccount',['request'=>$request ,'country_array' => $country, 'title'=>$title, 'page'=> $page]);


    }

    public function saveDriverAccount(Request $request)
    {
        //echo "<pre>";print_r($request->all());die();
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

            return Redirect::to("/admin/driver/view");
        }else{

            $errors = explode("\n",$result->message);

            throw new ValidationException((new Message()),redirect()->to('admin/driver/addAccount/'.$request->driver_id)
                ->withErrors([$errors[0]], 'default'));
        }


    }

    public function adminDriverDeleteAccount(Request $request)
    {
        DriverAccountModel::where('driver_id',$request->driver_id)->delete();

        $data=DriverModel::where('id',$request->driver_id)->update(['account_present' => 0]);

        $result= array('success'=>"TRUE",'message'=>trans('localization::errors.driver_account_deleted_successfully'));

        $request->session()->flash('success', $result);

        return Redirect::to("/admin/driver/view");
    }


    public function viewDriver(Request $request)
    {

        // $a = SmsModel::select('hint')->where('id',9)->first();

        // $b = unserialize($a->hint);
        // $c['%appName%'] = $b['%applicationName%'];
        // $c['%headOfficeNumber%'] = $b['%helpEmailAddress%'];
        // $c['%helpEmail%'] = $b['%helpNumber%'];


        // echo "<pre>";
        // print_r(serialize($c));
        // die();
        $page = GetConfigs::getConfigs('paginate');

        $request->session()->put('filter_type',"");
        $request->session()->put('filter_value',"");
        $user="";

        if($request->has('filter_type') && $request->has('filter_type'))
        {
            $user = $this->call(DriverSearchTask::class, [$request]);

            if($request->submit && $request->submit == 'Download_Report')
            {
                // trans('localization::lang_view.s.no')

                $heading = array(
                    trans('localization::lang_view.firstname'),
                    trans('localization::lang_view.lastname'),
                    trans('localization::lang_view.email'),
                    trans('localization::lang_view.phone_number'),
                    trans('localization::lang_view.type'),
                    trans('localization::lang_view.status'));

                $key = array('firstname','lastname','email','phone_number','type','is_approve');

                $title = trans('localization::lang_view.driver_report');

                $value = $user;
                $this->call(ReportDownloadTask::class, [$heading,$value,$key,$title]);


            }
        }
        else
        {
            $user = $this->call(DriverViewTask::class,[$request]);
        }


        $title = trans('localization::title.driver');
        $page = "driver_module";

        return view('drivers::DriverView',['result'=>$user,'request'=>$request, 'title'=>$title, 'page'=> $page]);

    }




    public function createDriver(Request $request)
    {
        $title = trans('localization::title.driver');

        $page = "driver_module";

        $driver_admins = AdminModel::where('role',99999)->where('is_active',1)->get();

        $reterive_key =  ApiHelper::reterive_key();

        if($reterive_key != 0){

            $driver_admin_key = $reterive_key;
        }
        else
        {
            $driver_admin_key = 0;
        }


        //echo "<pre>";print_r($admins);die();

        $driver_types = DriverTypeModel::select('*');


        if($reterive_key != 0){

            $driver_types = $driver_types->where('admin_reference',$reterive_key);
        }

        $driver_types = $driver_types->get();

        $company = CompanyModel::where('status',0);

        if($reterive_key != 0){

            $company = $company->where('admin_reference',$reterive_key);

        }

        $company = $company->get();

        $country=Country::select('*')->get();

        return view('drivers::DriverAdd', ['driver_admins' => $driver_admins,'driver_admin_key' => $driver_admin_key,'request' => $request,'company' => $company, 'country_array' => $country, 'types' => $driver_types, 'title' => $title, 'page' => $page]);
    }


    public function saveDriver(DriverAddRequest $request)
    {


      $picture='';
      $token = $this->call(\App\Containers\Admin\Webtasks\SessionKeyTask::class);
      if($request->hasFile('profile_pic'))
      {
          $picture = $this->call(ApiInsertUserImageTask::class,[$request,'profile_pic']);
      }

      $driver = $this->call(DriverSaveTask::class,[$request,$token]);
      $driver->profile_pic=$picture?:"";
      $driver->save();

      $driver_document = $this->call(DriverDocumentSaveTask::class,[$request,$driver]);

      //email
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

        $emailTableDriver = Configs_Class::helper()->email(1,$lang);
        $driver_viewPage = $emailTableDriver->message;
        $driver_mailStatus  = $emailTableDriver->status;

        $driver = Configs_Class::helper()->Constant_email_data();
        $driver['firstName'] = $request->firstName;
        $driver['lastName']  = $request->lastName;
        $driver['emailAddress'] = $request->email;
        $driver['phoneNumber'] = $request->phone_number;
        $value = (object)$driver;

        $subject = trans('localization::lang_view.welcome_to').GetConfigs::getConfigs('application_name');
        //Email Notification
        dispatch(new SendEmailJob($driver_viewPage,$value,$request->email,$subject,$driver_mailStatus));

        $response= array('success'=>"TRUE",'message'=>trans('localization::errors.driver_added_successfully'));
        //echo "<pre>";print_r($driver);die();
        $request->session()->flash('success',$response);

      if( $request->action == 'company')
      {
          return Redirect::to("/company/driver/view");
      }
      return Redirect::to("/admin/driver/view");
    }


    public function editDriver(Request $request)
    {

        $driver_admins = AdminModel::where('role',99999)->where('is_active',1)->get();

        //echo Session::get('role')."<br>";
        $reterive_key =  ApiHelper::reterive_key();

        if($reterive_key != 0){

            $driver_admin_key = $reterive_key;

        }else{

            $driver_admin_key = 0;
        }


        $title = trans('localization::title.driver');
        $page = "driver_module";

        $driver = DriverModel::leftJoin('Driver_Details', 'Drivers.id', '=', 'Driver_Details.driver_id')->where('driver_id',$request->id)->first();


        $driver_documents = DriverDocument::where('driver_id',$request->id)->get();

        $driver_types = DriverTypeModel::select('*');


        if($reterive_key != 0)
        {
            $driver_types = $driver_types->where('admin_reference',$reterive_key);

        }

        $driver_types = $driver_types->get();

        $company = CompanyModel::select('*');

        if($reterive_key != 0)
        {
            $company = $company->where('admin_reference',$reterive_key);
        }

        $company = $company->get();

        $country=Country::select('*')->get();


        return view('drivers::DriverEdit', ['driver_admins' => $driver_admins,'driver_admin_key' => $driver_admin_key,'request' => $request,'driver' => $driver,'driver_documents' => $driver_documents, 'country_array' => $country, 'company' => $company, 'types' => $driver_types, 'title' => $title, 'page' => $page]);

    }


    public function updateDriver(DriverAddRequest $request)
    {
        //echo "<pre>";print_r($request->doc_id);die();

        $id=$request->id;
        $email=$request->email;
        $phone=$request->phone_number;

        $email_count = $this->call(EmailCheckTask::class, ["App\Containers\Drivers\Models\DriverModel",$id,$email,'admin/driver/edit/']);

        $phone_count = $this->call(PhoneCheckTask::class, ["App\Containers\Drivers\Models\DriverModel",$id,$phone,"phone_number",'admin/driver/edit/']);

        if($email_count==0 && $phone_count==0)
        {
            $driver = $this->call(DriverUpdateTask::class,[$request]);
        }


        if($request->hasFile('profile_pic'))
        {
            $picture = $this->call(ApiInsertUserImageTask::class,[$request,'profile_pic']);
            $driver->profile_pic=$picture;
            $driver->save();
        }

        $driver_document = $this->call(DriverDocumentUpdateTask::class,[$request,$driver]);

        $response= array('success'=>"TRUE",'message'=>trans('localization::errors.driver_updated_successfully'));
        // echo "<pre>";print_r($driver);die();
        $request->session()->flash('success',$response);

        if( $request->action == 'company')
        {
            return Redirect::to("/company/driver/view");
        }


        return Redirect::to("/admin/driver/view");
    }




    public function deleteDriver(Request $request)
    {
        $data=DriverModel::where('id',$request->id)->update(['deleted_at' => date("Y-m-d h:i:s")]);

        $result= array('success'=>"TRUE",'message'=>trans('localization::errors.driver_deleted_successfully'));

        $request->session()->flash('success', $result);

        return Redirect::to("/admin/driver/view");
    }


    public function approveDriver(Request $request)
    {

        $driver = DriverModel::where('id',$request->id)->first();

        $old_state=$driver->is_approve;


        $response=array();
        if($old_state==0){
            $driver->is_approve = 1;
            $response = array('success'=>"TRUE",'message'=>trans('localization::errors.driver_approved_successfully'));
            $push_message=array('success' => true,'success_message' => 'Approved','is_approved' => true);
            $title=trans('localization::push_message.Dapproved');
            $notification_token[]=$driver->device_token;


            //email
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

            $emailTableDriver = Configs_Class::helper()->email(3,$lang);

            $driver_viewPage = $emailTableDriver->message;
            $driver_mailStatus  = $emailTableDriver->status;

            $driverEmailAddress = $driver->email;

            $driverValue = Configs_Class::helper()->Constant_email_data();
            $driverValue['driverName'] = $driver->firstname.' '.$driver->lastname;
            $driverValue['registrationCode']  = $driver->registration_code;
            $driverValue['emailAddress'] = $driver->email;
            $driverValue['phoneNumber'] = $driver->phone_number;
            $driverValue['carModel'] = $driver->car_model;
            $driverValue['carNumber'] = $driver->car_number;
            $value = (object)$driverValue;

            $subject = trans('localization::lang_view.requests_a_proposal_as_a_driver_accepted');

            dispatch(new SendEmailJob($driver_viewPage,$value,$driverEmailAddress,$subject,$driver_mailStatus));


            //Email Notification
//sms notification


        $sms = Configs_Class::helper()->sms(8);

        $smsMessage = $sms->message;


        if (strpos($smsMessage, '%driverName%') !== false)
        {
            $smsMessage =  str_replace("%driverName%",$driverValue['driverName'],$smsMessage);
        }
        if (strpos($smsMessage, '%registrationCode%') !== false)
        {
            $smsMessage =  str_replace("%registrationCode%",$driverValue['registrationCode'],$smsMessage);
        }
        if (strpos($smsMessage, '%emailAddress%') !== false)
        {
            $smsMessage =  str_replace("%emailAddress%",$driverValue['emailAddress'],$smsMessage);
        }



        if (strpos($smsMessage, '%phoneNumber%') !== false)
        {
            $smsMessage =  str_replace("%phoneNumber%",$driverValue['phoneNumber'],$smsMessage);
        }
        if (strpos($smsMessage, '%carModel%') !== false)
        {
            $smsMessage =  str_replace("%carModel%",$driverValue['carModel'],$smsMessage);
        }
        if (strpos($smsMessage, '%carNumber%') !== false)
        {
            $smsMessage =  str_replace("%carNumber%",$driverValue['carNumber'],$smsMessage);
        }



        dispatch(new SendSmsJob($driverValue['phoneNumber'],$smsMessage,$sms->status));

// sms notification


        }
        elseif($old_state==1)
        {
            $driver->is_approve = 0;
            $response = array('success'=>"TRUE",'message'=>trans('localization::errors.driver_declined_successfully'));
            $push_message=array('success' => true,'success_message' => 'Approved','is_approved' => false);
            $title=trans('localization::push_message.Ddecline');
            $notification_token[]=$driver->device_token;
        }

        $driver->save();
        Configs_Class::helper()->send_push(json_encode($push_message),$title,$notification_token,$driver->login_by,"driver");
        //echo "<pre>";print_r( $promo->state);die();

        $request->session()->flash('success', $response);
        return Redirect::to("/admin/driver/view");

    }

    public function driverIncome(Request $request)
    {


        $driverId = $request->id;
        $days = $request->days;

//        $tableResult = RequestModel::leftjoin('request_bill','request.id','request_bill.request_id')
//                                    ->leftjoin('DriverPaid','DriverPaid.request_id','request.id')
//                                    ->leftjoin('DriverAccounts','DriverAccounts.driver_acc_id','request.driver_id')
//                                    ->leftjoin('payment','payment.user_id','request.user_id')
//                                    ->leftjoin('Driver_Details','Driver_Details.driver_id','request.driver_id')
//                                    ->leftjoin('CompanyAccounts','CompanyAccounts.company_id','Driver_Details.company')
//                                    ->select('request.id','request.request_id as requestId','request.created_at as date','DriverPaid.transfer_id as isPaid','request.user_id','request.driver_id','DriverAccounts.driver_acc_id','payment.customer_id as customer_payment','Driver_Details.company as company_id','CompanyAccounts.company_acc_id')
//                                    ->where('request.driver_id', $driverId);



//        echo "<pre>";
//        print_r($tableResult->get());
//
//        die();

        //      $date = new Carbon; //  DateTime string will be 2014-04-03 13:57:34

        // or $date->subDays(7),  2014-03-27 13:58:25



        if($days == 'null')
        {
            $result = DB::select("SELECT count(tab_request.id) as total_trip,sum(tab_request_bill.driver_amount) as total_earned,sum(IF(tab_DriverPaid.transfer_id != 0,1,0)) as transfered ,sum(IF(tab_DriverPaid.transfer_id != 1,1,0)) as non_transfered FROM `tab_request` left join tab_request_bill on tab_request.id=tab_request_bill.request_id left join tab_DriverPaid on tab_DriverPaid.request_id=tab_request.id where tab_request.driver_id= $driverId");

            $tableResult = DB::select("SELECT tab_request.id ,tab_request.request_id as requestId,tab_request.created_at as date , tab_DriverPaid.transfer_id as isPaid ,tab_DriverPaid.payment_type as paymentType FROM `tab_request` left join tab_request_bill on tab_request.id=tab_request_bill.request_id left join tab_DriverPaid on tab_DriverPaid.request_id=tab_request.id where tab_request.driver_id= $driverId");

        }
        else if($days == 0)
        {
            $result = DB::select("SELECT count(tab_request.id) as total_trip,sum(tab_request_bill.driver_amount) as total_earned,sum(IF(tab_DriverPaid.transfer_id != 0,1,0)) as transfered ,sum(IF(tab_DriverPaid.transfer_id != 1,1,0)) as non_transfered FROM `tab_request` left join tab_request_bill on tab_request.id=tab_request_bill.request_id left join tab_DriverPaid on tab_DriverPaid.request_id=tab_request.id where tab_request.driver_id= $driverId  AND tab_request.created_at >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");

            $tableResult = DB::select("SELECT tab_request.id ,tab_request.request_id as requestId,tab_request.created_at as date , tab_DriverPaid.transfer_id as isPaid ,tab_DriverPaid.payment_type as paymentType FROM `tab_request` left join tab_request_bill on tab_request.id=tab_request_bill.request_id left join tab_DriverPaid on tab_DriverPaid.request_id=tab_request.id where tab_request.driver_id= $driverId  AND tab_request.created_at >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");

            // $date->subDays($days);
            //  $tableResult = $tableResult->where('request.created_at','>=',$date->toDateTimeString() )->get();
        }
        else
        {
            $result = DB::select("SELECT count(tab_request.id) as total_trip,sum(tab_request_bill.driver_amount) as total_earned,sum(IF(tab_DriverPaid.transfer_id != 0,1,0)) as transfered ,sum(IF(tab_DriverPaid.transfer_id != 1,1,0)) as non_transfered FROM `tab_request` left join tab_request_bill on tab_request.id=tab_request_bill.request_id left join tab_DriverPaid on tab_DriverPaid.request_id=tab_request.id where tab_request.driver_id= $driverId  AND tab_request.created_at >= DATE_SUB(CURDATE(), INTERVAL $days DAY)  And tab_request.created_at < DATE_SUB(CURDATE(), INTERVAL 0 DAY)");

            $tableResult = DB::select("SELECT tab_request.id ,tab_request.request_id as requestId,tab_request.created_at as date , tab_DriverPaid.transfer_id as isPaid ,tab_DriverPaid.payment_type as paymentType FROM `tab_request` left join tab_request_bill on tab_request.id=tab_request_bill.request_id left join tab_DriverPaid on tab_DriverPaid.request_id=tab_request.id where tab_request.driver_id= $driverId  AND tab_request.created_at >= DATE_SUB(CURDATE(), INTERVAL $days DAY)  And tab_request.created_at < DATE_SUB(CURDATE(), INTERVAL 0 DAY)");

        }



        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $tableResult = (array)$tableResult;
        $col = new Collection($tableResult);
        $perPage = GetConfigs::getConfigs('paginate');
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $entries = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);
        $entries->setPath($request->url());

        $title = 'Driver Income';
        $page  = 'driver_module';




        return view('drivers::DriverDashboard', ['request' => $request,'result' => $result, 'tableResult'=>$entries, 'title' => $title, 'page' => $page,'id'=>$driverId ,'days'=>$days]);


    }

    public function driverIncomeValue(Request $request)
    {

        $url =  "admin/driver/income/$request->id/$request->filter_type";

        return redirect($url);

    }

    public function driverIncomePaid(Request $request)
    {

        $requestId = $request->id;



        $tableResult = RequestModel::leftjoin('request_bill','request.id','request_bill.request_id')
            ->leftjoin('DriverPaid','DriverPaid.request_id','request.id')
            ->leftjoin('DriverAccounts','DriverAccounts.driver_id','request.driver_id')
            // ->leftjoin('payment','payment.user_id','request.user_id')
            ->leftjoin('Driver_Details','Driver_Details.driver_id','request.driver_id')
            //->leftjoin('request_bill','request_bill.request_id','request.id')
            // ->leftjoin('CompanyAccounts','CompanyAccounts.company_id','Driver_Details.company')
//                                    ->select('request.id','request.request_id as requestId','request.created_at as date','DriverPaid.transfer_id as isPaid','request.user_id','request.driver_id','DriverAccounts.driver_acc_id','payment.customer_id as customer_payment','Driver_Details.company as company_id','CompanyAccounts.company_acc_id','request.payment_opt')
//                                    ->where('request.driver_id', $driverId);
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
            DriverPaidModel::where('request_id', $requestId )
                ->update(['transfer_id' => 1, 'driver_id' => 1,'payment_type'=>1]);

            $response = array('success'=>'TRUE','message'=>trans('localization::lang_view.amount_paid_to_driver'));

            $request->session()->flash('success', $response);
        }

        return back();

    }

    public function driverIncomePaidCash(Request $request)
    {


        $requestId = $request->id;

        DriverPaidModel::where('request_id', $requestId )
            ->update(['transfer_id' => 1, 'driver_id' => 1,'payment_type'=>1
            ]);

        $response = array('success'=>'TRUE','message'=>trans('localization::lang_view.amount_paid_to_driver'));

        $request->session()->flash('success', $response);

        return back();



    }

    public function adminSpecificTypes(Request $request)
    {

        $referenceId = $request->referenceValue;



        $types = Types::select('id','admin_reference','name','icon')->where('is_active',1);

        if($referenceId != null)
        {
            $types =  $types->where('admin_reference',$referenceId);

        }

        $types =  $types->get();

        return $types;


    }

    public function companySpecificTypes(Request $request)
    {

        $referenceId = $request->referenceValue;

        $company = CompanyModel::select('id','name')->where('status',0);;


        if($referenceId != null)
        {
            $company =  $company->where('admin_reference',$referenceId);

        }

        $company =  $company->get();

        return $company;


    }


}

