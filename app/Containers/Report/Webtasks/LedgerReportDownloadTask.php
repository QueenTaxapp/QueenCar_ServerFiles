<?php

namespace App\Containers\Report\Webtasks;

use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;
use App\Containers\Admin\Models\AdminModel;
use App\Containers\Admin\Models\AdminDetailsModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Containers\Request\Models\RequestModel;
use Carbon\Carbon;
use App\Containers\Admin\Webtasks\Message;
use App\Containers\Company\Webtasks\ReportDownloadTask;
use App\Containers\Common\ApiHelper;

/**
 * Class WebLoginTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class LedgerReportDownloadTask extends Task
{


    /**
     * @param      object
     *
     * @return  mixed
     */
    public function run($request)
    {
//        if($request->date_option == 'date_select')
//        {
//
//            if($request->has('start_date') && $request->has('end_date'))
//            {
//
//                if($request->start_date == null || $request->end_date == null)
//                {
//                    throw new ValidationException((new Message()),redirect()->back()
//                        ->withErrors([trans('localization::errors.start_date_and_end_date_required')], 'default'));
//                }
//
//                if($request->start_date > $request->end_date)
//                {
//                    throw new ValidationException((new Message()),redirect()->back()
//                        ->withErrors([trans('localization::errors.start_date_not_greater_than_end_date')], 'default'));
//                }
//            }
//
//        }

        $select = array('request_place.pick_location','request_place.drop_location','Driver_Details.company as Company_id','request.request_id','Company.company_name','request.trip_start_time','request.payment_opt as payment_method','request.is_paid as payment_status','request.created_at','request.is_completed','request.is_cancelled','Driver_Details.company','request_bill.base_price','request_bill.base_distance','request_bill.price_per_distance','request_bill.price_per_time','request_bill.distance_price','request_bill.time_price' ,'request_bill.waiting_price','request_bill.service_tax' ,'request_bill.service_tax_percentage','request_bill.promo_amount','request_bill.referral_amount','request_bill.wallet_amount' ,'request_bill.service_fee','request_bill.driver_amount' ,'request_bill.total',DB::raw('CONCAT(tab_User.firstname, " ",tab_User.lastname) AS rider_name'),DB::raw('CONCAT(tab_Drivers.firstname, " ",tab_Drivers.lastname) AS driver_name'));


        $ledger = RequestModel::leftJoin('zone_type','request.type','=','zone_type.id')
            ->leftJoin('zone','zone_type.zone_id','=','zone.id')
            ->leftJoin('Drivers','request.driver_id','=','Drivers.id')
            ->leftJoin('User','request.user_id','=','User.id')
            ->leftJoin('Driver_Details','Drivers.id','=','Driver_Details.driver_id')
            ->leftJoin('Company','Driver_Details.company','=','Company.id')
            ->leftJoin('request_bill','request.id','=','request_bill.request_id')
            ->leftJoin('request_place','request.id','=','request_place.request_id')

            ->select($select);



        $reterive_key = ApiHelper::reterive_key();

        if($reterive_key != 0)
        {
            $ledger = $ledger->where('zone.admin_reference',$reterive_key);
        }




        $obj = new ApiHelper;

        $report = $obj->SortDate($ledger,$request);

        $report = $obj->basicFilter($ledger,$request);


        if($request->status != Null)
        {
            $report = $report
                ->where('Driver_Details.company',$request->company);
        }

        if($request->trip_status != Null)
        {

            if($request->trip_status == 1)
            {
                $report = $report
                    ->where('request.is_completed',1);
            }

            if($request->trip_status == 2)
            {
                $report = $report
                    ->where('request.is_cancelled',1);
            }

        }

        if($request->user_name != NULL)
        {
            $report = $report
                ->where(DB::raw('CONCAT_WS(" ", tab_User.firstname, tab_User.lastname)'), 'like','%'.$request->user_name.'%');

        }

        if($request->driver != NULL)
        {
            $report = $report
                ->where(DB::raw('CONCAT_WS(" ", tab_Drivers.firstname, tab_Drivers.lastname)'), 'like','%'.$request->driver.'%');

        }


        $obj = new ReportDownloadTask;


        $heading = array(trans('localization::lang_view.request_id')
        ,trans('localization::lang_view.rider'),trans('localization::lang_view.driver')
        ,trans('localization::lang_view.company_name'), trans('localization::lang_view.date/time'),trans('localization::lang_view.pick_location'),
            trans('localization::lang_view.drop_location'),
            trans('localization::lang_view.trip_status'),
            trans('localization::lang_view.base_price'),
            trans('localization::lang_view.base_distance'),
            trans('localization::lang_view.price_per_distance'),
            trans('localization::lang_view.price_per_time'),
            trans('localization::lang_view.distance_price'),
            trans('localization::lang_view.time_price'),
            trans('localization::lang_view.waiting_price'),
            trans('localization::lang_view.service_tax'),
            trans('localization::lang_view.service_tax_percentage'),
            trans('localization::lang_view.promo_amount'),
            trans('localization::lang_view.referral_amount'),
            trans('localization::lang_view.wallet_amount'),
            trans('localization::lang_view.service_fee'),
            trans('localization::lang_view.driver_amount'),
            trans('localization::lang_view.total'),
            trans('localization::lang_view.is_paid'),
            trans('localization::lang_view.payment_opt'),

        );


        //  $key = array('request_id','country','city','rider_name','driver_name','company_name','trip_start_time','rating','comment');



        $key = array( 'request_id' ,'rider_name','driver_name','company_name','trip_start_time','pick_location','drop_location','trip_status','base_price','base_distance','price_per_distance'
        ,'price_per_time','distance_price','time_price','waiting_price','service_tax','service_tax_percentage','promo_amount','referral_amount','wallet_amount','service_fee',
            'driver_amount','total','payment_status','payment_method');


        $values = $report->get();

       // echo"<pre>";print_r($values);die();


        $title = trans('localization::lang_view.ledger_report');
        $obj->run($heading,$values,$key,$title);
    }

}
