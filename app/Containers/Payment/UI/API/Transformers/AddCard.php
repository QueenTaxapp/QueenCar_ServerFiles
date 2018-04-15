<?php

namespace App\Containers\Payment\UI\API\Transformers;



use App\Ship\Parents\Transformers\Transformer;


/**
 * Class CheckReferral
 * @package App\Containers\Referral\UI\API\Transformers
 */
class AddCard extends Transformer
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
            "payment" => $result->payment
            ];

        return $response;
    }

   

}
