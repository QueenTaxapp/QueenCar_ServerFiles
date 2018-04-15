<?php

namespace App\Containers\User\UI\API\Transformers;

use App\Containers\Authorization\UI\API\Transformers\RoleTransformer;
use App\Containers\User\Models\User;
use App\Ship\Parents\Transformers\Transformer;
use App\Ship\Parents\Requests\Request;


/**
 * Class ApiAddfavTransformer
 * @package App\Containers\User\UI\API\Transformers
 */
class ApiAddfavTransformer extends Transformer
{

    /**
     * @param $result
     * @return array
     */
    public function transform($result)
    {

            $obj = new \stdClass();
            $obj->placeid = $result->placeId;
            $obj->id = $result->id;
            $obj->nickName = $result->nickName;
            $obj->latitude = $result->latitude;
            $obj->longitude = $result->longitude;
        $response = [
            'success' => true,
            "success_message" => $result->message,
            "favplace" => [$obj]
            
        ];

        return $response;
    }

   

}
