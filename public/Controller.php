<?php

namespace App\Containers\Drivers\UI\WEB\Controllers;

use App\Containers\Admin\Webtasks\EmailCheckTask;
use App\Containers\Admin\Webtasks\PhoneCheckTask;
use App\Containers\Common\Configs_Class;
use App\Containers\Common\GetConfigs;
use App\Containers\Company\Webtasks\ReportDownloadTask;
use App\Containers\Drivers\Models\DriverAccountModel;
use App\Containers\Drivers\Models\DriverDocument;
use App\Containers\Drivers\Models\DriverModel;
use App\Containers\Drivers\Models\DriverTypeModel;
use App\Containers\Company\Models\CompanyModel;
use App\Containers\Drivers\UI\WEB\Requests\DriverAddRequest;
use App\Containers\Drivers\Webtasks\DriverDocumentSaveTask;
use App\Containers\Drivers\Webtasks\DriverDocumentUpdateTask;
use App\Containers\Drivers\Webtasks\DriverSaveTask;
use App\Containers\Drivers\Webtasks\DriverSearchTask;
use App\Containers\Drivers\Webtasks\DriverUpdateTask;
use App\Containers\Email\Models\EmailSettingsModel;
use App\Containers\Jobs\SendEmailJob;
use App\Containers\User\Models\Country;
use App\Containers\User\Tasks\ApiInsertUserImageTask;
use App\Containers\Drivers\Webtasks\DriverViewTask;
use App\Ship\Parents\Controllers\WebController;

use Braintree\MerchantAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;


/**
 * Class Controller
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class Controller extends WebController
{

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
              'id' => "drivertest".$request->driver_id
          ];
          $result = MerchantAccount::create($merchantAccountParams);


        if($result->success!=true){
            echo"<Pre>";print_r($result->errors);print_r($result->message);die();
        }

        if($result->success==true)
        {
            $driverAcc = new DriverAccountModel();

            $driverAcc->driver_id = $request->driver_id;
            $driverAcc->driver_acc_id = "driver".$request->driver_id;
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

            $response= array('success'=>"TRUE",'message'=>trans('localization::errors.driver_account_added_successfully'));
            $request->session()->flash('success',$response);

            return Redirect::to("/admin/driver/view");
        }else{
            return $result;//////////
        }


    }


    public function viewDriver(Request $request)
    {
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

        $driver_types = DriverTypeModel::select('*')->get();

        $company = CompanyModel::select('*')->get();

        $country=Country::select('*')->get();

        return view('drivers::DriverAdd', ['request' => $request,'company' => $company, 'country_array' => $country, 'types' => $driver_types, 'title' => $title, 'page' => $page]);
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

//Driver
        //Email Table
        $emailTableDriver = EmailSettingsModel::where('title','=','welcome_email')->first();

        $driver_viewPage = $emailTableDriver->message;
        $driver_mailStatus  = $emailTableDriver->status;

        $driver_name=$driver->firstname.' '.$driver->lastname;
        $driver_email=$driver->email;
        $subject = "Welcome to ".GetConfigs::getConfigs('application_name');
        //Email Notification
        dispatch(new SendEmailJob($driver_viewPage,array('name'=>$driver_name,'date'=>date("d-m-y")),$driver_email,$subject,$driver_mailStatus));

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
        $title = trans('localization::title.driver');
        $page = "driver_module";

        $driver = DriverModel::leftJoin('Driver_Details', 'Drivers.id', '=', 'Driver_Details.driver_id')->where('driver_id',$request->id)->first();

        $driver_documents = DriverDocument::where('driver_id',$request->id)->get();

        $driver_types = DriverTypeModel::select('*')->get();

        $company = CompanyModel::select('*')->get();

        $country=Country::select('*')->get();

        return view('drivers::DriverEdit', ['request' => $request,'driver' => $driver,'driver_documents' => $driver_documents, 'country_array' => $country, 'company' => $company, 'types' => $driver_types, 'title' => $title, 'page' => $page]);

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

        $driver =DriverModel::where('id',$request->id)->first();

        $old_state=$driver->is_approve;


        $response=array();
        if($old_state==0){
            $driver->is_approve = 1;
            $response = array('success'=>"TRUE",'message'=>trans('localization::errors.driver_approved_successfully'));
            $push_message=array('success' => true,'success_message' => 'Approved','is_approved' => true);
            $title=trans('localization::push_message.Dapproved');
            $notification_token[]=$driver->device_token;


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


}

