<?php

namespace App\Containers\User\UI\WEB\Controllers;


use DateTime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Containers\Common\ApiHelper;
use App\Containers\Jobs\SendEmailJob;
use App\Containers\Common\GetConfigs;
use Illuminate\Support\Facades\Session;
use App\Containers\User\Models\Country;
use App\Containers\User\Models\Refferal;
use App\Containers\Common\Configs_Class;
use Illuminate\Support\Facades\Redirect;
use App\Containers\User\Tasks\GetRandomCode;
use App\Containers\User\Webtasks\UserViewTask;
use App\Containers\User\Webtasks\UserSaveTask;
use App\Containers\User\Models\UserTableModel;

use App\Containers\User\Models\UserWalletModel;
use App\Ship\Parents\Controllers\WebController;
use App\Containers\User\Webtasks\UserUpdateTask;
use App\Containers\User\Webtasks\UserSearchTask;

use App\Containers\Admin\Webtasks\EmailCheckTask;
use App\Containers\Admin\Webtasks\PhoneCheckTask;

use App\Containers\Email\Models\EmailSettingsModel;
use App\Containers\User\Models\UserWalletSpentModel;
use App\Containers\User\Tasks\ApiInsertUserImageTask;
use App\Containers\User\Models\UserWalletHistoryModel;
use App\Containers\User\UI\WEB\Requests\UserAddRequest;
use App\Containers\Company\Webtasks\ReportDownloadTask;

/**
 * Class Controller
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class Controller extends WebController
{

    public function viewUser(Request $request)
    {
        $request->session()->put('filter_type',"");
        $request->session()->put('filter_value',"");
        $user="";

        if($request->has('filter_type') && $request->has('filter_type'))
        {
            $user = $this->call(UserSearchTask::class, [$request]);

            if($request->submit && $request->submit == 'Download_Report')
            {
                // trans('localization::lang_view.s.no')

                $heading = array(
                    trans('localization::lang_view.firstname'),
                    trans('localization::lang_view.lastname'),
                    trans('localization::lang_view.email'),
                    trans('localization::lang_view.phone_number'),
                    trans('localization::lang_view.status'));

                $key = array('firstname','lastname','email','phone_number','is_active');

                $title = trans('localization::lang_view.user_report');

                $value = $user;
                $this->call(ReportDownloadTask::class, [$heading,$value,$key,$title]);


            }
        }
        else
        {
            $user = $this->call(UserViewTask::class,[$request]);
        }


        $title = trans('localization::title.user');
        $page = "user_module";

        return view('user::UserView',['result'=>$user,'request'=>$request, 'title'=>$title, 'page'=> $page]);

    }


    /**
     * createuser
     * @param  object $request
     * @return view  User::AddUser
     */

    public function createUser(Request $request)
    {



      $title = trans('localization::title.user');

      $page = "user_module";

      $timezone = json_decode(file_get_contents(public_path('timezones.json')),true);

      $country=Country::select('*')->get();

      return view('user::UserAdd', ['request' => $request, 'country_array' => $country,'title' => $title, 'page' => $page,'timezones'=>$timezone]);

    }

    /**
     * saveUser
     * @param  object $request
     * @return viewUser
     */
    public function saveUser(UserAddRequest $request)
    {

        $picture='';
        $token = $this->call(\App\Containers\Admin\Webtasks\SessionKeyTask::class);
        if($request->hasFile('profile_pic'))
        {
            $picture = $this->call(ApiInsertUserImageTask::class,[$request,'profile_pic']);
        }

        $user = $this->call(UserSaveTask::class,[$request,$token]);
        $user->profile_pic=$picture?:"";


        $user->save();

        /*
         * refferal Code
         * */

        $code = $this->call(GetRandomCode::class,[6]);

        $refferal = Refferal::select('code')->where('code',$code)->first();

        $i = 6;
        $j = 0;
        if(count($refferal) != 0)
        {
          if($j == 2 )
          {
            $i = $i+1;
          }
          while( count($refferal) == 0)
          {
            $code = $this->call(GetRandomCode::class,[$i]);
            $refferal = Refferal::select('code')->where('code',$code)->first();
            $j = $j+1;
          }
        }


        $refferal = new Refferal();
        $refferal->user_id=$user->id;
        $refferal->amount_earned=0;
        $refferal->amount_spent=0;
        $refferal->amount_balance=0;
        $refferal->code = $code;
        $refferal->save();


        $user = Configs_Class::helper()->Constant_email_data();

        $user['firstName'] = $request->firstName;
        $user['lastName']  = $request->lastName;
        $user['emailAddress'] = $request->email;
        $user['phoneNumber'] = $request->phone_number;


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

        $email = Configs_Class::helper()->email(1,$lang);




        $subject = trans('localization::lang_view.welcome_to') .$user['appName'];
        $user = (object)$user;
        dispatch(new SendEmailJob($email->message,$user,$request->email,$subject,$email->status));

        $response=array('success'=>"TRUE",'message'=>trans('localization::errors.user_added_successfully'));
        $request->session()->flash('success',$response);

        return Redirect::to('/admin/user/view');
    }

    public function editUser(Request $request)
    {
        $title = trans('localization::title.user');

        $page = "user_module";
        $timezone = json_decode(file_get_contents(public_path('timezones.json')),true);


        $country=Country::select('*')->get();

        $user = UserTableModel::where('id',$request->id)->first();

        return view('user::UserEdit', ['request' => $request, 'user' => $user,'country_array' => $country,'title' => $title, 'page' => $page,'timezones'=>$timezone]);
    }

    public function updateUser(UserAddRequest $request)
    {
        // echo "<pre>";print_r($request->all());die();

        $id=$request->id;
        $email=$request->email;
        $phone=$request->phone_number;

        $email_count = $this->call(EmailCheckTask::class, ["App\Containers\User\Models\UserTableModel",$id,$email,'admin/user/edit/']);

        $phone_count = $this->call(PhoneCheckTask::class, ["App\Containers\User\Models\UserTableModel",$id,$phone,"phone_number",'admin/user/edit/']);

        if($email_count==0 && $phone_count==0)
        {
            $user = $this->call(UserUpdateTask::class,[$request]);
        }


        if($request->hasFile('profile_pic'))
        {
            $picture = $this->call(ApiInsertUserImageTask::class,[$request,'profile_pic']);
            $user->profile_pic=$picture;
        }

        $user->save();

        $userResponse=array('success'=>"TRUE",'message'=>trans('localization::errors.user_updated_successfully'));
       // echo "<pre>";print_r($user);die();
        $request->session()->flash('success',$userResponse);

        return Redirect::to('/admin/user/view');
    }

    public function deleteUser(Request $request)
    {
        $data=UserTableModel::where('id',$request->id)->update(['deleted_at' => date("Y-m-d h:i:s")]);

        $result= array('success'=>"TRUE",'message'=>trans('localization::errors.user_deleted_successfully'));

        $request->session()->flash('success', $result);

        return Redirect::to("/admin/user/view");

    }


    public function activeUser(Request $request)
    {

        $user =UserTableModel::where('id',$request->id)->first();

        $old_state=$user->is_active;

        $response=array();
        if($old_state==0){
            $user->is_active = 1;
            $response = array('success'=>"TRUE",'message'=>trans('localization::errors.user_active_successfully'));
        }
        elseif($old_state==1)
        {
            $user->is_active = 0;
            $response = array('success'=>"TRUE",'message'=>trans('localization::errors.user_inactive_successfully'));
        }

        $user->save();
        //echo "<pre>";print_r( $promo->state);die();

        $request->session()->flash('success', $response);
        return Redirect::to("/admin/user/view");

    }


    public function walletUser(Request $request)
    {
        //echo "<pre>";print_r( $request-
        $paginate = GetConfigs::getConfigs('paginate');

        $wallet =UserWalletModel::where('user_id',$request->id)->first();

        $wallet_history =UserWalletHistoryModel::where('user_id',$request->id)->paginate($paginate);

        $title = trans('localization::title.user');

        $page = "user_module";
        //echo "<pre>";print_r( $promo->state);die();

        return view('user::Wallet', ['request' => $request, 'wallet' => $wallet, 'wallet_history' => $wallet_history, 'title' => $title, 'page' => $page]);

    }

    public function walletSpentUser(Request $request)
    {
        //echo "<pre>";print_r( $request-
        $paginate = GetConfigs::getConfigs('paginate');

        $wallet =UserWalletModel::where('user_id',$request->id)->first();

        $wallet_spent =UserWalletSpentModel::where('user_id',$request->id)->paginate($paginate);

        $title = trans('localization::title.user');

        $page = "user_module";
        //echo "<pre>";print_r( $promo->state);die();

        return view('user::WalletSpent', ['request' => $request, 'wallet' => $wallet, 'wallet_spent' => $wallet_spent, 'title' => $title, 'page' => $page]);

    }


}
