<?php

namespace App\Containers\Review\Webtasks;

use App\Containers\Common\ApiHelper;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;
use App\Containers\Admin\Models\User;
use App\Containers\Admin\Models\AdminModel;
use App\Containers\Admin\Models\AdminDetails;
use Illuminate\Support\Facades\Hash;
use App\Containers\Admin\Models\AdminTypesModel;

use App\Containers\Common\GetConfigs;
use App\Containers\Company\Webtasks\ReportDownloadTask;
use App\Containers\Review\Models\DriverReviewModel;
use Illuminate\Support\Facades\Session;


/**
 * Class ReviewTask
 * @package App\Containers\Review\Webtasks
 */
class ReviewTask
{
    /**
     * @param $tableName
     * @param $request
     * @param $title
     * @return object|string
     */
    public function run($tableName, $request, $title)
    {



        $page = GetConfigs::getConfigs('paginate');

        $request->session()->put('filter_type',"");
        $request->session()->put('filter_value',"");

        $user="";


        if($tableName == 'App\Containers\Review\Models\DriverReviewModel')
        {


            $UserReview = DriverReviewModel::join('Drivers', 'Driver_Review.driver_id', '=', 'Drivers.id')
                ->join('User', 'Driver_Review.user_id', '=', 'User.id')
                ->select(DB::raw("CONCAT(tab_User.firstname,' ',tab_User.lastname) as user_name"),DB::raw("CONCAT(tab_Drivers.firstname,' ',tab_Drivers.lastname) as driver_name"),'Driver_Review.id','Driver_Review.driver_id','Driver_Review.rating','Driver_Review.comment','Driver_Review.request_id','Driver_Review.user_id','Drivers.admin_reference');
        }
        else
        {
            $UserReview = $tableName::join('Drivers', 'User_Review.driver_id', '=', 'Drivers.id')
                ->join('User', 'User_Review.user_id', '=', 'User.id')
                ->select(DB::raw("CONCAT(tab_User.firstname,' ',tab_User.lastname) as user_name"),DB::raw("CONCAT(tab_Drivers.firstname,' ',tab_Drivers.lastname) as driver_name"),'User_Review.id','User_Review.driver_id','User_Review.rating','User_Review.comment','User_Review.request_id','User_Review.user_id','Drivers.admin_reference');
        }


        $reportValue = $UserReview->orderBy('id','desc')->get();

        $reterive_key =  ApiHelper::reterive_key();

        if($reterive_key != 0)
        {
            $UserReview = $UserReview->where('Drivers.admin_reference', $reterive_key);
        }


        if($request->has('filter_value') && $request->has('filter_type'))
        {

            $filter_type =  $request['filter_type'];

            if($filter_type == 'driver_name')
            {
                $UserReview = $UserReview->where(DB::raw('CONCAT_WS(" ", tab_Drivers.firstname, tab_Drivers.lastname)'), 'like','%'.$request['filter_value'].'%');
            }
            else
            {
                $UserReview = $UserReview->where(DB::raw('CONCAT_WS(" ", tab_User.firstname, tab_User.lastname)'), 'like','%'.$request['filter_value'].'%');

            }


            // $UserReview = $UserReview->where($filter_type,'like','%'.$request['filter_value'].'%');

            $request->session()->put('filter_type',$request['filter_type']);

            $request->session()->put('filter_value',$request['filter_value']);


            if($request->submit && $request->submit == 'Download_Report')
            {

                $value = $UserReview->orderBy('id','desc')->get();

                $heading = array(
                    trans('localization::lang_view.user_name'),
                    trans('localization::lang_view.rating'),
                    trans('localization::lang_view.comment'),
                    trans('localization::lang_view.request_id'),
                    trans('localization::lang_view.driver_name')
                );

                $key = array('user_name','rating','comment','request_id','driver_name');

                // Company_report , user_review_report
                $obj = new ReportDownloadTask;
                $obj->run($heading,$value,$key,$title);
                // $this->call(ReportDownloadTask::class, [$heading,$value,$key,$title]);

            }
        }
        else
        {
            $UserReview = $UserReview->orderBy('id','desc');
            if($request->submit && $request->submit == 'Download_Report')
            {

                $value = $UserReview->orderBy('id','desc')->get();

                $heading = array(
                    trans('localization::lang_view.user_name'),
                    trans('localization::lang_view.rating'),
                    trans('localization::lang_view.comment'),
                    trans('localization::lang_view.request_id'),
                    trans('localization::lang_view.driver_name')
                );

                $key = array('user_name','rating','comment','request_id','driver_name');

                // Company_report , user_review_report
                $obj = new ReportDownloadTask;
                $obj->run($heading,$value,$key,$title);
                // $this->call(ReportDownloadTask::class, [$heading,$value,$key,$title]);

            }

        }

        $UserReview = $UserReview->paginate($page);;

        $user = (object)$UserReview;

        return $user;
    }

}