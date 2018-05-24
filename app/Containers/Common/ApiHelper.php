<?php


namespace App\Containers\Common;
use App\Containers\Payment\ApiTask\Braintree;
use Exception;
use Carbon\Carbon;
use Braintree\Transaction;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\DB;
use App\Containers\Eta\Models\Zone;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use App\Containers\Common\GetConfigs;
use App\Containers\Jobs\PhpToNodeJob;
use App\Containers\Sms\Models\SmsModel;
use Illuminate\Support\Facades\Session;
use App\Ship\Exceptions\CommonException;
use App\Containers\Admin\Webtasks\Message;
use App\Containers\Admin\Models\AdminModel;
use App\Containers\Sms\Models\SmsSettingModel;
use App\Containers\Drivers\Models\DriverModel;
use App\Containers\User\Models\UserTableModel;
use App\Containers\Email\Models\EmailLangModel;
use App\Containers\Jobs\IosPushNotificationJob;

use App\Containers\Request\Models\RequestModel;
use App\Containers\Email\Webtasks\TrailEmailTask;
use App\Containers\Jobs\AndroidPushNotificationJob;
use App\Containers\Email\Models\EmailSettingsModel;
use App\Containers\Compliant\Models\UserCompliantModel;
use Braintree\Configuration as Braintree_Configuration;
use App\Containers\Compliant\Models\DriverCompliantModel;
use Request;

/**
 * Class ApiHelper
 * @package App\Containers\Common
 */
class ApiHelper
{


    /**
     * used to get distance matrix response
     * @param $olat double
     * @param $olng double
     * @param $dlat double
     * @param $dlng double
     */
    public function find_zone($lat, $lng)
    {
        $zone = Zone::join('zone_bound','zone.id','=','zone_bound.zone_id')
            ->where('zone_bound.north','>=',$lat)
            ->where('zone_bound.south','<=',$lat)
            ->where('zone_bound.east','>=',$lng)
            ->where('zone_bound.west','<=',$lng)
            ->where('zone.is_active','=',1)->first();

        return $zone;
    }


    public function get_distance_matrix($olat, $olng, $dlat, $dlng)
    {

        $client = new \GuzzleHttp\Client();

        $res = $client->request('GET', 'https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins='.$olat.','.$olng."&destinations=".$dlat.','.$dlng."&key=".GetConfigs::getConfigs("google_browser_key"));
        if($res->getStatusCode() == 200)
        {

            return \GuzzleHttp\json_decode($res->getBody()->getContents());
        }
    }


    public function buttonColor($buttonName)
    {
        $buttonArray['add-btn']                     = "blue";
        $buttonArray['save-btn']                    = "green";
        $buttonArray['search-btn']                  = "orange";
        $buttonArray['download-btn']                = "red";
        $buttonArray['user-state-btn']              = "black";
        $buttonArray['revert-btn']                  = "grey";
        $buttonArray['wallet-spent-btn']            = "black";
        $buttonArray['zone-add-btn']                = "blue";
        $buttonArray['zone-delete-btn']             = "orange";
        $buttonArray['zone-delete-all-btn']         = "red";
        $buttonArray['sidebar_header_start']        = "#fcca2a";
        $buttonArray['sidebar_header_end']          = "#fcca2a";
        $buttonArray['sidebar_menu_start']          = "#c29915";
        $buttonArray['sidebar_menu_end']            = "#c29915";
        $buttonArray['sidebar_list_color']          = "#ab850f";
        $buttonArray['sidebar_active_list_color']   = "#9a802b";

        return $buttonArray[$buttonName];
    }


    public function CurrencyGet($currency_code)
    {

        if(Cache::has('currency_cache')){

            return Cache::get($currency_code)?:null;

        }else{

            $config = Configs_Class::getInstance();
            $array = $config->getCurrency();

            return Cache::get($currency_code)?:null;

        }

    }


    public function insertImagePath($request,$imageName)
    {

        $destinationPath = public_path()."/assets/img/uploads";
        $extension =  $request->file($imageName)->getClientOriginalExtension();
        $fileName = time();
        $fileName .= rand(11111,99999).'.'.$extension; // renaming image
        if(!$request->file($imageName)->move($destinationPath,$fileName))
        {
            throw (new CommonException())->setValue('800',trans('localization::errors.800'));

        }

        $name = asset("assets/img/uploads")."/".$fileName;

        return $name;

    }


    public function passwordCheck($plainText,$hashedPassword,$message= '601')
    {

        if (Hash::check($plainText, $hashedPassword))
        {
            return true;
        }
        else
        {
            throw (new CommonException())->setValue($message,trans('localization::errors.'.$message));

        }


    }


    public function send_push($message,$title,$device_token,$type,$user_type)
    {

        if(!is_object($message))
        {

            $message = json_decode($message);

            $message->msg_id = rand(111,999);
            $message = json_encode($message);
        }
        else
        {
            $message->msg_id = rand(111,999);
        }

        if($type == 'android')
        {
            dispatch(new AndroidPushNotificationJob($device_token,$message,$title));
        }
        else
        {
            dispatch(new IosPushNotificationJob($device_token,$message,$title,$user_type));
        }

    }


    public function php_to_node($variableName,$values,$portNumber= 3002)
    {

        dispatch(new PhpToNodeJob($variableName,$values,$portNumber));

    }

    public function php_to_node_structure($id,$type,$message,$event)
    {
        $structure = array();
        $structure['id']= $id;
        $structure['type']= $type;
        $structure['message']= $message;
        $structure['event']= $event;
        return $structure;
        // return json_encode($structure);
    }

    public function Constant_email_data()
    {

        $applicationName = GetConfigs::getConfigs('application_name');
        $helpEmail = GetConfigs::getConfigs('help_email');
        $headOfficeNumber = GetConfigs::getConfigs('head_office_number');
        $date = date("Y-m-d h:i:s");

        $type = array('appName'=>$applicationName,
            'helpEmail'=>$helpEmail,
            'headOfficeNumber'=>$headOfficeNumber,
            'date'=>$date);

        return $type;
    }

    public function email($id,$lang)
    {

      if(is_int($id))
      {
        $titleArray = Array
        (
            '1' => 'welcome_email',
            '2' => 'request_email',
            '3' => 'hero_approved_email',
            '5' => 'request_accept_email_to_user',
            '6' => 'request_complete_email_to_user',
            '7' => 'request_accept_email_to_hero',
            '8' => 'request_complete_email_to_hero',
            '9' => 'company_welcome_mail',
            '10' => 'compliant_registered',
            '11' => 'compliant_status_change',
            '12' => 'document_expiry_email_to_driver',
            '13' => 'document_expiry_memo_email_to_driver',
        );

        $title = $titleArray[$id];
      }
      else
      {
        $title = $id;
      }

      $langList = config('app.languages');


      if(!in_array($lang ,$langList ))
      {
        $lang = 'en';
      }

      $selectArray = array('status','message');
      $obj = new TrailEmailTask;

      $email = EmailLangModel::select($selectArray)
       ->where('title',$title)
       ->where('lang',$lang)
       ->first();

      if(count($email) == 0)
      {
        $email = EmailSettingsModel::select($selectArray)
            ->where('title',$title)
            ->first();
      }
        $email =  EmailSettingsModel::select('status','message')->where('id',$id)->first();
        return $email;
    }

    public function sms($id)
    {
        $lang = $this->api_user_language();

        $smsTitleArray = array('dummy','sms_otp','sms_forgot_password','sms_request',
            'request_accept_sms_to_user','request_complete_sms_to_user',
            'request_accept_sms_to_hero','request_complete_sms_to_hero',
            'hero_approved','request_cancelled','dispatch _user'
        );
        $title = $smsTitleArray[$id];

        $sms = $this->sms_value_reterive($title,$lang);

        $applicationName = GetConfigs::getConfigs('application_name');
        $helpEmail = GetConfigs::getConfigs('help_email');
        $headOfficeNumber = GetConfigs::getConfigs('head_office_number');
        $date = date("Y-m-d h:i:s");

        $smsMessage  =  $sms->message;
        if (strpos($smsMessage, '%appName%') !== false)
        {
            $smsMessage =  str_replace("%appName%",$applicationName,$smsMessage);
        }

        if (strpos($smsMessage, '%helpEmail%') !== false)
        {
            $smsMessage =  str_replace("%helpEmail%",$helpEmail,$smsMessage);
        }

        if (strpos($smsMessage, '%headOfficeNumber%') !== false)
        {
            $smsMessage =  str_replace("%headOfficeNumber%",$headOfficeNumber,$smsMessage);
        }
        if (strpos($smsMessage, '%date%') !== false)
        {
            $smsMessage =  str_replace("%date%",$date,$smsMessage);
        }

        $obj1 = new \stdClass;

        $obj1->status = $sms->status;
        $obj1->message = $smsMessage;

        return $obj1;
    }

    public function sms_value_reterive($title,$lang)
    {

      $select = array('is_active As status','message');

      $sms =  SmsSettingModel::select($select)
               ->where('title',$title)
               ->where('lang',$lang)
               ->first();

      if( count($sms) == 0)
      {
        $sms =  SmsModel::select($select)
              ->where('title',$title)
              ->first();
      }

      return $sms;

    }

    public static function api_user_language()
    {

      $lang = null;


     if(request()->header('Content-language') != null)
     {
         $lang = request()->header('content-language');
     }

      if($lang == null)
      {

          if(Session::has('lang'))
          {
            $lang = Session::get('lang');
          }
          else
          {
            $lang = 'en';
          }

      }

      return $lang;

    }
    public function user_email_number($id)
    {
        $user = UserTableModel::select('email','phone_number')->where('id',$id)->first();
        return $user;
    }
    public function driver_email_number($id)
    {

        $driver = DriverModel::select('phone_number','email')->where('id',$id)->first();
        return $driver;
    }
    public function request_user_driver($id)
    {

        $request = RequestModel::Join('Drivers', 'Drivers.id', '=', 'request.driver_id')
            ->Join('User', 'User.id', '=', 'request.user_id')
            ->select('request.request_id','Drivers.phone_number AS driverPhoneNumber','User.phone_number AS userPhoneNumber',
                'Drivers.email AS driverEmail','User.email AS userEmail',
                DB::raw("CONCAT(tab_Drivers.firstname,' ',tab_Drivers.lastname) as driverName"),
                DB::raw("CONCAT(tab_User.firstname,' ',tab_User.lastname) as userName"))
            ->where('request.id',$id)
            ->first();

        return $request;

    }

    public function user_compliant($id)
    {
        $userCompliant = UserCompliantModel::Join('User', 'User_Compliant.userid', '=', 'User.id')
            ->Join('Compliant', 'User_Compliant.title', '=', 'Compliant.id')
            ->select('User.email',
                'User_Compliant.description',
                DB::raw("CONCAT(tab_User.firstname,' ',tab_User.lastname) as userName"),
                'Compliant.title'
            )
            ->where('User_Compliant.id',$id)
            ->first();

        return $userCompliant;

    }
    public function driver_compliant($id)
    {
        $driverCompliant = DriverCompliantModel::Join('Drivers', 'Driver_Compliant.driverrid', '=', 'Drivers.id')
            ->Join('Compliant', 'Driver_Compliant.title', '=', 'Compliant.id')
            ->select('Drivers.email',
                'Driver_Compliant.description',
                DB::raw("CONCAT(tab_Drivers.firstname,' ',tab_Drivers.lastname) as driverName"),
                'Compliant.title'
            )
            ->where('Driver_Compliant.id',$id)
            ->first();

        return $driverCompliant;

    }

    public static function brainTree($toAccId,$amount,$service_fee_amount = 0)
    {
        $BObj = new Braintree();
        $gateway = $BObj->run();

        try {

            if (GetConfigs::getConfigs('auto_transfer') == 1)
            {
                $result = $gateway->transaction()->sale([
                    'merchantAccountId' => $toAccId,  //to
                    // 'customerId' => $fromAccId,  // from
                    'amount' => $amount,
                    'paymentMethodNonce' => 'nonce-from-the-client',
                    'options' => array(
                        'submitForSettlement' => true,
                        'holdInEscrow' => true,
                    ),
                    'serviceFeeAmount' => $service_fee_amount
                ]);

                $error_message = $result;

            }

            throw new Exception($error_message);
        }
        catch (Exception $e)
        {


            return $e->getMessage();
        }



    }



    public function dates()
    {

        $dates = array();

        $dates['today'] = Carbon::today();

        $dates['yesterday'] = Carbon::yesterday();

        $searchDay = 'Sunday';
        $searchDate = new Carbon();
        $currentWeekStartDate = Carbon::createFromTimeStamp(strtotime("last $searchDay", $searchDate->timestamp))->toDateTimeString();

        $dates['currentWeekStartDate'] = $currentWeekStartDate;

        $lastWeekStartDate = Carbon::createFromTimeStamp(strtotime("last $searchDay", $searchDate->timestamp))->subWeek(1)->toDateTimeString();

        $lastWeekEndDate = Carbon::createFromTimeStamp(strtotime("last $searchDay", $searchDate->timestamp))->subDay(1)->toDateTimeString();

        $dates['lastWeekStartDate'] = $lastWeekStartDate;
        $dates['lastWeekEndDate'] = $lastWeekEndDate;

        // current month

        $thisMonthFirstDay= new Carbon('first day of this month');
        $thisMonthLastDay = new Carbon('last day of this month');

        $dates['thisMonthFirstDay'] = $thisMonthFirstDay;
        $dates['thisMonthLastDay'] = $thisMonthLastDay;



    }

    public function SortDate($report,$request)
    {



        $searchDay = 'Sunday';
        $searchDate = new Carbon();
        $dateToFilter = 'request.created_at';

        //$request->date_option = 'current_year';

        if($request->date_option == 'today')
        {


            $report = $report->where($dateToFilter,'>',Carbon::today()->toDateTimeString());

        }
        if ($request->date_option == 'yesterday')
        {


            $report = $report
                ->where($dateToFilter,'<',Carbon::today()->toDateTimeString())
                ->where($dateToFilter,'>',Carbon::yesterday()->toDateTimeString());

        }
        if ($request->date_option == 'current_week')
        {

            $currentWeekStartDate = Carbon::createFromTimeStamp(strtotime("last $searchDay", $searchDate->timestamp))->toDateTimeString();

            $report = $report
                ->where($dateToFilter,'>',$currentWeekStartDate);

        }
        if ($request->date_option == 'last_week')
        {

            $lastWeekStartDate = Carbon::createFromTimeStamp(strtotime("last $searchDay", $searchDate->timestamp))->subWeek(1)->toDateTimeString();

            // $lastWeekEndDate = Carbon::createFromTimeStamp(strtotime("last $searchDay", $searchDate->timestamp))->subDay(1)->toDateTimeString();

            $lastWeekEndDate = Carbon::createFromTimeStamp(strtotime("last $searchDay", $searchDate->timestamp))->toDateTimeString();



            $report = $report
                ->where($dateToFilter,'<',$lastWeekEndDate)
                ->where($dateToFilter,'>',$lastWeekStartDate);

        }
        if ($request->date_option == 'current_month')
        {


            $thisMonthFirstDay= new Carbon('first day of this month') ;

            $report = $report
                ->where($dateToFilter,'>',$thisMonthFirstDay->toDateTimeString());

        }
        if ($request->date_option == 'previous_month')
        {


            $lastMonthFirstDay = new Carbon('first day of last month');

            $lastMonthLastDay = new Carbon('first day of this month');

            $report = $report
                ->where($dateToFilter,'>',$lastMonthFirstDay->toDateTimeString())
                ->where($dateToFilter,'<',$lastMonthLastDay->toDateTimeString());

        }
        if ($request->date_option == 'current_year')
        {



            $thisYearFirstDay = new Carbon('first day of this year');

            $report = $report
                ->where($dateToFilter,'>',$thisYearFirstDay->toDateTimeString());

        }
        if ($request->date_option == 'last_year')
        {



            $lastYearFirstDay = new Carbon('first day of last year');
            $thisYearFirstDay = new Carbon('first day of this year');



            $report = $report
                ->where($dateToFilter,'>',$lastYearFirstDay->toDateTimeString())
                ->where($dateToFilter,'<',$thisYearFirstDay->toDateTimeString());



        }
        if($request->date_option == 'date_select')
        {


            if($request->has('start_date') && $request->has('end_date'))
            {
                $fromDate = $request->start_date.' '.'00:00:00';
                $toDate   = $request->end_date.' '.'00:00:00';
            }
            else
            {
                return array('success'=>false,'error_message'=>'start_date & end_date both required');
            }



            $report = $report
                ->where($dateToFilter,'>',$fromDate)
                ->where($dateToFilter,'<',$toDate);
        }



        return $report;

    }

    public function basicFilter($report,$request)
    {
        if($request->company != NUll)
        {
            $report = $report
                ->where('Driver_Details.company',$request->company);
        }

        if($request->payment != Null)
        {

            if($request->payment == 0) // card
            {
                $report = $report
                    ->where('request.payment_opt',$request->payment);
            }

            if($request->payment == 1) // cash
            {
                $report = $report
                    ->where('request.payment_opt',$request->payment);
            }

            if($request->payment == 2) // wallet
            {
                $report = $report
                    ->where('request.payment_opt',$request->payment);
            }

        }

        return $report;

    }
    public static  function reterive_key()
    {
        if(session::has('reterive_key'))
        {
            $reterive_key = session::get('reterive_key');

        }
        else
        {
            $id = Session::get('id');
            $allDetails = Cache::get("adminDetails$id");

            $reterive_key = $allDetails["reterive_key"];
        }

        return $reterive_key;
    }

    public static function to_admin_key($id,$tableName,$column)
    {

        return $tableName::select($column)->where('id',$id)->first()->$column;

    }



    public static function get_area_name()
    {
        if(Session::has('area_name'))
        {
            $areaName = Session::get('area_name');

        }
        else
        {
            $areaName = ApiHelper::put_area_name();
        }

        return $areaName;
    }

    public static function put_area_name()
    {
      $areaNameGet = AdminModel::select('area_name','admin_key')
      ->where('role','99999')->where('is_active',1);


        $reterive_key = ApiHelper::reterive_key();


        if($reterive_key != 0)
        {
            $areaNameGet = $areaNameGet->where('admin_reference',$reterive_key);
        }

        $areaNameGet= $areaNameGet->get();


        if(count($areaNameGet) == 0)
        {
            $areaname = array();
        }
        else
        {
            foreach ($areaNameGet as $value)
            {
                $areaname[$value->admin_key] = $value->area_name;
            }
        }


        Session::put('areaName',$areaname);

        return $areaname;


    }


    public static function putAreaName()
    {
        $areaNameGet = AdminModel::select('area_name','admin_key')
            ->where('role','99999');

        $reterive_key = ApiHelper::reterive_key();

        if($reterive_key != 0)
        {
            $areaNameGet = $areaNameGet->where('admin_reference',$reterive_key);
        }

        $areaNameGet= $areaNameGet->get();

        if(count($areaNameGet) == 0)
        {
            $areaname = array();
        }
        else
        {
            foreach ($areaNameGet as $value)
            {
                $areaname[$value->admin_key] = $value->area_name;
            }
        }


        Session::put('areaName',$areaname);

        return $areaname;
    }

    public static function get_header_area_name()
    {
        if(Session::has('header_area_name'))
        {
            $areaName = Session::get('header_area_name');
        }
        else
        {
            $areaName = ApiHelper::put_header_area_name();
        }



        return $areaName;

    }

    public static function put_header_area_name()
    {
        $headerAreaName = AdminModel::select('area_name','admin_key')
            ->where('role','99999')
            ->where('is_active',1)
            ->get();


        if(count($headerAreaName) != 0)
        {
            foreach ($headerAreaName as $value)
            {
                $headerAreaNameNew[$value->admin_key] = $value->area_name;

            }
        }
        else
        {
            $headerAreaNameNew = array();
        }

        Session::get('header_area_name',$headerAreaNameNew);


        return $headerAreaNameNew;

    }

    public static function set_language($id = null , $lang = null)
    {

        if($id == null )
        {
            $id = substr(Session::get('sessionMemory')["key"], 3);

        }

        if($lang == null)
        {
            if(Session::has('admin_lang'))
            {
                $lang = Sesssion::get('admin_lang');
            }
            else
            {
                $lang = ApiHelper::get_language($id);
            }
        }

        Session::put('lang',$lang);



        return $lang;

    }

    public static function get_language($id)
    {
        $lang = AdminModel::select('language')
                ->where('id',$id)
                ->first();

        return $lang;
    }


    public static function convert_to_currency($value)
    {
      $text = (string)$value;



      if (strpos($text, '.') !== false)
      {
        $split = explode(".",$text);
          
        if(strlen($split[1]) == 1)
        {
          return $text.'0';
        }


      }
      else
      {
        return $text.'.00';
      }

    }

    public static function kilometer_to_miles($km)
    {
      return $km * 0.621371;
    }

    public static function miles_to_km($miles)
    {
      return $miles * 1.60934;
    }



}
