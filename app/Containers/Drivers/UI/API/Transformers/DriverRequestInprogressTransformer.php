<?php

namespace App\Containers\Drivers\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer;


class  DriverRequestInprogressTransformer extends Transformer
{

    /**
     * @param $request
     * @return array
     */
    public function transform($request)
    {
        //echo "<pre>";print_r($request);die();
        $response = [
            'success' => true,
            'success_message'=>$request->message,

            "request"=>$request->request,

            "driver_status"=>$request->driver_status,

            "sos"=>$request->sos,

        ];

        return $response;
    }


}
