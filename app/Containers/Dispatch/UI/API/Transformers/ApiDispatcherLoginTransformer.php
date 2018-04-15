<?php

namespace App\Containers\Dispatch\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer;



class ApiDispatcherLoginTransformer  extends Transformer
{

    public function transform($request)
    {



        $response = [
            'success' => true,
            'success_message' => $request->success_message,
            $request->key => $request->dispatcher
        ];

        return $response;
    }


}
