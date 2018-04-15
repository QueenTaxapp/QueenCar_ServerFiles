<?php

namespace App\Containers\Drivers\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer;




class  ApiResponseTransformer extends Transformer
{


    public function transform($request)
    {


        $response = [
            'success' => true,
            'success_message'=>$request->success_message,
            'request' => array(

                "id" => $request->request->id,
                "trip_start_time" => $request->request->trip_start_time,
                "is_driver_started" => $request->request->is_driver_started,
                "is_driver_arrived" => $request->request->is_driver_arrived,
                "is_trip_start" => $request->request->is_trip_start,
                "is_completed" => $request->request->is_completed,
                "payment_opt" => $request->request->payment_opt,
                "type" => $request->request->type,
                "pick_latitude" => $request->request->pick_latitude,
                "pick_longitude" => $request->request->pick_longitude,
                "drop_latitude" => $request->request->drop_latitude,
                "drop_longitude" => $request->request->drop_longitude,
                "pick_location" => $request->request->pick_location,

                "drop_location" => $request->request->drop_location,
                "user" => array(
                    "id" => $request->user->id,
                    "firstname" => $request->user->firstname,
                    "lastname" => $request->user->lastname,
                    "email" => $request->user->email,
                    "phone_number" => $request->user->phone_number,
                    "profile_pic" => $request->user->profile_pic,
                    "review" => $request->user->review
                )
            ),

        ];

        return $response;
    }


}
