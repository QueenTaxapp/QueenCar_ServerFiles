<?php

namespace App\Containers\Dispatch\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer;


/**
 * Class ToogleStatusTransformer
 * @package App\Containers\Drivers\UI\API\Transformers
 */
class  ApiDispatchRequestDriverStatusTransformer extends Transformer
{


    /**
     * @param $request
     * @return array
     */
    public function transform($request)
    {

        $response = [
            'success' => $request->success,
            'success_message'=>$request->success_message,
            'request' => $request->request,
            'driver' => $request->driver,

        ];

        return $response;
        // ->header('access-control-allow-origin', '*');

    }


}
