<?php

namespace App\Containers\Dispatch\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer;



class  ApiDispatchSpecificRequestDetailsTransformers extends Transformer
{


    public function transform($request)
    {

        $response = [
            'success' => $request->success,
            'success_message'=>$request->success_message,
             $request->key1 => $request->value1,
             $request->key2 => $request->value2,

        ];

        return $response;


    }


}
