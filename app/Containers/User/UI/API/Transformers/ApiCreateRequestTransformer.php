<?php

namespace App\Containers\User\UI\API\Transformers;

use App\Containers\Authorization\UI\API\Transformers\RoleTransformer;
use App\Containers\User\Models\User;
use App\Ship\Parents\Transformers\Transformer;
use App\Ship\Parents\Requests\Request;


/**
 * Class ApiCreateRequestTransformer
 * @package App\Containers\User\UI\API\Transformers
 */
class ApiCreateRequestTransformer extends Transformer
{

    /**
     * @param $result
     * @return array
     */
    public function transform($result)
    {



        $response = [
            'success' => true,
            "success_message" => $result->driver_response->success_message,
            "request" => array(

                "id" => $result->driver_response->request['id'],
                "request_id" => $result->driver_response->request['request_id'],
                "pick_latitude" => $result->driver_response->request['pick_latitude'],
                "pick_longitude" => $result->driver_response->request['pick_longitude'],
                "drop_longitude" => $result->driver_response->request['drop_longitude'],
                "drop_latitude" => $result->driver_response->request['drop_latitude'],
                "drop_location" => $result->driver_response->request['drop_location'],
                "pick_location" => $result->driver_response->request['pick_location'],
            ),
            "user" => array(

                "id" => $result->driver_response->request['user']['id'],
                "firstname" => $result->driver_response->request['user']['firstname'],
                "lastname" => $result->driver_response->request['user']['lastname'],
                "email" => $result->driver_response->request['user']['email'],
                "phone_number" => $result->driver_response->request['user']['phone_number'],
                "profile_pic" => $result->driver_response->request['user']['profile_pic'],
                "latitude" => $result->driver_response->request['user']['latitude'],
                "longitude" => $result->driver_response->request['user']['longitude'],

                )
                 ];

        return $response;
    }

   

}
