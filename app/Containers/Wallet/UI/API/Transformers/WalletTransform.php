<?php

namespace App\Containers\Wallet\UI\API\Transformers;



use App\Ship\Parents\Transformers\Transformer;


/**
 * Class CheckReferral
 * @package App\Containers\Referral\UI\API\Transformers
 */
class WalletTransform extends Transformer
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
            "amount_added" => $result->wallet->amount_earned,
            "amount_balance" => $result->wallet->amount_balance,
            "amount_spent" => $result->wallet->amount_spent,
            "currency" => $result->currency_symbol,
            ];

        return $response;
    }

   

}
