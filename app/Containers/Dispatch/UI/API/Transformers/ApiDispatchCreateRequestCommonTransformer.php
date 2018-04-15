<?php

namespace App\Containers\Dispatch\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer;




class ApiDispatchCreateRequestCommonTransformer  extends Transformer
{
    public function transform($request)
    {


        $response = [
            'success' => true,
            'success_message' => $request->success_message,
            'is_automatic'=> $request->is_automatic,
            'request' => $request->request,
            'user' => $request->user,
            'driver' => $request->driver,
            'request_details'=> $request->request_detail
        ];

        return $response;
    }


}
