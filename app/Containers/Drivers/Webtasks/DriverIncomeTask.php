<?php

namespace App\Containers\Drivers\Webtasks;

use App\Containers\Drivers\Models\DriverDetailModel;
use App\Containers\Drivers\Models\DriverModel;
use App\Containers\User\Models\Country;
use App\Ship\Parents\Tasks\Task;
use App\Ship\Exceptions\CommonException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DriverIncomeTask extends Task
{

    public function run($driverId,$days)
    {

        if($days == 'null')
        {
            $result = DB::select("SELECT count(tab_request.id) as total_trip,sum(tab_request_bill.driver_amount) as total_earned,sum(IF(tab_DriverPaid.transfer_id != 0,1,0)) as transfered ,sum(IF(tab_DriverPaid.transfer_id != 1,1,0)) as non_transfered FROM `tab_request` left join tab_request_bill on tab_request.id=tab_request_bill.request_id left join tab_DriverPaid on tab_DriverPaid.request_id=tab_request.id where tab_request.driver_id= $driverId");

            $tableResult = DB::select("SELECT tab_request.id ,tab_request.request_id as requestId,tab_request.created_at as date , tab_DriverPaid.transfer_id as isPaid ,tab_DriverPaid.payment_type as paymentType FROM `tab_request` left join tab_request_bill on tab_request.id=tab_request_bill.request_id left join tab_DriverPaid on tab_DriverPaid.request_id=tab_request.id where tab_request.driver_id= $driverId");

        }
        else if($days == 0)
        {
            $result = DB::select("SELECT count(tab_request.id) as total_trip,sum(tab_request_bill.driver_amount) as total_earned,sum(IF(tab_DriverPaid.transfer_id != 0,1,0)) as transfered ,sum(IF(tab_DriverPaid.transfer_id != 1,1,0)) as non_transfered FROM `tab_request` left join tab_request_bill on tab_request.id=tab_request_bill.request_id left join tab_DriverPaid on tab_DriverPaid.request_id=tab_request.id where tab_request.driver_id= $driverId  AND tab_request.created_at >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");

            $tableResult = DB::select("SELECT tab_request.id ,tab_request.request_id as requestId,tab_request.created_at as date , tab_DriverPaid.transfer_id as isPaid ,tab_DriverPaid.payment_type as paymentType FROM `tab_request` left join tab_request_bill on tab_request.id=tab_request_bill.request_id left join tab_DriverPaid on tab_DriverPaid.request_id=tab_request.id where tab_request.driver_id= $driverId  AND tab_request.created_at >= DATE_SUB(CURDATE(), INTERVAL $days DAY)");

        }
        else
        {
            $result = DB::select("SELECT count(tab_request.id) as total_trip,sum(tab_request_bill.driver_amount) as total_earned,sum(IF(tab_DriverPaid.transfer_id != 0,1,0)) as transfered ,sum(IF(tab_DriverPaid.transfer_id != 1,1,0)) as non_transfered FROM `tab_request` left join tab_request_bill on tab_request.id=tab_request_bill.request_id left join tab_DriverPaid on tab_DriverPaid.request_id=tab_request.id where tab_request.driver_id= $driverId  AND tab_request.created_at >= DATE_SUB(CURDATE(), INTERVAL $days DAY)  And tab_request.created_at < DATE_SUB(CURDATE(), INTERVAL 0 DAY)");

            $tableResult = DB::select("SELECT tab_request.id ,tab_request.request_id as requestId,tab_request.created_at as date , tab_DriverPaid.transfer_id as isPaid ,tab_DriverPaid.payment_type as paymentType FROM `tab_request` left join tab_request_bill on tab_request.id=tab_request_bill.request_id left join tab_DriverPaid on tab_DriverPaid.request_id=tab_request.id where tab_request.driver_id= $driverId  AND tab_request.created_at >= DATE_SUB(CURDATE(), INTERVAL $days DAY)  And tab_request.created_at < DATE_SUB(CURDATE(), INTERVAL 0 DAY)");

        }


        return  array('result'=>$result,'tableResult'=>$tableResult);

    }

}
