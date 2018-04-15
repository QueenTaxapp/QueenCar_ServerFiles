<?php

namespace App\Containers\Eta\UI\API\Transformers;



use App\Ship\Parents\Transformers\Transformer;


/**
 * Class EtaTransform
 * @package App\Containers\Wallet\UI\API\Transformers
 */
class EtaTransform extends Transformer
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
            "distance" => $result->distance,
            "time" => $result->time,
            "base_distance" => $result->base_distance,
            "base_price" => $result->base_price,
            "price_per_distance" => $result->price_per_distance,
            "price_per_time" => $result->price_per_time,
            "distance_price" => number_format($result->distance_price, 2),
            "time_price" => $result->time_price,
            "total" => number_format($result->total,2),
            "tax" => $result->tax,
            "tax_amount" => number_format($result->tax_amount, 2),
            "ride_fare" => number_format($result->ride_fare, 2),
            "currency" => $result->currency,
            "type_id" => $result->type_id,
            "type_name" => $result->type_name,
            "unit" => "$result->unit",
            "unit_in_words_without_lang" => "$result->unit_in_words_without_lang",
            "unit_in_words" => "$result->unit_in_words",
            ];

        return $response;
    }



}
