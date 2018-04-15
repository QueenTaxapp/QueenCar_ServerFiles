<?php

namespace App\Containers\Drivers\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer;



/**
 * Class ToogleStatusTransformer
 * @package App\Containers\Drivers\UI\API\Transformers
 */
class  DriverSimpleSuccessResponse extends Transformer
{

    /**
     * @param $request
     * @return array
     */
    public function transform($request)
    {

        $response = [
            'success' => true,
            'success_message'=>$request->message
        ];

        return $response;
    }


}
