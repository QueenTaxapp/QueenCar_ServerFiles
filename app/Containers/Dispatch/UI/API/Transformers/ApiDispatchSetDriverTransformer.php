<?php

namespace App\Containers\Dispatch\UI\API\Transformers;

use App\Ship\Parents\Transformers\Transformer;


/**
 * Class ApiDispatchSetDriverTransformer
 * @package App\Containers\Dispatch\UI\API\Transformers
 */
class ApiDispatchSetDriverTransformer  extends Transformer
{
    /**
     * @param $request
     * @return array
     */
    public function transform($request)
    {


        $response = [
            'success' => true,
            'success_message' => $request->success_message
        ];

        return $response;
    }


}
