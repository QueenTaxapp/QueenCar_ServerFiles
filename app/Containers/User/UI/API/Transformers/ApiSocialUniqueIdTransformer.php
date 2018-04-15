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
class ApiSocialUniqueIdTransformer extends Transformer
{
    /**
     * @param object $result
     *
     * @return Json
     */
    public function transform($result)
    {
        $isPresented = false;
        if($result->success == 'true')
        {
            $isPresented = true;
        }
        
        $response = [
            'success' => true,
            'user' => [
                'is_presented'=>$isPresented ,
                      ]  ,
            "success_message" => $result->message
        ];

        return $response;
    }

   

}
