<?php

namespace App\Containers\Request\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer;


/**
 * Class EtaTransform
 * @package App\Containers\Wallet\UI\API\Transformers
 */
class BillShowTransformer extends Transformer
{

    /**
     * @param $result
     * @return array
     */
    public function transform($result)
    {

        $response =
            [
                'success' => true,
                "success_message" => $result->message,
                "request" => $result->request

            ];

        return $response;
    }



}
