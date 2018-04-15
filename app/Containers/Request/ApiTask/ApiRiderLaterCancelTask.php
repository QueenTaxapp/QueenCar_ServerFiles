<?php


namespace App\Containers\Request\ApiTask;

use App\Containers\Request\Models\RequestModel;
use App\Ship\Exceptions\CommonException;


/**
 * Class ApiRiderLaterCancelTask
 * @package App\Containers\Request\ApiTask
 */
class ApiRiderLaterCancelTask
{
    /**
     * @param $data
     * @param $custom_parameter
     * @return \stdClass
     */
    public function run($data, $custom_parameter)
    {
        $request = RequestModel::find($data['request']->request_id);


        if($request)
        {

            if($request->is_completed == 1)
            {
                throw (new CommonException())->setValue('727',trans('localization::errors.727'));
            }

            $request->is_cancelled = 1;
            $request->cancel_method = 1;
                $request->save();
            $obj = new \stdClass();
            $obj->message = "Ride_later_cancelled";
            $data['response']=$obj;
            return $data;
        }
        else{
            throw (new CommonException())->setValue('803',trans('localization::errors.803'));
        }

    }

}