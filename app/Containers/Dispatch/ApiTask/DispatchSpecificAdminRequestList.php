<?php

namespace App\Containers\Dispatch\ApiTask;

use App\Containers\Request\Models\RequestModel;
use Illuminate\Support\Facades\DB;
use App\Containers\Common\RequestOutputFormat;


/**
 * Class DispatchSpecificAdminRequestList
 *
 * @author Vignesh R
 */
class DispatchSpecificAdminRequestList
{

    /**
     * @param $data
     * it is used to get the request list for specific admin
     * with is paid , payment option , trip status message
     */
    public function run($data)
    {






        $dispatcherAdminId = $data['request']->id;

        $page = $data['request']->page;

        $rideLater = $data['request']->ride_later;

        $skip = ($page * 10) - 10;
        $take = 10;

        $wantToSearch = true;

        $inputRequest = $data['request'];

        $specificDispatchAdminRequestList = $this->DispatchAdminRequestList($dispatcherAdminId,null,$rideLater,$skip,$take,$wantToSearch,$inputRequest);



        $numberOfRequest = $this->DispatchAdminRequestCount($dispatcherAdminId,null,$rideLater,null,null,$wantToSearch,$inputRequest);


        $requestListWithMessage =$this->RequestOutputFormat($specificDispatchAdminRequestList);



        $tmp = Array();

        foreach($requestListWithMessage as $ma)
        {

            $tmp[] = $ma->trip_status;
//            $tmp[] = &$ma["id"];
        }
        array_multisort($tmp, $requestListWithMessage);




        if($requestListWithMessage == null)
        {
            $requestListWithMessage = array();
        }


        $response = new \stdClass();
        $response->success = true;

        if($rideLater == 0)
        {
            $response->success_message = "request_list_for_specific_dispatch_admin_request";

        }

        if($rideLater == 1)
        {
            $response->success_message = "request_list_for_specific_dispatch_admin_ride_later";

        }
        $response->number_of_request = $numberOfRequest;
        $response->page = (int) $data['request']->page;
        $response->key = 'request';
        $response->dispatcher = $requestListWithMessage;

        $data['response'] = $response;

        return $data;

    }


    /**
     * @param $dispatchId int
     * @param $selectArray array|null
     * @param $rideLater int|null
     * @param $skip int|null
     * @param $take int|null
     * it is used to get the request list for specific admin
     *
     */
    public function DispatchAdminRequestList($dispatchId,$selectArray,$rideLater = null,$skip = null,$take = null,$wantToSearch = false,$inputRequest = null)
    {


        if($selectArray == null)
        {
            $selectArray = array('request.id','request.trip_start_time','request.created_at','request.request_id','request.is_completed','request.is_cancelled','request.payment_opt',
                'request.request_id','request.is_paid','request.is_trip_start','request.total as trip_bill',
                DB::raw('CONCAT(tab_User.firstname, " ",tab_User.lastname) AS user_name'),
                DB::raw('CONCAT(tab_Drivers.firstname, " ",tab_Drivers.lastname) AS driver_name')

                );
        }

        $specificDispatchAdminRequestList = RequestModel::leftJoin('User', 'User.id', '=', 'request.user_id')
                                                        ->leftJoin('Drivers', 'Drivers.id', '=', 'request.driver_id')
                                                        ->select($selectArray)
                                                        ->where('request.dispatch_reference',$dispatchId)
                                                        ->orderBy('request.id','desc');
        if($rideLater != null)
        {

            $specificDispatchAdminRequestList = $specificDispatchAdminRequestList->where('later',$rideLater);

        }

        if($skip != null)
        {
            $specificDispatchAdminRequestList = $specificDispatchAdminRequestList->skip($skip);
        }

        if($take != null)
        {
            $specificDispatchAdminRequestList = $specificDispatchAdminRequestList->take($take);
        }



        if(($wantToSearch != false) && ($inputRequest != null))
        {

            $this->wantToSearch($inputRequest,$specificDispatchAdminRequestList);
        }




        $specificDispatchAdminRequestList = $specificDispatchAdminRequestList->get();




        return $specificDispatchAdminRequestList;

    }

    public function wantToSearch($inputRequest,$specificDispatchAdminRequestList)
    {

        $searchKey = 'user';
        $searchValue = $inputRequest->search_key_user;
        $this->callGoToSearchIfSearchValueNotNull($searchKey,$searchValue,$specificDispatchAdminRequestList);

        $searchKey = 'driver';
        $searchValue = $inputRequest->search_key_driver;
        $this->callGoToSearchIfSearchValueNotNull($searchKey,$searchValue,$specificDispatchAdminRequestList);

        $searchKey = 'trip_status';
        $searchValue = $inputRequest->search_key_trip_status;
        $this->callGoToSearchIfSearchValueNotNull($searchKey,$searchValue,$specificDispatchAdminRequestList);


        $searchKey = 'payment_type';
        $searchValue = $inputRequest->search_key_payment_type;
        $this->callGoToSearchIfSearchValueNotNull($searchKey,$searchValue,$specificDispatchAdminRequestList);

        $searchKey = 'payment_status';
        $searchValue = $inputRequest->search_key_payment_status;

        $this->callGoToSearchIfSearchValueNotNull($searchKey,$searchValue,$specificDispatchAdminRequestList);

        $searchKey = 'between_date';
        $searchValue = array();
        $searchValue[] = $inputRequest->search_key_from_date;
        $searchValue[] = $inputRequest->search_key_to_date;
        $this->callGoToSearchIfSearchValueNotNull($searchKey,$searchValue,$specificDispatchAdminRequestList);
    }

    public function callGoToSearchIfSearchValueNotNull($searchKey,$searchValue,$specificDispatchAdminRequestList)
    {


        if (($searchValue != null) && (!is_array($searchValue)))
        {

            $this->goToSearch($searchKey,$searchValue,$specificDispatchAdminRequestList);
        }
        else if((is_array($searchValue)))
        {


            $arrayKeys = array_keys($searchValue);


            foreach($arrayKeys as $value)
            {

                if($searchValue[$value] == null)
                {
                    return false;
                }
            }


            $this->goToSearch($searchKey,$searchValue,$specificDispatchAdminRequestList);

        }


    }

    public function goToSearch($searchKey,$searchValue,$specificDispatchAdminRequestList)
    {


        if($searchKey == 'user')
        {
            $columnKeyName = array('tab_User.firstname','tab_User.lastname');

            return $this->nameSearch($columnKeyName,$searchValue,$specificDispatchAdminRequestList);
        }

        else if($searchKey == 'driver')
        {
            $columnKeyName = array('tab_Drivers.firstname','tab_Drivers.lastname');

            return $this->nameSearch($columnKeyName,$searchValue,$specificDispatchAdminRequestList);
        }

        else if ($searchKey == 'trip_status')
        {
            // $searchValue
            // * 1 : Trip Not Yet Started
            // * 2 : On Going Trip
            // * 3 : Trip Completed
            // * 4 : Trip Cancelled
            return $this->tripStatusSearch($searchValue,$specificDispatchAdminRequestList);

        }
        else if($searchKey == 'payment_type')
        {

            $searchKey = 'request.payment_opt';
            return $this->search($searchKey,$searchValue,$specificDispatchAdminRequestList);

        }
        else if($searchKey == 'payment_status')
        {


            $searchKey = 'request.is_paid';



            return $this->search($searchKey,$searchValue,$specificDispatchAdminRequestList);
        }
        else if($searchKey == 'between_date')
        {
            $columnKey = 'trip_start_time';

            $fromDate = $searchValue[0];
            $toDate   = $searchValue[1];
            return $this->betweenDate($columnKey,$fromDate,$toDate,$specificDispatchAdminRequestList);
        }


    }

    public function nameSearch($columnKeyName,$searchName,$eloquentObject)
    {
        $columnOneName = $columnKeyName[0];
        $columnTwoName = $columnKeyName[1];

        $eloquentObject = $eloquentObject->where(DB::raw("CONCAT_WS(' ', $columnOneName, $columnTwoName)"),'like','%'.$searchName.'%');

        return $eloquentObject;

    }

    public function betweenDate($columnKey,$fromDate,$toDate,$eloquentObject)
    {



        $eloquentObject = $eloquentObject->whereBetween($columnKey, array($fromDate, $toDate));

        return $eloquentObject;

    }

    public function search($searchKey,$searchValue,$eloquentObject)
    {

        $eloquentObject = $eloquentObject->where($searchKey,$searchValue);

        return $eloquentObject;
    }


    /**
     * @param $searchKey int in:1 , 2, 3, 4
     * @param $eloquentObject object
     * @return object
     * 1 : Trip Not Yet Started
     * 2 : On Going Trip
     * 3 : Trip Completed
     * 4 : Trip Cancelled
     */
    public function tripStatusSearch($searchValue, $eloquentObject)
    {
        if($searchValue == 1) // Trip Not Yet Started
        {
            $eloquentObject = $eloquentObject
                            ->where('is_completed',0)
                            ->where('is_cancelled',0)
                            ->where('is_driver_started',0);
        }
        else if($searchValue == 2) // On Going Trip
        {
            $eloquentObject = $eloquentObject
                ->where('is_completed',0)
                ->where('is_cancelled',0)
                ->where('is_driver_started',1);
        }
        else if($searchValue == 3) // Trip Completed
        {
            $eloquentObject = $eloquentObject
                ->where('is_cancelled',0)
                ->where('is_completed',1);


        }
        else if($searchValue == 4) // Trip Cancelled
        {
            $eloquentObject = $eloquentObject
                ->where('is_cancelled',1)
                ->where('is_completed',0);
        }

        return $eloquentObject;
    }

    /**
     * @param $dispatchId int
     * @param $selectArray array|null
     * @param $rideLater int|null
     * @param $skip int|null
     * @param $take int|null
     * it is used to get the count of request list for specific admin
     *
     */
    public function DispatchAdminRequestCount($dispatchId,$selectArray,$rideLater = null,$skip = null,$take = null,$wantToSearch = false,$inputRequest = null)
    {
        if($selectArray == null)
        {
            $selectArray = array('request.id','request.trip_start_time','request.created_at','request.request_id','request.is_completed','request.is_cancelled','request.payment_opt',
                'request.request_id','request.is_paid','request.is_trip_start','request.total as trip_bill',
                DB::raw('CONCAT(tab_User.firstname, " ",tab_User.lastname) AS user_name'),
                DB::raw('CONCAT(tab_Drivers.firstname, " ",tab_Drivers.lastname) AS driver_name')

            );
        }

        $specificDispatchAdminRequestList = RequestModel::leftJoin('User', 'User.id', '=', 'request.user_id')
            ->leftJoin('Drivers', 'Drivers.id', '=', 'request.driver_id')
            ->select($selectArray)
            ->where('request.dispatch_reference',$dispatchId)
            ->orderBy('request.id','desc');
        if($rideLater != null)
        {

            $specificDispatchAdminRequestList = $specificDispatchAdminRequestList->where('later',$rideLater);

        }


        if(($wantToSearch != false) && ($inputRequest != null))
        {

            $this->wantToSearch($inputRequest,$specificDispatchAdminRequestList);
        }


        $specificDispatchAdminRequestListCount = $specificDispatchAdminRequestList->count();

        return $specificDispatchAdminRequestListCount;

    }


    /**
     * @param $specificDispatchAdminRequestList object
     *
     * it is used to validate the trip status , is paid, payment type
     * using the App\Containers\Common\RequestOutputFormat class
     *
     */
    public function RequestOutputFormat($specificDispatchAdminRequestList)
    {

        $arrayListOffunction = array(
                                    'trip_status'=>'tripStatus',
                                    'is_paid_message'=>'isPaid',
                                    'payment_type_select'=>'paymentType',
                                    );

        $obj = new RequestOutputFormat;

        $requestListWithMessage =  $obj->MethodCallOften($arrayListOffunction,$specificDispatchAdminRequestList);

        return $requestListWithMessage;

    }

}

