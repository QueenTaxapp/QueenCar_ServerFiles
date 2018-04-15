<?php

namespace App\Containers\Report\Webtasks;

use App\Containers\Common\ApiHelper;
use App\Containers\Company\Webtasks\ReportDownloadTask;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class FinancialReportDownloadTask extends Task
{
    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {
        //echo "<pre>";print_r($request->all());die();

        $date_option = $request->date_option;

        if (!empty($date_option)) {


            if ($date_option == 'today') {
                $date_query = "tab_request.trip_start_time BETWEEN
                               DATE_FORMAT(NOW(),'%Y-%m-%d 00:00:00')
                               and
                               DATE_FORMAT(NOW(),'%Y-%m-%d 23:59:59') OR 
                               tab_request.created_at BETWEEN
                               DATE_FORMAT(NOW(),'%Y-%m-%d 00:00:00')
                               and
                               DATE_FORMAT(NOW(),'%Y-%m-%d 23:59:59')";

            } elseif ($date_option == 'yesterday') {
                $date_query = " tab_request.trip_start_time BETWEEN
                                DATE_FORMAT((NOW() - interval 1 day),'%Y-%m-%d 00:00:00')
                                and
                                DATE_FORMAT((NOW() - interval 1 day),'%Y-%m-%d 23:59:59') OR
                                tab_request.created_at BETWEEN
                                DATE_FORMAT((NOW() - interval 1 day),'%Y-%m-%d 00:00:00')
                                and
                                DATE_FORMAT((NOW() - interval 1 day),'%Y-%m-%d 23:59:59')";
            } elseif ($date_option == 'current_week') {
                $date_query = " tab_request.trip_start_time BETWEEN
                                Date_format(Date_sub(now(),interval (Dayofweek(now()) - 1) DAY),'%Y:%m:%d 00:00:00')
                                and
                                Date_format(Date_add(now(),interval (7-Dayofweek(now())) DAY),'%Y:%m:%d 23:59:59') OR
                                tab_request.created_at BETWEEN
                                Date_format(Date_sub(now(),interval (Dayofweek(now()) - 1) DAY),'%Y:%m:%d 00:00:00')
                                and
                                Date_format(Date_add(now(),interval (7-Dayofweek(now())) DAY),'%Y:%m:%d 23:59:59')";


            } elseif ($date_option == 'last_week') {
                $date_query = " tab_request.trip_start_time BETWEEN
                                Date_format(Date_sub(now(),interval (06 +Dayofweek(now())) DAY),'%Y:%m:%d 00:00:00')
                                and
                                Date_format(Date_sub(now(),interval Dayofweek(now()) DAY),'%Y:%m:%d 23:59:59') OR
                                tab_request.created_at BETWEEN
                                Date_format(Date_sub(now(),interval (06 +Dayofweek(now())) DAY),'%Y:%m:%d 00:00:00')
                                and
                                Date_format(Date_sub(now(),interval Dayofweek(now()) DAY),'%Y:%m:%d 23:59:59')";

            } elseif ($date_option == 'current_month') {

                $date_query = " tab_request.trip_start_time BETWEEN
                                DATE_FORMAT(NOW(),'%Y-%m-01 00:00:00')
                                and
                                DATE_FORMAT(LAST_DAY(NOW()), '%Y-%m-%d 23:59:59') OR 
                                tab_request.created_at BETWEEN
                                DATE_FORMAT(NOW(),'%Y-%m-01 00:00:00')
                                and
                                DATE_FORMAT(LAST_DAY(NOW()), '%Y-%m-%d 23:59:59')";

            } elseif ($date_option == 'previous_month') {

                $date_query = " tab_request.trip_start_time BETWEEN
                                DATE_FORMAT(NOW() - INTERVAL 1 MONTH,'%Y-%m-01 00:00:00')
                                and
                                DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), '%Y-%m-%d 23:59:59') OR 
                                tab_request.created_at BETWEEN
                                DATE_FORMAT(NOW() - INTERVAL 1 MONTH,'%Y-%m-01 00:00:00')
                                and
                                DATE_FORMAT(LAST_DAY(NOW() - INTERVAL 1 MONTH), '%Y-%m-%d 23:59:59')";
            } elseif ($date_option == 'current_year') {

                $date_query = " tab_request.trip_start_time BETWEEN
                                DATE_FORMAT(NOW(),'%Y-01-01 00:00:00')
                                and
                                DATE_FORMAT(LAST_DAY(DATE_ADD(NOW(), INTERVAL 12-MONTH(NOW()) MONTH)), '%Y-%m-%d 23:59:59' ) OR
                                tab_request.created_at BETWEEN
                                DATE_FORMAT(NOW(),'%Y-01-01 00:00:00')
                                and
                                DATE_FORMAT(LAST_DAY(DATE_ADD(NOW(), INTERVAL 12-MONTH(NOW()) MONTH)), '%Y-%m-%d 23:59:59' )";

            } elseif ($date_option == 'last_year') {

                $date_query = " tab_request.trip_start_time BETWEEN
                                DATE_FORMAT(DATE_sub(NOW(), INTERVAL MONTH(NOW()) MONTH), '%Y-01-01 00:00:00' )
                                and
                                DATE_FORMAT(last_day(DATE_sub(NOW(), INTERVAL MONTH(NOW()) MONTH)), '%Y-%m-%d 23:59:59' ) OR
                                tab_request.created_at BETWEEN
                                DATE_FORMAT(DATE_sub(NOW(), INTERVAL MONTH(NOW()) MONTH), '%Y-01-01 00:00:00' )
                                and
                                DATE_FORMAT(last_day(DATE_sub(NOW(), INTERVAL MONTH(NOW()) MONTH)), '%Y-%m-%d 23:59:59' )";

            } elseif ($date_option == 'date_select') {


                $start_date = $request->start_date." 00:00:00";
                $end_date = $request->end_date." 23:59:59";
                $start_time = date("Y-m-d H:i:s", strtotime($start_date));
                $end_time = date("Y-m-d H:i:s", strtotime($end_date));
                $date_query = " tab_request.trip_start_time BETWEEN " . "'" . $start_time . "'" . " and " . "'" . $end_time . "'" . " OR tab_request.created_at BETWEEN " . "'" . $start_time . "'" . " and " . "'" . $end_time . "'" . " ";
            }
        } else {
            $date_query = " ";
        }

        if ($request->has('user_id')) {
            $user_id = $request->user_id;
            $user_query = " AND tab_User.id = " . $user_id . "";
        } else {
            $user_query = " ";
        }
        // echo "<pre>";print_r($user_query);die();
        if ($request->has('driver_id')) {
            $driver_id = $request->driver_id;
            $driver_query = " AND tab_Drivers.id = " . $driver_id . "";
        } else {
            $driver_query = " ";
        }

        if ($request->has('company')) {
            $company = $request->company;
            $company_query = " AND tab_Driver_Details.company = " . $company . "";
        } else {
            $company_query = " ";
        }

        if ($request->has('payment')) {
            $payment_opt = $request->payment;
            $payment_query = " AND tab_request.payment_opt = " . $payment_opt . "";
        } else {
            $payment_query = " ";
        }

        if ($request->has('trip_status')) {
            $trip_status = $request->trip_status;
            if ($trip_status == 1) {
                $trip_query = (" AND tab_request.is_completed = 1" . " ");

            } elseif ($trip_status == 2) {
                $trip_query = (" AND tab_request.is_cancelled = 1" . " AND tab_request.is_completed = 0");
            } else {
                goto trip_skip;
            }
        }else {
            trip_skip:
            $trip_query = (" ");
        }

        $reterive_key = ApiHelper::reterive_key();

        if($reterive_key != 0)
        {
            $zone_query = " AND tab_zone.admin_reference = " . $reterive_key . " ";

        }else {
            $zone_query = " ";
        }

        //echo "<pre>";print_r($zone_query);die();

        $querytwo = DB::select(DB::raw("select 
                                           tab_request.id as request_id,tab_request.request_id as ride_no,tab_request.trip_start_time as trip_start_time,tab_request.created_at as request_create_time,tab_request.is_completed as is_completed,tab_request.is_cancelled as is_cancelled, tab_request.payment_opt as payment_method,
                                           tab_request_bill.total as total_fare, tab_request_bill.service_fee as commission, tab_request_bill.promo_amount as promo_amount, tab_request_bill.referral_amount as referral_amount, tab_request_bill.wallet_amount as wallet_amount, tab_request_bill.driver_amount as driver_amount,
                                           tab_User.id as user_id, CONCAT(tab_User.firstname,' ',tab_User.lastname) as user_name,
                                           tab_Drivers.id as driver_id, CONCAT(tab_Drivers.firstname,' ',tab_Drivers.lastname) as driver_name,
                                           tab_Driver_Details.company as company_id,
                                           tab_Company.company_name as company_name,
                                           tab_zone.admin_reference
                                           FROM tab_request
                                                 JOIN tab_zone_type on tab_request.type = tab_zone_type.id
                                                 JOIN tab_zone on tab_zone_type.zone_id = tab_zone.id
                                                 left JOIN tab_request_bill on tab_request.id = tab_request_bill.request_id
                                                 left JOIN tab_User on tab_request.user_id = tab_User.id
                                                 left JOIN tab_Drivers on tab_request.driver_id =  tab_Drivers.id
                                                 left JOIN tab_Driver_Details on tab_request.driver_id =  tab_Driver_Details.driver_id
                                                 left JOIN tab_Company on tab_Driver_Details.company =  tab_Company.id
                                                  where tab_request.deleted_at='' AND " . ' '.
            $date_query . ' ' .$zone_query . ' ' . $user_query . ' ' . $driver_query . ' ' . $company_query . ' ' . $payment_query . ' ' . $trip_query . " order by tab_request.id"
        ));

        //echo "<pre>";print_r($querytwo);die();

        $heading = array("request_id","user_name","driver_name","company","status","total","commission","promo_bonus","referral_bonus","wallet_debit","driver_amount","payment_method");

        foreach($heading as $value){
            $array[]=trans('localization::lang_view.'.$value);
        }
        $heading = $array;
        //print_r($array);die();

        $key = array('ride_no','user_name','driver_name','company_id','trip_status','total_fare','commission','promo_amount','referral_amount','wallet_amount','driver_amount','payment_method');
        //

        $doc = new ReportDownloadTask;
        $doc->run($heading,$querytwo,$key,trans('localization::lang_view.financial_reports'));

        echo "<pre>";print_r($querytwo);die();




        //   throw new ValidationException((new Message()),redirect()->to('admin/add')
        //      ->withErrors([trans('localization::errors.details_could_not_saved_in')].$details, 'default'));

        //return array('success'=>"TRUE",'message'=>trans('localization::errors.admin_added_successfully'));
    }



}