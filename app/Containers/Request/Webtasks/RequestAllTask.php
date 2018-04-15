<?php

namespace App\Containers\Request\Webtasks;

use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\DB;
use App\Containers\Admin\Models\User;
use App\Containers\Admin\Models\AdminModel;
use App\Containers\Admin\Models\AdminDetails;
use Illuminate\Support\Facades\Hash;
use App\Containers\Admin\Models\AdminTypesModel;

class RequestAllTask
{
    /**
     * @param      $heading array
     * @param      $values  object
     * @param      $key     array
     * @param      $title     string
     * @return  document
     */
    public function run($result)
    {
//        echo "<pre>";
//        print_r($result);
//        die();
        $array = array();

        foreach ($result as $value)
        {

            $obj1 = new \stdClass;

            $obj1->id = $value['id'];
            $obj1->request_id = $value['request_id'];
            $obj1->userName = $value['userName'];
            $obj1->driverName = $value['driverName'];
            $obj1->trip_start_time = $value['trip_start_time'];
            $obj1->is_completed = $value['is_completed'];
            $obj1->is_cancelled = $value['is_cancelled'];
            $obj1->payment_opt = $value['payment_opt'];
            $obj1->is_paid = $value['is_paid'];
            $obj1->is_trip_start = $value['is_trip_start'];

            if($value['is_cancelled'] == 1 && $value['is_completed'] == 0 )
            {
                //trip cancelled
                $obj1->is_trip_start_message = trans('localization::lang_view.trip_cancelled');


            }
            else if($value['is_trip_start'] == 0)
            {
                $obj1->is_trip_start_message = trans('localization::lang_view.trip_not_yet_started');
                //trip not yet started


            }

            else if ($value['is_cancelled'] == 0 && $value['is_completed'] == 1 && $value['is_trip_start'] == 1)
            {
                // trip completed
                $obj1->is_trip_start_message = trans('localization::lang_view.trip_completed');

            }

            if($value['is_paid'] == 0 )
            {
                //un paid
                $obj1->is_paid_message = trans('localization::lang_view.un_paid');
            }
            else if($value['is_paid'] == 1)
            {
                //paid
                $obj1->is_paid_message = trans('localization::lang_view.paid');
            }


            if( $value['payment_opt'] == 1)
            {
                //payment_opt_1
                $obj1->payment_opt_message = trans('localization::lang_view.cash');
            }
            else if ( $value['payment_opt'] == 2)
            {
                // payment_opt_2
                $obj1->payment_opt_message = trans('localization::lang_view.wallet');
            }
            else if($value['payment_opt'] == 3)
            {
                $obj1->payment_opt_message = trans('localization::lang_view.wallet/cash');

            }
            else if($value['payment_opt'] == 0)
            {
                $obj1->payment_opt_message = trans('localization::lang_view.card');

            }
            else
            {
                $obj1->payment_opt_message = '-';
            }



            $array[] = $obj1;
        }


        return  $array;
        
    }

}