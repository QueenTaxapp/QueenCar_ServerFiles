<?php

namespace App\Containers\Types\UI\API\Transformers;


use App\Ship\Parents\Transformers\Transformer;



/**
 * Class UserTransformer.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class TypesTransformer extends Transformer
{
    /**
     * @param String Token
     *
     * @return array
     */
    public function transform($result)
    {

        $response =
            [
            'success' => true,
            'success_message' => $result->message,
            'types' => $result->types

            ];

        return $response;
    }

   

}
