<?php

namespace App\Containers\Dispatch\ApiTask;

use App\Containers\User\Models\UserTableModel;
use App\Containers\User\Tasks\ApiCheckEmailTask;
use App\Ship\Exceptions\CommonException;

use App\Containers\Compliant\Models\UserCompliantModel;

use App\Containers\Promocode\Models\PromocodeModel;
use Carbon\Carbon;
use App\Containers\Promocode\Models\PromoCodeHistoryModel;
use App\Containers\Request\Models\RequestModel;

use App\Containers\Admin\Models\AdminModel;
use App\Containers\Admin\Tasks\DynamicApiEmailCheckTask;
use App\Containers\User\Tasks\ApiCheckPasswordTask;
use App\Containers\Drivers\Models\DriverModel;
use Illuminate\Support\Facades\DB;

/**
 * Class UserDetailTask
 * @package App\Containers\Promocode\ApiTask
 */
class DispatchDashboardTask
{

    /**
     * @param $data
     * @param $custom_parameter
     * @return mixed
     */
    public function run($data, $custom_parameter)
    {


        $selectArray = array('id','is_completed','is_cancelled','trip_start_time','created_at');
        $dashboard = RequestModel::select($selectArray)
           //        ->where('if_dispatch',1)
                    ->get();





        $dateColumn = 'created_at';

        $completedTrips = 0;
        $cancelledTrips = 0;
        $ongoingTrips   = 0;




        $Day7 =  Carbon::today()->subDay(1)->format('Y-m-d');
        $Day6 =  Carbon::today()->subDay(2)->format('Y-m-d');
        $Day5 =  Carbon::today()->subDay(3)->format('Y-m-d');
        $Day4 =  Carbon::today()->subDay(4)->format('Y-m-d');
        $Day3 =  Carbon::today()->subDay(5)->format('Y-m-d');
        $Day2 =  Carbon::today()->subDay(6)->format('Y-m-d');
        $Day1 =  Carbon::today()->subDay(7)->format('Y-m-d');

        $daysKey = array();
        $Day7Key =  Carbon::today()->subDay(1)->format('m-d');
        $Day6Key =  Carbon::today()->subDay(2)->format('m-d');
        $Day5Key =  Carbon::today()->subDay(3)->format('m-d');
        $Day4Key =  Carbon::today()->subDay(4)->format('m-d');
        $Day3Key =  Carbon::today()->subDay(5)->format('m-d');
        $Day2Key =  Carbon::today()->subDay(6)->format('m-d');
        $Day1Key =  Carbon::today()->subDay(7)->format('m-d');

        $daysKey = array($Day7Key,$Day6Key,$Day5Key,$Day4Key,$Day3Key,$Day2Key,$Day1Key);
        $Last7daysdates = array($Day7,$Day6,$Day5,$Day4,$Day3,$Day2,$Day1);


        $last7DaysRequestCount = array();

        foreach ($Last7daysdates as $dates )
        {
            $last7DaysRequestCount[$dates] = 0;

        }
        foreach ($daysKey as $dates )
        {
            $Last7daysdatesKey[$dates] = 0;

        }




        $month1     =   Carbon::now()->startOfMonth()->subMonth(1)->format('Y-m');
        $month2     =   Carbon::now()->startOfMonth()->subMonth(2)->format('Y-m');
        $month3     =   Carbon::now()->startOfMonth()->subMonth(3)->format('Y-m');
        $month4     =   Carbon::now()->startOfMonth()->subMonth(4)->format('Y-m');
        $month5     =   Carbon::now()->startOfMonth()->subMonth(5)->format('Y-m');
        $month6     =   Carbon::now()->startOfMonth()->subMonth(6)->format('Y-m');
//        $month7     =   Carbon::now()->startOfMonth()->subMonth(7)->format('Y-m');
//        $month8     =   Carbon::now()->startOfMonth()->subMonth(8)->format('Y-m');
//        $month9     =   Carbon::now()->startOfMonth()->subMonth(9)->format('Y-m');
//        $month10    =   Carbon::now()->startOfMonth()->subMonth(10)->format('Y-m');
//        $month11    =   Carbon::now()->startOfMonth()->subMonth(11)->format('Y-m');
//        $month12    =   Carbon::now()->startOfMonth()->subMonth(12)->format('Y-m');


        $last12Month = array($month1,$month2,$month3,$month4,$month5,$month6);

        foreach ($last12Month as $value)
        {

            $last12MonthsCompleteCount[$value] = 0;
        }

        $last12MonthsCancelledCount = $last12MonthsCompleteCount;



        foreach ($dashboard as $value)
        {
            if($value->is_completed == 1)
            {
                $completedTrips = $completedTrips+1;
            }
            else if($value->is_cancelled == 1)
            {
                $cancelledTrips = $cancelledTrips+1;
            }
            else if($value->is_cancelled == 0 && $value->is_completed == 0)
            {
                $ongoingTrips = $ongoingTrips+1;
            }



            if(in_array($value->$dateColumn->format('Y-m-d'),$Last7daysdates ))
            {


                if($value->is_completed == 1)
                {


                    $Last7daysdatesKey[$value->$dateColumn->format('m-d')] = $Last7daysdatesKey[$value->$dateColumn->format('m-d')]+1;

                }

            }


            if(in_array($value->$dateColumn->format('Y-m'),$last12Month ))
            {
                if($value->is_completed == 1)
                {
                    $last12MonthsCompleteCount[$value->$dateColumn->format('Y-m')] = $last12MonthsCompleteCount[$value->$dateColumn->format('Y-m')]+1;

                }

                if($value->is_cancelled == 1)
                {
                    $last12MonthsCancelledCount[$value->$dateColumn->format('Y-m')] = $last12MonthsCancelledCount[$value->$dateColumn->format('Y-m')]+1;

                }
            }



        }

        $result = array(


            'completedTrips'=> $completedTrips ,
            'cancelledTrips'=> $cancelledTrips ,
            'ongoingTrips'=> $ongoingTrips ,
            'last7DaysCompletedTrips'=>$Last7daysdatesKey,
            'last12MonthsCompletedTrips'=>$last12MonthsCompleteCount,
            'last12MonthsCancelledTrips'=>$last12MonthsCancelledCount,

        );


//        echo "<pre>";
//        print_r($result);
//
//        die();

        // success transformer message

        $response = new \stdClass();

        $response->success = 'true';

        $response->success_message = " dispatch_dashboard";

        $response->key = 'dispatch_dashboard';

        $tempArray = $result;


        $response->dispatcher =$tempArray;



        $data['response']= $response;


        return $data;

    }
}