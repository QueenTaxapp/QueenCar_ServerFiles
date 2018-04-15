<?php

namespace App\Containers\Request\UI\WEB\Controllers;

use \Cache;
use stdClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Containers\Common\ApiHelper;
use App\Containers\Common\GetConfigs;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Containers\Request\Models\RequestModel;
use App\Ship\Parents\Controllers\WebController;
use App\Containers\Request\Webtasks\RequestAllTask;
use App\Containers\Request\Models\RequestBillModel;
use App\Containers\Company\Webtasks\ReportDownloadTask;

class Controller extends WebController
{
    use SoftDeletes;

    public function adminRequest(Request $request)
    {


        $id = $request->id;

        $tableName = 'App\Containers\Request\Models\RequestModel';

        $UserReview = $tableName::
        leftJoin('Drivers', 'Drivers.id', '=', 'request.driver_id')
            ->leftJoin('User', 'User.id', '=', 'request.user_id')
            ->leftJoin('Driver_Details', 'Drivers.id', '=', 'Driver_Details.driver_id')
            ->leftJoin('User_detail', 'User.id', '=', 'User_detail.user_id')
            ->leftJoin('request_place','request_place.request_id','request.id')
            ->leftJoin('zone_type','zone_type.id','request.type')
            ->leftJoin('zone','zone_type.zone_id','zone.id')
            ->leftJoin('Types','Types.id','Drivers.type')
            ->select(
                DB::raw("CONCAT(tab_User.firstname,' ',tab_User.lastname) as user_name"),
                "User.email as user_email","User.phone_number as user_phone_number","User.address as user_address","User.profile_pic as user_profile_pic",
                DB::raw("CONCAT(tab_Drivers.firstname,' ',tab_Drivers.lastname) as driver_name"),
                "Drivers.email as driver_email","Drivers.phone_number as driver_phone_number","Drivers.address as driver_address","Drivers.profile_pic as driver_profile_pic",
                "Driver_Details.review as driver_rating",
                "User_detail.review as user_rating",
                "request_place.pick_location",
                "request_place.drop_location",
                "request_place.pick_latitude",
                "request_place.pick_longitude",
                "request_place.drop_latitude",
                "request_place.drop_longitude",
                "Types.name as type",
                "zone_type.currency as zone_currency",
                "zone.name as zone_name",
                "request.trip_start_time",
                "request.unit"
            )
            ->where('request.id',$id)
            ->first();



        $array = array('miles','kilometer');
        $value = $array[$UserReview->unit];
        $unit = trans('localization::lang_view.'.$value);


        $selectArray = array('base_price','distance_price','price_per_distance','time_price','price_per_time','waiting_price','service_tax','referral_amount','promo_amount','total');
        $bill = RequestBillModel::select($selectArray)->where('request_id',$id)->first();



        $tempBill = array();
        foreach($selectArray as $billKey)
        {

            $tempBill[$billKey] = ApiHelper::convert_to_currency($bill[$billKey]);

        }


        $bill = $tempBill;

        $title = trans('localization::title.request');

        $page = "request_module";


        return view('request::RequestView',['request'=>$request,'value'=>$UserReview,'bill'=>$bill,'title'=>$title, 'page'=> $page,'unit'=>$unit]);

    }



    public function adminAllRequest(Request $request)
    {

        $paginate = GetConfigs::getConfigs('paginate');


        $request->session()->put('filter_type',"");
        $request->session()->put('filter_value1',"");
        $request->session()->put('filter_value2',"");
        $request->session()->put('filter_value3',"");
        $request->session()->put('filter_value4',"");
        $request->session()->put('filter_value5',"");
        $request->session()->put('filter_value6',"");


        $array = array();
        if($request->has('filter_type') )
        {
            if($request->filter_type == 'user_name'&& $request->filter_value1 == '' && $request->submit != 'Download_Report' )
            {

                goto next;
            }
            if($request->filter_type == 'driver_name' && $request->filter_value1 == '' && $request->submit != 'Download_Report' )
            {

                goto next;
            }
            if($request->filter_type == 'request_id' && $request->filter_value1 == '' && $request->submit != 'Download_Report' )
            {
                goto next;
            }

            $request->session()->put('filter_type',$request->filter_type);
            $request->session()->put('filter_value1',$request->filter_value1);
            $request->session()->put('filter_value2',$request->filter_value2);
            $request->session()->put('filter_value3',$request->filter_value3);
            $request->session()->put('filter_value4',$request->filter_value4);
            $request->session()->put('filter_value5',$request->filter_value5);
            $request->session()->put('filter_value6',$request->filter_value6);



            $result1  = RequestModel::leftjoin('User', 'User.id', '=', 'request.user_id')
                ->leftjoin('Drivers', 'Drivers.id', '=', 'request.driver_id')
                ->select('request.id','request.trip_start_time','request.created_at','request.request_id','request.is_completed','request.is_cancelled','request.payment_opt',
                    'request.request_id','request.is_paid','request.is_trip_start',
                    'Drivers.admin_reference',
                    DB::raw('CONCAT(tab_User.firstname, " ",tab_User.lastname) AS userName'),
                    DB::raw('CONCAT(tab_Drivers.firstname, " ",tab_Drivers.lastname) AS driverName'))
                ->orderBy('request.id','desc');


            $reterive_key =  ApiHelper::reterive_key();

            if($reterive_key != 0){

                $result1 = $result1->where('Drivers.admin_reference',$reterive_key);

            }


            if($request->filter_type == 'user_name'&& $request->filter_value1 == '' && $request->submit == 'Download_Report' )
            {

                goto report;
            }
            if($request->filter_type == 'driver_name' && $request->filter_value1 == '' && $request->submit == 'Download_Report' )
            {

                goto report;
            }
            if($request->filter_type == 'request_id' && $request->filter_value1 == '' && $request->submit == 'Download_Report' )
            {
                goto report;
            }

            if($request->filter_type == 'trip_status')
            {
                $column_value = $request->filter_value2 == 'is_trip_start' ? 0 : 1;




                if($request->filter_value2 == 'is_trip_start')
                {
                    $result1 = $result1->where($request->filter_value2,$column_value)
                        ->where('is_cancelled',0);

                }
                else if($request->filter_value2 == 'is_completed')
                {
                    $result1 = $result1->where($request->filter_value2,$column_value)
                        ->where('is_cancelled',0);
                }
                else
                {
                    $result1 = $result1->where($request->filter_value2,$column_value);
                }




            }
            else if($request->filter_type == 'is_paid')
            {
                $result1 = $result1->where('is_paid',$request->filter_value3);

            }
            else if($request->filter_type == 'payment_option')
            {
                $result1 = $result1->where('payment_opt',$request->filter_value4);
            }
            else if($request->filter_type == 'date_option')
            {
                $start =$request->filter_value5." 00:00:00";
                $end =$request->filter_value6." 23:59:59";

                $result1 = $result1->where('request.created_at','>',$start);//->orWhere('request.created_at','>',$start);
                $result1 = $result1->where('request.created_at','<',$end);//->orWhere('request.created_at','<',$end);
            }
            else if($request->filter_type == 'user_name')
            {

                $result1 = $result1->where(DB::raw('CONCAT_WS(" ", tab_User.firstname, tab_User.lastname)'), 'like','%'.$request['filter_value1'].'%');

            }
            else if($request->filter_type == 'driver_name')
            {
                $result1 = $result1->where(DB::raw('CONCAT_WS(" ", tab_Drivers.firstname, tab_Drivers.lastname)'), 'like','%'.$request['filter_value1'].'%');
            }
            else
            {
                $result1 = $result1->where('request_id',$request->filter_value1);

            }

            report:

            $res = $result1;



            if($request->submit == 'Download_Report' )
            {

                $report = $this->call(RequestAllTask::class, [$res->get()]);


                $heading = array(trans('localization::lang_view.request_id'),trans('localization::lang_view.user_name'),trans('localization::lang_view.driver_name'),trans('localization::lang_view.trip_status'),trans('localization::lang_view.is_paid'),trans('localization::lang_view.payment_option'));

                $key = array('request_id','userName','driverName','is_trip_start_message','is_paid_message','payment_opt_message');

                $title = trans('localization::lang_view.request_report');

                $this->call(ReportDownloadTask::class, [$heading,$report,$key,$title]);


            }

            $result1 = $result1->paginate($paginate);
        }
        else
        {
            next:
            $result1  = RequestModel::join('User', 'User.id', '=', 'request.user_id')
                ->join('Drivers', 'Drivers.id', '=', 'request.driver_id')
                ->select('request.id','request.trip_start_time','request.created_at','request.request_id','request.is_completed','request.is_cancelled','request.payment_opt',
                    'request.request_id','request.is_paid','request.is_trip_start',
                    DB::raw('CONCAT(tab_User.firstname, " ",tab_User.lastname) AS userName'),
                    DB::raw('CONCAT(tab_Drivers.firstname, " ",tab_Drivers.lastname) AS driverName'))
                ->orderBy('request.id','desc');

            $reterive_key =  ApiHelper::reterive_key();

            if($reterive_key != 0){

                $result1 = $result1->where('Drivers.admin_reference',$reterive_key);

            }

            $result1 = $result1->paginate($paginate);
        }


        $title = trans('localization::title.request');
        $page = "request_module";

        return view('request::RequestAllView2',['request'=>$request,'value'=>$result1,'result'=>$result1,'title'=>$title, 'page'=> $page]);


    }

    public function adminSchedule(Request $request)
    {
        $paginate = GetConfigs::getConfigs('paginate');

        $request->session()->put('filter_value',"");

        if($request->has('filter_value'))
        {

            $request->session()->put('filter_value',$request->filter_value);

            $result = RequestModel::join('zone_type','request.type','=','zone_type.id')
                ->join('zone','zone_type.zone_id','=','zone.id')
                ->join('User', 'User.id', '=', 'request.user_id')
                ->select('request.id','request.trip_start_time','request.request_id','request.is_completed','request.is_cancelled','request.is_trip_start',
                    DB::raw('CONCAT(tab_User.firstname, " ",tab_User.lastname) AS userName'))
                ->where('request.later',1);


            if($request->filter_value == 'is_scheduled')
            {
                $result = $result->where('is_trip_start',0)->where('is_cancelled',0)->where('is_completed',0);

            }
            elseif($request->filter_value == 'is_trip_start')
            {
                //print_r($request->filter_value);die();
                $result = $result->where('is_trip_start',1)->where('is_cancelled',0)->where('is_completed',0);

            }
            elseif($request->filter_value == 'is_completed')
            {
                $result = $result->where('is_completed',1);

            }
            elseif($request->filter_value == 'is_cancelled')
            {
                $result = $result->where('is_cancelled',1);
            }




        }
        else{

            $result = RequestModel::join('zone_type','request.type','=','zone_type.id')
                ->join('zone','zone_type.zone_id','=','zone.id')
                ->join('User', 'User.id', '=', 'request.user_id')
                ->select('zone.admin_reference','request.id','request.trip_start_time','request.request_id','request.is_completed','request.is_cancelled','request.is_trip_start',
                    DB::raw('CONCAT(tab_User.firstname, " ",tab_User.lastname) AS userName'))
                ->where('request.later',1)
                ->orderBy('request.is_cancelled','asc')
                ->orderBy('request.is_completed','asc')
                ->orderBy('request.is_trip_start','asc');



            //->paginate($paginate);
        }


        $reterive_key = ApiHelper::reterive_key();

        if($reterive_key != 0)
        {
            $result = $result->where('zone.admin_reference',$reterive_key);

        }


        $result = $result->paginate($paginate);
        $title = trans('localization::lang_view.schedule');
        $page = "schedule_module";
        return view('request::ScheduleView',['request'=>$request,'result'=>$result,'title'=>$title, 'page'=> $page]);

    }


    public function adminScheduleCancel(Request $request)
    {
        RequestModel::where('id',$request->id)->update(array('is_cancelled'=>1,'cancel_method'=>3));

        return Redirect::to("admin/schedule");
    }


}
