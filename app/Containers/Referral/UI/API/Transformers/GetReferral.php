<?php

namespace App\Containers\Referral\UI\API\Transformers;



use App\Ship\Parents\Transformers\Transformer;


/**
 * Class CheckReferral
 * @package App\Containers\Referral\UI\API\Transformers
 */
class GetReferral extends Transformer
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
                "code" => $result->code,
                "earned" => $result->amount_earned,
                "spent" => $result->amount_spent,
                "balance" => $result->amount_balance,
                "currency" => $result->currency_symbol

            ];

        return $response;
    }

   

}
