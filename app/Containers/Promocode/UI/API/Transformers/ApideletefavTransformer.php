<?php

namespace App\Containers\User\UI\API\Transformers;


use App\Containers\User\Models\User;
use App\Ship\Parents\Transformers\Transformer;


/**
 * Class ApideletefavTransformer
 * @package App\Containers\User\UI\API\Transformers
 */
class ApideletefavTransformer extends Transformer
{

    /**
     * @param $result
     * @return array
     */
    public function transform($result)
    {

        $response = [
            'success' => true,
            "success_message" => $result->message,
            "favid" => $result->id
        ];

        return $response;
    }

   

}
