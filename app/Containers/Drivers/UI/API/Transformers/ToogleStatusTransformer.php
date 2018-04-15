<?php

namespace App\Containers\Drivers\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer;



/**
 * Class ToogleStatusTransformer
 * @package App\Containers\Drivers\UI\API\Transformers
 */
class  ToogleStatusTransformer extends Transformer
{

    /**
     * @param $request
     * @return array
     */
    public function transform($request)
    {

        $response = [
            'success' => true,
            'success_message'=>$request->message,
            "$request->heading"=>$request->data,
        ];

        return $response;
    }


}
