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
class ApiSignupTransformer extends Transformer
{
    /**
     * @param \App\Containers\User\Models\User $user
     *
     * @return array
     */
    public function transform($result)
    {
        
        $response = [
            'success' => true,
            "success_message" => $result->message,
            'user' => [
                'id' => $result->id,
                'firstname' => $result->firstname,
                'lastname' => $result->lastname,
                'email' => $result->email,
                'phone' => $result->phone_number,
                'login_by' => $result->login_by,
                'login_method' => $result->login_method,
                'token'=> $result->token,
                'profile_pic'=> $result->profile_pic,
            ]
        ];

        return $response;
    }

   

}
