<?php

namespace App\Containers\Sos\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer;



/**
 * Class ToogleStatusTransformer
 * @package App\Containers\Drivers\UI\API\Transformers
 */
class  UserSosTransformer extends Transformer
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
            "sos"=>$request->sos,
            "user_sos"=>$request->user_sos,
        ];

        return $response;
    }


}
