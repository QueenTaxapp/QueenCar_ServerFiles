<?php

namespace App\Containers\User\UI\API\Transformers;

use App\Containers\Authorization\UI\API\Transformers\RoleTransformer;
use App\Containers\User\Models\User;
use App\Ship\Parents\Transformers\Transformer;
use App\Ship\Parents\Requests\Request;


/**
 * Class UserTransformer.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class TempToken extends Transformer
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
            'token' => $result->token,
            "success_message" => $result->message
            ];

        return $response;
    }

   

}
