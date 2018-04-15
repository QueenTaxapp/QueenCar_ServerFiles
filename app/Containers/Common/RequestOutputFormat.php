<?php


namespace App\Containers\Common;


/**
 * Class RequestOutputFormat.
 *
 * @author Vignesh R
 */
class RequestOutputFormat
{

    /**
     * @param $requestDetails  object
     * it is used to find the trip status for single request
     */
    public function tripStatus($requestDetails)
    {
        if( ($requestDetails->is_completed == 0) && ($requestDetails->is_cancelled == 0) && ($requestDetails->is_driver_started == 1) )
        {

            return trans('localization::lang_view.on_trip');
        }

        if( ($requestDetails->is_completed == 0) && ($requestDetails->is_cancelled == 0) && ($requestDetails->is_driver_started == 0) )
        {

            return trans('localization::lang_view.trip_not_yet_started');
        }

        if( ($requestDetails->is_completed == 1) && ($requestDetails->is_cancelled == 0))
        {

            return trans('localization::lang_view.trip_completed');
        }

        if( ($requestDetails->is_completed == 0) && ($requestDetails->is_cancelled == 1))
        {

            return trans('localization::lang_view.trip_cancelled');
        }

    }

    /**
     * @param $requestDetails  object
     * it is used to find the specific request is paid or un paid
     */
    public function isPaid($requestDetails)
    {
        if( ($requestDetails->is_paid == 0) )
        {

            return trans('localization::lang_view.un_paid');
        }
        else
        {
            return trans('localization::lang_view.paid');
        }
    }

    /**
     * @param $requestDetails  object
     * it is used to find the specific request payment type
     */
    public function paymentType($requestDetails)
    {
        $array = array(
            '0'=> trans('localization::lang_view.card'),
            '1'=> trans('localization::lang_view.cash'),
            '2'=> trans('localization::lang_view.wallet'),
            '3'=> trans('localization::lang_view.wallet&card'),
            );

        return $array[$requestDetails->payment_opt];
    }

    /**
     * @param $arrayListOffunction  array
     * @param $requestList  object
     *
     * it is used to call the method on this class often using the values in $arrayListOffunction
     * and stored with key using $arrayListOffunction as like $requestList
     */
    public function MethodCallOften($arrayListOffunction,$requestList)
    {

        $requestListWithMessage = array ();
        foreach ($requestList as $value)
        {

            $requestListFormatObject  = new \stdClass;


            $keys = array_keys($value->toArray());

            foreach ($keys as $key)
            {
                $requestListFormatObject->$key = $value->$key;
            }
            foreach ($arrayListOffunction as $keyName => $functionName)
            {
                $requestListFormatObject->$keyName = $this->$functionName($value);
            }

            $requestListWithMessage[] =  $requestListFormatObject;

        }
        return $requestListWithMessage;

    }



}