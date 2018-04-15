<?php

namespace App\Containers\Drivers\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer;


class NewDriverLoginTransformer extends Transformer
{
    /**
     * @param \App\Containers\Drivers\Models\HeroModel $hero
     *
     * @return array
     */
    public function transform($request)
    {



        $sos =$request->data->sos;
        $message = $request->message;
        $type = $request->data->type_detail;
        $request = $request->data->driver;




        $response = [
            'success' => true,
            'success_message' => $message,
            'driver' =>[
                'id' => $request->id,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone_number,
                'login_by' => $request->login_by,
                'login_method' => $request->login_method,
                'token' => $request->token,
                'profile_pic'=> $request->profile_pic,
                'is_active'=> $request->is_active,
                'is_approve'=> $request->is_approve,
                'is_available'=> $request->is_available,
                'car_model'=> $request->car_model,
                'car_number'=> $request->car_number,
                'type_name'=> $type->name,
                'type_icon'=> $type->icon,
            ],
            'sos'=>$sos
        ];
        //print_r($response);die();

        return $response;
    }


}
