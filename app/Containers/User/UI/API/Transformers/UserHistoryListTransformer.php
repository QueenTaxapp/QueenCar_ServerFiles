<?php

namespace App\Containers\User\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer;


class  UserHistoryListTransformer extends Transformer
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
            "history"=>$request->request

        ];

        return $response;
    }


}
