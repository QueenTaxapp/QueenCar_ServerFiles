<?php
namespace App\Containers\User\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer;


class NewUserLoginTransformer extends Transformer
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
        $request = $request->data->driver;

       


        $response = [
            'success' => true,
            'success_message' => $message,
            'user' =>[
                'id' => $request->id,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone_number,
                'login_by' => $request->login_by,
                'login_method' => $request->login_method,
                'token' => $request->token,
                'profile_pic'=> $request->profile_pic,
                'is_active'=> $request->is_active

            ],
            'sos'=>$sos
        ];
        //print_r($response);die();

        return $response;
    }


}
