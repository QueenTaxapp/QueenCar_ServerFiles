<?php

namespace App\Containers\Dispatch\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer;



class  ApiDispatchSpecificAdminRequestListTransformer extends Transformer
{

    public function transform($request)
    {

        $response = [
            'success' => $request->success,
            'success_message'=>$request->success_message,
            'total_no_of_request'=>$request->number_of_request,
            'page' => $request->page,
             $request->key => $request->dispatcher

        ];

        return $response;
        // ->header('access-control-allow-origin', '*');

    }


}
