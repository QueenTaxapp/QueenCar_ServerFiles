<?php

namespace App\Containers\Company\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer;



class CompanyListTransformer extends Transformer
{

    /**
     * @param $request
     * @return array
     */
    public function transform($request)
    {


        $response = [
            'success' => true,
            'success_message' => $request->message,
            'company' => $request->data
            ,
        ];


/*
        print_r($response);
        die("i");*/

        return $response;
    }


}
