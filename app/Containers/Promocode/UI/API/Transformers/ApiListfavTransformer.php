<?php

namespace App\Containers\User\UI\API\Transformers;

use App\Containers\Authorization\UI\API\Transformers\RoleTransformer;
use App\Containers\User\Models\User;
use App\Ship\Parents\Transformers\Transformer;
use App\Ship\Parents\Requests\Request;


/**
 * Class ApiListfavTransformer
 * @package App\Containers\User\UI\API\Transformers
 */
class ApiListfavTransformer extends Transformer
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
            "favplace" => $result->favplace
        ];

        return $response;
    }

   

}
