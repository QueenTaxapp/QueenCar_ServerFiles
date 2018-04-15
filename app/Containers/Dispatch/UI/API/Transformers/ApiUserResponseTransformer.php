<?php

namespace App\Containers\Dispatch\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer;


/**
 * Class ToogleStatusTransformer
 * @package App\Containers\Drivers\UI\API\Transformers
 */
class  ApiUserResponseTransformer extends Transformer
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
            'user' => $request->user

        ];

        return $response;
           // ->header('access-control-allow-origin', '*');

    }


}
