<?php

namespace App\Containers\Report\Webtasks;

use App\Containers\Common\ApiHelper;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use App\Containers\Request\Models\RequestModel;
use Carbon\Carbon;
use App\Containers\Admin\Webtasks\Message;
use App\Containers\Company\Webtasks\ReportDownloadTask;


class DriverRatingReportDownloadTask extends Task
{

    public function run($request)
    {

        if($request->who == NULL)
        {
            throw new ValidationException((new Message()),redirect()->back()
                ->withErrors([trans('localization::errors.select_user_or_driver')], 'default'));
        }



        if($request->who == 1)
        {
            $select = array('Driver_Details.company as Company_id','request.request_id','User.country','User.city','Company.company_name','request.trip_start_time','request.created_at','User_Review.rating','User_Review.comment',DB::raw('CONCAT(tab_User.firstname, " ",tab_User.lastname) AS rider_name'),DB::raw('CONCAT(tab_Drivers.firstname, " ",tab_Drivers.lastname) AS driver_name','Driver_Details.company'));




            $driverRating = RequestModel::join('zone_type','request.type','=','zone_type.id')
                ->join('zone','zone_type.zone_id','=','zone.id')
                ->leftjoin('Drivers','request.driver_id','Drivers.id')
                ->leftjoin('User','request.user_id','User.id')
                ->leftjoin('Driver_Details','Drivers.id','Driver_Details.driver_id')
                ->leftjoin('Company','Company.id','Driver_Details.company')
                ->leftjoin('User_Review','request.id','User_Review.request_id')
                ->select($select);




        }
        elseif ($request->who == 2)
        {
            $select = array('Driver_Details.company as Company_id','request.request_id','Drivers.country','Drivers.city','Company.company_name','request.trip_start_time','request.created_at','Driver_Review.rating','Driver_Review.comment',DB::raw('CONCAT(tab_User.firstname, " ",tab_User.lastname) AS rider_name'),DB::raw('CONCAT(tab_Drivers.firstname, " ",tab_Drivers.lastname) AS driver_name','Company.id'));

            $driverRating = RequestModel::join('zone_type','request.type','=','zone_type.id')
                ->join('zone','zone_type.zone_id','=','zone.id')
                ->join('Drivers','request.driver_id','Drivers.id')
                ->join('User','request.user_id','User.id')
                ->join('Driver_Details','Driver_Details.id','request.driver_id')
                ->leftjoin('Company','Company.id','Driver_Details.company')
                ->leftjoin('Driver_Review','request.id','Driver_Review.request_id')
                ->select($select)
                ->where('request.is_cancelled',0);


            $reterive_key = ApiHelper::reterive_key();

            if($reterive_key != 0)
            {
                $driverRating = $driverRating->where('zone.admin_reference',$reterive_key);
            }

        }






        $report = $driverRating;


        $searchDay = 'Sunday';
        $searchDate = new Carbon();
        $dateToFilter = 'request.created_at';



        if($request->date_option == 'today')
        {


            $report = $report->where($dateToFilter,'>',Carbon::today()->toDateTimeString());

        }
        elseif ($request->date_option == 'yesterday')
        {


            $report = $report
                ->where($dateToFilter,'<',Carbon::today()->toDateTimeString())
                ->where($dateToFilter,'>',Carbon::yesterday()->toDateTimeString());

        }
        elseif ($request->date_option == 'current_week')
        {
            $currentWeekStartDate = Carbon::createFromTimeStamp(strtotime("last $searchDay", $searchDate->timestamp))->toDateTimeString();

            $report = $report
                ->where($dateToFilter,'>',$currentWeekStartDate);

        }
        elseif ($request->date_option == 'last_week')
        {
            $lastWeekStartDate = Carbon::createFromTimeStamp(strtotime("last $searchDay", $searchDate->timestamp))->subWeek(1)->toDateTimeString();

            // $lastWeekEndDate = Carbon::createFromTimeStamp(strtotime("last $searchDay", $searchDate->timestamp))->subDay(1)->toDateTimeString();

            $lastWeekEndDate = Carbon::createFromTimeStamp(strtotime("last $searchDay", $searchDate->timestamp))->toDateTimeString();



            $report = $report
                ->where($dateToFilter,'<',$lastWeekEndDate)
                ->where($dateToFilter,'>',$lastWeekStartDate);

        }
        elseif ($request->date_option == 'current_month')
        {

            $thisMonthFirstDay= new Carbon('first day of this month') ;

            $report = $report
                ->where($dateToFilter,'>',$thisMonthFirstDay->toDateTimeString());

        }
        elseif ($request->date_option == 'previous_month')
        {

            $lastMonthFirstDay = new Carbon('first day of last month');

            $lastMonthLastDay = new Carbon('first day of this month');

            $report = $report
                ->where($dateToFilter,'>',$lastMonthFirstDay->toDateTimeString())
                ->where($dateToFilter,'<',$lastMonthLastDay->toDateTimeString());

        }
        elseif ($request->date_option == 'current_year')
        {


            $thisYearFirstDay = new Carbon('first day of this year');

            $report = $report
                ->where($dateToFilter,'>',$thisYearFirstDay->toDateTimeString());

        }
        elseif ($request->date_option == 'last_year')
        {

            $lastYearFirstDay = new Carbon('first day of last year');
            $thisYearFirstDay = new Carbon('first day of this year');


            $report = $report
                ->where($dateToFilter,'>',$lastYearFirstDay->toDateTimeString())
                ->where($dateToFilter,'<',$thisYearFirstDay->toDateTimeString());

        }
        else if($request->date_option == 'date_select')
        {
            if($request->has('start_date') && $request->has('end_date'))
            {
//                $fromDate = $request->start_date.' '.'00:00:00';
//                $toDate   = $request->end_date.'00:00:00';

                $startDate = $request->start_date.' '.'00:00:00';
                $endDate = $request->end_date.' '.'00:00:00';
            }
            else
            {
                return array('success'=>false,'error_message'=>'start_date & end_date both required');
            }



            $report = $report
                ->where($dateToFilter,'>',$startDate)
                ->where($dateToFilter,'<',$endDate);
        }



        if($request->company != NUll)
        {
            $report = $report
                ->where('Driver_Details.company',$request->company);
        }


        //   throw new ValidationException((new Message()),redirect()->to('admin/add')
        //      ->withErrors([trans('localization::errors.details_could_not_saved_in')].$details, 'default'));

        //return array('success'=>"TRUE",'message'=>trans('localization::errors.admin_added_successfully'));

        $obj = new ReportDownloadTask;


        $heading = array(trans('localization::lang_view.request_id'),trans('localization::lang_view.country'),
            trans('localization::lang_view.city'),trans('localization::lang_view.rider'),
            trans('localization::lang_view.driver'),trans('localization::lang_view.company_name'),
            trans('localization::lang_view.date/time'),trans('localization::lang_view.rating'),
            trans('localization::lang_view.feedback'));


        $key = array('request_id','country','city','rider_name','driver_name','company_name','trip_start_time','rating','comment');
        $values = $report->get();
        $title = trans('localization::lang_view.review_report');
        $obj->run($heading,$values,$key,$title);


    }

}